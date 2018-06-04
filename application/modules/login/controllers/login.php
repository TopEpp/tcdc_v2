<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Top
 * Date: 12/16/13 AD
 * Time: 4:15 PM
 * To change this template use File | Settings | File Templates.
 */
class login extends  MY_Controller{

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('login_model');
	
	}

    function index(){
        // $user = $this->input->post('user');
        // $password = $this->input->post('password');
        // $keep = $this->input->post('keep');

        // $res = $this->login_model->login($user,$password,$keep);

        // $this->output->set_content_type('application/json')->set_output(json_encode($res));

		$this->form_validation->set_rules('username','username', 'trim|required');
		$this->form_validation->set_rules('password','Password', 'trim|required|min_length[8]');
		
		if($this->form_validation->run() == false){
			redirect(base_url());
        }else{
			//insert data  
            $user = $this->input->post('username');
        	$password = $this->input->post('password');
        	$keep = $this->input->post('keep');  

			$res = $this->login_model->login($user,$password,$keep);
			if($res['status']){
				if($res['user_type']==1){
				 redirect(base_url('staff'));
				}else if($res['user_type']==2){
				 redirect(base_url('staff/show_user_register'));
				}else if($res['user_type']==3){
				 redirect(base_url('member'));
				}
			}
		}

		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email Or Password Incorrect!</div>');
		redirect(base_url());		
    }


}