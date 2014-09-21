<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timesheet_Model extends CI_Model { 

	public function get_timesheets($user_id = 0, $limit, $offset, $args = array(), $type = 'real')
	{	
		$return = array(
			'rows' => array(),
			'num_rows' => array()
		);

		$this->db->start_cache();
		$this->db->where('type', $type);

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
				->or_like('period_start', date_for_db($args['search_string']))
				->or_like('period_end', date_for_db($args['search_string']))
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

		$t = $this->db->get('timesheets');
		
		if($t->num_rows > 0)
		{
			$return['rows'] = $t->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('timesheets');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

		return $return;

	}

	public function get_dashboard_list($user_id = 0, $limit, $offset, $type = 'real')
	{	
		$return = array(
			'rows' => array(),
			'num_rows' => array()
		);

		$this->db->where('type', $type);

		if($user_id > 0)
		{
			$this->db->where('current_status !=', 'Approved');
			$this->db->where(" (`user_id` = {$user_id} OR `manager` = {$user_id})", NULL, FALSE);
		}

		$this->db->limit($limit, $offset);
		$t = $this->db->get('timesheets');
		
		if($t->num_rows > 0)
		{
			$return['rows'] = $t->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('timesheets');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

		return $return;

	}

	public function save_timesheet($temp, $user_id, $type = 'real')
	{
		if($type != 'real' || ($temp['submit_request'] == 'Create New Timesheet for the Current Pay Period from this Template'))
		{
			$info = $this->users_model->get_user($user_id);
		
			$data['first_name'] = $info->meta['first_name'];
			$data['last_name'] = $info->meta['last_name'];
			$data['manager'] = $info->user_manager;
			$data['current_status'] = 'In Process';
			$data['period_start'] = date_for_db('0000/00/00');
			$data['period_end'] = date_for_db('0000/00/00');
		}
		else
		{
			$data['first_name'] = $temp['first_name'];
			$data['last_name'] = $temp['last_name'];
			$data['manager'] = $temp['manager'];
			$data['period_start'] = date('Y/m/j', strtotime($temp['period_start']));
			$data['period_end'] = date('Y/m/j', strtotime($temp['period_end']));
			$data['accounts'] = base64_encode(serialize($this->users_model->get_labor_accounts($user_id)));
		}
		
		if (isset($this->user->meta['grant_matching']) && $this->user->meta['grant_matching'] == 'Yes'):
		$data['gweek1'] = base64_encode(serialize($temp['gweek1']));
		$data['gweek2'] = base64_encode(serialize($temp['gweek2']));
		endif;

		$data['week1'] = base64_encode(serialize($temp['week1']));
		$data['week2'] = base64_encode(serialize($temp['week2']));
		$data['week1_total'] = $temp['week1']['total_hours_total'];
		$data['week2_total'] = $temp['week2']['total_hours_total'];
		$data['user_id'] = $user_id;
		$data['date_created'] = date('Y-m-d H:i:s');
		$data['type'] = $type;
		$data['chargable_hours'] = $temp['summary']['chargable_hours'];
		$data['holiday'] = $temp['summary']['holiday'];
		$data['unpaid_time_off'] = $temp['summary']['unpaid_time_off'];
		$data['personal_time'] = $temp['summary']['personal_time'];
		$data['total_hours'] = $temp['summary']['total_hours'];
		$data['vacation'] = $temp['summary']['vacation'];
		$data['sicktime'] = $temp['summary']['sicktime'];
		$data['birthday'] = $temp['summary']['birthday'];
		$data['other'] = $temp['summary']['other'];

		if($temp['submit_request'] == 'Submit for Approval')
		{
			$data['current_status'] = 'Submitted for Approval';
			
			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timesheet', 'submit_for_approval');
		} 
		else if ($temp['submit_request'] == 'Approve')
		{
			$data['current_status'] = 'Approved';

			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timesheet', 'aprove');
		} 
		else if (($temp['submit_request'] == 'Send Back to User') || !isset($temp['current_status']))
		{
			$data['current_status'] = 'In Process';

			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timesheet', 'send_back_to_user');
		} 
		else if ($temp['submit_request'] == 'Create New Timesheet for the Current Pay Period from this Template')
		{
			$data['current_status'] = 'In Process';
			
			$data['period_start'] = date('Y/m/j', strtotime('saturday last week', time()));
			$data['period_end'] = date('Y/m/j', strtotime('friday next week', time()));
			$data['accounts'] = base64_encode(serialize($this->users_model->get_labor_accounts($user_id)));
		} 
		else
		{
			$data['current_status'] = $temp['current_status'];
		}

		if($type == 'real')
		{
			user_notifier::send();
		}

		$this->db->insert('timesheets', $data);

		return $this->db->insert_id();
	}

	public function update_timesheet($temp, $ts_id, $user_id, $type = 'real')
	{
		if($type != 'real')
		{
			$info = $this->users_model->get_user($user_id);
		
			$data['first_name'] = $info->meta['first_name'];
			$data['last_name'] = $info->meta['last_name'];
			$data['manager'] = $info->user_manager;
			$data['current_status'] = 'In Process';
			$data['period_start'] = date_for_db('0000/00/00');
			$data['period_end'] = date_for_db('0000/00/00');
		}
		else
		{
			$data['first_name'] = $temp['first_name'];
			$data['last_name'] = $temp['last_name'];
			$data['manager'] = $temp['manager'];
			$data['period_start'] = date_for_db($temp['period_start']);
			$data['period_end'] = date_for_db($temp['period_end']);
			$data['accounts'] = base64_encode(serialize($this->users_model->get_labor_accounts($user_id)));
		}
		
		if (isset($this->user->meta['grant_matching']) && $this->user->meta['grant_matching'] == 'Yes'):
		$data['gweek1'] = base64_encode(serialize($temp['gweek1']));
		$data['gweek2'] = base64_encode(serialize($temp['gweek2']));
		endif;

		$data['week1'] = base64_encode(serialize($temp['week1']));
		$data['week2'] = base64_encode(serialize($temp['week2']));
		$data['week1_total'] = $temp['week1']['total_hours_total'];
		$data['week2_total'] = $temp['week2']['total_hours_total'];
		$data['last_edit'] = date('Y-m-d H:i:s');
		$data['type'] = $type;
		$data['chargable_hours'] = $temp['summary']['chargable_hours'];
		$data['holiday'] = $temp['summary']['holiday'];
		$data['unpaid_time_off'] = $temp['summary']['unpaid_time_off'];
		$data['personal_time'] = $temp['summary']['personal_time'];
		$data['total_hours'] = $temp['summary']['total_hours'];
		$data['vacation'] = $temp['summary']['vacation'];
		$data['sicktime'] = $temp['summary']['sicktime'];
		$data['birthday'] = $temp['summary']['birthday'];
		$data['other'] = $temp['summary']['other'];

		if($temp['submit_request'] == 'Submit for Approval')
		{
			$data['current_status'] = 'Submitted for Approval';
			
			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timesheet', 'submit_for_approval');
		} 
		else if ($temp['submit_request'] == 'Approve')
		{
			$data['current_status'] = 'Approved';

			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timesheet', 'approve');
		} 
		else if ($temp['submit_request'] == 'Create New Timesheet for the Current Pay Period from this Template')
		{
			$data['current_status'] = 'In Process';
			
			$data['period_start'] = date('Y/m/j', strtotime('saturday last week', time()));
			$data['period_end'] = date('Y/m/j', strtotime('friday next week', time()));
			$data['accounts'] = base64_encode(serialize($this->users_model->get_labor_accounts($user_id)));
		} 
		else if (($temp['submit_request'] == 'Send Back to User') || !isset($temp['current_status']))
		{
			$data['current_status'] = 'In Process';

			user_notifier::set_data($data);
			user_notifier::set_user($user_id);
			user_notifier::set_template('timesheet', 'send_back_to_user');
		}
		else
		{
			$data['current_status'] = $temp['current_status'];
		}

		if($type == 'real')
		{
			user_notifier::send();
		}

		$this->db->where('ID', $ts_id)
		->update('timesheets', $data);
	}

	public function get_timesheet($tID)
	{
		$t = $this->db->where('ID', $tID)
		->get('timesheets');

		if($t->num_rows)
		{
			$r = $t->result();
			return $r[0];
		}

		return array();
	}

	public function get_template($user_id)
	{
		$t = $this->db->where(array('user_id' => $user_id, 'type' => 'template'))
		->get('timesheets');

		if($t->num_rows)
		{
			$r = $t->result();
			return $r[0];
		}

		return NULL;
	}
}