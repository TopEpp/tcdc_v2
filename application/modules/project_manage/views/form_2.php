
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
                  <a class="" data-toggle="tab" href="#tab3" role="tab"><i class="fa fa-credit-card tab-icon"></i> <span>ข้อมูลการลงทะเบียน</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab5" role="tab"><i class="fa fa-check tab-icon"></i> <span>การจัดการ</span></a>
                </li>
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
                              
                              <!--  status group -->
                              <div id="commany">
                                <p>เกี่ยวกับงาน</p>
                                  <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <p>สถานะ</p>
                                        <?php foreach ($status as $key => $value) { ?>
                                          <?php echo (@$member->job == $value->status_id) ? $value->status_name:'';?> 
                                          <?php $status_group = (@$member->job == $value->status_id) ? $value->status_group:'';?> 
                                        <?php } ?>
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
                                  <div id="group_one"  <?php echo (@$status_group != 1) ? 'style="display:none;"':'';?> ">
                                    
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ผลงานของคุณอยู่ในสาขาอุตสาหกรรมสร้างสรรค์ใด</p>
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
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ประสบการณ์</p>
                                          <?php echo (@$member->company_service == 1) ? 'กำลังพัฒนาและทดลองต้นแบ':'';?>
                                          <?php echo (@$member->company_service == 2) ? '0 - 3 ปี':'';?>
                                          <?php echo (@$member->company_service == 3) ? '3 - 10 ปี':'';?>
                                          <?php echo (@$member->company_service == 4) ? 'มากกว่า 10 ปี':'';?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ลูกค้าของคุณคือกลุ่มใด</p>
                                          <?php echo (@$member->company_custom_group == 1) ? 'ลูกค้าในประเทศ':'';?> 
                                          <?php echo (@$member->company_custom_group == 2) ? 'ลูกค้าต่างประเทศ':'';?> 
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ลักษณะการทำงานของธุรกิจ </p>
                                          <?php echo (@$member->company_business_look == 1) ? 'รับจ้างผลิต':'';?>
                                          <?php echo (@$member->company_business_look == 2) ? 'รับจัดจำหน่าย':'';?>
                                          <?php echo (@$member->company_business_look == 3) ? 'ผลิตและจัดจำหน่ายภายใต้แบรนด์ตนเอง':'';?>
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
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                          <p>ประสบการณ์</p>
                                          <?php echo (@$member->company_service == 1) ? 'กำลังพัฒนาและทดลองต้นแบ':'';?>
                                          <?php echo (@$member->company_service == 2) ? '0 - 3 ปี':'';?>
                                          <?php echo (@$member->company_service == 3) ? '3 - 10 ปี':'';?>
                                          <?php echo (@$member->company_service == 4) ? 'มากกว่า 10 ปี':'';?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>ลักษณะการทำงาน</p>
                                            <?php echo (@$member->company_work_look == 1) ? 'รับจ้างออกแบบอิสระ':'';?> 
                                            <?php echo (@$member->company_work_look == 2) ? 'ทำงานออกแบบอยู่ในบริษัทหรือแบรนด์':'';?> 
                                            <?php echo (@$member->company_work_look == 3) ? 'ออกแบบ ผลิตและจำหน่ายเอง':'';?> 
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>ลักษณะการทำงานของธุรกิจ </p>
                                            <?php echo (@$member->company_business_look == 1) ? 'รับจ้างผลิต':'';?>
                                            <?php echo (@$member->company_business_look == 2) ? 'รับจัดจำหน่าย':'';?>
                                            <?php echo (@$member->company_business_look == 3) ? 'ผลิตและจัดจำหน่ายภายใต้แบรนด์ตนเอง':'';?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-selectFx ">
                                          <p>ช่องทางการจำหน่าย</p>
                                          <?php echo (@$member->company_sell_way == 1) ? 'ออนไลน์':'';?> 
                                          <?php echo (@$member->company_sell_way == 2) ? 'ออฟไลน์':'';?> 
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-selectFx ">
                                          <p>ผลงานสามารถผลิตในจำนวนมากได้หรือไม่  </p>
                                          <?php echo (@$member->company_product_build == 1) ? 'ได้':'';?>
                                          <?php echo (@$member->company_product_build == 2) ? 'ไม่ได้':'';?>
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
                                            <?php echo (@$member->company_group_product == 1) ? 'งานไม้':'';?>
                                            <?php echo (@$member->company_group_product == 2) ? 'งานทอผ้า/ย้อม':'';?>
                                            <?php echo (@$member->company_group_product == 3) ? 'งานปั้น':'';?>
                                            <?php echo (@$member->company_group_product == 4) ? 'งานจักรสาน':'';?>
                                            <?php echo (@$member->company_group_product == 5) ? 'งานเพ้นท์':'';?>
                                            <?php echo (@$member->company_group_product == 6) ? 'งานเครื่องเงิน':'';?>
                                            <?php echo (@$member->company_group_product == 7) ? @$member->company_group_product_detail:'';?>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>ประสบการณ์</p>
                                            <?php echo (@$member->company_service == 1) ? 'กำลังพัฒนาและทดลองต้นแบ':'';?>
                                            <?php echo (@$member->company_service == 2) ? '0 - 3 ปี':'';?>
                                            <?php echo (@$member->company_service == 3) ? '3 - 10 ปี':'';?>
                                            <?php echo (@$member->company_service == 4) ? 'มากกว่า 10 ปี':'';?>
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
                                          <?php echo (@$member->company_product_detail == 1) ? 'แบบศิลปะวัฒนธรรมดั้งเดิม':'';?>
                                          <?php echo (@$member->company_product_detail == 2) ? 'แบบตามไอเดียที่คิดขึ้นใหม่':'';?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row" >
                                      <div class="col-sm-12">
                                        <div class="form-group form-group-default  ">
                                          <p>คุณสามารถผลิตได้จำนวน (ชิ้น/ต่อเดือน) </p>
                                          <?php echo @$member->company_num_product; ?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="group_four" <?php echo (@$status_group != 4) ? 'style="display:none;"':'';?>>
                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>คุณคือหน่วยงานประเภทใด</p>
                                            <?php echo (@$member->company_department == 1) ? 'สถานบันการศึกษา':'';?>
                                            <?php echo (@$member->company_department == 2) ? 'องค์กรระหว่างประเทศ':'';?>
                                            <?php echo (@$member->company_department == 3) ? 'หน่วยงานภาครัฐ':'';?>
                                            <?php echo (@$member->company_department == 4) ? 'สถาบันและพิพิธภัณฑ์':'';?>
                                            <?php echo (@$member->company_department == 5) ? 'สื่อมวลชน':'';?>
                                            <?php echo (@$member->company_department == 6) ? 'สมาคม':'';?>
                                            <?php echo (@$member->company_department == 7) ? 'วัดและชุมชน':'';?>
                                            <?php echo (@$member->company_department == 8) ? 'อื่นๆ':'';?>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                            <p>หน้าที่หลักขององค์กร</p>
                                            <?php echo (@$member->company_duty == 1) ? 'ส่งเสริมความคิดสร้างสรรค์ และการออกแบบ':'';?>
                                            <?php echo (@$member->company_duty == 2) ? 'ส่งเสริมศิลปะวัฒนธรรม':'';?>
                                            <?php echo (@$member->company_duty == 3) ? 'ส่งเสริมความรับผิดชอบต่อสังคม':'';?>
                                            <?php echo (@$member->company_duty == 4) ? 'ส่งเสริมการค้าและธุรกิจ':'';?>
                                            <?php echo (@$member->company_duty == 5) ? 'ส่งเสริมวิชาชีพ':'';?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <p>คุณเคยร่วมงาน Design Week มาก่อนหรือไม่  </p><br>
                                          <?php echo (@$member->company_join_work == 1) ? 'เคย':'';?>
                                          <?php echo (@$member->company_join_work == 0) ? 'ไม่เคย':'';?>
                                        </div>
                                      </div>

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
                                    <input id="product_img" name="pop_img[]" type="file" multiple="multiple" accept="image/jpeg, image/png"  />
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
                                    <input id="product_closeup" name="pop_closeup[]" type="file" multiple="multiple" accept="image/jpeg, image/png"  />
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
                                    <input id="product_packshot" name="pop_packshot[]" type="file" multiple="multiple" accept="image/jpeg, image/png" />
                                  </div>
                                  
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

                      <h5>คุณได้ตรวจสอบข้อมูลข้างต้นแล้ว ข้อมูลครบถ้วนหรือไม่?</h5>
                      <br>
                      <input type="hidden" name="project_id" value="<?php echo $project_id?>">
                      <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                      
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