<?php
/**
 *
 *
 * This is the mod_jobgrokpostings.php file for jobgroklistpostings
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
defined( '_JEXEC') or die( 'Restricted access');

// Include the syndicate functions only once
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php');

$hello = modJobgroklistpostingsHelper::getJobgroklistpostings($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require( JModuleHelper::getLayoutPath( 'mod_jobgroklistpostings') );
