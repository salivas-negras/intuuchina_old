<?php
/**
 *
 *
 * This is the helper.php file for jobgroklistpostings
 *
 * Created: March 23, 2014, 9:05 pm
 *
 * Subversion Details
 * $Date: 2010-04-16 19:42:38 -0500 (Fri, 16 Apr 2010) $
 * $Revision: 1784 $
 * $Author: jobgrok $
 *
 * @author TK Tek, LLC. info@jobgrok.com
 * @version 3.1-1.0.12
 * @package com_jobgroklistpostings
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

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
* Helper class for Hello World module
*
* Provides data retrieval functions for the Hello World Module.
*
* @package		mod_helloworld
*/
class modJobgroklistpostingsHelper
{
	/**
	 * Retrieves the hello message
	 *
	 * @param array $params An object containing the module parameters
	 * @access public
	 */	
public static function getJobgroklistpostings(&$params)
	{
		$my_html = "<table width='100%'><tr><td>getJobgrokpostings</td></tr></table>";
		return $my_html;
	}
}
