
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
           <input type="hidden" id="project_type" name="project_type" value="<?php echo $project[0]->project_type;?>" />
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
                  <a class="" data-toggle="tab" href="#tab3" role="tab"><i class="fa fa-credit-card tab-icon"></i> <span>แบบฟอร์มลงทะเบียน</span></a>
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

                          <h5>แบบฟอร์มลงทะเบียนร่วมออกร้านในงาน Pop Market</h5>
                          <div class="row">
                            <div class="card-block">
                              <div class="scrollable">
                                <div class="">
                                  <p>หากคุณเป็นเจ้าของกิจการร้านค้าผลิตภัณฑ์ งานออกแบบสร้างสรรค์ รวมไปถึงร้านอาหาร เครื่องดื่ม เบเกอรี่หรือของหวาน
                                  เทศกาลงานออกแบบเชียงใหม่ เชิญร่วมออกร้านใน Pop Market ซึ่งจะจัดขึ้นในวันที่ 6 - 10 ธันวาคม 2560 ณ ลานยุ้งข้าวตรง
                                  ข้ามวัดเชียงมั่น  
                                  </p>
                                  <p> ภายในงานเป็นงานรวบรวมสินค้างานไอเดียและความคิดสร้างสรรค์ คัดสรรจากบรรดานักออกแบบและผู้ประกอบการในเชียงใหม่
                                      ทางทีมงานจัดเตรียมพื้นที่ขายของขนาด 2.5 x 2.5 เมตร / ร้าน โดยจะมีค่าใช้จ่ายในการร่วมออกแบบ ค่ามัดจำ 3000 บาท (จะได้คืนในวันจบงาน)
                                      โดยจะแจ้งรายละเอียดในการชำระเงินในภายหลัง
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
                              <!-- <p>เกี่ยวกับงาน</p> -->
                              <div class="form-group-attached">
                                <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <div class="form-group form-group-default  form-group-default-selectFx ">
                                      <label>สถานะ</label>
                                      <select style="width:100%" name="job" id="job" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                      
                                        <option  <?php echo (@$member->job == '') ? 'selected':'';?> value="" >เลือก</option>
                                        <option  <?php echo (@$member->job == 1) ? 'selected':'';?> value="1">บริษัท</option>
                                        <option  <?php echo (@$member->job == 2) ? 'selected':'';?> value="2">ผู้ประกอบการธุรกิจ</option>
                                        <option  <?php echo (@$member->job == 3) ? 'selected':'';?> value="3">สตูดิโอออกแบบ</option>
                                        <option  <?php echo (@$member->job == 4) ? 'selected':'';?> value="4">ช่างฝีมือ/เมคเกอร์</option>
                                        <option  <?php echo (@$member->job == 5) ? 'selected':'';?> value="5">วิสาหกิจชุมชน</option>
                                        <option  <?php echo (@$member->job == 6) ? 'selected':'';?> value="6">นักออกแบบ/ศิลปิน/สถาปนิก</option>
                                        <option  <?php echo (@$member->job == 7) ? 'selected':'';?> value="7">นักเรียนนักศึกษา</option>
                                        <option  <?php echo (@$member->job == 8) ? 'selected':'';?> value="8">องค์กร/สถาบัน</option>
                                        <option  <?php echo (@$member->job == 9) ? 'selected':'';?> value="9">สถาบันการศึกษา</option>
                                        <option  <?php echo (@$member->job == 10) ? 'selected':'';?> value="10">อาชีพอิสระ</option>
                                        <option  <?php echo (@$member->job == 11) ? 'selected':'';?> value="11">อื่นๆ (โปรดระบุ)</option>

                                      </select>
                                    </div>
                                  </div>
                                </div>


                                
                                  <div class="row clearfix" id="job_detail" <?php echo (@$member->job_detail && @$member->job == 11) ?  "" : "style='display:none;'" ?>>
                                  <div class="col-sm-12">
                                    <div class="form-group form-group-default ">
                                      <input type="text" name="job_detail" placeholder="ระบุอาชีพของคุณ" class="form-control" value="<?php echo @$member->job_detail; ?>">
                                    </div>
                                  </div>
                                  
                                </div>

                                <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <div class="form-group form-group-default  form-group-default-selectFx">
                                      <label>สาขาอุตสาหกรรมสร้างสรรค์</label>
                                      <select style="width:100%" name="job_type" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                      
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
                                        <option  <?php echo (@$member->job_type == 12) ? 'selected':'';?> value="11">แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                
                                <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <div class="form-group form-group-default  form-group-default-selectFx">
                                      <label>ประสบการณ์</label>
                                      <select style="width:100%" name="company_service" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                      
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

                              <br>

                              <div class="form-group-attached" >
                              <p>เกี่ยวกับองค์กร/บริษัท/หน่วยงาน</p>
                              
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
                                      <div class="form-group form-group-default required">
                                        <label>เฟสบุ๊ค แฟนเพจ</label>
                                        <input type="text" class="form-control" name="facebook" value="<?php echo @$member->facebook; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                <div class="row clearfix">
                                  <div class="col-sm-12">
                                    <div class="form-group form-group-default ">
                                      <label>ชื่อบริษัท/องค์กร</label>
                                      <input type="text" name="company_name" id="company_name " class="form-control" value="<?php echo @$member->company_name;?>" >
                                    </div>
                                  </div>
                                </div>
                              
                                <div class="row clearfix">
                                  <div class="col-sm-3">
                                    <div class="form-group form-group-default ">
                                      <label>เลขที่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                      <input type="text" name="company_address" class="form-control" placeholder="ระบุบ้านเลขที่" value="<?php echo @$member->company_address; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group form-group-default ">
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
                                    <div class="form-group form-group-default ">
                                      <label>ตำบล/แขวง</label>
                                      <input type="text" name="company_subdistrict" id="company_subdistrict" class="form-control" placeholder="ระบุแขวงหรือตำบลของคุณ" value="<?php echo @$member->company_subdistrict;?>" >
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group form-group-default ">
                                      <label>เขต/อำเภอ</label>
                                      <input type="text" name="company_district" id="company_district" class="form-control" value="<?php echo @$member->company_district;?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row clearfix">
                                  <div class="col-sm-4">
                                    <div class="form-group form-group-default  form-group-default-selectFx "><!--form-group-default-selectFx-->
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
                                      <div class="form-group form-group-default  form-group-default-selectFx">
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
                                    <div class="form-group form-group-default ">
                                      <label>รหัสไปรษณีย์</label>
                                      <input type="text" name="company_zipcode" id="company_zipcode" class="form-control" value="<?php echo (@$member->company_zipcode != 0) ? @$member->company_zipcode:'';?>">
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
                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default required">
                                <label>ชื่อร้าน</label>
                                <input name="pop_shop_name" type="text" placeholder="ระบุชื่อร้านค้า" class="form-control"  value="<?php echo @$regis['pop_shop_name'];?>" >
                              </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <p>เกี่ยวกับแบรนด์(เล่าถึงที่มาของร้านและประเภทสินค้าที่ขาย)</p>
                            <div class="wysiwyg5-wrapper b-a b-grey">
                              <textarea  name="pop_story" id="wysiwyg5" class="wysiwyg demo-form-wysiwyg"  placeholder="โปรดระบุบแนวความคิด ..." ui-jq="wysihtml5" ui-options="{
                              html: true,
                              stylesheets: ['pages/css/editor.css']
                              }"><?php echo @$regis['pop_story'];?></textarea>
                            </div>
                          </div>
                        </div>
                        <br>
                        <h5>ประเภทของที่ขาย</h5>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group-default required">
                        
                                <div class="checkbox check-success">
                                  <input <?php echo (!empty(@$regis['pop_product_type']))? 'checked':''?> type="checkbox"  value="1" name="pop_select" id="pop_select1">
                                  <label for="pop_select1">Product</label>
                                </div>
                                <div class="checkbox check-success">
                                  <input <?php echo (!empty(@$regis['pop_food_type']))? 'checked':''?> type="checkbox"  value="2" name="pop_select" id="pop_select2">
                                  <label for="pop_select2">Food & Beverage</label>
                                </div>
                            
                              </div>
                            </div>
                        </div>
                        <br>
                        <div id="product" style="display:none;">
                          <h5>Product</h5>
                          <p >ประเภทของที่ขาย</p>
                          <div class="row clearfix">
                              <div class="col-sm-12">
                              <div class="form-group-default ">
                                <input type="hidden" name="pop_product_type" id="pop_product_type">
                                <div class="checkbox check-success">
                                  <input <?php echo (@$regis['pop_product_type'] == '1')? 'checked':''?> type="checkbox"  value="1" name="pop_type" id="pop_type1">
                                  <label for="pop_type1">Lifstyle</label>
                                </div>
                                <div class="checkbox check-success">
                                  <input <?php echo (@$regis['pop_product_type'] == '2')? 'checked':''?> type="checkbox"  value="2" name="pop_type" id="pop_type2">
                                  <label for="pop_type2">Furniture</label>
                                </div>
                                <div class="checkbox check-success">
                                  <input <?php echo (@$regis['pop_product_type'] == '3')? 'checked':''?>  type="checkbox"  value="3" name="pop_type" id="pop_type3">
                                  <label for="pop_type3">Textile / Fashion</label>
                                </div>
                                <div class="checkbox check-success">
                                  <input <?php echo (@$regis['pop_product_type'] == '4')? 'checked':''?> type="checkbox"  value="4" name="pop_type" id="pop_type4">
                                  <label for="pop_type4">Accessories</label>
                                </div>
                                <div class="checkbox check-success">
                                  <input <?php echo (@$regis['pop_product_type'] == '5')? 'checked':''?> type="checkbox"  value="5" name="pop_type" id="pop_type5">
                                  <label for="pop_type5">Home Decor</label>
                                </div>
                              </div>
                              </div>
                          </div>
                        </div>
                        
                          <br>
                        <div id="food" style="display:none;">
                          <h5>Food & Beverage</h5>
                          <p>ประเภทของที่ขาย</p>
                          <div class="row clearfix">
                              <div class="col-sm-12">
                              <input type="hidden" name="pop_food_type" id="pop_food_type">
                              <div class="form-group-default ">
                                <div class="checkbox check-success">
                                  <input <?php echo (@$regis['pop_food_type'] == '1')? 'checked':''?> type="checkbox"  value="1" name="pop_food" id="pop_food1">
                                  <label for="pop_food1">อาหาร</label>
                                </div>
                                <div class="checkbox check-success">
                                  <input <?php echo (@$regis['pop_food_type'] == '2')? 'checked':''?> type="checkbox"  value="2" name="pop_food" id="pop_food2">
                                  <label for="pop_food2">เครื่องดื่ม</label>
                                </div>
                                <div class="checkbox check-success">
                                  <input <?php echo (@$regis['pop_food_type'] == '3')? 'checked':''?> type="checkbox"  value="3" name="pop_food" id="pop_food3">
                                  <label for="pop_food3">เบเกอรี่ / ของหวาน</label>
                                </div>

                              </div>
                              </div>
                          </div>
                        </div>
                         <br>
                        <h5 >แนบรูปสินค้า<span style="color:red">*</span></h5>

                        <div class="col-sm-12">
                            <div class="row clearfix">
                              <div class="col-sm-12">
                                <div class="form-group required ">
                                  <label>ภาพรวมของผลงาน</label>
                                  <div class="row">
                                  <?php
                                        if (!empty($regis['pop_img'])){
                                          
                                          $pop_img = explode(',',$regis['pop_img']);
                                      
                                          foreach ($pop_img as $key => $val) {
                                            echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                            echo '&nbsp;';
                                          }
                                        }
                                      
                                    ?>
                                  </div>
                                 
                                  <div class="fallback">
                                    <input id="product_img" name="pop_img[]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                  </div>
                                </div>
                              </div>
                            
                            </div>

                            <div class="row clearfix">
                              <div class="col-sm-12">
                                <div class="form-group ">
                                  <label>ภาพ Close Up</label>
                                  <div class="row">
                                  <?php
                                      if (!empty($regis['pop_closeup'])){
                                        
                                        $pop_closeup = explode(',',$regis['pop_closeup']);
                                    
                                        foreach ($pop_closeup as $key => $val) {
                                          echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                          echo '&nbsp;';
                                        }
                                      }
                                    
                                  ?>
                                  </div>
                                  <div class="fallback">
                                    <input id="product_closeup" name="pop_closeup[]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                  </div>
                                </div>
                              </div>
                            
                            </div>

                            <div class="row clearfix">
                              <div class="col-sm-12">
                                <div class="form-group ">
                                  <label>ภาพ Pack Shot</label>
                                  <div class="row">
                                  <?php
                                      if (!empty($regis['pop_packshot'])){
                                        
                                        $pop_packshot = explode(',',$regis['pop_packshot']);
                                    
                                        foreach ($pop_packshot as $key => $val) {
                                          echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                          echo '&nbsp;';
                                        }
                                      }
                                    
                                  ?>
                                  </div>
                                  <div class="fallback">
                                    <input id="product_packshot" name="pop_packshot[]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                  </div>
                                  
                                </div>
                              </div>
                            
                            </div>
                        
                        </div>

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