<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends MY_Controller 
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
		$data['status'] = $this->member_model->getStatusRegis();
		$data['news'] = $this->staff_model->getNews();
		
		//check user first login
		$user_id = $this->session->userdata('sesUserID');
		$data['first_login'] = $this->member_model->getUserLogin($user_id);

		$this->setView('index',$data);
		$this->publish();
	}

	//form register profile
	public function event_form($id = '')
	{
	

		$user_id = $this->session->userdata('sesUserID');
		if(!empty($id)){
			// get province
			$query = $this->db->query('SELECT * FROM tcdc.std_area_province');
			$data['province'] = $query->result();
			//get country
			$query = $this->db->query('SELECT * FROM tcdc.std_countries');
			$data['countries'] = $query->result();

			$data['project'] = $this->staff_model->getProject($id);
			
			$data['member'] = $this->staff_model->getUsers($user_id);
			$data['regis'] = $this->member_model->getUserRegis($id,$user_id);
			$this->template->javascript->add('assets/modules/member/event_form.js');
			
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
		//validate form
		$this->form_validation->set_rules('email','อีเมล์', 'trim|required|valid_email');

		//company
		if ( $this->input->post('radio2') == 1){
			$this->form_validation->set_rules('coordinator_firstname','ชื่อผู้ประสานงาน', 'trim|required');
			$this->form_validation->set_rules('coordinator_lastname','นามสกุลประสานงาน', 'trim|required');
			$this->form_validation->set_rules('coordinator_phone','เบอร์โทรประสานงาน', 'trim|required');
		}

		$this->form_validation->set_rules('product_type[]','ประเภทผลงาน', 'trim|required');
		$this->form_validation->set_rules('product_name[]','ชื่อผลงาน', 'trim|required');
		$this->form_validation->set_rules('material[]','วัสดุ', 'trim|required');
		$this->form_validation->set_rules('product_firstname[]','ชื่อผู้ออกแบบ', 'trim|required');
		$this->form_validation->set_rules('product_lastname[]','นามสกุลผู้ออกแบบ', 'trim|required');


		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center">'.validation_errors().'. </div>' );
			redirect($this->input->post('redirect'), "location");
		}
		else{
			$id = $this->session->userdata('sesUserID');
			//save user
			$data_user = array(
				'prename' => $this->input->post('prename'),
				'prename_detail' => $this->input->post('prename_detail'),
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
				'job_detail' => $this->input->post('job_detail'),
				'job_type' => $this->input->post('job_type'),
				'brand' => $this->input->post('brand'),
				'website' => $this->input->post('website'),
				'facebook' => $this->input->post('facebook'),
				'lineid' => $this->input->post('lineid'),
				
			);
			//end user

			//company 
			$data_company = array(
				'company_type' => $this->input->post('radio1'),
				'company_name' => $this->input->post('company_name'),
				'company_address' => $this->input->post('company_address'),
				'company_province' => $this->input->post('company_province'),
				'company_district' => $this->input->post('company_district'),
				'company_subdistrict' => $this->input->post('company_subdistrict'),
				'company_zipcode' => $this->input->post('company_zipcode')

			);
			
			//end company

			// coordinator
			$data_coordinator = array(
				'coordinator_type' => $this->input->post('radio2'),
				'coordinator_prename' => $this->input->post('coordinator_prename'),
				'coordinator_firstname' => $this->input->post('coordinator_firstname'),
				'coordinator_lastname' => $this->input->post('coordinator_lastname'),
				'coordinator_phone' => $this->input->post('coordinator_phone'),
				'coordinator_email' => $this->input->post('coordinator_email'),
				'coordinator_address' => $this->input->post('coordinator_address'),
				'coordinator_province' => $this->input->post('coordinator_province'),
				'coordinator_district' => $this->input->post('coordinator_district'),
				'coordinator_subdistrict' => $this->input->post('coordinator_subdistrict'),
				'coordinator_zipcode' => $this->input->post('coordinator_zipcode'),
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
				'reg_date' => date('Y-m-d H:i:s'),
				'reg_status' => '1',
				'target_type' => $this->input->post('target_type'),
				'target_type_detail' => $this->input->post('target_type_detail'),
				'showarea_type' => $this->input->post('showarea_type'),
				'show_type' => $this->input->post('show_type'),
				'area_type' => $this->input->post('area_type')
			);
			//end data register
		
			//save user detail
			$insert_id = $this->member_model->saveRegis($data_regis);
			//end save user detail

			//all product save
			$status = false;
			$product_name = $this->input->post('product_name');
		
			if(!empty($product_name)){
				
				foreach ($product_name as $key => $value) {
					if(!empty($value)){
						
						//upload image  product_img
						$product_img = array();
						if ( !empty( $_FILES['product_img']['name'][$key+1]) && is_null($_FILES['product_img']['name'][$key+1])){
							//upload data
							$image = $_FILES['product_img']['tmp_name'][$key+1];
							foreach ($image as $keys => $value) {
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'product'
								));
								array_push($product_img,$imageupload['public_id']);
							}
							$product_img = implode(",",$product_img);
						}

					
						//end upload product_img

						//upload image  product_closeup
						$product_closeup = array();
						if ( !empty( $_FILES['product_closeup']['name'][$key+1]) && is_null($_FILES['product_closeup']['name'][$key+1]) ){
							//upload data
							$image = $_FILES['product_closeup']['tmp_name'][$key+1];
							foreach ($image as $keys => $value) {
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'product'
								));
								array_push($product_closeup,$imageupload['public_id']);
							}
							$product_closeup = implode(",",$product_closeup);
						}

						
						//end upload product_closeup

						//upload image  product_packshot
						$product_packshot = array();
						if (!empty( $_FILES['product_packshot']['name'][$key+1])&& is_null($_FILES['product_packshot']['name'][$key+1])  ){
							//upload data
							$image = $_FILES['product_packshot']['tmp_name'][$key+1];
							foreach ($image as $keys => $value) {
								$imageupload = \Cloudinary\Uploader::upload($value,array(
									"folder"=>'product'
								));
								array_push($product_packshot,$imageupload['public_id']);
							}
							$product_packshot = implode(",",$product_packshot);
						}

						
						//end upload product_packshot

						$product_date = '';
						if (!empty($this->input->post('product_date')[$key])){
							$dates = explode('/',$this->input->post('product_date')[$key]);
							$product_date = $dates[2].'-'.$dates[0].'-'.$dates[1];
						}
						

						$data_product = array(
							'reg_id' => $insert_id,
							'product_num' => $key,
							'product_type' =>  $this->input->post('product_type')[$key],
							'product_name' =>  $this->input->post('product_name')[$key],
							'material' =>  $this->input->post('material')[$key],
							'product_date' =>  $product_date,
							'product_width' =>  $this->input->post('product_width')[$key],
							'product_length' =>  $this->input->post('product_length')[$key],
							'product_height' =>  @$this->input->post('product_height')[$key],
							'product_amount' =>  $this->input->post('product_amount')[$key],
							'product_concept' =>  $this->input->post('product_concept')[$key],
							'product_firstname' =>  $this->input->post('product_firstname')[$key],
							'product_lastname' =>  $this->input->post('product_lastname')[$key],
						);
						
						if(!empty($product_img))
							$data_product['product_img'] = $product_img;
						if(!empty($product_closeup))
							$data_product['product_closeup'] = $product_closeup;
						if(!empty($product_packshot))
							$data_product['product_packshot'] = $product_packshot;
						//save user detail
						$status = $this->member_model->saveProduct($data_product);
						//end save user detail
				
					}
					

				}
			}

			if($status){
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">ลงทะเบียน สำเร็จ </div>');
				redirect(base_url('member'));
				
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">ลงทะเบียน ไม่สำเร็จ</div>');
				redirect(base_url('member'));
			}
		}
		
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
}
