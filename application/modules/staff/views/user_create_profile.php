<!-- START PAGE CONTENT -->
<div class="content ">
    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax">
      <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
          <!-- START BREADCRUMB -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">สร้างโปรไฟล์</li>
          </ol>
          <!-- END BREADCRUMB -->
        </div>
      </div>
    </div>
    <!-- END JUMBOTRON -->

    <!-- START CONTAINER FLUID -->
    <div class=" container-fluid   container-fixed-lg">
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <div class=" container-fluid   container-fixed-lg">
        <div class="row">
          <div class="col-lg-12">
            <!-- START card -->


            <div class="card card-default">

              <div class="card-block scrollable">
                <!-- REMOVE THIS WRAPPER IF .scrollable IS NOT USED -->
                <div style="max-height:auto">
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
                  <div class="row row-same-height">
                    <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                      <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                      
                        <h2>สร้างโปรไฟล์</h2>
                        <p>โปรดรักษาความปลอดภัยผู้ใช้งาน ห้ามเผยแพร่และไม่เปิดเผยข้อมูลผู้ใช้งาน</p>
                        <br>
  
                        
                          <br>
                          <br >
                          <h5>สถานะบัญชี</h5>
                          <p>สถานะ : <?php echo (@$data->user_active == 1) ? "ปกติ" : "<span style='color:red'>ไม่ปกติ</span>"; ?></p>
                          <h5>เปลี่ยนสถานะบัญชี</h5>
                          <input type="checkbox" id="user-active" name="user_active" class="switchery" <?php echo (@$data->user_active == 1) ? "checked value='1'" : "value='0'"; ?> />
                          <br><br>
                          <!-- <p >สมัครเมื่อ : 15/05/2561</p>
                          <p>เข้าใช้ครั้งล่าสุด : 25/05/2561</p>
                            -->
                          <br>
                        </div>

                      </div>
                      <div class="col-md-7">
                            <div class="padding-30 sm-padding-5">

                              
                              <div class="row">
                                <div class="card-block">
                                  <div class="padding-30 sm-padding-5">
                                    <?php $attributes = array('name' => 'frmEditProfile', 'id' => 'form-edit-profile');
                                        $lang = $this->uri->segment(1);
                                        $id = $this->uri->segment(4);
                                        echo form_open_multipart($lang.'/staff/createProfileSave'.'/'.$id, $attributes); 
                                    ?>
                                      <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />
                                      <input type="hidden"  id="user_active" name="user_active" value="" />
                                      <p>ข้อมูลบุคคล</p>
                                      <div class="form-group-attached">
                                        <div class="row clearfix">
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label>คำนำหน้า</label>
                                              <select name="prename" id="prename"  class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
                                               
                                                <option  <?php echo (@$data->prename == '') ? 'selected':'';?> value="" >เลือก</option>
                                                <option  <?php echo (@$data->prename == 1) ? 'selected':'';?> value="1">นาย</option>
                                                <option  <?php echo (@$data->prename == 2) ? 'selected':'';?> value="2">นาง</option>
                                                <option  <?php echo (@$data->prename == 3) ? 'selected':'';?> value="3">นางสาว</option>
                                                <option  <?php echo (@$data->prename == 4) ? 'selected':'';?> value="4">ไม่ระบุ</option>
                                              </select>
                                        
                                            </div>
                                          </div>
                                          <div class="col-sm-5">
                                            <div class="form-group form-group-default required">
                                              <label>ชื่อ</label>
                                              <input type="text" name="firstname" class="form-control" value="<?php echo @$data->firstname;?>" >
                                            </div>
                                          </div>
                                          <div class="col-sm-4">
                                            <div class="form-group form-group-default required">
                                              <label>นามสกุล</label>
                                              <input type="text" name="lastname" class="form-control" value="<?php echo @$data->lastname;?>">
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <div class="form-group-attached" id="prename_detail" style="display:none;">
                                          <div class="row clearfix">
                                            <div class="col-sm-3">
                                              <div class="form-group form-group-default ">
                                                <label>โปรดระบุ</label>
                                                <input  type="text" name="prename_detail" class="form-control" value="<?php echo @$data->prename_detail;?>">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <div class="form-group form-group-default has-error">
                                         
                                            <label>อีเมล</label>
                                            <input name="email" placeholder="ระบุอีเมล์ที่ใช้ในการลงทะเบียน" type="text" class="form-control" value="<?php echo @$data->email;?>">
                                          
                                        </div>
                                        <br>
                                        <div class="form-group form-group-default has-error">
                                          <label class="">รหัสผ่าน</label>
                                          <input name="password" placeholder="ตั้งรหัสผ่านอย่างน้อย 8 ตัวอักษร" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                        </div>
                                        <br>
                                        <div class="form-group form-group-default has-error">
                                          <label class="">ยืนยันรหัสผ่าน</label>
                                          <input name="pass_new_confirm" placeholder="พิมพ์รหัสผ่านใหม่อีกครั้ง" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                        </div>



                                      </div>
                                      <br>
                                      <p>ที่อยู่</p>
                                      <div class="form-group-attached">
                                      <div class="row clearfix">
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default required">
                                              <label>เลขที่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                              <input type="text" name="address" class="form-control" placeholder="ระบุบ้านเลขที่" value="<?php echo @$data->address; ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default required">
                                              <label>หมู่</label><span class="text-danger"><?php echo form_error('village'); ?></span>
                                              <input type="text" name="village" class="form-control" placeholder="ระบุหมู่" value="<?php echo @$data->village; ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default ">
                                              <label>ซอย</label><span class="text-danger"><?php echo form_error('lane'); ?></span>
                                              <input type="text" name="lane" class="form-control" placeholder="ระบุซอย" value="<?php echo @$data->lane; ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default ">
                                              <label>ถนน</label><span class="text-danger"><?php echo form_error('Road'); ?></span>
                                              <input type="text" name="road" class="form-control" placeholder="ระบุถนน" value="<?php echo @$data->road; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                              <label>ตำบล/แขวง</label>
                                              <input  name="subdistrict" type="text" class="form-control" placeholder="ระบุแขวงหรือตำบลของคุณ" value="<?php echo @$data->subdistrict; ?>">
                                            </div>
                                          </div>
                                          
                                          <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                              <label>เขต/อำเภอ</label>
                                              <input name="district" type="text" class="form-control" value="<?php echo @$data->district; ?>">
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
                                                  if (!empty(@$data->country)){
                                                    if(@$data->country == $value->id ){
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
                                              <select style="width:100%" id="province" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" name="province">
                                                <option  value="" >เลือก</option>
                                                <?php foreach ($province as $key => $value) { ?>
                                                  <?php 
                                                    $select = '';
                                                    if(@$data->province == $value->code ){
                                                        $select =  "selected='selected'";
                                                    } ?>
                                                  <option <?php echo $select; ?>  value="<?php echo $value->code;?>"><?php echo $value->name_th;?></option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-sm-4">
                                            <div class="form-group form-group-default required">
                                              <label>รหัสไปรษณีย์</label>
                                              <input name="zipcode" type="text" class="form-control" value="<?php echo @$data->zipcode; ?>" >
                                            </div>
                                          </div>
                                        </div>
                                      
                                        <br>
                                        <div class="form-group-attached">
                                          <div class="row clearfix">

                                            <div class="col-sm-12">
                                              <div class="form-group form-group-default required">
                                                <label>เบอร์โทรศัพท์</label>
                                               
                                                <?php 
                                                      $phone = '';
                                                      if(@$data->phone){
                                                        $phone = $data->phone;
                                                  }?>
                                            
                                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo @$phone;?>">
                                              </div>
                                            </div>
                                           
                                          </div>

                                        </div>
                                        
                                        <br>
                                         <p>รูปภาพโปรไฟล์</p>
                                          <div class="col-sm-12">
                                            <!-- <form  class="dropzone" id="form-regis-upload"> -->
                                              <div class="fallback">
                                                <input name="profile_img" type="file" size='20' />
                                              </div>
                                            <!-- </form> -->
                                          </div>
                                        <br>
                                       
                                        <p>เกี่ยวกับงาน</p>
                                        <div class="form-group-attached">
                                        <div class="row clearfix">
                                                      <div class="col-sm-12">
                                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                                          <label>สถานะ</label>
                                                          <select style="width:100%" name="job" id="job" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                          
                                                              <option  <?php echo (@$data->job == '') ? 'selected':'';?> value="" >เลือก</option>
                                                              <option  <?php echo (@$data->job == 1) ? 'selected':'';?> value="1">บริษัท</option>
                                                              <option  <?php echo (@$data->job == 2) ? 'selected':'';?> value="2">ผู้ประกอบการธุรกิจ</option>
                                                              <option  <?php echo (@$data->job == 3) ? 'selected':'';?> value="3">สตูดิโอออกแบบ</option>
                                                              <option  <?php echo (@$data->job == 4) ? 'selected':'';?> value="4">ช่างฝีมือ/เมคเกอร์</option>
                                                              <option  <?php echo (@$data->job == 5) ? 'selected':'';?> value="5">วิสาหกิจชุมชน</option>
                                                              <option  <?php echo (@$data->job == 6) ? 'selected':'';?> value="6">นักออกแบบ/ศิลปิน/สถาปนิก</option>
                                                              <option  <?php echo (@$data->job == 7) ? 'selected':'';?> value="7">นักเรียนนักศึกษา</option>
                                                              <option  <?php echo (@$data->job == 8) ? 'selected':'';?> value="8">องค์กร/สถาบัน</option>
                                                              <option  <?php echo (@$data->job == 9) ? 'selected':'';?> value="9">สถาบันการศึกษา</option>
                                                              <option  <?php echo (@$data->job == 10) ? 'selected':'';?> value="10">อาชีพอิสระ</option>
                                                              <option  <?php echo (@$data->job == 11) ? 'selected':'';?> value="11">อื่นๆ (โปรดระบุ)</option>

                                                          </select>
                                                        </div>
                                                      </div>
                                                    </div>


                                                    
                                                    <div class="row clearfix" id="job_detail" <?php echo (@$data->job_detail && @$data->job == 9) ?  "" : "style='display:none;'" ?>>
                                                      <div class="col-sm-12">
                                                        <div class="form-group form-group-default ">
                                              
                                                          <input type="text" name="job_detail" placeholder="ระบุอาชีพของคุณ" class="form-control" value="<?php echo @$data->job_detail; ?>">
                                                        </div>
                                                      </div>
                                                    
                                                    </div>

                                                    <div class="row clearfix">
                                                      <div class="col-sm-12">
                                                        <div class="form-group form-group-default  form-group-default-selectFx">
                                                          <label>สาขาอุตสาหกรรมสร้างสรรค์</label>
                                                          <select style="width:100%" name="job_type" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                          
                                                                <option  <?php echo (@$data->job_type == '') ? 'selected':'';?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->job_type == 1) ? 'selected':'';?> value="1">งานฝีมือและหัตถกรรม</option>
                                                                <option  <?php echo (@$data->job_type == 2) ? 'selected':'';?> value="2">ศิลปะการแสดง</option>
                                                                <option  <?php echo (@$data->job_type == 3) ? 'selected':'';?> value="3">ทัศนศิลป์</option>
                                                                <option  <?php echo (@$data->job_type == 4) ? 'selected':'';?> value="4">ดนตรี</option>
                                                                <option  <?php echo (@$data->job_type == 5) ? 'selected':'';?> value="5">ภาพยนตร์และวิดีทัศน์</option>
                                                                <option  <?php echo (@$data->job_type == 6) ? 'selected':'';?> value="6">การพิมพ์</option>
                                                                <option  <?php echo (@$data->job_type == 7) ? 'selected':'';?> value="7">การกระจายเสียง</option>
                                                                <option  <?php echo (@$data->job_type == 8) ? 'selected':'';?> value="8">ซอฟต์แวร์</option>
                                                                <option  <?php echo (@$data->job_type == 9) ? 'selected':'';?> value="9">การโฆษณา</option>
                                                                <option  <?php echo (@$data->job_type == 10) ? 'selected':'';?> value="10">การออกแบบ (รวมถึงแฟชั่น)</option>
                                                                <option  <?php echo (@$data->job_type == 11) ? 'selected':'';?> value="11">สถาปัตยกรรม</option>
                                                                <option  <?php echo (@$data->job_type == 12) ? 'selected':'';?> value="11">แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)</option>
              

                                                          </select>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                          <div class="form-group form-group-default  form-group-default-selectFx">
                                                            <label>ประสบการณ์</label>
                                                            <select style="width:100%" name="company_service" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                            
                                                             
                                                              <option  <?php echo (@$data->company_service == '') ? 'selected':'';?> value="" >เลือก</option>
                                                              <option  <?php echo (@$data->company_service == 1) ? 'selected':'';?> value="1">กำลังพัฒนาและทดลองต้นแบ</option>
                                                              <option  <?php echo (@$data->company_service == 2) ? 'selected':'';?> value="2">0 - 3 ปี</option>
                                                              <option  <?php echo (@$data->company_service == 3) ? 'selected':'';?> value="3">3 - 10 ปี</option>
                                                              <option  <?php echo (@$data->company_service == 4) ? 'selected':'';?> value="4">มากกว่า 10 ปี</option>

                                                
                                                            </select>
                                                          </div>
                                                        </div>
                                                      </div>

                                                    </div>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default">
                                                <label>เว็บไซต์</label>
                                                <input type="text" id="website" name="website" class="form-control" value="<?php echo @$data->website; ?>">
                                              </div>
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default">
                                                <label>ชื่อแบรนด์</label>
                                                <input type="text" class="form-control" name="brand" value="<?php echo @$data->brand; ?>" > 
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group-attached">
                                            <div class="row clearfix">

                                              <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                  <label>LINE</label>
                                                  <input type="text" class="form-control" name="lineid" value="<?php echo @$data->lineid; ?>">
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                  <label>Facebook Fan Page</label>
                                                  <input type="text" class="form-control" name="facebook" value="<?php echo @$data->facebook; ?>">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <br>

                                       
                                        
                                      </div>
                                    <?php echo form_close(); ?>

                                  </div>

                                  <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                                    <ul class="pager wizard no-style">
                                      <li class="next">
                                        <button id="btn-finish" class="btn btn-primary btn-cons pull-right" type="button">
                                          <span>บันทึก</span>
                                        </button>
                                      </li>
                                      <li class="next finish hidden">
                                        <button id="btn-finish" class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                                          <span>เสร็จสิ้น</span>
                                        </button>
                                      </li>
                                      <li class="previous first hidden">
                                        <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                                          <span>หน้าสุด</span>
                                        </button>
                                      </li>
                                      <li class="previous">
                                        <button class="btn btn-default btn-cons pull-right" type="button">
                                          <span>ยกเลิก</span>
                                        </button>
                                      </li>
                                    </ul>
                                  </div>



                                  
                                  <br>
                                </div>



                              </div>
                              <br>

                            </div>
                          </div>
                    </div>
                    




                  </div>
                </div>
              </div>

              
              <!-- END card -->
            </div>
          </div>
        </div>




        <!-- end news crade -->

        <!-- END PLACE PAGE CONTENT HERE -->
      </div>
      <!-- END CONTAINER FLUID -->
    </div>

        <!-- END PAGE CONTENT -->


<!--js  validate form -->

