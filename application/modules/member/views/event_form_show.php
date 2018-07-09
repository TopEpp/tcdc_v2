<div class="loader-wrap" id="loading" style="display:none;" >
  <div class="loader"><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span></div>
</div>
<div class="modal" id="check_form" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>กรุณายอมรับและได้อ่านเงื่อนไขและข้อตกลง.</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
<!-- START PAGE CONTENT -->
      <div class="content ">
        <div class=" container-fluid   container-fixed-lg">
          <!-- START CONTAINER FLUID -->

          <?php 
              if (@$regis['reg_status']){
                $attributes = array('name' => 'frmCreatevent', 'id' => 'form-event-profile');
                              $lang = $this->uri->segment(1);
                              $id = $this->uri->segment(4);
                              echo form_open_multipart($lang.'/member/savepreview', $attributes);
              } 
              else  
              {
                $attributes = array('name' => 'frmCreatevent', 'id' => 'form-event-profile');
                $lang = $this->uri->segment(1);
                $id = $this->uri->segment(4);
                echo form_open_multipart($lang.'/member/saveEventForm', $attributes);
              }
            ?>
           <input type="hidden"  name="project_id" value="<?php echo $project[0]->project_id;?>" />
           <input type="hidden" id="project_type" name="project_type" value="<?php echo $project[0]->project_type;?>" />
           <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />
          <div class=" container-fluid   container-fixed-lg">
            <?php   if (@$regis['reg_status']){ ?>
              <div id="preview-form" class="m-t-50">
            <?php }else{ ?>
              <div id="event-form" class="m-t-50">
            <?php } ?>
             <!-- show validate error -->
              <!-- status edit -->
              <?php             
              if($this->session->flashdata('msg')){
                  echo $this->session->flashdata('msg');
                  $this->session->unset_userdata('msg');
                } 
              if($this->session->flashdata('error')){
                  echo $this->session->flashdata('error');
                  $this->session->unset_userdata('error');
              }  
                  
              ?>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <li class="nav-item">
                  <a class="active" data-toggle="tab" href="#tab1" role="tab"><img src="<?php echo base_url('assets/img/icons/1.png');?>" width="10px"> <span>เงื่อนไขและข้อตกลง</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab2" role="tab"><img src="<?php echo base_url('assets/img/icons/2.png');?>" width="10px"> <span>ข้อมูลบุคคล/องค์กร</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab3" role="tab"><img src="<?php echo base_url('assets/img/icons/3.png');?>" width="10px"> <span>ผลงานออกแบบ</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab4" role="tab"><img src="<?php echo base_url('assets/img/icons/4.png');?>" width="10px"> <span>วิธีการจัดแสดง</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab5" role="tab"><img src="<?php echo base_url('assets/img/icons/5.png');?>" width="10px"> <span>แบบประเมินผล</span></a>
                </li>
              </ul>
              <!-- Tab panes -->

             
              <div class="tab-content">
                <div class="tab-pane padding-20 sm-no-padding active slide-left" id="tab1">
                
                <?php             
                  if($this->session->flashdata('error')){
                      echo $this->session->flashdata('error');
                      $this->session->unset_userdata('error');
                    } 
                  ?>
                    <div class="row row-same-height">
                    <!-- <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                      <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                         -->
                        <!-- <h2>ที่มาและข้อตกลง</h2>
                        <p><?php echo $project[0]->project_name.' '.$project[0]->project_provenance;?> </p>
                        <p class="small hint-text"><?php echo $project[0]->type_name;?></p><!--งานจัดแสดง , สินค้า , อาหารและเครื่องดืม--> 
                        <!-- <br> 
                        <div>
                          <div class="profile-img-wrapper m-t-5 inline">
                            <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                            <div class="chat-status available">
                            </div>
                          </div>
                          <div class="inline m-l-10">
                            <p class="small hint-text m-t-5"><?php echo @$project[0]->project_update_user; ?>
                              <br>ผู้ประสานงานโครงการ</p>
                            </div>
                          </div>
                        </div>
                    </div> -->

                      <div class="col-md-12" style="font-family: 'dbch';">
                        <div class="padding-30 sm-padding-5">

                          <h5 style="font-family: 'dbch';">เงื่อนไขและข้อตกลงสำหรับการจัดแสดงหรือนิทรรศการ</h5>
                          <div class="row">
                            <div class="card-block">
                              <div class="">
                                <div class="">
                                <!-- <p>1. ผู้สนใจสามารถกรอกแบบฟอร์มออนไลน์ได้ตั้งแต่วันที่ 16 มิ.ย. – 15 ก.ค. 61</p>
                                 <p> 2. ผลงานที่ส่งเข้าร่วมจัดแสดง ต้องไม่เป็นการคัดลอกหรือทำซ้ำกับผลงานของบุคคลอื่น และหากมีกรณีที่บุคคลภายนอกกล่าวอ้างหรือใช้สิทธิ์เรียกร้องใดๆว่ามีการละเมิดลิขสิทธิ์ หรือทรัพย์สินทางปัญญาอื่นใดเกี่ยวกับผลงานที่ส่งเข้าร่วมจัดแสดง ผู้แสดงผลงานต้องรับผิดชอบ ชดใช้ค่าเสียหายต่อบุคคลภายนอก เนื่องจากผลแห่งการละเมิดลิขสิทธิ์ หรือสิทธิ์อื่นใดดังกล่าวเองทั้งสิ้น</p>
                                 <p> 3. ผู้จัดแสดงผลงานต้องศึกษารายละเอียดหลักเกณฑ์การเข้าร่วมกิจกรรม และต้องดำเนินการตามหลักเกณฑ์การเข้าร่วมกิจกรรมทุกประการ และยอมรับข้อสงวนสิทธิ์ของ CMDW18 ในการยกเลิก แก้ไข ปรับเปลี่ยน หรือเปลี่ยนแปลงข้อกำหนดและเงื่อนไขต่างๆของเทศกาลที่ CMDW18 เห็นว่าจำเป็นโดยไม่ต้องแจ้งให้ทราบล่วงหน้า ทั้งนี้ การตัดสินใจของ CMDW18 ถือเป็นที่สิ้นสุด</p>
                                 <p> 4. ข้อมูลต่างๆและเอกสารประกอบการสมัครเป็นข้อมูลที่ถูกต้องและเป็นจริงทุกประการ หากปรากฏภายหลังว่าข้อมูลต่างๆและเอกสารประกอบการสมัครไม่ถูกต้องและไม่เป็นจริงเมื่อใด ให้ถือว่าผู้แสดงผลงานขาดคุณสมบัติทันที และหากว่าในกรณีการให้ข้อมูลที่ไม่ถูกต้องหรือไม่เป็นจริงของผู้แสดงผลงานก่อให้เกิดความเสียหายแก่เทศกาล ผู้แสดงผลงานยินยอมที่จะรับผิดชอบโดยไม่มีเงื่อนไข</p> -->
                                 <?php echo @$project[0]->project_provenance; ?>
                                </div>
                              </div>
                              <br>
                            </div>
                            <div class="checkbox check-success  ">

                             <input type="checkbox" value="1" id="checkbox2" <?php echo (!empty($regis['reg_id'])) ? 'checked':'' ?> >
                             <label  for="checkbox2">ฉันยอมรับและได้อ่านเงื่อนไขและข้อตกลงแล้ว</label>
                           </div>


                         </div>
                     

                       </div>
                     </div>
                   </div>
                 </div>
                  <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab2">
                    <div class="row row-same-height">
                    <!-- <div class="col-md-5 b-r b-dashed b-grey "> -->
                      <!-- <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                        <h2>แบบฟอร์มขอเข้าร่วมการจัดแสดงผลงานออกแบบ</h2>
                        <p>ขอบคุณที่คุณมีความสนใจเข้าร่วมโครงการของเรา โปรดกรอกข้อมูลที่จำเป็นตามแบบฟอร์มนี้เพื่อประกอบการสมัครเข้าร่วมโครงการ โดยคุณสามารถศึกษาข้อมูลของโครงการได้ <span> <a href="#">คลิกที่นี่</span></a> หากต้องการข้อมูลหรือคำปรึกษาเพิ่มเติมสามารถติดต่อผู้ประสานงานโครงการที่ด้านล่างนี้ได้</p>
                        <br>
                        <div>
                          <div class="profile-img-wrapper m-t-5 inline">
                            <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                            <div class="chat-status available">
                            </div>
                          </div>
                          <div class="inline m-l-10">
                            <p class="small hint-text m-t-5"><?php echo @$project[0]->project_update_user; ?>
                              <br>ผู้ประสานงานโครงการ</p>
                            </div>
                          </div>
                        </div>

                      </div> -->
 
                      <div class="col-md-12">
                        <div class="padding-30 sm-padding-5">

                            <p style="font-weight: bold">ข้อมูลผู้สมัคร</p>
                            <div class="form-group-attached">
                              <div class="row clearfix">
                                <!-- <div class="col-sm-3">
                                  <div class="form-group form-group-default required">
                                    <label>เลขที่บัตรประชาชน</label>
                                    <input type="text" name="id_number" class="form-control" placeholder="" value="<?php echo @$member->id_number;?>">
                                  </div>
                                </div> -->
                                <div class="col-sm-4">
                                  <div class="form-group form-group-default required form-group-default-selectFx">
                                    <label>คำนำหน้า</label>
                                    <select style="width:100%;"  id="prename" name="prename" >
      
                                      <option  <?php echo (@$member->prename == '') ? 'selected':'';?> value="" >เลือก</option>
                                      <option  <?php echo (@$member->prename == 1) ? 'selected':'';?> value="1">นาย</option>
                                      <option  <?php echo (@$member->prename == 2) ? 'selected':'';?> value="2">นาง</option>
                                      <option  <?php echo (@$member->prename == 3) ? 'selected':'';?> value="3">นางสาว</option>
                                      <option  <?php echo (@$member->prename == 4) ? 'selected':'';?> value="4">ไม่ระบุ</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group form-group-default required">
                                    <label>ชื่อ</label>
                                    <input type="text" name="firstname" class="form-control" value="<?php echo $member->firstname;?>">
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group form-group-default required">
                                    <label>นามสกุล</label>
                                    <input type="text" class="form-control" name="lastname" value="<?php echo $member->lastname;?>">
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="form-group-attached" id="prename_detail" style="display:none;">
                              <div class="row clearfix">
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default ">
                                    <label>โปรดระบุ</label>
                                    <input type="text" name="prename_detail"  class="form-control" value="<?php echo @$member->prename_detail;?>">
                                  </div>
                                </div>
                              </div>
                            </div>

                            <br>

                            <p style="font-weight: bold">ที่อยู่ในการจัดส่งเอกสาร</p>
                            <div class="form-group-attached">
                              <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <div class="form-group form-group-default ">
                                      <label>ชื่อบริษัท/อาคารที่ตั้ง</label><span class="text-danger"><?php echo form_error('company_name'); ?></span>
                                      <input type="text" name="company_name" class="form-control" placeholder="" value="<?php echo set_value('company_name'); ?>">
                                    </div>
                                  </div>

                                </div>
                              
                              <div class="row clearfix">
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default required">
                                    <label>เลขที่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                    <input type="text" name="address" class="form-control" placeholder="" value="<?php echo @$member->address; ?>">
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default ">
                                    <label>หมู่</label><span class="text-danger"><?php echo form_error('village'); ?></span>
                                    <input type="text" name="village" class="form-control" placeholder="" value="<?php echo @$member->village; ?>">
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default ">
                                    <label>ซอย</label><span class="text-danger"><?php echo form_error('lane'); ?></span>
                                    <input type="text" name="lane" class="form-control" placeholder="" value="<?php echo @$member->lane; ?>">
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default ">
                                    <label>ถนน</label><span class="text-danger"><?php echo form_error('Road'); ?></span>
                                    <input type="text" name="road" class="form-control" placeholder="" value="<?php echo @$member->road; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row clearfix">
                              <div class="col-sm-6">
                                  <div class="form-group form-group-default required">
                                    <label>ตำบล/แขวง</label>
                                    <input type="text" class="form-control" placeholder="" name="subdistrict" value="<?php echo $member->subdistrict;?>" >
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group form-group-default required">
                                    <label>เขต/อำเภอ</label>
                                    <input type="text" class="form-control" name="district" value="<?php echo $member->district;?>" >
                                  </div>
                                </div>
                              </div>
                              <div class="row clearfix">

                                <div class="col-sm-4">
                                  <div class="form-group form-group-default required form-group-default-selectFx "><!--form-group-default-selectFx-->
                                    <label>ประเทศ</label><span class="text-danger" style="text-align:center;"><?php echo form_error('country'); ?></span>
                                    <select style="width:100%" name="country" id="country" class=" form-control" data-init-plugin="select2"  >
                                      <option value="">เลือก</option>
                                      <?php foreach ($countries as $key => $value) { ?>
                                        <?php 
                                          $select = '';
                                          if (!empty(@$member->country)){
                                            if(@$member->country == $value->id ){
                                              $select =  'selected="selected"';
                                            }
                                          }else{
                                            if( 'Thailand' == $value->name ){
                                              $select =  'selected="selected"';
                                            }
                                          }
                                        
                                          ?>
                                        <option <?php echo $select; ?>  value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                                      <?php } ?>
                                      
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group form-group-default required form-group-default-selectFx">
                                    <label for="province">จังหวัด</label>
                                    <select style="width: 100% !important;"   name="province" id="province " class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2">
                                        <option value="" selected disable>เลือก</option>
                                        <?php 
                                          foreach ($province as $key => $value) { ?>
                                          <?php 
                                            $select = ''; 
                                            if(@$member->province == $value->code ){
                                                $select =  'selected';
                                            } ?>
                                          <option <?php echo $select; ?> value="<?php echo $value->code;?>"><?php echo $value->name_th;?></option>
                                        <?php } ?>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group form-group-default required">
                                    <label>รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" name="zipcode" value="<?php echo (@$member->zipcode != 0)? @$member->zipcode : '';?>" >
                                  </div>
                                </div>
                              </div>

                              <br>
                              <div class="form-group-attached">
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                    <div class="form-group form-group-default required">
                                      <label>อีเมล</label>
                                      <input type="text" class="form-control" name="email"  value="<?php echo $member->email;?>">
                                    </div>
                                  </div>

                                  <div class="col-sm-6">
                                    <div class="form-group form-group-default required">
                                      <label>โทรศัพท์มือถือ</label>
                                      <input name="phone" type="text" id="phone" class="form-control" value="<?php echo (@$member->phone != 0)? @$member->phone : '';?>">
                                    </div>
                                  </div>


                                </div>
                              </div>
                              <div class="form-group-attached">
                                <div class="row clearfix">

                                  <div class="col-sm-12">
                                    <div class="form-group form-group-default ">
                                      <label>โทรศัพท์</label>
                                      <input name="h_phone" type="text" id="phone" class="form-control" value="<?php echo (@$member->h_phone != 0)? @$member->h_phone : '';?>">
                                    </div>
                                  </div>


                                </div>
                              </div>

                              <br>

                              <!--  status group -->
                              <div id="commany">
                            
                                <p style="font-weight: bold">คุณสมัครในสถานภาพใด</p>
                                  <div class="row clearfix">
                                    <div class="col-sm-12">
                                      <div class="form-group form-group-default  form-group-default-selectFx  required">
                                        <label>สถานภาพ</label>
                                        <select style="width:100%" name="job" id="job" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true" >
                                          <option  <?php echo (@$member->job == '') ? 'selected':'';?> value="" >เลือก</option>
                                          <?php foreach ($status as $key => $value) { ?>
                                            <option data-group="<?php echo $value->status_group;?>" <?php echo (@$member->job == $value->status_id) ? 'selected':'';?> value="<?php echo $value->status_id;?>"><?php echo $value->status_name;?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="row clearfix" id="job_detail" <?php echo (@$member->job_detail && @$member->job == 11) ?  "" : "style='display:none;'" ?>>
                                    <div class="col-sm-12">
                                      <div class="form-group form-group-default ">
                                        <input type="text" name="job_detail" placeholder="ระบุอาชีพของคุณ" class="form-control" value="<?php echo @$member->job_detail; ?>">
                                      </div>
                                    </div> 
                                  </div> -->
                                  <input type="hidden" name="job_group" id= "job_group">
                                  <!-- status group -->
                                  <div id="group_one" style="display:none;">
                                    
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx required">
                                          <label>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด</label>
                                          <select style="width:100%" name="job_type_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                          
                                            <option  <?php echo (@$member->job_type == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->job_type == 1) ? 'selected':'';?> value="1">งานฝีมือและหัตถกรรม</option>
                                            <option  <?php echo (@$member->job_type == 2) ? 'selected':'';?> value="2">ศิลปการแสดง</option>
                                            <option  <?php echo (@$member->job_type == 3) ? 'selected':'';?> value="3">ทัศนศิลป์</option>
                                            <option  <?php echo (@$member->job_type == 4) ? 'selected':'';?> value="4">ดนตรี</option>
                                            <option  <?php echo (@$member->job_type == 5) ? 'selected':'';?> value="5">ภาพยนตร์และวิดีทัศน์</option>
                                            <option  <?php echo (@$member->job_type == 6) ? 'selected':'';?> value="6">การพิมพ์</option>
                                            <option  <?php echo (@$member->job_type == 7) ? 'selected':'';?> value="7">การกระจายเสียง</option>
                                            <option  <?php echo (@$member->job_type == 8) ? 'selected':'';?> value="8">ซอฟต์แวร์</option>
                                            <option  <?php echo (@$member->job_type == 9) ? 'selected':'';?> value="9">การโฆษณา</option>
                                            <option  <?php echo (@$member->job_type == 10) ? 'selected':'';?> value="10">การออกแบบ (รวมถึงแฟชั่น)</option>
                                            <option  <?php echo (@$member->job_type == 11) ? 'selected':'';?> value="11">สถาปัตยกรรม</option>
                                            <option  <?php echo (@$member->job_type == 12) ? 'selected':'';?> value="12">แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx required">
                                          <label>ประสบการณ์</label>
                                          <select style="width:100%" name="company_service_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                          
                                            <option  <?php echo (@$member->company_service == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_service == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                                            <option  <?php echo (@$member->company_service == 2) ? 'selected':'';?> value="2">0 - 3 ปี</option>
                                            <option  <?php echo (@$member->company_service == 3) ? 'selected':'';?> value="3">3 - 10 ปี</option>
                                            <option  <?php echo (@$member->company_service == 4) ? 'selected':'';?> value="4">มากกว่า 10 ปี</option>

                              
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  form-group-default-selectFx required">
                                          <label>ลูกค้าของคุณคือกลุ่มใด</label>
                                          <select style="width:100%" name="company_custom_group" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                            <option  <?php echo (@$member->company_custom_group == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_custom_group == 1) ? 'selected':'';?> value="1">ลูกค้าในประเทศ</option>
                                            <option  <?php echo (@$member->company_custom_group == 2) ? 'selected':'';?> value="2">ลูกค้าต่างประเทศ </option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  form-group-default-selectFx required">
                                          <label>ลักษณะการทำงานของธุรกิจ </label>
                                          <select style="width:100%" name="company_business_look_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                            <option  <?php echo (@$member->company_business_look == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_business_look == 1) ? 'selected':'';?> value="1">รับจ้างผลิต </option>
                                            <option  <?php echo (@$member->company_business_look == 2) ? 'selected':'';?> value="2">รับจัดจำหน่าย</option>
                                            <option  <?php echo (@$member->company_business_look == 3) ? 'selected':'';?> value="3">ผลิตและจัดจำหน่ายภายใต้แบรนด์ตนเอง </option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default required ">
                                          <label>จำนวนพนักงาน (คน) </label>
                                          <input type="text" name="company_people" class="form-control" placeholder="" value="<?php echo @$member->company_people; ?>">
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default ">
                                          <label>เลขทะเบียนนิติบุคคล </label>
                                          <input type="text" name="company_num_regis" class="form-control" placeholder="" value="<?php echo @$member->company_num_regis; ?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="group_two" style="display:none;">
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx required">
                                          <label>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด </label>
                                          <select style="width:100%" name="job_type_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                          
                                            <option  <?php echo (@$member->job_type == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->job_type == 1) ? 'selected':'';?> value="1">งานฝีมือและหัตถกรรม</option>
                                            <option  <?php echo (@$member->job_type == 2) ? 'selected':'';?> value="2">ศิลปการแสดง</option>
                                            <option  <?php echo (@$member->job_type == 3) ? 'selected':'';?> value="3">ทัศนศิลป์</option>
                                            <option  <?php echo (@$member->job_type == 4) ? 'selected':'';?> value="4">ดนตรี</option>
                                            <option  <?php echo (@$member->job_type == 5) ? 'selected':'';?> value="5">ภาพยนตร์และวิดีทัศน์</option>
                                            <option  <?php echo (@$member->job_type == 6) ? 'selected':'';?> value="6">การพิมพ์</option>
                                            <option  <?php echo (@$member->job_type == 7) ? 'selected':'';?> value="7">การกระจายเสียง</option>
                                            <option  <?php echo (@$member->job_type == 8) ? 'selected':'';?> value="8">ซอฟต์แวร์</option>
                                            <option  <?php echo (@$member->job_type == 9) ? 'selected':'';?> value="9">การโฆษณา</option>
                                            <option  <?php echo (@$member->job_type == 10) ? 'selected':'';?> value="10">การออกแบบ (รวมถึงแฟชั่น)</option>
                                            <option  <?php echo (@$member->job_type == 11) ? 'selected':'';?> value="11">สถาปัตยกรรม</option>
                                            <option  <?php echo (@$member->job_type == 12) ? 'selected':'';?> value="12">แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx required">
                                          <label>ประสบการณ์</label>
                                          <select style="width:100%" name="company_service_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                          
                                            <option  <?php echo (@$member->company_service == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_service == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                                            <option  <?php echo (@$member->company_service == 2) ? 'selected':'';?> value="2">0 - 3 ปี</option>
                                            <option  <?php echo (@$member->company_service == 3) ? 'selected':'';?> value="3">3 - 10 ปี</option>
                                            <option  <?php echo (@$member->company_service == 4) ? 'selected':'';?> value="4">มากกว่า 10 ปี</option>

                              
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx required">
                                            <label>ลักษณะการทำงาน</label>
                                            <select style="width:100%" name="company_work_look" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                              <option  <?php echo (@$member->company_work_look == '') ? 'selected':'';?> value="" >เลือก</option>
                                              <option  <?php echo (@$member->company_work_look == 1) ? 'selected':'';?> value="1">รับจ้างออกแบบอิสระ</option>
                                              <option  <?php echo (@$member->company_work_look == 2) ? 'selected':'';?> value="2">ทำงานออกแบบอยู่ในบริษัทหรือแบรนด์</option>
                                              <option  <?php echo (@$member->company_work_look == 3) ? 'selected':'';?> value="3">ออกแบบ ผลิตและจำหน่ายเอง</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default form-group-default-selectFx required">
                                            <label>ช่องทางการจำหน่าย</label>
                                            <select style="width:100%" name="company_sell_way" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                              <option  <?php echo (@$member->company_sell_way == '') ? 'selected':'';?> value="" >เลือก</option>
                                              <option  <?php echo (@$member->company_sell_way == 1) ? 'selected':'';?> value="1">ออนไลน์ </option>
                                              <option  <?php echo (@$member->company_sell_way == 2) ? 'selected':'';?> value="2">ร้านค้าหรือออกบูธ</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-selectFx required">
                                            <label>คุณสามารถรับจ้างผลิตสินค้าตามจำนวนได้หรือไม่  </label>
                                            <select style="width:100%" name="company_product_build" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                              <option  <?php echo (@$member->company_product_build == '') ? 'selected':'';?> value="" >เลือก</option>
                                              <option  <?php echo (@$member->company_product_build == 1) ? 'selected':'';?> value="1">ได้ </option>
                                              <option  <?php echo (@$member->company_product_build == 2) ? 'selected':'';?> value="2">ไม่ได้</option>
                                            </select>
                                          </div>
                                      </div>
                                    </div>

                                  </div>
                                
                                  <div id="group_three" style="display:none;">
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx required">
                                            <label>การทำงานของคุณอยู่ในกลุ่มใด</label>
                                            <select style="width:100%" id="company_group_product" name="company_group_product" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                              <option  <?php echo (@$member->company_group_product == 1) ? 'selected':'';?> value="1">งานไม้</option>
                                              <option  <?php echo (@$member->company_group_product == 2) ? 'selected':'';?> value="2">งานทอผ้า/ย้อม</option>
                                              <option  <?php echo (@$member->company_group_product == 3) ? 'selected':'';?> value="3">งานปั้น</option>
                                              <option  <?php echo (@$member->company_group_product == 4) ? 'selected':'';?> value="4">งานจักรสาน</option>
                                              <option  <?php echo (@$member->company_group_product == 5) ? 'selected':'';?> value="5">งานเขียนสีแต่งลาย</option>
                                              <option  <?php echo (@$member->company_group_product == 6) ? 'selected':'';?> value="6">งานเครื่องเงิน</option>
                                              <option  <?php echo (@$member->company_group_product == 7) ? 'selected':'';?> value="7">อื่นๆ โปรดระบุ</option>
                                          
                                            </select>
                                            
                                          </div>
                                          <div class="row" id="company_group_product_detail" style="display:none;">
                                              <div class="form-group form-group-default ">
                                                <input type="text" name="company_group_product_detail" class="form-control" placeholder="" value="<?php echo @$member->company_group_product_detail; ?>">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx required">
                                            <label>ประสบการณ์</label>
                                            <select style="width:100%" name="company_service_three" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                            
                                              <option  <?php echo (@$member->company_service == '') ? 'selected':'';?> value="" >เลือก</option>
                                              <option  <?php echo (@$member->company_service == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                                              <option  <?php echo (@$member->company_service == 2) ? 'selected':'';?> value="2">0 - 3 ปี</option>
                                              <option  <?php echo (@$member->company_service == 3) ? 'selected':'';?> value="3">3 - 10 ปี</option>
                                              <option  <?php echo (@$member->company_service == 4) ? 'selected':'';?> value="4">มากกว่า 10 ปี</option>

                                
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row ">
                                      <div class="col-sm-12">
                                        <div class="form-group required">
                                          <label>โปรดระบุเทคนิคหรือความเชี่ยวชาญที่ใช้ทำงาน </label>
                                          <?php if (!empty($member->company_technic)){ 
                                              $company_technic = explode(',',$member->company_technic);
                                              foreach ($company_technic as $key => $value) { ?>
                                                  <input type="text" name="company_technic[<?= $key ?>]" class="form-control"  value="<?php echo @$value;  ?>">
                                            <?php  } ?>
                                           
                                          <?php }else{ ?>
                                            <input type="text" name="company_technic[]" class="form-control" placeholder="1." value="<?php echo '';  ?>">
                                            <input type="text" name="company_technic[]" class="form-control" placeholder="2." value="<?php echo '';  ?>">
                                            <input type="text" name="company_technic[]" class="form-control" placeholder="3." value="<?php echo '';  ?>">
                                          <?php  } ?>  
                                        </div>
                                      </div>

                                    </div>
                                    <div class="row" >
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx required">
                                          <label> การผลิตสินค้าหรือผลงานของคุณเป็นรูปแบบใด</label>
                                          <select style="width:100%" name="company_product_detail" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                            <option  <?php echo (@$member->company_product_detail == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_product_detail == 1) ? 'selected':'';?> value="1">แบบศิลปวัฒนธรรมดั้งเดิม </option>
                                            <option  <?php echo (@$member->company_product_detail == 2) ? 'selected':'';?> value="2">แบบตามไอเดียที่คิดขึ้นใหม่</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row" >
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default required ">
                                          <label>คุณสามารถผลิตได้จำนวน ชิ้น/ต่อเดือน </label>
                                          <input type="text" name="company_num_product" class="form-control" placeholder="" value="<?php echo @$member->company_num_product; ?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="group_four" style="display:none;">
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-6" id="four_eig" style="display:none;">
                                          <div class="form-group form-group-default  form-group-default-selectFx required">
                                            <label>องค์กรของคุณคือหน่วยงานประเภทใด</label>
                                            <select id="four_eig_detail"  style="width:100%" name="company_department" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                              <option  <?php echo (@$member->company_department == '') ? 'selected':'';?> value="">เลือก</option>
                                              <option  <?php echo (@$member->company_department == 2) ? 'selected':'';?> value="2">องค์กรระหว่างประเทศ </option>
                                              <option  <?php echo (@$member->company_department == 3) ? 'selected':'';?> value="3">หน่วยงานภาครัฐ</option>
                                              <option  <?php echo (@$member->company_department == 4) ? 'selected':'';?> value="4">สถาบันและพิพิธภัณฑ์</option>
                                              <option  <?php echo (@$member->company_department == 5) ? 'selected':'';?> value="5">สื่อมวลชน</option>
                                              <option  <?php echo (@$member->company_department == 6) ? 'selected':'';?> value="6">สมาคม</option>
                                              <option  <?php echo (@$member->company_department == 7) ? 'selected':'';?> value="7">วัดและชุมชน</option>
                                              <option  <?php echo (@$member->company_department == 8) ? 'selected':'';?> value="8">อื่นๆ</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-6" id="four_nine" style="display:none;">
                                          <div class="form-group form-group-default  form-group-default-selectFx required">
                                            <label>องค์กรของคุณคือหน่วยงานประเภทใด</label>
                                            <select id="four_nine_detail"  style="width:100%" name="company_department" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                              <option  <?php echo (@$member->company_department == '') ? 'selected':'';?> value="">เลือก</option>
                                              <option  <?php echo (@$member->company_department == 2) ? 'selected':'';?> value="2">มหาวิทยาลัย</option>
                                              <option  <?php echo (@$member->company_department == 3) ? 'selected':'';?> value="3">วิทยาลัยอาชีวะศึกษา</option>
                                              <option  <?php echo (@$member->company_department == 4) ? 'selected':'';?> value="4">วิทยาลัยเทคนิค</option>
                                              <option  <?php echo (@$member->company_department == 5) ? 'selected':'';?> value="5">โรงเรียน</option>
                                              <option  <?php echo (@$member->company_department == 6) ? 'selected':'';?> value="6">อื่นๆ</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx required">
                                            <label>หน้าที่หลักขององค์กร</label>
                                            <select style="width:100%" name="company_duty" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                              <option  <?php echo (@$member->company_duty == '') ? 'selected':'';?> value="">เลือก</option>
                                              <option  <?php echo (@$member->company_duty == 1) ? 'selected':'';?> value="1">ส่งเสริมความคิดสร้างสรรค์ และการออกแบบ </option>
                                              <option  <?php echo (@$member->company_duty == 2) ? 'selected':'';?> value="2">ส่งเสริมศิลปวัฒนธรรม </option>
                                              <option  <?php echo (@$member->company_duty == 3) ? 'selected':'';?> value="3">ส่งเสริมความรับผิดชอบต่อสังคม</option>
                                              <option  <?php echo (@$member->company_duty == 4) ? 'selected':'';?> value="4">ส่งเสริมการค้าและธุรกิจ</option>
                                              <option  <?php echo (@$member->company_duty == 5) ? 'selected':'';?> value="5">ส่งเสริมวิชาชีพ</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group  ">
                                          <label>คุณเคยร่วมงาน Design Week ใดๆ หรือไม่ <span style="color:red">*</span> </label><br>
                                          <span class="checkbox check-success">
                                              <input  <?php echo (@$member->company_join_work == 1) ? 'checked':'';?>  type="checkbox"  value="1" name="company_join_work" id="target_type3">
                                              <label for="target_type3">เคย</label>
                                            </span>
                                            <span class="checkbox check-success">
                                              <input  <?php echo (@$member->company_join_work == 0) ? 'checked':'';?>  type="checkbox"  value="0" name="company_join_work" id="target_type4">
                                              <label for="target_type4">ไม่เคย</label>
                                            </span>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                              </div>
                                  <!-- end status group -->

                              <br>

                              <div class="form-group-attached" >
                              <p style="font-weight: bold">ข้อมูลเพิ่มเติมสำหรับผู้สมัคร</p>
                              
                              <div class="form-group-attached">
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                      <div class="form-group form-group-default">
                                        <label>ชื่อแบรนด์</label>
                                        <input type="text" class="form-control" name="brand" value="<?php echo @$member->brand; ?>" > 
                                      </div>
                                    </div>

                                  <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                      <label>บริษัท</label>
                                      <input type="text" id="company" name="company" class="form-control" value="<?php echo @$member->company; ?>">
                                    </div>
                                  </div>
                                  
                                </div>

                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                    <div class="col-sm-6">
                                      <div class="form-group form-group-default">
                                        <label>เฟซบุ๊ค แฟนเพจ</label>
                                        <input type="text" class="form-control" name="facebook" value="<?php echo @$member->facebook; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group form-group-default">
                                        <label>อินสตาแกรม</label>
                                        <input type="text" class="form-control" name="instragram" value="<?php echo @$member->instragram; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default ">
                                          <label>ไลน์ @</label>
                                          <input type="text" class="form-control" name="lineid" value="<?php echo @$member->lineid; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group form-group-default">
                                        <label>เว็บไซต์</label>
                                        <input type="text" id="website" name="website" class="form-control" value="<?php echo @$member->website; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>




                              </div>

                              <br>
                              <?php 
                                  $status2 = 'checked';
                                  $status1 = '';
                                  if (@$member->coordinator_type == 0){ 
                                    $status1 = 'checked';
                                    $status2 = '';
                              }?>
                              <p style="font-weight: bold">ผู้ประสานงานการสมัคร</p>
                              <br>
                              <div class="radio radio-default">
                                <input type="radio" value="0" name="radio22" id="radio2Yes" <?php echo $status1;?> >
                                <label for="radio2Yes">ฉันเป็นผู้ประสานงาน</label>
                                <input type="radio" value="1" name="radio22" id="radio2No" <?php echo $status2;?>>
                                <label for="radio2No">เพิ่มผู้ประสานงาน</label>
                              </div>
                              <br><br>

                              <!-- ข้อมูลผู้ประสานงาน เริ่ม -->
                              <div id="agent" style="display:<?php ($status2 =='checked')?'block':'none';?>">
                                <!-- <p style="font-weight: bold" >ข้อมูลผู้ประสานงานสำหรับการสมัครเข้าร่วม</p> -->
                             
                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                    <div class="col-sm-3">
                                      <div class="form-group form-group-default required form-group-default-selectFx">
                                        <label>คำนำหน้า</label>
                                        <select style="width:100%" name="coordinator_prename" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
                                          <option <?php echo (@$member->coordinator_prename == '')? 'selected':''?> value="">โปรดเลือก</option>
                                          <option <?php echo (@$member->coordinator_prename == '1')? 'selected':''?> value="1">นาย</option>
                                          <option <?php echo (@$member->coordinator_prename == '2')? 'selected':''?> value="2">นาง</option>
                                          <option <?php echo (@$member->coordinator_prename == '3')? 'selected':''?> value="3">นางสาว</option>
                                          <option <?php echo (@$member->coordinator_prename == '4')? 'selected':''?> value="4">อื่นๆ</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-5">
                                      <div class="form-group form-group-default required">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" name="coordinator_firstname" value="<?php echo @$member->coordinator_firstname; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="form-group form-group-default required">
                                        <label>นามสกุล</label>
                                        <input type="text" class="form-control" name="coordinator_lastname" value="<?php echo @$member->coordinator_lastname; ?>">
                                      </div>
                                    </div>
                                  </div>


                                </div>
  
                                <br>
                                <div class="form-group-attached">
                                    <div class="row clearfix">

                                     <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                          <label>อีเมล</label>
                                          <input type="text" id="phone" class="form-control" name="coordinator_email" value="<?php echo @$member->coordinator_email; ?>">
                                        </div>
                                      </div>

                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                          <label>โทรศัพท์มือถือ</label>
                                          <input type="text" id="phone" class="form-control" name="coordinator_phone" value="<?php echo @$member->coordinator_phone; ?>">
                                        </div>
                                      </div>


                                    </div>

                                  </div>
                              </div>




                              <!-- ข้อมูลผู้ประสานงาน จบ -->                              
                            </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="tab-pane  slide-left padding-20 sm-no-padding " id="tab3">

                 
                      <div class="row clearfix row-same-height ">

                        <div class="col-md-12">
                        <div class="padding-30 sm-padding-5">
                        <p style="font-weight: bold">เป้าหมายในการสมัคร</p>
                          <div class="form-group-default required">
                           
                            <div class="checkbox check-success">
                              <input <?php echo (@$regis['target_type'] == 1)? 'checked':'' ?> type="checkbox"  value="1" name="target_type" id="target_type1">
                              <label for="target_type1">นำเสนอผลงานออกแบบและแบรนด์ให้เป็นที่รู้จัก</label>
                            </div>
                            <div class="checkbox check-success">
                              <input <?php echo (@$regis['target_type'] == 2)? 'checked':'' ?> type="checkbox"  value="2" name="target_type" id="target_type2">
                              <label for="target_type2">พบคู่ค้าทางธุรกิจและรับออเดอร์</label>
                            </div>
                            <div class="checkbox check-success">
                              <input <?php echo (@$regis['target_type'] == 3)? 'checked':'' ?> type="checkbox"  value="3" name="target_type" id="ttttt">
                              <label for="ttttt">จำหน่ายสินค้า</label>
                            </div>
                            <!-- <div class="checkbox check-success">
                              <input  <?php echo (@$regis['target_type'] == 4)? 'checked':'' ?> type="checkbox"  value="4" name="target_type" id="target_ty4">
                              <label for="target_ty4">อื่นๆ (โปรดระบุ)</label>
                            </div> -->

                            <div class="form-group-attached" id="target_type_detail" style="display:none;">
                              <div class="form-group form-group-default ">

                                <input type="text" class="form-control" placeholder="" value="<?php echo @$regis['target_type_detail']; ?>" name="target_type_detail">
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        </div>
                      </div>
                      
                      <div class="clone-form">
                      <?php if( empty(@$regis['product']) ) { ?>

                      <div class="clonedInput" id="clonedInput">
                          <div class="row row-same-height " id ="second">
                              <!-- <div class="col-md-5 b-r b-dashed b-grey ">
                                <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                                  <h2>ข้อมูลผลงานออกแบบ</h2>
                                  <p>ข้าพเจ้าขอยืนยันว่าผลงานชิ้นนี้ไม่ได้มีการทำซ้ำหรือคัดลอกมาจากผู้อื่น ไม่ต้องกังวลคุณสามารถเข้ามาแก้ไขข้อมูลได้ตามที่คุณต้องการ</p>
                                </div>
                              </div> -->

                              
                                <div class="col-md-12 ">
                                  <div class="padding-30 sm-padding-5">
                                  <div class="row clearfix">
                                    <div class="col-md-6">
                                      <span align="center" ><h5 id="num"  style="font-family: 'dbch';font-weight: bold;" class="num text-left" >คอลเลกชั่น 1</h5></span>
                                    </div>
                                    <div class="col-md-6 text-right" id="remove_clone" style="display:none">
                                    <a  style="color:white;"  class="btn btn-primary btn-cons remove"><i class="fa fa-times"></i> ยกเลิก</a>
                                    </div>
                                  </div>
                                 
                                    <p style="font-weight: bold;"> ข้อมูลผลงาน </p>
                                    <div class="form-group-attached">
                                        <div class="row clearfix">
                                            <div class="col-sm">
                                              
                                              <div class="form-group form-group-default required">
                                                <label>จำนวนชิ้นงาน</label>
                
                                                <input name="product_amount[]" class="form-control"  type="text" >
                                              </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">

                                          <div class="col-sm-4">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label>ประเภทผลงาน</label>
                                              <select style="width:100%" name="product_type[]" class="cs-select cs-skin-slide cs-transparent form-control product_type" data-init-plugin="select2" data-disable-search="true">
                                                <option  value="">เลือก</option>
                                                <option  value="1">เฟอร์นิเจอร์</option>
                                                <option  value="2">ไลฟ์สไตล์</option>
                                                <option  value="3">ของตกแต่งบ้าน</option>
                                                <option  value="4">เครื่องประดับ</option>
                                                <option  value="5">แฟชั่น</option>
                                                <option  value="6">ออกแบบสื่อ (Multimedia, Graphic, Interactive)</option>
                                              
                                              </select>
                                            </div>
                                          </div>

                                          <div class="col-sm-8">
                                            <div class="form-group form-group-default required">
                                              <label>ชื่อผลงาน</label>
                                              <input  id="product_name" name="product_name[]" type="text" class="form-control" >
                                            </div>
                                          </div>
                                          
                                        </div>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default required">
                                                <label>วัสดุหลัก</label>
                                                <input name="material[]" type="text" class="form-control"  >
                                              </div>
                                            </div>

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default form-group-default-selectFx">
                                                <label >ปีที่ออกแบบ</label>

                                              <select style="width:100%" name="product_date[]" class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2" data-disable-search="false">
                                              <option  value="" >เลือก</option>
        
                                                <?php for ($i = 1959;$i<=2030;$i++) { 
                                                  $select = '';
                                                  
                                                    if(set_value('product_date') == $i ){
                                                      $select =  'selected="selected"';
                                                    }
                                              
                                                  ?>
                                                  <option <?php echo $select; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                              </select>
                                            
                                  

                                              </div>
                                            </div>

                                          </div>
                                        </div>


                                        <br>
                                        <p style="font-weight: bold;">ขนาดและจำนวนของผลงาน</p>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">
                                            <div class="col-sm-4">

                                              <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                  <label class="">กว้าง</label>
                                                  <input name="product_width[]" class="form-control" type="text" >
                                                </div>
                                                <div class="input-group-addon">
                                                  ซ.ม.
                                                </div>
                                              </div>

                                            </div>

                                            <div class="col-sm-4">
                                              <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                  <label class="">ยาว</label>
                                                  <input name="product_length[]" class="form-control" type="text" >
                                                </div>
                                                <div class="input-group-addon">
                                                  ซ.ม.
                                                </div>
                                              </div>
                                            </div>

                                            <div class="col-sm-4">
                                              <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                  <label class="">สูง</label>
                                                  <input  name="product_height[]"class="form-control" type="text" >
                                                </div>
                                                <div class="input-group-addon">
                                                  ซ.ม.
                                                </div>
                                              </div>
                                            </div>
                                            <br>

                                          </div>
                                        </div>

                                        <br>

                                        <div class="form-group-attached ">
                                          <div class="row clearfix">
                                            <div class="col-sm-12">
                                              <p style="font-weight: bold;">แนวคิดในการออกแบบผลงาน (ไม่เกิน 200 คำ)<span style="color:red">*</span></p>
                                              <div class="wysiwyg5-wrapper b-a b-grey">
                                                <textarea name="product_concept[]" id="" class="product_concept demo-form-wysiwyg"  placeholder="" ui-jq="wysihtml5" ui-options="{
                                                html: true,
                                                stylesheets: ['pages/css/editor.css']
                                                }"></textarea>
                                              </div>
                                            </div>

                                    



                                          </div>
                                        </div>

                                        <br>
                                        <p style="font-weight: bold;">ภาพผลงาน<span style="color:red">*</span></p>

                                        <div class="col-sm-12">
                                            <div class="row clearfix">
                                              <div class="col-sm-6">
                                                <div class="form-group  ">
                                                  <label>ภาพรวมของผลงาน <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span></label>
                                                  <div class="fallback">
                                                    <input id="product_img" class="product_img" name="product_img[1][]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group  ">
                                                  <label>ไฟล์นำเสนอผลงาน (ถ้ามี)  <p style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</p></label>
                                                  <div class="fallback">
                                                    <input  id="product_pdf" name="product_pdf[1][]" type="file" accept="application/pdf"  />
                                                  </div>
                                                </div>
                                              </div>
                                            
                                            </div>

                                            <div class="row clearfix">
                                              <div class="col-sm-12">
                                                <div class="form-group ">
                                                  <label>ภาพ Close Up <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span></label>
                                                  <div class="fallback">
                                                    <input id="product_closeup" class="product_closeup" name="product_closeup[1][]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                                  </div>
                                                </div>
                                              </div>
                                            
                                            </div>

                                            <div class="row clearfix">
                                              <div class="col-sm-12">
                                                <div class="form-group ">
                                                  <label>ภาพ Pack Shot <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span></label>
                                                  <div class="fallback">
                                                    <input id="product_packshot"  class="product_packshot" name="product_packshot[1][]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                            
                                            </div>
                                        
                                        </div>

                                      </div>


                                    <br>
                                    <p style="font-weight: bold;">ผู้ออกแบบ</p>

                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                      <div class="col-sm-4">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label>คำนำหน้า</label>
                                              <select  style="width:100%"  id="product_prename" name="product_prename[]" class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2" data-disable-search="true">
                                                  <option disabled value="" >เลือก</option>
                                                  <option  value="1">นาย</option>
                                                  <option   value="2">นาง</option>
                                                  <option  value="3">นางสาว</option>
                                                  <option   value="4">อื่น ๆ</option>
                                                </select>
                                            </div>
                                          </div>


                                        <div class="col-sm-4">
                                          <div class="form-group form-group-default required">
                                            <label>ชื่อ</label>
                                            <input type="text" class="form-control" name="product_firstname[] "  >
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                          <div class="form-group form-group-default required">
                                            <label>นามสกุล</label>
                                            <input type="text" class="form-control" name="product_lastname[]" >
                                          </div>
                                        </div>

                                    </div>
                                  </div>
                                  </div>

                                  <div class="row clearfix">
                                    <div class="col-md-12">
                                      <div class="padding-10 sm-padding-5">
                                        <div class="checkbox check-success  ">
                                            <input type="checkbox" value="1" class="check_product" id="product_check1" <?php echo (!empty($regis['reg_id'])) ? 'checked':'' ?>>
                                            <label  class="check_product_for" for="product_check1">ข้าพเจ้ายืนยันว่าผลงานข้างต้นไม่ได้มีการทำซ้ำหรือคัดลอกมาจากผู้อื่น</label>
                                        </div>
                              
                                        <hr >
                                      </div>
                                    </div>
                                  </div>

                                    <hr style="height:2px;border:none;color:#333;background-color:#333;">

                                  <!-- เริ่มส่วนที่ 2 -->


                                
                                <!-- จบส่วนที่ 2 -->
                                </div>
                                                
                          </div>
                        </div>
                      
                      <?php }else{ ?>
                      <?php foreach (@$regis['product'] as $keys => $value) {?>
                      
                    
                        <div class="clonedInput" id="clonedInput<?php echo $keys+1;?>">
                          <div class="row row-same-height " id ="second">
                              <!-- <div class="col-md-5 b-r b-dashed b-grey ">
                                <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                                  <h2>ข้อมูลผลงานออกแบบ</h2>
                                  <p>โปรดกรอกข้อมูลชิ้นงานที่ท่านต้องการจัดแสดงตามแบบฟอร์มของเรา ไม่ต้องกังวลคุณสามารถเข้ามาแก้ไขข้อมูลได้ตามที่คุณต้องการ</p>
                                </div>
                              </div> -->
                              <!-- <div class="col-md-12 ">
                                  <div class="padding-30 sm-padding-5">
                                     <span align="center" ><p id="num"  style="font-weight: bold;" class="num text-left" >คอลเลกชั่น <?php echo $keys+1; ?></p></span>
                                  </div>
                              </div> -->
                                <div class="col-md-12 ">
                                  <div class="padding-30 sm-padding-5">
                                  <span align="center" ><h5 id="num"  style="font-family: 'dbch';font-weight: bold;" class="num text-left" >คอลเลกชั่น <?php echo $keys+1; ?></h5></span>
                                    <p style="font-weight: bold;">ข้อมูลผลงาน </p>
                                    <div class="form-group-attached">
                                        <div class="row clearfix">
                                              <div class="col-sm">
                                    
                                                <div class="form-group form-group-default  ">  
                                                  <label>จำนวนชิ้นงาน</label>
                                                
                                                  <input name="product_amount[<?php echo $keys;?>]" class="form-control"  type="text" value="<?php echo @$value['product_amount']?>">
                                                </div>
                                              </div>
                                        </div>
                                        <div class="row clearfix">

                                          <div class="col-sm-4">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label>ประเภทผลงาน</label>
                                              <select style="width:100%" name="product_type[<?php echo $keys;?>]" class="cs-select cs-skin-slide cs-transparent form-control product_type" data-init-plugin="select2"  data-disable-search="true">
                                                <option <?php echo (@$value['product_type'] == '') ? 'selected':''?> value="">เลือก</option>
                                                <option <?php echo (@$value['product_type'] == '1') ? 'selected':''?> value="1">เฟอร์นิเจอร์</option>
                                                <option <?php echo (@$value['product_type'] == '2') ? 'selected':''?> value="2">ไลฟ์สไตล์</option>
                                                <option <?php echo (@$value['product_type'] == '3') ? 'selected':''?> value="3">ของตกแต่งบ้าน</option>
                                                <option <?php echo (@$value['product_type'] == '4') ? 'selected':''?> value="4">เครื่องประดับ</option>
                                                <option <?php echo (@$value['product_type'] == '5') ? 'selected':''?> value="5">แฟชั่น</option>
                                                <option <?php echo (@$value['product_type'] == '6') ? 'selected':''?> value="6">ออกแบบสื่อ (Multimedia, Graphic, Interactive)</option>
                                              
                                              </select>
                                            </div>
                                          </div>

                                          <div class="col-sm-8">
                                            <div class="form-group form-group-default required">
                                              <label>ชื่อผลงาน</label>
                                              <input  id="product_name" name="product_name[<?php echo $keys;?>]" type="text" class="form-control" value="<?php echo @$value['product_name']?>" >
                                            </div>
                                          </div>
                                          
                                        </div>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default required">
                                                <label>วัสดุหลัก</label>
                                                <input name="material[<?php echo $keys;?>]" type="text" class="form-control" value="<?php echo @$value['material']?>" >
                                              </div>
                                            </div>

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default">
                                              <label >ปีที่ออกแบบ</label>

                                               <select style="width:100%" name="product_date[<?php echo $keys;?>]" class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2" data-disable-search="false">
                                                <option  value="" >เลือก</option>
          
                                                  <?php for ($i = 1959;$i<=2030;$i++) { 
                                                    $select = '';
                                                    
                                                      if($value['product_date'] == $i ){
                                                        $select =  'selected="selected"';
                                                      }
                                                
                                                    ?>
                                                    <option <?php echo $select; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                  <?php } ?>
                                                </select>
                              

                                              </div>
                                            </div>

                                          </div>
                                        </div>


                                        <br>
                                        <p style="font-weight: bold;">ขนาดและจำนวนของผลงาน</p>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">
                                            <div class="col-sm-4">

                                              <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                  <label class="">กว้าง</label>
                                                  <input name="product_width[<?php echo $keys;?>]" class="form-control" type="text" value="<?php echo @$value['product_width']?>">
                                                </div>
                                                <div class="input-group-addon">
                                                  ซ.ม.
                                                </div>
                                              </div>

                                            </div>

                                            <div class="col-sm-4">
                                              <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                  <label class="">ยาว</label>
                                                  <input name="product_length[<?php echo $keys;?>]" class="form-control" type="text" value="<?php echo @$value['product_length']?>">
                                                </div>
                                                <div class="input-group-addon">
                                                  ซ.ม.
                                                </div>
                                              </div>
                                            </div>

                                            <div class="col-sm-4">
                                              <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                  <label class="">สูง</label>
                                                  <input  name="product_height[<?php echo $keys;?>]"class="form-control" type="text" value="<?php echo @$value['product_height']?>">
                                                </div>
                                                <div class="input-group-addon">
                                                  ซ.ม.
                                                </div>
                                              </div>
                                            </div>
                                            <br>

                                          </div>
                                        </div>

                                        <br>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">
                                            <div class="col-sm-12">
                                              <p style="font-weight: bold;">แนวคิดในการออกแบบผลงาน (ไม่เกิน 200 คำ)<span style="color:red">*</span></p>
                                              <div class="wysiwyg5-wrapper b-a b-grey">
                                                <textarea style="  font-family: 'dbch', sans-serif !important;" name="product_concept[<?php echo $keys;?>]" id="" class="product_concept demo-form-wysiwyg" placeholder="" ui-jq="wysihtml5" ui-options="{
                                                html: true,
                                                stylesheets: ['pages/css/editor.css']
                                                }"><?php echo @$value['product_concept']?></textarea>
                                              </div>
                                            </div>

                                    



                                          </div>
                                        </div>

                                        <br>
                                        <p style="font-weight: bold;">ภาพผลงาน<span style="color:red">*</span></p>

                                        <div class="col-sm-12">
                                            <div class="row clearfix">
                                              <div class="col-sm-6">
                                                <div class="form-group  ">
                                                  <label>ไฟล์นำเสนอผลงาน <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span> </label>
                                                  <div class="row">
                                                  <?php
                                                     if (!empty($value['product_img'])){
                                                        $product_img = explode(',',$value['product_img']);
                                                    
                                                        foreach ($product_img as $key => $val) { ?>
                                                          <img src="<?= base_url().$val;?>" width='100px' height="100">
                                                          <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                                          echo '&nbsp;'; -->
                                                       <?php }
                                                     }
                                                   
                                                  ?>
                                                  </div>
                                                  <div class="fallback">
                                                    <input id="product_img"  name="product_img[<?php echo $keys+1;?>][]" type="file" multiple="multiple" accept="image/jpeg, image/png" />
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group  ">
                                                  <label>ไฟล์นำเสนอผลงาน (ถ้ามี)  <p style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</p></label>
                                                  <div class="fallback">
                                                    <input  id="product_pdf" name="product_pdf[<?php echo $keys+1;?>][]" type="file" accept="application/pdf"  />
                                                  </div>
                                                </div>
                                              </div>
                                            
                                            </div>

                                            <div class="row clearfix">
                                              <div class="col-sm-12">
                                                <div class="form-group ">
                                                  <label>ภาพ Close Up <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span></label>
                                                  <div class="row">
                                                  <?php
                                                     if (!empty($value['product_closeup'])){
                                                        $product_img = explode(',',$value['product_closeup']);
                                                    
                                                        foreach ($product_img as $key => $val) { ?>
                                                          <img src="<?= base_url().$val;?>" width='100px' height="100">
                                                          <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                                          echo '&nbsp;'; -->
                                                       <?php }
                                                     }
                                                   
                                                  ?>
                                                  </div>
                                                  <div class="fallback">
                                                    <input id="product_closeup" name="product_closeup[<?php echo $keys+1;?>][]" type="file" multiple="multiple" accept="image/jpeg, image/png"  />
                                                  </div>
                                                </div>
                                              </div>
                                            
                                            </div>

                                            <div class="row clearfix">
                                              <div class="col-sm-12">
                                                <div class="form-group ">
                                                  <label>ภาพ Pack Shot <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span></label>
                                                  <div class="row">
                                                  <?php
                                                     if (!empty($value['product_packshot'])){
                                                        $product_img = explode(',',$value['product_packshot']);
                                                    
                                                        foreach ($product_img as $key => $val) { ?>
                                                          <img src="<?= base_url().$val;?>" width='100px' height="100">
                                                          <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                                          echo '&nbsp;'; -->
                                                       <?php }
                                                     }
                                                   
                                                  ?>
                                                  </div>
                                                  <div class="fallback">
                                                    <input id="product_packshot" name="product_packshot[<?php echo $keys+1;?>][]" type="file" multiple="multiple" accept="image/jpeg, image/png"  />
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                            
                                            </div>
                                        
                                        </div>

                                      </div>


                                    <br>
                                    <p style="font-weight: bold;">ผู้ออกแบบ</p>

                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label>คำนำหน้า</label>
                                              <select  style="width:100%"  id="product_prename" name="product_prename[<?php echo $keys;?>]" class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2" data-disable-search="true">
                                                  <option disabled <?php echo (@$value['product_prename'] == '') ? 'selected':'';?> value="" >เลือก</option>
                                                  <option  <?php echo (@$value['product_prename'] == 1) ? 'selected':'';?> value="1">นาย</option>
                                                  <option  <?php echo (@$value['product_prename'] == 2) ? 'selected':'';?> value="2">นาง</option>
                                                  <option  <?php echo (@$value['product_prename'] == 3) ? 'selected':'';?> value="3">นางสาว</option>
                                                  <option  <?php echo (@$value['product_prename'] == 4) ? 'selected':'';?> value="4">อื่น ๆ</option>
                                                </select>
                                            </div>
                                          </div>

                                        <div class="col-sm-4">
                                          <div class="form-group form-group-default required">
                                            <label>ชื่อ</label>
                                            <input type="text" class="form-control" name="product_firstname[<?php echo $keys;?>] " value="<?php echo @$value['product_firstname'];?>" >
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="form-group form-group-default required">
                                          <label>นามสกุล</label>
                                          <input type="text" class="form-control" name="product_lastname[<?php echo $keys;?>]" value="<?php echo @$value['product_lastname'];?>">
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                  </div>

                                  
                                  <div class="row clearfix">
                                    <div class="col-md-12">
                                      <div class="padding-10 sm-padding-5">
                                        <div class="checkbox check-success  ">
                                            <input type="checkbox" value="1" class="check_product" id="product_check<?php echo $keys+1;?>" <?php echo (!empty($regis['reg_id'])) ? 'checked':'' ?>>
                                            <label clss="check_product_for" for="product_check<?php echo $keys+1;?>">ข้าพเจ้ายืนยันว่าผลงานข้างต้นไม่ได้มีการทำซ้ำหรือคัดลอกมาจากผู้อื่น</label>
                                        </div>
                              
                                        <hr >
                                      </div>
                                    </div>
                                  </div>

                                    <hr style="height:2px;border:none;color:#333;background-color:#333;">

                                  <!-- เริ่มส่วนที่ 2 -->


                                
                                <!-- จบส่วนที่ 2 -->
                                </div>
                                                
                          </div>
                        </div>
                    
                
                      <?php }} ?>
                      </div>

                    
                      <div class="row clearfix">
                        <div class="col-md-5">
                          <a  style="color:white;" id="clone" class="btn btn-primary btn-cons clone"><i class="fa fa-plus"></i> เพิ่มผลงานออกแบบ</a>
                        </div>
                      </div>

                 
                
                </div>
                <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab4">
                  <div class="row row-same-height">
                      <div class="col-md-5 b-r b-dashed b-grey ">
                        <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                          <h2>การจัดแสดงผลงานออกแบบ</h2>
                          <p>รายละเอียดการจัดแสดงผลงานออกแบบ</p>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="padding-30 sm-padding-5">
                      
                          
                              <!-- <p>1. เป้าหมายหลักของการจัดแสดงผลงาน</p>
                              <div class="row clearfix">
                                <div class="col-sm">

                                  <div class="checkbox check-success">
                                    <input type="checkbox"  value="1" name="target_type" id="check1">
                                    <label for="check1">ต้องการพบคู่ค้าทางธุรกิจและรับออเดอร์</label>
                                  </div>
                                  <div class="checkbox check-success">
                                    <input type="checkbox"  value="2" name="target_type" id="check2">
                                    <label for="check2">ต้องการนำเสนอผลงานการออกแบบใหม่ และจับคู่ทางธุรกิจ</label>
                                  </div>
                                  <div class="checkbox check-success">
                                    <input type="checkbox"  value="3" name="target_type" id="check3">
                                    <label for="check3">ต้องการจำหน่ายสินค้า</label>
                                  </div>


                                </div>

                              </div> -->

                              <p>1. ลักษณะพื้นที่ในการจัดแสดง</p>
                              <div class="form-group-attached">
                                <div class="row clearfix">
                                  <div class="col-sm">

                                    <div class="checkbox check-success">
                                      <input <?php echo (@$regis['showarea_type'] == 1)? 'checked':'' ?> type="checkbox"  value="1" name="showarea_type" id="check7">
                                      <label for="check7">ภายในอาคาร</label>
                                    </div>
                                    <div class="checkbox check-success">
                                      <input <?php echo (@$regis['showarea_type'] == 2)? 'checked':'' ?> type="checkbox"  value="2" name="showarea_type" id="check8">
                                      <label for="check8">ภายนอกอาคาร</label>
                                    </div>
                      

                                  </div>

                                </div>
                              </div>

                              <br>
                              <p>2. ขนาดพื้นที่ใช้จัดแสดง</p>
                              <div class="form-group-attached">
                                <div class="row clearfix">


                                  <div class="col-sm">

                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['area_type'] == 1)? 'checked':'' ?> type="checkbox"  value="1" name="area_type" id="check4">
                                    <label for="check4">2 x 1.5 เมตร</label>
                                  </div>
                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['area_type'] == 2)? 'checked':'' ?> type="checkbox"  value="2" name="area_type" id="check5">
                                    <label for="check5">2 x 3 เมตร</label>
                                  </div>
                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['area_type'] == 3)? 'checked':'' ?> type="checkbox"  value="3" name="area_type" id="check6">
                                    <label for="check6">2 x 6 เมตร</label>
                                  </div>



                                </div>
                              </div>

                          

                              <br>
                              <p>3. ลักษณะในการจัดแสดง</p>

                              <div class="form-group-attached">
                                <div class="row clearfix">


                                  <div class="col-sm">

                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['show_type'] == 1)? 'checked':'' ?> type="checkbox"  value="1" name="show_type" id="check9">
                                    <label for="check9">จัดวางผลงานพร้อมคำอธิบาย</label>
                                  </div>
                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['show_type'] == 2)? 'checked':'' ?> type="checkbox"  value="2" name="show_type" id="check11">
                                    <label for="check11">จัดวางผลงานพร้อมสื่อประกอบ แสงสีเสียง กลิ่น ภาพ วีดีโอ</label>
                                  </div>
            
                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['show_type'] == 3)? 'checked':'' ?> type="checkbox"  value="3" name="show_type" id="check13">
                                    <label for="check13">จัดแสดงพร้อมการสาธิต</label>
                                  </div>
                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['show_type'] == 4)? 'checked':'' ?> type="checkbox"  value="4" name="show_type" id="check14">
                                    <label for="check14">จัดแสดงพร้อมจัดกิจกรรม</label>
                                  </div>



                                </div>

                              </div>

                              <p>4. แผนผัง แบบการจัดแสดงและคำอธิบาย *หากมี</p>

                              <div class="form-group-attached">
                                <div class="row clearfix">


                                  <div class="col-sm">
                                    <input type="file">
                                  </div>

                                </div>

                              </div>
              



                        </div>
                      </div>


                    </div>
                    </div>

                    </div>
                </div>


                 <div class="tab-pane slide-left padding-20 sm-no-padding radio radio-success" id="tab5">
                    <p>แบบประเมินผล สำหรับผู้สมัครจัดกิจกรรม CMDW</p>
                    <table class="table table-borderless" border="0">
                        <tr>
                            <th>คำถาม</th>
                            
                            <th>&nbsp;</th>
                            <th>คะแนน</th>
                            <th>&nbsp;</th>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                           
                            <th>น้อย</th>
                            <th>&nbsp;</th>
                            <th>มาก</th>
                        </tr>
                        <tr>
                            <td>1.	ผู้จัดการกิจกรรมให้ข้อมูลและอำนวยความสะดวก</td>

                            <td>  
                                <input <?= (@$quiz->answer_1 == 1)? 'checked':'';?> type="radio" value="1" name="radio1" id="1_1">
                                <label for="1_1">1</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_1 == 2)? 'checked':'';?> type="radio" value="2" name="radio1" id="1_2">
                                <label for="1_2">2</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_1 == 3)? 'checked':'';?> type="radio" value="3" name="radio1" id="1_3">
                                <label for="1_3">3</label>
                            </td>
                        </tr>
                        <tr>
                            <td>2.	ขั้นตอนการเข้าร่วมกิจกรรมสะดวกและเข้าใจง่าย</td>
                            <td>  
                                <input <?= (@$quiz->answer_2 == 1)? 'checked':'';?> type="radio" value="1" name="radio2" id="2_1">
                                <label for="2_1">1</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_2 == 2)? 'checked':'';?> type="radio" value="2" name="radio2" id="2_2">
                                <label for="2_2">2</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_2 == 3)? 'checked':'';?> type="radio" value="3" name="radio2" id="2_3">
                                <label for="2_3">3</label>
                            </td>
                        </tr>
                        <tr>
                            <td>3.	สถานที่จัดมีความเหมาะสมกับกิจกรรม</td>
                            <td>  
                                <input <?= (@$quiz->answer_3 == 1)? 'checked':'';?> type="radio" value="1" name="radio3" id="3_1">
                                <label for="3_1">1</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_3 == 2)? 'checked':'';?> type="radio" value="2" name="radio3" id="3_2">
                                <label for="3_2">2</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_3 == 3)? 'checked':'';?> type="radio" value="3" name="radio3" id="3_3">
                                <label for="3_3">3</label>
                            </td>
                        </tr>
                        <tr>
                            <td>4.	การออกแบบผังพื้นที่และบรรยากาศได้น่าสนใจ</td>
                            <td>  
                                <input <?= (@$quiz->answer_4 == 1)? 'checked':'';?> type="radio" value="1" name="radio4" id="4_1">
                                <label for="4_1">1</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_4 == 2)? 'checked':'';?> type="radio" value="2" name="radio4" id="4_2">
                                <label for="4_2">2</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_4 == 3)? 'checked':'';?> type="radio" value="3" name="radio4" id="4_3">
                                <label for="4_3">3</label>
                            </td>
                        </tr>
                        <tr>
                            <td>5.	ระยะเวลาการจัดมีความเหมาะสมกับกิจกรรม</td>
                            <td>  
                                <input <?= (@$quiz->answer_5 == 1)? 'checked':'';?> type="radio" value="1" name="radio5" id="5_1">
                                <label for="5_1">1</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_5 == 2)? 'checked':'';?> type="radio" value="2" name="radio5" id="5_2">
                                <label for="5_2">2</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_5 == 3)? 'checked':'';?> type="radio" value="3" name="radio5" id="5_3">
                                <label for="5_3">3</label>
                            </td>
                        </tr>
                        <tr>
                            <td>6.	สูจิบัตรและสื่อสิ่งพิมพ์แสดงข้อมูลได้ครบถ้วน</td>
                            <td>  
                                <input <?= (@$quiz->answer_6 == 1)? 'checked':'';?> type="radio" value="1" name="radio6" id="6_1">
                                <label for="6_1">1</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_6 == 2)? 'checked':'';?> type="radio" value="2" name="radio6" id="6_2">
                                <label for="6_2">2</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_6 == 3)? 'checked':'';?> type="radio" value="3" name="radio6" id="6_3">
                                <label for="6_3">3</label>
                            </td>
                        </tr>
                        <tr>
                            <td>7.	การประชาสัมพันธ์กิจกรรมไปสู่กลุ่มเป้าหมายได้ทั่วถึง</td>
                            <td>  
                                <input <?= (@$quiz->answer_7 == 1)? 'checked':'';?> type="radio" value="1" name="radio7" id="7_1">
                                <label for="7_1">1</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_7 == 2)? 'checked':'';?> type="radio" value="2" name="radio7" id="7_2">
                                <label for="7_2">2</label>
                            </td>
                            <td> 
                                <input <?= (@$quiz->answer_7 == 3)? 'checked':'';?> type="radio" value="3" name="radio7" id="7_3">
                                <label for="7_3">3</label>
                            </td>
                        </tr>
                        </table>
                 </div>
                        

        
  <div class="modal fade" id="showcase_popup" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body " >
        <p>"หากท่านผ่านการคัดเลือกจะสามารถลงทะเบียน<br/>ในขั้นตอนที่ 4 และ 5 ได้"</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default"  data-dismiss="modal">ยืนยัน</button>
        </div>
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
      <li class="previous" id="hide_back" style="display:none;">
        <button class="btn btn-default btn-cons pull-right" type="button">
          <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
        </button>
      </li>
      <li class="previous_tmp" id ="previous_hide" style="display:none;">
        <a  href="<?php echo base_url('member');?>"  class="btn btn-white btn-cons pull-right" type="button">
          <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
        </a>
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

