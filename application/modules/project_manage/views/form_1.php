
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
                  <a class="active" data-toggle="tab" href="#tab2" role="tab"><i class="fa fa-hospital-o tab-icon"></i> <span>ข้อมูลส่วนบุคคล/องค์กร</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab3" role="tab"><i class="fa fa-credit-card tab-icon"></i> <span>ข้อมูลงาน/ผลงาน</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab4" role="tab"><i class="fa fa-clipboard tab-icon"></i> <span>การร่วมจัดแสดงและเอกสาร</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab5" role="tab"><i class="fa fa-check tab-icon"></i> <span>การจัดการ</span></a>
                </li>
                <li class="nav-item">
                  <a class="" data-toggle="tab" href="#tab6" role="tab"><i class="fa fa-check tab-icon"></i> <span>เผยแพร่</span></a>
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
                                    <?php echo (@$member->company_service == 1) ? 'กำลังพัฒนาและทดลองต้นแบ':'';?> 
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
                      <div class="row clearfix">
                        <div class="col-md-12">
                        <p>เป้าหมายหลัก ในการจัดแสดงผลงาน</p>
                           <?php echo (@$regis['target_type'] == 1)? 'เพื่อเพิ่มมูลค่าของสินค้า':'' ?>
                           <?php echo (@$regis['target_type'] == 2)? 'เพื่อสร้างชื่อแบนด์ให้เป็นที่รู้จัก':'' ?>
                           <?php echo (@$regis['target_type'] == 3)? 'เพื่อเพิ่มโอกาสการจ้างงาน':'' ?>
                        </div>
                      </div>
                      
                      <div class="clone-form">
                      <?php if( empty(@$regis['product']) ) { ?>
                      
                      <?php }else{ ?>
                      <?php foreach (@$regis['product'] as $key => $value) { ?>
                        <div class="clonedInput" id="clonedInput<?php echo $key+1;?>">
                          <div class="row row-same-height " id ="second">
                                <div class="col-md-12 ">
                                  <div class="padding-30 sm-padding-5">
                                    <p id="num" class="num">1. ข้อมูลชิ้นงานชิ้นที่ <?php echo $key+1; ?></p><br>
                                    <div class="form-group-attached">
                                        <div class="row clearfix">
                                          <div class="col-sm-4">
                                            <p>ประเภทผลงาน</p>
                                            <?php echo (@$value['product_type'] == '1') ? 'เฟอร์นิเจอร์':''?>
                                            <?php echo (@$value['product_type'] == '2') ? 'ไลฟ์สไตล์':''?>
                                            <?php echo (@$value['product_type'] == '3') ? 'ของตกแต่งบ้าน':''?>
                                            <?php echo (@$value['product_type'] == '4') ? 'เครื่องประดับ':''?>
                                            <?php echo (@$value['product_type'] == '5') ? 'แฟชั่น':''?>
                                            <?php echo (@$value['product_type'] == '6') ? 'ออกแบบสื่อ (Multimedia, Graphic, Interactive)':''?>
                                          </div>

                                          <div class="col-sm-8">
                                            <p>ชื่อผลงาน</p>
                                            <?php echo @$value['product_name']?>
                                          </div>
                                        </div>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">
                                            <div class="col-sm-6">
                                              <p>วัสดุหลัก</p>
                                              <?php echo @$value['material']?>
                                            </div>

                                            <div class="col-sm-6">
                                              <p>ปีที่ออกแบบ</p>
                                              <?php 
                                                $date = '';
                                                if (!empty(@$value['product_date']) && @$value['product_date'] != '0000-00-00'  ){
                                                  $dates = explode('-',$value['product_date']);
                                                  $date = $dates[1] .'/'.$dates[2].'/'.$dates[0];
                                                  
                                                   echo @$date[0];
                                                }?>
                                            </div>
                                          </div>
                                        </div>

                                        <br>
                                        <p>2. ขนาดและจำนวนของผลงาน</p>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">
                                            <div class="col-sm-4">
                                              <p>กว้าง</p>
                                              <?php echo @$value['product_width']?> ซ.ม.
                                            </div>
                                            <div class="col-sm-4">
                                              <p>ยาว</p>
                                              <?php echo @$value['product_length']?> ซ.ม.
                                            </div>
                                            <div class="col-sm-4">
                                              <p>สูง</p>
                                              <?php echo @$value['product_height']?> ซ.ม.
                                            </div>
                                            <br>
                                            <div class="col-sm-12">
                                              <p>จำนวนชิ้นงาน</p>
                                              <?php echo @$value['product_amount']?>
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <div class="form-group-attached">
                                          <div class="row clearfix">
                                            <div class="col-sm-12">
                                              <p>3. แนวคิดในการออกแบบผลงาน </p>
                                              <span><?php echo htmlspecialchars(@$value['product_concept']);?></span>
                                            </div>
                                          </div>
                                        </div>

                                        <br>
                                        <p>4. ภาพผลงาน</p>
                                        <div class="col-sm-12">
                                            <div class="row clearfix">
                                              <div class="col-sm-12">
                                                <div class="form-group  ">
                                                  <label>ภาพรวมของผลงาน</label>
                                                  <div class="fallback">
                                                    <input id="product_img" name="product_img[1][]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                                  </div>
                                                </div>
                                              </div>
                                            
                                            </div>

                                            <div class="row clearfix">
                                              <div class="col-sm-12">
                                                <div class="form-group ">
                                                  <label>ภาพ Close Up</label>
                                                  <div class="fallback">
                                                    <input id="product_closeup" name="product_closeup[1][]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                                  </div>
                                                </div>
                                              </div>
                                            
                                            </div>

                                            <div class="row clearfix">
                                              <div class="col-sm-12">
                                                <div class="form-group ">
                                                  <label>ภาพ Pack Shot</label>
                                                  <div class="fallback">
                                                    <input id="product_packshot" name="product_packshot[1][]" type="file" multiple="multiple" accept="image/jpg, image/jpeg"  />
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                            
                                            </div>
                                        
                                        </div>

                                      </div>


                                    <br>
                                    <p>5. ผู้ออกแบบ</p>

                                    <div class="form-group-attached">
                                      <div class="row clearfix">
                                        <div class="col-sm-12">
                                          <?php echo @$value['product_firstname'].' '.@$value['product_lastname'];?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                </div>          
                          </div>
                        </div>
                
                      <?php }} ?>
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
                      <p>1. ลักษณะพื้นที่ในการจัดแสดง</p>
                      <?php echo (@$regis['showarea_type'] == 1)? 'ภายในอาคาร':'' ?>
                      <?php echo (@$regis['showarea_type'] == 2)? 'ภายนอกอาคาร':'' ?>
                      <br>
                      <br>
                      <p>2. ขนาดพื้นที่ใช้จัดแสดง</p>
                      <?php echo (@$regis['area_type'] == 1)? '2 x 1.5 เมตร':'' ?>
                      <?php echo (@$regis['area_type'] == 2)? '2 x 3 เมตร':'' ?>
                      <?php echo (@$regis['area_type'] == 3)? '2 x 6 เมตร':'' ?>
                      <br>
                      <br>
                      <p>3. ลักษณะในการจัดแสดง</p>
                      <?php echo (@$regis['show_type'] == 1)? 'จัดวางผลงานพร้อมคำอธิบาย':'' ?>
                      <?php echo (@$regis['show_type'] == 2)? 'จัดวางผลงานพร้อมสื่อประกอบ แสงสีเสียง กลิ่น ภาพ วีดีโอ':'' ?>
                      <?php echo (@$regis['show_type'] == 3)? 'จัดแสดงพร้อมการสาธิต':'' ?>
                      <?php echo (@$regis['show_type'] == 4)? 'จัดแสดงพร้อมจัดกิจกรรม':'' ?>
                      <br>
                      <br>
                      <p>4. แผนผัง แบบการจัดแสดงและคำอธิบาย </p>
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
                      <div class="radio radio-default">
                        <input value="1" name="radio_app" id="radio5Yes" type="radio">
                        <label for="radio5Yes">ผ่านการตรวจสอบ</label>
                        <input value="0" name="radio_app" id="radio5No" type="radio">
                        <label for="radio5No">ไม่ผ่าน</label>
                      </div>
                      <br>
                      <h5>สิ่งที่ต้องแก้ไข</h5>
                      <p class="all-caps fs-12 bold">โปรดระบุส่งที่ต้องแก้ไข : </p>
                      <div class="card-block">
                        <div class="wysiwyg5-wrapper b-a b-grey">
                          <textarea required id="reject_detail" name="reject_detail" class="wysiwyg demo-form-wysiwyg" placeholder="โปรดระบุส่งที่ต้องแก้ไข ..." ui-jq="wysihtml5" ui-options="{
                          html: true,
                          stylesheets: ['pages/css/editor.css']
                        }"><?php if(!empty($prj)){ echo $prj->reject_detail;}?></textarea>
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