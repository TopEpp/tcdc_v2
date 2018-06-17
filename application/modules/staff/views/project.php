<-- START PAGE CONTENT -->
      <div class="content ">
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
        <div class=" container-fluid   container-fixed-lg">
          <!-- START CONTAINER FLUID -->
          <div class=" container-fluid   container-fixed-lg">
            <div id="rootwizard" class="m-t-50">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <li class="nav-item">
                  <a class="active" data-toggle="tab" href="#tab1" role="tab"><i class="fa">1</i> <span>สร้างกิจกรรม</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab2" role="tab"><i class="fa tab-icon">2</i> <span>สร้างผู้ประสานงาน</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab5" role="tab"><i class="fa tab-icon">3</i> <span>เสร็จสิ้น</span></a>
                </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane padding-20 sm-no-padding active slide-left" id="tab1">
                  <div class="row row-same-height">
                    <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                      <div class="padding-10 sm-padding-5 sm-m-t-15 m-t-20">
                        <h2>สร้างกิจกรรม</h2>
                          <br>
                          <?php $attributes = array('name' => 'frmProject', 'id' => 'form-project');
                                  $lang = $this->uri->segment(1);
                                   echo form_open_multipart($lang.'/staff/saveProject/'.$project_id, $attributes); 
                            ?>
                            <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />   
                            <input type="hidden" name="project_id" value="<?php echo $project_id; ?>" />   
                          <p>ชื่อกิจกรรม</p>
                          <div class="form-group-attached">
                            <div class="row clearfix">
                              <div class="col-sm">
                                <div class="form-group form-group-default required">
                                  <label><!-- ชื่อโครงการ --></label>
                                  <input type="text" class="form-control" name="project_name" id="project_name" value="<?php if(!empty($prj)){ echo $prj->project_name; }?>" required>
                                </div>
                              </div>

                            </div>
                            <br>
                            <p>เลือกประเภทกิจกรรม</p>
                             
                            <div class="form-group-attached">
                              <div class="row clearfix">

                                <div class="col-sm">
                                  <div class="form-group form-group-default required form-group-default-selectFx">
                                    <label><!-- เลือกประเภทโครงการหรือกิจกรรม --></label>
                                    <select class="cs-select cs-skin-slide cs-transparent form-control" name="project_type" id="project_type" data-init-plugin="cs-select">
                                    <?php foreach ($project_type as $key => $p_type) { 
                                        $sel = '';
                                        if(!empty($prj) && @$prj->project_type==$p_type->type_id){ $sel = 'selected="selected"';}
                                      ?>
                                      <option <?php echo $sel;?>  value="<?php echo $p_type->type_id?>"><?php echo $p_type->type_name?></option>
                                    <?php }?>
                                    </select>
                                  </div>
                                </div>


                              </div>
                            </div>

                            <br>
                            <p>ระยะเวลาของกิจกรรม</p>

                            <div class="form-group-attached">
                              <div class="row clearfix">
                                <div class="input-daterange input-group" id="datepicker-range">
                                  <input required class="input-sm form-control datepicker-range" name="project_start_date" id="project_start_date" value="<?php if(!empty($prj)){ echo $prj->project_start_date; }?>" type="text"><span class="input-group-addon"><i class="fa fa-calendar"></i>
                                  </span>
                                  <div class="input-group-addon">ถึงวันที่</div>
                                  <input required class="input-sm form-control datepicker-range" name="project_finish_date" id="project_finish_date" value="<?php if(!empty($prj)){ echo $prj->project_finish_date; }?>" type="text"><span class="input-group-addon"><i class="fa fa-calendar"></i>
                                  </span>
                                </div>

                              </div>
                            </div>

                            <br>
                            <p>ตั้งค่าการ เปิด/ปิด การลงทะเบียน</p>

                            <div class="form-group-attached">
                              <div class="row clearfix">
                                <div class="input-daterange input-group" id="datepicker-range2">
                                  <input required class="input-sm form-control datepicker-range" name="register_start_date" id="register_start_date" value="<?php if(!empty($prj)){ echo $prj->register_start_date; }?>" type="text"><span class="input-group-addon"><i class="fa fa-calendar"></i>
                                  </span>
                                  <div class="input-group-addon">ถึงวันที่</div>
                                  <input required class="input-sm form-control datepicker-range" name="register_finish_date" id="register_finish_date" value="<?php if(!empty($prj)){ echo $prj->register_finish_date; }?>" type="text"><span class="input-group-addon"><i class="fa fa-calendar"></i>
                                  </span>
                                </div>

                              </div>
                            </div>
                          </div>
                        <!-- </form> -->
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="padding-30 sm-padding-5">
                        <h5>เกี่ยวกับกิจกรรม</h5>
                        <!-- <p>ที่มาของโครงการนี้จะใช้ในหน้าที่แจ้งให้ผู้เข้าร่วมรับทราบถึงที่มาของโครงการ</p> -->
                        <div class="row">
                          <div class="card-block">

                            <div class="wysiwyg5-wrapper b-a b-grey">
                              <textarea required id="project_detail" name="project_detail" class=" demo-form-wysiwyg project_detail" placeholder="" ui-jq="wysihtml5" ui-options="{
                              html: true,
                              stylesheets: ['pages/css/editor.css']
                            }"><?php if(!empty($prj)){ echo $prj->project_detail;}?></textarea>
                            </div>
                          </div>
                        </div>
                      
                       <br>
                        <h5>เงื่อนไขและข้อตกลง</h5>
                        <!-- <p>เงือนไขและข้อกำหนดนนี้จะใช้ในหน้าที่แจ้งให้ผู้เข้าร่วมรับทราบถึงข้อตกลงโปรดระบุบเงื่อนไขของโครงการ</p> -->
                        <div class="row">
                          <div class="card-block">

                            <div class="wysiwyg5-wrapper b-a b-grey">
                              <textarea required id="project_provenance" name="project_provenance" class=" demo-form-wysiwyg project_provenance" placeholder="" ui-jq="wysihtml5" ui-options="{
                              html: true,
                              stylesheets: ['pages/css/editor.css']
                            }"><?php if(!empty($prj)){ echo $prj->project_provenance;}?></textarea>
                            </div>
                          </div>
                        </div>
                       <br>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab2">
                <div class="row row-same-height">
                  <!-- <div class="col-md-5 b-r b-dashed b-grey ">
                    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                      <h2>สร้างผู้ประสานงาน</h2>
                      <p>เนื่องจากกิจกรรมจะต้องมีผู้ทำหน้าที่ประสานงาน กับผู้ใช้งานในกรณีที่ต้องการข้อมูลเพิ่มเติม ข้อมูลส่วนนี้ เพื่อให้ผู้ใช้งานสามารถติดต่อกับผู้ประสานงานได้  <span><a>คลิกที่นี่เพื่อศึกษาเพิ่มเติม</a></span></p>
                      <br>

                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <div class="padding-30 sm-padding-5">
                        <!-- <form role="form"> -->
                          <h2>สร้างผู้ประสานงาน</h2>
                          <div class="form-group-attached">

                            <!-- ข้อมูลผู้ประสานงาน เริ่ม -->

                            <p>ข้อมูลผู้ประสานงาน</p>
                            <div class="form-group-attached">
                              <div class="row clearfix">
                                <table class="table table-hover table-condensed" id="condensedTable">
                                <thead>
                                  <tr>
                                    <td width="5%">#</td>
                                    <td width="50%">ชื่อ - นามสกุล</td>
                                    <td width="45%">อีเมล</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($project_owner as $key => $pm) { ?>
                                   <tr>
                                    <td><input type="checkbox" class="checkbox_owner"  name="owner" id="owner_<?php echo $pm->user_id?>" value="<?php echo $pm->user_id?>"></td>
                                    <td><?php echo $pm->firstname.' '.$pm->lastname;?></td>
                                    <td><?php echo $pm->email;?></td>
                                   </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                              <input type="hidden" name="owner_id" id="owner_id" value="<?php echo $prj_owner;?>" required>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab5">
                  <h1>ขอบคุณ</h1>
                  <br>
                  <h5>สร้างกิจกรรมเรียบร้อยแล้ว ระบบจะส่งอีเมลให้ผู้ประสานงานอัตโนมัติ</h5>
                </div>
                <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                  <ul class="pager wizard no-style">
                    <li class="next">
                      <button class="btn btn-primary btn-cons btn-animated from-left fa fa-hospital-o pull-right" type="button">
                        <span>ถัดไป</span>
                      </button>
                    </li>
                    <li class="next finish hidden">
                      <button class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" id="btn-finish" type="button">
                        <span>เสร็จสิ้น</span>
                      </button>
                    </li>
                    <li class="previous first hidden">
                      <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                        <span>หน้าสุด</span>
                      </button>
                    </li>
                    <li class="previous" id="btn_back">
                      <button class="btn btn-default btn-cons pull-right" type="button">
                        <span>ย้อนกลับ</span>
                      </button>
                    </li>
                  </ul>
                </div>
              

</div>
</div>
</div>
<!-- END CONTAINER FLUID -->
</div>
</div>
<!-- END PAGE CONTENT -->

