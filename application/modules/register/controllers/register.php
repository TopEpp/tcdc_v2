<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');		
		$this->load->model('register_model');
		$this->load->model('staff/staff_model');
		$this->session->keep_flashdata('msg');
		$this->session->keep_flashdata('confirm');

		$this->load->library('mailgun');
		
	
	}

	public function index()
	{	
		// get province
		$query = $this->db->query('SELECT * FROM std_area_province GROUP BY name_th ASC');
		$data['province'] = $query->result();
		//get country
		$query = $this->db->query('SELECT * FROM std_countries GROUP BY name ASC ');
		$data['countries'] = $query->result();

		//get status_group
		$query = $this->db->query('SELECT * FROM tcdc_status_group');
		$data['status'] = $query->result();
		$this->load->view('index',$data);
		
	}

	public function signup()
	{


		$data = array();	

		// #tab1
		
		$this->form_validation->set_rules('email','อีเมล', 'trim|required|valid_email|callback_email_check');
        $this->form_validation->set_rules('email_again', 'ยืนยันอีเมล', 'trim|required|valid_email|matches[email]');
		$this->form_validation->set_rules('password','รหัสผ่าน', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('password_again', 'ยืนยันรหัสผ่าน', 'trim|required|min_length[8]|matches[password]');
		// #tab2

		// $this->form_validation->set_rules('job', 'สถานะ', 'trim|required');
		// if ($this->input->post('job_group') == 1){
		// 	$this->form_validation->set_rules('company_num_regis', 'เลขทะเบียนนิติบุคคล', 'trim|required|callback_num_regis');
		// }
		// $this->form_validation->set_rules('id_number', 'รหัสบัตรประชาชน', 'trim|required');
		$this->form_validation->set_rules('prename', 'คำนำหน้า', 'trim|required');
		$this->form_validation->set_rules('firstname', 'ชื่อ', 'trim|required');
		$this->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required');
		$this->form_validation->set_rules('address','บ้านเลขที่', 'trim|required');
		// $this->form_validation->set_rules('village','หมู่บ้าน', 'trim|required');
		$this->form_validation->set_rules('subdistrict','แขวง/ตำบล', 'trim|required');
		$this->form_validation->set_rules('district','อำเภอ', 'trim|required');
		$this->form_validation->set_rules('country','ประเทศ', 'required');
		$this->form_validation->set_rules('province','จังหวัด', 'trim|required');
		$this->form_validation->set_rules('zipcode','รหัสไปรณีย์', 'trim|required|min_length[5]|max_length[5]|callback_numeric_dash');

	


		if($this->form_validation->run() === false){
			// get province
			$query = $this->db->query('SELECT * FROM std_area_province');
			$data['province'] = $query->result();
			//get country
			$query = $this->db->query('SELECT * FROM std_countries');
			$data['countries'] = $query->result();
			$query = $this->db->query('SELECT * FROM tcdc_status_group');
			$data['status'] = $query->result();

			$data['prename'] = $this->input->post('prename_detail');
			
			 $this->load->view('index',$data);
            
        }else{

			$imageupload = '';
			if (isset( $_FILES['profile_img']['name']) && !empty( $_FILES['profile_img']['name'])){
				//upload data
				$imageupload = \Cloudinary\Uploader::upload($_FILES['profile_img']['tmp_name'],array(
					"folder"=>'profile'
				));
			}
			//insert data  
            $data = array(
				// 'id_number' => $this->input->post('id_number'),
				'prename' => $this->input->post('prename'),
				'prename_detail' => $this->input->post('prename_detail'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'birthday' => $this->input->post('birthday'),
				'month_of_birth' => $this->input->post('month_of_birth'),
				'year_of_birth' => $this->input->post('year_of_birth'),
				'password' =>  $this->encrypt->encode($this->input->post('password')),
				'address' => $this->input->post('address'),
				'village' => $this->input->post('village'),
				'lane' => $this->input->post('lane'),
				'road' => $this->input->post('road'),
				'subdistrict' => $this->input->post('subdistrict'),
				'district' => $this->input->post('district'),
				'province' => $this->input->post('province'),
				'country' => $this->input->post('country'),
				'zipcode' => $this->input->post('zipcode'),
				'rec_create_date' => date('Y-m-d'),
				'job' => $this->input->post('job'),

				// //ชั่วคราว
				'user_active' => '1'
				
				
			);     

			if($imageupload){
				$data['profile_img'] = $imageupload['public_id'];
			}

			if (!empty($this->input->post('job_type_one'))){
				$data['job_type'] = $this->input->post('job_type_one');
			}
			if (!empty($this->input->post('job_type_two'))){
				$data['job_type'] = $this->input->post('job_type_two');
			}

			
			//company

			$data_company = [
				// //group 1
				'company_name' => $this->input->post('company_name'),
				'company_location' => $this->input->post('company_location'),

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
			];
		
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

            if($this->staff_model->saveCreateUser($data,$data_company)){
				
					$msg['msg'] = "คุณสร้างบัญชีผู้ใช้งานสำเร็จแล้ว";
					$msg['msg2'] = "ยินดีต้อนรับสู่งานเทศกาลงานออกแบบเชียงใหม่";
					$this->session->set_flashdata('confirm',$msg);
					redirect('welcome/index');

				// send mail to api
				// $data['to'] = $this->input->post('email');
				// $data['subject'] = 'ยืนยันการลงทะเบียน Chiangmai Design Week 2018';
				// $name = $this->input->post('firstname').' '.$this->input->post('lastname');
				// $encode_rec = $this->encrypt->encode($data['to']);
				// $link = base_url($this->uri->segment(1)).'/register/confirmEmail?encode='.$encode_rec;
				// $content = array(
				// 	'name' => $name,
				// 	'content' => 'ยินดีต้อนรับเข้าสู่เทศกาลงานออกแบบเชียงใหม่ ขอบคุณสำหรับการลงทะเบียน <br>คุณสามารถกดที่ลิงค์ด้านล่างเพื่อเข้าสู่เว็บไซต์ <br/>',
				// 	'link' => $link
				// );
	
				
				// // send confirm mail
				// echo $this->mailgun->send($data,$content);
				// die();
                // if($this->mailgun->send($data,$content)){
				// 	$msg['msg'] = "ลงทะเบียนสำเร็จแล้ว กรุณายืนยันการลงทะเบียนที่  Email:";
				// 	$msg['msg2'] = $this->input->post('email');
				// 	$this->session->set_flashdata('confirm',$msg);
				// 	// $msg = "ลงทะเบียนสำเร็จแล้ว กรุณายืนยันการลงทะเบียนที่  Email: ".$this->input->post('email');
				// 	// $this->session->set_flashdata('msg', $msg);
				// 	redirect('welcome/index');

                // }else{
				// 	$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">ลงทะเบียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง.</div>');
				// 	redirect('register/index');
            
                // }
                
                
            }else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">ลงทะเบียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง.</div>');
					redirect('welcome/index');
			}
			
		
		
		}
	}

	public function confirmEmail()
	{
		//mearge string 
		$hashcode = $this->input->get('encode');
		$text = str_replace(' ', '+', $hashcode);

		if($this->register_model->verifyEmail($text)){
	
			$this->session->set_flashdata('verify', '<div class="alert alert-success text-center">ยืนยันการลงทะเบียนสำเร็จ. กรุณาลงชื่อเพื่อเข้าใช้งานระบบ</div>');
			redirect(base_url());
		}else{

			$this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">ยืนยันการลงทะเบียนไม่สำเร็จ. กรุณาลงทะเบียนอีกครั้งหรือติดต่อเจ้าหน้าที่</div>');
			redirect(base_url());
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

	//call_back check email uniqe
	function num_regis()
	{

		$num = $this->input->post('company_num_regis');
		$query = $this->db->query('SELECT * FROM tcdc_member_company where company_num_regis ='.'\''.$num.'\''  );
	
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

	// call back Allow dashes to numbers 
	function numeric_dash ($num) {
		return ( ! preg_match("/^([0-9-\s])+$/D", $num)) ? FALSE : TRUE;
	  }
	

	//   function test_mail(){
	// 	$this->load->library('mailgun');
	// 	$this->mailgun->send('','');
	//   }
	
        
   
}
