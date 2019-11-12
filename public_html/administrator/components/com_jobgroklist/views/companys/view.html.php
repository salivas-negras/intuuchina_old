<?php
/**
 *
 *
 * This is the view.html.php file for jobgroklist
 *
 * Created: November 11, 2014, 3:25 pm
 *
 * Subversion Details
 * $Date: 2013-07-15 21:31:13 -0500 (Mon, 15 Jul 2013) $
 * $Revision: 5325 $
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

jimport('joomla.application.component.view');

/**
 * 
 * Company View
 * 
 */
class JobgroklistViewCompanys extends JViewLegacy
{
	/**
	 * 
	 * Renders the View
	 * 
	 */
	function display($tpl = null)
	{

		global $option;
		$mainframe = JFactory::getApplication();
	
		JToolBarHelper :: title(JTEXT::_('COM_JOBGROKLIST_VIEWS_COMPANYS_VIEW_HTML_COMPANIES'),'company');
		JToolBarHelper :: addNew();
		JToolBarHelper :: editList();
		JToolBarHelper :: custom('copy','copy.png','copy_f2.png',JTEXT::_('COM_JOBGROKLIST_VIEWS_COMPANYS_VIEW_HTML_COPY'));
		JToolBarHelper :: deleteList();
		JToolBarHelper :: cancel();

		$items = $this->get('Data');
		$this->assignRef('items', $items);

		$pagination = $this->get('Pagination');
		$this->assignRef('pagination', $pagination);


		parent :: display($tpl);
	}
}
?>
