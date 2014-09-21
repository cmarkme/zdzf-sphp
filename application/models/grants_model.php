<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Grants_model extends CI_Model {
 
 	public function addGrant($post='')
 	{
 		$main = array(
			'funder' => $post['funder'],
			'address' => $post['address'],
			'address2' => $post['address2'],
			'city' => $post['city'],
			'state' => $post['state'],
			'zip' => $post['zip'],
			'website' => $post['website'],
			'phone' => $post['phone'],
			'email' => $post['email'],
			'type' => $post['type'],
			'contact' => $post['contact'],
			'title' => $post['title'],
			'grand_guildlines' => $post['grand_guildlines'],
			'previous_funding' => $post['previous_funding'],
			'nine_nine_zero' => $post['nine_nine_zero'],
			'status' => $post['status'],
			'program' => $post['program'],
			'request' => $post['request'],
			'duration' => $post['duration'],
			'aprvd_amt' => $post['aprvd_amt'],
			'location' => $post['location'],
			'aprvl_date' => date_for_db($post['aprvl_date']),
			'year_one_start' => $post['year_one_start'],
			'year_one_end' => $post['year_one_end'],
			'year_two_start' => $post['year_two_start'],
			'year_two_end' => $post['year_two_end'],
			'year_three_start' => $post['year_three_start'],
			'year_three_end' => $post['year_three_end'],
			'year_one_fund' => $post['year_one_fund'],
			'year_two_fund' => $post['year_two_fund'],
			'year_three_fund' => $post['year_three_fund'],
			'loi' => $post['loi'],
			'loi_due_date' => date_for_db($post['loi_due_date']),
			'loi_app_date' => date_for_db($post['loi_app_date']),
			'loi_subm_date' => date_for_db($post['loi_subm_date']),
			'loi_rept_out' => date_for_db($post['loi_rept_out']),
			'full_app' => $post['full_app'],
			'full_app_due_date' => date_for_db($post['full_app_due_date']),
			'full_app_app_date' => date_for_db($post['full_app_app_date']),
			'full_app_subm_date' => date_for_db($post['full_app_subm_date']),
			'full_app_rept_out' => date_for_db($post['full_app_rept_out']),
			'completion_date' => date_for_db($post['completion_date']),
			'current_notes' => $post['current_notes'],
			'current_attachments' => $post['current_attachments'],
			'responsible_staff' => $post['responsible_staff'],
			'staff_access' => $post['staff_access']
		);
		$this->db->insert('grants', $main);
		$ID = $this->db->insert_id();

		$cycle = array(
			'grant_id' => $ID,
			'ggci_deadline' => serialize($post['ggci_deadline']),
			'ggci_type' => serialize($post['ggci_type']),
			'ggci_report_out' => serialize($post['ggci_report_out']),
			'online_submission' => $post['online_submission'],
			'weblink' => $post['weblink'],
			'ggci_notes' => $post['ggci_notes'],
			'ggci_attachments' => $post['ggci_attachments']
		);
		$this->db->insert('grants_cycle', $cycle);

		$nce = array(
			'grant_id' => $ID,
			'nce_status' => $post['nce_status'],
			'nce_duration' => $post['nce_duration'],
			'nce_aprvl_date' => date_for_db($post['nce_aprvl_date']),
			'nce_submission_date' => date_for_db($post['nce_submission_date']),
			'nce_notes' => $post['nce_notes'],
			'nce_attachments' => $post['nce_attachments']
		);
		$this->db->insert('grants_no_cost_extension', $nce);

		foreach($post['fy'] as $key => $dummy)
		{
			$history = array(
				'grant_id' => $ID,
				'fy' => $post['fy'][$key],
				'fh_req' => $post['fh_req'][$key],
				'fh_refund' => $post['fh_refund'][$key],
				'fh_program' => $post['fh_program'][$key],
				'fh_result' => $post['fh_result'][$key],
				'fh_notes' => $post['fh_notes'][$key]
			);
			$this->db->insert('grants_funding_history', $history);
		}

		foreach($post['report_date'] as $key => $dummy)
		{
			if(strlen($post['report_date'][$key]))
			{
				$report = array(
					'grant_id' => $ID,
					'report_date' => date_for_db($post['report_date'][$key]),
					'report_type' => $post['report_type'][$key],
					'report_notes' => $post['report_notes'][$key],
					'report_attachments' => serialize($post['report_attachments'][$key])
				);

				$this->db->insert('grants_reports', $report);
			}
		}

		return $ID;
 	}

 	public function updateGrant($ID, $post='')
 	{
 		$main = array(
			'funder' => $post['funder'],
			'address' => $post['address'],
			'address2' => $post['address2'],
			'city' => $post['city'],
			'state' => $post['state'],
			'zip' => $post['zip'],
			'website' => $post['website'],
			'phone' => $post['phone'],
			'email' => $post['email'],
			'type' => $post['type'],
			'contact' => $post['contact'],
			'title' => $post['title'],
			'grand_guildlines' => $post['grand_guildlines'],
			'previous_funding' => $post['previous_funding'],
			'nine_nine_zero' => $post['nine_nine_zero'],
			'status' => $post['status'],
			'program' => $post['program'],
			'request' => $post['request'],
			'duration' => $post['duration'],
			'aprvd_amt' => $post['aprvd_amt'],
			'location' => $post['location'],
			'aprvl_date' => date_for_db($post['aprvl_date']),
			'year_one_start' => $post['year_one_start'],
			'year_one_end' => $post['year_one_end'],
			'year_two_start' => $post['year_two_start'],
			'year_two_end' => $post['year_two_end'],
			'year_three_start' => $post['year_three_start'],
			'year_three_end' => $post['year_three_end'],
			'year_one_fund' => $post['year_one_fund'],
			'year_two_fund' => $post['year_two_fund'],
			'year_three_fund' => $post['year_three_fund'],
			'loi' => $post['loi'],
			'loi_due_date' => date_for_db($post['loi_due_date']),
			'loi_app_date' => date_for_db($post['loi_app_date']),
			'loi_subm_date' => date_for_db($post['loi_subm_date']),
			'loi_rept_out' => date_for_db($post['loi_rept_out']),
			'full_app' => $post['full_app'],
			'full_app_due_date' => date_for_db($post['full_app_due_date']),
			'full_app_app_date' => date_for_db($post['full_app_app_date']),
			'full_app_subm_date' => date_for_db($post['full_app_subm_date']),
			'full_app_rept_out' => date_for_db($post['full_app_rept_out']),
			'completion_date' => date_for_db($post['completion_date']),
			'current_notes' => $post['current_notes'],
			'current_attachments' => $post['current_attachments'],
			'responsible_staff' => $post['responsible_staff'],
			'staff_access' => $post['staff_access']
		);
		$this->db->where('ID', $ID)->update('grants', $main);

		$cycle = array(
			'ggci_deadline' => serialize($post['ggci_deadline']),
			'ggci_type' => serialize($post['ggci_type']),
			'ggci_report_out' => serialize($post['ggci_report_out']),
			'online_submission' => $post['online_submission'],
			'weblink' => $post['weblink'],
			'ggci_notes' => $post['ggci_notes'],
			'ggci_attachments' => $post['ggci_attachments']
		);
		$this->db->where('grant_id', $ID)->update('grants_cycle', $cycle);

		$nce = array(
			'nce_status' => $post['nce_status'],
			'nce_duration' => $post['nce_duration'],
			'nce_aprvl_date' => date_for_db($post['nce_aprvl_date']),
			'nce_submission_date' => date_for_db($post['nce_submission_date']),
			'nce_notes' => $post['nce_notes'],
			'nce_attachments' => $post['nce_attachments']
		);
		$this->db->where('grant_id', $ID)->update('grants_no_cost_extension', $nce);

		$this->db->where('grant_id', $ID)->delete(array('grants_funding_history', 'grants_reports'));

		foreach($post['fy'] as $key => $dummy)
		{
			if(strlen($post['fy'][$key]))
			{
				$history = array(
					'grant_id' => $ID,
					'fy' => $post['fy'][$key],
					'fh_req' => $post['fh_req'][$key],
					'fh_refund' => $post['fh_refund'][$key],
					'fh_program' => $post['fh_program'][$key],
					'fh_result' => $post['fh_result'][$key],
					'fh_notes' => $post['fh_notes'][$key]
				);
				$this->db->insert('grants_funding_history', $history);
			}
		}

		foreach($post['report_date'] as $key => $dummy)
		{
			if(strlen($post['report_date'][$key]))
			{
				$report = array(
					'grant_id' => $ID,
					'report_date' => date_for_db($post['report_date'][$key]),
					'report_type' => $post['report_type'][$key],
					'report_notes' => $post['report_notes'][$key],
					'report_attachments' => serialize(maybe_unserialize($post['report_attachments'][$key]))
				);

				$this->db->insert('grants_reports', $report);
			}
		}

 	}

 	public function getGrantData($ID='')
 	{
 		$data = $this->db->where('ID', $ID)
 		->select('*')
 		->from('grants')
 		->join('grants_cycle', 'grants.ID = grants_cycle.grant_id', 'left')
 		->join('grants_no_cost_extension', 'grants.ID = grants_no_cost_extension.grant_id', 'left')
 		->get()
 		->result();

 		$ret = (array)$data[0];

 		$ret['reports'] = $this->getGrantsReports($ID);
 		$ret['history'] = $this->getGrantsHistory($ID);

 		return $ret;
 	}

 	public function getGrantsReports($ID='')
 	{
 		$data = $this->db->where('grant_id', $ID)
 		->select('*')
 		->from('grants_reports')
 		->get()
 		->result();

 		if(sizeof($data))
 		{
 			return $data; 			
 		}

 		return array(array('report_date' => '', 'report_type' => '', 'report_noes' => '', 'report_attachments' => ''));
 	}

 	public function getGrantsHistory($ID='')
 	{
 		$data = $this->db->where('grant_id', $ID)
 		->select('*')
 		->from('grants_funding_history')
 		->get()
 		->result();

 		if(sizeof($data))
 		{
 			return $data; 			
 		}

 		return array(array('fy' => '', 'fh_req' => '', 'fh_refund' => '', 'fh_program' => '', 'fh_result' => '', 'fh_notes' => ''));
 	}

 	public function getGrantList($limit, $offset, $args = array())
 	{
 		$return = array(
			'rows' => array(),
			'num_rows' => array());
		
		$this->db->start_cache();

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
			$this->db->order_by('ID', 'ASC');
		}

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('funder', $args['search_string'])
				->or_like('address', $args['search_string'])
				->or_like('city', $args['search_string'])
				->or_like('state', $args['search_string'])
				->or_like('zip', $args['search_string'])
				->or_like('website', $args['search_string']);
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

 		$data = $this->db->select('*')
 		->from('grants')
 		->limit($limit, $offset)
 		->get();

 		if($data->num_rows > 0)
		{
			$return['rows'] = $data->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('grants');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

 		return $return;
 	}

 	public function deleteGrant($ID='')
 	{
 		$this->db->where('grant_id', $ID)
		->delete(array('grant_positions', 'grant_office', 'grant_references'));

 		$this->db->where('ID', $ID)
		->delete('grants');
 	}
 
 }
 
 /* End of file grants_model.php */
 /* Location: ./application/models/grants_model.php */
  ?>