<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget_model extends CI_Model { 

	public function get_all_budgets($limit, $offset, $args = array())
	{
		$return = array(
			'rows' => array(),
			'num_rows' => array());
		
		$this->db->start_cache();

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('first_name', $args['search_string'])
				->or_like('title', $args['search_string'])
				->or_like('status', $args['search_string'])
				->or_like('fund', $args['search_string'])
				->or_like('location', $args['search_string'])
				->or_like('division', $args['search_string'])
				->or_like('dept', $args['search_string'])
				->or_like('grant', $args['search_string'])
				->or_like('project', $args['search_string'])
				->or_like('ex_comp_date', date_for_db($args['search_string']));
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

		$this->db->limit($limit, $offset);
		$t = $this->db->get('budget');
		
		if($t->num_rows > 0)
		{
			$return['rows'] = $t->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('budget');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

		return $return;
	}

	public function save_budget($temp)
	{
		$meta = $temp['meta'];

		$data['title'] = $temp['title'];
		$data['fund'] = $temp['fund'];
		$data['location'] = $temp['location'];
		$data['division'] = $temp['division'];
		$data['dept'] = $temp['dept'];
		$data['grant'] = $temp['grant'];
		$data['project'] = $temp['project'];
		$data['prior_year'] = $temp['prior_year'];
		$data['ex_comp_date'] = date_for_db($temp['ex_comp_date']);
		$data['status'] = $temp['status'];
		$data['manager'] = $temp['manager'];
		$data['director'] = $temp['director'];
		$data['prep_status'] = $temp['prep_status'];
		$data['comment'] = $temp['comment'];

		$this->db->insert('budget', $data);
		$id = $this->db->insert_id();

		foreach($meta as $key => $val)
		{
			$this->db->insert('budget_meta', array(
				'budget_id' => $id,
				'meta_key' => $key,
				'meta_value' => ((is_array($meta[$key])) ? base64_encode(serialize($meta[$key])) : $val)
				));
		}

		return $id;
	}

	public function update_budget($temp, $id)
	{
		$meta = $temp['meta'];

		$data['title'] = $temp['title'];
		$data['fund'] = $temp['fund'];
		$data['location'] = $temp['location'];
		$data['division'] = $temp['division'];
		$data['dept'] = $temp['dept'];
		$data['grant'] = $temp['grant'];
		$data['project'] = $temp['project'];
		$data['prior_year'] = $temp['prior_year'];
		$data['ex_comp_date'] = date_for_db($temp['ex_comp_date']);
		$data['status'] = $temp['status'];
		$data['manager'] = $temp['manager'];
		$data['director'] = $temp['director'];
		$data['prep_status'] = $temp['prep_status'];
		$data['comment'] = $temp['comment'];

		$this->db->where('ID', $id);
		$this->db->update('budget', $data);

		foreach($meta as $key => $val)
		{	
			$this->db->where(array('meta_key' => $key, 'budget_id' => $id));
			$this->db->update('budget_meta', array('meta_value' => ((is_array($meta[$key])) ? base64_encode(serialize($meta[$key])) : $val)));
		}
	}


	public function load_budget($id)
	{
		$q = $this->db->where('ID', $id)
        ->get('budget');
        
        if($q->num_rows() > 0) 
        {
            
            $data = $q->row();
            $data->meta = $this->get_budget_meta($id);

            return $data;
        }
        
        return array();
	}

	public function get_budget_meta($uID)
    {
        $data = array();
        $meta = array();
        $m = $this->db->where('budget_id', $uID)
            ->get('budget_meta');

        if($m->num_rows() > 0) 
        {
            $meta_info = $m->result();
            
            foreach($meta_info as $key)
            {
            	$test = base64_decode($key->meta_value);
            	
            	if(is_serialized($test))
            	{
            		$meta[$key->meta_key] = @unserialize(base64_decode($key->meta_value));
            	}
            	else
            	{
            		$meta[$key->meta_key] = $key->meta_value;	
            	}
                
            }
        }

        return $meta;
    }

}