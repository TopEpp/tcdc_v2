<!-- START PAGE CONTENT -->
      <div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?PHP echo base_url('staff')?>">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#">ผู้สมัคร</a></li>
                <li class="breadcrumb-item active"><?php echo $prj->project_name;?></li>
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
            <div class="row">

              <div class="col-lg-12">
                <!-- START card -->
                <div class="card card-transparent">
                  <div class="card-header ">
                    <div class="card-title">
                      <h3>ผู้สมัคร <?php echo $prj->project_name;?></h3>
                      <p></p>
                    </div>
                    <div class="pull-right" style="margin-right: 10px;">
                      <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="ค้นหา">
                      </div>
                    </div>



                    <div class="card-block">
                      <div class="table-responsive">

                        <table class="table table-hover table-condensed" id="table_user_reg" style="font-family: 'dbch' !important; ">
                          <thead>
                            <tr>
                            <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
                      Comman Practice Followed
                    -->
                    <th style="width:35%">ชื่อ-นามสกุล</th>
                    <th style="width:20%">วันที่สมัคร</th>
                    <th style="width:20%">สถานะ</th>
                    <th style="width:25%">การจัดการ</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($member_reg as $key => $mem) { 
                    $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">รอตรวจสอบ</span>';
                    if($mem->reg_status){
                      $reg_status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ผ่าน</span>';
                    }else if(!$mem->reg_status && $mem->approve_date){
                      $reg_status = '<span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">ไม่ผ่าน</span>';
                    } 
                 ?>
                  <tr>
                    <td class="v-align-middle semi-bold" style="font-family: 'dbch'"><?php echo $mem->member_name;?></td>
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
  </div>

  <!-- start news crade -->
  <!-- end news crade -->

  <!-- END PLACE PAGE CONTENT HERE -->
</div>
<!-- END CONTAINER FLUID -->
</div>
<!-- END PAGE CONTENT -->