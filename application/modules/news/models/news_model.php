<?php
class news_model extends MY_Model{

    function __construct()
    {
        parent::__construct();
    }

    function getNews(){
    	$query = $this->db->get('tcdc_news');
    	return $query->result();
    }

}