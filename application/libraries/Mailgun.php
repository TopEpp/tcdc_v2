<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailgun {

  protected $CI;
  private static $api_key;
  private static $api_base_url;

  function __construct() {

    // assign CI super object
   
   
    // config
    self::$api_key = "de6077eda46f789cf38982c2f96d285f-47317c98-18dc0d11";
    self::$api_base_url = "https://api.mailgun.net/v3/sandbox21f3d82c161b47b7aba452daa6ebb97a.mailgun.org";
  }

  /**
   * Send mail
   * $mail = array(from, to, subject, html)
   */

  public static function send($data,$content)
  {
    $CI =& get_instance();
    //load tamplate  $content = array(name,content)
    $html =  $CI->load->view('email/tamplate',$content,TRUE);

    $mail = array(
      'from' => "TCDC.Chiangmai@gmail.com", 
      'to' => $data['to'],
      'subject' => "Chaingmai Design Week 2018",
      'html' => $html,
      'text' => 'sadsad',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, 'api:' . self::$api_key);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, self::$api_base_url . '/messages');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $mail);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }

}