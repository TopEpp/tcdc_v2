
<!-- START PAGE CONTENT -->
<style type="text/css">
  p{
    color: #000000;
    margin-bottom: 0;
  }
</style>
      <div class="content ">
        <div class=" container-fluid   container-fixed-lg">
          <div class="card-title" style="padding-left: 50px;"><h3><?php echo $project[0]->project_name?></h3></div>
          <!-- START CONTAINER FLUID -->

          <?php $attributes = array('name' => 'frmAppv', 'id' => 'form-profile-approve');
                              $lang = $this->uri->segment(1);
                              $id = $this->uri->segment(4);
                              echo form_open_multipart($lang.'/project_manage/saveAppv', $attributes); 
              ?>
           <input type="hidden"  name="project_id" value="<?php echo $project[0]->project_id;?>" />
           <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />
          <div class=" container-fluid   container-fixed-lg">
            <div id="rootwizard" class="m-t-50">

             <!-- show validate error -->
              <!-- status edit -->
              <?php             
              if($this->session->flashdata('msg')){
                  //echo $this->session->flashdata('msg');
                  $this->session->unset_userdata('msg');
                } 
              if($this->session->flashdata('error')){
                  //echo $this->session->flashdata('error');
                  $this->session->unset_userdata('error');
              }  
                  
              ?>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                
                <li class="nav-item">
                  <a class="active" data-toggle="tab" href="#tab2" role="tab"><i class="fa fa-hospital-o tab-icon"></i> <span>ข้อมูลส่วนบุคคล/องค์กร</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab3" role="tab"><i class="fa fa-credit-card tab-icon"></i> <span>ข้อมูลกิจกรรม</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab5" role="tab"><i class="fa fa-check tab-icon"></i> <span>การจัดการ</span></a>
                </li>
                <!-- <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab6" role="tab"><i class="fa fa-check tab-icon"></i> <span>เผยแพร่</span></a>
                </li> -->
              </ul>
              <!-- Tab panes -->

             
              <div class="tab-content">
                 <div class="tab-pane slide-left padding-20 sm-no-padding active" id="tab2">
                  <div class="row row-same-height">
 
                      <div class="col-md-12">
                        <div class="padding-30 sm-padding-5">
                            <?php $prename=''; if(@$member->prename == 1){ $prename='นาย';}?>
                            <?php  if(@$member->prename == 2){$prename='นาง';}?>
                            <?php  if(@$member->prename == 3){$prename='นางสาว';}?>
                            <p>ข้อมูลบุคคล</p>
                            <div class="form-group-attached">
                              <div class="row clearfix">
                                <div class="col-sm-12">
                                    <?php echo $prename.$member->firstname.' '.$member->lastname;?>
                                </div>
                              </div>
                            </div>

                            <br>

                            <p>ที่อยู่</p>
                            <div class="form-group-attached">
                              <div class="row clearfix">
                                <div class="col-sm-12">
                                  บ้านเลขที่ <?php echo @$member->address; ?> หมู่ <?php echo @$member->village; ?> ซอย <?php echo @$member->lane; ?>  ถนน <?php echo @$member->road; ?> <br>
                                  ตำบล/แขวง <?php echo $member->subdistrict;?>  เขต/อำเภอ <?php echo $member->district;?>  จังหวัด
                                  <?php 
                                    foreach ($province as $key => $value) { ?>
                                    <?php 
                                      if(@$member->province == $value->code ){
                                          echo $value->name_th;
                                      } ?>  
                                          
                                  <?php } ?>  
                                  รหัสไปรษณีย์ <?php echo (@$member->zipcode != 0)? @$member->zipcode : '';?>
                                  ประเทศ 
                                  <?php 
                                        foreach ($countries as $key => $value) { ?>
                                        <?php 
                                          if (!empty(@$member->country)){
                                            if(@$member->country == $value->id ){
                                              echo $value->name;
                                            }
                                          }
                                        
                                          ?>
                                      <?php } ?>

                                </div>
                              </div>  

                              <br>
                              <div class="form-group-attached">
                                <div class="row clearfix">
                                  <div class="col-sm-4">
                                    <p>อีเมล</p>
                                    <?php echo $member->email;?>
                                  </div>
                                  <div class="col-sm-4">
                                    <p>เบอร์โทรศัพท์</p>
                                    <?php echo (@$member->phone != 0)? @$member->phone : '';?>
                                  </div>
                                  <div class="col-sm-4">
                                    <p>ไลน์ไอดี</p>
                                    <?php echo @$member->lineid; ?>
                                  </div>
                                </div>
                              </div>


                              <br>
                              <!-- <p>เกี่ยวกับงาน</p> -->
                              <div class="form-group-attached">
                                <div class="row clearfix">
                                  <div class="col-sm-4">
                                    <p>สถานะ</p>
                                    <?php echo (@$member->job == 1)? 'บริษัท':'';?>
                                    <?php echo (@$member->job == 2)? 'ผู้ประกอบการธุรกิจ':'';?>
                                    <?php echo (@$member->job == 3)? 'สตูดิโอออกแบบ':'';?>
                                    <?php echo (@$member->job == 4)? 'ช่างฝีมือ/เมคเกอร์':'';?>
                                    <?php echo (@$member->job == 5)? 'วิสาหกิจชุมชน':'';?>
                                    <?php echo (@$member->job == 6)? 'นักออกแบบ/ศิลปิน/สถาปนิก':'';?>
                                    <?php echo (@$member->job == 7)? 'นักเรียนนักศึกษา':'';?>
                                    <?php echo (@$member->job == 8)? 'องค์กร/สถาบัน':'';?>
                                    <?php echo (@$member->job == 9)? 'สถาบันการศึกษา':'';?>
                                    <?php echo (@$member->job == 10)? 'อาชีพอิสระ':'';?>
                                    <?php echo (@$member->job == 11)? $member->job_detail:'';?>
                                  </div>
                                  <div class="col-sm-4">
                                    <p>สาขาอุตสาหกรรมสร้างสรรค์</p>
                                    <?php echo (@$member->job_type == 1) ? 'งานฝีมือและหัตถกรรม':'';?>
                                    <?php echo (@$member->job_type == 2) ? 'ศิลปะการแสดง':'';?>
                                    <?php echo (@$member->job_type == 3) ? 'ทัศนศิลป์':'';?>
                                    <?php echo (@$member->job_type == 4) ? 'ดนตรี':'';?>
                                    <?php echo (@$member->job_type == 5) ? 'ภาพยนตร์และวิดีทัศน์':'';?>
                                    <?php echo (@$member->job_type == 6) ? 'การพิมพ์':'';?>
                                    <?php echo (@$member->job_type == 7) ? 'การกระจายเสียง':'';?>
                                    <?php echo (@$member->job_type == 8) ? 'ซอฟต์แวร์':'';?>
                                    <?php echo (@$member->job_type == 9) ? 'การโฆษณา':'';?>
                                    <?php echo (@$member->job_type == 10) ? 'การออกแบบ (รวมถึงแฟชั่น)':'';?>
                                    <?php echo (@$member->job_type == 11) ? 'สถาปัตยกรรม':'';?>
                                    <?php echo (@$member->job_type == 12) ? 'แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)':'';?>
                                  </div>
                                  <div class="col-sm-4">
                                    <p>ประสบการณ์</p>
                                    <?php echo (@$member->company_service == 1) ? 'กำลังพัฒนาและทดลองต้นแบบ':'';?> 
                                    <?php echo (@$member->company_service == 2) ? '0 - 3 ปี':'';?> 
                                    <?php echo (@$member->company_service == 3) ? '3 - 10 ปี':'';?> 
                                    <?php echo (@$member->company_service == 4) ? 'มากกว่า 10 ปี':'';?> 
                                  </div>
                                </div>
                              </div>

                              <br>

                              <div class="form-group-attached" >
                              <p>เกี่ยวกับองค์กร/บริษัท</p>
                              
                              <div class="form-group-attached">
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                    <p>ชื่อแบรนด์</p>
                                    <?php echo @$member->brand; ?>
                                  </div>  
                                  <div class="col-sm-6">
                                    <p>เว็บไซต์</p>
                                    <?php echo @$member->website; ?>
                                  </div>
                                </div>
                                <br>
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                    <p>ชื่อบริษัท/องค์กร</p>
                                    <?php echo @$member->company_name; ?>
                                  </div>
                                  <div class="col-sm-6">
                                    <p>เฟสบุ๊ค แฟนเพจ</p>
                                    <?php echo @$member->facebook; ?>
                                  </div>
                                </div>
                                <br>
                                <p>ที่อยู่</p>
                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                    <div class="col-sm-12">
                                      บ้านเลขที่ <?php echo @$member->company_address; ?> หมู่ <?php echo @$member->company_village; ?> ซอย <?php echo @$member->company_lane; ?>  ถนน <?php echo @$member->company_road; ?> <br>
                                      ตำบล/แขวง <?php echo $member->company_subdistrict;?>  เขต/อำเภอ <?php echo $member->company_district;?>  จังหวัด
                                      <?php 
                                        foreach ($province as $key => $value) { ?>
                                        <?php 
                                          if(@$member->company_province == $value->code ){
                                              echo $value->name_th;
                                          } ?>  
                                              
                                      <?php } ?>  
                                      รหัสไปรษณีย์ <?php echo (@$member->company_zipcode != 0)? @$member->company_zipcode : '';?>
                                      ประเทศ 
                                      <?php 
                                            foreach ($countries as $key => $value) { ?>
                                            <?php 
                                              if (!empty(@$member->company_country)){
                                                if(@$member->company_country == $value->id ){
                                                  echo $value->name;
                                                }
                                              }
                                            
                                              ?>
                                          <?php } ?>

                                    </div>
                                  </div> 
                              </div>
                            </div>
                          </div>
                          <?php if(@$member->coordinator_type != 0){?>
                          <br>
                              <h5>ผู้ประสานงาน</h5>
                              <!-- ข้อมูลผู้ประสานงาน เริ่ม -->
                              <div id="agent">
                                <p>ข้อมูลผู้ประสานงาน</p>
                             
                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                    <div class="col-sm-12">
                                      <?php echo (@$member->coordinator_prename == '1')? 'นาย':''?>
                                      <?php echo (@$member->coordinator_prename == '2')? 'นาง':''?>
                                      <?php echo (@$member->coordinator_prename == '3')? 'นางสาว':''?><?php echo @$member->coordinator_firstname.' '.@$member->coordinator_lastname; ?>
                                    </div>  
                                  </div>
                                </div>
  
                                <br>
                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                     <div class="col-sm-4">
                                        <p>อีเมล</p>
                                        <?php echo @$member->coordinator_email; ?>
                                      </div>
                                      <div class="col-sm-4">
                                        <p>เบอร์โทรศัพท์</p>
                                        <?php echo @$member->coordinator_phone; ?>
                                      </div>
                                      <div class="col-sm-4">
                                        <p>ไลนไอดี</p>
                                        <?php echo @$member->coordinator_lineid; ?>
                                      </div>

                                    </div>

                                  </div>
                              </div>
                          <?php } ?>
                              




                              <!-- ข้อมูลผู้ประสานงาน จบ -->                              
                            </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>


                 <div class="tab-pane  slide-left padding-20 sm-no-padding " id="tab3">
                  <div class="row row-same-height">
                    <div class="col-md-12">
                      <div class="padding-30 sm-padding-5">
                        <p >ประเภทกิจกรรม</p>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <input type="hidden" name="work_talk_type" id="work_talk_type">
                              <input type="hidden" name="work_talk_type_at" id="work_talk_type_at">
                              <div class="row">
                                <div class="col-sm-5">
                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['work_talk_type'] == '1')? 'checked':''?>  type="checkbox"  value="1" name="work_talk_ty" id="work_talk_ty1">
                                    <label for="work_talk_ty1">Talk (การเสวนา / การบรรยาย)</label>
                                  </div>
                                </div>
                                <div class="col-sm-7" id="work_type_1" style="display:none">
                                  <div class="row">
                                    <div class="col-sm-2">
                                        <div class="checkbox check-success">
                                        สถานที่
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                    
                                      <div class="checkbox check-success">
                                        <input <?php echo (@$regis['work_talk_type_at'] == '1')? 'checked':''?> type="checkbox"  value="1" name="work_talk_ty_at" id="work_talk_ty_at1">
                                        <label for="work_talk_ty_at1">TCDC</label>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="checkbox check-success">
                                            <input <?php echo (@$regis['work_talk_type_at'] == '2')? 'checked':''?> type="checkbox"  value="2" name="work_talk_ty_at" id="work_talk_ty_at2">
                                            <label for="work_talk_ty_at2">นอกสถานที่</label>
                                          </div>
                                        </div>
                                        <div class="col-sm-6" id="work_talk_type_at_detail1" style="display:none;">
                                            <div class="form-group form-group-default ">
                                              <input   value="<?php echo @$regis['work_talk_type_at_detail']; ?>" type="text" class="form-control" id="work_talk_det1" name="work_talk_type_at_detail" >
                                            </div>
                                        </div>
                                      
                                      </div>
                                    
                                    </div>
                                  </div>

                                </div>
                                
                              </div>
                             
                              <div class="row">
                                <div class="col-sm-5">
                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['work_talk_type'] == '2')? 'checked':''?> type="checkbox"  value="2" name="work_talk_ty" id="work_talk_ty2">
                                    <label for="work_talk_ty2">Workshop (การสัมมนาเชิงปฏิบัติการ)</label>
                                  </div>
                                </div>
                                <div class="col-sm-7" id="work_type_2" style="display:none">
                                  <div class="row">
                                    <div class="col-sm-2">
                                        <div class="checkbox check-success">
                                        สถานที่
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                    
                                      <div class="checkbox check-success">
                                        <input <?php echo (@$regis['work_talk_type_at'] == '3')? 'checked':''?>  type="checkbox"  value="3" name="work_talk_ty_at" id="work_talk_ty_at3">
                                        <label for="work_talk_ty_at3">TCDC</label>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="checkbox check-success">
                                            <input <?php echo (@$regis['work_talk_type_at'] == '4')? 'checked':''?>  type="checkbox"  value="4" name="work_talk_ty_at" id="work_talk_ty_at4">
                                            <label for="work_talk_ty_at4">สถานที่ตนเอง</label>
                                          </div>
                                        </div>
                                        <div class="col-sm-6" id="work_talk_type_at_detail2" style="display:none;">
                                            <div class="form-group form-group-default ">
                                              <input  value="<?php echo @$regis['work_talk_type_at_detail']; ?>" type="text" class="form-control" id="work_talk_det2" name="work_talk_type_at_detail" >
                                            </div>
                                        </div>
                                      
                                      </div>
                                    
                                    </div>
                                  </div>
                                 
                                </div>
                              </div>
                      
                            </div>
                        </div>
                        <br>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default required">
                                <label>หัวข้อการเสวนา / เวิร์กช็อป (ภาษาไทย)</label>
                                <input name="work_talk_title_th" type="text" value="<?php echo @$regis['work_talk_title_th']; ?>"  placeholder="ระบุชื่อหัวข้อการเสวนา / เวริร์กช็อปภาษาไทย" class="form-control"  >
                              </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default required">
                                <label>หัวข้อการเสวนา / เวิร์กช็อป (ภาษาอังกฤษ)</label>
                                <input name="work_talk_title_en" type="text" value="<?php echo @$regis['work_talk_title_en']; ?>" placeholder="ระบุชื่อหัวข้อการเสวนา / เวริร์กช็อปภาษาอังกฤษ" class="form-control"  >
                              </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default required">
                                <label>ชื่อวิทยากร (ภาษาไทย)</label>
                                <input name="work_talk_name_th" type="text" value="<?php echo @$regis['work_talk_name_th']; ?>"  placeholder="ระบุชื่อชื่อวิทยากรภาษาไทย" class="form-control"  >
                              </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default required">
                                <label>ชื่อวิทยากร (ภาษาอังกฤษ)</label>
                                <input name="work_talk_name_en" type="text" value="<?php echo @$regis['work_talk_name_en']; ?>"  placeholder="ระบุชื่อชื่อวิทยากรภาษาอังกฤษ" class="form-control"  >
                              </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <p>เนื้อหาการเสวนา / เวิร์กช็อป</p>
                            <div class="wysiwyg5-wrapper b-a b-grey">
                              <textarea name="work_talk_detail" id="wysiwyg5" class="work_talk_detail demo-form-wysiwyg"  placeholder="โปรดอธิบายรายละเอียดกิจกรรม รูปแบบ วิธีการ และความคิดพิเศษสำหรับเทศกาล (จำนวนไม่เกิน 600 ตัวอักษร)" ui-jq="wysihtml5" ui-options="{
                              html: true,
                              stylesheets: ['pages/css/editor.css']
                              }"><?php echo @$regis['work_talk_detail']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default required">
                                <label>จำนวนผู้เข้าร่วม</label>
                                <input name="join_number"  value="<?php echo @$regis['join_number']; ?>" type="text" placeholder="โปรดระบุจำนวนผู้เข้าร่วมกิจกรรมได้สูงสุด" class="form-control"  >
                              </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <p>คุณสมบัติผู้เข้าร่วม</p>
                            <div class="wysiwyg5-wrapper b-a b-grey">
                              <textarea name="join_property" id="wysiwyg5" class="wysiwyg demo-form-wysiwyg"  placeholder="กรณีต้องการคัดเลือกผู้เข้าร่วมกิจกรรม โปรดระบุคุณสมบัติ เช่น อายุ 20 ปีขึ้นไป,มีประสบการณ์ออกแบบไม่น้อยกว่า 2 ปี,มีทักษะการใช้งาน Photoshop เป็นต้น" ui-jq="wysihtml5" ui-options="{
                              html: true,
                              stylesheets: ['pages/css/editor.css']
                              }">  <?php echo @$regis['join_property']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <br>
                        <label>วันที่เริ่มต้นกิจกรรม และ สิ้นสุดกิจกรรม</label>
                        <p>กิจกรรมเกิดขึ้นในช่วงจัดเทศกาล</p>
                      
                        <div class="row clearfix">
                          <div class="input-daterange input-group" id="datepicker-range2">
                            <input required class="input-sm form-control datepicker-range_event" name="join_start_date" id="event_start_date" value="<?php echo @$regis['join_start_date']; ?>" type="text"><span class="input-group-addon"><i class="fa fa-calendar"></i>
                            </span>
                            <div class="input-group-addon">ถึงวันที่</div>
                            <input required class="input-sm form-control datepicker-range_event" name="join_finish_date" id="event_finish_date" value="<?php echo @$regis['join_finish_date']; ?>" type="text"><span class="input-group-addon"><i class="fa fa-calendar"></i>
                            </span>
                          </div>

                        </div>
                        <br/>
                       
                        <label>เวลาเริ่มต้นกิจกรรม และ เวลาสิ้นสุดกิจกรรม</label>
                        <p>กิจกรรมเกิดขึ้นในช่วงจัดเทศกาล</p>
                        <div class="row clearfix">
                          <div class="col-sm-5" >
                            <input required class="input-sm form-control timepicker" name="join_start_time" id="event_start_time" value="<?php echo @$regis['join_start_time']; ?>" type="text"><span class="input-group-addon"><i class="fa fa-clock-o"></i>
                            </span>
                            </div>
                            <div class="col-sm-2 text-center">ถึงเวลา</div>
                            <div class="col-sm-5" >
                            <input required class="input-sm form-control timepicker" name="join_finish_time" id="event_finish_time" value="<?php echo @$regis['join_finish_time']; ?>" type="text"><span class="input-group-addon"><i class="fa fa-clock-o"></i>
                            </span>
                          </div>
                       
                        </div>
                        <br/>
                        
                        <h5>เอกสารประกอบการสมัคร</h5>
                        <hr/>
                        <p> โปรดส่งเอกสารประกอบการสมัครได้ที่ <input type="file" name="join_image[]" multiple="multiple" accept="image/jpg,image/jpeg,image/png" > </p>
                        <p> 1. ภาพ Key Visual สำหรับสื่อประชาสัมพันธ์บนเว็บไซต์ และ สูจิบัตร (สัดส่วน 5:7 และความละเอียด 300 dpi)</p>
                        <p> 2. ตารางเวลากิจกรรม และกำหนดการกิจกรรม</p>

                      </div>
                    </div>
                  </div> 
                </div>
                
            

            <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab5">
              <div class="row clearfix">

                <div class="col-sm-12">

                  <h1>การจัดการ</h1>
                  <p>หากการกรอกข้อมูลไม่ตรงกับความเป็นจริงหรือผิดพลาด คุณสามารถตั้งค่าส่วนนี้เพื่อแจ้งกลับไปยังผู้ใช้งานได้โดยระบบจะส่งการแจ้งเตือนไปยังผู้ใช้งาน</p>

                  <form>


                    <div class="col-sm-12">
                      <br>

                      <h5>คุณได้ตรวจสอบข้อมูลข้างต้นแล้ว ข้อมูลครบถ้วนหรือไม่?</h5>
                      <br>
                      <input type="hidden" name="prj_name" value="<?php echo $project[0]->project_name;?>">
                      <input type="hidden" name="email_receive" value="<?php echo $member->email;?>">
                      <input type="hidden" name="reg_id" value="<?php echo $regis['reg_id']?>">
                      <input type="hidden" name="reg_status" id="reg_status" value="<?php echo $regis['reg_status']?>">
                      <div class="radio radio-default">
                        <input value="1" name="radio_app" id="radio5Yes" type="radio" <?php echo ($regis['reg_status']==1) ? 'checked="checked"':''; ?> >
                        <label for="radio5Yes">ผ่านการตรวจสอบ</label>
                        <input value="0" name="radio_app" id="radio5No" type="radio" <?php echo ($regis['reg_status']==0) ? 'checked="checked"':''; ?> >
                        <label for="radio5No">ไม่ผ่าน</label>
                      </div>
                      <br>
                      <div id='div_reject' style="display: none;">
                      <h5>สิ่งที่ต้องแก้ไข</h5>
                      <p class="all-caps fs-12 bold">โปรดระบุส่งที่ต้องแก้ไข : </p>
                      <div class="card-block">
                        <div class="wysiwyg5-wrapper b-a b-grey">
                          <textarea required id="reject_detail" name="reject_detail" class="wysiwyg demo-form-wysiwyg" placeholder="โปรดระบุส่งที่ต้องแก้ไข ..." ui-jq="wysihtml5" ui-options="{
                          html: true,
                          stylesheets: ['pages/css/editor.css']
                        }"><?php if(!empty($regis)){ echo $regis['reject_detail'];}?></textarea>
                        </div>
                      </div>
                      </div>


                    </div>

                  </form>

                </div>
              </div>
            </div>

    

  <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
    <ul class="pager wizard no-style">
      <li class="next">
        <button id="btn-next" class="btn btn-primary btn-cons btn-animated from-left fa fa-hospital-o pull-right" type="button">
          <span>ถัดไป <i class="fa fa-angle-right "></i></span>
        </button>
      </li>
      <li class="next finish hidden">
        <button id="btn-finish" class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
          <span>ยืนยัน</span>
        </button>
      </li>
      <li class="previous first hidden">
        <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
          <span>หน้าสุด</span>
        </button>
      </li>
      <li class="previous">
        <button class="btn btn-default btn-cons pull-right" type="button">
          <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
        </button>
      </li>
    </ul>
  </div>

</div>
</div>
</div>
<?php echo form_close(); ?>

<!-- END CONTAINER FLUID -->
</div>
</div>
<!-- END PAGE CONTENT -->