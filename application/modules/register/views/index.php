<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>สร้างบัญชี : CMDW</title>
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
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/img/logo_b.png'); ?>" alt="logo" data-src="<?php echo base_url('assets/img/logo_b.png'); ?>" data-src-retina="<?php echo base_url('assets/img/logo_b.png'); ?>" width="78"></a>
        <h3 >สร้างบัญชี</h3>

        </div>
       

        <?php  if($this->session->flashdata('msg')){?>
              <input type="hidden" id="msg" value="<?php echo $this->session->flashdata('msg');?>">
           <?php  $this->session->unset_userdata('msg');}else{ ?>
            <input type="hidden" id="msg" value ="">
         <?php  }?>
        <!-- เริ่มฟอร์มแบบขั้นตอน -->
        <!-- start_frome_w -->
        <div id="myFormWizard">


          <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
              <a class="active" data-toggle="tab" href="#tab1" role="tab"><i class="fa fa-shopping-cart tab-icon"></i> <span >สร้างบัญชี</span></a>
            </li>
            <li class="nav-item">
              <a data-toggle="tab" href="#tab2" role="tab"><i class="fa fa-truck tab-icon"></i> <span  >ข้อมูลส่วนตัว</span></a>
            </li>
            <!-- <li class="nav-item">
              <a data-toggle="tab" href="#tab3" role="tab"><i class="fa fa-check tab-icon"></i> <span>ยืนยันข้อมูล</span></a>
            </li> -->
          </ul>
          <!-- Tab panes -->
          <?php $attributes = array('name' => 'frmRegistration', 'id' => 'form-register');
                $lang = $this->uri->segment(1);
                echo form_open_multipart($lang.'/register/signup', $attributes); 
          ?>
          <!-- <form id="form-register" class="p-t-15" role="form" method="post" action="<?php echo base_url('th/register/signup'); ?>" enctype="multipart/form-data"> -->
          <div class="tab-content">
            <div class="tab-pane active slide" id="tab1">
            

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group form-group-default required">
                      <label>อีเมล,Email</label><span class="text-danger"><?php echo form_error('email'); ?></span>
                      <input type="text" id="email" name="email" placeholder="" class="form-control"  value="<?php echo set_value('email'); ?>"  >
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group form-group-default required">
                      <label>ยืนยันอีเมล,Confirm Email</label>
                      <span class="text-danger"><?php echo form_error('email_again'); ?></span>
                      <input type="text" id="email_again" name="email_again" placeholder="" class="form-control" value="<?php echo set_value('email_again'); ?>" >
                    
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group form-group-default required">
                      <label>รหัสผ่าน,Password</label>
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                      <input type="password" id="password" name="password" placeholder="" class="form-control"  minlength="8"  pattern=".{8,}" value="<?php echo set_value('password'); ?>" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group form-group-default required">
                      <label>ยืนยันรหัสผ่าน,Confirm Password</label><span class="text-danger"><?php echo form_error('password_again'); ?></span>
                      <input type="password" id="password_again" name="password_again" placeholder="" class="form-control"  minlength="8" value="<?php echo set_value('password_again'); ?>">
                    </div>
                  </div>
                </div>
              <!-- </form> -->

            </div>
            <div class="tab-pane slide " id="tab2">

              <!-- <form id="form-regis-user" class="p-t-15" role="form" action="#"> -->
              <div class="row clearfix">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default required">
                      <label>เลขบัตรประชาชน</label><span class="text-danger"><?php echo form_error('id_number'); ?></span>
                      <input type="text" name="id_number" class="form-control" placeholder="" value="<?php echo set_value('id_number'); ?>">
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group form-group-default  form-group-default-selectFx required ">
                      <label>คำนำหน้า,Prename</label><span class="text-danger"><?php  echo  form_error('prename'); ?></span>
                      <select  style="width:100%" style="width:100%" id="prename" name="prename" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                
                        <option disable <?php echo (@set_value('prename') == '') ? 'selected':'';?> value="" >เลือก</option>
                        <option  <?php echo (@set_value('prename') == 1) ? 'selected':'';?> value="1">นาย</option>
                        <option  <?php echo (@set_value('prename') == 2) ? 'selected':'';?> value="2">นาง</option>
                        <option  <?php echo (@set_value('prename') == 3) ? 'selected':'';?> value="3">นางสาว</option>
                        <option  <?php echo (@set_value('prename') == 4) ? 'selected':'';?> value="4">ไม่ระบุ</option>
                      </select>
                      <div id="prename_detail" style="display:none;">
                        <input type="text" class="form-control" name="prename_detail" value="<?php echo @$prename;?>">
                      </div>
                    </div>
                  </div>  
                  <div class="col-md-4">
                    <div class="form-group form-group-default required">
                      <label>ชื่อ,First Name</label>
                      <span class="text-danger"><?php  echo  form_error('firstname'); ?></span>
                      <input type="text"  id="firstname" name="firstname" placeholder="" class="form-control" value="<?php echo set_value('firstname'); ?>" >

                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group form-group-default required">
                      <label>นามสกุล,Last Name</label><span class="text-danger"><?php echo form_error('lastname'); ?></span>
                      <input type="text" id="lastname" name="lastname" placeholder="" class="form-control" value="<?php echo set_value('lastname'); ?>">
        
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group form-group-default  form-group-default-selectFx ">
                      <label>วันเกิด/Birthday</label><span class="text-danger"><?php  echo  form_error('birthday'); ?></span>
                      <select  style="width:100%" id="birthday" name="birthday" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">                
                        <option  value="" >เลือก</option>
                        <?php for ($i = 1;$i<=31;$i++) {
                            $select = '';
                            
                            if(set_value('birthday') == $i ){
                              $select =  'selected="selected"';
                            }
                          ?>
                          <option <?php echo $select;?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>                  
                      </select>
                    </div>
                  </div>  
                  <div class="col-md-4">
                    <div class="form-group form-group-default  form-group-default-selectFx">
                      <label>เดือนเกิด/Month Birth</label>
                      <span class="text-danger"><?php  echo  form_error('month_of_birth'); ?></span>
                      <?php $months = array(
                                'January',
                                'February',
                                'March',
                                'April',
                                'May',
                                'June',
                                'July ',
                                'August',
                                'September',
                                'October',
                                'November',
                                'December',
                            );  ?>
                      <select  style="width:100%" id="month_of_birth" name="month_of_birth" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                          <option  value="" >เลือก</option>
                          <?php foreach ($months as $key => $value) { 
                            $select = '';
                            
                            if(set_value('month_of_birth') == $value ){
                              $select =  'selected="selected"';
                            }
                            ?>
                            <option  <?php echo $select;?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                          <?php } ?>  
                        </select>

                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group form-group-default  form-group-default-selectFx">
                      <label>ปีเกิด/Year Birth</label><span class="text-danger"><?php echo form_error('year_of_birth'); ?></span>
                      <select style="width:100%" id="year_of_birth" name="year_of_birth" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                          <option  value="" >เลือก</option>
        
                          <?php for ($i = 1950;$i<=2018;$i++) { 
                            $select = '';
                            
                              if(set_value('year_of_birth') == $i ){
                                $select =  'selected="selected"';
                              }
                        
                            ?>
                            <option <?php echo $select; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                          <?php } ?>
        
                          
                        </select>
        
                    </div>
                  </div>
                </div>

 

                
                <p style="">ที่อยู่สำหรับการติดต่อ</p>
                <div class="row clearfix">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default ">
                      <label>ชื่อบริษัท/อาคารที่ตั้ง</label><span class="text-danger"><?php echo form_error('company_name'); ?></span>
                      <input type="text" name="company_name" class="form-control" placeholder="" value="<?php echo set_value('company_name'); ?>">
                    </div>
                  </div>

                </div>
                <div class="row clearfix">
                  <div class="col-sm-3">
                    <div class="form-group form-group-default required">
                      <label>เลขที่,Number</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                      <input type="text" name="address" class="form-control" placeholder="" value="<?php echo set_value('address'); ?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group form-group-default required">
                      <label>หมู่,Village No</label><span class="text-danger"><?php echo form_error('village'); ?></span>
                      <input type="text" name="village" class="form-control" placeholder="" value="<?php echo set_value('village'); ?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group form-group-default ">
                      <label>ซอย,Lane</label><span class="text-danger"><?php echo form_error('lane'); ?></span>
                      <input type="text" name="lane" class="form-control" placeholder="" value="<?php echo set_value('lane'); ?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group form-group-default ">
                      <label>ถนน,Road</label><span class="text-danger"><?php echo form_error('Road'); ?></span>
                      <input type="text" name="road" class="form-control" placeholder="" value="<?php echo set_value('Road'); ?>">
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-sm-6">
                    <div class="form-group form-group-default required">
                      <label>ตำบล/แขวง,Subdistrict</label><span class="text-danger"><?php echo form_error('subdistrict'); ?></span>
                      <input type="text" name="subdistrict" class="form-control" placeholder="" value="<?php echo set_value('subdistrict'); ?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group form-group-default required">
                      <label>เขต/อำเภอ,District</label><span class="text-danger"><?php echo form_error('district'); ?></span>
                      <input type="text" name="district" class="form-control" placeholder="" value="<?php echo set_value('district'); ?>">
                    </div>
                  </div>

                </div>

                <div class="row clearfix">
                  <div class="col-sm-4">
                      <div class="form-group form-group-default required form-group-default-selectFx "><!--form-group-default-selectFx-->
                        <label>ประเทศ,Countries</label><span class="text-danger" style="text-align:center;"><?php echo form_error('country'); ?></span>
                        <select style="width:100%" name="country" id="country" class=" form-control" data-init-plugin="select2"  >
                          <option value="">เลือก</option>
                          <?php foreach ($countries as $key => $value) { ?>
                            <?php 
                              $select = '';
                              if (!empty(set_value('country'))){
                                if(set_value('country') == $value->id ){
                                  $select =  'selected="selected"';
                                }
                              }else{
                                if( 'Thailand' == $value->name ){
                                  $select =  'selected="selected"';
                                }
                              }
                            
                              ?>
                            <option <?php echo $select; ?>  value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                          <?php } ?>
                          
                        </select>
                      </div>
                  </div>

                  <div class="col-sm-4" id="province" >
                    <div class="form-group form-group-default required form-group-default-selectFx "><!--form-group-default-selectFx-->
                      <?php if (empty(form_error('province'))){ ?>
                         <label>จังหวัด,Province</label>
                      <?php }?>
                      <span class="text-danger" style="text-align:center;"><?php echo form_error('province'); ?></span>
                      <select style="width:100%"  name="province" class=" form-control" data-init-plugin="select2"  >
                        <option value="">เลือก</option>
                        <?php foreach ($province as $key => $value) { ?>
                          <?php 
                            $select = '';
                            if(set_value('province') == $value->code ){
                                $select =  'selected="selected"';
                            } ?>
                          <option <?php echo $select; ?>  value="<?php echo $value->code;?>"><?php echo $value->name_th;?></option>
                        <?php } ?>
                        
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group form-group-default required">
                      <label>รหัสไปรษณีย์,Zipcode</label><span class="text-danger"><?php echo form_error('zipcode'); ?></span>
                      <input type="text" name="zipcode" class="form-control" placeholder=""  pattern="[0-9]*"  value="<?php echo set_value('zipcode'); ?>">
                    </div>
                  </div>
                </div>
                
                <!--  status group -->
                <div id="commany">
              
                  <p style="">สถานภาพของคุณ</p>
                    <div class="row clearfix">
                      <div class="col-sm-12">
                        <div class="form-group form-group-default  form-group-default-selectFx  required">
                          <label>สถานภาพ</label><span class="text-danger text-center"><?php echo form_error('job'); ?></span>
                          <select style="width:100%" name="job" id="job" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                            <option  <?php echo (@set_value('job')== '') ? 'selected':'';?> value="" >เลือก</option>
                            <?php foreach ($status as $key => $value) { ?>
                              <option data-group="<?php echo $value->status_group;?>" <?php echo (@set_value('job') == $value->status_id) ? 'selected':'';?> value="<?php echo $value->status_id;?>"><?php echo $value->status_name;?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row clearfix" id="job_detail" <?php echo (@set_value('job_detail') && @set_value('job') == 11) ?  "" : "style='display:none;'" ?>>
                      <div class="col-sm-12">
                        <div class="form-group form-group-default ">
                          <input type="text" name="job_detail" placeholder="ระบุอาชีพของคุณ" class="form-control" value="<?php echo @set_value('job_detail'); ?>">
                        </div>
                      </div> 
                    </div> -->
                    <input type="hidden" name="job_group" id= "job_group">
                    <!-- status group -->
                    <div id="group_one" style="display:none;">
                      <div class="row clearfix">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด</label>
                            <select style="width:100%" name="job_type_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                            
                              <option  <?php echo (@set_value('job_type_one') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('job_type_one') == 1) ? 'selected':'';?> value="1">งานฝีมือและหัตถกรรม</option>
                              <option  <?php echo (@set_value('job_type_one') == 2) ? 'selected':'';?> value="2">ศิลปการแสดง</option>
                              <option  <?php echo (@set_value('job_type_one') == 3) ? 'selected':'';?> value="3">ทัศนศิลป์</option>
                              <option  <?php echo (@set_value('job_type_one') == 4) ? 'selected':'';?> value="4">ดนตรี</option>
                              <option  <?php echo (@set_value('job_type_one') == 5) ? 'selected':'';?> value="5">ภาพยนตร์และวิดีทัศน์</option>
                              <option  <?php echo (@set_value('job_type_one') == 6) ? 'selected':'';?> value="6">การพิมพ์</option>
                              <option  <?php echo (@set_value('job_type_one') == 7) ? 'selected':'';?> value="7">การกระจายเสียง</option>
                              <option  <?php echo (@set_value('job_type_one') == 8) ? 'selected':'';?> value="8">ซอฟต์แวร์</option>
                              <option  <?php echo (@set_value('job_type_one') == 9) ? 'selected':'';?> value="9">การโฆษณา</option>
                              <option  <?php echo (@set_value('job_type_one') == 10) ? 'selected':'';?> value="10">การออกแบบ (รวมถึงแฟชั่น)</option>
                              <option  <?php echo (@set_value('job_type_one') == 11) ? 'selected':'';?> value="11">สถาปัตยกรรม</option>
                              <option  <?php echo (@set_value('job_type_one') == 12) ? 'selected':'';?> value="12">แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)</option>
                            </select>
                          </div>
                        </div>
                        
                      </div>
                      <div class="row cloearfix">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>ประสบการณ์ทำงานหรือทำธุรกิจ</label>
                            <select style="width:100%" name="company_service_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                            
                              <option  <?php echo (@set_value('company_service_one') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_service_one') == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                              <option  <?php echo (@set_value('company_service_one') == 2) ? 'selected':'';?> value="2">0 - 3 ปี</option>
                              <option  <?php echo (@set_value('company_service_one') == 3) ? 'selected':'';?> value="3">3 - 10 ปี</option>
                              <option  <?php echo (@set_value('company_service_one') == 4) ? 'selected':'';?> value="4">มากกว่า 10 ปี</option>

                
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row clearfix">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>ลูกค้าของคุณคือกลุ่มใด</label>
                            <select style="width:100%" name="company_custom_group" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_custom_group') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_custom_group') == 1) ? 'selected':'';?> value="1">ลูกค้าในประเทศ</option>
                              <option  <?php echo (@set_value('company_custom_group') == 2) ? 'selected':'';?> value="2">ลูกค้าต่างประเทศ </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>ลักษณะการทำงานของธุรกิจ </label>
                            <select style="width:100%" name="company_business_look_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_business_look_one') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_business_look_one') == 1) ? 'selected':'';?> value="1">รับจ้างผลิต </option>
                              <option  <?php echo (@set_value('company_business_look_one') == 2) ? 'selected':'';?> value="2">รับจัดจำหน่าย</option>
                              <option  <?php echo (@set_value('company_business_look_one') == 3) ? 'selected':'';?> value="3">ผลิตและจัดจำหน่ายภายใต้แบรนด์ตนเอง </option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row clearfix">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default  ">
                            <label>จำนวนพนักงาน (คน) </label>
                            <input type="text" name="company_people" class="form-control" placeholder="" value="<?php echo set_value('company_people'); ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group form-group-default ">
                            <label>เลขทะเบียนนิติบุคคล </label><span class="text-danger"><?php echo form_error('company_num_regis'); ?></span>
                            <input type="text" name="company_num_regis" class="form-control" placeholder="" value="<?php echo set_value('company_num_regis'); ?>">
                          </div>
                        </div>
                      </div>
                     
                    </div>

                    <div id="group_two" style="display:none;">
                      <div class="row clearfix">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด </label>
                            <select style="width:100%" name="job_type_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                            
                              <option  <?php echo (@set_value('job_type_two') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('job_type_two') == 1) ? 'selected':'';?> value="1">งานฝีมือและหัตถกรรม</option>
                              <option  <?php echo (@set_value('job_type_two') == 2) ? 'selected':'';?> value="2">ศิลปการแสดง</option>
                              <option  <?php echo (@set_value('job_type_two') == 3) ? 'selected':'';?> value="3">ทัศนศิลป์</option>
                              <option  <?php echo (@set_value('job_type_two') == 4) ? 'selected':'';?> value="4">ดนตรี</option>
                              <option  <?php echo (@set_value('job_type_two') == 5) ? 'selected':'';?> value="5">ภาพยนตร์และวิดีทัศน์</option>
                              <option  <?php echo (@set_value('job_type_two') == 6) ? 'selected':'';?> value="6">การพิมพ์</option>
                              <option  <?php echo (@set_value('job_type_two') == 7) ? 'selected':'';?> value="7">การกระจายเสียง</option>
                              <option  <?php echo (@set_value('job_type_two') == 8) ? 'selected':'';?> value="8">ซอฟต์แวร์</option>
                              <option  <?php echo (@set_value('job_type_two') == 9) ? 'selected':'';?> value="9">การโฆษณา</option>
                              <option  <?php echo (@set_value('job_type_two') == 10) ? 'selected':'';?> value="10">การออกแบบ (รวมถึงแฟชั่น)</option>
                              <option  <?php echo (@set_value('job_type_two') == 11) ? 'selected':'';?> value="11">สถาปัตยกรรม</option>
                              <option  <?php echo (@set_value('job_type_two') == 12) ? 'selected':'';?> value="12">แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)</option>
                            </select>
                          </div>
                        </div>
                       
                      </div>
                      <div class="row clearfix">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>ลักษณะการทำงาน</label>
                            <select style="width:100%" name="company_work_look" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_work_look') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_work_look') == 1) ? 'selected':'';?> value="1">รับจ้างออกแบบอิสระ</option>
                              <option  <?php echo (@set_value('company_work_look') == 2) ? 'selected':'';?> value="2">ทำงานออกแบบอยู่ในบริษัทหรือแบรนด์</option>
                              <option  <?php echo (@set_value('company_work_look') == 3) ? 'selected':'';?> value="3">ออกแบบ ผลิตและจำหน่ายเอง</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group form-group-default form-group-default-selectFx ">
                            <label>ช่องทางการจำหน่าย</label>
                            <select style="width:100%" name="company_sell_way" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_sell_way') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_sell_way') == 1) ? 'selected':'';?> value="1">ออนไลน์ </option>
                              <option  <?php echo (@set_value('company_sell_way') == 2) ? 'selected':'';?> value="2">ร้านค้าหรือออกบูธ</option>
                            </select>
                          </div>
                        </div>


                      </div>
                      <div class="row clearfix">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>ประสบการณ์ที่ทำงานหรือทำธุรกิจ</label>
                            <select style="width:100%" name="company_service_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                            
                              <option  <?php echo (@set_value('company_service_two') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_service_two') == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                              <option  <?php echo (@set_value('company_service_two') == 2) ? 'selected':'';?> value="2">0 - 3 ปี</option>
                              <option  <?php echo (@set_value('company_service_two') == 3) ? 'selected':'';?> value="3">3 - 10 ปี</option>
                              <option  <?php echo (@set_value('company_service_two') == 4) ? 'selected':'';?> value="4">มากกว่า 10 ปี</option>

                
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row clearfix">

                        <div class="col-sm-12">
                          <div class="form-group form-group-default form-group-default-selectFx ">
                            <label>คุณสามารถรับจ้างผลิตสินค้าตามจำนวนได้หรือไม่  </label>
                            <select style="width:100%" name="company_product_build" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_product_build') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_product_build') == 1) ? 'selected':'';?> value="1">ได้ </option>
                              <option  <?php echo (@set_value('company_product_build') == 2) ? 'selected':'';?> value="2">ไม่ได้</option>
                            </select>
                          </div>
                        </div>
                        
                      </div>
                      
                    </div>
                  
                    <div id="group_three" style="display:none;">
                      <div class="row clearfix">
                        <div class="col-sm-6">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>การทำงานของคุณอยู่ในกลุ่มใด</label>
                            <select style="width:100%" id="company_group_product" name="company_group_product" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_group_product') == '') ? 'selected':'';?> value="">เลือก</option>
                              <option  <?php echo (@set_value('company_group_product') == 1) ? 'selected':'';?> value="1">งานไม้</option>
                              <option  <?php echo (@set_value('company_group_product') == 2) ? 'selected':'';?> value="2">งานทอผ้า/ย้อม</option>
                              <option  <?php echo (@set_value('company_group_product') == 3) ? 'selected':'';?> value="3">งานปั้น</option>
                              <option  <?php echo (@set_value('company_group_product') == 4) ? 'selected':'';?> value="4">งานจักรสาน</option>
                              <option  <?php echo (@set_value('company_group_product') == 5) ? 'selected':'';?> value="5">งานเขียนสีแต่งลาย</option>
                              <option  <?php echo (@set_value('company_group_product') == 6) ? 'selected':'';?> value="6">งานเครื่องเงิน</option>
                              <option  <?php echo (@set_value('company_group_product') == 7) ? 'selected':'';?> value="7">อื่นๆ โปรดระบุ</option>
                          
                            </select>
                            
                          </div>
                          <div class="row" id="company_group_product_detail" style="display:none;">
                              <div class="form-group form-group-default ">
                                <input type="text" name="company_group_product_detail" class="form-control" placeholder="" value="<?php echo set_value('company_group_product_detail'); ?>">
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>ประสบการณ์ทำงานหรือทำธุรกิจ</label>
                            <select style="width:100%" name="company_service_three" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                            
                              <option  <?php echo (@set_value('company_service_three') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_service_three') == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                              <option  <?php echo (@set_value('company_service_three') == 2) ? 'selected':'';?> value="2">0 - 3 ปี</option>
                              <option  <?php echo (@set_value('company_service_three') == 3) ? 'selected':'';?> value="3">3 - 10 ปี</option>
                              <option  <?php echo (@set_value('company_service_three') == 4) ? 'selected':'';?> value="4">มากกว่า 10 ปี</option>

                
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-sm-12">
                          <div class="form-group ">
                            <label>โปรดระบุเทคนิคหรือความเชี่ยวชาญที่ใช้ทำงาน </label>
                            <input type="text" name="company_technic[]" class="form-control" placeholder="" value="<?php echo '';  ?>">
                            <input type="text" name="company_technic[]" class="form-control" placeholder="" value="<?php echo '';  ?>">
                            <input type="text" name="company_technic[]" class="form-control" placeholder="" value="<?php echo '';  ?>">
                          </div>
                        </div>

                      </div>
                      <div class="row" >
                        <div class="col-sm-12">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label> การผลิตสินค้าหรือผลงานของคุณเป็นรูปแบบใด</label>
                            <select style="width:100%" name="company_product_detail" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_product_detail') == '') ? 'selected':'';?> value="" >เลือก</option>
                              <option  <?php echo (@set_value('company_product_detail') == 1) ? 'selected':'';?> value="1">แบบศิลปวัฒนธรรมดั้งเดิม </option>
                              <option  <?php echo (@set_value('company_product_detail') == 2) ? 'selected':'';?> value="2">แบบตามไอเดียที่คิดขึ้นใหม่</option>
                            </select>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                      <div class="col-sm-12">
                          <div class="form-group form-group-default  ">
                            <label>คุณสามารถผลิตได้จำนวน ชิ้น/ต่อเดือน </label>
                            <input type="text" name="company_num_product" class="form-control" placeholder="" value="<?php echo set_value('company_num_product'); ?>">
                          </div>
                        </div>
                            </div>
                    </div>

                    <div id="group_four" style="display:none;">
                      <div class="row clearfix">
                        <div class="col-sm-6" id="four_eig" style="display:none;">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>องค์กรของคุณคือหน่วยงานประเภทใด</label>
                            <select id="four_eig_detail"  style="width:100%" name="company_department" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_department') == '') ? 'selected':'';?> value="">เลือก</option>
                              <option  <?php echo (@set_value('company_department') == 2) ? 'selected':'';?> value="2">องค์กรระหว่างประเทศ </option>
                              <option  <?php echo (@set_value('company_department') == 3) ? 'selected':'';?> value="3">หน่วยงานภาครัฐ</option>
                              <option  <?php echo (@set_value('company_department') == 4) ? 'selected':'';?> value="4">สถาบันและพิพิธภัณฑ์</option>
                              <option  <?php echo (@set_value('company_department') == 5) ? 'selected':'';?> value="5">สื่อมวลชน</option>
                              <option  <?php echo (@set_value('company_department') == 6) ? 'selected':'';?> value="6">สมาคม</option>
                              <option  <?php echo (@set_value('company_department') == 7) ? 'selected':'';?> value="7">วัดและชุมชน</option>
                              <option  <?php echo (@set_value('company_department') == 8) ? 'selected':'';?> value="8">อื่นๆ</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6" id="four_nine" style="display:none;">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>องค์กรของคุณคือหน่วยงานประเภทใด</label>
                            <select id="four_nine_detail"  style="width:100%" name="company_department" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_department') == '') ? 'selected':'';?> value="">เลือก</option>
                              <option  <?php echo (@set_value('company_department') == 2) ? 'selected':'';?> value="2">มหาวิทยาลัย</option>
                              <option  <?php echo (@set_value('company_department') == 3) ? 'selected':'';?> value="3">วิทยาลัยอาชีวะศึกษา</option>
                              <option  <?php echo (@set_value('company_department') == 4) ? 'selected':'';?> value="4">วิทยาลัยเทคนิค</option>
                              <option  <?php echo (@set_value('company_department') == 5) ? 'selected':'';?> value="5">โรงเรียน</option>
                              <option  <?php echo (@set_value('company_department') == 6) ? 'selected':'';?> value="6">อื่นๆ</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group form-group-default  form-group-default-selectFx">
                            <label>หน้าที่หลักขององค์กร</label>
                            <select  style="width:100%" name="company_duty" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                              <option  <?php echo (@set_value('company_duty') == '') ? 'selected':'';?> value="">เลือก</option>
                              <option  <?php echo (@set_value('company_duty') == 1) ? 'selected':'';?> value="1">ส่งเสริมความคิดสร้างสรรค์ และการออกแบบ </option>
                              <option  <?php echo (@set_value('company_duty') == 2) ? 'selected':'';?> value="2">ส่งเสริมศิลปวัฒนธรรม </option>
                              <option  <?php echo (@set_value('company_duty') == 3) ? 'selected':'';?> value="3">ส่งเสริมความรับผิดชอบต่อสังคม</option>
                              <option  <?php echo (@set_value('company_duty') == 4) ? 'selected':'';?> value="4">ส่งเสริมการค้าและธุรกิจ</option>
                              <option  <?php echo (@set_value('company_duty') == 5) ? 'selected':'';?> value="5">ส่งเสริมวิชาชีพ</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row clearfix">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>คุณเคยร่วมงาน Design Week ใดๆ หรือไม่  </label><br>
                            <span class="checkbox check-success">
                                <input  <?php echo (@set_value('company_join_work') == 1) ? 'checked':'';?>  type="checkbox"  value="1" name="company_join_work" id="target_type3">
                                <label for="target_type3">เคย</label>
                              </span>
                              <span class="checkbox check-success">
                                <input  <?php echo (empty(@set_value('company_join_work'))) ? 'checked':'';?>  type="checkbox"  value="0" name="company_join_work" id="target_type4">
                                <label for="target_type4">ไม่เคย</label>
                              </span>
                          </div>
                        </div>

                      </div>
                    </div>
                </div>
                    <!-- end status group -->


                  <br>
               
                <div class="row clearfix">
                    <p style="">รูปโปรไฟล์</p>
                    <div class="col-sm-12">
                      <!-- <form  class="dropzone" id="form-regis-upload"> -->
                        <div class="fallback">
                          <input name="profile_img" type="file" size='20' />
                        </div>
                      <!-- </form> -->
                    </div>
                </div>
                  
                <div class="row m-t-10">
                  <div class="col-sm-12">
                    <div class="checkbox check-success  ">

                      <input type="checkbox" value="1" id="checkbox2" >
                      <label for="checkbox2" style="font-weight: bold;"> ฉันยอมรับและได้อ่านเงื่อนไข ข้อตกลงแล้ว</label>
                    </div>
                  
                  </div>
                </div>
               
                
              

              </div>

                
              <!-- </form> -->
            </div>
            <!-- <div class="tab-pane slide" id="tab3">
              <h2>ขอบคุณที่สมัครสมาชิก</h2>
              <p>คุณจะได้รับ E-mail ยืนยันการสมัครสมาชิกส่งไปยังอีเมล์ที่คุณกรอกมา กดปุ่มเสร็จสิ้นเพื่อดำเนินการต่อไป</p>
            </div> -->
            

            <ul class="pager wizard no-style">
              <li class="next">
                <button id="btn-next" class="btn btn-primary btn-cons btn-animated from-left fa fa-angle-right pull-right" type="button">
                  <span>ถัดไป <i class="fa fa-angle-right "></i></span>
                </button>
              </li>
              <!-- <a href="user_template.html"> -->
              <li class="next finish" style="display:none;">
                <button id="btn-finish" class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                  <span>ยืนยัน</span>
                </button>
              </li>
              <!-- </a> -->
              <li class="previous first" style="display:none;">
                <button class="btn btn-white btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                  <span>เริ่มใหม่</span>
                </button>
              </li>
              <li class="previous"  id ="previous_show" style="display:none;">
                <button   class="btn btn-white btn-cons pull-right" type="button">
                  <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
                </button>
              </li>
              <li class="previous_tmp" id ="previous_hide">
                <a  href="<?php echo base_url();?>"  class="btn btn-white btn-cons pull-right" type="button">
                  <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
                </a>
              </li>
            </ul>


          </div>
          <?php echo form_close(); ?>
        </div>

      
        <!-- end_from_w -->
      </div>

      <!-- จบฟอร์มแบบทั้งหมด -->
    



    </div>
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

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default"  data-dismiss="modal">ยืนยัน</button>
        </div>
      </div>
      
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
<script>
  $(function()
  {
    $('#form-register').validate()
    
  })
</script>
<script type="text/javascript">
    var domain='<?php  echo base_url().$this->uri->segment(1); ?>/';
</script>
<script>
  $(document).ready(function() {
    $('#myFormWizard').bootstrapWizard({
      onTabClick : function () {
        return false;
      },
      onNext: function(tab, navigation, index) {
        $( "#commany" ).toggle(true);
      },
      onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

              
            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
              
              
              $('#myFormWizard').find('.pager .next').hide();
              $('#myFormWizard').find('.pager .finish').show();
              $('#myFormWizard').find('.pager .finish').removeClass('disabled');
            } else {
              $('#back_home').attr('href','#');
              $('#myFormWizard').find('.pager .next').show();
              $('#myFormWizard').find('.pager .finish').hide();
            }

            var li = navigation.find('li a.active').parent();

            var btnNext = $('#myFormWizard').find('.pager .next').find('button');
            var btnPrev = $('#myFormWizard').find('.pager .previous').find('button');

            // remove fontAwesome icon classes
            function removeIcons(btn) {
              btn.removeClass(function(index, css) {
                return (css.match(/(^|\s)fa-\S+/g) || []).join(' ');
              });
            }

            if ($current > 1 && $current < $total) {
            
              var nextIcon = li.next().find('.fa');
              var nextIconClass = nextIcon.attr('class').match(/fa-[\w-]*/).join();

              removeIcons(btnNext);
              btnNext.addClass(nextIconClass + ' btn-animated from-left fa');

              var prevIcon = li.prev().find('.fa');
              var prevIconClass = prevIcon.attr('class').match(/fa-[\w-]*/).join();
              
              removeIcons(btnPrev);
              btnPrev.addClass(prevIconClass + ' btn-animated from-left fa');
            } else if ($current == 1) {
                $('#previous_hide').toggle(true);
                $('#previous_show').toggle(false);
                // remove classes needed for button animations from previous button
                btnPrev.removeClass('btn-animated from-left fa');
                removeIcons(btnPrev);
              } else {
                $('#previous_hide').toggle(false);
                $('#previous_show').toggle(true);
                // 
                // $('#back_home').attr('href','#');
                // remove classes needed for button animations from next button
                btnNext.removeClass('btn-animated from-left fa');
                removeIcons(btnNext);
              }
            }
          });
  });
</script>


<!-- validate form -->
<script>

  $(document).ready(function() {

    //check verifive email
    if ($('#msg').val() != ''){
      $('.modal-body').text($('#msg').val());
      $('#Success').modal('show');
    }
   
   
    //status job
    var group = $('#job').find(':selected').data('group');
    var group_id = $('#job').find(':selected').val();
    $('#job_group').val(group);
    switch (group) {
        case 1:
            $( "#group_one" ).toggle(true);
            break;
        case 2:
            $( "#group_two" ).toggle(true);
          break;
        case 3:
            $( "#group_three" ).toggle(true);
          break;
        case 4:
            if (group_id == 8){
              $('#four_nine_detail').prop('disabled', 'disabled');
              $('#four_eig_detail').prop('disabled', false);
              $( "#four_eig" ).toggle(true);
              $( "#four_nine" ).toggle(false);
            }else{
              $('#four_nine_detail').prop('disabled', false);
              $('#four_eig_detail').prop('disabled', 'disabled');
              $( "#four_nine" ).toggle(true);
              $( "#four_eig" ).toggle(false);
            }
            $( "#group_four" ).toggle(true);
          break;
      }
      
    
    //status job change 
    $('#job').change(function(){
  
      // $( "#foot" ).toggle(true);
      // $( "#group_four_bug" ).toggle(true);
      var group = $(this).find(':selected').data('group');
      var group_id = $('#job').find(':selected').val();
      $('#job_group').val(group);
      switch (group) {
        case 1:
            $( "#group_one" ).toggle(true);
            $( "#group_two" ).toggle(false);
            $( "#group_three" ).toggle(false);
            $( "#group_four" ).toggle(false);
            break;
        case 2:
            $( "#group_one" ).toggle(false);
            $( "#group_two" ).toggle(true);
            $( "#group_three" ).toggle(false);
            $( "#group_four" ).toggle(false);
          break;
        case 3:
            $( "#group_one" ).toggle(false);
            $( "#group_two" ).toggle(false);
            $( "#group_three" ).toggle(true);
            $( "#group_four" ).toggle(false);
          break;
        case 4:
            if (group_id == 8){
              $('#four_nine_detail').prop('disabled', 'disabled');
              $('#four_eig_detail').prop('disabled', false);
              $( "#four_eig" ).toggle(true);
              $( "#four_nine" ).toggle(false);
            }else{
              $('#four_nine_detail').prop('disabled', false);
              $('#four_eig_detail').prop('disabled', 'disabled');
              $( "#four_nine" ).toggle(true);
              $( "#four_eig" ).toggle(false);
            }

            $( "#group_one" ).toggle(false);
            $( "#group_two" ).toggle(false);
            $( "#group_three" ).toggle(false);
            $( "#group_four" ).toggle(true);
          break;
      }
        
    })

    //company_group_product
    var group_product = $('#company_group_product').find(':selected').val();
    $('#company_group_product').on('change', function() {
      if(this.value == 7){
        $( "#company_group_product_detail" ).toggle(true);
      }else{
        $( "#company_group_product_detail" ).toggle(false);
      }
    });
 

    //countries
    $( "#province" ).toggle(false);
    if (document.getElementById("country").value == 217){
      $( "#province" ).toggle(true);
    }

    $('#country').on('change', function() {
        if(this.value != 217){
          $( "#province" ).toggle(false);
        }else{
          $( "#province" ).toggle(true);
        }
    });
    //end country

    //register 
    $("input[name='company_join_work']").change(function() {
        $("input[name='company_join_work']").not(this).prop('checked', false);
    });

    $('#btn-finish').click(function(){
        
      //check confirm 
      if(!$('#checkbox2').is(":checked") ){
        alert('กรุณาคลิก!! ยอมรับและได้อ่าน เงื่อนไขการให้บริการ และ การรักษาความปลอดภัย ')
          return false;
      }
      //css loading

      $('#loading').toggle(true);
      $('#form-register').submit();
      
     
    });
 


  });

</script>



</body>
</html>