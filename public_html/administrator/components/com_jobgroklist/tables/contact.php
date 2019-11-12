<?php

/**
 *
 *
 * This is the contact.php table for jobgroklist
 *
 * Created: November 11, 2014, 3:25 pm
 *
 * Subversion Details
 * $Date: 2014-08-26 21:09:09 -0500 (Tue, 26 Aug 2014) $
 * $Revision: 6205 $
 * $Author: bobsteen $
 *
 * @author TK Tek, LLC. info@jobgrok.com
 * @version 3.1-1.2.58
 * @package com_jobgroklist
 *
  * @copyright Copyright {c} 2008-2014
 * @license GNU Public License Version 2
 *
 * This file is part of JobGrok.
 *
 * JobGrok is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * JobGrok is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with JobGrok.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

defined('_JEXEC') or die('Restricted access');

class TableContact extends JTable
{
/** @var int Primary Key */
    var $id = null;
    /** @var string Contact Name */
    var $contact = null;
    /** @var string Contact Email Name */
    var $contact_email = null;
    /** @var int Company Id */
    var $company_id = null;
    /** @var int Checked-out Owner */
    var $checked_out = null;
    /** @var string Checked-out Time */
    var $checked_out_time = null;
    /** @var string Parameters */
    var $params = null;
    /** @var ordering Order Position */
    var $ordering = null;
    /** @var int Number of Views */
    var $hits = null;
    /** @var int Published */
    var $published = null;
    var $_notices = null;

    /**
     * Constructor
     *
     * @param database Database Object
     *
     */
    function __construct (&$db)
    {
        parent::__construct('#__tst_jglist_contacts', 'id', $db);
    }

    /**
     * Validation
     *
     * @return boolean True if buffer is valid
     *
     */
    function check()
    {
        if (!$this->contact || !$this->contact_email)
        {
            $this->setError(JTEXT::_('COM_JOBGROKLIST_TABLES_CONTACT_CONTACT_CHECK'));
            return false;
        }
        return true;
    }

}

?>
