<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends MY_Controller {

	var $dates;

	function __construct()
	{
		parent::__construct();
		set_title('Chapter Procurement');

		$this->dates = array(
    		date('F/Y') => date('F_Y'),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+1), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+1), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+2), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+2), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+3), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+3), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+4), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+4), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+5), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+5), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+6), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+6), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+7), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+7), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+8), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+8), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+9), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+9), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+10), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+10), 1)),
    		date('F/Y', mktime(0,0,0, ((int)date('m')+11), 1)) => date('F_Y', mktime(0,0,0, ((int)date('m')+11), 1))
    	);
	}

    public function index()
    {

    }

    public function general_fund()
    {
    	$data = array();
    	$data['projects'] = $this->projects_model->get_projects('fund');
    	$data['dates'] = $this->dates;

    	$this->load->view('projects/funds', $data);
    }

    public function grant_actuals()
    {
    	$data = array();
    	$data['projects'] = $this->projects_model->get_projects('actual');
    	$data['dates'] = $this->dates;

    	$this->load->view('projects/actuals', $data);
    }

    public function new_budget()
    {
    	if($this->input->post('insert_project'))
    	{

    		$config['upload_path'] = './uploads/';
            $config['max_size'] = 0;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|psd|pdf|doc|docx';

			$this->load->library('upload', $config);

			foreach($this->dates as $key => $value)
			{
				$tmp = array();
				if($_FILES['report_'.$value]['size'] > 0) {
					$this->upload->do_upload('report_'.$value);

					$tmp = $this->upload->data();

				}
				
				$uploads['report'][][$key] = @$tmp['file_name'];

			}

			$this->upload->do_upload('account_list');

			$tmp = array();
			$tmp = $this->upload->data();
			$uploads['account_list'] = $tmp['file_name'];
			

    		$p_id = $this->projects_model->save_project($this->input->post(), $uploads);

            $this->session->set_flashdata('projects', 'The project has been saved');

    		redirect('projects/view/'.$p_id);
    	}

    	$data = array();
    	$data['staff'] = get_user_array();

    	$this->load->view('projects/new', $data);
    }

    public function view($id)
    {
    	$uploads = array(
    		'report' => array(),
    		'account_list' => ''
    	);

    	if($this->input->post('update_project'))
    	{

    		$config['upload_path'] = './uploads/';
    		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|txt';

			$this->load->library('upload', $config);

			foreach($this->dates as $key => $value)
			{
				$tmp = array();
				if($_FILES['report_'.$value]['size'] > 0) {
					$this->upload->do_upload('report_'.$value);

					$tmp = $this->upload->data();

					$uploads['report'][][$key] = @$tmp['file_name'];
				}
				

			}

			if($_FILES['account_list']['size'] > 0) {
				$this->upload->do_upload('account_list');

				$tmp = array();
				$tmp = $this->upload->data();
				$uploads['account_list'] = $tmp['file_name'];
			}

    		$this->projects_model->update_project($id, $this->input->post(), $uploads);

            $this->session->set_flashdata('projects', 'The project has been updated');

    		redirect('projects/view/'.$id);
    	}

    	$data = array();
    	$data['staff'] = get_user_array();
    	$data['data'] = $this->projects_model->get_project_data($id);

    	$this->load->view('projects/view', $data);
    }

    public function delete($id, $where)
    {
    	$this->db->where('ID', $id)->delete('grant_fund_projects');
    	$this->db->where('project_id', $id)->delete('finance_schedule');
    	$this->db->where('project_id', $id)->delete('finance_reports');
    	$this->db->where('project_id', $id)->delete('finance_income');
    	$this->db->where('project_id', $id)->delete('finance_expenses');
    	$this->db->where('project_id', $id)->delete('finance_cumulative_total');
    	$this->db->where('project_id', $id)->delete('finance_cumulative_expenses');

        $this->session->set_flashdata('projects', 'The selected item(s) has been deleted.');

    	if($where == 'funds')
    	{
    		redirect('projects/general_fund');
    	}
    	else {
    		redirect('projects/grant_actuals');
    	}
    }
}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */