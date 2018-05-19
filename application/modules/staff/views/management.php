<div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner" style="transform: translateY(0px); opacity: 1;">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">การจัดการ</li>
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
                      <h3>การจัดการแอพที่เปิดให้บริการ</h3>
                      <p>คุณสามารถแก้ไขสถาณะโครงการ ปิด หรือ เปิด ให้ผู้ใช้ดำเนินการได้โดยการกำหนดจากหน้านี้</p>
                      <div class="pull-right">
                        <div class="col-xs-12">
                          <a id="show-modal" class="btn btn-primary btn-cons" href="create_from.html"><i class="fa fa-plus"></i> สร้างโครงการ</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                      <thead>
                        <tr>
                          <th>โครงการ</th>
                          <th style="width:10%">ประเภท</th>
                          <th style="width:10%">สถาณะ</th>
                          <!-- <th>อัปเดทเมื่อ</th> -->
                          <th>ดำเนินการล่าสุดโดย</th>
                          <th></th>
                          <th></th>
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
                              <!-- <td class="v-align-middle"><?php echo $this->mydate->date_eng2thai($prj->project_update,543,'S');?></td> -->
                              <td class="v-align-middle"><?php echo $prj->project_update_user.'<br>'.$this->mydate->date_eng2thai($prj->project_update,543,'S');?></td>
                              <td class="v-align-middle">
                                <p><a class="btn btn-bg-warning btn-cons m-t-10 fn_from" href="<?php echo base_url('staff/show_user_register/'.$prj->project_id);?>">เรียกดู</a></p>
                              </td>
                              <td class="v-align-middle">
                                <p><a href="<?php echo base_url('staff/project/'.$prj->project_id);?>"><i class="fa fa-edit"></i> แก้ไข</a></p>
                                <p><a href="delProject('<?php echo $prj->project_id;?>')"><i class="fa fa-trash-o"></i> ลบ</a></p>
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
                    <h3>ข่าวสาร</h3>
                    <p>คุณสามารถแจ้งข่าวสร้างหรือแจ้งเตือนผู้ใช้ของคุณโดยการสร้างข่าวสารใหม่ โดยระบบจะส่งข้อความไปยังผู้ใช้งานของคุณทั้งทางอีเมล์และผ่านหน้าเว็บ</p>
                    <div class="pull-right">
                      <div class="col-xs-12">
                        <button id="show-modal" class="btn btn-primary btn-cons" data-toggle="modal" data-target="#cr_news"><i class="fa fa-plus"></i> สร้างข่าวสาร
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-block">
                <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                  <thead>
                    <tr>
                      <th width="50%">หัวข้อข่าว</th>
                      <th>ดำเนินการล่าสุดโดย</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($news as $key => $value) { ?>
                    <tr>
                      <td class="v-align-middle semi-bold"  width="50%">
                        <p><?php echo $value->news_name?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><?php echo $value->news_update_user.'<br>'.$this->mydate->date_eng2thai($value->news_update,543,'S');?></p>
                      </td>
                      <td class="v-align-middle">
                        <p><a href="#" data-toggle="modal" data-target="#cr_news"><i class="fa fa-edit"></i> แก้ไข</a></p>
                        <p><a href="#"><i class="fa fa-trash-o"></i> ลบ</a></p>
                      </td>
                    </tr>
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
      <div class="modal fade slide-up disable-scroll" id="modalcll" tabindex="-1" role="dialog" aria-hidden="false">
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
                    <p>คำเตือน ! คุณต้องการปิดให้บริการโครงการนี้ "ชื่อโครงการ" นั้นหมายถึงผู้ใช้จะไม่สามารถเข้าถึงโครงการนี่ได้ หรืออาจเกิดความเสียหายอื่นใดขณะผู้ใช้สมัครเข้าร่วมโครงการ</p>

                  </div>

                </div>

                <br>



                <div class="row">

                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-cons  pull-left inline" data-dismiss="modal">ยืนยัน</button>
                    <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">ยกเลิก</button>
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
                <h5>สร้าง <span class="semi-bold">ข่าวสาร</span></h5>
                <p class="p-b-10">ข่าวสารจะไปปรากฏยังหน้าแดชบอร์ดขอผู้ใช้งาน</p>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="form-group-attached">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default">
                          <label>หัวเรื่อง</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">




                        <div class="wysiwyg5-wrapper b-a b-grey">
                          <textarea id="wysiwyg6" class="wysiwyg demo-form-wysiwyg" placeholder="ใส่เนื้อหาตรงนี้..."  ui-jq="wysihtml5" ui-options="{
                          html: true,
                          stylesheets: ['pages/css/editor.css']
                        }"></textarea>

                      </div>

                      <br>
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>ชื่อบนปุ่ม</label>
                            <input type="text" class="form-control">
                          </div>

                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>ลิงก์ของปุ่ม</label>
                            <input type="text" class="form-control">
                          </div>

                        </div>


                      </div>

                    </div>
                  </div>
                </form>
                <div class="row">
                  <div class="col-md-8">

                  </div>
                  <div class="col-md-4 m-t-10 sm-m-t-10">
                    <button type="button" class="btn btn-primary btn-block m-t-5">สร้างข่าวสาร</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>