<!-- START PAGE CONTENT -->
<div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">แก้ไขโปรไฟล์</li>
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
                      ?>
                      <div class="row row-same-height">
                        <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                          <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                          
                            <h2>แก้ไขโปรไฟล์</h2>
                            <p>โปรดรักษาความปลอดภัยผู้ใช้งาน ห้ามเผยแพร่และไม่เปิดเผยข้อมูลผู้ใช้งาน</p>
                            <br>
                            <div class="profile-img-wrapper2 m-t-5 inline">
                              <img alt="" src="<?php echo base_url();?>assets/img/profiles/pr_s1150.jpg" width="70" height="70">
                              <div class="chat-status available">
                              </div>
                            </div>
                            <div class="inline m-l-20">
                              <p class="m-t-5">ชื่อ- สกุล : <?php echo @$data->firstname .' '.@$data->lastname;?>
                                <br>อาชีพ : <?php echo @$data->job;?><br>ที่อยู่ : <?php echo @$data->address.' ต.'.@$data->subdistrict.' อ.'.@$data->district.' จ.'. @$province_name->name_th.' '.@$data->zipcode;?></p>
                              </div>

                              <br>
                              <br >
                              <h5>สถานะบัญชี</h5>
                              <p>สถานะ : <?php echo ($data->user_active == 1) ? "ปกติ" : "<span style='color:red'>ไม่ปกติ</span>"; ?></p>
                              <h5>เปลี่ยนสถานะบัญชี</h5>
                              <input type="checkbox" id="user-active" name="user_active" class="switchery" <?php echo ($data->user_active == 1) ? "checked value='1'" : "value='0'"; ?> />
                              <br><br>
                              <p>สมัครเมื่อ : 15/05/2561</p>
                              <p>เข้าใช้ครั้งล่าสุด : 25/05/2561</p>
                              
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
                                        echo form_open_multipart($lang.'/staff/editProfileSave'.'/'.$id, $attributes); 
                                    ?>
                                      <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />
                                      <input type="hidden"  id="user_active" name="user_active" value="" />
                                      <p>ข้อมูลบุคคล</p>
                                      <div class="form-group-attached">
                                        <div class="row clearfix">
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label>คำนำหน้า</label>
                                              <select name="prename" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
                                               
                                                <option  <?php echo (@$data->prename == '') ? 'selected':'';?> value="" >เลือก</option>
                                                <option  <?php echo (@$data->prename == 1) ? 'selected':'';?> value="1">นาย</option>
                                                <option  <?php echo (@$data->prename == 2) ? 'selected':'';?> value="2">นาง</option>
                                                <option  <?php echo (@$data->prename == 3) ? 'selected':'';?> value="3">นางสาว</option>
                                                <option  <?php echo (@$data->prename == 4) ? 'selected':'';?> value="4">อื่นๆ</option>
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
                                            <div class="form-group form-group-default">
                                              <label>นามสกุล</label>
                                              <input type="text" name="lastname" class="form-control" value="<?php echo @$data->lastname;?>">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default required">
                                                <label>เบอร์โทรศัพท์</label>
                                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo @$data->phone;?>">
                                              </div>
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default required">
                                                <label>Email</label>
                                                <input name="email" type="text" class="form-control" value="<?php echo @$data->email;?>">
                                              </div>
                                            </div>
                                            
                                            

                                          </div>

                                        </div>

                                        <br>
                                        <p>รหัสผ่าน</p>
                                        <div class="form-group form-group-default has-error">
                                          <label class="">Old Password</label>
                                          <span class="text-danger">
                                            <?php  if($this->session->flashdata('error_old_pass')){
                                                  echo $this->session->flashdata('error_old_pass');
                                                  $this->session->unset_userdata('error_old_pass');
                                                }  ?>
                                          </span>
                                          <input name="password" placeholder="ใส่รหัสผ่านเดิม" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password" value="<?php //echo $this->encrypt->decode(@$data->password);?>">
                                        </div>
                                        <br>
                                        <div class="form-group form-group-default has-error">
                                          <label class="">New Password</label>
                                          <span class="text-danger">
                                          <?php   if($this->session->flashdata('error_pass_new')){
                                                  echo $this->session->flashdata('error_pass_new');
                                                  $this->session->unset_userdata('error_pass_new');
                                                } ?>
                                          </span>
                                          <input name="pass_new" placeholder="ตั้งรหัสผ่านอย่างน้อย 8 ตัวอักษร" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                        </div>
                                        <br>
                                        <div class="form-group form-group-default has-error">
                                          <label class="">Confirm New Password</label>
                                          <span class="text-danger">
                                          <?php  if($this->session->flashdata('error_pass_new_confirm')){
                                                  echo $this->session->flashdata('error_pass_new_confirm');
                                                  $this->session->unset_userdata('error_pass_new_confirm');
                                                } ?>
                                          </span>
                                          <input name="pass_new_confirm" placeholder="พิมพ์รหัสผ่านใหม่อีกครั้ง" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                        </div>



                                      </div>
                                      <br>
                                      <p>ที่อยู่</p>
                                      <div class="form-group-attached">
                                        <div class="form-group form-group-default required">
                                          <label>ที่อยู่</label>
                                          <input type="text" class="form-control" name="address" placeholder="โปรดระบุบที่อยู่ปัจจุบันของคุณ" value="<?php echo @$data->address; ?>">
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
                                        <div class="col-sm-9">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label for="province">จังหวัด</label>
                                              <select id="province" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" name="province">
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
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default required">
                                              <label>รหัสไปรษณีย์</label>
                                              <input name="zipcode" type="text" class="form-control" value="<?php echo @$data->zipcode; ?>" >
                                            </div>
                                          </div>
                                        </div>


                                        <br>
                                       
                                        <p>เกี่ยวกับงาน</p>
                                        <div class="form-group-attached">
                                          <div class="row clearfix">
                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default">
                                                <label>อาชีพ</label>
                                                <input type="text" class="form-control" name="job" value="<?php echo @$data->job; ?>">
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
                                                  <label>เว็บไซต์</label>
                                                  <input type="text" id="website" name="website" class="form-control" value="<?php echo @$data->website; ?>">
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

                                       <?php if ($this->session->userdata('sesUserType') == 3){ ?>
                                        <h5>คุณเป็น ตัวแทนองค์กร หรือ บริษัท?</h5>
                                        <br>
                                        <?php 
                                            $status1 = 'checked';
                                            $status2 = '';
                                            if (!empty($data->company_name)){ 
                                              $status2 = 'checked';
                                              $status1 = '';
                                        }?>
                                        <div class="radio radio-default">
                                          <input type="radio" value="0" name="radio1" id="radio1Yes" <?php echo $status1; ?>>
                                          <label for="radio1Yes">ไม่ใช่</label>
                                          <input type="radio" value="1" name="radio1" id="radio1No" <?php echo $status2; ?>>
                                          <label for="radio1No">ใช่ฉันเป็นตัวแทนองค์กรหรือบริษัท</label>
                                        </div>
                                        <br><br>
                                        <p>เกี่ยวกับองค์กร/บริษัท</p>

                                        <div class="form-group-attached">
                                          <div class="row clearfix">
                                            <div class="col-sm">
                                              <div class="form-group form-group-default">
                                                <label>ชื่อบริษัท/องค์กร</label>
                                                <input type="text" name="company_name" id="company_name " class="form-control" value="<?php echo @$data->company_name;?>" >
                                              </div>
                                            </div>
                                            <div class="form-group form-group-default required">
                                              <label>ที่อยู่</label>
                                              <input type="text" name="company_address" id="company_address " class="form-control" placeholder="โปรดระบุบที่อยู่ขององค์กรหรือบริษัท" value="<?php echo @$data->company_address;?>">
                                            </div>
                                          </div>

                                          <div class="row clearfix">
                                          <div class="col-sm-6">
                                              <div class="form-group form-group-default required">
                                                <label>ตำบล/แขวง</label>
                                                <input type="text" name="company_subdistrict" id="company_subdistrict" class="form-control" placeholder="ระบุแขวงหรือตำบลของคุณ" value="<?php echo @$data->company_subdistrict;?>" >
                                              </div>
                                            </div>

                                            <div class="col-sm-6">
                                              <div class="form-group form-group-default required">
                                                <label>เขต/อำเภอ</label>
                                                <input type="text" name="company_district" id="company_district" class="form-control" value="<?php echo @$data->company_district;?>">

                                              </div>
                                            </div>
                                          </div>
                                          <div class="row clearfix">

                                          <div class="col-sm-9">
                                              <div class="form-group form-group-default required form-group-default-selectFx">
                                                <label for="company_province">จังหวัด</label>
                                                <select style="margin-top:20px;"   name="company_province" id="company_province " class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2">
                                                  <option value="" selected disable>เลือก</option>
                                                  <?php 
                                                   foreach ($province as $key => $value) { ?>
                                                    <?php 
                                                      $select = ''; 
                                                      if(@$data->company_province == $value->code ){
                                                          $select =  'selected';
                                                      } ?>
                                                    <option <?php echo $select; ?> value="<?php echo $value->code;?>"><?php echo $value->name_th;?></option>
                                                  <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="col-sm-3">
                                              <div class="form-group form-group-default required">
                                                <label>รหัสไปรษณีย์</label>
                                                <input type="text" name="company_zipcode" id="company_zipcode" class="form-control" value="<?php echo @$data->company_zipcode;?>">
                                              </div>
                                            </div>
                                          </div>



                                        </div>

                                        <?php } ?> 

                                        
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

