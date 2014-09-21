<?php

if(!function_exists('include_sidebar')){
	
	function include_sidebar($addon = '', $data = array()) {
		
        @extract($data);
        
		if(strlen($addon)) {
			
			require_once(FCPATH.'application/views/sidebar-'.$addon.'.php');
		} else {
			
			require_once(FCPATH.'application/views/sidebar.php');
		}
		
	}
}

if(!function_exists('list_admin_menu')) {
	
	function list_admin_menu() {
		$CI =& get_instance();
		$active = $CI->uri->segment(1);
		$sub = $CI->uri->segment(2);

		if($sub == 'page')
		{
			$sub = '';
		}
		
		$menu = array(
			array('name' => 'Dashboard',
				'controllers' => array(''),
				'link' => ''),
			array('name' => 'Admin',
				'controllers' => array('admin'),
				'link' => 'controller_admin',
				'links' => array(
					'General' => 'admin/general',
					'Account Codes' => 'admin/account_codes',
					'Discretionary Accounts' => 'admin/discretionary_accounts',
                    'Office Locations' => 'admin/locations',
					// 'Reference Agencies' => 'admin/reference_agencies',
                    'User Settings' => 'admin/user_settings',
                    // 'LasrMetrics Settings' => 'admin/lasrmetrics_settings',
					'Calendar Settings' => 'admin/calendar_settings'
				)
			),
			array('name' => 'Users',
				'controllers' => array('users'),
				'link' => 'controller_users',
				'links' => array(
                    'My Profile' => 'users/my_profile',
					'Users List' => 'users',
					'Add User' => 'users/add',
                    'Manage Roles' => 'users/manage_roles',
				)
			),
            array('name' => 'Chapter Financials',
            	'controllers' => array('projects', 'budget'),
                'link' => 'controller_projects',
                'links' => array(
                	'Budgets' => array(
                		'Budget Managers' => 'budget'
                		),
                	'Projects' => array(
	                    'General Fund Projects' => 'projects/general_fund',
	                    'Grant Actuals' => 'projects/grant_actuals'
                    )
                )
            ),
            array('name' => 'Chapter Procurement',
            	'controllers' => array('procurement'),
            	'link' => 'controller_procurement',
            	'links' => list_templates()
            ),
            array('name' => 'Timesheet',
            	'controllers' => array('timesheet'),
            	'link' => 'controller_timesheet',
            	'links' => array(
            		'Timesheets' => 'timesheet',
            		'New Timesheet' => 'timesheet/new_timesheet',
            		'My Timesheets' => 'timesheet/my_timesheets',
            		'Templates' => 'timesheet/template_list',
            		'New Template' => 'timesheet/new_template',
                    'Manage Emails' => 'timesheet/emails'
            	)
            ),
            array('name' => 'Time Off',
            	'controllers' => array('timeoff'),
            	'link' => 'controller_timeoff',
            	'links' => array(
            		'Time Off Requests' => 'timeoff',
            		'My Requests' => 'timeoff/my_timeoff_requests',
            		'Request Time Off' => 'timeoff/new_timeoff_request',
                    'Manage Emails' => 'timeoff/emails'
            	)
            ),
            array('name' => 'Travel Reimbursement',
            	'controllers' => array('travel'),
            	'link' => 'controller_travel',
            	'links' => array(
            		'Recent Reimbursement' => 'travel',
            		'New Reimbursement Request' => 'travel/new_travel_request',
            		'My Travel Reimbursements' => 'travel/my_travel_requests',
                    'Manage Emails' => 'travel/emails'
            	)
            ),
            array('name' => 'Labor Accounts',
            	'controllers' => array('labor'),
            	'link' => 'controller_labor',
            	'links' => array(
            		'Accounts' => 'labor',
            		'New Account' => 'labor/new_account'
            	)
            ),
            // array('name' => 'Helpline',
            // 	'controllers' => array('helpline'),
            // 	'link' => 'controller_helpline',
            // 	'links' => array(
            // 		'Intakes' => 'helpline',
            // 		'New Log' => 'helpline/new_profile',
            // 		//'Resource Referrals' => 'helpline/referrals'
            // 	)
            // ),
            array('name' => 'Volunteers',
            	'controllers' => array('volunteers'),
            	'link' => 'controller_volunteers',
            	'links' => array(
            		'List' => 'volunteers',
            		'New' => 'volunteers/add',
            	)
            ),
            array('name' => 'Grants',
            	'controllers' => array('grants'),
            	'link' => 'controller_grants',
            	'links' => array(
            		'List' => 'grants',
            		'New' => 'grants/add',
            	)
            ),
            // array('name' => 'LasrMetrics',
            // 	'controllers' => array('lasrmetrics'),
            // 	'link' => 'controller_lasrmetrics',
            // 	'links' => array(
            // 		'Safe Return' => 'lasrmetrics/safe_return',
            // 		'Support Group' => 'lasrmetrics/support_group',
            // 		'Education Program' => 'lasrmetrics/education_program',
            // 		'Outreach' => 'lasrmetrics/outreach',
            // 		'Care Consultation' => 'lasrmetrics/care_consultation',
            // 		'Online Education' => 'lasrmetrics/online_education',
            // 		'Engagement Program' => 'lasrmetrics/engagement_program'
            // 	)
            // ),
            array('name' => 'Resource Calendar',
                'controllers' => array('calendar'),
                'link' => 'controller_calendar',
                'links' => array(
                    'View Calendar' => 'calendar',
                    'Reserve Resource' => 'calendar/reserve',
                    'My Reservations' => 'calendar/my_reservations'
                )
            ),
		);
		
		echo '<div class="menu ui-accordion ui-widget ui-helper-reset ui-accordion-icons">';
		foreach($menu as $m) 
		{
			if(can_this_user($m['link']) || $m['link'] == '')
            {
    			echo '<h3 class="ui-accordion-header ui-helper-reset ui-state-default'. ((in_array($active, $m['controllers']))? ' ui-state-active' : '').'"><span class="ui-icon ui-icon-triangle-1-'. ((in_array($active, $m['controllers']))? 's' : 'e').'"></span>'.anchor($m['link'], $m['name'], 'class="topLevel"').'</h3>';

    			if(array_key_exists('links', $m)) {

    				echo '<div class="subMenu'. ((in_array($active, $m['controllers']))? ' ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active ui-state-hover' : ' ui-state-hover').'">';
    				echo '<ul class="subMenuList">';
    				foreach($m['links'] as $name => $link) {
    					if(@can_this_user($link) || is_array($link))
                        {
        					if(!is_array($link)) 
        					{
        						$class = ((($link == $active.(($sub != '')? '/'.$sub : '')))? 'class="active"' : '');
        						echo '<li>'.anchor($link, ucwords($name), $class).'</li>';
        					}
        					else
        					{
        						$class = ((($link == $active.(($sub != '')? '/'.$sub : '')))? 'class="active"' : '');
        						echo '<li>'.$name;
        							echo '<ul>';
        								foreach($link as $n => $l) 
        								{
                                            if(can_this_user($l))
                                            {
        									   $class = ((($l == $active.(($sub != '')? '/'.$sub : '')))? 'class="active"' : '');
        									   echo '<li>'.anchor($l, ucwords($n), $class).'</li>';
                                            }
        								}
        							echo '</ul>';
        						echo '</li>';
        					}
                        }
    				}
    				echo '</ul>';
    				echo '</div>';
    			}
            }
		}
		echo '</div>';
        echo '<p>'.anchor('logout', 'LOGOUT', 'class="button"').'</p>';
	}
    
    function check_valid_patient($mId) 
    {
        $valid = TRUE;
        $CI =& get_instance();
        $CI->db->where('MemberId', $mId);
        $test = $CI->db->get('verify_patient');
        
        if($test->num_rows() == 0) {
            $valid = FALSE;
        }
        
        foreach($test->result() as $row) {
            foreach($row as $val) {
            
                if((!is_numeric($val)) || ($val == 0)) {
                if(($val != 'valid')) {
                    $valid = FALSE;
                }
                }
            }
        }
        
        return $valid;
    }
}

if(!function_exists('column_header_sort')) 
{
	function column_header_sort($column, $dir, $page_segment, $page = '') {
		$CI =& get_instance();
		
		if($CI->uri->segment($page_segment) == $column || $CI->uri->segment($page_segment+1) == $column) {
			$class = $dir;
			$dir = ($dir == 'asc') ? 'desc' : 'asc';
		} else {
			$class = 'no_dir';
		}
		
		if(strlen($CI->uri->segment($page_segment)) && preg_match('/[(0-9)+]/', $CI->uri->segment($page_segment))) {
			return '<a href="'.site_url(''.$page.$CI->uri->segment($page_segment).'/'.$column.'/'.$dir).'" class="'.$class.' sort"></a>';
		} else {
			return '<a href="'.site_url(''.$page.$column.'/'.$dir).'" class="'.$class.' sort"></a>';
		}
		
	}
}

function list_templates() 
{
	$CI =& get_instance();

	$list = array(
		'Current Orders' => 'procurement',
        'All Orders' => 'procurement/all_orders',
		'My Orders' => 'procurement/my_orders',
        'Manage Emails' => 'procurement/emails',
		'Templates' => 'procurement/templates',
	);

	$templates = $CI->procurement_model->get_templates();

	foreach($templates as $t) {
		$list[$t->template_name] = 'procurement/new_order/'.$t->ID;
	}
    
	return $list;
}