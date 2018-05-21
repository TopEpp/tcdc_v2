<!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                  <li class="breadcrumb-item active">แอพของฉัน</li>
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
                    <!-- status product -->
                    <?php             
                      if($this->session->flashdata('msg')){
                          echo $this->session->flashdata('msg');
                          $this->session->unset_userdata('msg');
                        } 
                      ?>
                    <div class="card-title">
                      <h3>แอพของฉัน</h3>
                      <p>รวบรวมกิจกรรมและงานที่คุณสามารถสมัครได้</p>
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
                              $diff=date_diff(date_create($prj->register_finish_date),date_create(date('Y-m-d')));

                               if(@$status[$key]['reg_status'] == 1){
                                  $status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">เข้าร่วมแล้ว</span>';
                               }else{
                                  $status = '<span class=" label label-danger p-t-5 m-l-5 p-b-5 inline fs-12">ยังไม่ได้เข้าร่วม</span>';
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

                      <?php foreach ($project as $key => $prj) { 
                         $diff=date_diff(date_create($prj->register_finish_date),date_create(date('Y-m-d')));

                         if($diff->format("%R%a")<0){
                            $status = 1;
                         }else{
                            $status = 0;
                         }
                        ?>
                        <div id="table-detail-<?php echo $prj->project_id;?>" style="display: none">
                          <table class="table table-inline" >
                            <tbody>
                              <tr>
                                <td width="60%" style="vertical-align:top">รายละเอียดกิจกรรม <p><?php echo $prj->project_detail;?></p></td>
                                <td width="10%" style="vertical-align:top">ผู้เข้าร่วม <?php echo $prj->num_reg;?> ราย</td>
                                <td width="10%" style="vertical-align:top">ระยะเวลาสมัครกิจกรรม <p><?php echo $this->mydate->date_eng2thai($prj->register_start_date,543,'S').' - '.$this->mydate->date_eng2thai($prj->register_finish_date,543,'S');?></p> <br>
                                                                           วันเริ่มกิจกรรม <p><?php echo $this->mydate->date_eng2thai($prj->project_start_date,543,'S').' - '.$this->mydate->date_eng2thai($prj->project_finish_date,543,'S');?></p></td>
                                <?php if ($status) {?>
                                  <td width="10%" style="vertical-align:top; text-align: center;"><a class="btn btn-bg-success btn-cons m-t-10 fn_from" href="<?php echo base_url($this->uri->segment(1).'/member/event_form/'.$prj->project_id)?>">เข้าร่วม</a></td>
                                <?php }else{ ?>
                                  <td width="10%" style="vertical-align:top; text-align: center;"><a class="btn btn-bg-success btn-cons m-t-10 fn_from" href="#">เข้าร่วม</a></td>
                                <?php } ?>
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
              <div class=" container-fluid   container-fixed-lg">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card card-transparent">
                      <div class="card-header ">
                        <div class="card-title">
                          <h3>ข่าวสาร</h3>
                          <p>ติดตามข้อมูลของเราได้ง่ายๆ เพียงแค่เข้าสู่ระบบมายังหน้าหลัก</p>
                    </div>
                  </div>
                </div>


                <!-- news -->
                <div class="card-block">
                  <div class="row">
                  
                  <?php foreach ($news as $key => $value) { ?>
                    <div class="col-lg-4">
                      <div id="card-linear-color" class="card card-default card2">
                        <div class="card-header  ">
                          <div class="card-title"><?php echo ($value->news_type == 1)? 'ข่าวด่วน':'ประกาศแจ้ง' ; ?>
                          </div>
                          <div class="card-controls">
                            <ul>
                              <li><a href="#" class="card-collapse" data-toggle="collapse"><i class="card-icon card-icon-collapse"></i></a>
                              </li>
                              <li><a href="#" class="card-refresh" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                              </li>
                              <li><a href="#" class="card-close" data-toggle="close"><i class="card-icon card-icon-close"></i></a>
                              </li>
                            </ul>
                          </div>
                        </div>

                        <div class="card-block">
                          <div class="scrollable">
                                <div class="demo-card-scrollable">
                                  <h3>
                                    <span class="semi-bold"></span> <?php echo $value->news_name;?></h3>
                                    <p><?php echo $value->news_detail; ?></p>
                                </div>
                              </div>
                                <br>
                                <p><?php echo ($value->news_type == 1) ? 'อ่านเพิ่มเติม' :'';?></p>
                        </div>

                      </div>
                    </div>
                  <?php } ?>
                   
                    
                    <!-- <div class="col-lg-4">
                      <div id="card-circular-color" class="card card-default card2">
                        <div class="card-header  ">
                          <div class="card-title">ประกาศแจ้ง
                          </div>
                          <div class="card-controls">
                            <ul>
                              <li><a href="#" class="card-collapse" data-toggle="collapse"><i
                        class="card-icon card-icon-collapse"></i></a>
                              </li>
                              <li><a href="#" class="card-refresh" data-toggle="refresh"><i
                        class="card-icon card-icon-refresh"></i></a>
                              </li>
                              <li><a href="#" class="card-close" data-toggle="close"><i
                        class="card-icon card-icon-close"></i></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="card-block">
                          <h3>
                            <span class="semi-bold">เปลี่ยนแปลง</span> สถานที่จัดงาน</h3>
                          <p>เนื่องจากมีการปิดปรับปรุงสถานที่เพื่อซ้อมแซม ทางผู้จัดการโครงการจึงจำเป็นต้องย้ายสถานที่จัดงานจากชั้นที่ 5 โรงแรมน้ำปิง มาเป็นชั้น 2 ห้อง A5 จึงขออภัยในความไม่สะดวกดังกล่าว 
                          </p>
                        </div>
                      </div>
                    </div> -->

                    <div class="col-lg-4">
                      <div id="card-error" class="card card-default bg-danger-light">
                        <div class="card-header ">
                          <div class="card-title">แจ้งจากระบบ
                          </div>
                          <div class="card-controls">
                            <ul>
                              <li><a href="#" class="card-collapse" data-toggle="collapse"><i
                        class="card-icon card-icon-collapse"></i></a>
                              </li>
                              <li><a href="#" class="card-refresh" data-toggle="refresh"><i
                        class="card-icon card-icon-refresh"></i></a>
                              </li>
                              <li><a href="#" class="card-close" data-toggle="close"><i
                        class="card-icon card-icon-close"></i></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="card-block">
                          <h3  class="text-white">
                          ตรวจพบ <span class="semi-bold text-white">ข้อมูลไม่ครบ</span></h3>
                          <p class="text-white">คุณได้ทำการกรอกข้อมูลที่เราต้องการไม่ครบหรือขาดหายไป ทำให้เราไม่สามารถดำเนินการในขั้นตอนต่อไปกับการร้องขอของคุณได้ คุณสามารถดำเนินการแก้ไขข้อผิดพลาดได้เพียงแค่คลิก "ดำเนินการ"
                          </p>
                          <p class="text-white">ปัญหาที่พบ : <span class="semi-bold text-white">ข้อมูลบริษัท , ใบอนุญาติประกอบธุรกิจ</span></p>
                          
                          <a class="btn bg-success-lighter btn-cons m-t-10 fn_from" href="event_from_user.html#tab2">ดำเนินการ</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



              </div>
            </div>
          </div>


              <!-- end news crade -->

            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->