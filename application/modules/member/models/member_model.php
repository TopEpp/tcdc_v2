<?php
class member_model extends MY_Model{

    function __construct()
    {
        parent::__construct();
    }

        
    //get status user regis
    public function getStatusRegis(){
        $this->db->select('project_id,reg_status');
        $this->db->where('user_id',$this->session->userdata('sesUserID'));
        $this->db->from('tcdc_prj_register');
        $query = $this->db->get();
        return $query->result_array();
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
        
        $query = $this->db->query('SELECT reg_id FROM tcdc.tcdc_prj_register WHERE project_id = '.$data['project_id'].' AND '.'user_id = '.$data['user_id']);
        
        if( $query->num_rows() > 0){
            $id = $query->row();
            $this->db->where('project_id',$data['project_id']);
            $this->db->where('user_id',$data['user_id']);
            $this->db->update('tcdc_prj_register',$data);
            return $id->reg_id;
        }
        $this->db->insert('tcdc_prj_register',$data);
        return $this->db->insert_id();
    }

    public function saveProduct($data)
    {
       
        $query = $this->db->query('SELECT * FROM tcdc.tcdc_product WHERE reg_id = '.$data['reg_id'].' AND '.'product_num = '.$data['product_num']);
        
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

  

}