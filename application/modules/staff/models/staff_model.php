<?php
class staff_model extends MY_Model{

    function __construct()
    {
        parent::__construct();
    }

    function getProject($id = ''){
        
        if(!empty($id)){
            $this->db->where('project_id',$id);
        }
    	$this->db->select("tcdc_prj.*, tcdc_prj_type.type_name, count(tcdc_prj_register.reg_id) as num_reg , concat(tcdc_member.firstname,' ',tcdc_member.lastname) as project_update_user");
    	$this->db->from('tcdc_prj');
    	$this->db->join('tcdc_prj_type','tcdc_prj.project_type = tcdc_prj_type.type_id');
        $this->db->join('tcdc_prj_register','tcdc_prj_register.project_id = tcdc_prj.project_id','left');
        $this->db->join('tcdc_member','tcdc_member.user_id = tcdc_prj.project_create');
        $this->db->group_by('tcdc_prj.project_id');
        $query = $this->db->get();
        return $query->result();
    }

    function getNews(){
        $this->db->select("tcdc_news.*, concat(tcdc_member.firstname,' ',tcdc_member.lastname) as news_update_user");
        $this->db->join('tcdc_member','tcdc_member.user_id = tcdc_news.news_create');
    	$query = $this->db->get('tcdc_news');
    	return $query->result();
    }


    //get users 
    public function getUsers($id = '')
    {
       //get update user
       $this->db->join('tcdc_member_company','tcdc_member_company.member_id = tcdc_member.user_id','left');
        if(!empty($id)){
            $this->db->select('tcdc_member_company.*,tcdc_member.*');
            $this->db->from('tcdc_member');
            $this->db->where('user_id',$id);
            $query =  $this->db->get();
            return $query->row();
        }
        //get all users
        $query = $this->db->get('tcdc_member');
        return $query->result();
    
    }


    //create user save
    public function saveCreateUser($data){
        return $this->db->insert('tcdc_member',$data);
    }
        //get users 
    public function getUserCompany($id = '')
    {
        //get update user
        if(!empty($id)){
            $this->db->select('*');
            $this->db->from('tcdc_member_company');
            $this->db->where('user_id_pk',$id);
            $query =  $this->db->get();
            return $query->row();
        }
    
    }
  
    //save edit user
    public function saveEditUser($id='',$data,$data_company){

        $this->db->where('user_id',$id);
        $status_data = $this->db->update('tcdc_member',$data);

        //update company or create
        if (!empty($data_company)){
            $this->db->where('member_id',$id);
            $this->db->where('user_type','3');
            $this->db->join('tcdc_member','tcdc_member.user_id = tcdc_member_company.member_id');
            $query = $this->db->get('tcdc_member_company');
            if ($query->num_rows() > 0){
                $this->db->where('member_id',$id);
                $status_data = $this->db->update('tcdc_member_company',$data_company);
            }else{
                $data_company['member_id'] = $id;
                $status_data = $this->db->insert('tcdc_member_company',$data_company);
            }
        }
      

        return true;

    }

    //delete company member
    public function deleteCompany($id = ''){
        $this->db->where('user_id_pk',$id);
        return $this->db->delete('tcdc_member_company');
    }


    function saveProject($data,$project_id=''){
        if($project_id){
            $this->db->where('project_id',$project_id);
            $this->db->update('tcdc_prj',$data);
        }else{
            $this->db->insert('tcdc_prj',$data);
            $project_id = $this->db->insert_id();
        }

        return $project_id;
    }

    function saveProjectOwner($project_id,$data_owner){
        $this->db->where('project_id',$project_id);
        $this->db->delete('tcdc_prj_owner');

        foreach ($data_owner as $key => $value) {
            if($value){
                $this->db->set('project_id',$project_id);
                $this->db->set('member_id',$value);
                $this->db->insert('tcdc_prj_owner');
            }
        }
        
        return true;

    }

    function getProjectData($project_id){
        $this->db->select('*');
        $this->db->where('project_id',$project_id);
        $query = $this->db->get('tcdc_prj');
        return $query->row();
    }

    function getProjectType(){
        $query = $this->db->get('tcdc_prj_type');
        return $query->result();
    }

    function getProjectManager(){
        $this->db->select('*');
        $this->db->where('user_type','2');
        $this->db->where('user_active','1');
        $query = $this->db->get('tcdc_member');
        return $query->result();
    }

    function getProjectOwner($project_id){
        $owner_id = array();
        $this->db->where('project_id',$project_id);
        $query = $this->db->get('tcdc_prj_owner');
        foreach ($query->result() as $key => $value) {
            $owner_id[] = $value->member_id; 
        }

        return implode(',', $owner_id);
    }

}