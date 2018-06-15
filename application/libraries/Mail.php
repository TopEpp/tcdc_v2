<?php
require_once('class.phpmailer.php');
class Mail {
    protected $IsHTML=true; // กำหนดให้ ส่งเป็น html
    protected $IsSMTP=true;
    protected $Host = '';//'smtp.gmail.com'
    protected $Mailer = "smtp";
    protected $Port = 465;
    protected $SMTPKeepAlive = true;
    protected $SMTPAuth = true;
    protected $SMTPSecure = "tls";
    protected $Username = '';//'username mail'
    protected $Password = '';//'password mail'
    private  $smtpmail;
    function __construct() {
        $this->smtpmail = new PHPMailer();
    }
    function Setup($mail=array()){
        $mail=(Object)$mail;


        $this->IsHTML=(@$mail->IsHTML)?$mail->IsHTML:$this->IsHTML;
        $this->IsSMTP=(@$mail->IsSMTP)?$mail->IsSMTP:$this->IsSMTP;

        $this->smtpmail->IsHTML($this->IsHTML);
        if($this->IsSMTP){
            $this->smtpmail->IsSMTP();
        }else{
            $this->smtpmail->IsMail();
        }
        $this->smtpmail->Host =(@$mail->Host)?$mail->Host: $this->Host;
        $this->smtpmail->Mailer =(@$mail->Mailer)?$mail->Mailer: $this->Mailer;
        $this->smtpmail->Port = (@$mail->Port)?$mail->Port:$this->Port;
        $this->smtpmail->SMTPKeepAlive = (@$mail->SMTPKeepAlive)?$mail->SMTPKeepAlive:$this->SMTPKeepAlive;
        $this->smtpmail->SMTPAuth = (@$mail->SMTPAuth)?$mail->SMTPAuth:$this->SMTPAuth;
        $this->smtpmail->SMTPSecure = (@$mail->SMTPSecure)?$mail->SMTPSecure:$this->SMTPSecure;
        $this->smtpmail->Username = (@$mail->Username)?$mail->Username:$this->Username;
        $this->smtpmail->Password = (@$mail->Password)?$mail->Password:$this->Password;
        $body = $mail->message;
        if(@$mail->template){
            $body=$this->genContents($mail->template['name'],$mail->template['param']);
        }
        $body = preg_replace('/\\\\/','', $body);
        $this->smtpmail->From = $mail->from; // "name@yourdomain.com";
        $this->smtpmail->FromName =  $mail->fromename;
        $this->smtpmail->Subject =  $mail->subject;
        $this->smtpmail->Body = $body;
    if(@$mail->replyto){
        if(is_array($mail->replyto)){
            foreach($mail->replyto as $from){
                $email=$from->email;
                $ename=$from->name;
                $this->smtpmail->AddReplyTo($email, $ename);
            }
        }else{
            $email=$mail->replyto;
            $ename=$mail->replytoname;
            $this->smtpmail->AddReplyTo($email, $ename);
        }
    }

    if(@$mail->to){
        if(is_array($mail->to)){
            foreach($mail->to as $from){
                $email=$from->email;
                $ename=$from->name;
                $this->smtpmail->AddAddress($email, $ename);
            }
        }else{
            $email=$mail->to;
            $ename=$mail->toname;
            $this->smtpmail->AddAddress($email, $ename);
        }

    }

    }
    function Send(){
        try{
            if($this->smtpmail->Send()){
                return 1;
            }else{
                return $this->smtpmail->ErrorInfo;
            }
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        }
    }
    function genContents($template,$data=array()){
        $contents=$template;
        $file=rtrim($_SERVER['DOCUMENT_ROOT'],'/').$template;
        if(is_file($file)){
            $contents=$this->_reademplate($file);
        }
       if($contents){
           $contents=str_replace(array_keys($data),array_values($data),$contents);
       }
     return $contents;
    }
    private function _reademplate($path){

        if(is_file($path)){
            $fp = fopen($path, "r");
            $contents = fread($fp, filesize($path));
            fclose($fp);
            return $contents;
        }else{
            return "";
        }
    }
} 