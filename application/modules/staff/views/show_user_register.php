<!-- START PAGE CONTENT -->
      <div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?PHP echo base_url('staff')?>">หน้าแรก</a></li>
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
            
          <h3 style="font-family: 'dbch' !important; ">การจัดการผู้สมัคร</h3>
            <div id="rootwizard" class="m-t-50">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <?php 
                  $first = true; $active = 'active'; 
                  foreach ($project_type as $key => $ptype) { if($ptype->type_id==5){ continue;} ?>
                  <li class="nav-item">
                    <a class="<?php if($first){ echo 'active';} ?> tab_btn" id="tab_btn_<?php echo $key?>"  data-toggle="tab" href="#tab<?php echo $ptype->type_id?>" role="tab"><i class="pg-outdent tab-icon" style="font-size: 0.8em;"></i> <span  style="font-size: 0.9em;"> <?php echo $ptype->type_name?></span></a>
                  </li>
                <?php $first = false;} ?>
              </ul>
              
              <!-- Tab panes -->
              <div class="tab-content">
                <?php 
                  $first = true; $active = 'active'; $table_prj_id='';
                  foreach ($project_type as $key => $ptype) {  if($ptype->type_id==5){ continue;}?>
                  <div class="tab-pane padding-20 sm-no-padding <?php if($first){ echo 'active';} ?> slide-left" id="tab<?php echo $key;?>">
                    <?php 
                          foreach ($project as $key => $prj) { 
                          if($prj->project_type==$ptype->type_id){  $table_prj_id .= $prj->project_id.','; ?>
                      <div class="col-lg-12">
                        <!-- START card -->
                        <div class="card card-transparent">
                          <div class="card-header ">
                            <div class="card-title">
                              <h3 style="font-family: 'dbch' !important; ">ผู้สมัคร : <?php echo $prj->project_name;?></h3>
                              <p></p>
                            </div>
                            <div class="pull-right" style="margin-right: 10px;">
                              <div class="col-xs-12">
                                <div class="btn btn-default" onclick="window.open('<?php echo base_url('staff/export_user/'.$prj->project_id)?>')">Download ข้อมูลผู้สมัคร</div>
                              </div>
                            </div>

                            <div class="pull-right" style="margin-right: 10px;">
                              <div class="col-xs-12">
                                <input type="text" id="search-table_<?php echo $prj->project_id?>" class="form-control pull-right" placeholder="ค้นหา">
                              </div>
                            </div>
                            
                            <div class="card-block">
                              <div class="table-responsive">

                                <table class="table table-hover demo-table-search table-responsive-block" id="table_<?php echo $prj->project_id?>">
                                  <thead>
                                    <tr>
                                      <th style="width:35%">ชื่อ-นามสกุล</th>
                                      <th style="width:20%">วันที่สมัคร</th>
                                      <th style="width:20%">สถานะ</th>
                                      <th style="width:25%">การจัดการ</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($member_reg[$prj->project_id] as $key => $mem) { 
                                    $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">รอตรวจสอบ</span>';
                                    if($mem->reg_status){
                                      $reg_status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ผ่าน</span>';
                                    } else if(!$mem->reg_status && $mem->approve_date){
                                      $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">ไม่ผ่าน</span>';
                                    } 
                                 ?>
                                  <tr>
                                    <td class="v-align-middle semi-bold"  style="font-family: 'dbch'"><?php echo $mem->member_name;?></td>
                                    <td class="v-align-middle"><?php echo $this->mydate->date_eng2thai($mem->reg_date,543,'S');?></td>
                                    <td class="v-align-middle semi-bold"><?php echo $reg_status;?></td>
                                      <td class="v-align-middle semi-bold"><a href="<?php echo base_url($this->uri->segment(1).'/project_manage/index/'.$prj->project_id.'/'.$mem->user_id)?>"><i class="fa fa-edit"></i> แก้ไข</a>
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
        <input type="hidden" id="table_prj_id" value="<?php echo $table_prj_id?>">
        <!-- END CONTAINER FLUID -->
      