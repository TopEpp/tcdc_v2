<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Top
 * Date: 12/16/13 AD
 * Time: 4:15 PM
 * To change this template use File | Settings | File Templates.
 */
class Cmdw_mail {
    private $_ci;
    public function __construct()
    {
        $this->_ci = & get_instance();
    }

    function sendMail($data){
        $this->_ci->load->library('mail');
        $conf=array(
            'Host'=>"ssl://smtp.gmail.com"//ชื่อโดเมน ควรใส่ไว้ใน config
            ,'Username'=>"TCDC.Chiangmai@gmail.com"//ชื่อโดเมน ควรใส่ไว้ใน config class
            ,'Password'=>"TCDC@CMDW"//ชื่อโดเมน ควรใส่ไว้ใน config class
            ,'from'=>"TCDC.Chiangmai@gmail.com"
            ,'fromename'=>"chiangmaidesignweek"
            ,'subject'=>$data['subject']
            ,'message'=>""//ข้อความกรณีไม่ใช้ไฟล์ template
            ,'to'=>$data['mail_to']
            ,'toname'=>$data['mail_to_name']
            ,'template'=>array(// กรณใช้ template ถ้าไม่ใช้ให้เอาออก
                'name'=>"/register/assets/mailtemplate/tempplate.html",
                'param'=>array(
                    '{Name}'=>$data['mail_to_name'],
                    '{Content}'=>$data['message'],
                    
                )
            )
        );

        $this->_ci->mail->Setup($conf);
        $result=$this->_ci->mail->Send();
        return true;
    }


}