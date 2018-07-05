<!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?PHP echo base_url('staff')?>">หน้าแรก</a></li>
                  <li class="breadcrumb-item active">ผู้ใช้งาน</li>
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
                      <a id="show-modal" class="btn btn-primary btn-cons" href="<?php echo base_url('staff/create_user'); ?>"><i class="fa fa-plus"></i> สร้างผู้จัดการ</a>
                  </div>
                </div>

                <div class="pull-right" style="margin-right: 10px;">
                  <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="ค้นหา">
                  </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
              <div class="card-block">
                Show 
                <select class="" aria-controls="tableWithSearch" name="table_pageing_length" id="table_pageing_length">
                   <option value="5">5</option>
                   <option value="10">10</option>
                   <option value="20">20</option>
                   <option value="-1">All</option>
                </select>
                entries
                <table class="table table-hover demo-table-search table-responsive-block table_pageing"  style="font-family: 'dbch' !important; ">
                  <thead>
                    <tr>
                      <th>ชื่อ-นามสกุล</th>
                      <th>อีเมล</th>
                      <th>กิจกรรมล่าสุด</th>
                      <th>สถานะ</th>
                      <th>อัพเดทล่าสุด</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                          <td class="v-align-middle semi-bold">
                            <p style="font-family: 'dbch'"><?php echo $value->firstname .' '.$value->lastname; ?></p>
                          </td>
                          <td class="v-align-middle">
                            <p><?php echo $value->email; ?></p>
                          </td>
                          <td class="v-align-middle">
                            <p><?php echo (@$regisprj[$value->user_id])?$regisprj[$value->user_id]:'- ไม่มี -'; ?></p>
                          </td>
                          <td class="v-align-middle">
                            <?php $user_type = '';
                              if($value->user_type==1){
                                $user_type = 'Admin';
                              }else if($value->user_type==2){
                                $user_type = 'Program Manager';
                              }else if($value->user_type==3){
                                $user_type = 'Member';
                              }else if($value->user_type==4){
                                $user_type = 'Editor';
                              }
                            ?>
                            <p><?php echo $user_type;?></p>
                            <p><?php echo ($value->user_active == 1) ? '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ปกติ</span>' : '<span class=" label label-danger p-t-5 m-l-5 p-b-5 inline fs-12">ไม่ปกติ</span>'; ?></p>
                          </td>
                          <td class="v-align-middle">
                            <!-- <p>April 13,2014 10:13</p> -->
                            <p><?php 
                                $edit_stamp = explode(' ', $value->rec_edit_timestamp);
                                $edit_date = explode('-', $edit_stamp[0]);

                             echo $edit_date[2].'-'.$edit_date[1].'-'.$edit_date[0].' '.$edit_stamp[1];?></p>
                          </td>
                          <td class="v-align-middle">
                            <?php if($this->session->userdata('sesUserType')==1){ ?>
                            <p><a  href="<?php echo base_url($this->uri->segment(1).'/staff/user_edit_profile').'/'.$value->user_id;?>"><i class="fa fa-edit"></i> แก้ไข</a>
                              &nbsp;<a style="cursor: pointer;" onclick="delUser('<?php echo $value->user_id;?>','<?php echo $value->firstname .' '.$value->lastname;?>')"  ><i class="fa fa-trash-o"></i> ลบ</a></p>
                            <?php }?>
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

        <!-- Modal -->
      <div class="modal fade slide-up disable-scroll" id="modal-delUser" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
          <div class="modal-content-wrapper">
            <div class="modal-content">
              <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5>แจ้งเตือน <span class="semi-bold">ลบบัญชีผู้ใช้งาน</span></h5>

              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col-md-12">
                    <p> คุณต้องการลบบัญชีผู้ใช้งาน <span id="name_del"></span> ใช่หรือไม่</p>
                  </div>
                </div>
                <br>
                <div class="row">

                  <div class="modal-footer">
                  <?php $attributes = array('name' => 'frmDelUser', 'id' => 'form-del-user');
                                  $lang = $this->uri->segment(1);
                                   echo form_open_multipart($lang.'/staff/delUser/', $attributes); 
                            ?>
                    <input type="hidden" name="del_id" id="del_id" value="">
                    <button type="button" class="btn btn-primary btn-cons  pull-left inline" data-dismiss="modal" id="delBtn">ยืนยัน</button>
                    <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">ยกเลิก</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>