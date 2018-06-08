<div class="loader-wrap" id="loading" style="display:none;" >
  <div class="loader"><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span></div>
</div>
<!-- START PAGE CONTENT -->
<div class="content ">
        <div class=" container-fluid   container-fixed-lg">
          <!-- START CONTAINER FLUID -->

          <?php $attributes = array('name' => 'frmCreatevent', 'id' => 'form-event-profile');
                              $lang = $this->uri->segment(1);
                              $id = $this->uri->segment(4);
                              echo form_open_multipart($lang.'/member/saveEventForm', $attributes); 
              ?>
           <input type="hidden"  name="project_id" value="<?php echo $project[0]->project_id;?>" />
           <input type="hidden" id="project_type"  name="project_type" value="<?php echo $project[0]->project_type;?>" />
           <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />
          <div class=" container-fluid   container-fixed-lg">
            <div id="rootwizard" class="m-t-50">

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
                  <a class="active" data-toggle="tab" href="#tab1" role="tab"><i class="pg-outdent tab-icon"></i> <span>ข้อตกลง</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab2" role="tab"><i class="fa fa-hospital-o tab-icon"></i> <span>ข้อมูลผู้สมัคร</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab3" role="tab"><i class="fa fa-credit-card tab-icon"></i> <span>ข้อมูลกิจกรรม</span></a>
                </li>
                <!-- <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab4" role="tab"><i class="fa fa-clipboard tab-icon"></i> <span>วิธีการจัดแสดง</span></a>
                </li> -->
                <!-- <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab5" role="tab"><i class="fa fa-check tab-icon"></i> <span>เสร็จสิ้น</span></a>
                </li> -->
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

                      <div class="col-md-12">
                        <div class="padding-30 sm-padding-5">

                          <h5>ข้อกำหนดและเงื่อนไขในการจัดกิจกรรม</h5>
                          <div class="row">
                            <div class="card-block">
                              <div class="scrollable">
                                <div class="">
                                    <p>1. กิจกรรมที่ส่งเข้าร่วมจัดงาน ต้องไม่เป็นการคัดลอกหรือทำซ้ำกับกิจกรรมของบุคคลอื่น และหากมีกรณีที่บุคคล
                                      ภายนอกกล่าวอ้างหรือใช้สิทธิเรียกร้องใดๆ ว่ามีการละเมิดลิขสิทธิ์ สิทธิหรือทรัพย์สินทางปัญญาอื่นใดเกี่ยวกับกิจกรรม
                                      ที่เข้าร่วมงาน ผู้จัดกิจกรรมต้องรับผิดชดใช้ค่าเสียหายต่อบุคคลภายนอก เนื่องจากผลแห่งการละเมิดลิขสิทธิ์ หรือสิทธิอื่นใด
                                      ดังกล่าวเองทั้งสิ้น
                                    </p>
                                    <p>2. ผู้จัดกิจกรรมต้องศึกษารายละเอียดหลักเกณฑ์การเข้าร่วมกิจกรรม และต้องดำเนินการตามหลักเกณฑ์การเข้าร่วมกิจกรรมทุกประการ
                                      และยอมรับข้อสงวนสิทธิ์ของ TCDC ในการยกเลิก แก้ไข ปรับเปลี่ยนหรือเปลี่ยนแปลงข้อกำหนดและเงื่อนไขต่างๆ ของโครงการฯ นี้
                                      ที่ TCDC เห็นว่าจำเป็นโดยไม่ต้องแจ้งให้ทราบล่วงหน้า ทั้งนี้การตัดสินของ TCDC ถือเป็นที่สุด
                                    </p>
                                    <p>3. ข้อมูลต่างๆ และเอกสารประกอบการสมัครเป็นข้อมูลที่ถูกต้องและเป็นจริงทุกประการ หากปรากฏภายหลักว่าข้อมูลต่างๆ และเอกสารประกอบการสมัครต่างๆ ไม่ถูกต้องและไม่เป็นจริงเมื่อใด ให้ถือว่าผู้จัดกิจกรรมขาดคุณสมบัติทันที และหากว่าในกรณีการให้ข้อมูลที่ไม่ถูกต้องหรือไม่เป็นจริงของผู้แสดงผลงานก่อให้เกิดความเสียหายแก่โครงการฯ ผู้จัดกิจกรรมยิมยอมที่จะรับผิดชอบโดยไม่มีมเงื่อนไข
                                    </p>
                                    

                                </div>
                              </div>
                              <br>
                            </div>
                            <div class="checkbox check-success  ">

                             <input type="checkbox" value="1" id="checkbox2" <?php echo (!empty($regis['reg_id'])) ? 'checked':'' ?> >
                             <label for="checkbox2">ฉันเข้าใจและยอมรับในเงื่อนไข และ ข้อตกลง </label>
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

                            <p>ข้อมูลบุคคล</p>
                            <div class="form-group-attached">
                              <div class="row clearfix">
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default required form-group-default-selectFx">
                                    <label>คำนำหน้า</label>
                                    <select  id="prename" name="prename" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
      
                                      <option  <?php echo (@$member->prename == '') ? 'selected':'';?> value="" >เลือก</option>
                                      <option  <?php echo (@$member->prename == 1) ? 'selected':'';?> value="1">นาย</option>
                                      <option  <?php echo (@$member->prename == 2) ? 'selected':'';?> value="2">นาง</option>
                                      <option  <?php echo (@$member->prename == 3) ? 'selected':'';?> value="3">นางสาว</option>
                                      <option  <?php echo (@$member->prename == 4) ? 'selected':'';?> value="4">ไม่ระบุ</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-5">
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

                            <p>ที่อยู่</p>
                            <div class="form-group-attached">
                              
                              <div class="row clearfix">
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default required">
                                    <label>บ้านเลขที่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                    <input type="text" name="address" class="form-control" placeholder="ระบุบ้านเลขที่" value="<?php echo @$member->address; ?>">
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default required">
                                    <label>หมู่</label><span class="text-danger"><?php echo form_error('village'); ?></span>
                                    <input type="text" name="village" class="form-control" placeholder="ระบุหมู่" value="<?php echo @$member->village; ?>">
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default ">
                                    <label>ซอย</label><span class="text-danger"><?php echo form_error('lane'); ?></span>
                                    <input type="text" name="lane" class="form-control" placeholder="ระบุซอย" value="<?php echo @$member->lane; ?>">
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group form-group-default ">
                                    <label>ถนน</label><span class="text-danger"><?php echo form_error('Road'); ?></span>
                                    <input type="text" name="road" class="form-control" placeholder="ระบุถนน" value="<?php echo @$member->road; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row clearfix">
                              <div class="col-sm-6">
                                  <div class="form-group form-group-default required">
                                    <label>ตำบล/แขวง</label>
                                    <input type="text" class="form-control" placeholder="ระบุแขวงหรือตำบลของคุณ" name="subdistrict" value="<?php echo $member->subdistrict;?>" >
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
                                  <div class="col-sm-4">
                                    <div class="form-group form-group-default required">
                                      <label>อีเมล</label>
                                      <input type="text" class="form-control" name="email"  value="<?php echo $member->email;?>">
                                    </div>
                                  </div>

                                  <div class="col-sm-4">
                                    <div class="form-group form-group-default required">
                                      <label>เบอร์โทรศัพท์</label>
                                      <input name="phone" type="text" id="phone" class="form-control" value="<?php echo (@$member->phone != 0)? @$member->phone : '';?>">
                                    </div>
                                  </div>
                                  
                                  <div class="col-sm-4">
                                      <div class="form-group form-group-default">
                                        <label>ไลน์ไอดี</label>
                                        <input type="text" class="form-control" name="lineid" value="<?php echo @$member->lineid; ?>">
                                      </div>
                                    </div>

                                </div>
                              </div>


                              <br>

                              <!--  status group -->
                              <div id="commany">
                            
                                <p>เกี่ยวกับงาน</p>
                                  <div class="row clearfix">
                                    <div class="col-sm-12">
                                      <div class="form-group form-group-default  form-group-default-selectFx  required">
                                        <label>สถานะ</label>
                                        <select style="width:100%" name="job" id="job" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
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
                                  
                                  <!-- status group -->
                                  <div id="group_one" style="display:none;">
                                    
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <label>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด</label>
                                          <select style="width:100%" name="job_type_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                          
                                            <option  <?php echo (@$member->job_type == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->job_type == 1) ? 'selected':'';?> value="1">งานฝีมือและหัตถกรรม</option>
                                            <option  <?php echo (@$member->job_type == 2) ? 'selected':'';?> value="2">ศิลปะการแสดง</option>
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
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <label>ประสบการณ์</label>
                                          <select style="width:100%" name="company_service_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                          
                                            <option  <?php echo (@$member->company_service == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_service == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบ</option>
                                            <option  <?php echo (@$member->company_service == 2) ? 'selected':'';?> value="2">0 - 3 ปี</option>
                                            <option  <?php echo (@$member->company_service == 3) ? 'selected':'';?> value="3">3 - 10 ปี</option>
                                            <option  <?php echo (@$member->company_service == 4) ? 'selected':'';?> value="4">มากกว่า 10 ปี</option>

                              
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <label>ลูกค้าของคุณคือกลุ่มใด</label>
                                          <select style="width:100%" name="company_custom_group" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                            <option  <?php echo (@$member->company_custom_group == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_custom_group == 1) ? 'selected':'';?> value="1">ลูกค้าในประเทศ</option>
                                            <option  <?php echo (@$member->company_custom_group == 2) ? 'selected':'';?> value="2">ลูกค้าต่างประเทศ </option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <label>ลักษณะการทำงานของธุรกิจ </label>
                                          <select style="width:100%" name="company_business_look_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
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
                                        <div class="form-group form-group-default  ">
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
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <label>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด </label>
                                          <select style="width:100%" name="job_type_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                          
                                            <option  <?php echo (@$member->job_type == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->job_type == 1) ? 'selected':'';?> value="1">งานฝีมือและหัตถกรรม</option>
                                            <option  <?php echo (@$member->job_type == 2) ? 'selected':'';?> value="2">ศิลปะการแสดง</option>
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
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <label>ประสบการณ์</label>
                                          <select style="width:100%" name="company_service_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                          
                                            <option  <?php echo (@$member->company_service == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_service == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบ</option>
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
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <label>ลักษณะการทำงาน</label>
                                            <select style="width:100%" name="company_work_look" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                              <option  <?php echo (@$member->company_work_look == '') ? 'selected':'';?> value="" >เลือก</option>
                                              <option  <?php echo (@$member->company_work_look == 1) ? 'selected':'';?> value="1">รับจ้างออกแบบอิสระ</option>
                                              <option  <?php echo (@$member->company_work_look == 2) ? 'selected':'';?> value="2">ทำงานออกแบบอยู่ในบริษัทหรือแบรนด์</option>
                                              <option  <?php echo (@$member->company_work_look == 3) ? 'selected':'';?> value="3">ออกแบบ ผลิตและจำหน่ายเอง</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <label>ลักษณะการทำงานของธุรกิจ </label>
                                            <select style="width:100%" name="company_business_look_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                              <option  <?php echo (@$member->company_business_look == '') ? 'selected':'';?> value="" >เลือก</option>
                                              <option  <?php echo (@$member->company_business_look == 1) ? 'selected':'';?> value="1">รับจ้างผลิต </option>
                                              <option  <?php echo (@$member->company_business_look == 2) ? 'selected':'';?> value="2">รับจัดจำหน่าย</option>
                                              <option  <?php echo (@$member->company_business_look == 3) ? 'selected':'';?> value="3">ผลิตและจัดจำหน่ายภายใต้แบรนด์ตนเอง </option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-selectFx ">
                                          <label>ช่องทางการจำหน่าย</label>
                                          <select style="width:100%" name="company_sell_way" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                            <option  <?php echo (@$member->company_sell_way == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_sell_way == 1) ? 'selected':'';?> value="1">ออนไลน์ </option>
                                            <option  <?php echo (@$member->company_sell_way == 2) ? 'selected':'';?> value="2">ออฟไลน์</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-selectFx ">
                                          <label>ผลงานสามารถผลิตในจำนวนมากได้หรือไม่  </label>
                                          <select style="width:100%" name="company_product_build" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
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
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <label>ผลงานของคุณอยู่ในกลุ่มใด</label>
                                            <select style="width:100%" id="company_group_product" name="company_group_product" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                              <option  <?php echo (@$member->company_group_product == 1) ? 'selected':'';?> value="1">งานไม้</option>
                                              <option  <?php echo (@$member->company_group_product == 2) ? 'selected':'';?> value="2">งานทอผ้า/ย้อม</option>
                                              <option  <?php echo (@$member->company_group_product == 3) ? 'selected':'';?> value="3">งานปั้น</option>
                                              <option  <?php echo (@$member->company_group_product == 4) ? 'selected':'';?> value="4">งานจักรสาน</option>
                                              <option  <?php echo (@$member->company_group_product == 5) ? 'selected':'';?> value="5">งานเพ้นท์</option>
                                              <option  <?php echo (@$member->company_group_product == 6) ? 'selected':'';?> value="6">งานเครื่องเงิน</option>
                                              <option  <?php echo (@$member->company_group_product == 7) ? 'selected':'';?> value="7">อื่นๆ โปรดระบุ</option>
                                          
                                            </select>
                                            
                                          </div>
                                          <div class="row" id="company_group_product_detail" style="display:none;">
                                              <div class="form-group form-group-default ">
                                                <input type="text" name="company_group_product_detail" class="form-control" placeholder="ระบุ" value="<?php echo @$member->company_group_product_detail; ?>">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <label>ประสบการณ์</label>
                                            <select style="width:100%" name="company_service_three" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                            
                                              <option  <?php echo (@$member->company_service == '') ? 'selected':'';?> value="" >เลือก</option>
                                              <option  <?php echo (@$member->company_service == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบ</option>
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
                                        <div class="form-group ">
                                          <label>โปรดระบุเทคนิคหรือความเชี่ยวชาญที่ใช้ทำงาน </label>
                                          <input type="text" name="company_technic[]" class="form-control" placeholder="1." value="<?php echo '';  ?>">
                                          <input type="text" name="company_technic[]" class="form-control" placeholder="2." value="<?php echo '';  ?>">
                                          <input type="text" name="company_technic[]" class="form-control" placeholder="3." value="<?php echo '';  ?>">
                                        </div>
                                      </div>

                                    </div>
                                    <div class="row" >
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <label> การผลิตสินค้าหรือผลงานของคุณเป็นรูปแบบใด</label>
                                          <select style="width:100%" name="company_product_detail" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                            <option  <?php echo (@$member->company_product_detail == '') ? 'selected':'';?> value="" >เลือก</option>
                                            <option  <?php echo (@$member->company_product_detail == 1) ? 'selected':'';?> value="1">แบบศิลปะวัฒนธรรมดั้งเดิม </option>
                                            <option  <?php echo (@$member->company_product_detail == 2) ? 'selected':'';?> value="2">แบบตามไอเดียที่คิดขึ้นใหม่</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row" >
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  ">
                                          <label>คุณสามารถผลิตได้จำนวน (ชิ้น/ต่อเดือน) </label>
                                          <input type="text" name="company_num_product" class="form-control" placeholder="" value="<?php echo @$member->company_num_product; ?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="group_four" style="display:none;">
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <label>คุณคือหน่วยงานประเภทใด</label>
                                            <select style="width:100%" name="company_department" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                            <option  <?php echo (@$member->company_department == '') ? 'selected':'';?> value="">เลือก</option>
                                              <option  <?php echo (@$member->company_department == 1) ? 'selected':'';?> value="1">สถานบันการศึกษา</option>
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
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <label>หน้าที่หลักขององค์กร</label>
                                            <select style="width:100%" name="company_duty" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                              <option  <?php echo (@$member->company_duty == '') ? 'selected':'';?> value="">เลือก</option>
                                              <option  <?php echo (@$member->company_duty == 1) ? 'selected':'';?> value="1">ส่งเสริมความคิดสร้างสรรค์ และการออกแบบ </option>
                                              <option  <?php echo (@$member->company_duty == 2) ? 'selected':'';?> value="2">ส่งเสริมศิลปะวัฒนธรรม </option>
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
                                        <div class="form-group">
                                          <label>คุณเคยร่วมงาน Design Week มาก่อนหรือไม่  </label><br>
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
                              <p>เกี่ยวกับองค์กร/บริษัท</p>
                              
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
                                      <label>เว็บไซต์</label>
                                      <input type="text" id="website" name="website" class="form-control" value="<?php echo @$member->website; ?>">
                                    </div>
                                  </div>
                                  
                                </div>

                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                    <div class="col-sm-12">
                                      <div class="form-group form-group-default">
                                        <label>เฟสบุ๊ค แฟนเพจ</label>
                                        <input type="text" class="form-control" name="facebook" value="<?php echo @$member->facebook; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <div class="form-group form-group-default required">
                                      <label>ชื่อบริษัท/องค์กร</label>
                                      <input type="text" name="company_name" id="company_name " class="form-control" value="<?php echo @$member->company_name;?>" >
                                    </div>
                                  </div>
                                </div>
                              
                                <div class="row clearfix">
                                  <div class="col-sm-3">
                                    <div class="form-group form-group-default required">
                                      <label>เลขที่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                      <input type="text" name="company_address" class="form-control" placeholder="ระบุบ้านเลขที่" value="<?php echo @$member->company_address; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group form-group-default required">
                                      <label>หมู่</label><span class="text-danger"><?php echo form_error('village'); ?></span>
                                      <input type="text" name="company_village" class="form-control" placeholder="ระบุหมู่" value="<?php echo @$member->company_village; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group form-group-default ">
                                      <label>ซอย</label><span class="text-danger"><?php echo form_error('lane'); ?></span>
                                      <input type="text" name="company_lane" class="form-control" placeholder="ระบุซอย" value="<?php echo @$member->company_lane; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group form-group-default ">
                                      <label>ถนน</label><span class="text-danger"><?php echo form_error('Road'); ?></span>
                                      <input type="text" name="company_road" class="form-control" placeholder="ระบุถนน" value="<?php echo @$member->company_road; ?>">
                                    </div>
                                  </div>
                                </div>

                                <div class="row clearfix">
     
                                  <div class="col-sm-6">
                                    <div class="form-group form-group-default required">
                                      <label>ตำบล/แขวง</label>
                                      <input type="text" name="company_subdistrict" id="company_subdistrict" class="form-control" placeholder="ระบุแขวงหรือตำบลของคุณ" value="<?php echo @$member->company_subdistrict;?>" >
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group form-group-default required">
                                      <label>เขต/อำเภอ</label>
                                      <input type="text" name="company_district" id="company_district" class="form-control" value="<?php echo @$member->company_district;?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row clearfix">
                                  <div class="col-sm-4">
                                    <div class="form-group form-group-default required form-group-default-selectFx "><!--form-group-default-selectFx-->
                                      <label>ประเทศ</label><span class="text-danger" style="text-align:center;"><?php echo form_error('company_country'); ?></span>
                                      <select style="width:100%" name="company_country" id="company_country" class=" form-control" data-init-plugin="select2"  >
                                        <option value="">เลือก</option>
                                        <?php foreach ($countries as $key => $value) { ?>
                                          <?php 
                                            $select = '';
                                            if (!empty(@$member->company_country)){
                                              if(@$member->company_country == $value->id ){
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
                                        <label for="company_province">จังหวัด</label>
                                        <select  style="width: 100% !important;"  name="company_province" id="company_province " class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2">
                                          <option value="" selected disable>เลือก</option>
                                          <?php 
                                            foreach ($province as $key => $value) { ?>
                                            <?php 
                                              $select = ''; 
                                              if(@$member->company_province == $value->code ){
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
                                      <input type="text" name="company_zipcode" id="company_zipcode" class="form-control" value="<?php echo @$member->company_zipcode;?>">
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
                              <h5>ผู้ประสานงาน</h5>
                              <br>
                              <div class="radio radio-default">
                                <input type="radio" value="0" name="radio2" id="radio2Yes" <?php echo $status1;?> >
                                <label for="radio2Yes">ฉันเป็นผู้ประสานงาน</label>
                                <input type="radio" value="1" name="radio2" id="radio2No" <?php echo $status2;?>>
                                <label for="radio2No">เพิ่มผู้ประสานงาน</label>
                              </div>
                              <br><br>

                              <!-- ข้อมูลผู้ประสานงาน เริ่ม -->
                              <div id="agent">
                                <p>ข้อมูลผู้ประสานงาน</p>
                             
                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                    <div class="col-sm-3">
                                      <div class="form-group form-group-default required form-group-default-selectFx">
                                        <label>คำนำหน้า</label>
                                        <select name="coordinator_prename" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
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

                                     <div class="col-sm-4">
                                        <div class="form-group form-group-default required">
                                          <label>อีเมล</label>
                                          <input type="text" id="phone" class="form-control" name="coordinator_email" value="<?php echo @$member->coordinator_email; ?>">
                                        </div>
                                      </div>

                                      <div class="col-sm-4">
                                        <div class="form-group form-group-default required">
                                          <label>เบอร์โทรศัพท์</label>
                                          <input type="text" id="phone" class="form-control" name="coordinator_phone" value="<?php echo @$member->coordinator_phone; ?>">
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group form-group-default required">
                                          <label>ไลนไอดี</label>
                                          <input type="text" class="form-control" name="coordinator_lineid" value="<?php echo @$member->coordinator_lineid; ?>">
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
                  <div class="row row-same-height">
                    <div class="col-md-12">
                      <div class="padding-30 sm-padding-5">
                        <p >ประเภทกิจกรรม <span style="color:red;">*</span></p>
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
                              <div class="form-group form-group-default ">
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
                        <p> โปรดส่งเอกสารประกอบการสมัครได้ที่ <input type="file" name="join_image[]" multiple="multiple" accept="image/jpeg,image/png" > </p>
                        <p> 1. ภาพ Key Visual สำหรับสื่อประชาสัมพันธ์บนเว็บไซต์ และ สูจิบัตร (สัดส่วน 5:7 และความละเอียด 300 dpi)</p>
                        <p> 2. ตารางเวลากิจกรรม และกำหนดการกิจกรรม</p>

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