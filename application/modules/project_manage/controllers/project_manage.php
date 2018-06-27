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

		$query = $this->db->query('SELECT * FROM std_area_province');
		$data['province'] = $query->result();
		$query = $this->db->query('SELECT * FROM std_countries');
		$data['countries'] = $query->result();
		$query = $this->db->query('SELECT * FROM tcdc_status_group');
		$data['status'] = $query->result();

		$this->load->model('member/member_model');
		$this->load->model('staff/staff_model');
		$data['project'] = $this->staff_model->getProject($project_id);
		$data['member'] = $this->staff_model->getUsers($user_id);	
		$data['regis'] = $this->member_model->getUserRegis($project_id,$user_id);
		$data['project_id'] = $project_id;
		$data['user_id'] = $user_id;


		$this->config->set_item('title','จัดการข้อมูลผู้สมัคร : '.$data['project'][0]->project_name);
		$this->template->javascript->add('assets/modules/project_manage/approve.js');
        $this->setView('form_'.$data['project'][0]->project_type,$data);
        $this->publish();
	}

	function saveAppv(){
		$this->load->model('staff/staff_model');
		$this->load->model('member/member_model');
		
		$project_type = $this->input->post('project_type');
		
		// switch ($group_data) {
		// 	case 1:
		// 		$this->form_validation->set_rules('job_type_one', 'ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด', 'trim|required');
		// 		$this->form_validation->set_rules('company_service_one', 'ประสบการณ์', 'trim|required');
		// 		$this->form_validation->set_rules('company_custom_group', 'ลูกค้าของคุณคือกลุ่มใด', 'trim|required');
		// 		$this->form_validation->set_rules('company_business_look_one', 'ลักษณะการทำงานของธุรกิจ', 'trim|required');
		// 		$this->form_validation->set_rules('company_people', 'จำนวนพนักงาน', 'trim|required');
		// 		// $this->form_validation->set_rules('company_num_regis', 'เลขทะเบียนนิติบุคคล', 'trim|required|callback_num_regis');
		// 		break;
		// 	case 2:
		// 		$this->form_validation->set_rules('job_type_two', 'ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด', 'trim|required');
		// 		$this->form_validation->set_rules('company_service_two', 'ประสบการณ์', 'trim|required');
		// 		$this->form_validation->set_rules('company_work_look', 'ลักษณะการทำงาน', 'trim|required');
		// 		$this->form_validation->set_rules('company_sell_way', 'ช่องทางการจำหน่าย', 'trim|required');
		// 		$this->form_validation->set_rules('company_product_build', 'คุณสามารถรับจ้างผลิตสินค้าตามจำนวนได้หรือไม่', 'trim|required');
			
		// 		break;
		// 	case 3:
		// 		$this->form_validation->set_rules('company_group_product', 'การทำงานของคุณอยู่ในกลุ่มใด', 'trim|required');
		// 		$this->form_validation->set_rules('company_service_three', 'ประสบการณ์', 'trim|required');
		// 		$this->form_validation->set_rules('company_product_detail', 'การผลิตสินค้าหรือผลงานของคุณเป็นรูปแบบใด', 'trim|required');
		// 		$this->form_validation->set_rules('company_num_product', 'คุณสามารถผลิตได้จำนวน', 'trim|required');
	
			
		// 		break;
		// 	case 4:
		// 		$this->form_validation->set_rules('company_department', 'องค์กรของคุณคือหน่วยงานประเภทใด', 'trim|required');
		// 		$this->form_validation->set_rules('company_duty', 'หน้าที่หลักขององค์กร', 'trim|required');
		// 		$this->form_validation->set_rules('company_join_work', 'คุณเคยร่วมงาน Design Week ใดๆ หรือไม่', 'trim|required');
		
		// 		break;
		// }

		// if ($this->input->post('job_group') == 1){
		// 	$this->form_validation->set_rules('company_num_regis', 'เลขทะเบียนนิติบุคคล', 'trim|required|callback_num_regis');
		// }
		// $this->form_validation->set_rules('id_number', 'รหัสบัตรประชาชน', 'trim|required');

		// $this->form_validation->set_rules('prename', 'คำนำหน้า', 'trim|required');
		// $this->form_validation->set_rules('firstname', 'ชื่อ', 'trim|required');
		// $this->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required');
		// $this->form_validation->set_rules('phone', 'โทรศัพท์มือถือ', 'trim|required');
		// $this->form_validation->set_rules('address','เลขที่', 'trim|required');
		// // $this->form_validation->set_rules('village','หมู่บ้าน', 'trim|required');
		// $this->form_validation->set_rules('subdistrict','แขวง/ตำบล', 'trim|required');
		// $this->form_validation->set_rules('district','อำเภอ', 'trim|required');
		// $this->form_validation->set_rules('country','ประเทศ', 'required');
		// $this->form_validation->set_rules('province','จังหวัด', 'trim|required');
		// $this->form_validation->set_rules('zipcode','รหัสไปรณีย์', 'trim|required|min_length[5]|max_length[5]|callback_numeric_dash');


		// //company
		// if ( $this->input->post('radio2') == 1){
			
		// 	$this->form_validation->set_rules('coordinator_prename','คำนำหน้าผู้ประสานงาน', 'trim|required');
		// 	$this->form_validation->set_rules('coordinator_firstname','ชื่อผู้ประสานงาน', 'trim|required');
		// 	$this->form_validation->set_rules('coordinator_lastname','นามสกุลผู้ประสานงาน', 'trim|required');
		// 	$this->form_validation->set_rules('coordinator_phone','เบอร์โทรผู้ประสานงาน', 'trim|required');
		// 	$this->form_validation->set_rules('coordinator_email','อีเมลผู้ประสานงาน', 'trim|required');
			
		// }

		// switch ($project_type) {
		// 	case 1:
			
		// 		$this->form_validation->set_rules('product_amount[]','โปรดระบุจำนวนชิ้นงานที่ต้องการจัดแสดง', 'trim|required');
		// 		$this->form_validation->set_rules('target_type[]','เป้าหมายในการสมัคร', 'trim|required');
		// 		$this->form_validation->set_rules('product_type[]','ประเภทผลงาน', 'trim|required');
		// 		$this->form_validation->set_rules('product_name[]','ชื่อผลงาน', 'trim|required');
		// 		$this->form_validation->set_rules('product_concept[]','โปรดระบุแนวคิดในการออกแบบผลงาน', 'trim|required');
		// 		$this->form_validation->set_rules('material[]','วัสดุหลัก', 'trim|required');
		// 		$this->form_validation->set_rules('product_prename[]','คำนำหน้าชื่อ', 'trim|required');
		// 		$this->form_validation->set_rules('product_firstname[]','ชื่อผู้ออกแบบ', 'trim|required');
		// 		$this->form_validation->set_rules('product_lastname[]','นามสกุลผู้ออกแบบ', 'trim|required');
		// 		break;
		// 	case 2:
			
		// 		$this->form_validation->set_rules('pop_shop_name','ชื่อร้าน', 'trim|required');
		// 		$this->form_validation->set_rules('pop_range','ช่วงราคาสินค้า', 'trim|required');
		// 		$this->form_validation->set_rules('pop_product_type','ประเภทของที่ขาย', 'trim|required');
		// 		break;
		// 	case 3:
		// 		$this->form_validation->set_rules('work_talk_type','ประเภทกิจกรรม', 'trim|required');
		// 		$this->form_validation->set_rules('work_talk_title_th','หัวข้อ', 'trim|required');
		// 		$this->form_validation->set_rules('work_talk_title_en','หัวข้อ (ภาษาอังกฤษ)', 'trim|required');
		// 		$this->form_validation->set_rules('work_talk_name_th','ชื่อวิทยากร (ภาษาไทย)', 'trim|required');
		// 		$this->form_validation->set_rules('work_talk_scope','ขอบเขตเนื้อหาเหมาะสมกับ', 'trim|required');
		// 		break;
		// 	case 4:
		// 		$this->form_validation->set_rules('event_type','ประเภทกิจกรรม', 'trim|required');
		// 		$this->form_validation->set_rules('event_name_th','ชื่อกิจกรรม (ภาษาไทย)', 'trim|required');
		// 		// $this->form_validation->set_rules('event_name_en','ชื่อกิจกรรม (ภาษาอังกฤษ)', 'trim|required');
			
		// 		break;
		// 	default:
		// 		$this->form_validation->set_rules('product_type[]','ประเภทผลงาน', 'trim|required');
		// 		$this->form_validation->set_rules('product_name[]','ชื่อผลงาน', 'trim|required');
		// 		$this->form_validation->set_rules('material[]','วัสดุ', 'trim|required');
		// 		$this->form_validation->set_rules('product_prename[]','คำนำหน้าชื่อ', 'trim|required');
		// 		$this->form_validation->set_rules('product_firstname[]','ชื่อผู้ออกแบบ', 'trim|required');
		// 		$this->form_validation->set_rules('product_lastname[]','นามสกุลผู้ออกแบบ', 'trim|required');
		// 		break;
		// }
		


		// if($this->form_validation->run() == false){
			
		// }else{
			// $id = $this->session->userdata('sesUserID');
			// //save user
			// $data_user = array(
			// 	'prename' => $this->input->post('prename'),
			// 	'prename_detail' => $this->input->post('prename_detail'),
			// 	'firstname' => $this->input->post('firstname'),
			// 	'lastname' => $this->input->post('lastname'),
			// 	'phone' => $this->input->post('phone'),
			// 	 'h_phone' => $this->input->post('h_phone'),
			// 	'address' => $this->input->post('address'),
			// 	'village' => $this->input->post('village'),
			// 	'lane' => $this->input->post('lane'),
			// 	'road' => $this->input->post('road'),
			// 	'subdistrict' => $this->input->post('subdistrict'),
			// 	'district' => $this->input->post('district'),
			// 	'province' => $this->input->post('province'),
			// 	'country' => $this->input->post('country'),
			// 	'zipcode' => $this->input->post('zipcode'),
			// 	'job' => $this->input->post('job'),
			// 	'brand' => $this->input->post('brand'),
			// 	'website' => $this->input->post('website'),
			// 	'facebook' => $this->input->post('facebook'),
			// 	'lineid' => $this->input->post('lineid'),
			// 	'company' => $this->input->post('company'),
			// 	'instragram' => $this->input->post('instragram')
				
			// );
			// if (!empty($this->input->post('job_type_one'))){
			// 	$data['job_type'] = $this->input->post('job_type_one');
			// }
			// if (!empty($this->input->post('job_type_two'))){
			// 	$data['job_type'] = $this->input->post('job_type_two');
			// }
			//end user
			

			//company 
			// $data_company = array(
			// 	'company_type' => $this->input->post('radio1'),
			// 	'company_name' => $this->input->post('company_name'),
			// 	'company_service' => $this->input->post('company_service'),
			// 	'company_address' => $this->input->post('company_address'),
			// 	'company_village' => $this->input->post('company_village'),
			// 	'company_lane' => $this->input->post('company_lane'),
			// 	'company_road' => $this->input->post('company_road'),
			// 	'company_country' => $this->input->post('company_country'),
			// 	'company_province' => $this->input->post('company_province'),
			// 	'company_district' => $this->input->post('company_district'),
			// 	'company_subdistrict' => $this->input->post('company_subdistrict'),
			// 	'company_zipcode' => $this->input->post('company_zipcode'),

			// 	//group 1
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
			
			// //end company

			// // coordinator
			// $data_coordinator = array(
			// 	'coordinator_type' => $this->input->post('radio2'),
			// 	'coordinator_prename' => $this->input->post('coordinator_prename'),
			// 	'coordinator_firstname' => $this->input->post('coordinator_firstname'),
			// 	'coordinator_lastname' => $this->input->post('coordinator_lastname'),
			// 	'coordinator_phone' => $this->input->post('coordinator_phone'),
			// 	'coordinator_email' => $this->input->post('coordinator_email'),
			// 	// 'coordinator_address' => $this->input->post('coordinator_address'),
			// 	// 'coordinator_province' => $this->input->post('coordinator_province'),
			// 	// 'coordinator_district' => $this->input->post('coordinator_district'),
			// 	// 'coordinator_subdistrict' => $this->input->post('coordinator_subdistrict'),
			// 	// 'coordinator_zipcode' => $this->input->post('coordinator_zipcode'),
			// 	'coordinator_lineid' => $this->input->post('coordinator_lineid')

			// );
			
			// //end data_coordinator
			// //mearge data_company and coordinator
			// $data_merage = array_merge($data_company,$data_coordinator);
			
			// //save user detail
			// $this->staff_model->saveEditUser($id,$data_user,$data_merage);
			//end save user detail

			// data register 
			$data_regis = array(
				'project_id' => $this->input->post('project_id'),
				'user_id' => $this->input->post('user_id'),			
			);
			switch ($project_type) {
				case 1:
					$data_regis['target_type'] = $this->input->post('target_type');
					$data_regis['target_type_detail'] = $this->input->post('target_type_detail');
					$data_regis['showarea_type'] = $this->input->post('showarea_type');
					$data_regis['show_type'] = $this->input->post('show_type');
					$data_regis['area_type'] = $this->input->post('area_type');
					break;
				case 2:
					$data_regis['pop_shop_name'] = $this->input->post('pop_shop_name');
					$data_regis['pop_story'] = $this->input->post('pop_story');
					$data_regis['pop_range'] = $this->input->post('pop_range');
					$data_regis['pop_product_type'] = $this->input->post('pop_product_type');
					// $data_regis['pop_food_type'] = $this->input->post('pop_food_type');
					
					// pop_img flie upload
					if (!empty($_FILES['pop_img']['tmp_name'][0])){

						$pop_img = array();
						foreach ($_FILES['pop_img']['tmp_name'] as $key => $value) {
							if (strlen($value) > 0){
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'store'
								));
								array_push($pop_img,$imageupload['public_id']);
								
							}
						}
						$data_regis['pop_img'] = '';
						if (!empty($pop_img))
							$data_regis['pop_img'] = implode(",",$pop_img);
					
						//end pop_img upload

						// pop_closeup
						$pop_closeup = array();
						foreach ($_FILES['pop_closeup']['tmp_name'] as $key => $value) {
							if (strlen($value) > 0){
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'store'
								));
								array_push($pop_closeup,$imageupload['public_id']);
								
							}
						}
						$data_regis['pop_closeup'] = '';
						if (!empty($pop_closeup))
							$data_regis['pop_closeup'] = implode(",",$pop_closeup);
						
						//end pop_closeup upload

						// pop_packshot
						$pop_packshot = array();
						foreach ($_FILES['pop_packshot']['tmp_name'] as $key => $value) {
							if (strlen($value) > 0){
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'store'
								));
								array_push($pop_packshot,$imageupload['public_id']);
								
							}
						}
						$data_regis['pop_packshot'] = '';
						if (!empty($pop_packshot))
							$data_regis['pop_packshot'] = implode(",",$pop_packshot);
					}

					//end 
					break;
				case 3:
					$start_date = $this->input->post('join_start_date');
					if (!empty($start_date)){
						$tmp = explode('/',$start_date);
						$start_date = $tmp[2].'-'.$tmp[0].'-'.$tmp[1];
					}
					$finish_date = $this->input->post('join_finish_date');
					if (!empty($finish_date)){
						$tmp = explode('/',$finish_date);
						$finish_date = $tmp[2].'-'.$tmp[0].'-'.$tmp[1];
					}
					$data_regis['work_talk_type'] = $this->input->post('work_talk_type');
					$data_regis['work_talk_type_at'] = $this->input->post('work_talk_type_at');
					$data_regis['work_talk_title_th'] = $this->input->post('work_talk_title_th');
					$data_regis['work_talk_title_en'] = $this->input->post('work_talk_title_en');
					$data_regis['work_talk_name_th'] = $this->input->post('work_talk_name_th');
					$data_regis['work_talk_scope'] = $this->input->post('work_talk_scope');
					$data_regis['work_talk_detail'] = $this->input->post('work_talk_detail');

					$data_regis['join_number'] = $this->input->post('join_number');
					$data_regis['join_property'] = $this->input->post('join_property');
					$data_regis['join_start_date'] = $start_date;
					$data_regis['join_finish_date'] =  $finish_date;
					$data_regis['join_start_time'] = $this->input->post('join_start_time');
					$data_regis['join_finish_time'] = $this->input->post('join_finish_time');

					
					// work/talk  flie upload
					if (!empty($_FILES['join_profile']['tmp_name'][0])){

						$join_profile = array();
						foreach ($_FILES['join_profile']['tmp_name'] as $key => $value) {
							if (strlen($value) > 0){
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'document'
								));
								array_push($join_profile,$imageupload['public_id']);
								
							}
						}
						$data_regis['join_profile'] = '';
						if (!empty($join_profile))
							$data_regis['join_profile'] = implode(",",$join_profile);
					
						//end event upload

						// join_image
						$join_img_profile = array();
						foreach ($_FILES['join_img_profile']['tmp_name'] as $key => $value) {
							if (strlen($value) > 0){
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'document'
								));
								array_push($join_img_profile,$imageupload['public_id']);
								
							}
						}
						$data_regis['join_img_profile'] = '';
						if (!empty($join_img_profile))
							$data_regis['join_img_profile'] = implode(",",$join_img_profile);
												//end pop_closeup upload
				
						// join_image
						$join_image = array();
						foreach ($_FILES['join_image']['tmp_name'] as $key => $value) {
							if (strlen($value) > 0){
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'document'
								));
								array_push($join_image,$imageupload['public_id']);
								
							}
						}
						$data_regis['join_img'] = '';
						if (!empty($join_image))
							$data_regis['join_img'] = implode(",",$join_image);
												//end pop_closeup upload

						// join_event
						$join_event = array();
						foreach ($_FILES['join_event']['tmp_name'] as $key => $value) {
							if (strlen($value) > 0){
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'document'
								));
								array_push($join_event,$imageupload['public_id']);
								
							}
						}
						$data_regis['join_event'] = '';
						if (!empty($join_event))
							$data_regis['join_event'] = implode(",",$join_event);
					}
					
					
				
					break;
				case 4:
					$start_date = $this->input->post('join_start_date');
					if (!empty($start_date)){
						$tmp = explode('/',$start_date);
						$start_date = $tmp[2].'-'.$tmp[0].'-'.$tmp[1];
					}
					$finish_date = $this->input->post('join_finish_date');
					if (!empty($finish_date)){
						$tmp = explode('/',$finish_date);
						$finish_date = $tmp[2].'-'.$tmp[0].'-'.$tmp[1];
					}
					// echo $finish_date;die();
					$data_regis['event_type'] = $this->input->post('event_type');
					$data_regis['event_type_other'] = $this->input->post('event_type_other');
					$data_regis['event_name_th'] = $this->input->post('event_name_th');
					// $data_regis['event_name_en'] = $this->input->post('event_name_en');
					$data_regis['event_detail'] = $this->input->post('event_detail');
					$data_regis['join_number'] = $this->input->post('join_number');
					$data_regis['join_property'] = $this->input->post('join_property');
					$data_regis['join_start_date'] = $start_date;
					$data_regis['join_finish_date'] =  $finish_date;
					$data_regis['join_start_time'] = $this->input->post('join_start_time');
					$data_regis['join_finish_time'] = $this->input->post('join_finish_time');
					$data_regis['event_address'] = $this->input->post('event_address');
					$data_regis['event_address_detail'] = $this->input->post('event_address_detail');



						// event  flie upload
						if (!empty($_FILES['join_profile']['tmp_name'][0])){

							$join_profile = array();
							foreach ($_FILES['join_profile']['tmp_name'] as $key => $value) {
								if (strlen($value) > 0){
									$imageupload = \Cloudinary\Uploader::upload($value,array(
										"folder"=>'document'
									));
									array_push($join_profile,$imageupload['public_id']);
									
								}
							}
							$data_regis['join_profile'] = '';
							if (!empty($join_profile))
								$data_regis['join_profile'] = implode(",",$join_profile);
						
							//end event upload
					
							// join_image
							$join_image = array();
							foreach ($_FILES['join_image']['tmp_name'] as $key => $value) {
								if (strlen($value) > 0){
									$imageupload = \Cloudinary\Uploader::upload($value,array(
										"folder"=>'document'
									));
									array_push($join_image,$imageupload['public_id']);
									
								}
							}
							$data_regis['join_img'] = '';
							if (!empty($join_image))
								$data_regis['join_img'] = implode(",",$join_image);
													//end pop_closeup upload
	
							// join_event
							$join_event = array();
							foreach ($_FILES['join_event']['tmp_name'] as $key => $value) {
								if (strlen($value) > 0){
									$imageupload = \Cloudinary\Uploader::upload($value,array(
										"folder"=>'document'
									));
									array_push($join_event,$imageupload['public_id']);
									
								}
							}
							$data_regis['join_event'] = '';
							if (!empty($join_event))
								$data_regis['join_event'] = implode(",",$join_event);
						}
					

				
					break;
				default:
					$data_regis['target_type'] = $this->input->post('target_type');
					$data_regis['target_type_detail'] = $this->input->post('target_type_detail');
					$data_regis['showarea_type'] = $this->input->post('showarea_type');
					$data_regis['show_type'] = $this->input->post('show_type');
					$data_regis['area_type'] = $this->input->post('area_type');
					break;
			}
			//end data register
			//save user detail

			// echo '<pre>';
			// print_r($_POST);
			// print_r($data_regis);
			// exit;

			$reg_id = $this->input->post('reg_id');
			$insert_id = $this->pm_model->saveRegis($reg_id,$data_regis);
			//end save user detail

			//all product save
			$status = true;
			$product_name = $this->input->post('product_name');
		
			if(!empty($product_name)){
				
				foreach ($product_name as $key => $value) {
					if(!empty($value)){
						
						//upload image  product_img
						
						$product_img = array();
						
						if ( !empty( $_FILES['product_img']['name'][$key+1]) && !is_null($_FILES['product_img']['name'][$key+1])){
							//upload data
						
							$image = $_FILES['product_img']['tmp_name'][$key+1];
							foreach ($image as $keys => $value) {
								if (strlen($value) > 0){
									$imageupload = \Cloudinary\Uploader::upload($value,array(
										"folder"=>'product'
									));
									array_push($product_img,$imageupload['public_id']);
									
								}
							
							}
							$product_img = implode(",",$product_img);
							
						}

						//end upload product_img

						//upload image  product_closeup
						$product_closeup = array();
						if ( !empty( $_FILES['product_closeup']['name'][$key+1]) && !is_null($_FILES['product_closeup']['name'][$key+1]) ){
							//upload data
							$image = $_FILES['product_closeup']['tmp_name'][$key+1];
							foreach ($image as $keys => $value) {
								if (strlen($value) > 0){
									$imageupload = \Cloudinary\Uploader::upload($value,array(
										"folder"=>'product'
									));
									array_push($product_closeup,$imageupload['public_id']);
									
								}
							}
							$product_closeup = implode(",",$product_closeup);
						
						}

						
						//end upload product_closeup

						//upload image  product_packshot
						$product_packshot = array();
						if (!empty( $_FILES['product_packshot']['name'][$key+1])&& !is_null($_FILES['product_packshot']['name'][$key+1])  ){
							//upload data
							$image = $_FILES['product_packshot']['tmp_name'][$key+1];
							foreach ($image as $keys => $value) {
								if (strlen($value) > 0){
									$imageupload = \Cloudinary\Uploader::upload($value,array(
										"folder"=>'product'
									));
									array_push($product_packshot,$imageupload['public_id']);
									
								}
							}
							$product_packshot = implode(",",$product_packshot);
							
						}
						//end upload product_packshot

						
						//upload pdf  product
						$product_pdf = array();
						if (!empty( $_FILES['product_pdf']['name'][$key+1])&& !is_null($_FILES['product_pdf']['name'][$key+1])  ){
							//upload data
							$image = $_FILES['product_pdf']['tmp_name'][$key+1];
							foreach ($image as $keys => $value) {
			
								if (strlen($value) > 0){
									$imageupload = \Cloudinary\Uploader::upload($value,array(
										"folder"=>'product_pdf'
									));
									array_push($product_pdf,$imageupload['public_id']);
									
								}
							}
							$product_pdf = implode(",",$product_pdf);
							
						}
				
						//end upload product pdf

						// $product_date = '';
						// if (!empty($this->input->post('product_date')[$key])){
						// 	$dates = explode('/',$this->input->post('product_date')[$key]);
						// 	$product_date = $dates[2].'-'.$dates[0].'-'.$dates[1];
						// }
						

						$data_product = array(
							'reg_id' => $insert_id,
							'product_num' => $key,
							'product_type' =>  $this->input->post('product_type')[$key],
							'product_name' =>  $this->input->post('product_name')[$key],
							'material' =>  $this->input->post('material')[$key],
							'product_date' =>  $this->input->post('product_date')[$key],
							'product_width' =>  $this->input->post('product_width')[$key],
							'product_length' =>  $this->input->post('product_length')[$key],
							'product_height' =>  @$this->input->post('product_height')[$key],
							'product_amount' =>  $this->input->post('product_amount')[$key],
							'product_concept' =>  $this->input->post('product_concept')[$key],
							'product_prename' =>  $this->input->post('product_prename')[$key],
							'product_firstname' =>  $this->input->post('product_firstname')[$key],
							'product_lastname' =>  $this->input->post('product_lastname')[$key],
						);
						
						if(!empty($product_img))
							$data_product['product_img'] = $product_img;
						if(!empty($product_closeup))
							$data_product['product_closeup'] = $product_closeup;
						if(!empty($product_packshot))
							$data_product['product_packshot'] = $product_packshot;
						if(!empty($product_pdf)){
							$data_product['product_pdf'] = $product_pdf;
						}
						//save user detail

						
						$status = $this->member_model->saveProduct($data_product);
						//end save user detail
				
					}
				
				}
			}

			if(!$status){
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">ลงทะเบียน สำเร็จ </div>');
				redirect(base_url('project_manage/index/'.$this->input->post('project_id').'/'.$this->input->post('user_id')));
				
			}
		// }
		
        $data = array(
        	'user_app' => $this->session->userdata('sesUserID'),
        	'reg_id' => $this->input->post('reg_id'),
        	'email_receive' => $this->input->post('email_receive'),
        	'prj_name' => $this->input->post('prj_name'),
            'reg_status' => $this->input->post('reg_status'),
            'reject_detail' => $this->input->post('reject_detail'),

		);    

		$pid = $this->pm_model->saveAppv($data);
        if($pid){
        	
        	$subject = 'ผลการสมัครเข้าร่วม "'.$data['prj_name'].'"';  //email subject

	        if($data['reg_status']){
	            $message = 'ถึง ผู้ใช้งาน,<br><br> ผลการสมัครเข้าร่วม "'.$data['prj_name'].'"<br><span style="color:green"> ผ่านการคัดเลือก </span><br>ขอบคุณ';
	        }else{
	            $message = 'ถึง ผู้ใช้งาน,<br><br> ผลการสมัครเข้าร่วม "'.$data['prj_name'].'"<br><span style="color:red"> ไม่ผ่านการคัดเลือก </span><br>เนื่องจาก : '.htmlspecialchars($data['reject_detail']).'<br><br>ขอบคุณ';
	        }

	        ## SET PARAM SEND MAIL ##
	        $data_mail['to'] = $data['email_receive']; //'natchapol.prms@gmail.com';//
        	$data_mail['mail_to_name'] = $this->input->post('regis_name');
        	$data_mail['message'] = $message;
        	$data_mail['subject'] = $subject;

        	$content = array( 
		     'name' => $data_mail['mail_to_name'], 
		     'content' => $data_mail['message'], 
		    ); 

        	// $this->load->library('mailgun');
			// if($this->mailgun->send($data_mail,$content)){ 
        	$this->load->library('cmdw_mail');
        	if($this->cmdw_mail->sendMail($data_mail)){ 
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