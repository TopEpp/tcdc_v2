<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>สมัครสมาชิก : CMDW</title>
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
<body class="fixed-header ">
  <div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
      <img src="<?php echo base_url('assets/img/logo_b.png'); ?>" alt="logo" data-src="<?php echo base_url('assets/img/logo_b.png'); ?>" data-src-retina="<?php echo base_url('assets/img/logo_b.png'); ?>" width="78">
      <h3>สร้างชื่อผู้ใช้งาน</h3>
      <p>
        เมื่อคุณมีชื่อผู้ใช้งานแล้วคุณสามารถสมัครเข้าร่วมโครงการต่างๆ ที่เราจัดขึ้นได้โดยกรอกข้อมูลที่เราต้องการด้านล่างนี้
      </p>

      <!-- เริ่มฟอร์มแบบขั้นตอน -->
      <!-- start_frome_w -->
      <div id="myFormWizard">


        <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
          <li class="nav-item">
            <a class="active" data-toggle="tab" href="#tab1" role="tab"><i class="fa fa-shopping-cart tab-icon"></i> <span>สร้างชื่อผู้ใช้</span></a>
          </li>
          <li class="nav-item">
            <a data-toggle="tab" href="#tab2" role="tab"><i class="fa fa-truck tab-icon"></i> <span>ข้อมูลส่วนตัว</span></a>
          </li>
          <li class="nav-item">
            <a data-toggle="tab" href="#tab3" role="tab"><i class="fa fa-check tab-icon"></i> <span>ยืนยันข้อมูล</span></a>
          </li>
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
                <div class="col-md-4">
                  <div class="form-group form-group-default required ">
                    <label>คำนำหน้า</label><span class="text-danger"><?php  echo  form_error('prename'); ?></span>
                    <select id="prename" name="prename" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
                                               
                      <option disable <?php echo (@set_value('prename') == '') ? 'selected':'';?> value="" >เลือก</option>
                      <option  <?php echo (@set_value('prename') == 1) ? 'selected':'';?> value="1">นาย</option>
                      <option  <?php echo (@set_value('prename') == 2) ? 'selected':'';?> value="2">นาง</option>
                      <option  <?php echo (@set_value('prename') == 3) ? 'selected':'';?> value="3">นางสาว</option>
                      <option  <?php echo (@set_value('prename') == 4) ? 'selected':'';?> value="4">อื่นๆ</option>
                    </select>
                    <div id="prename_detail" style="display:none;">
                      <input type="text" name="prename_detail" value="<?php echo @$prename;?>">
                    </div>
                  </div>
                </div>  
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>ชื่อจริง</label><span class="text-danger"><?php  echo  form_error('firstname'); ?></span>
                    <input type="text"  id="firstname" name="firstname" placeholder="โปรดระบุบชื่อจริง" class="form-control" value="<?php echo set_value('firstname'); ?>" >

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>นามสกุล</label><span class="text-danger"><?php echo form_error('lastname'); ?></span>
                    <input type="text" id="lastname" name="lastname" placeholder="โปรดระบุบนามสกุล" class="form-control" value="<?php echo set_value('lastname'); ?>">
      
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group form-group-default required">
                    <label>Email</label><span class="text-danger"><?php echo form_error('email'); ?></span>
                    <input type="text" id="email" name="email" placeholder="โปรดใส่อีเมล์ที่คุณต้องการ" class="form-control"  value="<?php //echo set_value('email'); ?>"  >
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group form-group-default required">
                    <label>Confirm Email</label> <span class="text-danger"><?php echo form_error('email_again'); ?></span>
                    <input type="text" id="email_again" name="email_again" placeholder="โปรดใส่อีเมล์อีกครั้ง" class="form-control" value="<?php //echo set_value('email_again'); ?>" >
                   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group form-group-default required">
                    <label>Password</label><span class="text-danger"><?php echo form_error('password'); ?></span>
                    <input type="password" id="password" name="password" placeholder="ตั้งรหัสผ่านอย่างน้อย 8 ตัวอักษร" class="form-control"  minlength="8"  pattern=".{8,}" value="<?php //echo set_value('password'); ?>" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group form-group-default required">
                    <label>Confirm Password</label><span class="text-danger"><?php echo form_error('password_again'); ?></span>
                    <input type="password" id="password_again" name="password_again" placeholder="พิมพ์รหัสผ่านใหม่อีกครั้ง" class="form-control"  minlength="8" value="<?php //echo set_value('password_again'); ?>">
                  </div>
                </div>
              </div>
              <div class="row m-t-10">
                <div class="col-lg-12">
                  <p><small>ฉันยอมรับและได้อ่าน <a href="#" class="text-info">เงื่อนไขการให้บริการ</a> และ <a href="#" class="text-info">การรักษาความปลอดภัย</a></small></p>
                </div>
              </div>
            <!-- </form> -->

          </div>
          <div class="tab-pane slide" id="tab2">

            <!-- <form id="form-regis-user" class="p-t-15" role="form" action="#"> -->

              <div class="form-group form-group-default required">
                <label>ที่อยู่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                <input type="text" name="address" class="form-control" placeholder="โปรดระบุบที่อยู่ปัจจุบันของคุณ" value="<?php echo set_value('address'); ?>">
              </div>

              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group form-group-default required">
                    <label>ตำบล/แขวง</label><span class="text-danger"><?php echo form_error('subdistrict'); ?></span>
                    <input type="text" name="subdistrict" class="form-control" placeholder="ระบุแขวงหรือตำบลของคุณ" value="<?php echo set_value('subdistrict'); ?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group form-group-default required">
                    <label>เขต/อำเภอ</label><span class="text-danger"><?php echo form_error('district'); ?></span>
                    <input type="text" name="district" class="form-control" placeholder="ระบุอำเภอของคุณ" value="<?php echo set_value('district'); ?>">
                  </div>
                </div>

              </div>

              <div class="row clearfix">

                <div class="col-sm-8">
                  <div class="form-group form-group-default required form-group-default-selectFx "><!--form-group-default-selectFx-->
                    <label>จังหวัด</label><span class="text-danger" style="text-align:center;"><?php echo form_error('province'); ?></span>
                    <select style="width:100%" name="province" class=" form-control" data-init-plugin="select2"  >
                      <option value="">เลือก</option>
                      <?php foreach ($province as $key => $value) { ?>
                        <?php 
                          $select = '';
                          if(set_value('province') == $value->name_th ){
                              $select =  'selected="selected"';
                          } ?>
                        <option <?php echo $select; ?>  value="<?php echo $value->name_th;?>"><?php echo $value->name_th;?></option>
                      <?php } ?>
                      
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group form-group-default required">
                    <label>รหัสไปรษณีย์</label><span class="text-danger"><?php echo form_error('zipcode'); ?></span>
                    <input type="text" name="zipcode" class="form-control" placeholder="ระบุรหัสไปรษณีย์ของคุณ"  pattern="[0-9]*"  value="<?php echo set_value('zipcode'); ?>">
                  </div>
                </div>

                <br>
                <p>รูปภาพโปรไฟล์</p>
                <div class="col-sm-12">
                  <!-- <form  class="dropzone" id="form-regis-upload"> -->
                    <div class="fallback">
                      <input name="profile_img" type="file" size='20' />
                    </div>
                  <!-- </form> -->
                </div>
              </div>
            <!-- </form> -->
          </div>
          <div class="tab-pane slide" id="tab3">
            <h2>ขอบคุณที่สมัครสมาชิก</h2>
            <p>คุณจะได้รับ E-mail ยืนยันการสมัครสมาชิกส่งไปยังอีเมล์ที่คุณกรอกมา กดปุ่มเสร็จสิ้นเพื่อดำเนินการต่อไป</p>
          </div>
          

          <ul class="pager wizard no-style">
            <li class="next">
              <button id="next" class="btn btn-primary btn-cons btn-animated from-left fa fa-truck pull-right" type="button">
                <span>ถัดไป</span>
              </button>
            </li>
            <!-- <a href="user_template.html"> -->
            <li class="next finish" style="display:none;">
              <button id="btn-finish" class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                <span>เสร็จสิ้น</span>
              </button>
            </li>
            <!-- </a> -->
            <li class="previous first" style="display:none;">
              <button class="btn btn-white btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                <span>เริ่มใหม่</span>
              </button>
            </li>
            <li class="previous">
              <button class="btn btn-white btn-cons pull-right" type="button">
                <span>ย้อนกลับ</span>
              </button>
            </li>
          </ul>


        </div>
      </div>

  <?php echo form_close(); ?>
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
<script>
  $(function()
  {
    $('#form-register').validate()
  })
</script>

<script>
  $(document).ready(function() {
    $('#myFormWizard').bootstrapWizard({
      onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
              $('#myFormWizard').find('.pager .next').hide();
              $('#myFormWizard').find('.pager .finish').show();
              $('#myFormWizard').find('.pager .finish').removeClass('disabled');
            } else {
              $('#myFormWizard').find('.pager .next').show();
              $('#myFormWizard').find('.pager .finish').hide();
            }

            var li = navigation.find('li.active');

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
                // remove classes needed for button animations from previous button
                btnPrev.removeClass('btn-animated from-left fa');
                removeIcons(btnPrev);
              } else {
                // remove classes needed for button animations from next button
                btnNext.removeClass('btn-animated from-left fa');
                removeIcons(btnNext);
              }
            }
          });
  });
</script>

<script type="text/javascript">
    var domain='<?php  echo base_url($this->uri->segment(1)) ?>';
</script>

<!-- validate form -->
<script>

  $(document).ready(function() {

    //prename
    if (document.getElementById("prename").value == 4){
      document.getElementById("prename_detail").style.display = "block";
    }
    $('#prename').on('change', function() {
        if(this.value == 4){
          document.getElementById("prename_detail").style.display = "block";
        }else{
          document.getElementById("prename_detail").style.display = "none";
        }
    })

    $('#btn-finish').click(function(){
      $('#form-register').submit();
    });
 


  });

</script>



</body>
</html>