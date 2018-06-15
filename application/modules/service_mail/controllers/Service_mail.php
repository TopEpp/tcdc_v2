<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_mail extends MY_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->library('cmdw_mail');
    }

    function send_mail(){
    	$data_mail = $this->input->post();
    	$this->cmdw_mail->sendMail($data_mail);
    	return true;
    }
}