<?php
/**
 * @package    AkeebaBackup
 * @subpackage BackupIconModule
 * @copyright  Copyright (c)2009-2012 Nicholas K. Dionysopoulos
 * @license    GNU General Public License version 3, or later
 * @since      2.2
 * @version    $Id$
 */

// Protect from unauthorized access
defined('_JEXEC') or die();

// Old PHP version?
if (!version_compare(PHP_VERSION, '5.3.3', 'ge'))
{
	return;
}

// Joomla! version more recent than 2.5?
if (version_compare(JVERSION, '2.5.0', 'ge'))
{
	return;
}

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

/*
 * Hopefully, if we are still here, the site is running on at least PHP5. This means that
 * including the Akeeba Backup factory class will not throw a White Screen of Death, locking
 * the administrator out of the back-end.
 */

// Make sure Akeeba Backup is installed, or quit
$akeeba_installed = @file_exists(JPATH_ADMINISTRATOR . '/components/com_akeeba/engine/Factory.php');

if (!$akeeba_installed)
{
	return;
}

// Make sure Akeeba Backup is enabled
JLoader::import('joomla.application.component.helper');

if (!JComponentHelper::isEnabled('com_akeeba', true))
{
	return;
}

// Joomla! 1.6 or later - check ACLs (and not display when the site is bricked,
// hopefully resulting in no stupid emails from users who think that somehow
// Akeeba Backup crashed their site). It also not displays the button to people
// who are not authorised to take backups - which makes perfect sense!
$continueLoadingIcon = true;
$user                = JFactory::getUser();

if (!$user->authorise('akeeba.backup', 'com_akeeba'))
{
	return;
}

// Do we really, REALLY have Akeeba Engine?
if ( !defined('AKEEBAENGINE'))
{
	define('AKEEBAENGINE', 1); // Required for accessing Akeeba Engine's factory class
}
try
{
	@include_once JPATH_ADMINISTRATOR . '/components/com_akeeba/engine/Factory.php';

	if ( !class_exists('\Akeeba\Engine\Factory', false))
	{
		return;
	}
}
catch (Exception $e)
{
	return;
}

Akeeba\Engine\Platform::addPlatform('joomla25', JPATH_ADMINISTRATOR . '/components/com_akeeba/platform/joomla25');

// Load custom CSS
$moduleCSS = JURI::base() . 'modules/mod_akeebabackup/css/mod_akeebabackup.css';
JFactory::getDocument()->addStyleSheet($moduleCSS);

// Load the language files
$jlang = JFactory::getLanguage();
$jlang->load('mod_akeebabackup', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('mod_akeebabackup', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('mod_akeebabackup', JPATH_ADMINISTRATOR, null, true);

// Initialize defaults
$image = "akeeba-48.png";
$label = JText::_('MOD_AKEEBABACKUP_LBL_UPTODATE');
$labelClass="uptodate";

if ($params->get('enablewarning', 0) == 0)
{
	// Process warnings
	$warning = false;

	$aeconfig = \Akeeba\Engine\Factory::getConfiguration();
	\Akeeba\Engine\Platform::getInstance()->load_configuration();

	// Get latest non-SRP backup ID
	$filters  = array(
		array(
			'field'   => 'tag',
			'operand' => '<>',
			'value'   => 'restorepoint'
		)
	);
	$ordering = array(
		'by'    => 'backupstart',
		'order' => 'DESC'
	);
	require_once JPATH_ADMINISTRATOR . '/components/com_akeeba/models/statistics.php';
	$model = new AkeebaModelStatistics();
	$list  = $model->getStatisticsListWithMeta(false, $filters, $ordering);

	if ( !empty($list))
	{
		$record = (object)array_shift($list);
	}
	else
	{
		$record = null;
	}

	// Process "failed backup" warnings, if specified
	if ($params->get('warnfailed', 0) == 0)
	{
		if (!is_null($record))
		{
			$warning = (($record->status == 'fail') || ($record->status == 'run'));
		}
	}

	// Process "stale backup" warnings, if specified
	if (is_null($record))
	{
		$warning = true;
	}
	else
	{
		$maxperiod = $params->get('maxbackupperiod', 24);
		jimport('joomla.utilities.date');
		$lastBackupRaw    = $record->backupstart;
		$lastBackupObject = new JDate($lastBackupRaw);
		$lastBackup       = $lastBackupObject->toUnix(false);
		$maxBackup        = time() - $maxperiod * 3600;
		if (!$warning)
		{
			$warning = ($lastBackup < $maxBackup);
		}
	}

	if ($warning)
	{
		$image = 'akeeba-warning-48.png';
		$label = JText::_('MOD_AKEEBABACKUP_LBL_BACKUPREQUIRED');
		$labelClass="backuprequired";
	}
}

$user       = JFactory::getUser();

// Administrator access allowed
$showModule = true;

if (version_compare(JVERSION, '1.6.0', 'ge'))
{
	// Joomla! 1.6
	$extraclass = 'icon16';
}
else
{
	// Joomla! 1.5
	$gid = $user->gid;

	if (($gid != 25) && ($gid != 24))
	{
		$showModule = false;
	}

	$extraclass = 'icon15';
}

unset($user);

if (!$showModule) return;

$profile_id = (int) $params->get('profileid', 1);
$profile_id = ($profile_id <= 0) ? 1 : $profile_id;
$token = JFactory::getSession()->getFormToken();
$currentURL = JURI::current();
$url = 'index.php?option=com_akeeba&view=backup&autostart=1&returnurl=' . $currentURL . '&profileid=' . $profile_id . '&' . $token . '=1';

if (version_compare(JVERSION, '1.6.0', 'ge')):?>
	<div class="icon-wrapper" id="akadminicon">
		<div class="akcpanel">
			<div class="icon-wrapper">
				<div class="icon <?php echo $extraclass ?>">
					<a href="<?php echo $url ?>">
						<img src="<?php echo JURI::base() ?>../media/com_akeeba/icons/<?php echo $image ?>"/>
						<span>
							<span class="mod_akeebabackup-component"><?php echo JText::_('MOD_AKEEBABACKUP_LBL_AKEEBA');?></span>
							<span class="mod_akeebabackup-<?php echo $labelClass?>"><?php echo $label; ?></span>
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<script lang="text/javascript">
		var akeebabackupIcon = $('akadminicon');
		try {
			var akeebabackupIconParent = $('akadminicon').getParent().getParent();
			if (akeebabackupIconParent.attributes.class.textContent == 'panel') {
				akeebabackupIconParent.setStyle('display', 'none');
			}

			$('cpanel').grab(akeebabackupIcon);
		} catch (e) {}
	</script>
<?php else: ?>
	<div class="akcpanel">
		<div style="float:<?php echo ($lang->isRTL()) ? 'right' : 'left'; ?>;">
			<div class="icon <?php echo $extraclass ?>">
				<a href="<?php echo $url ?>">
					<img src="<?php echo JURI::base() ?>../media/com_akeeba/icons/<?php echo $image ?>"/>
					<span>
						<span class="mod_akeebabackup-component"><?php echo JText::_('MOD_AKEEBABACKUP_LBL_AKEEBA');?></span>
						<span class="mod_akeebabackup-<?php echo $labelClass?>"><?php echo $label; ?></span>
					</span>
				</a>
			</div>
		</div>
	</div>
<?php endif; ?>