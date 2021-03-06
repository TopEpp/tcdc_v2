<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class staff extends MY_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('staff_model');
		$this->session->keep_flashdata('msg');
		$this->session->keep_flashdata('error');

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

		$this->config->set_item('title','สร้างกิจกรรม');

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
		$this->form_validation->set_rules('project_name', 'ชื่อโครงการ', 'required');
		$this->form_validation->set_rules('project_type', 'ประเภทโครงการ', 'required');
		$this->form_validation->set_rules('project_start_date', 'ระยะเวลาของกิจกรรม', 'required');
		$this->form_validation->set_rules('project_finish_date', 'ระยะเวลาของกิจกรรม', 'required');
		$this->form_validation->set_rules('register_start_date', 'ตั้งค่าการ เปิด/ปิด การลงทะเบียน', 'required');
		$this->form_validation->set_rules('register_finish_date', 'ตั้งค่าการ เปิด/ปิด การลงทะเบียน', 'required');
		// $this->form_validation->set_rules('project_detail', 'เงื่อนไขและข้อตกลง', 'required');
		// $this->form_validation->set_rules('project_provenance', 'เงื่อนไขและข้อตกลง', 'required');
		
		// #tab2
		// $this->form_validation->set_rules('owner_id', 'ผู้ประสานงานโครงการ', 'required');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
			// redirect($this->input->post('redirect'), "location");
			$data['project_id'] = $project_id;
			$data['project_type'] = $this->staff_model->getProjectType();
			$data['project_owner'] = $this->staff_model->getProjectManager();
			// $data['prj']->project_id = $this->input->post('project_id');
			@$data['prj']->project_name = $this->input->post('project_name');
			@$data['prj']->project_type = $this->input->post('project_type');
			@$data['prj']->event_type = @$this->input->post('event_type');
			@$data['prj']->project_detail = $this->input->post('project_detail');
			@$data['prj']->project_provenance = $this->input->post('project_provenance');
			@$data['prj']->project_start_date = $this->input->post('project_start_date');
			@$data['prj']->project_finish_date = $this->input->post('project_finish_date');
			@$data['prj']->register_start_date = $this->input->post('register_start_date');
			@$data['prj']->register_finish_date = $this->input->post('register_finish_date');
			$data['prj_owner'] = $this->input->post('owner_id');
			$this->setView('project',$data);
			$this->template->javascript->add('assets/modules/staff/project.js');
        	$this->publish();
            
        }else{
			//save data project
			$project_start_date = $this->mydate->date_thai2eng($this->input->post('project_start_date'));
			$project_finish_date = $this->mydate->date_thai2eng($this->input->post('project_finish_date'));
			$register_start_date = $this->mydate->date_thai2eng($this->input->post('register_start_date'));
			$register_finish_date = $this->mydate->date_thai2eng($this->input->post('register_finish_date'));

            $data = array(
            	
            	'project_create' => $this->session->userdata('sesUserID'),
                'project_name' => $this->input->post('project_name'),
                'project_type' => $this->input->post('project_type'),
                'event_type' => $this->input->post('event_type'),
                'project_detail' => $this->input->post('project_detail'),
                'project_provenance' => $this->input->post('project_provenance'),
                'project_start_date' => $project_start_date,
                'project_finish_date' => $project_finish_date,
                'register_start_date' => $register_start_date,
                'register_finish_date' => $register_finish_date
			);    

			// echo '<pre>';
			// print_r($data);
			// exit;

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

	function delProject(){
		$project_id = $this->input->post('del_prj_id');
		$this->staff_model->delProject($project_id);

		redirect(base_url($this->uri->segment(1).'/staff/management'));
	}

	function news($news_id=''){
		$data = array();

		if($news_id){
			$data['news'] = $this->staff_model->getNewsById($news_id);
		}

		$this->template->stylesheet->add('assets/plugins/summernote/summernote-bs4.css');
		$this->template->javascript->add('assets/plugins/summernote/summernote-bs4.js');

		$this->template->javascript->add('assets/modules/staff/management_news.js');
		$this->config->set_item('title','การจัดข่าวสาร');
		$this->setView('management_news',$data);
        $this->publish();
	}

	function saveNews(){
		$data = array(
        	'news_create' => $this->session->userdata('sesUserID'),
        	'news_id' => $this->input->post('news_id'),
            'news_type' => $this->input->post('news_type'),
            'news_name' => $this->input->post('news_name'),
            'news_detail' => $this->input->post('news_detail'),
            'news_url' => $this->input->post('news_url')
		);    

    	if($this->staff_model->saveNews($data)){
    		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Save Data </div>');
        	redirect(base_url('staff/management'));
    	}else{
    		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
	 		redirect(base_url('staff/management'));
    	}
	}

	function delNews(){
		$news_id = $this->input->post('del_news_id');
		$this->staff_model->delNews($news_id);

		redirect(base_url($this->uri->segment(1).'/staff/management'));
	}

	function delUser(){
		$id = $this->input->post('del_id');
		$this->staff_model->delUser($id);

		redirect(base_url($this->uri->segment(1).'/staff/user_manage'));
	}

	function management(){
		$data = array();
		$data['project'] = $this->staff_model->getProject();
		$data['news'] = $this->staff_model->getNews();

		$this->template->javascript->add('assets/modules/staff/management.js');
		$this->config->set_item('title','การจัดการกิจกรรม');
		$this->setView('management',$data);
        $this->publish();
	}

	function user_profile(){

		// $this->template->javascript->add('assets/modules/staff/user_profile.js');
		$this->setView('user_profile');
        $this->publish();
	}

	function show_user_register(){
		$data = array();
		$data['project'] = $this->staff_model->getProject();
		$data['project_type'] = $this->staff_model->getProjectType();
		foreach ($data['project'] as $key => $prj) {
			$data['member_reg'][$prj->project_id] = $this->staff_model->getProjectRegist($prj->project_id);
		}
		$this->config->set_item('title','ผู้เข้าร่วมกิจกรรม');
		$this->template->javascript->add('assets/modules/staff/show_user_register.js');
		$this->setView('show_user_register',$data);
        $this->publish();
	}

	function show_user($project_id){
		$data = array();
		$data['prj'] = $this->staff_model->getProjectData($project_id);
		// $data['prj_owner'] = $this->staff_model->getProjectOwner($project_id);
		$data['member_reg'] = $this->staff_model->getProjectRegist($project_id);

		$this->config->set_item('title','ผู้เข้าร่วมกิจกรรม');
		$this->template->javascript->add('assets/modules/staff/show_user.js');
		$this->setView('show_user',$data);
		$this->publish();
	}

	function export_user($project_id=''){
		$data = array();
		$query = $this->db->query('SELECT * FROM std_area_province');
		$data['province'] = $query->result();
		$query = $this->db->query('SELECT * FROM std_countries');
		$data['countries'] = $query->result();
		
		if($project_id){
			$data['prj'] = $this->staff_model->getProjectData($project_id);
			$data['member_reg'] = $this->staff_model->getProjectRegist($project_id);
		}else{
			$data['member_reg'] = $this->staff_model->getUsers();
		}
		

		$this->load->view('export_user',$data);
	}

	//management members all
	function user_manage()
	{
		$this->config->set_item('title','การจัดการผู้ใช้');

		$data['data'] = $this->staff_model->getUsers();
		$data['regisprj'] = $this->staff_model->getProjectUser();

		$this->template->javascript->add('assets/modules/staff/user_manage.js');
		$this->template->javascript->add('assets/js/datatables.js');
		$this->setView('user_manage',$data);
        $this->publish();	
	}

	//create members 
	public function create_user()
	{
		$this->config->set_item('title','สร้างโปรไฟล์');

		$data = array();

		// get province
		$query = $this->db->query('SELECT * FROM std_area_province');
		$data['province'] = $query->result();
		//get country
		$query = $this->db->query('SELECT * FROM std_countries');
		$data['countries'] = $query->result();
		//get status_group
		$query = $this->db->query('SELECT * FROM tcdc_status_group');
		$data['status'] = $query->result();

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
			$query = $this->db->query('SELECT * FROM std_area_province');
			$data['province'] = $query->result();
			//get country
			$query = $this->db->query('SELECT * FROM std_countries');
			$data['countries'] = $query->result();
			//get status_group
			$query = $this->db->query('SELECT * FROM tcdc_status_group');
			$data['status'] = $query->result();

			

			// get province member
			$query = $this->db->query('SELECT name_th FROM std_area_province WHERE code = '.$data['data']->province);
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

		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password','Password', 'trim|min_length[8]|required');
		// $this->form_validation->set_rules('phone','Phone', 'trim|required');
		$this->form_validation->set_rules('pass_new_confirm', 'Pass_confirm', 'trim|min_length[8]|matches[password]');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
			redirect($this->input->post('redirect'), "location");
			
		}else{

			$imageupload = '';
			if (isset( $_FILES['profile_img']['name']) && !empty( $_FILES['profile_img']['name'])){
				//upload data
				$imageupload = \Cloudinary\Uploader::upload($_FILES['profile_img']['tmp_name'],array(
					"folder"=>'profile'
				));
			}
				
			$data = array(
				// 'id_number'=>$this->input->post('id_number'),
				'prename' => $this->input->post('prename'),
				'prename_detail' => $this->input->post('prename_detail'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'village' => $this->input->post('village'),
				'lane' => $this->input->post('lane'),
				'road' => $this->input->post('road'),
				'subdistrict' => $this->input->post('subdistrict'),
				'district' => $this->input->post('district'),
				'province' => $this->input->post('province'),
				'country' => $this->input->post('country'),
				'zipcode' => $this->input->post('zipcode'),
				'user_active' => '1',
				'user_type' => $this->input->post('user_type')
				// 'job' => $this->input->post('job'),
				// 'brand' => $this->input->post('brand'),
				// 'website' => $this->input->post('website'),
				// 'facebook' => $this->input->post('facebook'),
				// 'lineid' => $this->input->post('lineid'),
				
			);

			// if (!empty($this->input->post('job_type_one'))){
			// 	$data['job_type'] = $this->input->post('job_type_one');
			// }
			// if (!empty($this->input->post('job_type_two'))){
			// 	$data['job_type'] = $this->input->post('job_type_two');
			// }

								
			if (!empty($this->input->post('password'))){
				$data['password'] = $this->encrypt->encode($this->input->post('password'));//new password
			}

			if($imageupload){
				$data['profile_img'] = $imageupload['public_id'];
			}

			//company 
			$data_company = array();
			// $data_company = array(
	
			// 	'company_name' => $this->input->post('company_name'),
				
			// 	'company_address' => $this->input->post('company_address'),
			// 	'company_village' => $this->input->post('company_village'),
			// 	'company_lane' => $this->input->post('company_lane'),
			// 	'company_road' => $this->input->post('company_road'),
			// 	'company_country' => $this->input->post('company_country'),
			// 	'company_province' => $this->input->post('company_province'),
			// 	'company_district' => $this->input->post('company_district'),
			// 	'company_subdistrict' => $this->input->post('company_subdistrict'),
			// 	'company_zipcode' => $this->input->post('company_zipcode'),
				
			// 	'company_custom_group' => $this->input->post('company_custom_group'),
			// 	'company_people' => $this->input->post('company_people'),
			// 	'company_num_regis' => $this->input->post('company_num_regis'),
			// 	//group 2
			// 	'company_work_look' => $this->input->post('company_work_look'),
			// 	'company_sell_way' => $this->input->post('company_sell_way'),
			// 	'company_product_build' => $this->input->post('company_product_build'),
			// 	//group 3
			// 	'company_group_product' => $this->input->post('company_group_product'),
			// 	'company_group_product_detail' => $this->input->post('company_group_product_detail'),
			// 	'company_technic' => implode(',',$this->input->post('company_technic')),
			// 	'company_product_detail' => $this->input->post('company_product_detail'),
			// 	'company_num_product' => $this->input->post('company_num_product'),
			// 	//group 4
			// 	'company_department' => $this->input->post('company_department'),
			// 	'company_duty' => $this->input->post('company_duty'),
			// 	'company_join_work' => $this->input->post('company_join_work'),


			// );

			
			// if (!empty($this->input->post('company_service_one'))){
			// 	$data_company['company_service'] = $this->input->post('company_service_one');
			// }
			// if (!empty($this->input->post('company_service_two'))){
			// 	$data_company['company_service'] = $this->input->post('company_service_two');
			// }
			// if (!empty($this->input->post('company_service_three'))){
			// 	$data_company['company_service'] = $this->input->post('company_service_three');
			// }

			// if (!empty($this->input->post('company_business_look_one'))){
			// 	$data_company['company_business_look'] = $this->input->post('company_business_look_one');
			// }
			// if (!empty($this->input->post('company_business_look_two'))){
			// 	$data_company['company_business_look'] = $this->input->post('company_business_look_two');
			// }

			// if (!empty( $this->input->post('radio1')) || $this->input->post('radio1') != null){
			// 	$data_company['company_type'] = $this->input->post('radio1');
			// }else{
			// 	$data_company['company_type'] = '1';
			// }
	
			//end company



			if($this->staff_model->saveCreateUser($data,$data_company)){
				## SET PARAM SEND MAIL ##
				$message = 'ลงทะเบียนสำเร็จแล้ว ท่านสามารถเข้าใช้งานระบบ Chiangmai Design Week 2018 ได้โดยใช้ <br> Email : '.$this->input->post('email').'Password : '.$this->input->post('password');

		        $data_mail['to'] = $this->input->post('email'); 
		        $data_mail['mail_to'] = $this->input->post('email'); //'natchapol.prms@gmail.com';//
	        	$data_mail['mail_to_name'] = $this->input->post('firstname').' '.$this->input->post('lastname');
	        	$data_mail['message'] = $message;
	        	$data_mail['subject'] = 'ยืนยันการลงทะเบียน Chiangmai Design Week 2018';

	        	$content = array( 
			     'name' => $data_mail['mail_to_name'], 
			     'content' => $data_mail['message'], 
			     'link' => '',
				 'show_link'=>false
			    ); 

	        	$this->load->model('project_manage/pm_model');
			    $this->pm_model->sendEmail($data_mail,$content);

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
		if(!empty($id)){

			// $this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password','Password', 'trim|min_length[8]|callback_pass_check');
			// $this->form_validation->set_rules('phone','Phone', 'trim|required');
			$this->form_validation->set_rules('pass_new', 'Pass_new', 'trim|min_length[8]');
			$this->form_validation->set_rules('pass_new_confirm', 'Pass_new_confirm', 'trim|min_length[8]|matches[pass_new]');

			if($this->form_validation->run() == false){
				$this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
				redirect($this->input->post('redirect'), "location");
				
			}else{
				$imageupload = '';
				// $id_edit = $this->session->userdata('sesUserID');
				$path = 'uploads/profile/';
				if (isset( $_FILES['profile_img']['name']) && !empty( $_FILES['profile_img']['name'])){
					//upload data
					$imageupload = $this->uploadData('profile_img','pop_img_'.$key,$path);
					// $imageupload = \Cloudinary\Uploader::upload($_FILES['profile_img']['tmp_name'],array(
					// 	"folder"=>'profile'
					// ));
				}

				$data = array(
					'prename' => $this->input->post('prename'),
					'prename_detail' => $this->input->post('prename_detail'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'phone' => $this->input->post('phone'),
					// 'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'village' => $this->input->post('village'),
					'lane' => $this->input->post('lane'),
					'road' => $this->input->post('road'),
					'subdistrict' => $this->input->post('subdistrict'),
					'district' => $this->input->post('district'),
					'province' => $this->input->post('province'),
					'country' => $this->input->post('country'),
					'zipcode' => $this->input->post('zipcode'),
					'user_active' => $this->input->post('user_active'),
					'user_type' => $this->input->post('user_type')
					// 'job' => $this->input->post('job'),
					// 'brand' => $this->input->post('brand'),
					// 'website' => $this->input->post('website'),
					// 'facebook' => $this->input->post('facebook'),
					// 'lineid' => $this->input->post('lineid'),
					
				);
				if (!empty($this->input->post('job_type_one'))){
					$data['job_type'] = $this->input->post('job_type_one');
				}
				if (!empty($this->input->post('job_type_two'))){
					$data['job_type'] = $this->input->post('job_type_two');
				}

			
								
				if (!empty($this->input->post('pass_new'))){
					$data['password'] = $this->encrypt->encode($this->input->post('pass_new'));//new password
				}
				
				//company 
				$data_company = array();

				// $data_company = array(
					
				// 	'company_name' => $this->input->post('company_name'),
					
				// 	'company_address' => $this->input->post('company_address'),
				// 	'company_village' => $this->input->post('company_village'),
				// 	'company_lane' => $this->input->post('company_lane'),
				// 	'company_road' => $this->input->post('company_road'),
				// 	'company_country' => $this->input->post('company_country'),
				// 	'company_province' => $this->input->post('company_province'),
				// 	'company_district' => $this->input->post('company_district'),
				// 	'company_subdistrict' => $this->input->post('company_subdistrict'),
				// 	'company_zipcode' => $this->input->post('company_zipcode'),
					
				// 	'company_custom_group' => $this->input->post('company_custom_group'),
				// 	'company_people' => $this->input->post('company_people'),
				// 	'company_num_regis' => $this->input->post('company_num_regis'),
				// 	//group 2
				// 	'company_work_look' => $this->input->post('company_work_look'),
				// 	'company_sell_way' => $this->input->post('company_sell_way'),
				// 	'company_product_build' => $this->input->post('company_product_build'),
				// 	//group 3
				// 	'company_group_product' => $this->input->post('company_group_product'),
				// 	'company_group_product_detail' => $this->input->post('company_group_product_detail'),
				// 	'company_technic' => implode(',',$this->input->post('company_technic')),
				// 	'company_product_detail' => $this->input->post('company_product_detail'),
				// 	'company_num_product' => $this->input->post('company_num_product'),
				// 	//group 4
				// 	'company_department' => $this->input->post('company_department'),
				// 	'company_duty' => $this->input->post('company_duty'),
				// 	'company_join_work' => $this->input->post('company_join_work'),

				// );

				// if (!empty($this->input->post('company_service_one'))){
				// 	$data_company['company_service'] = $this->input->post('company_service_one');
				// }
				// if (!empty($this->input->post('company_service_two'))){
				// 	$data_company['company_service'] = $this->input->post('company_service_two');
				// }
				// if (!empty($this->input->post('company_service_three'))){
				// 	$data_company['company_service'] = $this->input->post('company_service_three');
				// }
	
				// if (!empty($this->input->post('company_business_look_one'))){
				// 	$data_company['company_business_look'] = $this->input->post('company_business_look_one');
				// }
				// if (!empty($this->input->post('company_business_look_two'))){
				// 	$data_company['company_business_look'] = $this->input->post('company_business_look_two');
				// }

				// if (!empty( $this->input->post('radio1')) || $this->input->post('radio1') != null){
				// 	$data_company['company_type'] = $this->input->post('radio1');
				// }else{
				// 	$data_company['company_type'] = '1';
				// }
		
				//end company
			

				if($imageupload){
					$data['profile_img'] = $imageupload;

					$this->session->set_userdata('sesUserImage',$imageupload ) ;
				}
								
				if($this->staff_model->saveEditUser($id,$data,$data_company)){
					$this->session->set_flashdata('msg', 'แก้ไขข้อมูลเรียบร้อย. ');
					// $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">แก้ไขข้อมูลเรียบร้อย. </div>');
				}
				else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">แก้ไขข้อมูลไม่สำเร๊จ. </div>');
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
		   
		$query = $this->db->query('SELECT password FROM tcdc_member where user_id ='.$id  );
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
		$query = $this->db->query('SELECT * FROM tcdc_member where email ='.'\''.$email.'\''  );
	
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

	public function uploadData($file,$file_name,$path){


		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '2048'; //2MB
		$config['overwrite'] = FALSE;
		// $config['max_width'] = '1024';
		// $config['max_height'] = '1024';
		$config['file_name'] = $file_name;
		$config['remove_spaces'] = TRUE;

		$this->load->library("upload");
		$this->upload->initialize($config); 

		if ($this->upload->do_upload($file)) {
			// Files Upload Success
			$data = $this->upload->data();
			return $path.$data['file_name'];
			 
		} else {
		// Files Upload Not Success!!
		$errors = $this->upload->display_errors();
		return $errors;
			
		}

	}

	function estimation($id){
		$data['prj'] = $this->staff_model->getProjectData($id);
		$data['est'] = $this->staff_model->getEstimation($id);
		$this->template->javascript->add('assets/plugins/amcharts/amcharts.js');
		$this->template->javascript->add('assets/plugins/amcharts/serial.js');
		$this->template->javascript->add('assets/plugins/amcharts/plugins/export/export.js');
		$this->template->javascript->add('assets/modules/staff/estimation.js');
		$this->setView('estimation',$data);
        $this->publish();	
	}
		
	
}
