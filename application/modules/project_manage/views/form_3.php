
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
            <div id="rootwizard_appv" >

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
                  <a class="active tab_btn" data-toggle="tab" href="#tab2" id="tabbtn_2" role="tab"><i class="fa fa-hospital-o tab-icon"></i> <span>ข้อมูลบุคคล/องค์กร</span></a>
                </li>
                <li class="nav-item">
                  <a class="tab_btn" data-toggle="tab" href="#tab3" id="tabbtn_3" role="tab"><i class="fa fa-credit-card tab-icon"></i> <span>เสวนา/เวิร์กช็อป</span></a>
                </li>
                <li class="nav-item">
                  <a class="tab_btn" data-toggle="tab" href="#tab5" id="tabbtn_5" role="tab"><i class="fa fa-check tab-icon"></i> <span>การจัดการ</span></a>
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
                                <div class="col-sm-12" style="font-family: 'dbch'">
                                    <?php echo $prename.$member->firstname.' '.$member->lastname;?>
                                </div>
                              </div>
                            </div>

                            <br>

                            <p>ที่อยู่ในการจัดส่งเอกสาร</p>
                            <div class="form-group-attached">
                              <div class="row clearfix">
                                <div class="col-sm-12" style="font-family: 'dbch'">
                                  <?php echo @$member->company_name; ?> เลขที่ <?php echo @$member->address; ?> หมู่ <?php echo @$member->village; ?> ซอย <?php echo @$member->lane; ?>  ถนน <?php echo @$member->road; ?> <br>
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
                                  <div class="col-sm-4" style="font-family: 'dbch'">
                                    <p>อีเมล</p>
                                    <?php echo $member->email;?>
                                  </div>
                                  <div class="col-sm-4" style="font-family: 'dbch'">
                                    <p>เบอร์โทรศัพท์</p>
                                    <?php echo (@$member->phone != 0)? @$member->phone : '';?>
                                  </div>
                                  <div class="col-sm-4" style="font-family: 'dbch'">
                                    <p>ไลน์ไอดี</p>
                                    <?php echo @$member->lineid; ?>
                                  </div>
                                </div>
                              </div>


                              <br>
                              
                              <!--  status group -->
                              <div id="commany">
                                <p>คุณสมัครในสถานภาพใด</p>
                                  <div class="row clearfix">
                                    <div class="col-sm-12" style="font-family: 'dbch'">
                                        <p>สถานภาพ</p>
                                        <?php 
                                          if(!empty($status)){foreach ($status as $key => $value) { ?>
                                          <?php echo (@$member->job == $value->status_id) ? $value->status_name:'';?> 
                                          <?php $status_group = (@$member->job == $value->status_id) ? $value->status_group:'';?> 
                                        <?php } }?>
                                    </div>
                                  </div>
                                  
                                  <!-- status group -->
                                  <div id="group_one"  <?php echo (@$status_group != 1) ? 'style="display:none;"':'';?> ">
                                    
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด</p>
                                          <span style="font-family: 'dbch'">
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
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ประสบการณ์</p>
                                          <span  style="font-family: 'dbch'">
                                          <?php echo (@$member->company_service == 1) ? 'กำลังพัฒนาและทดลองต้นแบ':'';?>
                                          <?php echo (@$member->company_service == 2) ? '0 - 3 ปี':'';?>
                                          <?php echo (@$member->company_service == 3) ? '3 - 10 ปี':'';?>
                                          <?php echo (@$member->company_service == 4) ? 'มากกว่า 10 ปี':'';?>
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ลูกค้าของคุณคือกลุ่มใด</p>
                                          <span style="font-family: 'dbch'">
                                          <?php echo (@$member->company_custom_group == 1) ? 'ลูกค้าในประเทศ':'';?> 
                                          <?php echo (@$member->company_custom_group == 2) ? 'ลูกค้าต่างประเทศ':'';?> 
                                          </span>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ลักษณะการทำงานของธุรกิจ </p>
                                          <span  style="font-family: 'dbch'">
                                          <?php echo (@$member->company_business_look == 1) ? 'รับจ้างผลิต':'';?>
                                          <?php echo (@$member->company_business_look == 2) ? 'รับจัดจำหน่าย':'';?>
                                          <?php echo (@$member->company_business_look == 3) ? 'ผลิตและจัดจำหน่ายภายใต้แบรนด์ตนเอง':'';?>
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  ">
                                          <label>จำนวนพนักงาน <?php echo @$member->company_people; ?> คน </label>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default ">
                                          <label>เลขทะเบียนนิติบุคคล <?php echo @$member->company_num_regis; ?> </label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="group_two" <?php echo (@$status_group != 2) ? 'style="display:none;"':'';?>>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด</p>
                                          <span  style="font-family: 'dbch'">
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
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ประสบการณ์</p>
                                          <span  style="font-family: 'dbch'">
                                          <?php echo (@$member->company_service == 1) ? 'กำลังพัฒนาและทดลองต้นแบ':'';?>
                                          <?php echo (@$member->company_service == 2) ? '0 - 3 ปี':'';?>
                                          <?php echo (@$member->company_service == 3) ? '3 - 10 ปี':'';?>
                                          <?php echo (@$member->company_service == 4) ? 'มากกว่า 10 ปี':'';?>
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-12">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>ลักษณะการทำงาน</p>
                                            <span  style="font-family: 'dbch'">
                                            <?php echo (@$member->company_work_look == 1) ? 'รับจ้างออกแบบอิสระ':'';?> 
                                            <?php echo (@$member->company_work_look == 2) ? 'ทำงานออกแบบอยู่ในบริษัทหรือแบรนด์':'';?> 
                                            <?php echo (@$member->company_work_look == 3) ? 'ออกแบบ ผลิตและจำหน่ายเอง':'';?> 
                                            </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-selectFx ">
                                          <p>ช่องทางการจำหน่าย</p>
                                          <span  style="font-family: 'dbch'">
                                          <?php echo (@$member->company_sell_way == 1) ? 'ออนไลน์':'';?> 
                                          <?php echo (@$member->company_sell_way == 2) ? 'ออฟไลน์':'';?> 
                                        </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-selectFx ">
                                          <p>ผลงานสามารถผลิตในจำนวนมากได้หรือไม่  </p>
                                          <span  style="font-family: 'dbch'">
                                          <?php echo (@$member->company_product_build == 1) ? 'ได้':'';?>
                                          <?php echo (@$member->company_product_build == 2) ? 'ไม่ได้':'';?>
                                        </span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                                  <div id="group_three" <?php echo (@$status_group != 3) ? 'style="display:none;"':'';?>>
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>ผลงานของคุณอยู่ในกลุ่มใด</p>
                                            <span  style="font-family: 'dbch'">
                                            <?php echo (@$member->company_group_product == 1) ? 'งานไม้':'';?>
                                            <?php echo (@$member->company_group_product == 2) ? 'งานทอผ้า/ย้อม':'';?>
                                            <?php echo (@$member->company_group_product == 3) ? 'งานปั้น':'';?>
                                            <?php echo (@$member->company_group_product == 4) ? 'งานจักรสาน':'';?>
                                            <?php echo (@$member->company_group_product == 5) ? 'งานเพ้นท์':'';?>
                                            <?php echo (@$member->company_group_product == 6) ? 'งานเครื่องเงิน':'';?>
                                            <?php echo (@$member->company_group_product == 7) ? @$member->company_group_product_detail:'';?>
                                          </span>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>ประสบการณ์</p>
                                            <span  style="font-family: 'dbch'">
                                            <?php echo (@$member->company_service == 1) ? 'กำลังพัฒนาและทดลองต้นแบ':'';?>
                                            <?php echo (@$member->company_service == 2) ? '0 - 3 ปี':'';?>
                                            <?php echo (@$member->company_service == 3) ? '3 - 10 ปี':'';?>
                                            <?php echo (@$member->company_service == 4) ? 'มากกว่า 10 ปี':'';?>
                                          </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row ">
                                      <div class="col-sm-12">
                                        <div class="form-group ">
                                          <p>โปรดระบุเทคนิคหรือความเชี่ยวชาญที่ใช้ทำงาน </p>
                                          <!-- <input type="text" name="company_technic[]" class="form-control" placeholder="1." value="<?php echo '';  ?>">
                                          <input type="text" name="company_technic[]" class="form-control" placeholder="2." value="<?php echo '';  ?>">
                                          <input type="text" name="company_technic[]" class="form-control" placeholder="3." value="<?php echo '';  ?>"> -->
                                        </div>
                                      </div>

                                    </div>
                                    <div class="row" >
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p> การผลิตสินค้าหรือผลงานของคุณเป็นรูปแบบใด</p>
                                          <span  style="font-family: 'dbch'">
                                          <?php echo (@$member->company_product_detail == 1) ? 'แบบศิลปะวัฒนธรรมดั้งเดิม':'';?>
                                          <?php echo (@$member->company_product_detail == 2) ? 'แบบตามไอเดียที่คิดขึ้นใหม่':'';?>
                                        </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row" >
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  ">
                                          <p>คุณสามารถผลิตได้จำนวน ชิ้น/ต่อเดือน </p>
                                          <span  style="font-family: 'dbch'">
                                          <?php echo @$member->company_num_product; ?>
                                        </span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="group_four" <?php echo (@$status_group != 4) ? 'style="display:none;"':'';?>>
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>องค์กรของคุณคือหน่วยงานประเภทใด</p>
                                            <span  style="font-family: 'dbch'">
                                            <?php echo (@$member->company_department == 1) ? 'สถานบันการศึกษา':'';?>
                                            <?php echo (@$member->company_department == 2) ? 'องค์กรระหว่างประเทศ':'';?>
                                            <?php echo (@$member->company_department == 3) ? 'หน่วยงานภาครัฐ':'';?>
                                            <?php echo (@$member->company_department == 4) ? 'สถาบันและพิพิธภัณฑ์':'';?>
                                            <?php echo (@$member->company_department == 5) ? 'สื่อมวลชน':'';?>
                                            <?php echo (@$member->company_department == 6) ? 'สมาคม':'';?>
                                            <?php echo (@$member->company_department == 7) ? 'วัดและชุมชน':'';?>
                                            <?php echo (@$member->company_department == 8) ? 'อื่นๆ':'';?>
                                          </span>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>หน้าที่หลักขององค์กร</p>
                                            <span  style="font-family: 'dbch'">
                                            <?php echo (@$member->company_duty == 1) ? 'ส่งเสริมความคิดสร้างสรรค์ และการออกแบบ':'';?>
                                            <?php echo (@$member->company_duty == 2) ? 'ส่งเสริมศิลปะวัฒนธรรม':'';?>
                                            <?php echo (@$member->company_duty == 3) ? 'ส่งเสริมความรับผิดชอบต่อสังคม':'';?>
                                            <?php echo (@$member->company_duty == 4) ? 'ส่งเสริมการค้าและธุรกิจ':'';?>
                                            <?php echo (@$member->company_duty == 5) ? 'ส่งเสริมวิชาชีพ':'';?>
                                          </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <p>คุณเคยร่วมงาน Design Week มาก่อนหรือไม่  </p><br>
                                          <span  style="font-family: 'dbch'">
                                          <?php echo (@$member->company_join_work == 1) ? 'เคย':'';?>
                                          <?php echo (@$member->company_join_work == 0) ? 'ไม่เคย':'';?>
                                        </span>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                              </div>

                              <br>

                              <div class="form-group-attached" >
                              <p>ข้อมูลเพิ่มเติมสำหรับการสมัครเข้าร่วม</p>
                              
                              <div class="form-group-attached">
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                    <p>ชื่อแบรนด์</p>
                                    <span  style="font-family: 'dbch'">
                                    <?php echo @$member->brand; ?>
                                  </span>
                                  </div>  
                                  <div class="col-sm-6">
                                    <p>บริษัท</p>
                                    <span  style="font-family: 'dbch'">
                                    <?php echo @$member->website; ?>
                                  </span>
                                  </div>
                                </div>
                                <br>
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                    <p>เฟสบุ๊ค แฟนเพจ</p>
                                    <span  style="font-family: 'dbch'">
                                    <?php echo @$member->facebook; ?>
                                  </span>
                                  </div>
                                  <div class="col-sm-6">
                                    <p>อินสตาแกรม</p>
                                    <span  style="font-family: 'dbch'">
                                    <?php echo @$member->instragram; ?>
                                  </span>
                                  </div>
                                </div>
                                <div class="row clearfix">
                                  <div class="col-sm-6">
                                    <p>ไลน์ @</p>
                                    <span  style="font-family: 'dbch'">
                                    <?php echo @$member->coordinator_lineid; ?>
                                  </span>
                                  </div>
                                  <div class="col-sm-6">
                                    <p>เว็บไซต์</p>
                                    <span  style="font-family: 'dbch'">
                                    <?php echo @$member->website; ?>
                                  </span>
                                  </div>
                                </div>
                                <br>
                                <!-- <p>ที่อยู่</p>
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
                                  </div>  -->
                              <!-- </div> -->
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
                                      <span  style="font-family: 'dbch'">
                                      <?php echo (@$member->coordinator_prename == '1')? 'นาย':''?>
                                      <?php echo (@$member->coordinator_prename == '2')? 'นาง':''?>
                                      <?php echo (@$member->coordinator_prename == '3')? 'นางสาว':''?><?php echo @$member->coordinator_firstname.' '.@$member->coordinator_lastname; ?>
                                    </span>
                                    </div>  
                                  </div>
                                </div>
  
                                <br>
                                <div class="form-group-attached">
                                  <div class="row clearfix">
                                     <div class="col-sm-6">
                                        <p>อีเมล</p>
                                        <span  style="font-family: 'dbch'">
                                        <?php echo @$member->coordinator_email; ?>
                                      </span>
                                      </div>
                                      <div class="col-sm-6">
                                        <p>เบอร์โทรศัพท์</p>
                                        <span  style="font-family: 'dbch'">
                                        <?php echo @$member->coordinator_phone; ?>
                                      </span>
                                      </div>
                                      <!-- <div class="col-sm-4">
                                        <p>ไลนไอดี</p>
                                        <?php echo @$member->coordinator_lineid; ?>
                                      </div> -->

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
                        <p style="font-weight: bold;">ประเภท <span style="color:red;">*</span></p>
                        <div class="row clearfix">
                        
                            <div class="col-sm-12">
                              <input type="hidden" name="work_talk_type" id="work_talk_type">
                              <input type="hidden" name="work_talk_type_at" id="work_talk_type_at">
                              <div class="row">
                                <div class="col-sm-5">
                                  <div class="checkbox check-success">
                                    <input <?php echo (@$regis['work_talk_type'] == '1')? 'checked':''?>  type="checkbox"  value="1" name="work_talk_ty" id="work_talk_ty1">
                                    <label for="work_talk_ty1">เสวนา</label>
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
                                    <label for="work_talk_ty2">เวิร์กช็อป</label>
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
                            <p style="font-weight: bold;">หัวข้อ</p>
                              <div class="form-group form-group-default required">
                              <label>&nbsp;</label>
                                <input name="work_talk_title_th" type="text" value="<?php echo @$regis['work_talk_title_th']; ?>"  placeholder="" class="form-control"  >
                              </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                            <p style="font-weight: bold;">หัวข้อ (ภาษาอังกฤษ)</p>
                              <div class="form-group form-group-default required">
                              <label>&nbsp;</label>
                                <input name="work_talk_title_en" type="text" value="<?php echo @$regis['work_talk_title_en']; ?>" placeholder="" class="form-control"  >
                              </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                            <p style="font-weight: bold;">ชื่อวิทยากร</p>
                              <div class="form-group form-group-default required">
                                <label>&nbsp;</label>
                                <input name="work_talk_name_th" type="text" value="<?php echo @$regis['work_talk_name_th']; ?>"  placeholder="" class="form-control"  >
                              </div>
                            </div>
                        </div>
                        <!-- <div class="row clearfix">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default required">
                                <label>ชื่อวิทยากร (ภาษาอังกฤษ)</label>
                                <input name="work_talk_name_en" type="text" value="<?php echo @$regis['work_talk_name_en']; ?>"  placeholder="ระบุชื่อชื่อวิทยากรภาษาอังกฤษ" class="form-control"  >
                              </div>
                            </div>
                        </div> -->
                    

                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <p style="font-weight: bold;">ขอบเขตเนื้อหาและรูปแบบวิธีการ</p>
                            <div class="wysiwyg5-wrapper b-a b-grey">
                              <textarea name="work_talk_detail" id="" class="work_talk_detail demo-form-wysiwyg"  placeholder="" ui-jq="wysihtml5" ui-options="{
                              html: true,
                              stylesheets: ['pages/css/editor.css']
                              }"><?php echo @$regis['work_talk_detail']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                            <p style="font-weight: bold;">ขอบเขตเนื้อหาเหมาะสมกับ</p>
                              <div class="form-group form-group-default required form-group-default-selectFx">
                                <label>&nbsp;</label>
                                <select style="width:100%;"  id="work_talk_scope" name="work_talk_scope" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" data-disable-search="true">
  
                                  <option  <?php echo (@$regis['work_talk_scope'] == '') ? 'selected':'';?> value="" >เลือก</option>
                                  <option  <?php echo (@$regis['work_talk_scope'] == 1) ? 'selected':'';?> value="1">ทุกคน</option>
                                  <option  <?php echo (@$regis['work_talk_scope'] == 2) ? 'selected':'';?> value="2">นักออกแบบ</option>
                                  <option  <?php echo (@$regis['work_talk_scope'] == 3) ? 'selected':'';?> value="3">นักธุรกิจ</option>
                                  <option  <?php echo (@$regis['work_talk_scope'] == 4) ? 'selected':'';?> value="4">อื่นๆ</option>
                                </select>
                              </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <p style="font-weight: bold;">คุณสมบัติผู้เข้าร่วม</p>
                            <div class="wysiwyg5-wrapper b-a b-grey">
                              <textarea name="join_property" id="" class="join_property demo-form-wysiwyg"  placeholder="" ui-jq="wysihtml5" ui-options="{
                              html: true,
                              stylesheets: ['pages/css/editor.css']
                              }">  <?php echo @$regis['join_property']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <br/>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                            <p style="font-weight: bold;">จำนวนผู้เข้าร่วม</p>
                              <div class="form-group form-group-default ">
                                <label>&nbsp;</label>
                                <input name="join_number"  value="<?php echo @$regis['join_number']; ?>" type="text" placeholder="" class="form-control"  >
                              </div>
                            </div>
                        </div>

                        <br>
                        <p style="font-weight: bold;">วันที่และเวลา เริ่มต้นและสิ้นสุดกิจกรรม</p>
      
                        <div class="row clearfix">
                              <div class="col-sm-12">
                                <div class="row form-group">
                                  <div class="col-sm-6">
                                    <label>วันที่เริ่มต้น</label>
                                  </div>
                                  <div class="col-sm-6">
                                    <label>วันที่สิ้นสุด</label>
                                  </div>
                                </div>
                                  <!-- <div class="col-sm-6">
                                    <label>วันที่สิ้นสุด</label>
                                  </div> -->
                              </div>
                          </div>

  
                          <div class="row form-group">
                            <div class="col-sm-12" >
                            <div class="row" >
                              <div class="col-sm-6 input-group">
                                <input required class="input-sm form-control datepicker-range_event" name="join_start_date" id="event_start_date" value="<?php echo @$regis['join_start_date']; ?>" type="text"><span class="input-group-addon"><i class="fa fa-calendar"></i>
                                </span>
                              </div>
                              <div class="col-sm-6 input-group">
                                  <input required class="input-sm form-control datepicker-range_event" name="join_finish_date" id="event_finish_date" value="<?php echo @$regis['join_finish_date']; ?>" type="text"><span class="input-group-addon"><i class="fa fa-calendar"></i>
                              </span>
                              </div>
                            </div>
                            </div>   
                          </div>            
                          <br/>
                       
                        <!-- <p>เวลาเริ่มต้นกิจกรรม และ เวลาสิ้นสุดกิจกรรม</p>
        -->
                          <div class="row clearfix form-group">
                            <div class="col-sm-6" >
                              <label>เวลาเริ่มต้น</label>
                            </div>
                              <!-- <div class="col-sm-2 text-center"></div> -->
                            <div class="col-sm-6" >
                              <label>เวลาสิ้นสุด</label>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-sm-12" >
                              <!-- <label>เวลาเริ่มต้น</label> -->
                              <div class="row">
                                <div class="col-sm-6 input-group">
                                  <input  class="input-sm form-control timepicker" name="join_start_time" id="event_start_time" value="<?php echo @$regis['join_start_time']; ?>" type="text"><span class="input-group-addon"><i class="fa fa-clock-o"></i>
                                  </span>
                                </div>

                                <div class="col-sm-6 input-group">
                                    <input  class="input-sm form-control timepicker" name="join_finish_time" id="event_finish_time" value="<?php echo @$regis['join_finish_time']; ?>" type="text"><span class="input-group-addon"><i class="fa fa-clock-o"></i>
                                    </span>
                                </div>
                             
                              </div>
                             
                             
                            </div>
                          </div>
                        <br/>
                        
                        <p style="font-weight: bold;">เอกสารประกอบการสมัคร <span style="color:red">*</span></p>
                        <hr/>
                        <div class=" row clearfix">
                          <div class="col-sm-12">
                            <div class="form-group required "  style="padding-left: 8px;">
                              <!-- <p> โปรดส่งเอกสารประกอบการสมัครได้ที่ </p> -->
                              <label >โปรไฟล์วิทยากร <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span> </label>
                              <div class="row">
                                  <div class="col-sm-12">
                                
                              
                                <?php
                                    if (!empty($regis['join_profile'])){ ?>
                                      <input  type="hidden" id="have_img" value="true">
                                    <?php  $product_img = explode(',',$regis['join_profile']);
                                  
                                      foreach ($product_img as $key => $val) { 
                                        if(@getimagesize(base_url($val))){ ?>
                                        <img src="<?= base_url().$val;?>" width='100px' height="100">
                                        <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                        echo '&nbsp;'; -->
                                    <?php }}
                                    }else{ ?>
                                      <input  type="hidden" id="have_img" value="false">
                                  <?php }
                                  
                                ?>
                                </div>
                                
                              </div>
                              <div class="fallback">
                                <input type="file" class="join_profile" name="join_profile[]" multiple="multiple" > 
                              </div>
                            </div>
                          </div>

                        <div class=" col-sm-12">
                          <div class=" form-group">
                            <label>ภาพวิทยากร <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span></label>
                            <div class="row">
                             
                              <?php
                                  if (!empty($regis['join_img_profile'])){
                                    $product_img = explode(',',$regis['join_img_profile']);
                                
                                    foreach ($product_img as $key => $val) { 
                                      if(@getimagesize(base_url($val))){ ?>
                                      <img src="<?= base_url().$val;?>" width='100px' height="100">
                                      <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                      echo '&nbsp;'; -->
                                   <?php }}
                                  }
                                
                              ?>
                            </div>
                            <div class="fallback">
                              <input type="file" class="join_img_profile" name="join_img_profile[]" multiple="multiple" accept="image/jpeg,image/png" > 
                            </div>

                          </div>
                        </div>
                       
                        <div class=" col-sm-12">
                          <div class=" form-group">
                          <label>ภาพกราฟิกหรือภาพกิจกรรมที่เคยจัด <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span></label>
                            <div class="row">
                             
                              <?php
                                  if (!empty($regis['join_img'])){
                                    $product_img = explode(',',$regis['join_img']);
                                
                                    foreach ($product_img as $key => $val) { 
                                      if(@getimagesize(base_url($val))){ ?>
                                      <img src="<?= base_url().$val;?>" width='100px' height="100">
                                      <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                      echo '&nbsp;'; -->
                                   <?php }}
                                  }
                                
                              ?>
                            </div>
                            <div class="fallback">
                              <input type="file" class="join_img" name="join_image[]" multiple="multiple" accept="image/jpeg,image/png" >
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12 ">
                          <div class="form-group">
                            <label>กำหนดการกิจกรรม <span style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</span> </label>
                            <div class="row">
                            
                                <?php
                                    if (!empty($regis['join_event'])){
                                      $product_img = explode(',',$regis['join_event']);
                                  
                                      foreach ($product_img as $key => $val) { 
                                        if(@getimagesize(base_url($val))){ ?>
                                        <img src="<?= base_url().$val;?>" width='100px' height="100">
                                        <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                        echo '&nbsp;'; -->
                                     <?php }}
                                    }
                                  
                                ?>
                            </div>
                            <div class="fallback">
                              <input type="file" class="join_event" name="join_event[]" multiple="multiple" >
                            </div>
                          </div>
                        </div>
                         
                         
                        </div>
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

                      <h5>ผู้สมัครส่งข้อมูลครบถ้วนหรือไม่</h5>
                      <br>
                      <input type="hidden" name="project_id" value="<?php echo $project_id?>">
                      <input type="hidden" name="user_id" value="<?php echo $user_id?>">

                      <input type="hidden" name="prj_name" value="<?php echo $project[0]->project_name;?>">
                      <input type="hidden" name="email_receive" value="<?php echo $member->email;?>">
                      <input type="hidden" name="reg_id" value="<?php echo $regis['reg_id']?>">
                      <input type="hidden" name="regis_name" value="<?php echo $prename.$member->firstname.' '.$member->lastname;?>">
                      <input type="hidden" name="reg_status" id="reg_status" value="<?php echo $regis['reg_status']?>">
                      <div class="radio radio-default">
                        <input value="1" name="radio_app" id="radio5Yes" type="radio" <?php echo ($regis['reg_status']==1) ? 'checked="checked"':''; ?> >
                        <label for="radio5Yes">ใช่</label>
                        <input value="0" name="radio_app" id="radio5No" type="radio" <?php echo ($regis['reg_status']==0) ? 'checked="checked"':''; ?> >
                        <label for="radio5No">ไม่ใช่</label>
                      </div>
                      <br>
                      <div id='div_reject' >
                      <h5>แจ้งสิ่งที่ต้องแก้ไข</h5>
                      <!-- <p class="all-caps fs-12 bold">โปรดระบุส่งที่ต้องแก้ไข : </p> -->
                      <div class="card-block">
                        <div class="wysiwyg5-wrapper b-a b-grey">
                          <textarea required id="reject_detail" name="reject_detail" class=" demo-form-wysiwyg reject_detail" placeholder="" ui-jq="wysihtml5" ui-options="{
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
      <li class="previous" id="hide_back" style="display:none;">
        <button class="btn btn-default btn-cons pull-right" type="button">
          <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
        </button>
      </li>
      <li class="previous_tmp" id ="previous_hide" style="display:none;">
        <a  href="<?php echo base_url('staff/show_user_register');?>"  class="btn btn-white btn-cons pull-right" type="button">
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