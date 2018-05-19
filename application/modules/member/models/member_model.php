<?php
class member_model extends MY_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function saveRegis($data)
    {
        
        $query = $this->db->query('SELECT * FROM tcdc.tcdc_prj_register WHERE project_id = '.$data['project_id'].' AND '.'user_id = '.$data['user_id']);
        
        if( $query->num_rows() > 0){
            $this->db->where('project_id',$data['project_id']);
            $this->db->where('user_id',$data['user_id']);
            return $this->db->update('tcdc_prj_register',$data);
        }
        
        return $this->db->insert('tcdc_prj_register',$data);
    }

    public function saveProduct($data)
    {
       
        $query = $this->db->query('SELECT * FROM tcdc.tcdc_product WHERE reg_id = '.$data['reg_id']);
        
        if( $query->num_rows() > 0){
            $this->db->where('reg_id',$data['reg_id']);
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

  

}