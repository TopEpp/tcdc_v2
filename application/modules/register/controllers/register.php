<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('register_model');
		$this->session->keep_flashdata('msg');
	
	}

	public function index()
	{	
		// get province
		$query = $this->db->query('SELECT * FROM tcdc.std_area_province');
		$data['province'] = $query->result();
		
		$this->load->view('register',$data);
		
	}

	public function signup()
	{
		$data = array();	
		// get province
		$query = $this->db->query('SELECT * FROM tcdc.std_area_province');
		$data['province'] = $query->result();
		// #tab1
		$this->form_validation->set_rules('firstname', 'ชื่อจริง', 'trim|required');
		$this->form_validation->set_rules('lastname', 'นามสกุลจริง', 'trim|required');
		$this->form_validation->set_rules('email','อีเมล์', 'trim|required|valid_email|callback_email_check');
        $this->form_validation->set_rules('email_again', 'ยืนยันอีเมล์', 'trim|required|valid_email|matches[email]');
		$this->form_validation->set_rules('password','รหัสผ่าน', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('password_again', 'ยืนยันรหัสผ่าน', 'trim|required|min_length[8]|matches[password]');
		// #tab2
		$this->form_validation->set_rules('address','ที่อยู่', 'trim|required');
		$this->form_validation->set_rules('subdistrict','แขวง/ตำบล', 'trim|required');
		$this->form_validation->set_rules('district','อำเภอ', 'trim|required');
		$this->form_validation->set_rules('province','จังหวัด', 'required');
		$this->form_validation->set_rules('zipcode','รหัสไปรณีย์', 'trim|required|min_length[5]|max_length[5]|callback_numeric_dash');

	


		if($this->form_validation->run() == false){
			$this->load->view('register',$data);
            
        }else{

			//insert data  
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'password' =>  $this->encrypt->encode($this->input->post('password')),
            	'address' => $this->input->post('address'),
				'subdistrict' => $this->input->post('subdistrict'),
				'district' => $this->input->post('district'),
				'province' => $this->input->post('province'),
				'zipcode' => $this->input->post('zipcode')
			);     

            if($this->register_model->insertMember($data)){
                
                //send confirm mail
                if($this->register_model->sendEmail($this->input->post('email'))){
                    //redirect('Login_Controller/index');
                    $msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                     $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please confirm the mail that has been sent to your email. </div>');
                    // $this->load->view('header');
					//  $this->load->view('welcome/index');
					 redirect(base_url());
                    // $this->load->view('footer');
                }else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
					redirect(base_url());
                    //$error = "Error, Cannot insert new user details!";
                    // $this->load->view('header');
                    // $this->load->view('signup_view');
                    // $this->load->view('footer');
                }
                
                
            }
			// if (isset( $_FILES['profile_img'])){
			// 	print_r($_FILES['profile_img']);
			// }
			// $config = array(
			// 	'upload_path' => "./uploads/",
			// 	'allowed_types' => "gif|jpg|png|jpeg|pdf",
			// 	'overwrite' => TRUE,
			// 	'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 	'max_height' => "768",
			// 	'max_width' => "1024"
			// );
		
		
		}
	}

	public function confirmEmail()
	{
		//mearge string 
		$hashcode = $this->input->get('encode');
		$text = str_replace(' ', '+', $hashcode);

		if($this->register_model->verifyEmail($text)){
	
			$this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
			redirect(base_url());
		}else{

			$this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
			redirect(base_url());
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

	// call back Allow dashes to numbers 
	function numeric_dash ($num) {
		return ( ! preg_match("/^([0-9-\s])+$/D", $num)) ? FALSE : TRUE;
	  }
    
        

	
    
}
