<?php
/**
 * @package    AkeebaBackup
 * @subpackage OneClickAction
 * @copyright  Copyright (c)2009-2016 Nicholas K. Dionysopoulos
 * @license    GNU General Public License version 3, or later
 *
 * @since      3.3
 */

defined('_JEXEC') or die();

// PHP version check
if (!version_compare(PHP_VERSION, '5.3.3', '>='))
{
	return;
}

JLoader::import('joomla.application.plugin');

class plgSystemAkeebaupdatecheck extends JPlugin
{
	public function onAfterInitialise()
	{
		// Make sure Akeeba Backup is installed
		if (!file_exists(JPATH_ADMINISTRATOR . '/components/com_akeeba'))
		{
			return;
		}

		// Load F0F
		if ( !defined('F0F_INCLUDED'))
		{
			include_once JPATH_SITE . '/libraries/f0f/include.php';
		}

		if ( !defined('F0F_INCLUDED') || !class_exists('F0FLess', true))
		{
			return;
		}

		// Timezone fix; avoids errors printed out by PHP 5.3.3+ (thanks Yannick!)
		if (function_exists('date_default_timezone_get') && function_exists('date_default_timezone_set'))
		{
			if (function_exists('error_reporting'))
			{
				$oldLevel = error_reporting(0);
			}
			$serverTimezone = @date_default_timezone_get();
			if (empty($serverTimezone) || !is_string($serverTimezone))
			{
				$serverTimezone = 'UTC';
			}
			if (function_exists('error_reporting'))
			{
				error_reporting($oldLevel);
			}
			@date_default_timezone_set($serverTimezone);
		}

		// Make sure Akeeba Backup is enabled
		JLoader::import('joomla.application.component.helper');

		if ( !JComponentHelper::isEnabled('com_akeeba', true))
		{
			return;
		}

		// Do we have to run (at most once per 3 hours)?
		JLoader::import('joomla.html.parameter');
		JLoader::import('joomla.application.component.helper');

		$db = JFactory::getDBO();

		$qn = version_compare(JVERSION, '2.5.0', 'lt') ? 'nameQuote' : 'qn';

		$query = $db->getQuery(true)
		            ->select($db->$qn('lastupdate'))
		            ->from($db->$qn('#__ak_storage'))
		            ->where($db->$qn('tag') . ' = ' . $db->quote('akeebaupdatecheck_lastrun'));

		$last = $db->setQuery($query)->loadResult();

		if (intval($last))
		{
			$last = new JDate($last);
			$last = $last->toUnix();
		}
		else
		{
			$last = 0;
		}

		$now = time();

		if (!defined('AKEEBAUPDATECHECK_DEBUG') && (abs($now - $last) < 86400))
		{
			return;
		}

		// Use a 20% chance of running; this allows multiple concurrent page
		// requests to not cause double update emails being sent out.
		$random = rand(1, 5);

		if (!defined('AKEEBAUPDATECHECK_DEBUG') && ($random != 3))
		{
			return;
		}

		$now = new JDate($now);

		// Update last run status
		// If I have the time of the last run, I can update, otherwise insert
		if ($last)
		{
			$query = $db->getQuery(true)
			            ->update($db->$qn('#__ak_storage'))
			            ->set($db->$qn('lastupdate') . ' = ' . $db->quote($now->toSql()))
			            ->where($db->$qn('tag') . ' = ' . $db->quote('akeebaupdatecheck_lastrun'));
		}
		else
		{
			$query = $db->getQuery(true)
			            ->insert($db->$qn('#__ak_storage'))
			            ->columns(array($db->$qn('tag'), $db->$qn('lastupdate')))
			            ->values($db->quote('akeebaupdatecheck_lastrun') . ', ' . $db->quote($now->toSql()));
		}

		try
		{
			$result = $db->setQuery($query)->execute();
		}
		catch (Exception $exc)
		{
			$result = false;
		}

		if (!$result)
		{
			return;
		}

		/** @var AkeebaModelUpdates $model */
		$model = F0FModel::getTmpInstance('Updates', 'AkeebaModel');
		$updateInfo = $model->getUpdates();

		if (!$updateInfo['hasUpdate'])
		{
			return;
		}

		$superAdmins     = array();
		$superAdminEmail = $this->params->get('email', '');

		if (!empty($superAdminEmail))
		{
			$superAdmins = $this->_getSuperAdministrators($superAdminEmail);
		}

		if (empty($superAdmins))
		{
			$superAdmins = $this->_getSuperAdministrators();
		}

		if (empty($superAdmins))
		{
			return;
		}

		foreach ($superAdmins as $sa)
		{
			$model->doSendNotificationEmail($updateInfo['version'], $sa->email);
		}
	}

	private function _getSuperAdministrators($email = null)
	{
		$db  = JFactory::getDBO();
		$qn = version_compare(JVERSION, '2.5.0', 'lt') ? 'nameQuote' : 'qn';

		$sql = $db->getQuery(true)
		          ->select(array(
			          $db->$qn('u') . '.' . $db->$qn('id'),
			          $db->$qn('u') . '.' . $db->$qn('email')
		          ))->from($db->$qn('#__user_usergroup_map') . ' AS ' . $db->$qn('g'))
		          ->join(
			          'INNER',
			          $db->$qn('#__users') . ' AS ' . $db->$qn('u') . ' ON (' .
			          $db->$qn('g') . '.' . $db->$qn('user_id') . ' = ' . $db->$qn('u') . '.' . $db->$qn('id') . ')'
		          )->where($db->$qn('g') . '.' . $db->$qn('group_id') . ' = ' . $db->quote('8'))
		          ->where($db->$qn('u') . '.' . $db->$qn('sendEmail') . ' = ' . $db->quote('1'));
		if (!empty($email))
		{
			$sql->where($db->$qn('u') . '.' . $db->$qn('email') . ' = ' . $db->quote($email));
		}
		$db->setQuery($sql);

		return $db->loadObjectList();
	}
}