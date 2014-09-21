<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_model extends CI_Model {

	
	public function save_reservation($post='')
	{
		$data = array(
			'created_by' => $post['created_by'],
			'person_in_charge' => $post['person_in_charge'],
			'room' => $post['room'],
			'start_time' => datetime_for_db($post['start_time']),
			'end_time' => datetime_for_db($post['end_time']),
			'description' => $post['description']
			);

		$this->db->insert('calendar', $data);

		return $this->db->insert_id();
	}

	public function update_reservation($id, $post='')
	{
		$data = array(
			'person_in_charge' => $post['person_in_charge'],
			'room' => $post['room'],
			'start_time' => datetime_for_db($post['start_time']),
			'end_time' => datetime_for_db($post['end_time']),
			'description' => $post['description']
			);

		$this->db->where('ID', $id)
		->update('calendar', $data);
	}

	public function get_reservations($limit, $offset, $user_id = 0)
	{
		$results = array('rows' => array(),
			'num_rows' => 0);

		if($user_id)
		{
			$user = $this->users_model->get_user($user_id);
			$users = array_merge(array($user_id), $user->subs);

			$this->db->where_in('created_by', $users);
		}

		$this->db->limit($limit, $offset);

		$q = $this->db->get('calendar');

		if($q->num_rows() > 0) {
            
            $results['rows'] = $q->result();
        }

        if($user_id)
		{
			$user = $this->users_model->get_user($user_id);
			$users = array_merge(array($user_id), $user->subs);

			$this->db->where_in('created_by', $users);
		}

        $c = $this->db->select('count(*) as count', false)->from('calendar');
        $tmp = $c->get()->result();

        $results['num_rows'] = $tmp[0]->count;

		$this->db->flush_cache();

		return $results;
	}

	public function get_reservation($id)
	{
		$query = $this->db->where('ID', $id)
		->get('calendar')
		->result();

		return $query[0];
	}

	public function get_by_month($month, $year, $user_id = 0)
	{
		$user = '';

		if($month == '' || $month == 0) {
			$month = date('m');
		}

		if($year == '' || $year == 0) {
			$year = date('Y');
		}

		$first = date('Y-m-d 00:i:s', mktime(0, 0, 0, $month, 1, $year));
		$last = date('Y-m-t 00:i:s', mktime(0, 0, 0, $month, 1, $year));

		if($user_id)
		{
			$user = $this->users_model->get_user($user_id);
			$users = array_merge(array($user_id), $user->subs);

			$this->db->where_in('created_by', $users);
		}

		// $q = $this->db->query("SELECT * FROM `calendar` WHERE `start_time` BETWEEN '{$first}' AND '{$last}'{$user}");

		$this->db->where('start_time >', $first);
		$this->db->where('start_time <', $last);
		$q = $this->db->get('calendar');

		return $q->result();
	}

	public function delete($id='')
	{
		$this->db->delete('calendar', array('ID' => $id));
	}

}

/* End of file calendar.php */
/* Location: ./application/models/calendar.php */
