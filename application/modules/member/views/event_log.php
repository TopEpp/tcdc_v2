<!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('member');?>">หน้าแรก</a></li>
                  <li class="breadcrumb-item active">ประวัติ</li>
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
                      <h3>ประวัติ</h3>
                      <p style="font-family: 'dbch';font-size: 24px;">คุณสามารถค้นหากิจกรรมที่คุณเคยเข้าร่วมได้จากหน้านี้โดยข้อมูลจะแสดงเรียงลำดับด้านล่างนี้</p>
                    </div>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                    <div class="card-block">
                    <div class="table-responsive">
                      <table class="table table-hover table-condensed table-detailed" id="detailedTable">
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

                            ?>
                              <tr id="<?php echo $prj->project_id;?>">
                                <td class="v-align-middle semi-bold"><?php echo $prj->project_name;?></td>
                                <td class="v-align-middle semi-bold"><?php echo $prj->type_name;?></td>
                                <td class="v-align-middle"><?php echo ($prj->reg_status == 1) ? 'สำเร็จแล้ว':'รอยืนยัน'; ?></td>
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
                                  <td width="10%" style="vertical-align:top"></td>
                                  <td width="10%" style="vertical-align:top">ระยะเวลาสมัครกิจกรรม <p><?php echo $this->mydate->date_eng2thai($prj->register_start_date,543,'S').' - '.$this->mydate->date_eng2thai($prj->register_finish_date,543,'S');?></p> <br>
                                                                            วันเริ่มกิจกรรม <p><?php echo $this->mydate->date_eng2thai($prj->project_start_date,543,'S').' - '.$this->mydate->date_eng2thai($prj->project_finish_date,543,'S');?></p></td>
                                  <td width="10%" style="vertical-align:top; text-align: center;"><a class="btn btn-bg-warning btn-cons m-t-10 fn_from" href="<?php echo base_url($this->uri->segment(1).'/member/event_form/'.$prj->project_id)?>">เรียกดู</a></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        <?php } ?>  
                    </div>
                  </div>
                    </div>
                  </div>
                </div>
                <!-- END card -->
              </div>
            </div>
          </div>

              

            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->