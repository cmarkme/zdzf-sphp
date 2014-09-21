<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class outreach_model extends CI_Model {

	public function save($post='')
	{
		$data = array(
			'created_by' => $post['created_by'],
			'date' => date('Y-m-d'),
			'office' => $post['office'],
			'contracted_agency' => $post['contracted_agency'],
			'contracted_agency_name' => $post['contracted_agency_name'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'date_of_event' => date_for_db($post['date_of_event']),
			'representative_for_event' => $post['representative_for_event'],
			'event_type' => $post['event_type'],
			'program_department' => $post['program_department'],
			'program_department_other' => $post['program_department_other'],
			'topic_title' => $post['topic_title'],
			'grant_program' => $post['grant_program'],
			'total_number_attendees' => $post['total_number_attendees'],
			'agency' => $post['agency'],
			'contact_name' => $post['contact_name'],
			'event_address' => $post['event_address'],
			'telephone' => $post['telephone'],
			'fax' => $post['fax'],
			'email' => $post['email'],
			'topic' => $post['topic'],
			'series' => $post['series'],
			'start_time' => $post['start_time'],
			'end_time' => $post['end_time'],
			'language' => serialize($post['language']),
			'post_online' => $post['post_online'],
			'comments_notes' => $post['comments_notes'],
			'num_health_fairs_ftf_total' => $post['num_health_fairs_ftf_total'],
			'health_fairs_ftf_spa1' => $post['health_fairs_ftf_spa1'],
			'health_fairs_ftf_caucasian' => $post['health_fairs_ftf_caucasian'],
			'health_fairs_ftf_spa2' => $post['health_fairs_ftf_spa2'],
			'health_fairs_ftf_latino' => $post['health_fairs_ftf_latino'],
			'health_fairs_ftf_spa3' => $post['health_fairs_ftf_spa3'],
			'health_fairs_ftf_african_american' => $post['health_fairs_ftf_african_american'],
			'health_fairs_ftf_spa4' => $post['health_fairs_ftf_spa4'],
			'health_fairs_ftf_api' => $post['health_fairs_ftf_api'],
			'health_fairs_ftf_spa5' => $post['health_fairs_ftf_spa5'],
			'health_fairs_ftf_other_ethnicities' => $post['health_fairs_ftf_other_ethnicities'],
			'health_fairs_ftf_spa6' => $post['health_fairs_ftf_spa6'],
			'health_fairs_spa_unknown' => $post['health_fairs_spa_unknown'],
			'health_fairs_ftf_spa7' => $post['health_fairs_ftf_spa7'],
			'health_fairs_ftf_spa8' => $post['health_fairs_ftf_spa8'],
			'health_fairs_ftf_coachella_valley' => $post['health_fairs_ftf_coachella_valley'],
			'health_fairs_ftf_inland_empire' => $post['health_fairs_ftf_inland_empire'],
			'health_fairs_ftf_riverside_county' => $post['health_fairs_ftf_riverside_county'],
			'health_fairs_ftf_san_bernandino' => $post['health_fairs_ftf_san_bernandino'],
			'health_fairs_ftf_sw_riverside' => $post['health_fairs_ftf_sw_riverside'],
			'health_fairs_ftf_inyo' => $post['health_fairs_ftf_inyo'],
			'health_fairs_ftf_mono' => $post['health_fairs_ftf_mono'],
			'health_fairs_ftf_kings' => $post['health_fairs_ftf_kings'],
			'health_fairs_ftf_tulare' => $post['health_fairs_ftf_tulare'],
			'health_fairs_ftf_out_of_territory' => $post['health_fairs_ftf_out_of_territory'],
			'health_fairs_ftf_unknown' => $post['health_fairs_ftf_unknown'],
			'health_fairs_ftf_spa_total' => $post['health_fairs_ftf_spa_total'],
			'health_fairs_ftf_ethnicity_total' => $post['health_fairs_ftf_ethnicity_total'],
			'num_health_fairs_walkby_total' => $post['num_health_fairs_walkby_total'],
			'health_fairs_walkby_spa1' => $post['health_fairs_walkby_spa1'],
			'health_fairs_walkby_caucasian' => $post['health_fairs_walkby_caucasian'],
			'health_fairs_walkby_spa2' => $post['health_fairs_walkby_spa2'],
			'health_fairs_walkby_latino' => $post['health_fairs_walkby_latino'],
			'health_fairs_walkby_spa3' => $post['health_fairs_walkby_spa3'],
			'health_fairs_walkby_african_american' => $post['health_fairs_walkby_african_american'],
			'health_fairs_walkby_spa4' => $post['health_fairs_walkby_spa4'],
			'health_fairs_walkby_api' => $post['health_fairs_walkby_api'],
			'health_fairs_walkby_spa5' => $post['health_fairs_walkby_spa5'],
			'health_fairs_walkby_other_ethnicities' => $post['health_fairs_walkby_other_ethnicities'],
			'health_fairs_walkby_spa6' => $post['health_fairs_walkby_spa6'],
			'health_fairs_walkby_spa_unknown' => $post['health_fairs_walkby_spa_unknown'],
			'health_fairs_walkby_spa7' => $post['health_fairs_walkby_spa7'],
			'health_fairs_walkby_spa8' => $post['health_fairs_walkby_spa8'],
			'health_fairs_walkby_coachella_valley' => $post['health_fairs_walkby_coachella_valley'],
			'health_fairs_walkby_inland_empire' => $post['health_fairs_walkby_inland_empire'],
			'health_fairs_walkby_riverside_county' => $post['health_fairs_walkby_riverside_county'],
			'health_fairs_walkby_san_bernandino' => $post['health_fairs_walkby_san_bernandino'],
			'health_fairs_walkby_sw_riverside' => $post['health_fairs_walkby_sw_riverside'],
			'health_fairs_walkby_inyo' => $post['health_fairs_walkby_inyo'],
			'health_fairs_walkby_mono' => $post['health_fairs_walkby_mono'],
			'health_fairs_walkby_kings' => $post['health_fairs_walkby_kings'],
			'health_fairs_walkby_tulare' => $post['health_fairs_walkby_tulare'],
			'health_fairs_walkby_out_of_territory' => $post['health_fairs_walkby_out_of_territory'],
			'health_fairs_walkby_unknown' => $post['health_fairs_walkby_unknown'],
			'health_fairs_walkby_spa_total' => $post['health_fairs_walkby_spa_total'],
			'health_fairs_walkby_ethnicity_total' => $post['health_fairs_walkby_ethnicity_total'],
			'num_network_meeting_total' => $post['num_network_meeting_total'],
			'network_meeeting_advocacy_information' => $post['network_meeeting_advocacy_information'],
			'network_meeting_spa1' => $post['network_meeting_spa1'],
			'network_meeting_caucasian' => $post['network_meeting_caucasian'],
			'network_meeting_spa2' => $post['network_meeting_spa2'],
			'network_meeting_latino' => $post['network_meeting_latino'],
			'network_meeting_spa3' => $post['network_meeting_spa3'],
			'network_meeting_african_american' => $post['network_meeting_african_american'],
			'network_meeting_spa4' => $post['network_meeting_spa4'],
			'network_meeting_api' => $post['network_meeting_api'],
			'network_meeting_spa5' => $post['network_meeting_spa5'],
			'network_meeting_other_ethnicities' => $post['network_meeting_other_ethnicities'],
			'network_meeting_spa6' => $post['network_meeting_spa6'],
			'network_meeting_spa_unknown' => $post['network_meeting_spa_unknown'],
			'network_meeting_spa7' => $post['network_meeting_spa7'],
			'network_meeting_spa8' => $post['network_meeting_spa8'],
			'network_meeting_coachella_valley' => $post['network_meeting_coachella_valley'],
			'network_meeting_inland_empire' => $post['network_meeting_inland_empire'],
			'network_meeting_riverside_county' => $post['network_meeting_riverside_county'],
			'network_meeting_san_bernandino' => $post['network_meeting_san_bernandino'],
			'network_meeting_sw_riverside' => $post['network_meeting_sw_riverside'],
			'network_meeting_inyo' => $post['network_meeting_inyo'],
			'network_meeting_mono' => $post['network_meeting_mono'],
			'network_meeting_kings' => $post['network_meeting_kings'],
			'network_meeting_tulare' => $post['network_meeting_tulare'],
			'network_meeting_out_of_territory' => $post['network_meeting_out_of_territory'],
			'network_meeting_unknown' => $post['network_meeting_unknown'],
			'network_meeting_spa_total' => $post['network_meeting_spa_total'],
			'network_meeting_ethnicity_total' => $post['network_meeting_ethnicity_total'],
			'num_staff_outreach_total' => $post['num_staff_outreach_total'],
			'staff_outreach_advocacy_information' => $post['staff_outreach_advocacy_information'],
			'staff_outreach_spa1' => $post['staff_outreach_spa1'],
			'staff_outreach_caucasian' => $post['staff_outreach_caucasian'],
			'staff_outreach_spa2' => $post['staff_outreach_spa2'],
			'staff_outreach_latino' => $post['staff_outreach_latino'],
			'staff_outreach_spa3' => $post['staff_outreach_spa3'],
			'staff_outreach_african_american' => $post['staff_outreach_african_american'],
			'staff_outreach_spa4' => $post['staff_outreach_spa4'],
			'staff_outreach_api' => $post['staff_outreach_api'],
			'staff_outreach_spa5' => $post['staff_outreach_spa5'],
			'staff_outreach_other_ethnicities' => $post['staff_outreach_other_ethnicities'],
			'staff_outreach_spa6' => $post['staff_outreach_spa6'],
			'staff_outreach_spa_unknown' => $post['staff_outreach_spa_unknown'],
			'staff_outreach_spa7' => $post['staff_outreach_spa7'],
			'staff_outreach_spa8' => $post['staff_outreach_spa8'],
			'staff_outreach_coachella_valley' => $post['staff_outreach_coachella_valley'],
			'staff_outreach_inland_empire' => $post['staff_outreach_inland_empire'],
			'staff_outreach_riverside_county' => $post['staff_outreach_riverside_county'],
			'staff_outreach_san_bernandino' => $post['staff_outreach_san_bernandino'],
			'staff_outreach_sw_riverside' => $post['staff_outreach_sw_riverside'],
			'staff_outreach_inyo' => $post['staff_outreach_inyo'],
			'staff_outreach_mono' => $post['staff_outreach_mono'],
			'staff_outreach_kings' => $post['staff_outreach_kings'],
			'staff_outreach_tulare' => $post['staff_outreach_tulare'],
			'staff_outreach_out_of_territory' => $post['staff_outreach_out_of_territory'],
			'staff_outreach_unknown' => $post['staff_outreach_unknown'],
			'staff_outreach_spa_total' => $post['staff_outreach_spa_total'],
			'staff_outreach_ethnicity_total' => $post['staff_outreach_ethnicity_total']
		);

		$this->db->insert('lasr_outreach', $data);

		return $this->db->insert_id();
	}

	public function update($post='', $id)
	{
		$data = array(
			'created_by' => $post['created_by'],
			'office' => $post['office'],
			'contracted_agency' => $post['contracted_agency'],
			'contracted_agency_name' => $post['contracted_agency_name'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'date_of_event' => date_for_db($post['date_of_event']),
			'representative_for_event' => $post['representative_for_event'],
			'event_type' => $post['event_type'],
			'program_department' => $post['program_department'],
			'program_department_other' => $post['program_department_other'],
			'topic_title' => $post['topic_title'],
			'grant_program' => $post['grant_program'],
			'total_number_attendees' => $post['total_number_attendees'],
			'agency' => $post['agency'],
			'contact_name' => $post['contact_name'],
			'event_address' => $post['event_address'],
			'telephone' => $post['telephone'],
			'fax' => $post['fax'],
			'email' => $post['email'],
			'topic' => $post['topic'],
			'series' => $post['series'],
			'start_time' => $post['start_time'],
			'end_time' => $post['end_time'],
			'language' => serialize($post['language']),
			'post_online' => $post['post_online'],
			'comments_notes' => $post['comments_notes'],
			'num_health_fairs_ftf_total' => $post['num_health_fairs_ftf_total'],
			'health_fairs_ftf_spa1' => $post['health_fairs_ftf_spa1'],
			'health_fairs_ftf_caucasian' => $post['health_fairs_ftf_caucasian'],
			'health_fairs_ftf_spa2' => $post['health_fairs_ftf_spa2'],
			'health_fairs_ftf_latino' => $post['health_fairs_ftf_latino'],
			'health_fairs_ftf_spa3' => $post['health_fairs_ftf_spa3'],
			'health_fairs_ftf_african_american' => $post['health_fairs_ftf_african_american'],
			'health_fairs_ftf_spa4' => $post['health_fairs_ftf_spa4'],
			'health_fairs_ftf_api' => $post['health_fairs_ftf_api'],
			'health_fairs_ftf_spa5' => $post['health_fairs_ftf_spa5'],
			'health_fairs_ftf_other_ethnicities' => $post['health_fairs_ftf_other_ethnicities'],
			'health_fairs_ftf_spa6' => $post['health_fairs_ftf_spa6'],
			'health_fairs_spa_unknown' => $post['health_fairs_spa_unknown'],
			'health_fairs_ftf_spa7' => $post['health_fairs_ftf_spa7'],
			'health_fairs_ftf_spa8' => $post['health_fairs_ftf_spa8'],
			'health_fairs_ftf_coachella_valley' => $post['health_fairs_ftf_coachella_valley'],
			'health_fairs_ftf_inland_empire' => $post['health_fairs_ftf_inland_empire'],
			'health_fairs_ftf_riverside_county' => $post['health_fairs_ftf_riverside_county'],
			'health_fairs_ftf_san_bernandino' => $post['health_fairs_ftf_san_bernandino'],
			'health_fairs_ftf_sw_riverside' => $post['health_fairs_ftf_sw_riverside'],
			'health_fairs_ftf_inyo' => $post['health_fairs_ftf_inyo'],
			'health_fairs_ftf_mono' => $post['health_fairs_ftf_mono'],
			'health_fairs_ftf_kings' => $post['health_fairs_ftf_kings'],
			'health_fairs_ftf_tulare' => $post['health_fairs_ftf_tulare'],
			'health_fairs_ftf_out_of_territory' => $post['health_fairs_ftf_out_of_territory'],
			'health_fairs_ftf_unknown' => $post['health_fairs_ftf_unknown'],
			'health_fairs_ftf_spa_total' => $post['health_fairs_ftf_spa_total'],
			'health_fairs_ftf_ethnicity_total' => $post['health_fairs_ftf_ethnicity_total'],
			'num_health_fairs_walkby_total' => $post['num_health_fairs_walkby_total'],
			'health_fairs_walkby_spa1' => $post['health_fairs_walkby_spa1'],
			'health_fairs_walkby_caucasian' => $post['health_fairs_walkby_caucasian'],
			'health_fairs_walkby_spa2' => $post['health_fairs_walkby_spa2'],
			'health_fairs_walkby_latino' => $post['health_fairs_walkby_latino'],
			'health_fairs_walkby_spa3' => $post['health_fairs_walkby_spa3'],
			'health_fairs_walkby_african_american' => $post['health_fairs_walkby_african_american'],
			'health_fairs_walkby_spa4' => $post['health_fairs_walkby_spa4'],
			'health_fairs_walkby_api' => $post['health_fairs_walkby_api'],
			'health_fairs_walkby_spa5' => $post['health_fairs_walkby_spa5'],
			'health_fairs_walkby_other_ethnicities' => $post['health_fairs_walkby_other_ethnicities'],
			'health_fairs_walkby_spa6' => $post['health_fairs_walkby_spa6'],
			'health_fairs_walkby_spa_unknown' => $post['health_fairs_walkby_spa_unknown'],
			'health_fairs_walkby_spa7' => $post['health_fairs_walkby_spa7'],
			'health_fairs_walkby_spa8' => $post['health_fairs_walkby_spa8'],
			'health_fairs_walkby_coachella_valley' => $post['health_fairs_walkby_coachella_valley'],
			'health_fairs_walkby_inland_empire' => $post['health_fairs_walkby_inland_empire'],
			'health_fairs_walkby_riverside_county' => $post['health_fairs_walkby_riverside_county'],
			'health_fairs_walkby_san_bernandino' => $post['health_fairs_walkby_san_bernandino'],
			'health_fairs_walkby_sw_riverside' => $post['health_fairs_walkby_sw_riverside'],
			'health_fairs_walkby_inyo' => $post['health_fairs_walkby_inyo'],
			'health_fairs_walkby_mono' => $post['health_fairs_walkby_mono'],
			'health_fairs_walkby_kings' => $post['health_fairs_walkby_kings'],
			'health_fairs_walkby_tulare' => $post['health_fairs_walkby_tulare'],
			'health_fairs_walkby_out_of_territory' => $post['health_fairs_walkby_out_of_territory'],
			'health_fairs_walkby_unknown' => $post['health_fairs_walkby_unknown'],
			'health_fairs_walkby_spa_total' => $post['health_fairs_walkby_spa_total'],
			'health_fairs_walkby_ethnicity_total' => $post['health_fairs_walkby_ethnicity_total'],
			'num_network_meeting_total' => $post['num_network_meeting_total'],
			'network_meeeting_advocacy_information' => $post['network_meeeting_advocacy_information'],
			'network_meeting_spa1' => $post['network_meeting_spa1'],
			'network_meeting_caucasian' => $post['network_meeting_caucasian'],
			'network_meeting_spa2' => $post['network_meeting_spa2'],
			'network_meeting_latino' => $post['network_meeting_latino'],
			'network_meeting_spa3' => $post['network_meeting_spa3'],
			'network_meeting_african_american' => $post['network_meeting_african_american'],
			'network_meeting_spa4' => $post['network_meeting_spa4'],
			'network_meeting_api' => $post['network_meeting_api'],
			'network_meeting_spa5' => $post['network_meeting_spa5'],
			'network_meeting_other_ethnicities' => $post['network_meeting_other_ethnicities'],
			'network_meeting_spa6' => $post['network_meeting_spa6'],
			'network_meeting_spa_unknown' => $post['network_meeting_spa_unknown'],
			'network_meeting_spa7' => $post['network_meeting_spa7'],
			'network_meeting_spa8' => $post['network_meeting_spa8'],
			'network_meeting_coachella_valley' => $post['network_meeting_coachella_valley'],
			'network_meeting_inland_empire' => $post['network_meeting_inland_empire'],
			'network_meeting_riverside_county' => $post['network_meeting_riverside_county'],
			'network_meeting_san_bernandino' => $post['network_meeting_san_bernandino'],
			'network_meeting_sw_riverside' => $post['network_meeting_sw_riverside'],
			'network_meeting_inyo' => $post['network_meeting_inyo'],
			'network_meeting_mono' => $post['network_meeting_mono'],
			'network_meeting_kings' => $post['network_meeting_kings'],
			'network_meeting_tulare' => $post['network_meeting_tulare'],
			'network_meeting_out_of_territory' => $post['network_meeting_out_of_territory'],
			'network_meeting_unknown' => $post['network_meeting_unknown'],
			'network_meeting_spa_total' => $post['network_meeting_spa_total'],
			'network_meeting_ethnicity_total' => $post['network_meeting_ethnicity_total'],
			'num_staff_outreach_total' => $post['num_staff_outreach_total'],
			'staff_outreach_advocacy_information' => $post['staff_outreach_advocacy_information'],
			'staff_outreach_spa1' => $post['staff_outreach_spa1'],
			'staff_outreach_caucasian' => $post['staff_outreach_caucasian'],
			'staff_outreach_spa2' => $post['staff_outreach_spa2'],
			'staff_outreach_latino' => $post['staff_outreach_latino'],
			'staff_outreach_spa3' => $post['staff_outreach_spa3'],
			'staff_outreach_african_american' => $post['staff_outreach_african_american'],
			'staff_outreach_spa4' => $post['staff_outreach_spa4'],
			'staff_outreach_api' => $post['staff_outreach_api'],
			'staff_outreach_spa5' => $post['staff_outreach_spa5'],
			'staff_outreach_other_ethnicities' => $post['staff_outreach_other_ethnicities'],
			'staff_outreach_spa6' => $post['staff_outreach_spa6'],
			'staff_outreach_spa_unknown' => $post['staff_outreach_spa_unknown'],
			'staff_outreach_spa7' => $post['staff_outreach_spa7'],
			'staff_outreach_spa8' => $post['staff_outreach_spa8'],
			'staff_outreach_coachella_valley' => $post['staff_outreach_coachella_valley'],
			'staff_outreach_inland_empire' => $post['staff_outreach_inland_empire'],
			'staff_outreach_riverside_county' => $post['staff_outreach_riverside_county'],
			'staff_outreach_san_bernandino' => $post['staff_outreach_san_bernandino'],
			'staff_outreach_sw_riverside' => $post['staff_outreach_sw_riverside'],
			'staff_outreach_inyo' => $post['staff_outreach_inyo'],
			'staff_outreach_mono' => $post['staff_outreach_mono'],
			'staff_outreach_kings' => $post['staff_outreach_kings'],
			'staff_outreach_tulare' => $post['staff_outreach_tulare'],
			'staff_outreach_out_of_territory' => $post['staff_outreach_out_of_territory'],
			'staff_outreach_unknown' => $post['staff_outreach_unknown'],
			'staff_outreach_spa_total' => $post['staff_outreach_spa_total'],
			'staff_outreach_ethnicity_total' => $post['staff_outreach_ethnicity_total']
		);

		$this->db->where('ID', $id)
		->update('lasr_outreach', $data);
	}

	public function delete($id='')
	{
		$this->db->where('ID', $id)
		->delete('lasr_outreach');
	}

	public function fetch($id='')
	{
		$result = $this->db->where('ID', $id)
		->from('lasr_outreach')
		->get()
		->result();

		return $result[0];
	}

	public function fetchAll($limit, $offset, $args = array())
	{
		$return = array(
			'rows' => array(),
			'num_rows' => array());
		
		$this->db->start_cache();

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
 		->from('lasr_outreach')
 		->limit($limit, $offset)
 		->get();

 		if($data->num_rows > 0)
		{
			$return['rows'] = $data->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('lasr_outreach');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

 		return $return;
	}

}

/* End of file outreach_model.php */
/* Location: ./application/models/outreach_model.php */

?>