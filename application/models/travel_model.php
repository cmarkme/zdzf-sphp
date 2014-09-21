<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travel_Model extends CI_Model { 

	public function get_travel_requests($user_id = 0, $limit, $offset, $args = array())
	{	
		$return = array(
			'rows' => array(),
			'num_rows' => array()
		);

		$this->db->start_cache();

		if($user_id > 0) 
		{	
			$this->db->where('user_id', $user_id);
			$this->db->or_where('manager', $user_id);
		}

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('first_name', $args['search_string'])
				->or_like('last_name', $args['search_string'])
				->or_like('for_month', $args['search_string'])
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

		$t = $this->db->get('travel_requests');

		$return = array();
		$i = 0;
		
		if($t->num_rows > 0)
		{
			
			$c = $this->db->select('count(*) as count', false)->from('travel_requests');
	        $tmp = $c->get()->result();

	        $return['num_rows'] = $tmp[0]->count;

	        $this->db->flush_cache();
			foreach($t->result() as $result) {
				$return['rows'][$i]['details'] = $result;

				$d = $this->db->where('travel_id', $result->ID)
				->get('travel_request_details');

				foreach($d->result() as $m) {
					$return['rows'][$i]['details']->travel_to .= $m->travel_to.'<br />';
					$return['rows'][$i]['details']->travel_from .= $m->travel_from.'<br />';
				}
				$i++;
			}

			return $return;
		}

		$this->db->flush_cache();
		return array();
	}

	public function get_travel_request($tID)
	{
		$t = $this->db->where('ID', $tID)
		->get('travel_requests');

		if($t->num_rows)
		{
			$r['details'] = $t->result();

			$r['details'] = $r['details'][0];

			$d = $this->db->where('travel_id', $tID)
			->get('travel_request_details');

			$r['local'] = $d->result();

			$d = $this->db->where('travel_id', $tID)
			->get('travel_out_of_town_details');

			$r['ot'] = $d->result();

			return $r;
		}

		return array();
	}

	public function save_travel_request($temp, $user_id)
	{
		$data['mileage_rate'] = get_option('mileage_rate', true);
		$data['user_id'] = $user_id;
		$data['first_name'] = $temp['first_name'];
		$data['last_name'] = $temp['last_name'];
		$data['date_created'] = date('Y-m-d H:i:s');
		$data['for_month'] = $temp['for_month'];
		$data['manager'] = $temp['manager'];

		if($temp['submit_request'] == 'Submit for Approval')
		{
			$data['current_status'] = 'Submitted for Approval';
			
			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('travel', 'submit_for_approval');
		} 
		else if ($temp['submit_request'] == 'Approve')
		{
			$data['current_status'] = 'Approved';

			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('travel', 'aprove');
		} 
		else if (($temp['submit_request'] == 'Send Back to User') || !isset($temp['current_status']))
		{
			$data['current_status'] = 'In Process';

			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('travel', 'send_back_to_user');
		}
		else
		{
			$data['current_status'] = $temp['current_status'];
		}
		

		$this->db->insert('travel_requests', $data);

		$new_id = $this->db->insert_id();

		foreach($temp['travel_date'] as $key => $val) 
		{
			$data = array();
			$data['travel_id'] = $new_id;
			$data['travel_date'] = date('Y-m-d H:i:s', strtotime($temp['travel_date'][$key]));
			$data['travel_from'] = $temp['travel_from'][$key];
			$data['travel_to'] = $temp['travel_to'][$key];
			$data['purpose'] = $temp['purpose'][$key];
			$data['roundtrip'] = ((isset($temp['roundtrip'][$key])) ? implode(',', $temp['roundtrip'][$key]) : 'No');
			$data['total_miles'] = $temp['total_miles'][$key];
			$data['home_adjustment'] = $temp['home_adjustment'][$key];
			$data['net_mileage'] = $temp['net_mileage'][$key];
			$data['parking'] = $temp['parking'][$key];
			$data['account_number'] = $temp['account_number'][$key];
			$data['total_amount'] = $temp['total_amount'][$key];

			$this->db->insert('travel_request_details', $data);
		}

		foreach($temp['ot_travel_date'] as $key => $val)
		{
			if(strlen($temp['ot_travel_date'][$key]))
			{
				$data = array();
				$data['travel_id'] = $new_id;
				$data['travel_date'] = date('Y-m-d H:i:s', strtotime($temp['ot_travel_date'][$key]));
				$data['purpose'] = $temp['ot_purpose'][$key];
				$data['account_number'] = $temp['ot_account_number'][$key];
				$data['air'] = $temp['air'][$key];
				$data['hotel'] = $temp['hotel'][$key];
				$data['meals'] = $temp['meals'][$key];
				$data['misc'] = $temp['misc'][$key];
				$data['transit'] = $temp['transit'][$key];
				$data['total'] = $temp['total'][$key];

				$this->db->insert('travel_out_of_town_details', $data);
			}
		}

		user_notifier::send();

		return $new_id;
	}

	public function update_travel_request($temp, $to_id)
	{
		$data['for_month'] = $temp['for_month'];
		$data['manager'] = $temp['manager'];

		if($temp['submit_request'] == 'Submit for Approval')
		{
			$data['current_status'] = 'Submitted for Approval';
			
			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('travel', 'submit_for_approval');
		} 
		else if ($temp['submit_request'] == 'Approve')
		{
			$man = $this->users_model->get_user_meta($temp['manager']);

			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('travel', 'approve');

			$data['current_status'] = 'Approved';
			$data['manager_signature'] = $man['first_name'] .' '. $man['last_name'];
		} 
		else if (($temp['submit_request'] == 'Send Back to User') || !isset($temp['current_status']))
		{
			$data['current_status'] = 'In Process';

			user_notifier::set_data($data);
			user_notifier::set_user($temp['user_id']);
			user_notifier::set_template('travel', 'send_back_to_user');
			
		}
		else
		{
			$data['current_status'] = $temp['current_status'];
		}

		if(strlen($temp['manager_signature']))
		{
			$data['manager_signature'] = $temp['manager_signature'];
		}

		user_notifier::send();

		$this->db->where('ID', $to_id)
		->update('travel_requests', $data);

		$this->db->where('travel_id', $to_id)
		->delete('travel_request_details');

		$this->db->where('travel_id', $to_id)
		->delete('travel_out_of_town_details');

		foreach($temp['travel_date'] as $key => $val) 
		{	
			if(strlen($temp['travel_date'][$key])) 
			{
				$data = array();
				$data['travel_id'] = $to_id;
				$data['travel_date'] = date('Y-m-d H:i:s', strtotime($temp['travel_date'][$key]));
				$data['travel_from'] = $temp['travel_from'][$key];
				$data['travel_to'] = $temp['travel_to'][$key];
				$data['purpose'] = $temp['purpose'][$key];
				$data['roundtrip'] = ((isset($temp['roundtrip'][$key])) ? implode(',', $temp['roundtrip'][$key]) : 'No');
				$data['total_miles'] = $temp['total_miles'][$key];
				$data['home_adjustment'] = $temp['home_adjustment'][$key];
				$data['net_mileage'] = $temp['net_mileage'][$key];
				$data['parking'] = $temp['parking'][$key];
				$data['account_number'] = $temp['account_number'][$key];
				$data['total_amount'] = $temp['total_amount'][$key];
	
				$this->db->insert('travel_request_details', $data);
			}
		}

		foreach($temp['ot_travel_date'] as $key => $val)
		{
			if(strlen($temp['ot_travel_date'][$key]))
			{
				$data = array();
				$data['travel_id'] = $to_id;
				$data['travel_date'] = date('Y-m-d H:i:s', strtotime($temp['ot_travel_date'][$key]));
				$data['purpose'] = $temp['ot_purpose'][$key];
				$data['account_number'] = $temp['ot_account_number'][$key];
				$data['air'] = $temp['air'][$key];
				$data['hotel'] = $temp['hotel'][$key];
				$data['meals'] = $temp['meals'][$key];
				$data['misc'] = $temp['misc'][$key];
				$data['transit'] = $temp['transit'][$key];
				$data['total'] = $temp['total'][$key];

				$this->db->insert('travel_out_of_town_details', $data);
			}
		}
	}
}