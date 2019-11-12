<?php
/**
 *
 *
 * This is the view.html.php file for jobgroklist
 *
 * Created: November 11, 2014, 3:25 pm
 *
 * Subversion Details
 * $Date: 2014-03-15 12:20:49 -0500 (Sat, 15 Mar 2014) $
 * $Revision: 5857 $
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

jimport('joomla.application.component.view');
jimport('joomla.application.component.helper');

class JobgroklistViewDenied extends JViewLegacy

{

    function display($tpl = null)
    {
        $params = JComponentHelper::getParams('com_jobgroklist');
        $this->assignRef('params', $params);
        
        parent :: display($tpl);
    }
}
?>
