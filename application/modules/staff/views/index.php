    
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
                <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
                <!-- <li class="breadcrumb-item active">แดชบอร์ด</li> -->
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
                      <h3>กิจกรรมเปิดรับสมัคร</h3>
                      <!-- <p>คุณสามารถควบคุมและสร้างโครงการกิจกรรมได้จากนี่นี่ โดยการคลิกปุ่มสร้างด้านบน</p> -->
                      <?php if($this->session->userdata('sesUserType')==1){?>
                      <!-- <div class="pull-right">
                        <div class="col-xs-12">
                          <a id="show-modal" class="btn btn-primary btn-cons" href="<?php echo base_url('staff/project');?>"><i class="fa fa-plus"></i> สร้างกิจกรรม</a>
                        </div>
                      </div> -->
                      <?php }?>
                    </div>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <table class="table table-hover table-condensed table-detailed" id="detailedTable" style="font-family: 'dbch'">
                        <thead>
                          <tr>
                            <th style="width:35%">ชื่อกิจกรรม</th>
                            <th style="width:25%">ประเภท</th>
                            <th style="width:20%">สถานะ</th>
                            <th style="width:20%">อัพเดทล่าสุด</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($project as $key => $prj) { 
                              $diff=date_diff(date_create($prj->project_finish_date),date_create(date('Y-m-d')));

                               if($diff->format("%R%a")<0){
                                  $status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">เปิดรับสมัคร</span>';
                               }else{
                                  $status = '<span class=" label label-danger p-t-5 m-l-5 p-b-5 inline fs-12">ปิดรับสมัคร</span>';
                               }

                          ?>
                            <tr id="<?php echo $prj->project_id;?>">
                              <td class="v-align-middle semi-bold"><?php echo $prj->project_name;?></td>
                              <td class="v-align-middle semi-bold"><?php echo $prj->type_name;?></td>
                              <td class="v-align-middle"><?php echo $status;?></td>
                              <td class="v-align-middle"><?php $project_update = explode(' ', $prj->project_update); echo $this->mydate->date_2dot($project_update[0]).' '.$project_update[1];?></td>
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
                                <td width="10%" style="vertical-align:top">ระยะเวลารับสมัคร <p><?php echo $this->mydate->date_2dot($prj->register_start_date).' - '.$this->mydate->date_2dot($prj->register_finish_date);?></p> <br>
                                                                           วันเริ่มกิจกรรม <p><?php echo $this->mydate->date_2dot($prj->project_start_date).' - '.$this->mydate->date_2dot($prj->project_finish_date);?></p></td>
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
                    <div class="card-title" >
                      <h3 style="font-family: 'dbch'">ข่าวสาร</h3>
                      <p style="font-family: 'dbch'">คุณสามารถแจ้งข่าวสร้างหรือแจ้งเตือนผู้ใช้ของคุณโดยการสร้างข่าวสารใหม่ โดยระบบจะส่งข้อความไปยังผู้ใช้งานของคุณทั้งทางอีเมล์และผ่านหน้าเว็บ</p>
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
                        <div id="card-linear-color" class="card card-default card2" style="font-family: 'dbch' !important; ">
                          <div class="card-header ">
                            <div class="card-title" style="font-family: 'dbch' !important; font-size: 1.1em; ">ข่าวสาร</div>
                          </div>
                          <div class="card-block">
                            <div class="scrollable">
                              <div class="demo-card-scrollable">
                                  <h3 style="font-family: 'dbch' !important; "><span class="semi-bold"><?php echo $value->news_name; ?></span></h3>
                                  <p style="font-family: 'dbch' !important; "><?php echo $value->news_detail; ?></p>
                                  <p style="text-align: right;"><?php if($value->news_url){ ?>
                                   <a target="_blank" href="<?php echo $value->news_url;?>"><span class=" label p-t-5 m-l-5 p-b-5 inline fs-12">อ่านต่อ</span></a>
                                  <?php }?></p>
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