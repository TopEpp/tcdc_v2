<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: sanitkeawtawan
 * Date: 10/5/2015 AD
 * Time: 11:35 AM
 */


class User2 extends MY_Controller {
   
    public function __construct(){
        parent::__construct();
    }
    function index(){
        $this->setView('index',array('title'=>'user2'));
        $this->publish();
    }

}