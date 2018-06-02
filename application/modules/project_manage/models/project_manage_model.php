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
}