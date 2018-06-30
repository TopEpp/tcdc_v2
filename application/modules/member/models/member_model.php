<?php
class member_model extends MY_Model{

    function __construct()
    {
        parent::__construct();
    }

        
    //get status user regis
    public function getStatusRegis($project_id = ''){
        if (!empty($project_id)){
            $this->db->where('project_id',$project_id);
        }
        $this->db->select('project_id,reg_status');
        $this->db->where('user_id',$this->session->userdata('sesUserID'));
        $this->db->from('tcdc_prj_register');
        $query = $this->db->get();
        $data =array();
        foreach ($query->result() as $key => $value) {
            @$data[$value->project_id]->status = 1;
            @$data[$value->project_id]->reg_status = $value->reg_status;
        }
        return $data;
    }

    //get status user regis
    public function getUserRegis($id,$user_id){
        $this->db->select('*');
        $this->db->where('tcdc_prj_register.project_id',$id);
        $this->db->where('tcdc_prj_register.user_id',$user_id);
        $this->db->from('tcdc_prj_register');
        $query = $this->db->get();
        $regis = $query->row_array();
        if (!empty($regis)){
            $this->db->select('*');
            $this->db->where('tcdc_product.reg_id',$regis['reg_id']);
            $this->db->from('tcdc_product');
            $query = $this->db->get();
            $product = $query->result_array();
            
            $regis['product'] = $product;
        }
      
        return $regis;
    }

    //save or edit user regis
    public function saveRegis($data)
    {
        $data_result = array();   
        $query = $this->db->query('SELECT reg_id FROM tcdc_prj_register WHERE project_id = '.$data['project_id'].' AND '.'user_id = '.$data['user_id']);
        
        if( $query->num_rows() > 0){
            $data['approve_date'] = null;
            $id = $query->row();
            $this->db->where('project_id',$data['project_id']);
            $this->db->where('user_id',$data['user_id']);
            $this->db->update('tcdc_prj_register',$data);
            $data_result['id'] = $id->reg_id;
            $data_result['show'] = false;
            return $data_result;
        }
        $data['reg_date'] = date('Y-m-d H:i:s');
        $this->db->insert('tcdc_prj_register',$data);
        $data_result['id'] = $this->db->insert_id();
        $data_result['show'] = true;
        return $data_result;
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

    //get event log members
    public function getEventLog($id)
    {
        $this->db->select('*');
        $this->db->where('user_id',$id);
        $this->db->from('tcdc_prj_register');
        $this->db->join('tcdc_prj','tcdc_prj.project_id = tcdc_prj_register.project_id');
        $this->db->join('tcdc_prj_type','tcdc_prj.project_type = tcdc_prj_type.type_id');
        $query = $this->db->get();
        return $query->result();
    }

    //get User login
    public function getUserLogin($id){
        $this->db->where('user_id',$id);
        $query = $this->db->get('tcdc_member_log');
        return $query->num_rows();
    }

        //send confirm mail
    public function sendEmail($receiver){

            $from = "TCDC.Chiangmai@gmail.com";    //senders email address
            $subject = 'ท่านได้สมัครเข้าร่วมงาน Chiang Mai Design Week 2018';  //email subject
    
            $encode_rec = $this->encrypt->encode($receiver);
            //sending confirmEmail($receiver) function calling link to the user, inside message body
            $message = 'ถึง ผู้ใช้งาน,<br><br> 
                        เราได้รับข้อมูลเข้าร่วม กิจกรรม โครงการเชียงใหม่วิถีไทย ประจำปี 2561  	Showcase/Exhibitions เรียบร้อยแล้ว
                    <br><br>ขอบคุณ';
            
            //config email settings
            $config['useragent'] = '\''.base_url().'\'';
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = $from;
            $config['smtp_pass'] = 'TCDC@CMDW';  //sender's password uupsqwbvahhjdhdu
            $config['mailtype'] = 'html';
            //  $config['charset'] = 'UTF-8';
            $config['smtp_crypto'] = 'security'; //can be 'ssl' or 'tls' for example
            $config['wordwrap'] = 'TRUE';
            $config['newline'] = "\r\n"; 
            
            $this->load->library('email');
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

        public function getAlert($id){
            
            $this->db->select('*');
            $this->db->from('tcdc_prj_register');
            // $this->db->where('reg_status','0');
            $this->db->where('user_id',$id);
            $this->db->where('reject_detail is not null',null,false);
            $this->db->where('approve_date is not null',null,false);
            $query = $this->db->get();
            return $query->result();
        }

        public function insertQuiz($data){
            $query = $this->db->query('SELECT quiz_id FROM tcdc_quiz WHERE project_id = '.$data['project_id'].' AND '.'user_id = '.$data['user_id']);
        
            if( $query->num_rows() > 0){
    
                $this->db->where('project_id',$data['project_id']);
                $this->db->where('user_id',$data['user_id']);
                $this->db->update('tcdc_quiz',$data);
                return true;
            }
            $this->db->insert('tcdc_quiz',$data);
            return true;
            
        }

        public function getUserQuiz($project_id,$user_id){
            $query = $this->db->query('SELECT * FROM tcdc_quiz WHERE project_id = '.$project_id.' AND '.'user_id = '.$user_id);
            return $query->row();
        }

  

}