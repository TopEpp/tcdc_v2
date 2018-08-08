<?php
class news_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getNews()
    {
        $this->db->select("tcdc_news.*, concat(tcdc_member.firstname,' ',tcdc_member.lastname) as news_update_user");
        $this->db->join('tcdc_member', 'tcdc_member.user_id = tcdc_news.news_create');
        $query = $this->db->get('tcdc_news');
        return $query->result();
    }

}
