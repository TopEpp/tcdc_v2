<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class staff extends MY_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('staff_model');
		$this->session->keep_flashdata('msg');
		$this->session->keep_flashdata('error_old_pass');
		$this->session->keep_flashdata('error_pass_new');
		$this->session->keep_flashdata('error_pass_new_confirm');

        if($this->session->userdata('sesUserID')==''){
            redirect(base_url());
        }
    }

	public function index()
	{
		$data['project'] = $this->staff_model->getProject();
		$data['news'] = $this->staff_model->getNews();
		$this->config->set_item('title','แดชบอร์ด');
        $this->setView('index',$data);
        $this->publish();
	}

	function project($project_id=''){

		$this->config->set_item('title','สร้างโครงการ');

		$data['project_id'] = $project_id;
		$data['project_type'] = $this->staff_model->getProjectType();
		$data['project_owner'] = $this->staff_model->getProjectManager();
		$data['prj_owner']= '';

		if($project_id){
			$data['prj'] = $this->staff_model->getProjectData($project_id);
			$data['prj']->project_start_date = $this->mydate->date_db2str($data['prj']->project_start_date);
			$data['prj']->project_finish_date = $this->mydate->date_db2str($data['prj']->project_finish_date);
			$data['prj']->register_start_date = $this->mydate->date_db2str($data['prj']->register_start_date);
			$data['prj']->register_finish_date = $this->mydate->date_db2str($data['prj']->register_finish_date);

			$data['prj_owner'] = $this->staff_model->getProjectOwner($project_id);
		}
		

		$this->setView('project',$data);
		$this->template->javascript->add('assets/modules/staff/project.js');
        $this->publish();
	}

	function saveProject($project_id=''){
		$data = array();	
		// get province

		// #tab1
		$this->form_validation->set_rules('project_name', 'project_name', 'required');
		$this->form_validation->set_rules('project_type', 'project_type', 'required');
		$this->form_validation->set_rules('project_start_date', 'project_start_date', 'required');
		$this->form_validation->set_rules('project_finish_date', 'project_finish_date', 'required');
		$this->form_validation->set_rules('register_start_date', 'register_start_date', 'required');
		$this->form_validation->set_rules('register_finish_date', 'register_finish_date', 'required');
		$this->form_validation->set_rules('project_detail', 'project_detail', 'required');
		$this->form_validation->set_rules('project_provenance', 'project_provenance', 'required');
		
		// #tab2
		$this->form_validation->set_rules('owner_id', 'owner_id', 'required');

		if($this->form_validation->run() == false){
			// $this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
			redirect($this->input->post('redirect'), "location");
            
        }else{
			//save data project
            $data = array(
                'project_name' => $this->input->post('project_name'),
                'project_type' => $this->input->post('project_type'),
                'project_detail' => $this->input->post('project_detail'),
                'project_provenance' => $this->input->post('project_provenance'),
                'project_start_date' => $this->mydate->date_thai2eng($this->input->post('project_start_date')),
                'project_finish_date' => $this->mydate->date_thai2eng($this->input->post('project_finish_date')),
                'register_start_date' => $this->mydate->date_thai2eng($this->input->post('register_start_date')),
                'register_finish_date' => $this->mydate->date_thai2eng($this->input->post('register_finish_date'))
			);    

			$data_owner = explode(',', $this->input->post('owner_id')); 

			$pid = $this->staff_model->saveProject($data,$project_id);

            if($pid){
            	if($this->staff_model->saveProjectOwner($pid,$data_owner)){
            		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Save Data </div>');
                	redirect(base_url('staff'));
            	}else{
            		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
			 		redirect(base_url('staff'));
            	}
            }else{
            	$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
			 	redirect(base_url('staff'));
            }
		
		}
	}

	function user_profile(){

		// $this->template->javascript->add('assets/modules/staff/user_profile.js');
		$this->setView('user_profile');
        $this->publish();
	}

	function show_user_register(){

		$this->setView('show_user_register');
        $this->publish();
	}

	function show_user(){

		$this->setView('show_user');
        $this->publish();
	}

	//management members all
	function user_manage()
	{
		$this->config->set_item('title','การจัดการผู้ใช้');

		$data['data'] = $this->staff_model->getUsers();
		$this->setView('user_manage',$data);
        $this->publish();	
	}

	//create members 
	public function create_user()
	{
		$this->config->set_item('title','สร้างโปรไฟล์');

		$data = array();

		$query = $this->db->query('SELECT * FROM tcdc.std_area_province');
		$data['province'] = $query->result();

		$this->setView('user_create_profile',$data);
		$this->template->javascript->add('assets/modules/staff/user_profile.js');
		$this->publish();	
	}

	//edit project members
	function user_edit_profile($id = '')
	{
		$this->config->set_item('title','แก้ไขโปรไฟล์');

		if(!empty($id)){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['data'] = $this->staff_model->getUsers($id);	
			if($this->session->userdata('sesUserType') == 3 && $this->session->userdata('sesUserID') != $data['data']->user_id ){
				redirect('member');
			}
			// get province
			$query = $this->db->query('SELECT * FROM tcdc.std_area_province');
			$data['province'] = $query->result();

			

			// get province member
			$query = $this->db->query('SELECT name_th FROM tcdc.std_area_province WHERE code = '.$data['data']->province);
			$data['province_name'] = $query->row();
			
			$this->setView('user_edit_profile',$data);
			$this->template->javascript->add('assets/modules/staff/user_profile.js');
			$this->publish();	

		}else{
			redirect(base_url());
		}
		
	}

	//save create profile members
	public function createProfileSave()
	{
		// echo $this->encrypt->encode('11111111');die();
		// if(!empty($id)){

		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password','Password', 'trim|min_length[8]|required');
	//	$this->form_validation->set_rules('pass_new', 'Pass_new', 'trim|min_length[8]');
		$this->form_validation->set_rules('pass_new_confirm', 'Pass_confirm', 'trim|min_length[8]|matches[password]');

		if($this->form_validation->run() == false){
			//  echo (form_error('pass_new'));die();
			if (form_error('email')!= ''){
				$this->session->set_flashdata('error_email',form_error('email') );
			}

			if (form_error('password')!= ''){
				$this->session->set_flashdata('error_old_pass',form_error('password') );
			}

			if(form_error('pass_new_confirm')!=''){
				$this->session->set_flashdata('error_pass_new_confirm',form_error('pass_new_confirm'));
			}
		
			// $this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
			redirect($this->input->post('redirect'), "location");
			
		}else{

			$imageupload = '';
			if (isset( $_FILES['profile_img'])){
				//upload data
				$imageupload = \Cloudinary\Uploader::upload($_FILES['profile_img']['tmp_name'],array(
					"folder"=>'profile'
				));
			}
				
			$data = array(
				'prename' => $this->input->post('prename'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'subdistrict' => $this->input->post('subdistrict'),
				'district' => $this->input->post('district'),
				'province' => $this->input->post('province'),
				'zipcode' => $this->input->post('zipcode'),
				'user_active' => $this->input->post('user_active'),
				'job' => $this->input->post('job'),
				'brand' => $this->input->post('brand'),
				'website' => $this->input->post('website'),
				'facebook' => $this->input->post('facebook'),
				
			);
								
			if (!empty($this->input->post('password'))){
				$data['password'] = $this->encrypt->encode($this->input->post('password'));//new password
			}

			if($imageupload){
				$data['profile_img'] = $imageupload['public_id'];
			}

			if($this->staff_model->saveCreateUser($data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">สร้างผู้ใช้งานเรียบร้อย. </div>');
			}
			else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">สร้างผู้ใช้งานไม่สำเร๊จ. </div>');
			}
			
			redirect('staff/user_manage', "location");
			 
		}
		
			
		 

	}
	
	//save edit profile members
	public function editProfileSave($id = '')
	{
		// echo $this->encrypt->encode('11111111');die();
		if(!empty($id)){

			$this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password','Password', 'trim|min_length[8]|callback_pass_check');
			// $this->form_validation->set_rules('password','Password', 'trim|min_length[8]|required');
			$this->form_validation->set_rules('pass_new', 'Pass_new', 'trim|min_length[8]');
			$this->form_validation->set_rules('pass_new_confirm', 'Pass_new_confirm', 'trim|min_length[8]|matches[pass_new]');

			if($this->form_validation->run() == false){
				//  echo (form_error('pass_new'));die();
				if (form_error('password')!= ''){
					$this->session->set_flashdata('error_old_pass',form_error('password') );
				}
			
				if (form_error('pass_new')!= ''){
					$this->session->set_flashdata('error_pass_new',form_error('pass_new') );
				}
				
				if(form_error('pass_new_confirm')!=''){
					$this->session->set_flashdata('error_pass_new_confirm',form_error('pass_new_confirm'));
				}
			
				// $this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
				redirect($this->input->post('redirect'), "location");
				
			}else{
				$imageupload = '';
				if (isset( $_FILES['profile_img'])){
					//upload data
					$imageupload = \Cloudinary\Uploader::upload($_FILES['profile_img']['tmp_name'],array(
						"folder"=>'profile'
					));
				}

				$data = array(
					'prename' => $this->input->post('prename'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'subdistrict' => $this->input->post('subdistrict'),
					'district' => $this->input->post('district'),
					'province' => $this->input->post('province'),
					'zipcode' => $this->input->post('zipcode'),
					'user_active' => $this->input->post('user_active'),
					'job' => $this->input->post('job'),
					'brand' => $this->input->post('brand'),
					'website' => $this->input->post('website'),
					'facebook' => $this->input->post('facebook'),
					
				);
								
				if (!empty($this->input->post('pass_new'))){
					$data['password'] = $this->encrypt->encode($this->input->post('pass_new'));//new password
				}
				//company 
				$data_company = array();
				if (!empty($this->input->post('radio1')) && $this->input->post('radio1') == 1){
	
					$data_company = array(
						'company_name' => $this->input->post('company_name'),
						'company_address' => $this->input->post('company_address'),
						'company_province' => $this->input->post('company_province'),
						'company_district' => $this->input->post('company_district'),
						'company_subdistrict' => $this->input->post('company_subdistrict'),
						'company_zipcode' => $this->input->post('company_zipcode')

					);
				}

				if($imageupload){
					$data['profile_img'] = $imageupload['public_id'];

					$this->session->set_userdata('sesUserImage',$imageupload['public_id'] ) ;
				}
				


				
				if($this->staff_model->saveEditUser($id,$data,$data_company)){
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">อัพเดทข้อมูลเรียบร้อย. </div>');
				}
				else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">อัพเดทข้อมูลไม่สำเร๊จ. </div>');
				}
				
				redirect($this->uri->segment(1).'/'.'staff/user_edit_profile/'.$this->uri->segment(4)); 
			}
		
			
		}

	}

	//call_back check password old
	function pass_check($id = '')
	{
		$pass_check = $this->input->post('password');
		$id = $this->uri->segment(4);
		   
		$query = $this->db->query('SELECT password FROM tcdc.tcdc_member where user_id ='.$id  );
		$result = $query->row();
		$pass = $this->encrypt->decode($result->password);
	
		if($pass != $pass_check &&  !empty($this->input->post('pass_new')) )
		{
			// echo $pass_check .' '. $pass;die();
			// $this->form_validation->set_message('pass_check', 'กรุณา กรอก  Old Password ให้ถูกต้อง');
			return FALSE;
		}
		else
		{
			return TRUE;	 
		}	

	}

		//call_back check email uniqe
	function email_check()
		{
			$email = $this->input->post('email');
			$query = $this->db->query('SELECT * FROM tcdc.tcdc_member where email ='.'\''.$email.'\''  );
		
			if($query->num_rows())
			{
				// echo $pass_check .' '. $pass;die();
				// $this->form_validation->set_message('email_check', 'Try agin, Email is already used.');
				return FALSE;
			}
			else
			{
				return TRUE;	 
			}	
	
		}
}
