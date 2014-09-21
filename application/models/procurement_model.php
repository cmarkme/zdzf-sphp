<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Procurement_Model extends CI_Model { 

	public function get_templates()
	{
		$data = $this->db->get('chapter_procurement_templates')
		->result();

		return $data;
	}

	public function get_template($id)
	{
		$data = $this->db->where('ID', $id)
		->limit(1)
		->get('chapter_procurement_templates')
		->result();

		$data[0]->products =$this->db->where('template_id', $id)
		->get('chapter_procurement_products')
		->result();

		$data[0]->fields =$this->db->where('template_id', $id)
		->get('chapter_procurement_custom_fields')
		->result();

		return $data[0];
	}

	public function get_order($id, $order)
	{
		$data = $this->db->where(array('ID' => $order, 'template_id' => $id))
		->limit(1)
		->get('chapter_procurement_orders')
		->result();

		$data[0]->products =$this->db->where('order_id', $order)
		->get('chapter_procurement_order_products')
		->result();

		$data[0]->form_data = unserialize(base64_decode($data[0]->form_data));

		return $data[0];
	}

	public function get_orders($current = false, $limit, $offset, $args = array())
	{
		$return = array(
			'rows' => array(),
			'num_rows' => array()
		);

		if(is_numeric($current))
		{
			$user = $this->users_model->get_user($current);
			$ids = array_merge(array($current), $user->subs);
		}

		$this->db->start_cache();

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('date_created', $args['search_string'])
				->or_like('first_name', $args['search_string'])
				->or_like('last_name', $args['search_string'])
				->or_like('order_id', $args['search_string'])
				->or_like('date_inv_rec', date_for_db($args['search_string']))
				->or_like('chk_req_sub', $args['search_string'])
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


		if($current == true && !is_numeric($current))
		{
			$status = array('In Process','Submitted to Supervisor');

			$this->db->where_in('current_status', $status);
		}
		else if(is_numeric($current))
		{
			$this->db->where_in('created_by', $ids);
		}

		$this->db->stop_cache();
		
		$data['rows'] = $this->db->limit($limit, $offset)->get('chapter_procurement_orders')->result();			
			
		$c = $this->db->select('count(*) as count', false)->from('chapter_procurement_orders');
        $tmp = $c->get()->result();

        $data['num_rows'] = $tmp[0]->count;

		$this->db->flush_cache();

		return $data;
	}

	public function get_product($id, $pid)
	{
		$product = $this->db->where(array('ID' => $pid, 'template_id' => $id))
		->limit(1)
		->get('chapter_procurement_products')
		->result();

		return $product[0];
	}

	public function save_order($id, $data)
	{
		$main = array(
			'template_id' => $id,
			'date_created' => date('Y-m-d H:i:s'),
			'order_id' => ((isset($data['order_id'])) ? $data['order_id'] : ''),
			'created_by' => $this->user->ID,
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'order_locations' => ((isset($data['available_order_locations'])) ? $data['available_order_locations'] : ''),
			'shipping_options' => ((isset($data['shipping_options'])) ? $data['shipping_options'] : ''),
			'date_rec_com' => ((isset($data['date_rec_com'])) ? date_for_db($data['date_rec_com']) : ''),
			'date_inv_rec' => ((isset($data['date_inv_rec'])) ? date_for_db($data['date_inv_rec']) : ''),
			'inv_num' => ((isset($data['inv_num'])) ? $data['inv_num'] : ''),
			'inv_amount' => ((isset($data['inv_amount'])) ? $data['inv_amount'] : ''),
			'chk_req_sub' => ((isset($data['chk_req_sub'])) ? date_for_db($data['chk_req_sub']) : ''),
			'comments' => $data['comments'],
			'aprox_total' => $data['grand_total'][0],
			'form_data' => base64_encode(serialize($data['custom_option']))
		);

		if($data['submit_request'] == 'Submit for Approval')
		{
			$main['current_status'] = 'Submitted for Approval';
			
			user_notifier::set_data($main);
			user_notifier::set_user($user_id);
			user_notifier::set_template('procurement', 'submit_for_approval');
		} 
		else if ($data['submit_request'] == 'Approve')
		{
			$main['current_status'] = 'Approved';

			user_notifier::set_data($main);
			user_notifier::set_user($user_id);
			user_notifier::set_template('procurement', 'aprove');
		} 
		else if (($data['submit_request'] == 'Send Back to User') || !isset($main['current_status']))
		{
			$main['current_status'] = 'In Process';

			user_notifier::set_data($main);
			user_notifier::set_user($user_id);
			user_notifier::set_template('procurement', 'send_back_to_user');
		}
		else
		{
			$main['current_status'] = $main['current_status'];
		}

		$this->db->insert('chapter_procurement_orders', $main);

		$o_id = $this->db->insert_id();

		if(isset($data['item_name']) && sizeof($data['item_name'] > 0))
		{
			foreach($data['item_name'] as $key => $val)
			{
				if(strlen($data['item_name'][$key]) > 0)
				{
					$p_data = array(
						'order_id' => $o_id,
						'item_name' => $data['item_name'][$key],
						'item_id' => $data['item_id'][$key],
						'unit_type' => $data['unit_type'][$key],
						'price' => $data['price'][$key],
						'quantity' => $data['quantity'][$key],
						'total' => $data['total'][$key]
					);

					$this->db->insert('chapter_procurement_order_products', $p_data);
				}
			}
		}

		return $o_id;
	}

	public function update_order($order, $data)
	{
		$main = array(
			'order_locations' => ((isset($data['available_order_locations'])) ? $data['available_order_locations'] : ''),
			'shipping_options' => ((isset($data['shipping_options'])) ? $data['shipping_options'] : ''),
			'date_rec_com' => ((isset($data['date_rec_com'])) ? date_for_db($data['date_rec_com']) : ''),
			'date_inv_rec' => ((isset($data['date_inv_rec'])) ? date_for_db($data['date_inv_rec']) : ''),
			'inv_num' => ((isset($data['inv_num'])) ? $data['inv_num'] : ''),
			'inv_amount' => ((isset($data['inv_amount'])) ? $data['inv_amount'] : ''),
			'chk_req_sub' => ((isset($data['chk_req_sub'])) ? date_for_db($data['chk_req_sub']) : ''),
			'comments' => $data['comments'],
			'aprox_total' => $data['grand_total'][0],
			'form_data' => base64_encode(serialize($data['custom_option']))
		);

		if($data['submit_request'] == 'Submit for Approval')
		{
			$main['current_status'] = 'Submitted for Approval';
			
			user_notifier::set_data($main);
			user_notifier::set_user($user_id);
			user_notifier::set_template('procurement', 'submit_for_approval');
		} 
		else if ($data['submit_request'] == 'Approve')
		{
			$main['current_status'] = 'Approved';

			user_notifier::set_data($main);
			user_notifier::set_user($user_id);
			user_notifier::set_template('procurement', 'aprove');
		} 
		else if (($data['submit_request'] == 'Send Back to User') || !isset($main['current_status']))
		{
			$main['current_status'] = 'In Process';

			user_notifier::set_data($main);
			user_notifier::set_user($user_id);
			user_notifier::set_template('procurement', 'send_back_to_user');
		}
		else
		{
			$main['current_status'] = $main['current_status'];
		}

		$this->db->where('ID', $order);
		$this->db->update('chapter_procurement_orders', $main);

		
		$this->db->where('order_id', $order);
		$this->db->delete('chapter_procurement_order_products');

		if(isset($data['item_name']) && sizeof($data['item_name'] > 0))
		{
			foreach($data['item_name'] as $key => $val)
			{
				if(strlen($data['item_name'][$key]) > 0)
				{
					$p_data = array(
						'order_id' => $order,
						'item_name' => $data['item_name'][$key],
						'item_id' => $data['item_id'][$key],
						'unit_type' => $data['unit_type'][$key],
						'price' => $data['price'][$key],
						'quantity' => $data['quantity'][$key],
						'total' => $data['total'][$key]
					);

					$this->db->insert('chapter_procurement_order_products', $p_data);
				}
			}
		}
	}

	public function save_template($data)
	{
		$main = array(
			'date_created' => date('Y-m-d H:i:s'),
			'template_name' => $data['template_name'],
			'gen_inv_num' => $data['gen_inv_num'],
			'available_shipping_options' => $data['available_shipping_options'],
			'available_order_locations' => $data['available_order_locations'],
			'show_date_rec_com' => $data['show_date_rec_com'],
			'show_date_inv_rec' => $data['show_date_inv_rec'],
			'show_inv_num' => $data['show_inv_num'],
			'show_inv_amount' => $data['show_inv_amount'],
			'show_chk_req_sub' => $data['show_chk_req_sub'],
			'show_comm' => $data['show_comm'],
			'optional_instructions' => $data['optional_instructions']
		);

		$this->db->insert('chapter_procurement_templates', $main);

		$t_id = $this->db->insert_id();

		if(isset($data['item_name']) && sizeof($data['item_name'] > 0))
		{
			foreach($data['item_name'] as $key => $val)
			{
				if(strlen($data['item_name'][$key]) > 0)
				{
					$p_data = array(
						'template_id' => $t_id,
						'item_name' => $data['item_name'][$key],
						'item_id' => $data['item_id'][$key],
						'unit_type' => $data['unit_type'][$key],
						'price' => $data['price'][$key]
					);

					$this->db->insert('chapter_procurement_products', $p_data);
				}
			}
		}

		if(isset($data['coption_name']) && (sizeof($data['coption_name']) > 0))
		{
			foreach($data['coption_name'] as $key => $val)
			{
				if(strlen($data['coption_name'][$key]) > 0)
				{
					$p_data = array(
						'template_id' => $t_id,
						'option_name' => $data['coption_name'][$key],
						'option_type' => $data['coption_type'][$key],
						'option_value' => $data['coption_value'][$key]
					);

					$this->db->insert('chapter_procurement_custom_fields', $p_data);
				}
			}
		}

		return $t_id;
	}

	public function edit_template($id, $data)
	{
		$main = array(
			'template_name' => $data['template_name'],
			'gen_inv_num' => $data['gen_inv_num'],
			'available_shipping_options' => $data['available_shipping_options'],
			'available_order_locations' => $data['available_order_locations'],
			'show_date_rec_com' => $data['show_date_rec_com'],
			'show_date_inv_rec' => $data['show_date_inv_rec'],
			'show_inv_num' => $data['show_inv_num'],
			'show_inv_amount' => $data['show_inv_amount'],
			'show_chk_req_sub' => $data['show_chk_req_sub'],
			'show_comm' => $data['show_comm'],
			'optional_instructions' => $data['optional_instructions']
		);

		$this->db->where('ID', $id)->update('chapter_procurement_templates', $main);

		$this->db->where('template_id', $id)->delete('chapter_procurement_products');

		if(isset($data['item_name']) && sizeof($data['item_name'] > 0))
		{
			foreach($data['item_name'] as $key => $val)
			{
				if(strlen($data['item_name'][$key]) > 0)
				{
					$p_data = array(
						'template_id' => $id,
						'item_name' => $data['item_name'][$key],
						'item_id' => $data['item_id'][$key],
						'unit_type' => $data['unit_type'][$key],
						'price' => $data['price'][$key]
					);

					$this->db->insert('chapter_procurement_products', $p_data);
				}
			}
		}

		$this->db->where('template_id', $id)->delete('chapter_procurement_custom_fields');

		if(isset($data['coption_name']) && (sizeof($data['coption_name']) > 0))
		{
			foreach($data['coption_name'] as $key => $val)
			{
				if(strlen($data['coption_name'][$key]) > 0)
				{
					$p_data = array(
						'template_id' => $id,
						'option_name' => $data['coption_name'][$key],
						'option_type' => $data['coption_type'][$key],
						'option_value' => $data['coption_value'][$key]
					);

					$this->db->insert('chapter_procurement_custom_fields', $p_data);
				}
			}
		}
	}

}