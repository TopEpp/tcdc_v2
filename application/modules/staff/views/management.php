<div class="content ">
        <!-- START JUMBOTRON -->
        <?php 
            if($this->session->flashdata('error')){
              echo $this->session->flashdata('error');
              $this->session->unset_userdata('error');
            }
            
            if($this->session->flashdata('msg')){
              echo $this->session->flashdata('msg');
              $this->session->unset_userdata('msg');
            }
         ?>

        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner" style="transform: translateY(0px); opacity: 1;">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?PHP echo base_url('staff')?>">หน้าแรก</a></li>
                <li class="breadcrumb-item active">กิจกรรม</li>
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
                      <h3>การจัดการกิจกรรม</h3>
                      <!-- <p>คุณสามารถแก้ไขสถาณะโครงการ ปิด หรือ เปิด ให้ผู้ใช้ดำเนินการได้โดยการกำหนดจากหน้านี้</p> -->
                      <div class="pull-right">
                        <div class="col-xs-12">
                          <a id="show-modal" class="btn btn-primary btn-cons" href="<?php echo base_url('staff/project');?>"><i class="fa fa-plus"></i> สร้างกิจกรรม</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch" style="font-family: 'dbch' !important; ">
                      <thead>
                        <tr>
                          <th>ชื่อกิจกรรม</th>
                          <th style="width:10%">ประเภท</th>
                          <th style="width:10%">สถานะ</th>
                          <!-- <th>อัปเดทเมื่อ</th> -->
                          <th>อัพเดทล่าสุด</th>
                          <th style="width:25%"></th>
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
                              <td class="v-align-middle semi-bold"><span id="project_name_<?php echo $prj->project_id;?>"><?php echo $prj->project_name;?></span></td>
                              <td class="v-align-middle semi-bold"><?php echo $prj->type_name;?></td>
                              <td class="v-align-middle"><?php echo $status;?></td>
                              <!-- <td class="v-align-middle"><?php echo $this->mydate->date_eng2thai($prj->project_update,543,'S');?></td> -->
                              <td class="v-align-middle"><?php echo $prj->project_update_user.'<br>'.$this->mydate->date_eng2thai($prj->project_update,543,'S');?></td>
                              
                              <td class="v-align-middle">
                                <p><a href="<?php echo base_url('staff/show_user/'.$prj->project_id);?>"><i class="fa fa-user"></i> ผู้สมัคร</a> 
                                &nbsp;<a href="<?php echo base_url('staff/project/'.$prj->project_id);?>"><i class="fa fa-edit"></i> แก้ไข</a> 
                                &nbsp;<a style="cursor: pointer;" onclick="delProject('<?php echo $prj->project_id;?>')"  ><i class="fa fa-trash-o"></i> ลบ</a></p>
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
            <div class="row">
            <div class="col-lg-12">
              <div class="card card-transparent">
                <div class="card-header ">
                  <div class="card-title">
                    <h3 style="font-family: 'dbch' !important; ">ข่าวสาร</h3>
                    <div class="pull-right">
                      <div class="col-xs-12">
                        <button id="show-modal-news" class="btn btn-primary btn-cons" data-toggle="modal" data-target="#cr_news"><i class="fa fa-plus"></i> สร้างข่าวสาร
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-block">
                <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch" style="font-family: 'dbch' !important; ">
                  <thead>
                    <tr>
                      <th width="50%">หัวข้อ</th>
                      <th width="20%">ประเภท</th>
                      <th width="15%">อัทเดทล่าสุด</th>
                      <th width="15%">การจัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($news as $key => $value) { ?>
                    <tr>
                      <td class="v-align-middle semi-bold" >
                        <p><span id="news_name_<?php echo $value->news_id;?>"><?php echo $value->news_name?></span></p>
                      </td>
                      <td class="v-align-middle semi-bold" ><span id="news_type_<?php echo $value->news_id;?>"><?php echo $value->news_type?></span></td>
                      <td class="v-align-middle">
                        <p><?php echo $value->news_update_user.'<br>'.$this->mydate->date_eng2thai($value->news_update,543,'S');?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><a style="cursor: pointer;" onclick="editNews('<?php echo $value->news_id;?>')" data-toggle="modal" data-target="#cr_news"><i class="fa fa-edit"></i> แก้ไข</a>
                        &nbsp;<a style="cursor: pointer;" onclick="delNews('<?php echo $value->news_id;?>')" ><i class="fa fa-trash-o"></i> ลบ</a></p>
                      </td>
                    </tr>
                    <input type="hidden" id="news_detail_<?php echo $value->news_id;?>" value="<?php echo $value->news_detail;?>">
                    <input type="hidden" id="news_url_<?php echo $value->news_id;?>" value="<?php echo $value->news_url;?>">
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- end news crade -->

        <!-- END PLACE PAGE CONTENT HERE -->
      </div>

      <!-- Modal -->
      <div class="modal fade slide-up disable-scroll" id="modal-delnews" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
          <div class="modal-content-wrapper">
            <div class="modal-content">
              <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5>แจ้งเตือน <span class="semi-bold">ลบข่าว</span></h5>
              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col-md-12">
                    <p>คำเตือน ! คุณต้องการลบข่าว <span id="news_name_del"></span> ใช่หรือไม่</p>
                  </div>
                </div>
                <br>
                <div class="row">

                  <div class="modal-footer">
                  <?php $attributes = array('name' => 'form-del-news', 'id' => 'form-del-news');
                          $lang = $this->uri->segment(1);
                           echo form_open_multipart($lang.'/staff/delNews/', $attributes); 
                    ?>
                    <input type="hidden" name="del_news_id" id="del_news_id" value="">
                    <button type="button" class="btn btn-primary btn-cons  pull-left inline" data-dismiss="modal" id="delNewsBtn">ยืนยัน</button>
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



      <!-- Modal -->
      <div class="modal fade slide-up disable-scroll" id="modal-delproject" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
          <div class="modal-content-wrapper">
            <div class="modal-content">
              <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5>แจ้งเตือน <span class="semi-bold">ปิดการใช้งานโครงการ</span></h5>

              </div>
              <div class="modal-body">

                <div class="row">
                  <div class="col-md-12">
                    <p>คำเตือน ! คุณต้องการปิดให้บริการโครงการนี้ <span id="prj_name_del"></span> นั้นหมายถึงผู้ใช้จะไม่สามารถเข้าถึงโครงการนี่ได้ หรืออาจเกิดความเสียหายอื่นใดขณะผู้ใช้สมัครเข้าร่วมโครงการ</p>
                  </div>
                </div>
                <br>
                <div class="row">

                  <div class="modal-footer">
                  <?php $attributes = array('name' => 'frmDelProject', 'id' => 'form-del-project');
                                  $lang = $this->uri->segment(1);
                                   echo form_open_multipart($lang.'/staff/delProject/', $attributes); 
                            ?>
                    <input type="hidden" name="del_prj_id" id="del_prj_id" value="">
                    <button type="button" class="btn btn-primary btn-cons  pull-left inline" data-dismiss="modal" id="delPrjBtn">ยืนยัน</button>
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


      <div class="modal fade slide-up disable-scroll" id="cr_news" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
          <div class="modal-content-wrapper">
            <div class="modal-content">
              <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5><span style="font-size: 1.2em;">สร้างข่าวสาร</span></h5>
                <!-- <p class="p-b-10">ข่าวสารจะไปปรากฏยังหน้าแดชบอร์ดขอผู้ใช้งาน</p> -->
              </div>
              <div class="modal-body">
                <?php $attributes = array('name' => 'form-news', 'id' => 'form-news');
                      $lang = $this->uri->segment(1);
                       echo form_open_multipart($lang.'/staff/saveNews/', $attributes); 
                ?>
                <input type="hidden" class="form-control" name="news_id" id="news_id" value="">
                  <div class="form-group-attached">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default">
                          <label>หัวข้อ</label>
                          <input type="text" class="form-control" name="news_name" id="news_name" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">

                        <div class="wysiwyg5-wrapper b-a b-grey">
                          <textarea name="news_detail" id="news_detail" class="wysiwyg demo-form-wysiwyg" placeholder="เนื้อหา"  ui-jq="wysihtml5" ui-options="{
                          html: true,
                          stylesheets: ['pages/css/editor.css']
                        }" required></textarea>

                      </div>

                      <br>
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>ชื่อบนปุ่ม</label>
                            <input type="text" class="form-control" name="news_type" id="news_type" value="">
                          </div>

                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>ลิงก์ของปุ่ม</label>
                            <input type="text" class="form-control" name="news_url" id="news_url" value="">
                          </div>

                        </div>


                      </div>

                    </div>
                  </div>
                </form>
                <div class="row">
                  <div class="col-md-4 m-t-10 sm-m-t-10">
                    <button type="button" class="btn btn-primary btn-block m-t-5" id="btnSubmitNews"><span>ยืนยัน</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>
    </div>


      