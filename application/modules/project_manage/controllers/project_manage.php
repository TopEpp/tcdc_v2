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
		
		$project_type = $this->input->post('project_type');
		
		switch ($project_type) {
			case 1:
			
				$this->form_validation->set_rules('target_type[]','เป้าหมายหลัก ในการจัดแสดงผลงาน', 'trim|required');
				$this->form_validation->set_rules('product_type[]','ประเภทผลงาน', 'trim|required');
				$this->form_validation->set_rules('product_name[]','ชื่อผลงาน', 'trim|required');
				$this->form_validation->set_rules('material[]','วัสดุ', 'trim|required');
				$this->form_validation->set_rules('product_firstname[]','ชื่อผู้ออกแบบ', 'trim|required');
				$this->form_validation->set_rules('product_lastname[]','นามสกุลผู้ออกแบบ', 'trim|required');
				break;
			case 2:
			
				$this->form_validation->set_rules('pop_shop_name','ชื่อร้าน', 'trim|required');
				$this->form_validation->set_rules('pop_select','ประเภทของที่ขาย', 'trim|required');
				break;
			case 3:
				$this->form_validation->set_rules('work_talk_type','ประเภทกิจกรรม', 'trim|required');
				$this->form_validation->set_rules('work_talk_title_th','หัวข้อการเสวนา / เวิร์กช็อป (ภาษาไทย)', 'trim|required');
				$this->form_validation->set_rules('work_talk_title_en','หัวข้อการเสวนา / เวิร์กช็อป (ภาษาอังกฤษ)', 'trim|required');
				$this->form_validation->set_rules('work_talk_name_th','ชื่อวิทยากร (ภาษาไทย)', 'trim|required');
				$this->form_validation->set_rules('work_talk_name_en','ชื่อวิทยากร (ภาษาอังกฤษ)', 'trim|required');
				break;
			case 4:
				$this->form_validation->set_rules('event_type','ประเภทกิจกรรม', 'trim|required');
				$this->form_validation->set_rules('event_name_th','ชื่อกิจกรรม (ภาษาไทย)', 'trim|required');
				$this->form_validation->set_rules('event_name_en','ชื่อกิจกรรม (ภาษาอังกฤษ)', 'trim|required');
			
				break;
			default:
				$this->form_validation->set_rules('product_type[]','ประเภทผลงาน', 'trim|required');
				$this->form_validation->set_rules('product_name[]','ชื่อผลงาน', 'trim|required');
				$this->form_validation->set_rules('material[]','วัสดุ', 'trim|required');
				$this->form_validation->set_rules('product_firstname[]','ชื่อผู้ออกแบบ', 'trim|required');
				$this->form_validation->set_rules('product_lastname[]','นามสกุลผู้ออกแบบ', 'trim|required');
				break;
		}
		


		if($this->form_validation->run() == false){

		}else{
			$id = $this->session->userdata('sesUserID');
			
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
					$data_regis['pop_product_type'] = $this->input->post('pop_product_type');
					$data_regis['pop_food_type'] = $this->input->post('pop_food_type');
					
					// pop_img flie upload
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
					$data_regis['work_talk_name_en'] = $this->input->post('work_talk_name_en');
					$data_regis['work_talk_detail'] = $this->input->post('work_talk_detail');

					$data_regis['join_number'] = $this->input->post('join_number');
					$data_regis['join_property'] = $this->input->post('join_property');
					$data_regis['join_start_date'] = $start_date;
					$data_regis['join_finish_date'] =  $finish_date;
					$data_regis['join_start_time'] = $this->input->post('join_start_time');
					$data_regis['join_finish_time'] = $this->input->post('join_finish_time');

					// join_image
					$join_image = array();
					foreach (@$_FILES['join_image']['tmp_name'] as $key => $value) {
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
					$data_regis['event_name_th'] = $this->input->post('event_name_th');
					$data_regis['event_name_en'] = $this->input->post('event_name_en');
					$data_regis['event_detail'] = $this->input->post('event_detail');
					$data_regis['join_number'] = $this->input->post('join_number');
					$data_regis['join_property'] = $this->input->post('join_property');
					$data_regis['join_start_date'] = $start_date;
					$data_regis['join_finish_date'] =  $finish_date;
					$data_regis['join_start_time'] = $this->input->post('join_start_time');
					$data_regis['join_finish_time'] = $this->input->post('join_finish_time');
					$data_regis['event_address'] = $this->input->post('event_address');
					$data_regis['event_address_detail'] = $this->input->post('event_address_detail');

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

						
						$status = $this->pm_model->saveProduct($data_product);
						//end save user detail
					}
				}
			}

			if(!$status){
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">ลงทะเบียน สำเร็จ </div>');
				redirect(base_url('project_manage/index/'.$this->input->post('project_id').'/'.$this->input->post('user_id')));
				
			}
		}
		
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

   //      	$url = 'http://www.pitchap.com/project/cmdw/service_mail/send_mail/';
			// // $postString = 'mail_to=' . $data_mail['mail_to'] . '&mail_to_name=' . $data_mail['mail_to_name']. '&message=' . $data_mail['message']. '&subject=' . $data_mail['subject'];

		 //    $post = curl_init();
		 //    $postString = http_build_query($data_mail, '', '/');

		 //    curl_setopt($post, CURLOPT_URL, $url.$postString);
		 //    curl_setopt($post, CURLOPT_POST, count($data_mail));
		 //    curl_setopt($post, CURLOPT_POSTFIELDS, $postString);
		 //    curl_setopt($post, CURLOPT_RETURNTRANSFER, true);

		 //    $result = curl_exec($post);

		 //    curl_close($post);

        	// $this->load->library('cmdw_mail');
        	// if($this->cmdw_mail->sendMail($data_mail)){
        	// if($this->pm_model->sendMail($data)){
        	
        	$this->load->library('mailgun');
			if($this->mailgun->send($data_mail,$content)){ 
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