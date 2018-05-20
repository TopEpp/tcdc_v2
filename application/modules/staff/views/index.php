    
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
      <!-- START PAGE CONTENT -->
      <div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">แดชบอร์ด</li>
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
                      <h3>แอพที่เปิดให้บริการ</h3>
                      <p>คุณสามารถควบคุมและสร้างโครงการกิจกรรมได้จากนี่นี่ โดยการคลิกปุ่มสร้างด้านบน</p>
                      <div class="pull-right">
                        <div class="col-xs-12">
                          <a id="show-modal" class="btn btn-primary btn-cons" href="<?php echo base_url('staff/project');?>"><i class="fa fa-plus"></i> สร้างโครงการ</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <table class="table table-hover table-condensed table-detailed" id="detailedTable">
                        <thead>
                          <tr>
                            <th style="width:35%">โครงการ</th>
                            <th style="width:25%">ประเภท</th>
                            <th style="width:20%">สถานะ</th>
                            <th style="width:20%">อัพเดทเมื่อ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($project as $key => $prj) { 
                              $diff=date_diff(date_create($prj->project_finish_date),date_create(date('Y-m-d')));

                               if($diff->format("%R%a")<0){
                                  $status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">เปิดให้บริการ</span>';
                               }else{
                                  $status = '<span class=" label label-danger p-t-5 m-l-5 p-b-5 inline fs-12">ปิดให้บริการ</span>';
                               }

                          ?>
                            <tr id="<?php echo $prj->project_id;?>">
                              <td class="v-align-middle semi-bold"><?php echo $prj->project_name;?></td>
                              <td class="v-align-middle semi-bold"><?php echo $prj->type_name;?></td>
                              <td class="v-align-middle"><?php echo $status;?></td>
                              <td class="v-align-middle"><?php echo $this->mydate->date_eng2thai($prj->project_update,543,'S');?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>

                      <?php foreach ($project as $key => $prj) { ?>
                        <div id="table-detail-<?php echo $prj->project_id;?>" style="display: none">
                          <table class="table table-inline" >
                            <tbody>
                              <tr>
                                <td width="60%" style="vertical-align:top">รายละเอียดกิจกรรม <p><?php echo $prj->project_detail;?></p></td>
                                <td width="10%" style="vertical-align:top">ผู้เข้าร่วม <?php echo $prj->num_reg?> ราย</td>
                                <td width="10%" style="vertical-align:top">ระยะเวลาสมัครกิจกรรม <p><?php echo $this->mydate->date_eng2thai($prj->register_start_date,543,'S').' - '.$this->mydate->date_eng2thai($prj->register_finish_date,543,'S');?></p> <br>
                                                                           วันเริ่มกิจกรรม <p><?php echo $this->mydate->date_eng2thai($prj->project_start_date,543,'S').' - '.$this->mydate->date_eng2thai($prj->project_finish_date,543,'S');?></p></td>
                                <td width="10%" style="vertical-align:top; text-align: center;"><a class="btn btn-bg-warning btn-cons m-t-10 fn_from" href="<?php echo base_url($this->uri->segment(1).'/staff/show_user/'.$prj->project_id)?>">เรียกดู</a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    <?php } ?>  
                    </div>
                  </div>
                </div>
                <!-- END card -->
              </div>
            </div>
          </div>

          <!-- start news crade -->
          <div class=" container-fluid   container-fixed-lg" style="padding-bottom: 50px;">
            <div class="row">
              <div class="col-lg-12">
                <div class="card card-transparent">
                  <div class="card-header ">
                    <div class="card-title">
                      <h3>ข่าวสาร</h3>
                      <p>คุณสามารถแจ้งข่าวสร้างหรือแจ้งเตือนผู้ใช้ของคุณโดยการสร้างข่าวสารใหม่ โดยระบบจะส่งข้อความไปยังผู้ใช้งานของคุณทั้งทางอีเมล์และผ่านหน้าเว็บ</p>
                      <!-- <div class="pull-right">
                        <div class="col-xs-12">
                          <a id="show-modal" class="btn btn-primary btn-cons" href="<?php echo base_url('staff/news');?>"><i class="fa fa-plus"></i> สร้างข่าวสาร</a>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>

                <div class="card-block">
                  <div class="row">
                    <?php foreach ($news as $key => $value) { ?>
                      <div class="col-lg-4">
                        <div id="card-linear-color" class="card card-default card2">
                          <div class="card-header ">
                            <div class="card-title"><?php echo $value->news_type; ?></div>
                          </div>
                          <div class="card-block">
                            <div class="scrollable">
                              <div class="demo-card-scrollable">
                                  <h3><span class="semi-bold"><?php echo $value->news_name; ?></span></h3>
                                  <p><?php echo $value->news_detail; ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

            
          </div>
          <!-- END PAGE CONTENT WRAPPER -->
        
        <!-- END PAGE CONTAINER -->