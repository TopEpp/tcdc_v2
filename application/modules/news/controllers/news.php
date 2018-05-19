<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        if($this->session->userdata('sesUserID')==''){
            redirect(base_url());
        }
    }

	public function index()
	{
		$data['news'] = $this->news_model->getNews();
        $this->setView('index',$data);
        $this->publish();
	}
	
}
