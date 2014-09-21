<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends MY_Controller {
    
    function __construct()
	{
		parent::__construct();
		set_title('Resource Calendar');
	}

	public function index()
	{  
       	$data = array();

       	$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->calendar_model->get_reservations($this->config->item('pagination_per_page'), $offset);
		
		$p_config = array();
		$p_config['base_url'] = site_url('calendar/page');
		$p_config['total_rows'] = $list['num_rows'];
		$p_config['uri_segment'] = $this->config->item('paginiation_segment');
		$p_config['per_page'] = $this->config->item('pagination_per_page');
		$p_config['num_links'] = 10;
		$p_config['full_tag_open'] = '<div class="pagination"><span>Pages:</span>';
		$p_config['full_tag_close'] = '</div>';
		$p_config['cur_tag_open'] = '<strong class="ui-state-hover ui-corner-all">';
		$p_config['cur_tag_close'] = '</strong>';
		$p_config['anchor_class'] = 'class="ui-state-default ui-corner-all"';
		$p_config['suffix'] = '?'.http_build_query($_GET, '', "&");
		$p_config['first_link'] = FALSE;
		$p_config['last_link'] = FALSE;

		$this->pagination->initialize($p_config);

       	$data['resource_list'] = $list['rows'];

       	$data['caldata'] = array();
       	
		$prefs = array (
			'show_next_prev'  => TRUE,
			'next_prev_url'   => site_url('calendar'),
			'month_type'   => 'long',
            'day_type'     => 'short'
		);

		$prefs['template'] = '

		   {table_open}<table border="0" cellpadding="0" cellspacing="0" class="ui-datepicker-calendar">{/table_open}

		   {heading_row_start}<tr>{/heading_row_start}

		   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

		   {heading_row_end}</tr>{/heading_row_end}

		   {week_row_start}<tr>{/week_row_start}
		   {week_day_cell}<td class="weekname ui-state-default">{week_day}</td>{/week_day_cell}
		   {week_row_end}</tr>{/week_row_end}

		   {cal_row_start}<tr>{/cal_row_start}
		   {cal_cell_start}<td class="weekday ui-state-default">{/cal_cell_start}

		   {cal_cell_content}{day}<div class="day-event">{content}</div>{/cal_cell_content}
		   {cal_cell_content_today}{day}<div class="highlight"><div class="day-event">{content}</div>{/cal_cell_content_today}

		   {cal_cell_no_content}{day}{/cal_cell_no_content}
		   {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

		   {cal_cell_blank}&nbsp;{/cal_cell_blank}

		   {cal_cell_end}</td>{/cal_cell_end}
		   {cal_row_end}</tr>{/cal_row_end}

		   {table_close}</table>{/table_close}
		';

		$caldata = $this->calendar_model->get_by_month($this->uri->segment(3), $this->uri->segment(2));

		$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

		foreach($caldata as $cal)
		{	
			$first = date('j', strtotime($cal->start_time));
			$end = date('j', strtotime($cal->end_time));
			$user = $this->users_model->get_user($cal->person_in_charge);

			
			do {
				if(can_this_user('calendar/edit/all') || (can_this_user('calendar/edit') && (in_array($cal->person_in_charge, $data['manage']) || in_array($cal->created_by, $data['manage']))))
				{
					@$data['caldata'][$first] .= '<p><a href="'.site_url('calendar/edit/'.$cal->ID).'">'.$cal->room.'<br>from '.timeonly_for_display($cal->start_time).' <br>to '.timeonly_for_display($cal->end_time).'<br>by '.$user->meta['first_name'].' '.$user->meta['last_name'].'</a></p>';
				}
				else
				{
					@$data['caldata'][$first] .= '<p>'.$cal->room.'<br>from '.timeonly_for_display($cal->start_time).' to '.timeonly_for_display($cal->end_time).'<br>by '.$user->meta['first_name'].' '.$user->meta['last_name'].'</p>';
				}
				$first++;
			} while($first <= $end);
		}
		
		$this->calendar->initialize($prefs);

		$this->load->view('calendar/view', $data);
	}

	public function my_reservations()
	{  
		$GLOBALS['_title'] = "Alzheimer's Association";
       	$data = array();

       	$offset = $this->uri->segment(4);
		$list = $this->calendar_model->get_reservations($this->config->item('pagination_per_page'), $offset, $this->user->ID);
		
		$p_config = array();
		$p_config['base_url'] = site_url('calendar/my_reservations/page');
		$p_config['total_rows'] = $list['num_rows'];
		$p_config['uri_segment'] = 4;
		$p_config['per_page'] = $this->config->item('pagination_per_page');
		$p_config['num_links'] = 10;
		$p_config['full_tag_open'] = '<div class="pagination"><span>Pages:</span>';
		$p_config['full_tag_close'] = '</div>';
		$p_config['cur_tag_open'] = '<strong class="ui-state-hover ui-corner-all">';
		$p_config['cur_tag_close'] = '</strong>';
		$p_config['anchor_class'] = 'class="ui-state-default ui-corner-all"';
		$p_config['suffix'] = '?'.http_build_query($_GET, '', "&");
		$p_config['first_link'] = FALSE;
		$p_config['last_link'] = FALSE;

		$this->pagination->initialize($p_config);

       	$data['resource_list'] = $list['rows'];

       	$data['caldata'] = array();
       	
		$prefs = array (
			'show_next_prev'  => TRUE,
			'next_prev_url'   => site_url('calendar/my_reservations'),
			'month_type'   => 'long',
            'day_type'     => 'short'
		);

		$prefs['template'] = '

		   {table_open}<table border="0" cellpadding="0" cellspacing="0" class="ui-datepicker-calendar">{/table_open}

		   {heading_row_start}<tr>{/heading_row_start}

		   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

		   {heading_row_end}</tr>{/heading_row_end}

		   {week_row_start}<tr>{/week_row_start}
		   {week_day_cell}<td class="weekname ui-state-default">{week_day}</td>{/week_day_cell}
		   {week_row_end}</tr>{/week_row_end}

		   {cal_row_start}<tr>{/cal_row_start}
		   {cal_cell_start}<td class="weekday ui-state-default">{/cal_cell_start}

		   {cal_cell_content}{day}<div class="day-event">{content}</div>{/cal_cell_content}
		   {cal_cell_content_today}{day}<div class="highlight"><div class="day-event">{content}</div>{/cal_cell_content_today}

		   {cal_cell_no_content}{day}{/cal_cell_no_content}
		   {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

		   {cal_cell_blank}&nbsp;{/cal_cell_blank}

		   {cal_cell_end}</td>{/cal_cell_end}
		   {cal_row_end}</tr>{/cal_row_end}

		   {table_close}</table>{/table_close}
		';

		$caldata = $this->calendar_model->get_by_month($this->uri->segment(4), $this->uri->segment(3), $this->user->ID);

		foreach($caldata as $cal)
		{	
			$first = date('j', strtotime($cal->start_time));
			$end = date('j', strtotime($cal->end_time));
			$user = $this->users_model->get_user($cal->person_in_charge);

			
			do {
				if(can_this_user('calendar/edit/all') || can_this_user('calendar/edit'))
				{
					@$data['caldata'][$first] .= '<p><a href="'.site_url('calendar/edit/'.$cal->ID).'">'.$cal->room.'<br>from '.timeonly_for_display($cal->start_time).' <br>to '.timeonly_for_display($cal->end_time).'<br>by '.$user->meta['first_name'].' '.$user->meta['last_name'].'</a></p>';
				}
				else
				{
					@$data['caldata'][$first] .= '<p>'.$cal->room.'<br>from '.timeonly_for_display($cal->start_time).' to '.timeonly_for_display($cal->end_time).'<br>by '.$user->meta['first_name'].' '.$user->meta['last_name'].'</p>';
				}
				$first++;
			} while($first <= $end);
		}
		
		$this->calendar->initialize($prefs);

		$this->load->view('calendar/my_view', $data);
	}

	function reserve()
	{	
		if($this->input->post('save_reservation'))
		{
			$id = $this->calendar_model->save_reservation($this->input->post());
			$this->session->set_flashdata('calendar', 'Your reservation has been saved, see below to make any final adjustments.');

			if(can_this_user('calendar/edit/all') || can_this_user('calendar/edit'))
			{
				redirect('calendar/edit/'.$id);
			}
			else
			{
				redirect('calendar/my_reservations');
			}
		}

		$users = $this->users_model->get_all_users();

		foreach($users as $user) {
			$data['users'][$user->ID] = $user->user_name;
		}

		$data['resources'] = get_option_for_dropdown('calendar_resources');

		$this->load->view('calendar/reserve', $data);
	}

	function edit($id)
	{	
		if($this->input->post('save_reservation'))
		{
			$this->calendar_model->update_reservation($id, $this->input->post());
			$this->session->set_flashdata('calendar', 'Your reservation has been updated.');
			redirect('calendar/edit/'.$id);
		}

		$users = $this->users_model->get_all_users();

		foreach($users as $user) {
			$data['users'][$user->ID] = $user->user_name;
		}

		$data['event'] = $this->calendar_model->get_reservation($id);
		$data['resources'] = get_option_for_dropdown('calendar_resources');

		$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

		if (!in_array($data['event']->created_by, $data['manage']))
		{
			if (!in_array($data['event']->person_in_charge, $data['manage']))
			{
				if(!can_this_user('calendar/edit/all'))
					redirect('cheat');				
			}
		}

		$this->load->view('calendar/edit', $data);
	}

	function delete($id)
	{
		$this->calendar_model->delete($id);
		$this->session->set_flashdata('calendar', 'The reservation has been deleted.');

		redirect('calendar');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */