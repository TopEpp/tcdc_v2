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

    function sendMail($data){
        $this->load->library('mail');

        $subject = 'ผลการสมัครเข้าร่วม "'.$data['prj_name'].'"';  //email subject

        if($data['reg_status']){
            $message = 'ถึง ผู้ใช้งาน,<br><br> ผลการสมัครเข้าร่วม "'.$data['prj_name'].'"<br><span style="color:green"> ผ่านการคัดเลือก </span><br>ขอบคุณ';
        }else{
            $message = 'ถึง ผู้ใช้งาน,<br><br> ผลการสมัครเข้าร่วม "'.$data['prj_name'].'"<br><span style="color:red"> ไม่ผ่านการคัดเลือก </span><br>เนื่องจาก : '.htmlspecialchars($data['reject_detail']).'<br><br>ขอบคุณ';
        }

        $conf=array(
            'Host'=>"ssl://smtp.gmail.com"//ชื่อโดเมน ควรใส่ไว้ใน config
            ,'Username'=>"TCDC.Chiangmai@gmail.com"//ชื่อโดเมน ควรใส่ไว้ใน config class
            ,'Password'=>"TCDC@CMDW"//ชื่อโดเมน ควรใส่ไว้ใน config class
            ,'from'=>"TCDC.Chiangmai@gmail.com"
            ,'fromename'=>"chiangmaidesignweek"
            ,'subject'=>$subject
            ,'message'=>""//ข้อความกรณีไม่ใช้ไฟล์ template
            ,'to'=>'natchapol.prms@gmail.com'
            ,'toname'=>'Top'
            ,'template'=>array(// กรณใช้ template ถ้าไม่ใช้ให้เอาออก
                'name'=>"/tcdc_cmdw/tcdc_v2/assets/mailtemplate/tempplate.html",
                'param'=>array(
                    '{Header}'=>"jigsawinnovation",
                    '{Title}'=>"สวัสดีครับเรามีข่าวดีๆมาแนะนำ",
                    '{Content}'=>'<h1>Free pack of iPhone 5S in-hand mockups</h1><h4 style="color:#666">Mock up your app designs in real world settings.</h4><p style="color:#999">This free presentation pack contains 5 mockups of the silver/white iPhone 5S in real-world settings. Included are images of the phone being held in both portrait and landscape orientations for different types of apps and screenshots. To use, simply double click the Smart Object in Photoshop, paste in your portrait or landscape screenshot and hit save.</p>',
                    '{Footer}'=>"<a href='www.jigsawinnovation.com'>www.jigsawinnovation.com</a>",
                )
            )

        );
        $this->mail->Setup($conf);
        $result=$this->mail->Send();
        // print_r($result);
        return true;
    }

    function saveRegis($reg_id,$data_regis){
        $this->db->where('reg_id',$reg_id);
        $this->db->update('tcdc_prj_register',$data_regis);

        return $reg_id;
    }

    public function saveProduct($data)
    {
       
        $query = $this->db->query('SELECT * FROM tcdc_product WHERE reg_id = '.$data['reg_id'].' AND '.'product_num = '.$data['product_num']);
        
        if( $query->num_rows() > 0){
            $this->db->where('reg_id',$data['reg_id']);
            $this->db->where('product_num',$data['product_num']);
            return $this->db->update('tcdc_product',$data);
        }
        
        return $this->db->insert('tcdc_product',$data);
    }
}