<!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                  <li class="breadcrumb-item active">การจัดการผู้ใช้</li>
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

             <!-- status create -->
             <?php             
              if($this->session->flashdata('msg')){
                  echo $this->session->flashdata('msg');
                  $this->session->unset_userdata('msg');
                } 
              ?>
            <div class="card card-transparent">
              <div class="card-header ">
                <div class="card-title"><h2>การจัดการผู้ใช้งาน</h2>
                </div>
                
                <div class="pull-right">
                  <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                  </div>
                </div>

                <div class="pull-right">
                  <div class="col-xs-12">
                      <a id="show-modal" class="btn btn-primary btn-cons" href="<?php echo base_url('staff/create_user'); ?>"><i class="fa fa-plus"></i> สร้างผู้ใช้</a>
                  </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              <div class="card-block">
                <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                  <thead>
                    <tr>
                      <th>ชื่อ - สกุล</th>
                      <th>E-Mail</th>
                      <th>กิจกรรมล่าสุด</th>
                      <th>สถานะบัญชี</th>
                      <th>สถานะล่าสุด</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                          <td class="v-align-middle semi-bold">
                            <p><?php echo $value->firstname .' '.$value->lastname; ?></p>
                          </td>
                          <td class="v-align-middle">
                            <p><?php echo $value->email; ?></p>
                          </td>
                          <td class="v-align-middle">
                            <p><?php echo (@$regisprj[$value->user_id])?$regisprj[$value->user_id]:'- ไม่ยังไม่มี -'; ?></p>
                          </td>
                          <td class="v-align-middle">
                            <p><?php echo ($value->user_active == 1) ? '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ปกติ</span>' : '<span class=" label label-danger p-t-5 m-l-5 p-b-5 inline fs-12">ไม่ปกติ</span>'; ?></p>
                          </td>
                          <td class="v-align-middle">
                            <!-- <p>April 13,2014 10:13</p> -->
                            <p><?php echo $value->rec_edit_timestamp;?></p>
                          </td>
                          <td class="v-align-middle">
                            <p><a class="btn btn-bg-warning btn-cons m-t-10 fn_from" href="<?php echo base_url($this->uri->segment(1).'/staff/user_edit_profile').'/'.$value->user_id;?>">เรียกดู</a></p>
                          </td>
                        </tr>
                    <?php } ?>
                 
                  </tbody>
                </table>
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