<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Labor_Model extends CI_Model { 

	public function get_account($id)
	{
		$q = $this->db->where('ID', $id)->from('labor_accounts')->limit(1)->get()->result();

		return $q[0];
	}

	public function get_accounts($limit = 0, $offset = 0, $args = array())
	{
		$results = array('rows' => array(),
			'num_rows' => 0);

		$this->db->start_cache();

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('ledger', $args['search_string'])
				->or_like('project', $args['search_string'])
				->or_like('grant', $args['search_string'])
				->or_like('location', $args['search_string']);
			}

			foreach($args['filters']['search_type'] as $key => $a) {
				$search = '';

				switch($args['filters']['search_type'][$key]) {

					case 'equals': 
						if(strlen($args['filters']['search_value'][$key]) > 0)
						$this->db->where($args['filters']['search_val'][$key], $args['filters']['search_value'][$key]);
					break; 

					case 'not_equal': 
						if(strlen($args['filters']['search_value'][$key]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' !=', $args['filters']['search_value'][$key]);
					break; 

					case 'less_than': 
						if(strlen($args['filters']['search_value'][$key]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' <', $args['filters']['search_value'][$key]);
					break; 

					case 'less_than_equal': 
						if(strlen($args['filters']['search_value'][$key]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' <=', $args['filters']['search_value'][$key]);
					break; 

					case 'greater_than': 
						if(strlen($args['filters']['search_value'][$key]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' >', $args['filters']['search_value'][$key]);
					break; 

					case 'greater_than_equal': 
						if(strlen($args['filters']['search_value'][$key]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' >=', $args['filters']['search_value'][$key]);
					break; 

					case 'like': 
						if(strlen($args['filters']['search_value'][$key]) > 0)
						$this->db->like($args['filters']['search_val'][$key], $args['filters']['search_value'][$key]);
					break; 
				}
			}
		}

		$this->db->stop_cache();

		if(($limit > 0) || $offset > 0) {
			$this->db->limit($limit, $offset);
		}
		
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
			$this->db->order_by('ledger', 'desc');
		}

		
		$q = $this->db->get('labor_accounts');

        if($q->num_rows() > 0) {
            
            $results['rows'] = $q->result();
        }

        $this->db->select('count(*) as count', false);

        $tmp = $this->db->get('labor_accounts')->result();
        //$tmp = $c->get()->result();

        $results['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();
        
        return $results;
	}

	public function get_account_list($module = 'all')
	{
		$list = array();

		if($module != 'all')
		{
			$this->db->where($module, 'on');
		}

		$this->db->where('status', 'Y');

		$q = $this->db->get('labor_accounts')->result();

		foreach($q as $r)
		{
			$list[$r->ledger] = $r->ledger.'|'.$r->description;
		}

		return $list;
	}

	public function insert_account($data)
	{
		$insert_data = array(
			'ledger' => $data['ledger'],
			'project' => $data['project'],
			'grant' => $data['grant'],
			'location' => $data['location'],
			'description' => $data['description'],
			'status' => $data['status'],
			'timesheet' => isset($data['timesheet']) ? 'on' : 'off',
			'travel' => isset($data['travel']) ? 'on' : 'off',
			'financials' => isset($data['financials']) ? 'on' : 'off',
			'procurement' => isset($data['procurement']) ? 'on' : 'off'
		);

		$this->db->insert('labor_accounts', $insert_data);

		return $this->db->insert_id();
	}

	public function update_account($id, $data)
	{
		$update_data = array(
			'ledger' => $data['ledger'],
			'project' => $data['project'],
			'grant' => $data['grant'],
			'location' => $data['location'],
			'description' => $data['description'],
			'status' => $data['status'],
			'timesheet' => isset($data['timesheet']) ? 'on' : 'off',
			'travel' => isset($data['travel']) ? 'on' : 'off',
			'financials' => isset($data['financials']) ? 'on' : 'off',
			'procurement' => isset($data['procurement']) ? 'on' : 'off'
		);

		$this->db->where('ID', $id)->update('labor_accounts', $update_data);
	}

	public function do_bulk_action($action, $ids)
    {
        $this->db->where_in('ID', $ids);

        switch($action) {

            case 'delete':
                $this->db->delete('labor_accounts');
            break;

            case 'status_active':
                $this->db->update('labor_accounts', array('status' => 'Y'));
            break;

            case 'status_inactive':
                $this->db->update('labor_accounts', array('status' => 'N'));
            break;
        }
    }

	public function gen_random_accounts($num = 100)
	{
		$data = array();
		$loc_array = array(
			'WILS', 
			'GSFV', 
			'GELA', 
			'IE', 
			'RM'
		);

		for($i = 0; $i != $num; $i++)
		{
			$data['ledger'] = rand(1,9).'-'.str_pad(rand(0, pow(10, 3)-1), 3, '0', STR_PAD_LEFT).'-'.str_pad(rand(0, pow(10, 4)-1), 4, '0', STR_PAD_LEFT).'-'.rand(1,9).'-'.str_pad(rand(0, pow(10, 2)-1), 2, '0', STR_PAD_LEFT).'-'.str_pad(rand(0, pow(10, 3)-1), 3, '0', STR_PAD_LEFT).'-'.str_pad(rand(0, pow(10, 3)-1), 3, '0', STR_PAD_LEFT);
			$data['project'] = str_pad(rand(0, pow(10, 4)-1), 4, '0', STR_PAD_LEFT);
			$data['grant'] = str_pad(rand(0, pow(10, 3)-1), 3, '0', STR_PAD_LEFT);
			$data['location'] = $loc_array[rand(0, sizeof($loc_array)-1)];
			$data['description'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.';
			$data['status'] = ((rand(0, 100) % 2 == 0) ? 'Y' : 'N');

			$this->insert_account($data);
		}
	}
}