<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Top
 * Date: 12/16/13 AD
 * Time: 4:29 PM
 * To change this template use File | Settings | File Templates.
 */
class login_model extends MY_Model{

    function login($user,$password,$chkRemember){
        $res = array();
        // $this->load->library('string');
        $sql = "SELECT * FROM tcdc_member
                WHERE  email = '{$user}' ";
        @$query = $this->db->query($sql);
        $data = $query->row();
        $numMember =  $query->num_rows();
        // if($numMember > 0 && $password == $this->string->mydecrypt($data->password) ){
        // echo $this->encrypt->decode($data->password);
        // die;

        if($numMember > 0 && $password == $this->encrypt->decode($data->password) && $data->user_active ){
            $item_session = array(
                'sesUserName' => $data->firstname,
                'sesUserLastName' => $data->lastname,
                'sesUserFullName' => $data->prename.$data->firstname.' '.$data->lastname,
                'sesUserEmail' => $data->email,
                'sesUserID' => $data->user_id,
                'sesUserType' => $data->user_type,
            );

            $res['id'] = $data->user_id;
            $res['name'] = $data->firstname.' '.$data->lastname;
            $res['user_type'] = $data->user_type;
            $res['status'] = true;
            $this->session->set_userdata($item_session);

            ############## member log #################
            $this->input->set_cookie("memUserID", $data->user_id, time() + 30*24*60*60);
            $this->input->set_cookie("memName", $data->firstname, time() + 30*24*60*60);
            $this->input->set_cookie("memLName", $data->lastname, time() + 30*24*60*60);
            $this->input->set_cookie("memUserName", $data->email, time() + 30*24*60*60);
            $this->input->set_cookie("memPassword", $data->password, time() + 30*24*60*60);
            //            $this->input->set_cookie("chkRemember", $chkRemember, time() + 30*24*60*60);
            if($chkRemember =="1"){
                $cookieName = "txtmember";
                $value = $user;
                $expire = time() + 30*24*60*60; // เก็บไว้ 1 เดือน
                $this->input->set_cookie($cookieName, $value, $expire);

                $cookieName = "txtpassword";
                $value =$password;
                $expire = time() + 30*24*60*60; // เก็บไว้ 1 เดือน
                $this->input->set_cookie($cookieName, $value, $expire);
                $cookieName = "txtSignOut";
                $this->input->set_cookie($cookieName, '0', $expire);
            } else {
                $cookieName = "txtmember";
                $this->input->set_cookie($cookieName, '', 0);
                $cookieName = "txtpassword";
                $this->input->set_cookie($cookieName, '', 0);
                $cookieName = "txtSignOut";
                $this->input->set_cookie($cookieName, '0', 0);
            }
            $this->setLog($data->user_id);
            return $res;

        }else{
            $res['status'] = false;
            return $res;

        }
    }

    function setLog($user_id){
        $ip = $this->input->ip_address();
        // $location = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));

        $this->db->set('user_id',$user_id);
        $this->db->set('log_date', @date('Y-m-d'));
        $this->db->set('log_time', @date('H:i:s'));
        $this->db->set('ip_address',$ip);
        // if(!empty($location)){
        //     $this->db->set('country_name',$location->country_name);
        //     $this->db->set('region_name',$location->region_name);
        //     $this->db->set('city',$location->city);
        //     $this->db->set('latitude',$location->latitude);
        //     $this->db->set('longitude',$location->longitude);
        // }
        $this->db->insert('tcdc_member_log');
    }
}