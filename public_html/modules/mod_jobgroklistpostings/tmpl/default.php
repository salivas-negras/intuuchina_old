<?php
/**
 *
 *
 * This is the default.php file for jobgroklistpostings
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
defined( '_JEXEC') or die( 'Restricted access'); 

// COM_JOBGROKPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_POSTED

JHTML::addIncludePath('components'.DIRECTORY_SEPARATOR.'com_jobgroklist'.DIRECTORY_SEPARATOR.'helpers');

$language = JFactory::getLanguage();
$language->load('com_jobgroklistpostings');

$featured_jobs_only = $params->get('featured_jobs_only','1');
$max_return = $params->get('top_n', 5);
$closing_text = $params->get('no_posting_text','- No Current Openings -');
$show_company = $params->get('show_company',1);
$show_jobcode = $params->get('show_jobcode',1);
$show_location = $params->get('show_location',1);
$show_category = $params->get('show_category',1);
$show_department = $params->get('show_department',1);
$show_shift = $params->get('show_shift',1);
$show_payrate = $params->get('show_payrate',1);
$show_posting_date = $params->get('show_posting_date',1);
$show_closing_date = $params->get('show_closing_date',1); 
$show_company_label = $params->get('show_company_label',1);
$show_jobcode_label = $params->get('show_jobcode_label',1);
$show_location_label = $params->get('show_location_label',1);
$show_category_label = $params->get('show_category_label',1);
$show_department_label = $params->get('show_department_label',1);
$show_shift_label = $params->get('show_shift_label',1);
$show_payrate_label = $params->get('show_payrate_label',1);
$show_posting_date_label = $params->get('show_posting_date_label',1);
$show_closing_date_label = $params->get('show_closing_date_label',1); 
$company_id = $params->get('company_id','');
$category_id = $params->get('category_id','');
$left_padding = ($params->get('left_padding','')==''?'':"style='padding-left: ".$params->get('left_padding')."px;' ");
$layout = $params->get('mod_layout','normal');

$itemid = $params->get('menutype',0);
if ($itemid == 0) $itemid = JRequest::getInt('Itemid',0);
if ($itemid > 0) 
	$itemid_qry = "&Itemid=".$itemid;
else
	$itemid_qry = "";

$featured_jobs = " (";
if ($featured_jobs_only == '0') {
    $featured_jobs = " p.featured = 1 AND (";
}

$db = JFactory::getDBO();
$config = JFactory::getConfig();
$timenow = new JDate();
$mysqlTime = JHTML::_('date', $timenow,"Y-m-d G:i:s");
$cparams = JComponentHelper::getParams('com_jobgroklist');
$query = 'SELECT p.*, j.title, j.job_code, l.location, sc.category, d.department, s.shift, j.pay_rate, co.company FROM #__tst_jglist_postings p'.
                        ' LEFT JOIN #__tst_jglist_jobs j ON j.id = p.job_id'.
                        ' LEFT JOIN #__tst_jglist_locations l ON l.id = p.location_id'.
                        ' LEFT JOIN #__tst_jglist_departments d ON d.id = j.department_id'.
                        ' LEFT JOIN #__tst_jglist_shifts s ON s.id = j.shift_id'.
                        ' LEFT JOIN #__tst_jglist_categories c ON c.id = j.category_id'.
                        ' LEFT JOIN #__tst_jglist_static_category sc ON sc.id = c.code'.
                        ' LEFT JOIN #__tst_jglist_companies co ON co.id = p.company_id'.
                        ' WHERE '.$featured_jobs.
                        ($category_id==''?'':'c.id='.$category_id.' AND ').
                        ($company_id==''?'':'p.company_id='.$company_id.' AND ').
                        'p.published=1 AND ((\''.$mysqlTime.'\' BETWEEN p.posting_date AND ADDDATE(p.closing_date, INTERVAL '.$cparams->get('use_time_precision','1').' DAY)) OR '.
			'(\''.$mysqlTime.'\' >= p.posting_date AND (p.closing_date=\'0000-00-00 00:00:00\' AND p.posting_date <> \'0000-00-00 00:00:00\') OR '.
			'(\''.$mysqlTime.'\' <= ADDDATE(p.closing_date, INTERVAL '.$cparams->get('use_time_precision','1').' DAY) AND p.posting_date=\'0000-00-00 00:00:00\')))) '.
			'ORDER BY p.posting_date DESC LIMIT 0,'.$max_return;
$db->setQuery($query);
$options = $db->loadAssocList();

echo "<div class='jobgrok".$moduleclass_sfx."' id='jg_mod' ".$left_padding.">";

$rowcount = count($options);

if ($rowcount > 0) {
if ($layout == "list")
{
	echo "<ul>";
	foreach ($options as $row)
	{
	    $query_job_title = 'SELECT `title`, `alias` FROM #__tst_jglist_jobs WHERE `id`='.$row['job_id'];
            $db->setQuery($query_job_title);
            $job = $db->loadObject();
                
            // $title = JApplication::stringURLSafe(JHTML::_('jobgroklistpostings.posting',$row->id,true));
            $link = JRoute::_('index.php?option=com_jobgroklist&view=posting&id=' . $row['id'] . ':' . $job->alias . $itemid_qry, false);
            
            //  $link = JRoute::_('index.php?option=com_jobgroklist&view=posting&id='.$row['id'].$itemid_qry);
        	echo "<li>";
        	echo "<a href='".$link."'>".$job->title.($show_jobcode=='1'?'&nbsp;('.$row['job_code'].')':'')."</a><br />";
                if ( $show_company == '1' ) echo ($show_company_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_COMPANY').":&nbsp;":'').$row['company']."<br />";
                if ( $show_location == '1' ) echo ($show_location_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_LOCATION').":&nbsp;":'').$row['location']."<br />";
                if ( $show_category == '1' ) echo ($show_category_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_CATEGORY').":&nbsp;":'').$row['category']."<br />";
                if ( $show_department == '1' ) echo ($show_department_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_DEPARTMENT').":&nbsp;":'').$row['department']."<br />";
                if ( $show_shift == '1' ) echo ($show_shift_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_SHIFT').":&nbsp;":'').$row['shift']."<br/>";
                if ( $show_payrate == '1' ) echo ($show_payrate_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_PAY_RATE').":&nbsp;":'').$row['pay_rate']."<br/>";
                if ( $show_posting_date == '1' && isset($row['posting_date']) && $row['posting_date'] != '0000-00-00 00:00:00') echo "<small>".($show_posting_date_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_POSTED').": ":'').strftime('%B %e, %Y',strtotime($row['posting_date']))."</small><br />";
        	if ( $show_closing_date == '1' && isset($row['closing_date']) && $row['closing_date'] != '0000-00-00 00:00:00') echo "<small>".($show_closing_date_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_CLOSING').": ":'').strftime('%B %e, %Y',strtotime($row['closing_date']))."</small><br />";
		echo "</li>";
	}
	echo "</ul>";
}

if ($layout == "horizontal")
{
	$width = (int)(95 / $max_return);

	echo '<div style="width: 100%">';
	foreach ($options as $row)
	{
	    $query_job_title = 'SELECT `title`, `alias` FROM #__tst_jglist_jobs WHERE `id`='.$row['job_id'];
            $db->setQuery($query_job_title);
            $job = $db->loadObject();
                
            // $title = JApplication::stringURLSafe(JHTML::_('jobgroklistpostings.posting',$row->id,true));
            $link = JRoute::_('index.php?option=com_jobgroklist&view=posting&id=' . $row['id'] . ':' . $job->alias . $itemid_qry, false);
            
            //  $link = JRoute::_('index.php?option=com_jobgroklist&view=posting&id='.$row['id'].$itemid_qry);
        	echo "<div style='float: left; width: ".$width."%;'>";
        	echo "<a href='".$link."'>".$job->title.($show_jobcode=='1'?'&nbsp;('.$row['job_code'].')':'')."</a><br />";
                if ( $show_company == '1' ) echo ($show_company_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_COMPANY').":&nbsp;":'').$row['company']."<br />";
                if ( $show_location == '1' ) echo ($show_location_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_LOCATION').":&nbsp;":'').$row['location']."<br />";
                if ( $show_category == '1' ) echo ($show_category_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_CATEGORY').":&nbsp;":'').$row['category']."<br />";
                if ( $show_department == '1' ) echo ($show_department_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_DEPARTMENT').":&nbsp;":'').$row['department']."<br />";
                if ( $show_shift == '1' ) echo ($show_shift_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_SHIFT').":&nbsp;":'').$row['shift']."<br/>";
                if ( $show_payrate == '1' ) echo ($show_payrate_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_PAY_RATE').":&nbsp;":'').$row['pay_rate']."<br/>";
                if ( $show_posting_date == '1' && isset($row['posting_date']) && $row['posting_date'] != '0000-00-00 00:00:00') echo "<small>".($show_posting_date_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_POSTED').": ":'').strftime('%B %e, %Y',strtotime($row['posting_date']))."</small><br />";
        	if ( $show_closing_date == '1' && isset($row['closing_date']) && $row['closing_date'] != '0000-00-00 00:00:00') echo "<small>".($show_closing_date_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_CLOSING').": ":'').strftime('%B %e, %Y',strtotime($row['closing_date']))."</small><br />";
		echo "</div>";
	}
	echo "</div><div style='clear: both; margin: 0 auto;'> </div>";
}

if ($layout == "normal")
{
	foreach ($options as $row)
	{
	    $query_job_title = 'SELECT `title`, `alias` FROM #__tst_jglist_jobs WHERE `id`='.$row['job_id'];
            $db->setQuery($query_job_title);
            $job = $db->loadObject();
                
            // $title = JApplication::stringURLSafe(JHTML::_('jobgroklistpostings.posting',$row->id,true));
            $link = JRoute::_('index.php?option=com_jobgroklist&view=posting&id=' . $row['id'] . ':' . $job->alias . $itemid_qry, false);
            
            //  $link = JRoute::_('index.php?option=com_jobgroklist&view=posting&id='.$row['id'].$itemid_qry);
        	echo "<a href='".$link."'>".$job->title.($show_jobcode=='1'?'&nbsp;('.$row['job_code'].')':'')."</a><br />";
                if ( $show_company == '1' ) echo ($show_company_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_COMPANY').":&nbsp;":'').$row['company']."<br />";
                if ( $show_location == '1' ) echo ($show_location_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_LOCATION').":&nbsp;":'').$row['location']."<br />";
                if ( $show_category == '1' ) echo ($show_category_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_CATEGORY').":&nbsp;":'').$row['category']."<br />";
                if ( $show_department == '1' ) echo ($show_department_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_DEPARTMENT').":&nbsp;":'').$row['department']."<br />";
                if ( $show_shift == '1' ) echo ($show_shift_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_SHIFT').":&nbsp;":'').$row['shift']."<br/>";
                if ( $show_payrate == '1' ) echo ($show_payrate_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_PAY_RATE').":&nbsp;":'').$row['pay_rate']."<br/>";
                if ( $show_posting_date == '1' && isset($row['posting_date']) && $row['posting_date'] != '0000-00-00 00:00:00') echo "<small>".($show_posting_date_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_POSTED').": ":'').strftime('%B %e, %Y',strtotime($row['posting_date']))."</small><br />";
        	if ( $show_closing_date == '1' && isset($row['closing_date']) && $row['closing_date'] != '0000-00-00 00:00:00') echo "<small>".($show_closing_date_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_CLOSING').": ":'').strftime('%B %e, %Y',strtotime($row['closing_date']))."</small><br />";		echo "<br />";
	}
}

if ($layout == "table")
{
	foreach ($options as $row)
	{
	    $query_job_title = 'SELECT `title`, `alias` FROM #__tst_jglist_jobs WHERE `id`='.$row['job_id'];
            $db->setQuery($query_job_title);
            $job = $db->loadObject();
                
            // $title = JApplication::stringURLSafe(JHTML::_('jobgroklistpostings.posting',$row->id,true));
            $link = JRoute::_('index.php?option=com_jobgroklist&view=posting&id=' . $row['id'] . ':' . $job->alias . $itemid_qry, false);
            
            //  $link = JRoute::_('index.php?option=com_jobgroklist&view=posting&id='.$row['id'].$itemid_qry);
			
        	echo "<table>";
        	echo "<th>";      	
        	echo "<a href='".$link."'>".$job->title.($show_jobcode=='1'?'&nbsp;('.$row['job_code'].')':'')."</a>";
        	echo "</th>";

                if ($show_company == '1') {
                    echo "<tr><td>";
                    echo ($show_company_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_COMPANY').":&nbsp;":'').$row['company'];
                    echo "</td></tr>";
                }
            
                if ( $show_location == '1' ) {
                    echo "<tr><td>";
                    echo ($show_location_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_LOCATION').":&nbsp;":'').$row['location'];
                    echo "</td></tr>";
                }
                
                if ( $show_category == '1' ) {
                    echo "<tr><td>";
                    echo ($show_category_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_CATEGORY').":&nbsp;":'').$row['category'];
                    echo "</td></tr>";
                }
                
                if ( $show_department == '1' ) {
                    echo "<tr><td>";
                    echo ($show_department_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_DEPARTMENT').":&nbsp;":'').$row['department'];
                    echo "</td></tr>";
                }
                
                if ( $show_shift == '1' ) {
                    echo "<tr><td>";
                    echo ($show_department_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_SHIFT').":&nbsp;":'').$row['shift'];
                    echo "</td></tr>";
                }
                
                if ( $show_payrate == '1' ) {
                    echo "<tr><td>";
                    echo ($show_payrate_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_PAY_RATE').":&nbsp;":'').$row['pay_rate'];
                    echo "</td></tr>";
                }
                
		if ( $show_posting_date == '1' && isset($row['posting_date']) && $row['posting_date'] != '0000-00-00 00:00:00') {
                    echo "<tr><td>";
                    echo "<small>".($show_posting_date_label=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_POSTED').": ":'').strftime('%B %e, %Y',strtotime($row['posting_date']))."</small>";
                    echo "</td></tr>";
		}
			
        	if ( $show_closing_date == '1' && isset($row['closing_date']) && $row['closing_date'] != '0000-00-00 00:00:00') {
        		echo "<tr><td>";
        		echo "<small>".($show_closting_date=='1'?JTEXT::_('COM_JOBGROKLISTPOSTINGS_MODULES_MOD_JOBGROKPOSTINGS_TMPL_DEFAULT_CLOSING').": ":'').strftime('%B %e, %Y',strtotime($row['closing_date']))."</small>";
        		echo "</td></tr>";
        	}
                
		echo "<br />";
		echo "</table>";
	}
}

} else {
    
    echo "<span id='no_posting_text'>".$closing_text."</span>";
    
}
echo "</div>";
?>
