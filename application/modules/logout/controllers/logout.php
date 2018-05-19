<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logout extends My_Controller {
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->model('logout_model');
        $this->logout_model->logout();
        redirect(base_url());

    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */