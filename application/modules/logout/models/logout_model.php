<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function logout(){
//        $curTime = date("Y-m-d H:i:s");
        
//        if($this->session->userdata('chkRemember')!="1"){
//            $cookieName = "txtmember";
//            $this->input->set_cookie($cookieName, '', 0);
//            $cookieName = "txtpassword";
//            $this->input->set_cookie($cookieName, '', 0);
//        }

        // delete_cookie("memUserID");
        // delete_cookie("memName");
        // delete_cookie("memLName");
        // delete_cookie("memUserName");
        // delete_cookie("memPassword");
        $this->session->sess_destroy();

    }
}