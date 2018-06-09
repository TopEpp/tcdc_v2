<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class project_manage extends MY_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('project_manage_model','pm_model');
		$this->session->keep_flashdata('msg');
		$this->session->keep_flashdata('error');

        if($this->session->userdata('sesUserID')==''){
            redirect(base_url());
        }
    }

	public function index($project_id='',$user_id='')
	{
		if($project_id=='' || $user_id ==''){
			redirect(base_url($this->uri->segment(1).'/staff/show_user_register'));
		}

		$query = $this->db->query('SELECT * FROM tcdc.std_area_province');
		$data['province'] = $query->result();
		$query = $this->db->query('SELECT * FROM tcdc.std_countries');
		$data['countries'] = $query->result();

		$this->load->model('member/member_model');
		$this->load->model('staff/staff_model');
		$data['project'] = $this->staff_model->getProject($project_id);
		$data['member'] = $this->staff_model->getUsers($user_id);	
		$data['regis'] = $this->member_model->getUserRegis($project_id,$user_id);

		$this->config->set_item('title','จัดการข้อมูลผู้สมัคร : '.$data['project'][0]->project_name);
		$this->template->javascript->add('assets/modules/project_manage/approve.js');
        $this->setView('form_'.$data['project'][0]->project_type,$data);
        $this->publish();
	}

	function saveAppv(){
		$data = array();	
		// $this->form_validation->set_rules('reg_id', 'radio_app', 'required');
		// $this->form_validation->set_rules('radio_app', 'radio_app', 'required');
		// $this->form_validation->set_rules('reject_detail', 'reject_detail', 'required');

		// if($this->form_validation->run() == false){
		// 	// $this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
		// 	redirect($this->input->post('redirect'), "location");
            
  //       }else{
			//save data project
            $data = array(
            	'user_app' => $this->session->userdata('sesUserID'),
            	'reg_id' => $this->input->post('reg_id'),
            	'email_receive' => $this->input->post('email_receive'),
            	'prj_name' => $this->input->post('prj_name'),
                'reg_status' => $this->input->post('reg_status'),
                'reject_detail' => $this->input->post('reject_detail')
			);    

			$pid = $this->pm_model->saveAppv($data);
            if($pid){
            	if($this->pm_model->sendEmail($data)){
            		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Save Data </div>');
            		redirect(base_url('staff/show_user_register'));	
            	}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
			 		redirect(base_url('staff/show_user_register'));
            	}
            }else{
            	$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
			 	redirect(base_url('staff/show_user_register'));
            }
		
		// }
	}
}