<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: sanitkeawtawan
 * Date: 10/5/2015 AD
 * Time: 11:16 AM
 */


class User extends MY_Controller {
   
    public function __construct(){
        parent::__construct();
    }
    function index(){
        $this->setView('index');
        $this->publish();
    }

}