<!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('member'); ?>">หน้าแรก</a></li>
                  <!-- <li class="breadcrumb-item active">กิจกรรม</li> -->
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



              <!-- Modal fist login-->
              <input type="hidden" id="login" value="<?php echo @$first_login; ?>">
                <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="loginModal">Chiang Mai Design Week 2018</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ยินดีต้อนรับเข้าสู่ ระบบเทศกาลงานออกแบบเชียงใหม่ Chiang Mai Design Week 2018
                      </div>

                    </div>
                  </div>
                </div>
                <!-- check login -->
                <script>
                  setTimeout(function(){
                    var login =$('#login').val();
                    if (login == 0 ){
                      $('#loginModal').modal();
                    }

                  }, 1000);
                </script>

                <div class="card card-transparent">
                  <div class="card-header ">
                    <!-- status product -->
                    <?php if ($this->session->flashdata('msg')) {?>
                          <input type="hidden" id="msg" value="<?php echo $this->session->flashdata('msg'); ?>">
                      <?php $this->session->unset_userdata('msg');} else {?>
                        <input type="hidden" id="msg" value ="">
                    <?php }?>

                    <div class="card-title">
                      <h5>กิจกรรมเปิดรับสมัคร</h5>

                    </div>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive" style="font-family: 'dbch';">
                      <table class="table table-hover table-condensed table-detailed" id="detailedTable">
                        <thead>
                          <tr>
                            <th style="width:35%">ชื่อกิจกรรม</th>
                            <th style="width:25%">ประเภท</th>
                            <th style="width:20%">สถานะ</th>
                            <th style="width:20%">อัพเดตล่าสุด</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
foreach ($project as $key => $prj) {

    $diff = date_diff(date_create($prj->register_finish_date), date_create(date('Y-m-d')));

    if (!empty($status_regis[$prj->project_id]->status)) {
        if (@$status_regis[$prj->project_id]->reg_status) 
          $status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ได้เข้าร่วมกิจกรรม</span>';                         
        else
          $status = '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">สมัครแล้ว</span>';
    } else {
        $status = '<span class=" label label-danger p-t-5 m-l-5 p-b-5 inline fs-12">กดเพื่อสมัคร</span>';
    }

    ?>
                            <tr id="<?php echo $prj->project_id; ?>">
                              <td class="v-align-middle semi-bold"><?php echo $prj->project_name; ?></td>
                              <td class="v-align-middle semi-bold"><?php echo $prj->type_name; ?></td>
                              <td class="v-align-middle"><?php echo $status; ?></td>
                              <td class="v-align-middle"><?php if (!empty($prj->project_update)) {$project_update = explode(' ', $prj->project_update);
        echo $this->mydate->date_2dot($project_update[0]) . ' ' . $project_update[1];}?></td>
                            </tr>
                          <?php }?>
                        </tbody>
                      </table>

                      <?php foreach ($project as $key => $prj) {
    $diff = date_diff(date_create($prj->register_finish_date), date_create(date('Y-m-d')));

    if ($diff->format("%R%a") < 0) {
        $status = 1;
    } else {
        $status = 0;
    }
    ?>

                        <div id="table-detail-<?php echo $prj->project_id; ?>" style="display: none">
                          <table class="table table-condensed " >
                            <tbody>
                              <tr>
                                <td width="40%" style="vertical-align:top">รายละเอียด <p><?php echo $prj->project_detail; ?></p></td>
                                <?php if ($this->session->userdata('sesUserType') == 1) {?>
                                  <td width="5%" style="vertical-align:top">ผู้เข้าร่วม <?php echo $prj->num_reg; ?> ราย</td>

                                <?php } else {?>
                                  <td width="5%" style="vertical-align:top"></td>
                                <?php }?>
                                <?php $start_reg = explode('-', $prj->register_start_date);
    $end_reg = explode('-', $prj->register_finish_date);
    ?>
                                <td width="25%" style="vertical-align:top">ระยะเวลารับสมัคร <p><?php echo $start_reg[2] . '.' . $start_reg[1] . '.' . $start_reg[0] . ' - ' . $end_reg[2] . '.' . $end_reg[1] . '.' . $end_reg[0] ?></p>
                                ระยะเวลาจัดกิจกรรม <p><?php echo $this->mydate->date_2dot($prj->project_start_date) . ' - ' . $this->mydate->date_2dot($prj->project_finish_date); ?></p></td><br>

                                <?php if ($status) {
                                    $disable = '';
                                    if (@$status_regis[$prj->project_id]->reg_status) 
                                        $disable = 'disabled';
                                  
                                ?>
                                  <td width="20%" style="vertical-align:top; text-align: center;"><button <?= $disable;?>  style="color: white; background: #1dbb99;" class="btn btn-bg-success btn-cons m-t-10 fn_from" onclick="window.location.href='<?php echo base_url($this->uri->segment(1) . '/member/form/' . $prj->project_id).'\''; ?>">สมัคร</button></td>
                                <?php } else {?>
                                  <td width="20%" style="vertical-align:top; text-align: center;"><a style="color: white; background: #f35958;" class="btn btn-bg-success btn-cons m-t-10 fn_from" href="#">สมัคร</a></td>
                                <?php }?>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    <?php }?>
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
                          <h5>ข่าวสาร</h5>

                    </div>
                  </div>
                </div>


                <!-- news -->
                <div class="card-block">
                  <div class="row">

                  <?php foreach ($news as $key => $value) {?>
                    <div class="col-lg-4">
                      <div id="card-linear-color" class="card card-default card2">
                        <div class="card-header  ">
                          <div class="card-title"><?php echo ($value->news_type == 1) ? 'ประกาศ' : 'ประกาศแจ้ง'; ?>
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
                                  <h5>
                                    <span class="semi-bold"></span> <?php echo $value->news_name; ?></h5>
                                    <p><?php echo $value->news_detail; ?></p>
                                </div>
                              </div>
                                <br>
                                <p><?php echo ($value->news_type == 1) ? 'อ่านเพิ่มเติม' : ''; ?></p>
                        </div>

                      </div>
                    </div>
                  <?php }?>


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
                          <h5>
                            <span class="semi-bold">เปลี่ยนแปลง</span> สถานที่จัดงาน</h5>
                          <p>เนื่องจากมีการปิดปรับปรุงสถานที่เพื่อซ้อมแซม ทางผู้จัดการโครงการจึงจำเป็นต้องย้ายสถานที่จัดงานจากชั้นที่ 5 โรงแรมน้ำปิง มาเป็นชั้น 2 ห้อง A5 จึงขออภัยในความไม่สะดวกดังกล่าว
                          </p>
                        </div>
                      </div>
                    </div> -->
                    <?php foreach (@$alert_data as $key => $value) {
                      if ($value->reg_status){?>
                      <div class="col-lg-4" style="display:block;">
                        <div id="card-error" class="card card-default bg-success-light">
                          <div class="card-header ">
                            <div class="card-title">ข้อความ
                            </div>
                            <div class="card-controls">
                              <!-- <ul>
                                <li><a href="#" class="card-collapse" data-toggle="collapse"><i class="card-icon card-icon-collapse"></i></a>
                                </li>
                                <li><a href="#" class="card-refresh" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                                </li>
                                <li><a href="#" class="card-close" data-toggle="close"><i class="card-icon card-icon-close"></i></a>
                                </li>
                              </ul> -->
                            </div>
                          </div>
                          <div class="card-block">
                 
                            
                            <p class="text-white"> <span class="semi-bold text-white">  <?php echo $value->reject_detail;?></span></p>
                            <p class="text-white">
                            <?php echo 'ณ วันที่  '.  $this->mydate->date_2dot($value->approve_date);?>
                            </p>

                            <a class="btn bg-success-lighter btn-cons m-t-10 fn_from" href="<?php  echo base_url($this->uri->segment(1) . '/member/form/' . $value->project_id).'/1';?>">ดำเนินการ</a>
                          </div>
                        </div>
                      </div>

                      <?php }else{?>
                        <div class="col-lg-4" style="display:block;">
                        <div id="card-error" class="card card-default bg-danger-light">
                          <div class="card-header ">
                            <div class="card-title">แจ้งเตือน
                            </div>
                            <div class="card-controls">
                              <!-- <ul>
                                <li><a href="#" class="card-collapse" data-toggle="collapse"><i class="card-icon card-icon-collapse"></i></a>
                                </li>
                                <li><a href="#" class="card-refresh" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                                </li>
                                <li><a href="#" class="card-close" data-toggle="close"><i class="card-icon card-icon-close"></i></a>
                                </li>
                              </ul> -->
                            </div>
                          </div>
                          <div class="card-block">
                 
                            
                            <p class="text-white"> <span class="semi-bold text-white">  <?php echo $value->reject_detail;?></span></p>
                            <p class="text-white">
                            <?php echo 'ณ วันที่  '.  $this->mydate->date_2dot($value->approve_date);?>
                            </p>

                            <a class="btn bg-success-lighter btn-cons m-t-10 fn_from" href="<?php  echo base_url($this->uri->segment(1) . '/member/form/' . $value->project_id);?>">ดำเนินการ</a>
                          </div>
                        </div>
                      </div>
                     <?php }
                    ?>
                      
                    <?php } ?>
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




<div class="modal fade fill-in" id="Success" tabindex="-1" role="dialog" aria-labelledby="modalFillInLabel" aria-hidden="true">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    <i class="pg-close"></i>
</button>
<div class="modal-dialog ">
    <div class="modal-content">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                <div class="row">
                    <h1 class="text-left hinted-text p-t-10 p-r-10">
                      คุณได้สมัครเข้าร่วมกิจกรรมสำเร็จแล้ว<br>
                      เทศกาลงานออกแบบจะเแจ้งผลการพิจารณา <br>ให้ทราบทางอีเมลต่อไป
                    </h1>
            </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default"  data-dismiss="modal">กลับสู่กิจกรรม</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<script>
  setTimeout(function(){
    $(document).ready(function() {
          //check success form
        if ($('#msg').val() != ''){
            if ($('#msg').val() == 'true'){
              $('#Success').modal('show');
            }


        }
    });
  },1000);
</script>
