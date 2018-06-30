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
    <style>
    
    .form-group label:not(.error){
      text-transform: none;
    }
    </style>
  </head>
  <body class="fixed-header menu-pin menu-behind">
    <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="<?php echo base_url('assets/img/img_login.jpg')?>" data-src="<?php echo base_url('assets/img/img_login.jpg')?>" data-src-retina="<?php echo base_url('assets/img/img_login.jpg')?>" alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <!-- <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
          <h2 class="semi-bold text-white">
					นำเสนอตัวตนและต่อยอดจากงานหัตถกรรมท้องถิ่นให้โลกได้เห็น</h2>
          <p class="small">
            ลงทะเบียนเพื่อเข้าร่วมโครงการที่คุณต้องการ โดยก่อนอื่นโปรดเข้าสู่ระบบเพื่อดำเนินการในขั้นตอนต่อไป
          </p>
        </div> -->
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="d-flex align-items-right" style="float: right; padding: 10px; ">
          <div class="pull-left p-r-10 fs-14" style="font-size: 16px !important; font-family: 'dbch';">
            ไทย <input type="checkbox" id="toggle_lang"   class="switchery" value="1" data-switchery="true"  <?php echo $this->uri->segment(1)=='en'? 'checked="checked"':''; ?> > English
          </div>
        </div>
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <!-- <img src="<?php echo base_url('assets/img/logo_b.png');?>" alt="logo" data-src="<?php echo base_url('assets/img/logo_b.png');?>" data-src-retina="<?php echo base_url('assets/img/logo_b.png');?>" width="78"> -->
          <p class="p-t-35 fs-16">ระบบเทศกาลงานออกแบบเชียงใหม่</p>
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

            if($this->session->flashdata('reset')){
              echo $this->session->flashdata('reset');
              $this->session->unset_userdata('reset');
            }

            if($this->session->flashdata('msg')){
              echo $this->session->flashdata('msg');
              $this->session->unset_userdata('msg');
            }

          ?>
          
        <?php  $msg = @$this->session->flashdata('confirm');
            if(!empty($msg['msg'])){?>
              <input type="hidden" id="msg" value="<?php echo $msg['msg'];?>">
              <input type="hidden" id="msg2" value="<?php echo $msg['msg2'];?>">
           <?php  $this->session->unset_userdata('confirm');}else{ ?>
            <input type="hidden" id="msg" value ="">
            <input type="hidden" id="msg2" value ="">
         <?php  }?>
  
          <?php $attributes = array('name' => 'frmLogin', 'id' => 'form-login');
              $lang = $this->uri->segment(1);
              echo form_open_multipart($lang.'/login', $attributes); 
        ?>
          <!-- <form id="form-login" class="p-t-15" role="form" action="index.html"> -->
            <!-- START Form Control-->
            <div class="form-group form-group-default ">
              <label  style="font-family: 'dbch', sans-serif;">อีเมล</label>
              <div class="controls">
                <input type="text" name="username" id="username" placeholder="" class="form-control" required >
              </div>
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default ">
              <label style="font-family: 'dbch', sans-serif;">รหัสผ่าน</label>
              <div class="controls">
                <input type="password" class="form-control" name="password" id="password" placeholder="" required>
              </div>
            </div>
            <!-- START Form Control-->
            <div class="row">
              <div class="col-md-6 no-padding sm-p-l-10">
                <div class="checkbox ">
                  <input type="checkbox" value="1" id="checkbox1">
                  <label for="checkbox1" style="font-family: 'dbch', sans-serif;">จำรหัสผ่าน</label>
                </div>
              </div>
              <!-- <div class="col-md-6 d-flex align-items-center justify-content-end">
                <a href="#" class="text-info small">ลืมรหัสผ่าน</a>
              </div> -->
            </div>
            <!-- END Form Control-->
            <div>
              <!-- <input type="submit" value="Send Request"> -->
              <input type="submit" class="btn btn-primary btn-cons m-t-10 fn_from"  id="btn-login" value="<?php echo lang('login');?>" ></button>
            </div>
            <br/>
            <a style="color: #d61a67;  font-family: 'dbch';" class="fs-15  btn-cons m-t-10 fn_from" href="<?php echo base_url('register')?>"><?php echo lang('register');?></a>
            <br/>
            <br/>
            <br/>
            <div class="row">
              <div class="col-md-6 d-flex fs-15">
                  <a href="#" data-toggle="modal" data-target="#reset_password" class="text-info small" style="font-family: 'dbch', sans-serif;">ลืมรหัสผ่าน</a>
                </div>
            </div>
            <br/>
            <br/>

            <div class="row">
              <div class="col-md-12 no-padding sm-p-l-10">

                <div class="col-md-12 d-flex fs-15">
                  <a href="#" data-toggle="modal" data-target="#norify" class="text-info small" style="font-family: 'dbch', sans-serif;">แจ้งปัญหาการเข้าสู่ระบบหรือสร้างบัญชี</a>
                  <!-- <p style="font-family: 'dbch', sans-serif;" href="#" class="text-info small">แจ้งปัญหาการเข้าสู่ระบบหรือสร้างบัญชี<br>(Mail to: hello.tcdc@tcdc.or.th)</p> -->
                </div>
              </div>
            </div>

           
          </form>
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
    
    <!-- Modal -->
<div class="modal fade" id="Success" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content  bg-success-dark">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body " style="color: white;">
            <div id="flash_1"></div>
            <div id="flash_2"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default"  data-dismiss="modal">ยืนยัน</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- reset password -->
<div class="modal fade " id="reset_password" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    
      <!-- Modal content-->
      <div class="modal-content  ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ลืมรหัสผ่าน</h4>
          <h4>
        </div>
        <div class="modal-body ">
         <!-- <form id="reset_form" action ="<?php echo base_url('register/reset_password');?>" method="POST"> -->
            <div class="form-group ">
            
                <label style="font-family: 'dbch', sans-serif;">อีเมล</label>
                <div class="controls">
                  <input class="form-control" type="text" name="email_reset" id="email_reset">
                  <!-- <input type="password" class="form-control" name="password" id="password" placeholder="" required> -->
                </div>
            </div>
          <!-- </form> -->
        
        </div>
        <div class="modal-footer">
          <button type="button" id="btn_resetpassword" class="btn btn-default"  data-dismiss="modal">ยืนยัน</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
      
    </div>
</div>

<!-- reset password -->
<div class="modal fade " id="norify" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    
      <!-- Modal content-->
      <div class="modal-content  ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แจ้งปัญหาการเข้าสู่ระบบหรือสร้างบัญชี</h4>
          <hr>
        </div>
        <div class="modal-body ">
         <!-- <form id="reset_form" action ="<?php echo base_url('register/reset_password');?>" method="POST"> -->
            <div class="form-group  ">
                <label style="font-family: 'dbch', sans-serif;">อีเมลผู้แจ้ง</label>
                <div class="controls">
                  <input class="form-control" type="text" name="norify_email" id="norify_email">
                  <!-- <input type="password" class="form-control" name="password" id="password" placeholder="" required> -->
                </div>
            </div>
            <div class="form-group ">
                <label style="font-family: 'dbch', sans-serif;">ปัญหาที่พบ</label>
                <div class="controls">
                    <textarea  name="problem" id="problem" style="width: 100%;height:200px;">
                    </textarea>
                  <!-- <input type="password" class="form-control" name="password" id="password" placeholder="" required> -->
                </div>
            </div>
          <!-- </form> -->
        
        </div>
        <div class="modal-footer">
          <button type="button" id="btn_norify" class="btn btn-default"  data-dismiss="modal">ยืนยัน</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
      
    </div>
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

      //reset password
      $('#btn_resetpassword').click(function(){
          var email = $('#email_reset').val();
          $.ajax({
              type: "POST",
              url: domain+'register/reset_password',
              data: {email:email},
              success: function(data, status) {
                if (data)
                  window.location.href = domain;
              }
          });
      });

            //norify 
      $('#btn_norify').click(function(){
          var email = $('#norify_email').val();
          var problem = $('#problem').val();
          $.ajax({
              type: "POST",
              url: domain+'register/norify',
              data: {email:email,problem:problem},
              success: function(data, status) {
                if (data)
                  window.location.href = domain;
              }
          });
      });


      var validator = $("#form-login").validate({
          rules: {
            username: "required",
          },
          messages: {
            username: "ข้อมูลจำเป็น",
            password: "ข้อมูลจำเป็น",

          }
      });

       //check verifive email
    if ($('#msg').val() != ''){
      $('#flash_1').text($('#msg').val());
      $('#flash_2').text($('#msg2').val());
      $('#Success').modal('show');
    }

       var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
            elems.forEach(function(html) {
              var switchery = new Switchery(html, {color: '#10CFBD', size : 'small'});
            });
  

      // $('#btn-login').click(function(){
      //   $('#form-login').submit();
      // });
    });

    var changeCheckbox = document.querySelector('.switchery');

    changeCheckbox.onchange = function() {
      if(changeCheckbox.checked){
        lang = 'en';
      }else{
        lang = 'th';
      }

      window.location.href='<?php  echo base_url(); ?>'+lang+'/<?php echo $this->uri->segment(2)."/".$this->uri->segment(3)."/".$this->uri->segment(4)?>';

      // var URL = '<?php  echo base_url(); ?>'+lang+'/login/set_lang/'+lang;
      // var data = { 'lang' : lang}
      // $.ajax({
      //     url: URL,
      //     type: "POST",
      //     data: data,
      //     success: function (res) {
      //         // window.location.reload();
      //     }
      // });
    };
    </script>
  </body>
</html>