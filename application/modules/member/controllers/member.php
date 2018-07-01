<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');


class Member extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('staff/staff_model');
		$this->load->model('member_model');
		$this->session->keep_flashdata('msg');
		$this->session->keep_flashdata('error');
		if($this->session->userdata('sesUserID')==''){
		redirect(base_url());
		}
	}
	public function index()
	{
		$this->config->set_item('title','กิจกรรม');

		$data['project'] = $this->staff_model->getProject();
		$data['status_regis'] = $this->member_model->getStatusRegis();

		$data['news'] = $this->staff_model->getNews();
		
		//check user first login
		$user_id = $this->session->userdata('sesUserID');
		$data['alert_data'] = $this->member_model->getAlert($user_id);
		$data['first_login'] = $this->member_model->getUserLogin($user_id);

		$this->setView('index',$data);
		$this->publish();
	}

	//form register profile
	public function form($id = '',$preview = '')
	{

		//check approve regis 
		$status = $this->member_model->getStatusRegis($id);
		if ($preview == '' && @$status[$id]->reg_status)
			redirect(base_url('member'));

		$user_id = $this->session->userdata('sesUserID');
		if(!empty($id)){
			// get province
			$query = $this->db->query('SELECT * FROM std_area_province');
			$data['province'] = $query->result();
			//get country
			$query = $this->db->query('SELECT * FROM std_countries');
			$data['countries'] = $query->result();
			//get status_group
			$query = $this->db->query('SELECT * FROM tcdc_status_group');
			$data['status'] = $query->result();

			$data['project'] = $this->staff_model->getProject($id);
			$data['member'] = $this->staff_model->getUsers($user_id);
			$data['regis'] = $this->member_model->getUserRegis($id,$user_id);
			$data['quiz'] = $this->member_model->getUserQuiz($id,$user_id);
			if (!empty($data['regis']['join_start_date'])){
				$tmp = explode('-',$data['regis']['join_start_date']);
				$data['regis']['join_start_date'] = $tmp[1].'/'.$tmp[2].'/'.$tmp[0];
			}
			if (!empty($data['regis']['join_finish_date'])){
				$tmp = explode('-',$data['regis']['join_finish_date']);
				$data['regis']['join_finish_date'] = $tmp[1].'/'.$tmp[2].'/'.$tmp[0];
			}
			
			$this->template->stylesheet->add('assets/css/loader.css');
			$this->template->javascript->add('assets/modules/member/event_form.js');
			$this->template->javascript->add('assets/modules/member/form_tab.js');
		
			
			switch ($data['project'][0]->project_type) {
				case 1:
					$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);
					$this->setView('event_form_show',$data);break;
				case 2:
					$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);
					$this->setView('event_form_pop',$data);break;
				case 3:
					$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);
					$this->setView('event_form_work_talk',$data);break;
				case 4:
					$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);
					$this->setView('event_form_event',$data);break;
				default:
					$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);
					$this->setView('event_form_international',$data);break;
			}
			
        	$this->publish();
		}

				
	}

	//save event register form
	public function saveEventForm()
	{
		// get project type
		// print_r($this->input->post('company_technic'));die();
		//  print_r($this->input->post());die();
		$project_type = $this->input->post('project_type');
		$group_data = $this->input->post('job_group');
	
		//validate form
		$this->form_validation->set_rules('email','อีเมล', 'trim|required|valid_email');
		$this->form_validation->set_rules('job', 'สถานภาพ', 'trim|required');

		switch ($group_data) {
			case 1:
				$this->form_validation->set_rules('job_type_one', 'ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด', 'trim|required');
				$this->form_validation->set_rules('company_service_one', 'ประสบการณ์', 'trim|required');
				$this->form_validation->set_rules('company_custom_group', 'ลูกค้าของคุณคือกลุ่มใด', 'trim|required');
				$this->form_validation->set_rules('company_business_look_one', 'ลักษณะการทำงานของธุรกิจ', 'trim|required');
				$this->form_validation->set_rules('company_people', 'จำนวนพนักงาน', 'trim|required');
				// $this->form_validation->set_rules('company_num_regis', 'เลขทะเบียนนิติบุคคล', 'trim|required|callback_num_regis');
				break;
			case 2:
				$this->form_validation->set_rules('job_type_two', 'ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด', 'trim|required');
				$this->form_validation->set_rules('company_service_two', 'ประสบการณ์', 'trim|required');
				$this->form_validation->set_rules('company_work_look', 'ลักษณะการทำงาน', 'trim|required');
				$this->form_validation->set_rules('company_sell_way', 'ช่องทางการจำหน่าย', 'trim|required');
				$this->form_validation->set_rules('company_product_build', 'คุณสามารถรับจ้างผลิตสินค้าตามจำนวนได้หรือไม่', 'trim|required');
			
				break;
			case 3:
				$this->form_validation->set_rules('company_group_product', 'การทำงานของคุณอยู่ในกลุ่มใด', 'trim|required');
				$this->form_validation->set_rules('company_service_three', 'ประสบการณ์', 'trim|required');
				$this->form_validation->set_rules('company_product_detail', 'การผลิตสินค้าหรือผลงานของคุณเป็นรูปแบบใด', 'trim|required');
				$this->form_validation->set_rules('company_num_product', 'คุณสามารถผลิตได้จำนวน', 'trim|required');
	
			
				break;
			case 4:
				$this->form_validation->set_rules('company_department', 'องค์กรของคุณคือหน่วยงานประเภทใด', 'trim|required');
				$this->form_validation->set_rules('company_duty', 'หน้าที่หลักขององค์กร', 'trim|required');
				$this->form_validation->set_rules('company_join_work', 'คุณเคยร่วมงาน Design Week ใดๆ หรือไม่', 'trim|required');
		
				break;
		}
		// if ($this->input->post('job_group') == 1){
		// 	$this->form_validation->set_rules('company_num_regis', 'เลขทะเบียนนิติบุคคล', 'trim|required|callback_num_regis');
		// }
		// $this->form_validation->set_rules('id_number', 'รหัสบัตรประชาชน', 'trim|required');
		$this->form_validation->set_rules('prename', 'คำนำหน้า', 'trim|required');
		$this->form_validation->set_rules('firstname', 'ชื่อ', 'trim|required');
		$this->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required');
		$this->form_validation->set_rules('phone', 'โทรศัพท์มือถือ', 'trim|required');
		$this->form_validation->set_rules('address','เลขที่', 'trim|required');
		// $this->form_validation->set_rules('village','หมู่บ้าน', 'trim|required');
		$this->form_validation->set_rules('subdistrict','แขวง/ตำบล', 'trim|required');
		$this->form_validation->set_rules('district','อำเภอ', 'trim|required');
		$this->form_validation->set_rules('country','ประเทศ', 'required');
		$this->form_validation->set_rules('province','จังหวัด', 'trim|required');
		$this->form_validation->set_rules('zipcode','รหัสไปรณีย์', 'trim|required|min_length[5]|max_length[5]|callback_numeric_dash');


		// //company
		if ( $this->input->post('radio22') == 1){
			
			$this->form_validation->set_rules('coordinator_prename','คำนำหน้าผู้ประสานงาน', 'trim|required');
			$this->form_validation->set_rules('coordinator_firstname','ชื่อผู้ประสานงาน', 'trim|required');
			$this->form_validation->set_rules('coordinator_lastname','นามสกุลผู้ประสานงาน', 'trim|required');
			$this->form_validation->set_rules('coordinator_phone','เบอร์โทรผู้ประสานงาน', 'trim|required');
			$this->form_validation->set_rules('coordinator_email','อีเมลผู้ประสานงาน', 'trim|required');
			
		}

		switch ($project_type) {
			case 1:
			
				$this->form_validation->set_rules('product_amount[]','โปรดระบุจำนวนชิ้นงานที่ต้องการจัดแสดง', 'trim|required');
				$this->form_validation->set_rules('target_type[]','เป้าหมายในการสมัคร', 'trim|required');
				$this->form_validation->set_rules('product_type[]','ประเภทผลงาน', 'trim|required');
				$this->form_validation->set_rules('product_name[]','ชื่อผลงาน', 'trim|required');
				$this->form_validation->set_rules('product_concept[]','โปรดระบุแนวคิดในการออกแบบผลงาน', 'trim|required');
				$this->form_validation->set_rules('material[]','วัสดุหลัก', 'trim|required');
				$this->form_validation->set_rules('product_prename[]','คำนำหน้าชื่อ', 'trim|required');
				$this->form_validation->set_rules('product_firstname[]','ชื่อผู้ออกแบบ', 'trim|required');
				$this->form_validation->set_rules('product_lastname[]','นามสกุลผู้ออกแบบ', 'trim|required');
				break;
			case 2:
			
				$this->form_validation->set_rules('pop_shop_name','ชื่อร้าน', 'trim|required');
				$this->form_validation->set_rules('pop_range','ช่วงราคาสินค้า', 'trim|required');
				$this->form_validation->set_rules('pop_product_type','ประเภทของที่ขาย', 'trim|required');
				break;
			case 3:
				$this->form_validation->set_rules('work_talk_type','ประเภทกิจกรรม', 'trim|required');
				$this->form_validation->set_rules('work_talk_title_th','หัวข้อ', 'trim|required');
				$this->form_validation->set_rules('work_talk_title_en','หัวข้อ (ภาษาอังกฤษ)', 'trim|required');
				$this->form_validation->set_rules('work_talk_name_th','ชื่อวิทยากร (ภาษาไทย)', 'trim|required');
				$this->form_validation->set_rules('work_talk_scope','ขอบเขตเนื้อหาเหมาะสมกับ', 'trim|required');
				break;
			case 4:
				$this->form_validation->set_rules('event_type','ประเภทกิจกรรม', 'trim|required');
				$this->form_validation->set_rules('event_name_th','ชื่อกิจกรรม (ภาษาไทย)', 'trim|required');
				// $this->form_validation->set_rules('event_name_en','ชื่อกิจกรรม (ภาษาอังกฤษ)', 'trim|required');
			
				break;
			default:
				$this->form_validation->set_rules('product_type[]','ประเภทผลงาน', 'trim|required');
				$this->form_validation->set_rules('product_name[]','ชื่อผลงาน', 'trim|required');
				$this->form_validation->set_rules('material[]','วัสดุ', 'trim|required');
				$this->form_validation->set_rules('product_prename[]','คำนำหน้าชื่อ', 'trim|required');
				$this->form_validation->set_rules('product_firstname[]','ชื่อผู้ออกแบบ', 'trim|required');
				$this->form_validation->set_rules('product_lastname[]','นามสกุลผู้ออกแบบ', 'trim|required');
				break;
		}
		


		if($this->form_validation->run() == false){
			$this->template->javascript->add('assets/modules/member/event_form.js');
			$this->template->javascript->add('assets/modules/member/form_tab.js');

			$this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
			
			$user_id = $this->session->userdata('sesUserID');
			$id = $this->input->post('project_id');
			$data = array();
			if(!empty($id)){
				// get province
				$query = $this->db->query('SELECT * FROM std_area_province');
				$data['province'] = $query->result();
				//get country
				$query = $this->db->query('SELECT * FROM std_countries');
				$data['countries'] = $query->result();
				//get status_group
				$query = $this->db->query('SELECT * FROM tcdc_status_group');
				$data['status'] = $query->result();
	
				$data['project'] = $this->staff_model->getProject($id);
				$data['member'] = $this->staff_model->getUsers($user_id);
				$data['regis'] = $this->member_model->getUserRegis($id,$user_id);

				//get data post member
				$data['member']->prename = $this->input->post('prename');
				$data['member']->prename_detail = $this->input->post('prename_detail');
				$data['member']->firstname = $this->input->post('firstname');
				$data['member']->lastname = $this->input->post('lastname');
				$data['member']->phone = $this->input->post('phone');
				$data['member']->h_phone = $this->input->post('h_phone');
				$data['member']->email = $this->input->post('email');
				$data['member']->address = $this->input->post('address');
				$data['member']->village = $this->input->post('village');
				$data['member']->lane = $this->input->post('lane');
				$data['member']->road = $this->input->post('road');
				$data['member']->subdistrict = $this->input->post('subdistrict');
				$data['member']->district = $this->input->post('district');
				$data['member']->province = $this->input->post('province');
				$data['member']->country = $this->input->post('country');
				$data['member']->zipcode = $this->input->post('zipcode');
				$data['member']->job = $this->input->post('job');
				$data['member']->brand = $this->input->post('brand');
				$data['member']->website = $this->input->post('website');
				$data['member']->facebook = $this->input->post('facebook');
				$data['member']->lineid = $this->input->post('lineid');
				$data['member']->company = $this->input->post('company');
				$data['member']->instragram = $this->input->post('instragram');
			

				if (!empty($this->input->post('job_type_one'))){
					$data['member']->job_type = $this->input->post('job_type_one');
				}
				if (!empty($this->input->post('job_type_two'))){
					$data['member']->job_type = $this->input->post('job_type_two');
				}
				
				$data['member']->company_type = $this->input->post('radio1');
				$data['member']->company_name = $this->input->post('company_name');
				$data['member']->company_service = $this->input->post('company_service');
				$data['member']->company_address = $this->input->post('company_address');
				$data['member']->company_village = $this->input->post('company_village');
				$data['member']->company_lane = $this->input->post('company_lane');
				$data['member']->company_road = $this->input->post('company_road');
				$data['member']->company_country = $this->input->post('company_country');
				$data['member']->company_province = $this->input->post('company_province');
				$data['member']->company_district = $this->input->post('company_district');
				$data['member']->company_subdistrict = $this->input->post('company_subdistrict');
				$data['member']->company_zipcode = $this->input->post('company_zipcode');

				//group 1
				$data['member']->company_custom_group = $this->input->post('company_custom_group');
				$data['member']->company_people = $this->input->post('company_people');
				$data['member']->company_num_regis = $this->input->post('company_num_regis');
				//group 2
				$data['member']->company_work_look = $this->input->post('company_work_look');
				$data['member']->company_sell_way = $this->input->post('company_sell_way');
				$data['member']->company_product_build = $this->input->post('company_product_build');
				//group 3
				$data['member']->company_group_product = $this->input->post('company_group_product');
				$data['member']->company_group_product_detail = $this->input->post('company_group_product_detail');
				$data['member']->company_technic = implode(',',$this->input->post('company_technic'));
				$data['member']->company_product_detail = $this->input->post('company_product_detail');
				$data['member']->company_num_product = $this->input->post('company_num_product');
				//group 4
				$data['member']->company_department = $this->input->post('company_department');
				$data['member']->company_duty = $this->input->post('company_duty');
				$data['member']->company_join_work = $this->input->post('company_join_work');

				if (!empty($this->input->post('company_service_one'))){
					$data['member']->company_service = $this->input->post('company_service_one');
				}
				if (!empty($this->input->post('company_service_two'))){
					$data['member']->company_service = $this->input->post('company_service_two');
				}
				if (!empty($this->input->post('company_service_three'))){
					$data['member']->company_service = $this->input->post('company_service_three');
				}
	
				if (!empty($this->input->post('company_business_look_one'))){
					$data['member']->company_business_look = $this->input->post('company_business_look_one');
				}
				if (!empty($this->input->post('company_business_look_two'))){
					$data['member']->company_business_look = $this->input->post('company_business_look_two');
				}

				$data['member']->coordinator_type = $this->input->post('radio22');
				$data['member']->coordinator_prename = $this->input->post('coordinator_prename');
				$data['member']->coordinator_firstname = $this->input->post('coordinator_firstname');
				$data['member']->coordinator_lastname = $this->input->post('coordinator_lastname');
				$data['member']->coordinator_phone = $this->input->post('coordinator_phone');
				$data['member']->coordinator_email = $this->input->post('coordinator_email');
				$data['member']->coordinator_lineid = $this->input->post('coordinator_lineid');

				// post data form event
				switch ($data['project'][0]->project_type) {
					case 1:
						$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);

						$data['regis']['target_type'] = $this->input->post('target_type');
						$data['regis']['target_type_detail'] = $this->input->post('target_type_detail');
						$data['regis']['showarea_type'] = $this->input->post('showarea_type');
						$data['regis']['show_type'] = $this->input->post('show_type');
						$data['regis']['area_type'] = $this->input->post('area_type');

						foreach ($this->input->post('product_name') as $key => $value) {
							$data['regis']['product'][$key]['product_type'] =  $this->input->post('product_type')[$key];
							$data['regis']['product'][$key]['product_name'] =  $this->input->post('product_name')[$key];
							$data['regis']['product'][$key]['material'] =  $this->input->post('material')[$key];
							$data['regis']['product'][$key]['product_date'] =  $this->input->post('product_date')[$key];
							$data['regis']['product'][$key]['product_width'] =  $this->input->post('product_width')[$key];
							$data['regis']['product'][$key]['product_length'] =  $this->input->post('product_length')[$key];
							$data['regis']['product'][$key]['product_height'] =  @$this->input->post('product_height')[$key];
							$data['regis']['product'][$key]['product_amount'] =  $this->input->post('product_amount')[$key];
							$data['regis']['product'][$key]['product_concept'] =  $this->input->post('product_concept')[$key];
							$data['regis']['product'][$key]['product_prename'] =  $this->input->post('product_prename')[$key];
							$data['regis']['product'][$key]['product_firstname'] =  $this->input->post('product_firstname')[$key];
							$data['regis']['product'][$key]['product_lastname'] =  $this->input->post('product_lastname')[$key];
						}
						
						$this->setView('event_form_show',$data);break;
					case 2:
						$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);

						$data['regis']['pop_shop_name'] = $this->input->post('pop_shop_name');
						$data['regis']['pop_story'] = $this->input->post('pop_story');
						$data['regis']['pop_range'] = $this->input->post('pop_range');
						$data['regis']['pop_product_type'] = $this->input->post('pop_product_type');
						$data['regis']['pop_food_type'] = $this->input->post('pop_food_type');

						$this->setView('event_form_pop',$data);break;
					case 3:
						$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);

						$data['regis']['work_talk_type'] = $this->input->post('work_talk_type');
						$data['regis']['work_talk_type_at'] = $this->input->post('work_talk_type_at');
						$data['regis']['work_talk_title_th'] = $this->input->post('work_talk_title_th');
						$data['regis']['work_talk_title_en'] = $this->input->post('work_talk_title_en');
						$data['regis']['work_talk_name_th'] = $this->input->post('work_talk_name_th');
						$data['regis']['work_talk_scope'] = $this->input->post('work_talk_scope');
						$data['regis']['work_talk_detail'] = $this->input->post('work_talk_detail');

						$data['regis']['join_number'] = $this->input->post('join_number');
						$data['regis']['join_property'] = $this->input->post('join_property');
						$data['regis']['join_start_date'] = $this->input->post('join_start_date');
						$data['regis']['join_finish_date'] =  $this->input->post('join_finish_date');
						$data['regis']['join_start_time'] = $this->input->post('join_start_time');
						$data['regis']['join_finish_time'] = $this->input->post('join_finish_time');

						$this->setView('event_form_work_talk',$data);break;
					case 4:
						$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);

						$data['regis']['event_type'] = $this->input->post('event_type');
						$data['regis']['event_type_other'] = $this->input->post('event_type_other');
						$data['regis']['event_name_th'] = $this->input->post('event_name_th');
						// $data['regis']['event_name_en'] = $this->input->post('event_name_en');
						$data['regis']['event_detail'] = $this->input->post('event_detail');
						$data['regis']['join_number'] = $this->input->post('join_number');
						$data['regis']['join_property'] = $this->input->post('join_property');
						$data['regis']['join_start_date'] = $this->input->post('join_start_date');
						$data['regis']['join_finish_date'] =  $this->input->post('join_finish_date');
						$data['regis']['join_start_time'] = $this->input->post('join_start_time');
						$data['regis']['join_finish_time'] = $this->input->post('join_finish_time');
						$data['regis']['event_address'] = $this->input->post('event_address');
						$data['regis']['event_address_detail'] = $this->input->post('event_address_detail');
						
						$this->setView('event_form_event',$data);break;
					default:
						$this->config->set_item('title','ลงทะเบียน '.$data['project'][0]->type_name);
						$data['regis']['target_type'] = $this->input->post('target_type');
						$data['regis']['target_type_detail'] = $this->input->post('target_type_detail');
						$data['regis']['showarea_type'] = $this->input->post('showarea_type');
						$data['regis']['show_type'] = $this->input->post('show_type');
						$data['regis']['area_type'] = $this->input->post('area_type');

						foreach ($this->input->post('product_name') as $key => $value) {
							$data['regis']['product'][$key]['product_type'] =  $this->input->post('product_type')[$key];
							$data['regis']['product'][$key]['product_name'] =  $this->input->post('product_name')[$key];
							$data['regis']['product'][$key]['material'] =  $this->input->post('material')[$key];
							$data['regis']['product'][$key]['product_date'] =  $this->input->post('product_date')[$key];
							$data['regis']['product'][$key]['product_width'] =  $this->input->post('product_width')[$key];
							$data['regis']['product'][$key]['product_length'] =  $this->input->post('product_length')[$key];
							$data['regis']['product'][$key]['product_height'] =  @$this->input->post('product_height')[$key];
							$data['regis']['product'][$key]['product_amount'] =  $this->input->post('product_amount')[$key];
							$data['regis']['product'][$key]['product_concept'] =  $this->input->post('product_concept')[$key];
							$data['regis']['product'][$key]['product_firstname'] =  $this->input->post('product_firstname')[$key];
							$data['regis']['product'][$key]['product_lastname'] =  $this->input->post('product_lastname')[$key];
						}
						
						$this->setView('event_form_international',$data);break;
				}
				$this->publish();
				
			}
		}
		else{
			//set path upload
			$project_id = $this->input->post('project_id');
			$id = $this->session->userdata('sesUserID');
			$path = 'uploads/'.$project_id.'/'.$id.'/';

			$files = $_FILES;
		
			//save user
			$data_user = array(
				'prename' => $this->input->post('prename'),
				'prename_detail' => $this->input->post('prename_detail'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'phone' => $this->input->post('phone'),
				 'h_phone' => $this->input->post('h_phone'),
				'address' => $this->input->post('address'),
				'village' => $this->input->post('village'),
				'lane' => $this->input->post('lane'),
				'road' => $this->input->post('road'),
				'subdistrict' => $this->input->post('subdistrict'),
				'district' => $this->input->post('district'),
				'province' => $this->input->post('province'),
				'country' => $this->input->post('country'),
				'zipcode' => $this->input->post('zipcode'),
				'job' => $this->input->post('job'),
				'brand' => $this->input->post('brand'),
				'website' => $this->input->post('website'),
				'facebook' => $this->input->post('facebook'),
				'lineid' => $this->input->post('lineid'),
				'company' => $this->input->post('company'),
				'instragram' => $this->input->post('instragram')
				
			);
			if (!empty($this->input->post('job_type_one'))){
				$data['job_type'] = $this->input->post('job_type_one');
			}
			if (!empty($this->input->post('job_type_two'))){
				$data['job_type'] = $this->input->post('job_type_two');
			}
			//end user
			

			//company 
			$data_company = array(
				'company_type' => $this->input->post('radio1'),
				'company_name' => $this->input->post('company_name'),
				'company_service' => $this->input->post('company_service'),
				'company_address' => $this->input->post('company_address'),
				'company_village' => $this->input->post('company_village'),
				'company_lane' => $this->input->post('company_lane'),
				'company_road' => $this->input->post('company_road'),
				'company_country' => $this->input->post('company_country'),
				'company_province' => $this->input->post('company_province'),
				'company_district' => $this->input->post('company_district'),
				'company_subdistrict' => $this->input->post('company_subdistrict'),
				'company_zipcode' => $this->input->post('company_zipcode'),

				//group 1
				'company_custom_group' => $this->input->post('company_custom_group'),
				'company_people' => $this->input->post('company_people'),
				'company_num_regis' => $this->input->post('company_num_regis'),
				//group 2
				'company_work_look' => $this->input->post('company_work_look'),
				'company_sell_way' => $this->input->post('company_sell_way'),
				'company_product_build' => $this->input->post('company_product_build'),
				//group 3
				'company_group_product' => $this->input->post('company_group_product'),
				'company_group_product_detail' => $this->input->post('company_group_product_detail'),
				'company_technic' => implode(',',$this->input->post('company_technic')),
				'company_product_detail' => $this->input->post('company_product_detail'),
				'company_num_product' => $this->input->post('company_num_product'),
				//group 4
				'company_department' => $this->input->post('company_department'),
				'company_duty' => $this->input->post('company_duty'),
				'company_join_work' => $this->input->post('company_join_work'),

			);
			if (!empty($this->input->post('company_service_one'))){
				$data_company['company_service'] = $this->input->post('company_service_one');
			}
			if (!empty($this->input->post('company_service_two'))){
				$data_company['company_service'] = $this->input->post('company_service_two');
			}
			if (!empty($this->input->post('company_service_three'))){
				$data_company['company_service'] = $this->input->post('company_service_three');
			}

			if (!empty($this->input->post('company_business_look_one'))){
				$data_company['company_business_look'] = $this->input->post('company_business_look_one');
			}
			if (!empty($this->input->post('company_business_look_two'))){
				$data_company['company_business_look'] = $this->input->post('company_business_look_two');
			}
			
			//end company

			// coordinator
			$data_coordinator = array(
				'coordinator_type' => $this->input->post('radio22'),
				'coordinator_prename' => $this->input->post('coordinator_prename'),
				'coordinator_firstname' => $this->input->post('coordinator_firstname'),
				'coordinator_lastname' => $this->input->post('coordinator_lastname'),
				'coordinator_phone' => $this->input->post('coordinator_phone'),
				'coordinator_email' => $this->input->post('coordinator_email'),
				// 'coordinator_address' => $this->input->post('coordinator_address'),
				// 'coordinator_province' => $this->input->post('coordinator_province'),
				// 'coordinator_district' => $this->input->post('coordinator_district'),
				// 'coordinator_subdistrict' => $this->input->post('coordinator_subdistrict'),
				// 'coordinator_zipcode' => $this->input->post('coordinator_zipcode'),
				'coordinator_lineid' => $this->input->post('coordinator_lineid')

			);
			
			//end data_coordinator
			//mearge data_company and coordinator
			$data_merage = array_merge($data_company,$data_coordinator);
			
			//save user detail
			$this->staff_model->saveEditUser($id,$data_user,$data_merage);
			//end save user detail

			// data register 
			$data_regis = array(
				'project_id' => $this->input->post('project_id'),
				'user_id' => $id,			
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
								$_FILES['pop_img']['name']= $files['pop_img']['name'][$key];
								$_FILES['pop_img']['type']= $files['pop_img']['type'][$key];
								$_FILES['pop_img']['tmp_name']= $files['pop_img']['tmp_name'][$key];
								$_FILES['pop_img']['error']= $files['pop_img']['error'][$key];
								$_FILES['pop_img']['size']= $files['pop_img']['size'][$key];
								
								$img_pop = $this->uploadData('pop_img','pop_img_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'store'
								// ));
								array_push($pop_img,$img_pop);
								
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
								$_FILES['pop_closeup']['name']= $files['pop_closeup']['name'][$key];
								$_FILES['pop_closeup']['type']= $files['pop_closeup']['type'][$key];
								$_FILES['pop_closeup']['tmp_name']= $files['pop_closeup']['tmp_name'][$key];
								$_FILES['pop_closeup']['error']= $files['pop_closeup']['error'][$key];
								$_FILES['pop_closeup']['size']= $files['pop_closeup']['size'][$key];
								
								$closeup_pop = $this->uploadData('pop_closeup','pop_closeup_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'store'
								// ));
								array_push($pop_closeup,$closeup_pop);
								
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
								$_FILES['pop_packshot']['name']= $files['pop_packshot']['name'][$key];
								$_FILES['pop_packshot']['type']= $files['pop_packshot']['type'][$key];
								$_FILES['pop_packshot']['tmp_name']= $files['pop_packshot']['tmp_name'][$key];
								$_FILES['pop_packshot']['error']= $files['pop_packshot']['error'][$key];
								$_FILES['pop_packshot']['size']= $files['pop_packshot']['size'][$key];
								
								$packshot_pop = $this->uploadData('pop_packshot','pop_packshot_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'store'
								// ));
								array_push($pop_packshot,$packshot_pop);
								
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
								$_FILES['join_profile']['name']= $files['join_profile']['name'][$key];
								$_FILES['join_profile']['type']= $files['join_profile']['type'][$key];
								$_FILES['join_profile']['tmp_name']= $files['join_profile']['tmp_name'][$key];
								$_FILES['join_profile']['error']= $files['join_profile']['error'][$key];
								$_FILES['join_profile']['size']= $files['join_profile']['size'][$key];
								
								$profile = $this->uploadData('join_profile','join_profile_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'document'
								// ));
								array_push($join_profile,$profile);
								
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
								$_FILES['join_img_profile']['name']= $files['join_img_profile']['name'][$key];
								$_FILES['join_img_profile']['type']= $files['join_img_profile']['type'][$key];
								$_FILES['join_img_profile']['tmp_name']= $files['join_img_profile']['tmp_name'][$key];
								$_FILES['join_img_profile']['error']= $files['join_img_profile']['error'][$key];
								$_FILES['join_img_profile']['size']= $files['join_img_profile']['size'][$key];
								
								$img_profile = $this->uploadData('join_img_profile','join_img_profile_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'document'
								// ));
								array_push($join_img_profile,$img_profile);
								
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
								$_FILES['join_image']['name']= $files['join_image']['name'][$key];
								$_FILES['join_image']['type']= $files['join_image']['type'][$key];
								$_FILES['join_image']['tmp_name']= $files['join_image']['tmp_name'][$key];
								$_FILES['join_image']['error']= $files['join_image']['error'][$key];
								$_FILES['join_image']['size']= $files['join_image']['size'][$key];
								
								$join_imag = $this->uploadData('join_image','join_image_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'document'
								// ));
								array_push($join_image,$join_imag);
								
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
								$_FILES['join_event']['name']= $files['join_event']['name'][$key];
								$_FILES['join_event']['type']= $files['join_event']['type'][$key];
								$_FILES['join_event']['tmp_name']= $files['join_event']['tmp_name'][$key];
								$_FILES['join_event']['error']= $files['join_event']['error'][$key];
								$_FILES['join_event']['size']= $files['join_event']['size'][$key];
								
								$event = $this->uploadData('join_event','join_event_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'document'
								// ));
								array_push($join_event,$event);
								
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
								$_FILES['join_profile']['name']= $files['join_profile']['name'][$key];
								$_FILES['join_profile']['type']= $files['join_profile']['type'][$key];
								$_FILES['join_profile']['tmp_name']= $files['join_profile']['tmp_name'][$key];
								$_FILES['join_profile']['error']= $files['join_profile']['error'][$key];
								$_FILES['join_profile']['size']= $files['join_profile']['size'][$key];
								
								$profile = $this->uploadData('join_profile','join_profile_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'document'
								// ));
								array_push($join_profile,$profile);
								
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
								$_FILES['join_image']['name']= $files['join_image']['name'][$key];
								$_FILES['join_image']['type']= $files['join_image']['type'][$key];
								$_FILES['join_image']['tmp_name']= $files['join_image']['tmp_name'][$key];
								$_FILES['join_image']['error']= $files['join_image']['error'][$key];
								$_FILES['join_image']['size']= $files['join_image']['size'][$key];
								
								$join_imag = $this->uploadData('join_image','join_image_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'document'
								// ));
								array_push($join_image,$join_imag);
								
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
								$_FILES['join_event']['name']= $files['join_event']['name'][$key];
								$_FILES['join_event']['type']= $files['join_event']['type'][$key];
								$_FILES['join_event']['tmp_name']= $files['join_event']['tmp_name'][$key];
								$_FILES['join_event']['error']= $files['join_event']['error'][$key];
								$_FILES['join_event']['size']= $files['join_event']['size'][$key];
								
								$event = $this->uploadData('join_event','join_event_'.$key,$path);
								// $imageupload = \Cloudinary\Uploader::upload($value,array(
								// 	"folder"=>'document'
								// ));
								array_push($join_event,$event);
								
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
			$insert_id = $this->member_model->saveRegis($data_regis);
			//end save user detail

			//all product save
		

			$status = true;
			$product_name = $this->input->post('product_name');


			if(!empty($product_name)){
				
				foreach ($product_name as $key => $value) {
					if(!empty($value)){
						
						//upload image  product_img
						
						$product_img = array();
						// $files = $_FILES;
						if ( !empty( $_FILES['product_img']['name'][$key+1]) && !is_null($_FILES['product_img']['name'][$key+1])){
							// //upload data
							$image = $_FILES['product_img']['tmp_name'][$key+1];
							foreach ($image as $keys => $value) {
								if (strlen($value) > 0){
									$_FILES['product_img']['name']= $files['product_img']['name'][$key+1][$keys];
									$_FILES['product_img']['type']= $files['product_img']['type'][$key+1][$keys];
									$_FILES['product_img']['tmp_name']= $files['product_img']['tmp_name'][$key+1][$keys];
									$_FILES['product_img']['error']= $files['product_img']['error'][$key+1][$keys];
									$_FILES['product_img']['size']= $files['product_img']['size'][$key+1][$keys];
									
									$img = $this->uploadData('product_img','product_img_'.$keys,$path);
									// $imageupload = \Cloudinary\Uploader::upload($value,array(
									// 	"folder"=>'product'
									// ));
									array_push($product_img,$img);
									
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
									$_FILES['product_closeup']['name']= $files['product_closeup']['name'][$key+1][$keys];
									$_FILES['product_closeup']['type']= $files['product_closeup']['type'][$key+1][$keys];
									$_FILES['product_closeup']['tmp_name']= $files['product_closeup']['tmp_name'][$key+1][$keys];
									$_FILES['product_closeup']['error']= $files['product_closeup']['error'][$key+1][$keys];
									$_FILES['product_closeup']['size']= $files['product_closeup']['size'][$key+1][$keys];
									
									$closeup = $this->uploadData('product_closeup','product_closeup_'.$keys,$path);
									// $imageupload = \Cloudinary\Uploader::upload($value,array(
									// 	"folder"=>'product'
									// ));
									array_push($product_closeup,$closeup);
									
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
									$_FILES['product_packshot']['name']= $files['product_packshot']['name'][$key+1][$keys];
									$_FILES['product_packshot']['type']= $files['product_packshot']['type'][$key+1][$keys];
									$_FILES['product_packshot']['tmp_name']= $files['product_packshot']['tmp_name'][$key+1][$keys];
									$_FILES['product_packshot']['error']= $files['product_packshot']['error'][$key+1][$keys];
									$_FILES['product_packshot']['size']= $files['product_packshot']['size'][$key+1][$keys];
									
									$packshot = $this->uploadData('product_packshot','product_packshot_'.$keys,$path);
									// $imageupload = \Cloudinary\Uploader::upload($value,array(
									// 	"folder"=>'product'
									// ));
									array_push($product_packshot,$packshot);
									
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
									$_FILES['product_pdf']['name']= $files['product_pdf']['name'][$key+1][$keys];
									$_FILES['product_pdf']['type']= $files['product_pdf']['type'][$key+1][$keys];
									$_FILES['product_pdf']['tmp_name']= $files['product_pdf']['tmp_name'][$key+1][$keys];
									$_FILES['product_pdf']['error']= $files['product_pdf']['error'][$key+1][$keys];
									$_FILES['product_pdf']['size']= $files['product_pdf']['size'][$key+1][$keys];
									
									$pdf = $this->uploadData('product_pdf','product_pdf_'.$keys,$path);
									// $imageupload = \Cloudinary\Uploader::upload($value,array(
									// 	"folder"=>'product_pdf'
									// ));
									array_push($product_pdf,$pdf);
									
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
							'reg_id' => $insert_id['id'],
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
			if (@$insert_id['show']){
				$prj = $this->staff_model->getProject($this->input->post('project_id'));
				
				$data_email = array();
				$url =  site_url('member');
				$data_email['to'] = $this->input->post('email');
				$data_email['subject'] = 'ท่านได้สมัครเข้าร่วมงาน Chiang Mai Design Week 2018';
				$content = array(
					'name' => $this->input->post('firstname') .' '.$this->input->post('lastname'),
					'content' => 'เทศกาลขอขอบคุณที่สมัครเข้าร่วมจัดกิจกรรม '.$prj[0]->project_name.'<br>คุณสามารถติดตามสถานะการสมัครและผลการพิจารณาได้ โดยกดที่ลิ้งค์ดังนี้ <br/>',
					'link' => $url,
					'show_link'=>true
				);
				$this->load->model('register/register_model');
				if($this->register_model->sendEmail($data_email,$content)){
					$this->session->set_flashdata('msg', 'true');
				}
			}
		
			redirect(base_url('member'));
			// if($this->member_model->sendEmail($this->input->post('email'))){
			// 	$this->session->set_flashdata('msg', 'true');
			// 	redirect(base_url('member'));
				
			// }else{
			// 	$this->session->set_flashdata('msg', 'false');
			// 	redirect(base_url('member'));
			// }
		}
		
	}

	
	// call back Allow dashes to numbers 
	function numeric_dash ($num) {
		return ( ! preg_match("/^([0-9-\s])+$/D", $num)) ? FALSE : TRUE;
	}

	//history regis members
	function event_log()
	{
		$this->config->set_item('title','ประวัติ');

		$id = $this->session->userdata('sesUserID');

		$data['project'] = $this->member_model->getEventLog($id);

		$this->setView('event_log',$data);
        $this->publish();
	}

	function member_profile(){

		// load the cloudinary dummy library
		// $this->load->library('cloudinarylib');
		//  $data['image'] = cl_image_tag("profile/flej8ut3cueyra8cfu2b", array( "alt" => "Sample Image" ));
		// // $data['imageupload'] = cloudinary_url("https://kojiflowers.com/wp-content/uploads/2017/01/vide-1050x478.png");
		// // $data['imageupload'] = \Cloudinary\Uploader::upload("https://kojiflowers.com/wp-content/uploads/2017/01/vide-1050x478.png",array(
		// // 	"folder"=>'profile'
		// // ));

		// print_r($data);die();

		$this->setView('member_profile');
        $this->publish();
	}

	public function preview($project_id,$user_id){
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


		$this->config->set_item('title','แสดงผลข้อมูลผู้สมัคร : '.$data['project'][0]->project_name);
		$this->template->javascript->add('assets/modules/member/preview.js');
		$this->setView('preview_show',$data);
        $this->publish();

	}

	public function savepreview(){
	
		$data = array();
		if (!empty($this->input->post('showarea_type'))){
			$regis['project_id'] = $this->input->post('project_id');
			$regis['user_id'] = $this->session->userdata('sesUserID');
			$regis['showarea_type'] = $this->input->post('showarea_type');
			$regis['show_type'] = $this->input->post('show_type');
			$regis['area_type'] = $this->input->post('area_type');

			$this->member_model->saveRegis($regis);
		}
		if (!empty($this->input->post('radio1'))){
			$data['project_id'] = $this->input->post('project_id');
			$data['user_id'] = $this->session->userdata('sesUserID');
			$data['answer_1'] = $this->input->post('radio1');
			$data['answer_2'] = $this->input->post('radio2');
			$data['answer_3'] = $this->input->post('radio3');
			$data['answer_4'] = $this->input->post('radio4');
			$data['answer_5'] = $this->input->post('radio5');
			$data['answer_6'] = $this->input->post('radio6');
			$data['answer_7'] = $this->input->post('radio7');
			$this->member_model->insertQuiz($data);
			redirect(base_url('member'));
		}
		redirect(base_url('member'));
		
	}
	public function testupload(){
		$this->load->helper(array('form', 'url'));
		$this->load->view('upload');

	}


	public function saveimg()
	{

		$path = $this->uploadData('userfile','product','./uploads/34/');
		echo $path;
		// $config['upload_path'] = './uploads/';
		
		// $config['allowed_types'] = 'jpg|jpeg';
		// $config['encrypt_name'] = TRUE;
		// // $config['max_size'] = '1024';
		// // $config['max_width'] = '1024';
		// // $config['max_height'] = '1024';
		// $config['remove_spaces'] = TRUE;

		// $this->load->library("upload");
		// $this->upload->initialize($config); 

		// if ($this->upload->do_upload('userfile')) {
		// 	// Files Upload Success
		// 	echo "OK Good";
		// 	var_dump($this->upload->data());
			 
		// } else {
		// // Files Upload Not Success!!
		// $errors = $this->upload->display_errors();
		// echo $errors;
			
		// }
	}

	public function uploadData($file,$file_name,$path){


		if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|jpeg';
		// $config['encrypt_name'] = TRUE;
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


}
