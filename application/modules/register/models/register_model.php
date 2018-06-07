<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_model extends MY_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->database();

    }

    public function insertMember($data){

        return $this->db->insert('tcdc_member',$data);

    }

    //send confirm mail
    public function sendEmail($receiver){

        $from = "TCDC.Chiangmai@gmail.com";    //senders email address
        $subject = 'ยืนยันการลงทะเบียน Chiang Mai Design Week 2017';  //email subject

        $encode_rec = $this->encrypt->encode($receiver);
        //sending confirmEmail($receiver) function calling link to the user, inside message body
        $message = 'ถึง ผู้ใช้งาน,<br><br> กรุณาคลิกเพื่อยืนยันการลงทะเบียน Chiang Mai Design Week 2017<br><br>
        <a href=\''.base_url($this->uri->segment(1)).'/register/confirmEmail?encode='.$encode_rec.'\'>คลิกที่นี่เพื่อยืนยันการลงทะเบียน</a><br><br>ขอบคุณ';
        
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
      //  $this->email->set_header('Content-type', 'text/html');
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);
        
         if($this->email->send()){
        //     //for testing
        //     echo "sent to: ".$receiver."<br>";
        //     echo "from: ".$from. "<br>";
        //     echo "protocol: ". $config['protocol']."<br>";
        //     echo "message: ".$message;
             return true;
         }else{
            show_error($this->email->print_debugger());
            return false;
         }
    }

    //activate account
    public function verifyEmail($data){
       
        $email = $this->encrypt->decode($data);

        //check email 
        $num = $this->db->query("SELECT * FROM tcdc_member WHERE email = ".'\''.$email.'\''."AND user_active = '0'");
        if($num->num_rows() > 0){
            
            $data = array('user_active' => '1');
            $this->db->where('email',$email);
            $this->db->update('tcdc_member', $data);    //update status as 1 to make active user
            return true;
        }
        return false;
      
    }


}
