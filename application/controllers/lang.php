<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class lang extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    function switchLanguage($language = "") {
      
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect(base_url());
    }
}