
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
                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <p>ชื่อร้าน</p>
                              <?php echo @$regis['pop_shop_name'];?>
                            </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-sm-12">
                            <p>เกี่ยวกับแบรนด์(เล่าถึงที่มาของร้านและประเภทสินค้าที่ขาย)</p>
                            <?php echo htmlspecialchars(@$regis['pop_story']);?>
                          </div>
                        </div>
                        <br>
                        <h5>ประเภทของที่ขาย</h5>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                              <?php echo (!empty(@$regis['pop_product_type']))? 'Product':''?>
                              <?php echo (!empty(@$regis['pop_food_type']))? 'Food & Beverage':''?>
                            </div>
                        </div>
                        <br>
                        <div id="product" <?php echo (!empty(@$regis['pop_product_type']))? '':'style="display:none;"'?> >
                          <h5>Product</h5>
                          <p >ประเภทของที่ขาย</p>
                          <div class="row clearfix">
                              <div class="col-sm-12">
                                <?php echo (@$regis['pop_product_type'] == '1')? 'Lifstyle':''?>
                                <?php echo (@$regis['pop_product_type'] == '2')? 'Furniture':''?>
                                <?php echo (@$regis['pop_product_type'] == '3')? 'Textile / Fashion':''?>
                                <?php echo (@$regis['pop_product_type'] == '4')? 'Accessories':''?>
                                <?php echo (@$regis['pop_product_type'] == '5')? 'Home Decor':''?>
                              </div>
                          </div>
                        </div>
                        
                          <br>
                        <div id="food" <?php echo (!empty(@$regis['pop_food_type']))? '':'style="display:none;"'?> >
                          <h5>Food & Beverage</h5>
                          <p>ประเภทของที่ขาย</p>
                          <div class="row clearfix">
                              <div class="col-sm-12">
                                <?php echo (@$regis['pop_food_type'] == '1')? 'อาหาร':''?>
                                <?php echo (@$regis['pop_food_type'] == '2')? 'เครื่องดื่ม':''?>
                                <?php echo (@$regis['pop_food_type'] == '3')? 'เบเกอรี่ / ของหวาน':''?>
                              </div>
                          </div>
                        </div>
                         <br>
                        <h5 >แนบรูปสินค้า</h5>

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