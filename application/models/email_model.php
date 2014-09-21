<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_Model extends CI_Model {

	public function save_emails($module, $data)
	{
		$obj = array();
		$check = $this->db->where('module', $module)
					->get('email')
					->result();

		foreach($data as $key => $item)
		{
			$obj[] = array('module' => $module,
						'type' => $key,
						'send_to' => $item['to'],
						'subject' => $item['subject'],
						'message' => $item['message']
						);
		}
		
		if(count($check))
		{
			foreach($obj as $upd)
			{
				$this->db->where(array('module' => $module, 'type' => $upd['type']));
				$this->db->update('email', $upd);
			}
		}
		else
		{
			$this->db->insert_batch('email', $obj);
		}

	}

	public function get_emails($module = '')
	{
		$ret = array(
			'submit_for_approval' => array('to' => '', 'subject' => '', 'message' => ''),
			'approve' => array('to' => '', 'subject' => '', 'message' => ''),
			'send_back_to_user' => array('to' => '', 'subject' => '', 'message' => '')
			);
		$res = $this->db->where('module', $module)
				->get('email')
				->result();

		foreach ($res as $item) 
		{
			$ret[$item->type] = array(
				'to' => $item->send_to,
				'subject' => $item->subject,
				'message' => $item->message
			);
		}

		return $ret;
	}

	public function get_email($module = '', $type)
	{
		$res = $this->db->where(array('module' => $module, 'type' => $type))
				->get('email')
				->result();

		return $res[0];
	}
}

/* End of file email_Model.php */
/* Location: ./application/models/email_Model.php */