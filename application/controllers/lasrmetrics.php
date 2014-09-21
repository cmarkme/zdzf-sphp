<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lasrmetrics extends MY_Controller {

	public function _remap($method='', $args = array())
	{
		$call = (isset($args[0]) ? $args[0] : '');
		$id = (isset($args[1]) ? $args[1] : '');
		$model = $method.'_model';
		
		switch ($call)
		{	
			case 'new':
				$this->_new($model, $method);
			break;

			case 'edit':
				$this->_edit($model, $method, $id);
			break;

			case 'delete':
				$this->_delete($model, $method, $id);
			break;

			default:
			case 'list':
				$this->load->model($model);

				$data = array();

				$offset = $this->uri->segment(4);
				$list = $this->$model->fetchAll($this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
				
				$p_config = array();
				$p_config['base_url'] = site_url('lasrmetrics/'.$method.'/page');
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

				$data = array();
				$data['items'] = $list['rows'];

				$this->load->view('lasrmetrics/'.$method.'/list', $data);
			break;
		}		
	}

		public function _new($model, $view)
		{
			$this->load->model($model);

			if($this->input->post('do_action'))
			{
				$id = $this->$model->save($this->input->post());
				redirect('lasrmetrics/'.$view.'/edit/'.$id);
			}

			$data = array();
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['presenter_types'] = get_option_for_dropdown('presenter_types');
			$data['program_types'] = get_option_for_dropdown('program_types');
			$data['group_types'] = get_option_for_dropdown('group_types');
			$data['event_types'] = get_option_for_dropdown('event_types');
			$data['education_programs'] = get_option_for_dropdown('education_programs');
			$data['target_audiences'] = get_option_for_dropdown('target_audiences');
			$data['SPA'] = get_option_for_dropdown('SPA');
			$data['grant_programs'] = get_option_for_dropdown('grant_programs');
			$data['engagement_types'] = get_option_for_dropdown('engagement_types');
			$data['counties'] = get_option_for_dropdown('counties');
			
			$this->load->view('lasrmetrics/'.$view.'/new', $data);
		}

		public function _edit($model, $view, $id)
		{
			$this->load->model($model);

			if($this->input->post('do_action'))
			{
				$this->$model->update($this->input->post(), $id);
				redirect('lasrmetrics/'.$view.'/edit/'.$id);
			}

			$data = array();

			$data = (array)$this->$model->fetch($id);
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['presenter_types'] = get_option_for_dropdown('presenter_types');
			$data['program_types'] = get_option_for_dropdown('program_types');
			$data['group_types'] = get_option_for_dropdown('group_types');
			$data['event_types'] = get_option_for_dropdown('event_types');
			$data['education_programs'] = get_option_for_dropdown('education_programs');
			$data['target_audiences'] = get_option_for_dropdown('target_audiences');
			$data['SPA'] = get_option_for_dropdown('SPA');
			$data['grant_programs'] = get_option_for_dropdown('grant_programs');
			$data['engagement_types'] = get_option_for_dropdown('engagement_types');
			$data['counties'] = get_option_for_dropdown('counties');

			$this->load->view('lasrmetrics/'.$view.'/edit', $data);
		}

		public function _delete($model, $view, $id='')
		{
			$this->load->model($model);

			$this->$model->delete($id);
			redirect('lasrmetrics/'.$view.'/list');
		}

	public function statistics()
	{
		$data = array();

		$this->load->view('lasrmetrics/statistics_list', $data);
	}
}

/* End of file lasrmetrics.php */
/* Location: ./application/controllers/lasrmetrics.php */
