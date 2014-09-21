<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeoff_Model extends CI_Model { 

	public function get_timeoff_requests($user_id, $limit, $offset, $args = array())
	{	
		$return = array(
			'rows' => array(),
			'num_rows' => array()
		);

		$this->db->start_cache();

		if($user_id > 0) 
		{
			$this->db->where(" (`user_id` = {$user_id} OR `manager` = {$user_id})", NULL, FALSE);
		}

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('first_name', $args['search_string'])
				->or_like('last_name', $args['search_string'])
				->or_like('request_start', date_for_db($args['search_string']))
				->or_like('request_end', date_for_db($args['search_string']))
				->or_like('date_created', date_for_db($args['search_string']))
				->or_like('current_status', $args['search_string']);
			}

			foreach($args['filters']['search_type'] as $key => $a) {
				$search = '';

				switch($args['filters']['search_type'][$key]) {

					case 'equals': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key], date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'not_equal': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' !=', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'less_than': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' <', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'less_than_equal': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' <=', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'greater_than': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' >', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'greater_than_equal': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' >=', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'like': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->like($args['filters']['search_val'][$key], date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 
				}
			}
		}

		$this->db->stop_cache();

		$this->db->limit($limit, $offset);

		if($this->input->get('sort'))
		{
			foreach($this->input->get('sort') as $sort)
			{
				$sort = explode('|', $sort);
				$this->db->order_by($sort[0], $sort[1]);
			}
		}
		else
		{
			$this->db->order_by('date_created', 'desc');
		}

		$t = $this->db->get('timeoff_requests');
		
		if($t->num_rows > 0)
		{
			$return['rows'] = $t->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('timeoff_requests');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

		return $return;
	}

	public function get_dashboard_list($user_id, $limit, $offset)
	{	
		$return = array(
			'rows' => array(),
			'num_rows' => array()
		);

		if($user_id > 0) 
		{
			$this->db->where('current_status !=', 'Approved');
			$this->db->where(" (`user_id` = {$user_id} OR `manager` = {$user_id})", NULL, FALSE);
		}

		$this->db->limit($limit, $offset);
		$t = $this->db->get('timeoff_requests');
		
		if($t->num_rows > 0)
		{
			$return['rows'] = $t->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('timeoff_requests');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;
        
		return $return;
	}

	public function get_by_month($month, $year)
	{
		if($month == '' || $month == 0) {
			$month = date('m');
		}

		if($year == '' || $year == 0) {
			$year = date('Y');
		}

		$first = date('Y-m-d 00:i:s', mktime(0, 0, 0, $month, 1, $year));
		$last = date('Y-m-t 00:i:s', mktime(0, 0, 0, $month, 1, $year));

		$q = $this->db->query("SELECT * FROM `timeoff_requests` WHERE `request_start` BETWEEN '{$first}' AND '{$last}'");

		return $q->result();
	}

	public function get_my_timeoff_requests($user_id)
	{
		$t = $this->db->where('user_id', $user_id)->get('timeoff_requests');
		
		if($t->num_rows > 0)
		{
			return $t->result();
		}

		return array();
	}

	public function save_timeoff_request($temp, $user_id)
	{
		$data['user_id'] = $user_id;
		$data['date_created'] = date('Y-m-d H:i:s');
		$data['first_name'] = $temp['first_name'];
		$data['last_name'] = $temp['last_name'];
		$data['manager'] = $temp['manager'];
		$data['request_start'] = date('Y/m/j', strtotime($temp['request_start']));
		$data['request_end'] = date('Y/m/j', strtotime($temp['request_end']));
		$data['request_type'] = $temp['request_type'];
		$data['combination'] = $temp['combination'];
		$data['days_or_hours'] = $temp['days_or_hours'];
		$data['comments'] = $temp['comments'];

		if($temp['submit_request'] == 'Submit for Approval')
		{
			$data['current_status'] = 'Submitted for Approval';

			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timeoff', 'submit_for_approval');
		} 
		else if ($temp['submit_request'] == 'Approve')
		{
			$data['current_status'] = 'Approved';

			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timeoff', 'approve');
		} 
		else if (($temp['submit_request'] == 'Send Back to User') || !isset($temp['current_status']))
		{
			$data['current_status'] = 'In Process';

			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timeoff', 'send_back_to_user');
		}
		else
		{
			$data['current_status'] = $temp['current_status'];
		}

		user_notifier::send();

		$this->db->insert('timeoff_requests', $data);

		return $this->db->insert_id();
	}

	public function update_timeoff_request($temp, $to_id)
	{
		$data['first_name'] = $temp['first_name'];
		$data['last_name'] = $temp['last_name'];
		$data['manager'] = $temp['manager'];

		if(isset($temp['manager_signature']))
		{
			$data['manager_signature'] = $temp['manager_signature'];
		}
		
		$data['request_start'] = date('Y-m-d H:i:s', strtotime($temp['request_start']));
		$data['request_end'] = date('Y-m-d H:i:s', strtotime($temp['request_end']));
		$data['request_type'] = $temp['request_type'];
		$data['combination'] = $temp['combination'];
		$data['days_or_hours'] = $temp['days_or_hours'];
		$data['comments'] = $temp['comments'];

		if($temp['submit_request'] == 'Submit for Approval')
		{
			$data['current_status'] = 'Submitted for Approval';

			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('timeoff', 'submit_for_approval');
		} 
		else if ($temp['submit_request'] == 'Approve')
		{
			$data['current_status'] = 'Approved';

			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('timeoff', 'approve');
		} 
		else if (($temp['submit_request'] == 'Send Back to User') || !isset($temp['current_status']))
		{
			$data['current_status'] = 'In Process';

			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('timeoff', 'send_back_to_user');
		}
		else
		{
			$data['current_status'] = $temp['current_status'];
		}

		user_notifier::send();

		$this->db->where('ID', $to_id)
		->update('timeoff_requests', $data);
	}

	public function get_timeoff_request($tID)
	{
		$t = $this->db->where('ID', $tID)
		->get('timeoff_requests');

		if($t->num_rows)
		{
			$r = $t->result();
			return $r[0];
		}

		return array();
	}
}