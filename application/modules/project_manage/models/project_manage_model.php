<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class project_manage_model extends MY_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->database();

    }

    function saveAppv($data){
    	$this->db->where('reg_id',$data['reg_id']);
    	$this->db->set('reg_status',$data['reg_status']);
    	$this->db->set('reject_detail',$data['reject_detail']);
    	$this->db->set('approve_user',$data['user_app']);
    	$this->db->set('approve_date',date('Y-m-d'));
    	$this->db->update('tcdc_prj_register');

    	return $data['reg_id'];
    }

     public function sendEmail($data){

        return true;

        $from = "TCDC.Chiangmai@gmail.com";    //senders email address
        $subject = 'ผลการสมัครเข้าร่วม '.$data['prj_name'];  //email subject

        if($data['reg_status']){
            $message = 'ถึง ผู้ใช้งาน,<br><br> ผลการสมัครเข้าร่วม "'.$data['prj_name'].'"<br><span style="color:green"> ผ่านการคัดเลือก </span><br>ขอบคุณ';
        }else{
            $message = 'ถึง ผู้ใช้งาน,<br><br> ผลการสมัครเข้าร่วม "'.$data['prj_name'].'"<br><span style="color:red"> ไม่ผ่านการคัดเลือก </span><br>เนื่องจาก : '.htmlspecialchars($data['reject_detail']).'<br><br>ขอบคุณ';
        }
        
        //config email settings
        $config['useragent'] = '\''.base_url().'\'';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'TCDC@CMDW';  //sender's password uupsqwbvahhjdhdu
        $config['mailtype'] = 'html';
        // $config['charset'] = 'UTF-8';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 
        
        $this->load->library('email', $config);
        $this->email->initialize($config);
        //send email
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        //$this->email->set_header('Content-type', 'text/html');
        $this->email->from($from);
        $this->email->to($data['email_receive']);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            return true;
        }else{
            show_error($this->email->print_debugger());
            return false;
        }
    }
}