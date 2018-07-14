
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
                  <a class="active tab_btn" data-toggle="tab" href="#tab2" id="tabbtn_2" role="tab"><i class="fa fa-hospital-o tab-icon"></i> <span>ข้อมูลบุคคล/องค์กร</span></a>
                </li>
                <li class="nav-item">
                  <a class="tab_btn" data-toggle="tab" href="#tab3" id="tabbtn_3" role="tab"><i class="fa fa-credit-card tab-icon"></i> <span>ผลงานออกแบบ</span></a>
                </li>
                <li class="nav-item" <?php echo ($regis['reg_status']==0) ? 'style="display: none;"':''; ?> >
                  <a class="tab_btn" data-toggle="tab" href="#tab4" id="tabbtn_4" role="tab"><i class="fa fa-clipboard tab-icon"></i> <span>การร่วมจัดแสดงและเอกสาร</span></a>
                </li>
                <li class="nav-item">
                  <a class="tab_btn" data-toggle="tab" href="#tab<?php echo ($regis['reg_status']==0) ? '4':'5'; ?>" id="tabbtn_<?php echo ($regis['reg_status']==0) ? '4':'5'; ?>" role="tab"><i class="fa fa-check tab-icon"></i> <span>การจัดการ</span></a>
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
                                                    <input  id="product_pdf" name="product_pdf[1][]" type="file" accept="image/jpg, image/jpeg" />
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
                                              <select  style="width:100%"  id="product_prename" name="product_prename[]" class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2" data-disable-search="false">
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
                                                
                                                  <input name="product_amount[]" class="form-control"  type="text" value="<?php echo @$value['product_amount']?>">
                                                </div>
                                              </div>
                                        </div>
                                        <div class="row clearfix">

                                          <div class="col-sm-4">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label>ประเภทผลงาน</label>
                                              <select style="width:100%" name="product_type[]" class="cs-select cs-skin-slide cs-transparent form-control product_type" data-init-plugin="select2"  data-disable-search="true">
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
                                              <input  id="product_name" name="product_name[]" type="text" class="form-control" value="<?php echo @$value['product_name']?>" >
                                            </div>
                                          </div>
                                          
                                        </div>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default required">
                                                <label>วัสดุหลัก</label>
                                                <input name="material[]" type="text" class="form-control" value="<?php echo @$value['material']?>" >
                                              </div>
                                            </div>

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default">
                                              <label >ปีที่ออกแบบ</label>

                                               <select style="width:100%" name="product_date[]" class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2" data-disable-search="false">
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
                                                  <input name="product_width[]" class="form-control" type="text" value="<?php echo @$value['product_width']?>">
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
                                                  <input name="product_length[]" class="form-control" type="text" value="<?php echo @$value['product_length']?>">
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
                                                  <input  name="product_height[]"class="form-control" type="text" value="<?php echo @$value['product_height']?>">
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
                                                <textarea name="product_concept[]" id="" class="product_concept demo-form-wysiwyg" placeholder="" ui-jq="wysihtml5" ui-options="{
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
                                                    <input id="product_img"  name="product_img[1][]" type="file" multiple="multiple" accept="image/jpeg, image/png" />
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group  ">
                                                  <label>ไฟล์นำเสนอผลงาน (ถ้ามี)  <p style="color:red; font-size:18px;">(ส่งเฉพาะไฟล์ JPG ขนาดไม่เกิน 2MB.)</p></label>
                                                  <div class="row">
                                                  <?php
                                                     if (!empty($value['product_pdf'])){
                                                        $product_pdf = explode(',',$value['product_pdf']);
                                                    
                                                        foreach ($product_pdf as $key => $val) { 
                                                          if(@getimagesize(base_url($val))){ ?>
                                                          <img src="<?= base_url().$val;?>" width='100px' height="100">
                                                          <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                                          echo '&nbsp;'; -->
                                                       <?php }}
                                                     }
                                                   
                                                  ?>
                                                  </div>
                                                  <div class="fallback">
                                                    <input  id="product_pdf" name="product_pdf[1][]" type="file" accept="image/jpg, image/jpeg" />
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
                                                    
                                                        foreach ($product_img as $key => $val)
                                                          if(@getimagesize(base_url($val))){ { ?>
                                                          <img src="<?= base_url().$val;?>" width='100px' height="100">
                                                          <!-- echo  cl_image_tag($val, array( "alt" => "profile","width"=>100, "height"=>100 ));  
                                                          echo '&nbsp;'; -->
                                                       <?php }}
                                                     }
                                                   
                                                  ?>
                                                  </div>
                                                  <div class="fallback">
                                                    <input id="product_closeup" name="product_closeup[1][]" type="file" multiple="multiple" accept="image/jpeg, image/png"  />
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
                                                    <input id="product_packshot" name="product_packshot[1][]" type="file" multiple="multiple" accept="image/jpeg, image/png"  />
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
                                              <select  style="width:100%"  id="product_prename" name="product_prename[]" class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2" data-disable-search="false">
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
                                            <input type="text" class="form-control" name="product_firstname[] " value="<?php echo @$value['product_firstname'];?>" >
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="form-group form-group-default required">
                                          <label>นามสกุล</label>
                                          <input type="text" class="form-control" name="product_lastname[]" value="<?php echo @$value['product_lastname'];?>">
                                        </div>
                                      </div>

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

                    

                 
                
                </div>
            <?php if($regis['reg_status']==1){ ?>
            <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab4"  >
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
          <?php }?>

            <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab<?php echo ($regis['reg_status']==0) ? '4"':'5'; ?>">
              <div class="row clearfix">

                <div class="col-sm-12">

                  <h1>การจัดการ</h1>
                  <!-- <p>หากการกรอกข้อมูลไม่ตรงกับความเป็นจริงหรือผิดพลาด คุณสามารถตั้งค่าส่วนนี้เพื่อแจ้งกลับไปยังผู้ใช้งานได้โดยระบบจะส่งการแจ้งเตือนไปยังผู้ใช้งาน</p> -->

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
                          <textarea required id="reject_detail" name="reject_detail" class="demo-form-wysiwyg reject_detail" placeholder="" ui-jq="wysihtml5" ui-options="{
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
      <!-- <li class="previous">
        <button class="btn btn-default btn-cons pull-right" type="button">
          <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
        </button>
      </li> -->
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