<?php

function set_title($title) 
{
    $CI =& get_instance();
    
	$CI->title .= ' - '.$title;
}

function show_title() 
{
	$CI =& get_instance();
	echo $CI->title;
}

function get_theme_style() 
{
	$CI =& get_instance();
	echo $CI->theme_style;
}

function do_header() {
    global $header;
    
    echo $header;
    
}

function get_sort_link($link, $col, $tab = '')
{
	$CI =& get_instance();
	$get = $CI->input->get();
	$class = 'ui-icon-triangle-2-n-s';
	$query = '';
	$caught = false;

	if(isset($get['sort']) && is_array($get['sort']))
	{
		foreach($get['sort'] as $key => $s)
		{
			$s = explode('|', $s);

			if($s[0] == $col)
			{
				$caught = true;
				$get['sort'][$key] = $col.'|';

				switch($s[1])
				{
					case 'asc':
						$get['sort'][$key] .= 'desc';
						$class = 'ui-icon-triangle-1-n';
					break;

					case 'desc':
						unset($get['sort'][$key]);
						$class = 'ui-icon-triangle-1-s';
					break;

					default:
						$get['sort'][$key] .= 'asc';
					break;
				}
			}
		}
	}

	if(!$caught)
	{
		$get['sort'][] = $col.'|asc';
	}

	if(http_build_query($get))
	{
		$query = '?'.http_build_query($get);
	}

	$title = ucwords(str_replace('_', ' ', $col));

	return anchor($CI->uri->uri_string().$query.$tab, ' ', "class='list-sort ui-icon {$class}' title='Sort by {$title}'");
}

function get_csv_download_link($module, $user_id = 0)
{
	$CI =& get_instance();
	$get = $CI->input->get();
	$query = '';

	$get['user_id'] = $user_id;

	if(http_build_query($get))
	{
		$query = '?'.http_build_query($get);
	}

	return anchor(site_url($module.'/download').$query, 'Download List as CSV', "class='button' title='Download CSV file'");
}

function get_user_by_id($id)
{
	$CI =& get_instance();

	return $CI->users_model->get_user($id);	
}

function can_this_user($do_this, $user_id = 0) 
{
	$CI =& get_instance();

	if($user_id == 0)
	{
		$caps = maybe_unserialize($CI->users_model->getUserCaps());
	}

	$parts = explode('/', $do_this);

	if(isset($parts[2]) && is_numeric($parts[2]))
	{
		unset($parts[2]);
		$do_this = implode('/', $parts);
	} 

	$caps = array_merge($caps, array('site/cheat', 'site/login', 'site/logout', 'users/my_profile', 'users/get_user'));

	if(in_array($do_this, $caps) || in_array($do_this.'/index', $caps) || in_array(str_replace('/index', '', $do_this), $caps) || $do_this == '')
	{
		return true;
	}

	return false;
}

function display_user_settings($edit = false, $user = array())
{
	$settings = get_option('user_settings');
	$return = '';

	if(is_array($settings))
	{
		ob_start();
		foreach($settings['title'] as $key => $dummy)
		{	
			if(strlen($settings['title'][$key]))
			{
				$id = preg_replace("/[^a-zA-Z0-9]/", "_", strtolower($settings['title'][$key]));
				$value = ($edit == true ? @$user->meta[$id] : '');
				?>
				<tr class="ui-helper-reset">
					<th><?php echo $settings['title'][$key] ?></th>
					<td><?php echo form_input("meta[{$id}]", $value) ?></td>
				</tr>
				<?php
			}

		}

		$return = ob_get_contents();
		ob_end_clean();
	}

	return $return;
}

function get_user_array()
{
	$CI =& get_instance();
	
	$data = array('' => '--Select User--');
	$users = $CI->users_model->get_all_users();

	foreach($users as $user)
	{
		$meta = $CI->users_model->get_user_meta($user->ID);
		$data[$user->ID] = $meta['first_name'].' '.$meta['last_name'];
	}

	return $data;
}

function get_option($option_name, $single = false)
{
	$CI =& get_instance();

	if(!$single)
	{
		$options = $CI->settings_model->loadSetting($option_name);

		foreach($options as $key => $val)
		{
			if(empty($options[$key]))
				unset($options[$key]);
		}

		return $options;
	}
	
	$settings = maybe_unserialize($CI->settings_model->loadSetting($option_name));

	return $settings;
}

function get_option_for_dropdown($option_name)
{
	$CI =& get_instance();
	$data = $CI->settings_model->loadSetting($option_name);
	$ret = array();

	foreach($data as $d)
	{
		if(strlen($d))
		$ret[$d] = $d;
	}

	return $ret;
}

function load_header($string = '')
{
	$CI =& get_instance();

	if(strlen($string)) 
	{
		$CI->load->view('common/header-'.$string.'.php');
	}
	else 
	{
		$CI->load->view('common/header.php');
	}
}

function load_footer($string = '')
{
	$CI =& get_instance();

	if(strlen($string)) 
	{
		$CI->load->view('common/footer-'.$string.'.php');
	}
	else 
	{
		$CI->load->view('common/footer.php');
	}
}

function format_phone_number($phone)
{
	$temp = preg_replace('/[^a-zA-Z0-9\s]/', '', $phone);
	if(is_numeric($phone))
	{
		if(strlen($phone) == 10) {
			$phone = preg_replace('/^(\d{3})(\d{3})(\d{4})$/', '$1-$2-$3', $temp);
		} else 
		{
			$phone = preg_replace('/^(\d{3})(\d{4})$/', '$1-$2', $temp);
		}
	}

	return $phone;
}

function date_for_display($date)
{
	if(($date == '0000-00-00 00:00:00') || ($date == '1970-01-01') || ($date == '0000-00-00')) {
		return '';
	}

	if(strlen($date)) {
		return date('m/d/Y', strtotime($date));
	}

	return $date;
}

function date_for_db($date)
{
	if(strlen($date) && strstr($date, '/')) {
		return date('Y-m-d', strtotime(str_replace('-', '/', $date)));
	}

	return $date;
}

function datetime_for_display($date)
{
	if(($date == '0000-00-00 00:00:00') || ($date == '1970-01-01') || ($date == '0000-00-00')) {
		return '';
	}

	if(strlen($date)) {
		return date('m/d/Y h:i a', strtotime($date));
	}

	return $date;
}


function timeonly_for_display($date)
{
	if(($date == '0000-00-00 00:00:00') || ($date == '1970-01-01') || ($date == '0000-00-00')) {
		return '';
	}

	if(strlen($date)) {
		return date('h:i a', strtotime($date));
	}

	return $date;
}

function datetime_for_db($date)
{
	if(strlen($date) && strstr($date, '/')) {
		return date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $date)));
	}

	return $date;
}

function maybe_unserialize( $original ) {
        if ( is_serialized( $original ) ) // don't attempt to unserialize data that wasn't serialized going in
                return @unserialize( $original );
        return $original;
}

/**
 * Check value to find if it was serialized.
 *
 * If $data is not an string, then returned value will always be false.
 * Serialized data is always a string.
 *
 * @since 2.0.5
 *
 * @param mixed $data Value to check to see if was serialized.
 * @return bool False if not serialized and true if it was.
 */
function is_serialized( $data ) {
        // if it isn't a string, it isn't serialized
        if ( ! is_string( $data ) )
                return false;
        $data = trim( $data );
        if ( 'N;' == $data )
                return true;
        $length = strlen( $data );
        if ( $length < 4 )
                return false;
        if ( ':' !== $data[1] )
                return false;
        $lastc = $data[$length-1];
        if ( ';' !== $lastc && '}' !== $lastc )
                return false;
        $token = $data[0];
        switch ( $token ) {
                case 's' :
                        if ( '"' !== $data[$length-2] )
                                return false;
                case 'a' :
                case 'O' :
                        return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
                case 'b' :
                case 'i' :
                case 'd' :
                        return (bool) preg_match( "/^{$token}:[0-9.E-]+;\$/", $data );
        }
        return false;
}

function getStateList()
{
	$state_list = array('AL'=>'AL',
		'AK'=>'AK',
		'AZ'=>'AZ',
		'AR'=>'AR',
		'CA'=>'CA',
		'CO'=>'CO',
		'CT'=>'CT',
		'DE'=>'DE',
		'DC'=>'DC',
		'FL'=>'FL',
		'GA'=>'GA',
		'HI'=>'HI',
		'ID'=>'ID',
		'IL'=>'IL',
		'IN'=>'IN',
		'IA'=>'IA',
		'KS'=>'KS',
		'KY'=>'KY',
		'LA'=>'LA',
		'ME'=>'ME',
		'MD'=>'MD',
		'MA'=>'MA',
		'MI'=>'MI',
		'MN'=>'MN',
		'MS'=>'MS',
		'MO'=>'MO',
		'MT'=>'MT',
		'NE'=>'NE',
		'NV'=>'NV',
		'NH'=>'NH',
		'NJ'=>'NJ',
		'NM'=>'NM',
		'NY'=>'NY',
		'NC'=>'NC',
		'ND'=>'ND',
		'OH'=>'OH',
		'OK'=>'OK',
		'OR'=>'OR',
		'PA'=>'PA',
		'RI'=>'RI',
		'SC'=>'SC',
		'SD'=>'SD',
		'TN'=>'TN',
		'TX'=>'TX',
		'UT'=>'UT',
		'VT'=>'VT',
		'VA'=>'VA',
		'WA'=>'WA',
		'WV'=>'WV',
		'WI'=>'WI',
		'WY'=>'WY'
	);

	return $state_list;
}

function getMonthList()
{
	$state_list = array("January" => "January",
		"February" => "February",
		"March" => "March",
		"April" => "April",
		"May" => "May",
		"June" => "June",
		"July" => "July",
		"August" => "August",
		"September" => "September",
		"October" => "October",
		"November" => "November",
		"December" => "December");

	return $state_list;
}

function getYearList()
{
	$i = 2007;
	$year = date('Y');
	$year_list = array();

	for(; $i <= $year; $i++)
	{
		$year_list[$i] = $i;
	}

	return $year_list;
}

function getThemeList()
{
	$themes = array(
		'default' => 'Default',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/dark-hive/jquery-ui.css' => 'dark-hive',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css' => 'base',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/black-tie/jquery-ui.css' => 'black-tie',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/blitzer/jquery-ui.css' => 'blitzer',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/cupertino/jquery-ui.css' => 'cupertino',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/dot-luv/jquery-ui.css' => 'dot-luv',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/eggplant/jquery-ui.css' => 'eggplant',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/excite-bike/jquery-ui.css' => 'excite-bike',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/flick/jquery-ui.css' => 'flick',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/hot-sneaks/jquery-ui.css' => 'hot-sneaks',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/humanity/jquery-ui.css' => 'humanity',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/le-frog/jquery-ui.css' => 'le-frog',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/mint-choc/jquery-ui.css' => 'mint-choc',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/overcast/jquery-ui.css' => 'overcast',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/pepper-grinder/jquery-ui.css' => 'pepper-grinder',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/redmond/jquery-ui.css' => 'redmond',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/smoothness/jquery-ui.css' => 'smoothness',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/south-street/jquery-ui.css' => 'south-street',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/start/jquery-ui.css' => 'start',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/sunny/jquery-ui.css' => 'sunny',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/swanky-purse/jquery-ui.css' => 'swanky-purse',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/trontastic/jquery-ui.css' => 'trontastic',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/ui-darkness/jquery-ui.css' => 'ui-darkness',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/ui-lightness/jquery-ui.css' => 'ui-lightness',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/vader/jquery-ui.css' => 'vader',
	);

	return $themes;
}