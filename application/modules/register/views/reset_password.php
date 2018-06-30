<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>ลืมรหัสผ่าน</title>
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
  <link href="<?php echo base_url('assets/plugins/pace/pace-theme-flash.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/plugins/jquery-scrollbar/jquery.scrollbar.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?php echo base_url('assets/plugins/switchery/css/switchery.min.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?php echo base_url('assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/plugins/dropzone/css/dropzone.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/datepicker3.css'); ?>" rel="stylesheet" type="text/css" media="screen">
  <link href="<?php echo base_url('assets/plugins/summernote/css/summernote.css'); ?>" rel="stylesheet" type="text/css" media="screen">
  <link href="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" media="screen">
  <link href="<?php echo base_url('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css'); ?>" rel="stylesheet" type="text/css" media="screen">
  <link href="<?php echo base_url('assets/css/pages-icons.css'); ?>" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="<?php echo base_url('assets/css/themes/corporate.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/css/loader.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- change style select2 -->
  <style>

    .select2-container{
    box-sizing: border-box;
    display: inline-block;
    margin: 0;
    position: relative;
    vertical-align: middle;
    


  }
  .select2-container .select2-selection {
    border: 0px !important;
  }
  .select2-container .select2-selection.select2-selection--single{
    height: 35px;
    margin-top: 20px;
  }

  .form-group label:not(.error){
    text-transform: none;
  }
  .cs-select .cs-placeholder{
    width: 114%;
  }
  .select2-container .select2-selection .select2-selection__arrow{
    right: 6px !important;
  }

  </style>
  <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/windows.chrome.fix.css'); ?>" />'
    }
  </script>
</head>
<body class="fixed-header menu-pin menu-behind">
<!-- loading -->
<div class="loader-wrap" id="loading" style="display:none;" >
  <div class="loader"><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span></div>
</div>

    <br>
    <br>
  <div class="page-content-wrapper">
    <div class="register-container full-height sm-p-t-30">
      <div class=" justify-content-center flex-column  ">
        <div id="title_head">
		<p><a class="btn btn-info btn-cons" href="<?php echo site_url(); ?>">กลับสู่หน้าล็อกอิน</a></p>
        <h5 >ลืมรหัสผ่าน</h5>

        </div>
       

        <?php  if($this->session->flashdata('msg')){?>
              <input type="hidden" id="msg" value="<?php echo $this->session->flashdata('msg');?>">
           <?php  $this->session->unset_userdata('msg');}else{ ?>
            <input type="hidden" id="msg" value ="">
         <?php  }?>
        <!-- เริ่มฟอร์มแบบขั้นตอน -->
        <!-- start_frome_w -->
	
        <div id="myFormWizard">

        
          <!-- <form id="form-register" class="p-t-15" role="form" method="post" action="<?php echo base_url('th/register/signup'); ?>" enctype="multipart/form-data"> -->
          <div class="">

		  

<?php 
if($success){
	echo '<div class="alert alert-success text-center"> คุณได้รีเซตรหัสผ่านเรียบร้อยแล้ว กรุณากลับไปหน้าล็อกอิน. </div>';
} 
?>
		 <?php echo form_open(); ?>
		 	<div class="row">
				<div class="col-md-12">
				<div class="form-group form-group-default required">
					<label>อีเมล</label>
				<span class="text-danger"><?php echo form_error('password'); ?></span>
					<input disabled type="email" id="email" name="email" placeholder="" class="form-control"  value="<?php echo $email; ?>" >
				</div>
				</div>
			</div>
	    	<div class="row">
				<div class="col-md-12">
				<div class="form-group form-group-default required">
					<label>รหัสผ่านใหม่</label>
				<span class="text-danger"><?php echo form_error('password'); ?></span>
					<input type="password" id="password" name="password" placeholder="" class="form-control"  minlength="8"  pattern=".{8,}" value="<?php echo set_value('password'); ?>" >
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<div class="form-group form-group-default required">
					<label>ยืนยันรหัสผ่านใหม่</label><span class="text-danger"><?php echo form_error('password_conf'); ?></span>
					<input type="password" id="password_conf" name="password_conf" placeholder="" class="form-control"  minlength="8" value="<?php echo set_value('password_again'); ?>">
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<input class="btn btn-primary btn-cons m-t-10 fn_from" type="submit" value="ยืนยัน">
				</div>
			</div>


          </div>

          <?php echo form_close(); ?>
        </div>

      
        <!-- end_from_w -->
      </div>

      <!-- จบฟอร์มแบบทั้งหมด -->
    



    </div>
  </div>



<!-- BEGIN VENDOR JS -->
<script src="<?php echo base_url('assets/plugins/pace/pace.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery/jquery-1.11.1.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/modernizr.custom.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/tether/js/tether.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery/jquery-easy.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-unveil/jquery.unveil.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-ios-list/jquery.ioslist.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-actual/jquery.actual.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/classie/classie.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/switchery/js/switchery.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-autonumeric/autoNumeric.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/dropzone/dropzone.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-inputmask/jquery.inputmask.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-validation/js/jquery.validate.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/summernote/js/summernote.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-typehead/typeahead.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-typehead/typeahead.jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/handlebars/handlebars-v4.0.5.js'); ?>"></script>

<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="<?php echo base_url('assets/js/pages.min.js'); ?>"></script>
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="<?php echo base_url('assets/js/form_elements.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/scripts.js'); ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->



