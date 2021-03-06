<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title><?php echo $this->template->title->default($this->config->item('title')); ?></title>
  <!-- <title>หน้าหลัก</title> -->
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
  <link href="<?php echo base_url('assets/css/pages-icons.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link class="main-stylesheet" href="<?php echo base_url('assets/css/themes/corporate.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/jquery-datatable/media/css/jquery.dataTables.css'); ?>">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css'); ?>">
  <link media="screen" type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/datatables.responsive.css'); ?>">
  <!-- <link media="screen" type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/selectize/css/selectize.css'); ?>"> -->

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
  .select2-container .select2-selection .select2-selection__arrow{
    right: 6px !important;
  }

  .form-group label:not(.error){
    text-transform: none;
  }
  .datepicker-years{
    cursor:pointer;
  }
  .datepicker table tr td span{
    margin: 1px;
  }

  .table tr th{
    font-family: 'dbch' !important;
  }

  .table tr td{
    font-family: 'dbch' !important;
  }
  .select2-container .select2-selection .select2-selection__arrow{
    right: 6px !important;
  }

  /* class active sub menu */
  .page-sidebar .sidebar-menu .menu-items li.active > a {
    color: #fff;
    <?php if ($this->session->userdata('sesUserType') == 3) {?>
      background-color:#a7a7a7;
    <?php } else {?>
      background-color:#d41a69;
    <?php }?>
  }

  .page-sidebar .sidebar-menu .menu-items li:hover > a,
  .page-sidebar .sidebar-menu .menu-items li.open > a,
  .page-sidebar .sidebar-menu .menu-items li.active > a {
    color: #fff;
    <?php if ($this->session->userdata('sesUserType') == 3) {?>
      background-color:#a7a7a7;
    <?php } else {?>
      background-color:#d41a69;
    <?php }?>
  }

  .page-sidebar .sidebar-menu .menu-items li >a{
    padding-top: 5px;
  }

  .dataTables_info{
    font-size: 0.8em !important;
  }

  .dataTables_paginate{
    font-size: 0.8em !important;
  }

  .dataTables_paginate .paginate_button{
    padding: 2px !important;
    font-size: 0.8em !important;
  }

  </style>

  <!-- <link media="screen" type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/datepicker3.css'); ?>"> -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
  <?php echo $this->template->stylesheet; ?>
</head>
<script type="text/javascript">
    var domain='<?php echo base_url() . $this->uri->segment(1); ?>/';
</script>
<body class="fixed-header menu-pin menu-behind">

  <!-- BEGIN SIDEBPANEL-->

  <!-- END SIDEBAR -->
  <!-- END SIDEBPANEL-->
  <!-- START PAGE-CONTAINER -->
  <div class="page-container ">
    <!-- START HEADER -->
    <div class="header ">
      <!-- START MOBILE SIDEBAR TOGGLE -->
      <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
      </a>
      <!-- END MOBILE SIDEBAR TOGGLE -->
      <div class="">
        <div class="brand inline  m-l-10 ">
          <a  href="<?php echo base_url('member'); ?>"><img width="130px" src="<?php echo base_url('assets/img/logo_dashboard.jpg'); ?> " alt="logo" data-src="<?php echo base_url('assets/img/logo_dashboard.jpg'); ?> " data-src-retina="<?php echo base_url('assets/img/logo_dashboard.jpg'); ?> "></a>
        </div>
      </div>
      <div class="d-flex align-items-center">
        <!-- START User Info-->
        <div class="pull-left p-r-10 fs-14" style="font-size: 16px !important; font-family: 'dbch'; ">
          <?=lang('Thai');?> <input type="checkbox" id="toggle_lang" class="switchery" value="1" data-switchery="true"  <?php echo $this->uri->segment(1) == 'en' ? 'checked="checked"' : ''; ?> > English
        </div>
        <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
          <span class="semi-bold"><?php echo $this->session->userdata('sesUserFullName'); ?></span>
        </div>
        <div class="dropdown pull-right hidden-md-down">
          <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="thumbnail-wrapper d32 circular inline">
            <!-- //profile image -->
            <?php
if ($this->session->userdata('sesUserImage')) {?>
                <img src="<?php echo base_url($this->session->userdata('sesUserImage')); ?>" alt="" data-src="<?php echo base_url($this->session->userdata('sesUserImage')); ?>" data-src-retina="<?php echo base_url($this->session->userdata('sesUserImage')); ?>" width="32" height="32">
                <!-- echo  cl_image_tag($this->session->userdata('sesUserImage'), array( "alt" => "profile" ));  -->
              <?php } else {?>
                <img src="<?php echo base_url('assets/img/profiles/avatar_small2x.jpg'); ?>" alt="" data-src="<?php echo base_url('assets/img/profiles/avatar_small2x.jpg'); ?>" data-src-retina="<?php echo base_url('assets/img/profiles/avatar_small2x.jpg'); ?>" width="32" height="32">
              <?php }?>

            </span>
          </button>
          <?php $type = [1 => 'Admin', 2 => 'Program Manager', 3 => 'Member', 4 => 'Editor'];?>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
            <a href="#" class="dropdown-item">
              <span>Login as <?php echo $type[$this->session->userdata('sesUserType')] ?></span>
            </a>
            <?php if ($this->session->userdata('sesUserType') != 1) {?>
            <a href="<?php echo base_url('staff/user_edit_profile/' . $this->session->userdata('sesUserID')); ?>" class="dropdown-item">
            <span class="pull-left"><?=lang('Settings');?></span>
              <!-- <span class="pull-right"><i class="pg-settings_small"></i></span> -->
          </a>
          <?php }?>
            <a href="<?php echo base_url('logout'); ?>" class="clearfix bg-master-lighter dropdown-item">
              <span class="pull-left"><?=lang('Sign out');?></span>
              <!-- <span class="pull-right"><i class="pg-power"></i></span> -->
            </a>
          </div>
        </div>
        <!-- END User Info-->

      </div>
    </div>
    <!-- END HEADER -->
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
      <nav class="page-sidebar" data-pages="sidebar" style="margin-top: 60px; <?php if ($this->session->userdata('sesUserType') != 3) {echo 'background-color:#A2144F; color:#fff;';}?>">
        <!-- START SIDEBAR MENU -->
        <div class="sidebar-menu fn_from">
          <!-- BEGIN SIDEBAR MENU ITEMS-->
          <ul class="menu-items">


            <?php if ($this->session->userdata('sesUserType') == 1) {?>
            <li class="m-t-30 <?php echo ($this->uri->segment(2) == 'staff' && $this->uri->segment(3) == '') ? 'active' : ''; ?>">
              <a href="<?php echo base_url('staff'); ?>"  <?php if ($this->session->userdata('sesUserType') != 3) {echo ' style="color:#fff";';}?> >
                <span class="title"><?php echo lang('Homepage'); ?></span>
                <!-- <span class="details">มี 3 การอัปเดท</span> -->
              </a>
              <!-- <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span> -->
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'staff' && ($this->uri->segment(3) == 'management' || $this->uri->segment(3) == 'project' || $this->uri->segment(3) == 'news')) ? 'active' : ''; ?>">
              <a href="<?php echo base_url('staff/management'); ?>"  <?php if ($this->session->userdata('sesUserType') != 3) {echo ' style="color:#fff";';}?> >
                <span class="title"><?php echo lang('manage'); ?></span>
                <!-- <span class="details">มี 10 การแจ้งเตือน</span> -->
              </a>
              <!-- <span class="bg-success icon-thumbnail"><i class="pg-mail"></i></span> -->
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'staff' && ($this->uri->segment(3) == 'show_user_register' || $this->uri->segment(3) == 'show_user')) ? 'active' : ''; ?>">
              <a href="<?php echo base_url('staff/show_user_register'); ?>"  <?php if ($this->session->userdata('sesUserType') != 3) {echo ' style="color:#fff";';}?> >
                <span class="title"><?php echo lang('joiner'); ?></span></a>
              <!-- <span class="bg-success icon-thumbnail"><i class="fa fa-history"></i></span> -->
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'staff' && ($this->uri->segment(3) == 'user_manage' || $this->uri->segment(3) == 'create_user' || $this->uri->segment(3) == 'user_edit_profile')) ? 'active' : ''; ?>">
              <a href="<?php echo base_url('staff/user_manage'); ?>"  <?php if ($this->session->userdata('sesUserType') != 3) {echo ' style="color:#fff";';}?> >
                <span class="title"><?php echo lang('user'); ?></span></a>
              <!-- <span class="bg-success icon-thumbnail"><i class="fa fa-user"></i></span> -->
            </li>
            <!-- <li class="">
              <a href="<?php echo base_url('staff/faq'); ?>"><span class="title"><?php echo lang('help'); ?></span></a>
              <span class="icon-thumbnail"><i class="fa fa-question-circle"></i></span>
            </li> -->


            <?php } else if ($this->session->userdata('sesUserType') == 2 || $this->session->userdata('sesUserType') == 4) {?>
            <li class="m-t-30 <?php echo ($this->uri->segment(2) == 'staff' && $this->uri->segment(3) == '') ? 'active' : ''; ?>">
              <a href="<?php echo base_url('staff'); ?>"  <?php if ($this->session->userdata('sesUserType') != 3) {echo ' style="color:#fff";';}?> >
                <span class="title"><?php echo lang('Homepage'); ?></span>
                <!-- <span class="details">มี 3 การอัปเดท</span> -->
              </a>
              <!-- <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span> -->
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'staff' && $this->uri->segment(3) == 'news') ? 'active' : ''; ?>">
              <a href="<?php echo base_url('news'); ?>"  <?php if ($this->session->userdata('sesUserType') != 3) {echo ' style="color:#fff";';}?> >
                <span class="title"><?php echo lang('news'); ?></span>
              </a>
              <!-- <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span> -->
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'staff' && $this->uri->segment(3) == 'show_user_register') ? 'active' : ''; ?>">
              <a href="<?php echo base_url('staff/show_user_register'); ?>"  <?php if ($this->session->userdata('sesUserType') != 3) {echo ' style="color:#fff";';}?> >
                <span class="title"><?php echo lang('Profile'); ?></span></a>
              <!-- <span class="bg-success icon-thumbnail"><i class="fa fa-history"></i></span> -->
            </li>
            <!-- <li class="">
              <a href="<?php echo base_url('faq'); ?>" class="detailed">
                <span class="title"><?php echo lang('help'); ?></span>
              </a>
              <span class="icon-thumbnail"><i class="fa fa-question-circle"></i></span>
            </li> -->


            <?php } else if ($this->session->userdata('sesUserType') == 3) {?>
            <li class="m-t-30 <?=($this->uri->segment(2) == 'member' && $this->uri->segment(3) == '') ? 'active' : '';?>">
              <a href="<?php echo base_url('member'); ?>" class="detailed">
                <span class="title"><?php echo lang('Homepage'); ?></span>
              </a>
              <!-- <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span> -->
            </li>
            <li class="<?=($this->uri->segment(2) == 'news') ? 'active' : '';?>">
              <a href="<?php echo base_url('news'); ?>" class="detailed">
                <span class="title"><?php echo lang('news'); ?></span>
              </a>
              <!-- <span class="bg-success icon-thumbnail"><i class="pg-mail"></i></span> -->
            </li>
            <li class="<?=($this->uri->segment(2) == 'member' && $this->uri->segment(3) == 'event_log') ? 'active' : '';?>">
              <a href="<?php echo base_url('member/event_log'); ?>" class="detailed">
                <span class="title"><?php echo lang('Profile'); ?></span>
              </a>
              <!-- <span class="icon-thumbnail"><i class="fa fa-history"></i></span> -->
            </li>
            <!-- <li class="">
              <a href="<?php echo base_url('faq'); ?>" class="detailed">
                <span class="title"><?php echo lang('help'); ?></span>
              </a>
              <span class="icon-thumbnail"><i class="fa fa-question-circle"></i></span>
            </li> -->
            <?php }?>
          </ul>
          <div class="clearfix"></div>
        </div>
        <!-- END SIDEBAR MENU -->
      </nav>
      <!-- START PAGE CONTENT -->
      <!-- <div class="content "> -->
             <?php echo $this->template->content; ?>
      <!-- </div> -->
      <div class=" container-fluid  container-fixed-lg footer" style="padding-left: 60px">
              <div class="copyright sm-text-center">
                <p class="small no-margin pull-left sm-pull-reset">
                  <span class="hint-text">Copyright &copy; 2018 </span>
                  <span class="">TCDC Chiang Mai</span>.
                  <span class="hint-text">All rights reserved. </span>
                  <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
                </p>

                <div class="clearfix"></div>
              </div>
            </div>
            <!-- END COPYRIGHT -->
    </div>


        <!-- END QUICKVIEW-->
        <!-- START OVERLAY -->

        <!-- END OVERLAY -->
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
        <script src="<?php echo base_url('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/jquery-validation/js/jquery.validate.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js'); ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables-responsive/js/datatables.responsive.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables-responsive/js/lodash.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap-toggle.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
        <!-- <script src="<?php echo base_url('assets/plugins/selectize/js/selectize.js'); ?>"></script> -->

        <!-- END VENDOR JS -->
        <!-- BEGIN CORE TEMPLATE JS -->
        <script src="<?php echo base_url('assets/js/pages.js'); ?>"></script>
        <!-- END CORE TEMPLATE JS -->
        <!-- BEGIN PAGE LEVEL JS -->
        <script src="<?php echo base_url('assets/js/tables.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/form_wizard.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/scripts.js'); ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL JS -->

        <script type="text/javascript">
          $(function() {

            $('.datepicker-range').datepicker({ format: 'dd/mm/yyyy' });

            $('#wysiwyg5').wysihtml5();
            $('.wysiwyg').wysihtml5();

            var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
            elems.forEach(function(html) {
              var switchery = new Switchery(html, {color: '#10CFBD', size : 'small'});
            });

            var initTableWithPage = function() {
                var table = $('.table_pageing');

                var settings = {

                    "sDom": "<t><'row'<p i>>",
                    "destroy": true,
                    "scrollCollapse": true,
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ ",
                        "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                    },
                    "bPaginate": true,
                    "aLengthMenu": [
                      [5, 10, 25, 50, -1],
                      [5, 10, 25, 50, "All"]
                    ],
                    "iDisplayLength": 5
                };

                table.dataTable(settings);

                // search box for table
                // $('#search-table').keyup(function() {
                //     table.fnFilter($(this).val());
                // });

                $('#table_pageing_length').change(function(){
                  var settings = {

                      "sDom": "<t><'row'<p i>>",
                      "destroy": true,
                      "scrollCollapse": true,
                      "oLanguage": {
                          "sLengthMenu": "_MENU_ ",
                          "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                      },
                      "bPaginate": true,
                      "aLengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                      ],
                      "iDisplayLength": this.value
                  };
                    table.dataTable(settings);
                });
            }

            initTableWithPage();

          });

          var changeCheckbox = document.querySelector('.switchery');

          changeCheckbox.onchange = function() {
            if(changeCheckbox.checked){
              lang = 'en';
            }else{
              lang = 'th';
            }

            window.location.href='<?php echo base_url(); ?>'+lang+'/<?php echo $this->uri->segment(2) . "/" . $this->uri->segment(3) . "/" . $this->uri->segment(4) ?>';

            // var URL = '<?php echo base_url(); ?>'+lang+'/login/set_lang/'+lang;
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
        <?php echo $this->template->javascript; ?>

      </body>
      </html>