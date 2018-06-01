<!-- START PAGE CONTENT -->
      <div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                <li class="breadcrumb-item active"><a href="#">ผู้เข้าร่วม</a></li>
              </ol>
              <!-- END BREADCRUMB -->
            </div>
          </div>
        </div>
        <!-- END JUMBOTRON -->
        <!-- START CONTAINER FLUID -->
        <div class=" container-fluid   container-fixed-lg">
          <!-- BEGIN PlACE PAGE CONTENT HERE -->
          <div class=" container-fluid   container-fixed-lg">
            <div id="rootwizard" class="m-t-50">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <?php 
                  $first = true; $active = 'active';
                  foreach ($project_type as $key => $ptype) {  ?>
                  <li class="nav-item">
                    <a class="<?php if($first){ echo 'active';} ?>" data-toggle="tab" href="#tab<?php echo $ptype->type_id?>" role="tab"><i class="pg-outdent tab-icon"></i> <span><?php echo $ptype->type_name?></span></a>
                  </li>
                <?php $first = false;} ?>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <?php 
                  $first = true; $active = 'active';
                  foreach ($project_type as $key => $ptype) {  ?>
                  <div class="tab-pane padding-20 sm-no-padding <?php if($first){ echo 'active';} ?> slide-left" id="tab1">
                    <?php foreach ($project as $key => $prj) { 
                          if($prj->project_type==$ptype->type_id){?>
                      <div class="col-lg-12">
                        <!-- START card -->
                        <div class="card card-transparent">
                          <div class="card-header ">
                            <div class="card-title">
                              <h3>ผู้ขอเข้าร่วม <?php echo $prj->project_name;?></h3>
                              <p></p>
                            </div>
                            <div class="card-block">
                              <div class="table-responsive">

                                <table class="table table-hover table-condensed" id="condensedTable">
                                  <thead>
                                    <tr>
                                      <th style="width:40%">ชื่อ - สกุล</th>
                                      <th style="width:20%">เวลาที่ลงทะเบียน</th>
                                      <th style="width:20%">สถาณะ</th>
                                      <th style="width:20%">การดำเนินการ</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($member_reg[$prj->project_id] as $key => $mem) { 
                                    $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">รอตรวจสอบ</span>';
                                    if($mem->reg_status){
                                      $reg_status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ผ่าน</span>';
                                    } 
                                 ?>
                                  <tr>
                                    <td class="v-align-middle semi-bold"><?php echo $mem->member_name;?></td>
                                    <td class="v-align-middle"><?php echo $this->mydate->date_eng2thai($mem->reg_date,543,'S');?></td>
                                    <td class="v-align-middle semi-bold"><?php echo $reg_status;?></td>
                                      <td class="v-align-middle semi-bold"><a href="<?php echo base_url($this->uri->segment(1).'/project_manage/index/'.$prj->project_id.'/'.$mem->user_id)?>"><i class="fa fa-edit"></i> จัดการ</a>
                                    </td>
                                  </tr>
                                <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                        <!-- END card -->
                      </div>
                    </div>
                      <?php }} ?>
                 </div>
               <?php $first = false;} ?>
             </div>
           </div>
        </div>
          <!-- END PLACE PAGE CONTENT HERE -->
        </div>
        <!-- END CONTAINER FLUID -->
      