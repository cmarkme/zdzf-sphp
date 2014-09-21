<?php 
$config['theme'] = 'default';

$config['site_name'] = "Alzheimer's Association";

$config['paginiation_segment'] = '3';

$config['pagination_per_page'] = 20;

$config['empty_message'] = 'Sorry there are no entries yet';

$config['gender'] = array('select' => 'Select', 'Male' => 'Male', 'Female' => 'Female');

$config['ethnicity'] = array('select' => 'Select', 'Caucasian' => 'Caucasian', 'Latino' => 'Latino', 'African American' => 'African American', 'API' => 'API', 'Other' => 'Other');

$config['relationship'] = array('select' => 'Select', 'Adult Child' => 'Adult Child', 'Spouse/Partner' => 'Spouse/Partner', 'Sibling' => 'Sibling', 'Grandchild' => 'Grandchild', 'Relative' => 'Relative', 'In-Law' => 'In-Law', 'Self' => 'Self', 'Friend' => 'Friend', 'Healthcare Provider' => 'Healthcare Provider', 'Other' => 'Other');

$config['education'] = array('select' => 'Select', 'High School' => 'High School', 'College' => 'College', 'Graduate Degree' => 'Graduate Degree', 'Other' => 'Other', 'Declined' => 'Declined');

$config['theme_style'] = site_url('themes/default/css/smoothness/jquery-ui-1.8.18.custom.css');

$config['local_travel_account'] = 6644;

$config['ot_travel_accounts'] = array('airfare' => 6641, 'hotel' => 6642, 'transit' => 6645, 'meals' => 6646, 'misc' => 6649);

$config['timesheet_account'] = 6111;

$config['produrement_account'] = 6311;

$config['cap_list'] = array(
            array('name' => 'Admin',
            	'controller' => 'controller_admin',
                'subs' => array(
                    'admin/general' => 'General Settings',
                    'admin/account_codes' => 'Account Codes',
                    'admin/discretionary_accounts' => 'Discretionary Accounts',
                    'admin/locations' => 'Office Locations',
                    // 'admin/reference_agencies' => 'Reference Agencies',
                    'admin/user_settings' => 'User Settings',
                    // 'admin/lasrmetrics_settings' => 'LasrMetrics Settings',
                    'admin/calendar_settings' => 'Calendar Settings',
                    )
            ),array('name' => 'Users',
            	'controller' => 'controller_users',
                'subs' => array(
                    'users' => 'View User List',
                    'users/add' => 'Add User',
                    'users/edit' => 'Edit Users',
                    'users/delete' => 'Delete Users',
                    'users/manage_roles' => 'Manage Roles',
                    'users/add_role' => 'Add Roles',
                    'users/edit_role' => 'Edit Roles',
                    'users/delete_role' => 'Delete Roles',
                    'users_set_salary' => 'Set a users salary',
                    'users_set_fulltime' => 'Set a users fulltime status'
                    )
            ),array('name' => 'Chapter Financials Budget',
            	'controller' => 'controller_budget',
                  'subs' => array(
                        'budget' => 'Budget Managers',
                        'budget/create' => 'Create Budget',
                        'budget/edit' => 'Edit Budget',
                        'budget/edit/all' => 'Edit All Budgets',
                        'budget/delete' => 'Delete Budget',
                        'budget/delete/all' => 'Delete All Budgets',                        
                    	'handle_budget_admin_labor' => 'Handle Budget Administrative Labor'
                  )
            ),array('name' => 'Chapter Financials Projects',
                  'controller' => 'controller_projects',
                	'subs' => array(
                        'projects/general_fund' => 'General Fund Projects',
                        'projects/grant_actuals' => 'Grant Actuals',
                        'projects/new_budget' => 'Create New Project',
                        'projects/view' => 'Edit Project',
                        'projects/delete' => 'Delete Project',
                  )
            ),array('name' => 'Chapter Procurement',
            	'controller' => 'controller_procurement',
            	'subs' => array(
            		'procurement' => 'View Current Orders',
                    'procurement/all_orders' => 'View All Orders',
            		'procurement/my_orders' => 'View My Orders',
            		'procurement/templates' => 'View Template List',
            		'procurement/new_template' => 'Add Template',
                    'procurement/edit_template' => 'Edit Template',
            		'procurement/delete_template' => 'Delete Template',
            		'procurement/new_order' => 'Create Order',
            		'procurement/edit_order' => 'Edit Order',
            		'procurement/edit_order/all' => 'Edit All Orders',
            		'procurement/delete_order' => 'Delete Order',
            		'procurement/delete_order/all' => 'Delete All Orders',
            		'procurement/emails' => 'Manage Emails',
                    'procurement/download' => 'Export CSV'
            	)
            ),array('name' => 'Timesheet',
            	'controller' => 'controller_timesheet',
            	'subs' => array(
            		'timesheet' => 'Timesheets List',
            		'timesheet/new_timesheet' => 'New Timesheet',
                    'timesheet/edit' => 'Edit Timesheet',
            		'timesheet/edit/all' => 'Edit Any Timesheet',
            		'timesheet/my_timesheets' => 'My Timesheets List',
            		'timesheet/template_list' => 'Templates List',
            		'timesheet/new_template' => 'New Template',
            		'timesheet/edit_template' => 'Edit Template',
                    'timesheet/delete' => 'Delete Timesheet',
                    'timesheet/delete/all' => 'Delete Any Timesheet',
            		'timesheet/delete_template' => 'Delete Template',
            		'timesheet/view' => 'View Details But Not Edit Form',
                    'approve_timesheet' => 'Approve Timesheet',
                    'new_from_tempalte' => 'Create Timesheet from Template',
                    'set_timesheet_pay_period' => 'Change Pay Period Date',
                    'set_timesheet_manager' => 'Set the Manager',
                    'timesheet/emails' => 'Manage Emails',
                    'timesheet/download' => 'Export CSV'
            	)
            ),array('name' => 'Time Off',
            	'controller' => 'controller_timeoff',
            	'subs' => array(
            		'timeoff' => 'Time Off Requests List',
            		'timeoff/my_timeoff_requests' => 'My Requests List',
            		'timeoff/new_timeoff_request' => 'Request Time Off',
                    'timeoff/edit' => 'Edit Request',
            		'timeoff/edit/all' => 'Edit All Request',
                    'timeoff/delete' => 'Delete Request',
            		'timeoff/delete/all' => 'Delete All Request',
                    'timeoff/view' => 'View Details But Not Edit Form',
                    'timeoff/emails' => 'Manage Emails',
                    'timeoff/download' => 'Export CSV'
            	)
            ),array('name' => 'Travel Reimbursement',
            	'controller' => 'controller_travel',
            	'subs' => array(
            		'travel' => 'Recent Reimbursement',
            		'travel/my_travel_requests' => 'My Travel Reimbursements',
            		'travel/new_travel_request' => 'New Reimbursement Request',
                    'travel/edit' => 'Edit Reimbursement Request',
            		'travel/edit/all' => 'Edit All Reimbursement Request',
                    'travel/delete' => 'Delete Reimbursement Request',
            		'travel/delete/all' => 'Delete All Reimbursement Request',
                    'travel/view' => 'View Details But Not Edit Form',
                    'approve_travel' => 'Approve Travel Expense',
                    'travel/emails' => 'Manage Emails',
                    'travel/download' => 'Export CSV'
            	)
            ),array('name' => 'Labor Accounts',
            	'controller' => 'controller_labor',
            	'subs' => array(
            		'labor' => 'Accounts',
            		'labor/new_account' => 'New Account',
            		'labor/edit_account' => 'Edit Account'
            	)
            ),
            // array('name' => 'Helpline',
            // 	'controller' => 'controller_helpline',
            // 	'subs' => array(
            // 		'helpline' => 'Intakes',
            // 		'helpline/new_profile' => 'New Log',
            // 		'helpline/profile' => 'Edit Log'
            // 	)
            // ),
            array('name' => 'Volunteers',
            	'controller' => 'controller_volunteers',
            	'subs' => array(
            		'volunteers' => 'List',
            		'volunteers/add' => 'New',
            		'volunteers/edit' => 'Edit',
            		'volunteers/delete' => 'Delete'
            	)
            ),array('name' => 'Grants',
            	'controller' => 'controller_grants',
            	'subs' => array(
            		'grants' => 'View List',
            		'grants/add' => 'Add New',
            		'grants/edit' => 'Edit',
            		'grants/delete' => 'Delete',
                    'manage_funding_history' => 'Manage Funding History'
            	)
            ),
            // array('name' => 'LasrMetrics',
            // 	'controller' => 'controller_lasrmetrics',
            // 	'subs' => array(
            // 		'lasrmetrics/safe_return' => 'Safe Return',
            // 		'lasrmetrics/safe_return/new' => 'Add Safe Return',
            // 		'lasrmetrics/safe_return/edit' => 'Edit Safe Return',
            // 		'lasrmetrics/safe_return/delete' => 'Delete Safe Return',
            // 		'lasrmetrics/support_group' => 'Support Group',
            // 		'lasrmetrics/support_group/new' => 'Add Support Group',
            // 		'lasrmetrics/support_group/edit' => 'Edit Support Group',
            // 		'lasrmetrics/support_group/delete' => 'Delete Support Group',
            // 		'lasrmetrics/education_program' => 'Education Program',
            // 		'lasrmetrics/education_program/new' => 'Add Education Program',
            // 		'lasrmetrics/education_program/edit' => 'Edit Education Program',
            // 		'lasrmetrics/education_program/delete' => 'Delete Education Program',
            // 		'lasrmetrics/outreach' => 'Outreach',
            // 		'lasrmetrics/outreach/new' => 'Add Outreach',
            // 		'lasrmetrics/outreach/edit' => 'Edit Outreach',
            // 		'lasrmetrics/outreach/delete' => 'Delete Outreach',
            // 		'lasrmetrics/care_consultation' => 'Care Consultation',
            // 		'lasrmetrics/care_consultation/new' => 'Add Care Consultation',
            // 		'lasrmetrics/care_consultation/edit' => 'Edit Care Consultation',
            // 		'lasrmetrics/care_consultation/delete' => 'Delete Care Consultation',
            // 		'lasrmetrics/online_education' => 'Online Education',
            // 		'lasrmetrics/online_education/new' => 'Add Online Education',
            // 		'lasrmetrics/online_education/edit' => 'Edit Online Education',
            // 		'lasrmetrics/online_education/delete' => 'Delete Online Education',
            // 		'lasrmetrics/engagement_program' => 'Engagement Program',
            // 		'lasrmetrics/engagement_program/new' => 'Add Engagement Program',
            // 		'lasrmetrics/engagement_program/edit' => 'Edit Engagement Program',
            // 		'lasrmetrics/engagement_program/delete' => 'Delete Engagement Program',
            // 		'lasrmetrics/statistics' => 'Statistics',
            // 		'lasrmetrics/statistics/new' => 'Add Statistics',
            // 		'lasrmetrics/statistics/edit' => 'Edit Statistics',
            // 		'lasrmetrics/statistics/delete' => 'Delete Statistics'
            // 	)
            // ),
            array('name' => 'Resource Calendar',
                'controller' => 'controller_calendar',
                'subs' => array(
                    'calendar' => 'View Full Calendar',
                    'calendar/reserve' => 'Reserve Resource',
                    'calendar/my_reservations' => 'View My Reservations',
                    'calendar/edit' => 'Edit Resource',
                    'calendar/edit/all' => 'Edit Others Reservations',
                    'calendar/delete' => 'Delete Reservations',
                    'calendar/delete/all' => 'Delete Others Reservations',
                )
            ),
            array('name' => 'Section Specific',
                'controller' => 'controller_specific',
                'subs' => array(
                    'change_status' => 'Change Form Status',
                    'view_salary_calculations' => 'View Salary Calculations',
                    'set_all_da_values' => 'Set All Discretionary Account Values',
                )
            )
        );