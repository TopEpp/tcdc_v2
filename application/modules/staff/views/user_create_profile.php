<!-- START PAGE CONTENT -->
<div class="content ">
    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax">
      <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
          <!-- START BREADCRUMB -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('staff')?>">หน้าแรก</a></li>
            <li class="breadcrumb-item "><a href="<?php echo base_url('staff/user_manage')?>">ผู้ใช้งาน</a></li>
            <li class="breadcrumb-item active">สร้างผู้จัดการ</li>
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
                  <?php $attributes = array('name' => 'frmEditProfile', 'id' => 'form-edit-profile');
                                        $lang = $this->uri->segment(1);
                                        $id = $this->uri->segment(4);
                                        echo form_open_multipart($lang.'/staff/createProfileSave'.'/'.$id, $attributes); 
                                    ?>
                  <div class="row row-same-height">
                    <div class="col-md-6 b-r b-dashed b-grey sm-b-b">
                      <div class="padding-10 sm-padding-5 sm-m-t-15 ">
                        <h2>สร้างผู้จัดการ</h2>
                        <p>ประเภทบัญชี </p>
                        <label><input type="radio" name="user_type" value="2" checked="checked"> Program Manager</label> <br>
                        <label><input type="radio" name="user_type" value="4"> Editor</label>
                        </div>
                        <div class="row">
                                <div class="card-block">
                                  <div >
                                    
                                      <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />
                                      <input type="hidden"  id="user_active" name="user_active" value="" />
                                      <p>ข้อมูลบุคคล</p>
                                      <div class="form-group-attached">
                                        <div class="row clearfix">
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default required form-group-default-selectFx">
                                              <label>คำนำหน้า</label>
                                              <select style="width:100%" name="prename" id="prename"  class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                               
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
                                            <input name="email" placeholder="" type="text" class="form-control" value="<?php echo @$data->email;?>">
                                          
                                        </div>
                                        <br>
                                        <div class="form-group form-group-default has-error">
                                          <label class="">รหัสผ่าน</label>
                                          <input name="password" placeholder="" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                        </div>
                                        <br>
                                        <div class="form-group form-group-default has-error">
                                          <label class="">ยืนยันรหัสผ่าน</label>
                                          <input name="pass_new_confirm" placeholder="" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                        </div>



                                      </div>
                                    </div>
                                  </div>
                                </div>

                      </div>
                      <div class="col-md-6">
                            <div >

                              
                              <div class="row">
                                <div class="card-block">
                                  <div class="padding-10 sm-padding-5" style="margin-top: 130px;">
                                    
                                      <br>
                                      <p>ที่อยู่</p>
                                      <div class="form-group-attached">
                                      <div class="row clearfix">
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default required">
                                              <label>เลขที่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                              <input type="text" name="address" class="form-control" placeholder="" value="<?php echo @$data->address; ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default ">
                                              <label>หมู่</label><span class="text-danger"><?php echo form_error('village'); ?></span>
                                              <input type="text" name="village" class="form-control" placeholder="" value="<?php echo @$data->village; ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default ">
                                              <label>ซอย</label><span class="text-danger"><?php echo form_error('lane'); ?></span>
                                              <input type="text" name="lane" class="form-control" placeholder="" value="<?php echo @$data->lane; ?>">
                                            </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group form-group-default ">
                                              <label>ถนน</label><span class="text-danger"><?php echo form_error('Road'); ?></span>
                                              <input type="text" name="road" class="form-control" placeholder="" value="<?php echo @$data->road; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                              <label>ตำบล</label>
                                              <input  name="subdistrict" type="text" class="form-control" placeholder="" value="<?php echo @$data->subdistrict; ?>">
                                            </div>
                                          </div>
                                          
                                          <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                              <label>อำเภอ/เขต</label>
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

