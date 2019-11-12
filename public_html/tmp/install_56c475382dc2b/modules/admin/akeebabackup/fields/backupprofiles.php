<?php
/**
 * @package    AkeebaBackup
 * @subpackage backuponupdate
 * @copyright  Copyright (c)2009-2016 Nicholas K. Dionysopoulos
 * @license    GNU General Public License version 3, or later
 *
 * @since      3.11.1
 */

defined('_JEXEC') or die();

if (class_exists('JFormFieldBackupprofiles'))
{
	return;
}

/**
 * Our main element class, creating a multi-select list out of an SQL statement
 */
class JFormFieldBackupprofiles extends JFormField
{
	/**
	 * Element name
	 *
	 * @access    protected
	 * @var        string
	 */
	var $_name = 'Backupprofiles';

	function getInput()
	{
		$db = JFactory::getDBO();

		$query = $db->getQuery(true)
			->select(array(
				$db->nameQuote('id'),
				$db->nameQuote('description'),
			))->from($db->nameQuote('#__ak_profiles'));
		$db->setQuery($query);
		$key = 'id';
		$val = 'description';

		$objectList = $db->loadObjectList();

		if (!is_array($objectList))
		{
			$objectList = array();
		}

		return JHTML::_('select.genericlist', $objectList, $this->name, 'class="inputbox"', $key, $val, $this->value, $this->id);
	}
}