<?php

/**
 *
 *
 * This is the location.php controller for jobgroklist
 *
 * Created: November 11, 2014, 3:25 pm
 *
 * Subversion Details
 * $Date: 2013-07-15 20:50:45 -0500 (Mon, 15 Jul 2013) $
 * $Revision: 5323 $
 * $Author: jobgrok $
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
jimport('joomla.application.component.model');

/**
 *
 * Location Model
 *
 */

class JobgroklistModelLocation extends JModelLegacy

{
/**
 *
 * Location Id
 *
 * @var int
 *
 */
    var $_id;

    /**
     *
     * Location Data
     *
     * @var object
     *
     */
    var $_location;

    /**
     * Items total
     * @var integer
     */
    var $_total = null;

    /**
     * Pagination object
     * @var object
     */
    var $_pagination = null;

    /**
     *
     * Set query to pull data
     *
     */
    function _buildQuery()
    {
        $query = 'SELECT l.* FROM #__tst_jglist_locations l '.
            'LEFT JOIN #__tst_jglist_companies co ON l.company_id=co.id '.
            'LEFT JOIN #__tst_jglist_static_country ctry ON l.country_id=ctry.id '.
            "";
        return $query;
    }


    /**
     *
     * Retrieves the locations data
     *
     * @return array Array of objects containing locations data
     *
     */
    function & getData()
    {
        if (empty ($this->_location))
        {
            $query = $this->_buildQuery();
            $limitstart = $this->getState('limitstart');
            $limit = $this->getState('limit');
            $this->_location = $this->_getList($query, $limitstart, $limit);
        }

        return $this->_location;
    }

    /**
     * Method to set the location identifier
     *
     * @access    public
     * @param    int Location identifier
     * @return    void
     */
    function setId($id)
    {
    // Set id and wipe data
        $this->_id = $id;
        $this->_location = null;
    }
    /**
     *
     * Constructor
     *
     */
    function __construct()
    {
        parent :: __construct();

        // get the cid array from the default request hash
        $cid = JRequest :: getVar('cid', false, 'DEFAULT', 'array');
        if ($cid)
        {
            $id = $cid[0];
        }
        else
        {
            $id = JRequest :: getInt('id', 0);
        }
        $this->setId($id);

        global $option;
		$mainframe = JFactory::getApplication();

        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'));
        //$limitstart = $mainframe->getUserStateFromRequest($option.'.limitstart', 'limitstart', 0);

        //$limitstart = mosGetParam($_REQUEST, 'limitstart', 0);
        // Am I missing something, is this a hack, or an OK solution?
        $limitstart = JRequest::getVar('limitstart',0);

        // In case limit has been changed, adjust it
        $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
    }

    function getTotal()
    {
    // Load the content if it doesn't already exist
        if (empty($this->_total))
        {
            $query = $this->_buildQuery();
            $this->_total = $this->_getListCount($query);
        }
        return $this->_total;
    }

    function getPagination()
    {
    // Load the content if it doesn't already exist
        if (empty($this->_pagination))
        {
            jimport('joomla.html.pagination');

            $total = $this->getTotal();
            $limitstart = $this->getState('limitstart');
            $limit = $this->getState('limit');

            $this->_pagination = new JPagination($total, $limitstart, $limit);
        }
        return $this->_pagination;
    }

    /**
     * Method to delete record(s)
     *
     * @access    public
     * @return    boolean    True on success
     */
    function delete()
    {
        $cids = JRequest :: getVar('cid', array (
            0
            ), 'post', 'array');
        $row = $this->getTable();

        foreach ($cids as $cid)
        {
            if (!$row->delete($cid))
            {
                $this->setError($row->getErrorMsg());
                return false;
            }
        }

        return true;
    }
    function store()
    {
        $row = $this->getTable();

        $data = JRequest :: get('post');

        if (!$row->bind($data))
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }


        if (!$row->check())
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }


        if (!$row->store())
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        return true;
    }

    /**
     *
     * Gets Category data
     *
     * @return object
     *
     */
    function & getLocation()
    {
        if (!$this->_location && $this->_id != '')
        {
            $db = $this->getDBO();
            $query = "SELECT * FROM " . $db->quoteName('#__tst_jglist_locations') . " WHERE " .
                $db->quoteName('id') . " = " . $this->_id;
            ;
            $db->setQuery($query);
            $this->_location = $db->loadObject();
        }
        return $this->_location;
    }

    function copy()
    {

        $cids = JRequest :: getVar('cid', array (0), 'post', 'array');
        $row = $this->getTable();

        foreach ($cids as $cid)
        {
            $this->_location = null;
            $this->_id = $cid;
            $tmp = $this->getLocation();
            if (!$tmp)
            {
                $this->setError($row->getErrorMsg());
                return false;
            }
            $tmp->id = null;
            $tmp->location = "Copy of ".$tmp->location;
            $this->save($tmp);

        }
        return true;

    }

    /**
     *
     * Save a Location
     *
     */
    function save($data)
    {
        $table = $this->getTable();
        if (!$table->save($data))
        {
            $this->setError($table->getError());
            return false;
        }
        return true;
    }

    /**
     *
     * Increments the hit counter
     *
     */
    function hit()
    {
        $db = JFactory :: getDBO();
        $db->setQuery("UPDATE " . $db->quoteName('#__tst_jglist_locations') . " SET " .
            $db->quoteName('hits') . " = " . $db->quoteName('hits') . " + 1 " .
            "WHERE id = " . $this->_id);
        $db->query();
    }
}
?>
