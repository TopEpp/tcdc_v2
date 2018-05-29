<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Login :: Chiang Mai Design Week</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo base_url('assets/plugins/pace/pace-theme-flash.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/plugins/jquery-scrollbar/jquery.scrollbar.css');?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url('assets/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url('assets/plugins/switchery/css/switchery.min.css');?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url('assets/css/pages-icons.css" rel="stylesheet" type="text/css');?>">
    <link class="main-stylesheet" href="<?php echo base_url('assets/css/themes/corporate.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        var domain='<?php  echo base_url().$this->uri->segment(1); ?>/';
    </script>
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      $('.login-wrapper ').height($(window).height());

      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/windows.chrome.fix.css');?>" />'
    }
    </script>
  </head>
  <body class="fixed-header menu-pin menu-behind">
    <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="<?php echo base_url('assets/img/login_bg.jpg')?>" data-src="<?php echo base_url('assets/img/login_bg.jpg')?>" data-src-retina="<?php echo base_url('assets/img/login_bg.jpg')?>" alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
          <h2 class="semi-bold text-white">
					นำเสนอตัวตนและต่อยอดจากงานหัตถกรรมท้องถิ่นให้โลกได้เห็น</h2>
          <p class="small">
            ลงทะเบียนเพื่อเข้าร่วมโครงการที่คุณต้องการ โดยก่อนอื่นโปรดเข้าสู่ระบบเพื่อดำเนินการในขั้นตอนต่อไป
          </p>
        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->
      <div class="login-container bg-white">

        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <img src="<?php echo base_url('assets/img/logo_b.png');?>" alt="logo" data-src="<?php echo base_url('assets/img/logo_b.png');?>" data-src-retina="<?php echo base_url('assets/img/logo_b.png');?>" width="78">
          <p class="p-t-35 fs-16">เข้าสู่ระบบ</p>
          <!-- <form id="form-login" class="p-t-15" role="form" action="index.html"> -->
          <?php $attributes = array('name' => 'frmLogin', 'id' => 'form-login');
              $lang = $this->uri->segment(1);
              echo form_open_multipart($lang.'/login', $attributes); 
          ?>
          <?php
            if($this->session->flashdata('verify')){
              echo $this->session->flashdata('verify');
              $this->session->unset_userdata('verify');
            }

            if($this->session->flashdata('msg')){
              echo $this->session->flashdata('msg');
              $this->session->unset_userdata('msg');
            }

          ?>
  
          <?php $attributes = array('name' => 'frmLogin', 'id' => 'form-login');
              $lang = $this->uri->segment(1);
              echo form_open_multipart($lang.'/login', $attributes); 
        ?>
          <!-- <form id="form-login" class="p-t-15" role="form" action="index.html"> -->
            <!-- START Form Control-->
            <div class="form-group form-group-default fn_from">
              <label class="fn_from">อีเมล์</label>
              <div class="controls">
                <input type="text" name="username" id="username" placeholder="ระบุอีเมล์" class="form-control" required >
              </div>
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default fn_from">
              <label>ป้อนรหัสผ่าน</label>
              <div class="controls">
                <input type="password" class="form-control" name="password" id="password" placeholder="ป้อนรหัสผ่าน" required>
              </div>
            </div>
            <!-- START Form Control-->
            <div class="row">
              <div class="col-md-6 no-padding sm-p-l-10">
                <div class="checkbox ">
                  <input type="checkbox" value="1" id="checkbox1">
                  <label for="checkbox1">จำรหัสผ่าน</label>
                </div>
              </div>
              <div class="col-md-6 d-flex align-items-center justify-content-end">
                <a href="#" class="text-info small">ลืมรหัสผ่าน</a>
              </div>
            </div>
            <!-- END Form Control-->
            <a class="btn btn-primary btn-cons m-t-10 fn_from" href="#" id="btn-login" ><?php echo lang('login');?></a>
            <a class="btn btn-info btn-cons m-t-10 fn_from" href="<?php echo base_url('register')?>"><?php echo lang('register');?></a>
            <br/>
            <br/>
            <br/>
            <br/>

            <div class="row">
              <div class="col-md-6 no-padding sm-p-l-10">
                <div class="col-md-6 d-flex ">
                  <a href="#" class="text-info small">ติดต่อเรา</a>
                </div>
              </div>
            </div>

           
          </form>
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
    

    <!-- BEGIN VENDOR JS -->
    <script src="<?php echo base_url('assets/plugins/pace/pace.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery/jquery-1.11.1.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/modernizr.custom.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/tether/js/tether.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery/jquery-easy.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-unveil/jquery.unveil.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-ios-list/jquery.ioslist.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-actual/jquery.actual.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/classie/classie.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/switchery/js/switchery.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-validation/js/jquery.validate.min.js');?>" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <script src="<?php echo base_url('assets/js/pages.min.js');?>"></script>
    <!-- <script src="<?php echo base_url('assets/modules/login/login.js');?>"></script> -->
    <script>
    $(function()
    {

      var validator = $("#form-login").validate({
          rules: {
            username: "required",
          },
          messages: {
            username: "ข้อมูลจำเป็น",
            password: "ข้อมูลจำเป็น",

          }
      });

      
  

      $('#btn-login').click(function(){
        $('#form-login').submit();
      });
    })
    </script>
  </body>
</html>