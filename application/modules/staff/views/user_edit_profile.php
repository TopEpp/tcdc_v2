<!-- START PAGE CONTENT -->
<div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">

                <?php if ($this->session->userdata('sesUserType') != '3') {?>
                  <li class="breadcrumb-item"><a href="<?PHP echo base_url('staff') ?>">หน้าแรก</a></li>
                  <li class="breadcrumb-item "><a href="<?php echo base_url('staff/user_manage') ?>">ผู้ใช้งาน</a></li>
                <?php } else {?>
                  <li class="breadcrumb-item"><a href="<?PHP echo base_url('member') ?>">หน้าแรก</a></li>
                <?php }?>

                <li class="breadcrumb-item active"><?php echo (empty($data)) ? 'สร้าง' : 'แก้ไข'; ?>บัญชีผู้ใช้งาน</li>
              </ol>
              <!-- END BREADCRUMB -->
            </div>
          </div>
        </div>
        <!-- END JUMBOTRON -->


          <!-- START CONTAINER FLUID -->
          <div class=" container-fluid   container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->

              <!-- show validate error -->
            <!-- status edit -->
            <?php

$msg = $this->session->flashdata('msg');
if (!empty($msg)) {?>
                <input type="hidden" id="msg" value='<?php echo $msg; ?>'>
             <?php } else {?>
              <input type="hidden" id="msg" value ="">
           <?php }

if ($this->session->flashdata('msg')) {
    // echo $this->session->flashdata('msg');
    $this->session->unset_userdata('msg');
}
if ($this->session->flashdata('error')) {
    echo $this->session->flashdata('error');
    $this->session->unset_userdata('error');
}?>

            ?>
            <div class=" container-fluid   container-fixed-lg">
              <div id="edit_profile-form" class="m-t-50">
              <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                  <li class="nav-item">
                    <a class="active" data-toggle="tab" href="#tab1" role="tab"><i class="pg-outdent tab-icon"></i> <span>แก้ไขข้อมูลผู้ใช้งาน</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="" data-toggle="tab" href="#tab2" role="tab"><i class="fa fa-hospital-o tab-icon"></i> <span>แก้ไขบัญชี</span></a>
                  </li>

                </ul>

                <div class="tab-content">
                  <div class="tab-pane padding-20 sm-no-padding active slide-left" id="tab1">
                      <!-- Tab panes -->
                      <div class="row row-same-height">

                          <!-- START card -->
                          <div class="card card-default">

                            <div class="">
                              <!-- REMOVE THIS WRAPPER IF .scrollable IS NOT USED -->
                              <div style="max-height:auto">

                                <div class="row row-same-height">
                                    <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                                      <div class="padding-15 sm-padding-5 sm-m-t-15 m-t-50">

                                        <!-- <h2><?php echo (empty($data)) ? 'สร้าง' : 'แก้ไข'; ?>บัญชีผู้ใช้งาน</h2> -->
                                        <!-- <p style="font-family: 'dbch'">โปรดรักษาความปลอดภัยผู้ใช้งาน ห้ามเผยแพร่และไม่เปิดเผยข้อมูลผู้ใช้งาน</p> -->
                                        <br/>
                                          <div class="row">
                                            <div class="col-sm-4">
                                              <div class="profile-img-wrapper2 m-t-5 inline">
                                                <?php if (!empty($data->profile_img)) {?>
                                                  <img src="<?php echo base_url($data->profile_img); ?>" width="100" hight="100">
                                                <?php } else {?>
                                                  <img src="<?php echo base_url('assets/img/profiles/avatar_small2x.jpg'); ?>" alt="" data-src="<?php echo base_url('assets/img/profiles/avatar_small2x.jpg'); ?>" data-src-retina="<?php echo base_url('assets/img/profiles/avatar_small2x.jpg'); ?>" width="100" height="100">
                                                <?php }?>
                                                <!-- <?php echo cl_image_tag(@$data->profile_img, array("alt" => "", "width" => 70, "height" => 70)); ?> -->

                                              </div>
                                            </div>
                                            <div class="col-sm-8">
                                              <p class="m-t-5">ชื่อ-นามสกุล: <?php echo @$data->firstname . ' ' . @$data->lastname; ?> </p>
                                              <p class="m-t-5">อีเมล: <?php echo @$data->email; ?> </p>
                                              <?php $type = [1 => 'Admin', 2 => 'Program Manager', 3 => 'Member', 4 => 'Editor'];?>
                                              <p class="m-t-5">ประเภทบัญชี: <?php echo @$type[@$data->user_type]; ?> </p>

                                            </div>

                                          </div>


                                          <br>
                                      </div>

                                    </div>
                                    <div class="col-md-7">
                                      <div class="padding-10 sm-padding-5">


                                        <div class="row">
                                          <div class="card-block">
                                            <div class="">
                                              <?php $attributes = array('name' => 'frmEditProfile', 'id' => 'form-edit-profile');
                                                $lang = $this->uri->segment(1);
                                                $id = $this->uri->segment(4);
                                                echo form_open_multipart($lang . '/staff/editProfileSave' . '/' . $id, $attributes);
                                                ?>
                                                <input type="hidden" name="redirect" value="<?php echo current_url(); ?>" />

                                                <p>ข้อมูลบุคคล</p>
                                                <div class="form-group-attached">

                                                  <!-- <div class="row clearfix">
                                                    <div class="col-sm-12">
                                                      <div class="form-group form-group-default required">
                                                        <label>เลขบัตรประชาชน</label>
                                                        <input type="text" name="id_number" class="form-control" value="<?php echo @$data->id_number; ?>">
                                                      </div>
                                                    </div>
                                                  </div> -->

                                                  <div class="row clearfix">
                                                    <div class="col-sm-3">
                                                      <div class="form-group form-group-default required form-group-default-selectFx">
                                                        <label>คำนำหน้า</label>
                                                        <select style="width:100%" name="prename" id="prename"  class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">

                                                          <option  <?php echo (@$data->prename == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                          <option  <?php echo (@$data->prename == 1) ? 'selected' : ''; ?> value="1">นาย</option>
                                                          <option  <?php echo (@$data->prename == 2) ? 'selected' : ''; ?> value="2">นาง</option>
                                                          <option  <?php echo (@$data->prename == 3) ? 'selected' : ''; ?> value="3">นางสาว</option>
                                                          <option  <?php echo (@$data->prename == 4) ? 'selected' : ''; ?> value="4">ไม่ระบุ</option>
                                                        </select>

                                                      </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                      <div class="form-group form-group-default required">
                                                        <label>ชื่อ</label>
                                                        <input type="text" name="firstname" class="form-control" value="<?php echo @$data->firstname; ?>" >
                                                      </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                      <div class="form-group form-group-default required">
                                                        <label>นามสกุล</label>
                                                        <input type="text" name="lastname" class="form-control" value="<?php echo @$data->lastname; ?>">
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="form-group-attached" id="prename_detail" style="display:none;">
                                                    <div class="row clearfix">
                                                      <div class="col-sm-3">
                                                        <div class="form-group form-group-default ">
                                                          <label>โปรดระบุ</label>
                                                          <input  type="text" name="prename_detail" class="form-control" value="<?php echo @$data->prename_detail; ?>">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>


                                                </div>
                                                <br>

                                                <div class="form-group-attached">
                                                    <div class="row clearfix">
                                                      <div class="col-sm-3">
                                                        <div class="form-group form-group-default required">
                                                          <label>เลขที่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                                          <input type="text" name="address" class="form-control" placeholder="ระบุบ้านเลขที่" value="<?php echo @$data->address; ?>">
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
                                                        <label>ตำบล/แขวง</label>
                                                        <input  name="subdistrict" type="text" class="form-control" placeholder="" value="<?php echo @$data->subdistrict; ?>">
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
                                                          <?php foreach ($countries as $key => $value) {?>
                                                            <?php
$select = '';
    if (!empty(@$data->country)) {
        if (@$data->country == $value->id) {
            $select = 'selected="selected"';
        }
    } else {
        if ('Thailand' == $value->name) {
            $select = 'selected="selected"';
        }
    }

    ?>
                                                            <option <?php echo $select; ?>  value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                          <?php }?>

                                                        </select>
                                                      </div>
                                                    </div>
                                                  <div class="col-sm-4">
                                                      <div class="form-group form-group-default required form-group-default-selectFx">
                                                        <label for="province">จังหวัด</label>
                                                        <select style="width:100%" id="province" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" name="province">
                                                          <option  value="" >เลือก</option>
                                                          <?php foreach ($province as $key => $value) {?>
                                                            <?php
$select = '';
    if (@$data->province == $value->code) {
        $select = "selected='selected'";
    }?>
                                                            <option <?php echo $select; ?>  value="<?php echo $value->code; ?>"><?php echo $value->name_th; ?></option>
                                                          <?php }?>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                      <div class="form-group form-group-default required">
                                                        <label>รหัสไปรษณีย์</label>
                                                        <?php
$zipcode = '';
if (@$data->zipcode) {
    $zipcode = $data->zipcode;
}?>
                                                        <input name="zipcode" type="text" class="form-control" value="<?php echo @$zipcode; ?>" >
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
if (@$data->phone) {
    $phone = $data->phone;
}?>

                                                          <input type="text" id="phone" name="phone" class="form-control" value="<?php echo @$phone; ?>">
                                                        </div>
                                                      </div>

                                                      <!-- <div class="col-sm-6">
                                                          <div class="form-group form-group-default">
                                                            <label>ไลน์ไอดี</label>
                                                            <input type="text" class="form-control" name="lineid" value="<?php echo @$data->lineid; ?>">
                                                          </div>
                                                        </div> -->

                                                    </div>

                                                  </div>

                                                  <br>
                                                  <p></p>
                                                    <div class="col-sm-12">
                                                      <p>ภาพโปรไฟล์</p>
                                                      <!-- <form  class="dropzone" id="form-regis-upload"> -->
                                                        <div class="fallback">
                                                          <input name="profile_img" type="file" size='20' />
                                                        </div>
                                                        <p style="color:red">หมายเหตุ ไฟล์ .jpg .png ขนาดไม่เกิน 2 MB</p>
                                                      <!-- </form> -->
                                                    </div>
                                                  <br>

                                                  <!--  status group -->
                                                  <div id="commany">

                                                    <!-- <p>เกี่ยวกับงาน</p>
                                                      <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                          <div class="form-group form-group-default  form-group-default-selectFx  required">
                                                            <label>สถานะ</label>
                                                            <select style="width:100%" name="job" id="job" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                              <option  <?php echo (@$data->job == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                              <?php foreach ($status as $key => $value) {?>
                                                                <option data-group="<?php echo $value->status_group; ?>" <?php echo (@$data->job == $value->status_id) ? 'selected' : ''; ?> value="<?php echo $value->status_id; ?>"><?php echo $value->status_name; ?></option>
                                                              <?php }?>
                                                            </select>
                                                          </div>
                                                        </div>
                                                      </div> -->
                                                      <!-- <div class="row clearfix" id="job_detail" <?php echo (@$data->job_detail && @$data->job == 11) ? "" : "style='display:none;'" ?>>
                                                        <div class="col-sm-12">
                                                          <div class="form-group form-group-default ">
                                                            <input type="text" name="job_detail" placeholder="ระบุอาชีพของคุณ" class="form-control" value="<?php echo @$data->job_detail; ?>">
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

                                                                <option  <?php echo (@$data->job_type == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->job_type == 1) ? 'selected' : ''; ?> value="1">งานฝีมือและหัตถกรรม</option>
                                                                <option  <?php echo (@$data->job_type == 2) ? 'selected' : ''; ?> value="2">ศิลปการแสดง</option>
                                                                <option  <?php echo (@$data->job_type == 3) ? 'selected' : ''; ?> value="3">ทัศนศิลป์</option>
                                                                <option  <?php echo (@$data->job_type == 4) ? 'selected' : ''; ?> value="4">ดนตรี</option>
                                                                <option  <?php echo (@$data->job_type == 5) ? 'selected' : ''; ?> value="5">ภาพยนตร์และวิดีทัศน์</option>
                                                                <option  <?php echo (@$data->job_type == 6) ? 'selected' : ''; ?> value="6">การพิมพ์</option>
                                                                <option  <?php echo (@$data->job_type == 7) ? 'selected' : ''; ?> value="7">การกระจายเสียง</option>
                                                                <option  <?php echo (@$data->job_type == 8) ? 'selected' : ''; ?> value="8">ซอฟต์แวร์</option>
                                                                <option  <?php echo (@$data->job_type == 9) ? 'selected' : ''; ?> value="9">การโฆษณา</option>
                                                                <option  <?php echo (@$data->job_type == 10) ? 'selected' : ''; ?> value="10">การออกแบบ (รวมถึงแฟชั่น)</option>
                                                                <option  <?php echo (@$data->job_type == 11) ? 'selected' : ''; ?> value="11">สถาปัตยกรรม</option>
                                                                <option  <?php echo (@$data->job_type == 12) ? 'selected' : ''; ?> value="12">แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)</option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                          <div class="col-sm-12">
                                                            <div class="form-group form-group-default  form-group-default-selectFx">
                                                              <label>ประสบการณ์</label>
                                                              <select style="width:100%" name="company_service_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">

                                                                <option  <?php echo (@$data->company_service == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->company_service == 1) ? 'selected' : ''; ?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                                                                <option  <?php echo (@$data->company_service == 2) ? 'selected' : ''; ?> value="2">0 - 3 ปี</option>
                                                                <option  <?php echo (@$data->company_service == 3) ? 'selected' : ''; ?> value="3">3 - 10 ปี</option>
                                                                <option  <?php echo (@$data->company_service == 4) ? 'selected' : ''; ?> value="4">มากกว่า 10 ปี</option>


                                                              </select>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                          <div class="col-sm-6">
                                                            <div class="form-group form-group-default  form-group-default-selectFx">
                                                              <label>ลูกค้าของคุณคือกลุ่มใด</label>
                                                              <select style="width:100%" name="company_custom_group" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                                <option  <?php echo (@$data->company_custom_group == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->company_custom_group == 1) ? 'selected' : ''; ?> value="1">ลูกค้าในประเทศ</option>
                                                                <option  <?php echo (@$data->company_custom_group == 2) ? 'selected' : ''; ?> value="2">ลูกค้าต่างประเทศ </option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                          <div class="col-sm-6">
                                                            <div class="form-group form-group-default  form-group-default-selectFx">
                                                              <label>ลักษณะการทำงานของธุรกิจ </label>
                                                              <select style="width:100%" name="company_business_look_one" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                                <option  <?php echo (@$data->company_business_look == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->company_business_look == 1) ? 'selected' : ''; ?> value="1">รับจ้างผลิต </option>
                                                                <option  <?php echo (@$data->company_business_look == 2) ? 'selected' : ''; ?> value="2">รับจัดจำหน่าย</option>
                                                                <option  <?php echo (@$data->company_business_look == 3) ? 'selected' : ''; ?> value="3">ผลิตและจัดจำหน่ายภายใต้แบรนด์ตนเอง </option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                          <div class="col-sm-6">
                                                            <div class="form-group form-group-default  ">
                                                              <label>จำนวนพนักงาน (คน) </label>
                                                              <input type="text" name="company_people" class="form-control" placeholder="" value="<?php echo @$data->company_people; ?>">
                                                            </div>
                                                          </div>
                                                          <div class="col-sm-6">
                                                            <div class="form-group form-group-default ">
                                                              <label>เลขทะเบียนนิติบุคคล </label>
                                                              <input type="text" name="company_num_regis" class="form-control" placeholder="" value="<?php echo @$data->company_num_regis; ?>">
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

                                                                <option  <?php echo (@$data->job_type == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->job_type == 1) ? 'selected' : ''; ?> value="1">งานฝีมือและหัตถกรรม</option>
                                                                <option  <?php echo (@$data->job_type == 2) ? 'selected' : ''; ?> value="2">ศิลปการแสดง</option>
                                                                <option  <?php echo (@$data->job_type == 3) ? 'selected' : ''; ?> value="3">ทัศนศิลป์</option>
                                                                <option  <?php echo (@$data->job_type == 4) ? 'selected' : ''; ?> value="4">ดนตรี</option>
                                                                <option  <?php echo (@$data->job_type == 5) ? 'selected' : ''; ?> value="5">ภาพยนตร์และวิดีทัศน์</option>
                                                                <option  <?php echo (@$data->job_type == 6) ? 'selected' : ''; ?> value="6">การพิมพ์</option>
                                                                <option  <?php echo (@$data->job_type == 7) ? 'selected' : ''; ?> value="7">การกระจายเสียง</option>
                                                                <option  <?php echo (@$data->job_type == 8) ? 'selected' : ''; ?> value="8">ซอฟต์แวร์</option>
                                                                <option  <?php echo (@$data->job_type == 9) ? 'selected' : ''; ?> value="9">การโฆษณา</option>
                                                                <option  <?php echo (@$data->job_type == 10) ? 'selected' : ''; ?> value="10">การออกแบบ (รวมถึงแฟชั่น)</option>
                                                                <option  <?php echo (@$data->job_type == 11) ? 'selected' : ''; ?> value="11">สถาปัตยกรรม</option>
                                                                <option  <?php echo (@$data->job_type == 12) ? 'selected' : ''; ?> value="12">แฟชั่น (การผลิตเครื่องแต่งกายสำเร็จรูป)</option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                          <div class="col-sm-12">
                                                            <div class="form-group form-group-default  form-group-default-selectFx">
                                                              <label>ประสบการณ์</label>
                                                              <select style="width:100%" name="company_service_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">

                                                                <option  <?php echo (@$data->company_service == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->company_service == 1) ? 'selected' : ''; ?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                                                                <option  <?php echo (@$data->company_service == 2) ? 'selected' : ''; ?> value="2">0 - 3 ปี</option>
                                                                <option  <?php echo (@$data->company_service == 3) ? 'selected' : ''; ?> value="3">3 - 10 ปี</option>
                                                                <option  <?php echo (@$data->company_service == 4) ? 'selected' : ''; ?> value="4">มากกว่า 10 ปี</option>


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
                                                                  <option  <?php echo (@$data->company_work_look == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                  <option  <?php echo (@$data->company_work_look == 1) ? 'selected' : ''; ?> value="1">รับจ้างออกแบบอิสระ</option>
                                                                  <option  <?php echo (@$data->company_work_look == 2) ? 'selected' : ''; ?> value="2">ทำงานออกแบบอยู่ในบริษัทหรือแบรนด์</option>
                                                                  <option  <?php echo (@$data->company_work_look == 3) ? 'selected' : ''; ?> value="3">ออกแบบ ผลิตและจำหน่ายเอง</option>
                                                                </select>
                                                              </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                              <div class="form-group form-group-default  form-group-default-selectFx">
                                                                <label>ลักษณะการทำงานของธุรกิจ </label>
                                                                <select style="width:100%" name="company_business_look_two" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                                  <option  <?php echo (@$data->company_business_look == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                  <option  <?php echo (@$data->company_business_look == 1) ? 'selected' : ''; ?> value="1">รับจ้างผลิต </option>
                                                                  <option  <?php echo (@$data->company_business_look == 2) ? 'selected' : ''; ?> value="2">รับจัดจำหน่าย</option>
                                                                  <option  <?php echo (@$data->company_business_look == 3) ? 'selected' : ''; ?> value="3">ผลิตและจัดจำหน่ายภายใต้แบรนด์ตนเอง </option>
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
                                                                <option  <?php echo (@$data->company_sell_way == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->company_sell_way == 1) ? 'selected' : ''; ?> value="1">ออนไลน์ </option>
                                                                <option  <?php echo (@$data->company_sell_way == 2) ? 'selected' : ''; ?> value="2">ออฟไลน์</option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                          <div class="col-sm-12">
                                                            <div class="form-group form-group-default form-group-default-selectFx ">
                                                              <label>ผลงานสามารถผลิตในจำนวนมากได้หรือไม่  </label>
                                                              <select style="width:100%" name="company_product_build" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                                <option  <?php echo (@$data->company_product_build == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->company_product_build == 1) ? 'selected' : ''; ?> value="1">ได้ </option>
                                                                <option  <?php echo (@$data->company_product_build == 2) ? 'selected' : ''; ?> value="2">ไม่ได้</option>
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
                                                                  <option  <?php echo (@$data->company_group_product == 1) ? 'selected' : ''; ?> value="1">งานไม้</option>
                                                                  <option  <?php echo (@$data->company_group_product == 2) ? 'selected' : ''; ?> value="2">งานทอผ้า/ย้อม</option>
                                                                  <option  <?php echo (@$data->company_group_product == 3) ? 'selected' : ''; ?> value="3">งานปั้น</option>
                                                                  <option  <?php echo (@$data->company_group_product == 4) ? 'selected' : ''; ?> value="4">งานจักรสาน</option>
                                                                  <option  <?php echo (@$data->company_group_product == 5) ? 'selected' : ''; ?> value="5">งานเพ้นท์</option>
                                                                  <option  <?php echo (@$data->company_group_product == 6) ? 'selected' : ''; ?> value="6">งานเครื่องเงิน</option>
                                                                  <option  <?php echo (@$data->company_group_product == 7) ? 'selected' : ''; ?> value="7">อื่นๆ โปรดระบุ</option>

                                                                </select>

                                                              </div>
                                                              <div class="row" id="company_group_product_detail" style="display:none;">
                                                                  <div class="form-group form-group-default ">
                                                                    <input type="text" name="company_group_product_detail" class="form-control" placeholder="ระบุ" value="<?php echo @$data->company_group_product_detail; ?>">
                                                                  </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                              <div class="form-group form-group-default  form-group-default-selectFx">
                                                                <label>ประสบการณ์</label>
                                                                <select style="width:100%" name="company_service_three" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">

                                                                  <option  <?php echo (@$data->company_service == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                  <option  <?php echo (@$data->company_service == 1) ? 'selected' : ''; ?> value="1">กำลังพัฒนาและทดลองต้นแบบ</option>
                                                                  <option  <?php echo (@$data->company_service == 2) ? 'selected' : ''; ?> value="2">0 - 3 ปี</option>
                                                                  <option  <?php echo (@$data->company_service == 3) ? 'selected' : ''; ?> value="3">3 - 10 ปี</option>
                                                                  <option  <?php echo (@$data->company_service == 4) ? 'selected' : ''; ?> value="4">มากกว่า 10 ปี</option>


                                                                </select>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row ">
                                                          <div class="col-sm-12">
                                                            <div class="form-group ">
                                                              <label>โปรดระบุเทคนิคหรือความเชี่ยวชาญที่ใช้ทำงาน </label>
                                                              <input type="text" name="company_technic[]" class="form-control" placeholder="1." value="<?php echo ''; ?>">
                                                              <input type="text" name="company_technic[]" class="form-control" placeholder="2." value="<?php echo ''; ?>">
                                                              <input type="text" name="company_technic[]" class="form-control" placeholder="3." value="<?php echo ''; ?>">
                                                            </div>
                                                          </div>

                                                        </div>
                                                        <div class="row" >
                                                          <div class="col-sm-12">
                                                            <div class="form-group form-group-default  form-group-default-selectFx">
                                                              <label> การผลิตสินค้าหรือผลงานของคุณเป็นรูปแบบใด</label>
                                                              <select style="width:100%" name="company_product_detail" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                                <option  <?php echo (@$data->company_product_detail == '') ? 'selected' : ''; ?> value="" >เลือก</option>
                                                                <option  <?php echo (@$data->company_product_detail == 1) ? 'selected' : ''; ?> value="1">แบบศิลปวัฒนธรรมดั้งเดิม </option>
                                                                <option  <?php echo (@$data->company_product_detail == 2) ? 'selected' : ''; ?> value="2">แบบตามไอเดียที่คิดขึ้นใหม่</option>
                                                              </select>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row" >
                                                          <div class="col-sm-12">
                                                            <div class="form-group form-group-default  ">
                                                              <label>คุณสามารถผลิตได้จำนวน (ชิ้น/ต่อเดือน) </label>
                                                              <input type="text" name="company_num_product" class="form-control" placeholder="" value="<?php echo @$data->company_num_product; ?>">
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
                                                                <option  <?php echo (@$data->company_department == '') ? 'selected' : ''; ?> value="">เลือก</option>
                                                                  <option  <?php echo (@$data->company_department == 1) ? 'selected' : ''; ?> value="1">สถานบันการศึกษา</option>
                                                                  <option  <?php echo (@$data->company_department == 2) ? 'selected' : ''; ?> value="2">องค์กรระหว่างประเทศ </option>
                                                                  <option  <?php echo (@$data->company_department == 3) ? 'selected' : ''; ?> value="3">หน่วยงานภาครัฐ</option>
                                                                  <option  <?php echo (@$data->company_department == 4) ? 'selected' : ''; ?> value="4">สถาบันและพิพิธภัณฑ์</option>
                                                                  <option  <?php echo (@$data->company_department == 5) ? 'selected' : ''; ?> value="5">สื่อมวลชน</option>
                                                                  <option  <?php echo (@$data->company_department == 6) ? 'selected' : ''; ?> value="6">สมาคม</option>
                                                                  <option  <?php echo (@$data->company_department == 7) ? 'selected' : ''; ?> value="7">วัดและชุมชน</option>
                                                                  <option  <?php echo (@$data->company_department == 8) ? 'selected' : ''; ?> value="8">อื่นๆ</option>
                                                                </select>
                                                              </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                              <div class="form-group form-group-default  form-group-default-selectFx">
                                                                <label>หน้าที่หลักขององค์กร</label>
                                                                <select style="width:100%" name="company_duty" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">
                                                                  <option  <?php echo (@$data->company_duty == '') ? 'selected' : ''; ?> value="">เลือก</option>
                                                                  <option  <?php echo (@$data->company_duty == 1) ? 'selected' : ''; ?> value="1">ส่งเสริมความคิดสร้างสรรค์ และการออกแบบ </option>
                                                                  <option  <?php echo (@$data->company_duty == 2) ? 'selected' : ''; ?> value="2">ส่งเสริมศิลปวัฒนธรรม </option>
                                                                  <option  <?php echo (@$data->company_duty == 3) ? 'selected' : ''; ?> value="3">ส่งเสริมความรับผิดชอบต่อสังคม</option>
                                                                  <option  <?php echo (@$data->company_duty == 4) ? 'selected' : ''; ?> value="4">ส่งเสริมการค้าและธุรกิจ</option>
                                                                  <option  <?php echo (@$data->company_duty == 5) ? 'selected' : ''; ?> value="5">ส่งเสริมวิชาชีพ</option>
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
                                                                  <input  <?php echo (@$data->company_join_work == 1) ? 'checked' : ''; ?>  type="checkbox"  value="1" name="company_join_work" id="target_type3">
                                                                  <label for="target_type3">เคย</label>
                                                                </span>
                                                                <span class="checkbox check-success">
                                                                  <input  <?php echo (@$data->company_join_work == 0) ? 'checked' : ''; ?>  type="checkbox"  value="0" name="company_join_work" id="target_type4">
                                                                  <label for="target_type4">ไม่เคย</label>
                                                                </span>
                                                            </div>
                                                          </div>

                                                        </div>
                                                      </div>
                                                  </div>
                                                      <!-- end status group -->


                                                  <br>

                                                <?php if ($this->session->userdata('sesUserType') == 3) {?>

                                                  <!-- <div class="form-group-attached" >
                                                    <p>เกี่ยวกับองค์กร/บริษัท/หน่วยงาน</p> -->

                                                    <!-- <div class="form-group-attached">
                                                      <div class="row clearfix">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                              <label>ชื่อแบรนด์</label>
                                                              <input type="text" class="form-control" name="brand" value="<?php echo @$data->brand; ?>" >
                                                            </div>
                                                          </div>

                                                        <div class="col-sm-6">
                                                          <div class="form-group form-group-default">
                                                            <label>เว็บไซต์</label>
                                                            <input type="text" id="website" name="website" class="form-control" value="<?php echo @$data->website; ?>">
                                                          </div>
                                                        </div>

                                                      </div>

                                                      <div class="form-group-attached">
                                                        <div class="row clearfix">


                                                          <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                              <label>เฟสบุ๊ค แฟนเพจ</label>
                                                              <input type="text" class="form-control" name="facebook" value="<?php echo @$data->facebook; ?>">
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                      <div class="col-sm">
                                                        <div class="form-group form-group-default">
                                                          <label>ชื่อบริษัท/องค์กร</label>
                                                          <input type="text" name="company_name" id="company_name " class="form-control" value="<?php echo @$data->company_name; ?>" >
                                                        </div>
                                                      </div>

                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-sm-3">
                                                          <div class="form-group form-group-default required">
                                                            <label>เลขที่</label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                                            <input type="text" name="company_address" class="form-control" placeholder="" value="<?php echo @$data->company_address; ?>">
                                                          </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                          <div class="form-group form-group-default required">
                                                            <label>หมู่</label><span class="text-danger"><?php echo form_error('village'); ?></span>
                                                            <input type="text" name="company_village" class="form-control" placeholder="" value="<?php echo @$data->company_village; ?>">
                                                          </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                          <div class="form-group form-group-default ">
                                                            <label>ซอย</label><span class="text-danger"><?php echo form_error('lane'); ?></span>
                                                            <input type="text" name="company_lane" class="form-control" placeholder="" value="<?php echo @$data->company_lane; ?>">
                                                          </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                          <div class="form-group form-group-default ">
                                                            <label>ถนน</label><span class="text-danger"><?php echo form_error('Road'); ?></span>
                                                            <input type="text" name="company_road" class="form-control" placeholder="" value="<?php echo @$data->company_road; ?>">
                                                          </div>
                                                        </div>
                                                      </div>

                                                    <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default required">
                                                          <label>ตำบล/แขวง</label>
                                                          <input type="text" name="company_subdistrict" id="company_subdistrict" class="form-control" placeholder="" value="<?php echo @$data->company_subdistrict; ?>" >
                                                        </div>
                                                      </div>

                                                      <div class="col-sm-6">
                                                        <div class="form-group form-group-default required">
                                                          <label>เขต/อำเภอ</label>
                                                          <input type="text" name="company_district" id="company_district" placeholder="" class="form-control" value="<?php echo @$data->company_district; ?>">

                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-sm-4">
                                                          <div class="form-group form-group-default required form-group-default-selectFx "><!--form-group-default-selectFx-->
                                                            <!-- <label>ประเทศ</label><span class="text-danger" style="text-align:center;"><?php echo form_error('company_country'); ?></span>
                                                            <select style="width:100%" name="company_country" id="company_country" class=" form-control" data-init-plugin="select2"  >
                                                              <option value="">เลือก</option>
                                                              <?php foreach ($countries as $key => $value) {?>
                                                                <?php
$select = '';
    if (!empty(@$data->company_country)) {
        if (@$data->company_country == $value->id) {
            $select = 'selected="selected"';
        }
    } else {
        if ('Thailand' == $value->name) {
            $select = 'selected="selected"';
        }
    }

    ?>
                                                                <option <?php echo $select; ?>  value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                              <?php }?>

                                                            </select>
                                                          </div>
                                                        </div> -->

                                                    <!-- <div class="col-sm-4">
                                                        <div class="form-group form-group-default required form-group-default-selectFx">
                                                          <label for="company_province">จังหวัด</label>
                                                          <select style=" width:100;"   name="company_province" id="company_province " class="cs-select cs-skin-slide cs-transparent form-control " data-init-plugin="select2">
                                                            <option value="" selected disable>เลือก</option>
                                                            <?php
foreach ($province as $key => $value) {?>
                                                              <?php
$select = '';
    if (@$data->company_province == $value->code) {
        $select = 'selected';
    }?>
                                                              <option <?php echo $select; ?> value="<?php echo $value->code; ?>"><?php echo $value->name_th; ?></option>
                                                            <?php }?>
                                                          </select>
                                                        </div>
                                                      </div>
                                                      <div class="col-sm-4">
                                                        <div class="form-group form-group-default required">
                                                          <label>รหัสไปรษณีย์</label>
                                                          <input type="text" name="company_zipcode" id="company_zipcode"  class="form-control" value="<?php echo @$data->company_zipcode; ?>">
                                                        </div>
                                                      </div>
                                                    </div>  -->



                                                  <!-- </div> -->

                                                  <?php }?>


                                                </div>


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

                    <!-- end news crade -->

                  </div>
                  <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab2">
                      <!-- Tab panes -->
                      <div class="row row-same-height">

                          <!-- START card -->
                          <div class="card card-default">

                            <div class="">
                              <!-- REMOVE THIS WRAPPER IF .scrollable IS NOT USED -->
                              <div style="max-height:auto">
                                <div class="row row-same-height">
                                  <div class="col-md-5 b-r b-dashed b-grey sm-b-b">
                                    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">

                                      <!-- <h2>แก้ไขบัญชี</h2>
                                      <p>โปรดรักษาความปลอดภัยผู้ใช้งาน ห้ามเผยแพร่และไม่เปิดเผยข้อมูลผู้ใช้งาน</p>
       -->
                                        <!-- <br> -->
                                        <br >
                                        <!-- <h5>สถานะบัญชี</h5> -->
                                        <p>สถานะบัญชี : <?php echo ($data->user_active == 1) ? "ปกติ" : "<span style='color:red'>ไม่ปกติ</span>"; ?></p>
                                        <div class="row">
                                          <div class="col-sm-6">
                                          <h5 style="font-family: 'dbch';">เปลี่ยนสถานะบัญชี</h5>
                                          </div>
                                          <div class="col-sm-6 form-control " style="border: none;">
                                            <input type="hidden"  id="user_active" name="user_active" value="" />
                                            <input  type="checkbox" id="user-active"  class="user_active" <?php echo ($data->user_active == 1) ? "checked value='1'" : "value='0'"; ?> />
                                          </div>


                                        </div>

                                        <br><br>
                                        <!-- <p>สมัครเมื่อ : 15/05/2561</p>
                                        <p>เข้าใช้ครั้งล่าสุด : 25/05/2561</p> -->
                                        <?php if ($this->session->userdata('sesUserType') == 1) {?>
                                        <p>ประเภทบัญชี </p>
                                        <label><input type="radio" name="user_type" value="1" <?php echo ($data->user_type == 1) ? 'checked="checked"' : ''; ?> > Admin</label> <br>
                                        <label><input type="radio" name="user_type" value="2" <?php echo ($data->user_type == 2) ? 'checked="checked"' : ''; ?> > Program Manager</label> <br>
                                        <label><input type="radio" name="user_type" value="4" <?php echo ($data->user_type == 4) ? 'checked="checked"' : ''; ?>> Editor</label><br>
                                        <label><input type="radio" name="user_type" value="3" <?php echo ($data->user_type == 3) ? 'checked="checked"' : ''; ?>> User</label>
                                        <?php } else {?>
                                          <input type="hidden" name="user_type" value="<?php echo $data->user_type; ?>">
                                        <?php }?>
                                        <br>
                                      </div>

                                    </div>
                                    <div class="col-md-7">
                                      <div class="padding-30 sm-padding-5">

                                        <div class="row">
                                          <div class="card-block">
                                            <div class="">

                                                <p>ข้อมูลบัญชี</p>
                                                <div class="form-group-attached">
                                                  <div class="row clearfix">
                                                    <div class="col-sm-12">
                                                          <div class="form-group form-group-default required">
                                                            <label>อีเมล</label>
                                                            <input disabled name="email" type="text" class="form-control" value="<?php echo @$data->email; ?>">
                                                          </div>
                                                        </div>
                                                  </div>

                                                  <br>
                                                  <p>รหัสผ่าน</p>
                                                  <div class="form-group form-group-default has-error">
                                                    <label class="">รหัสผ่านเดิม</label>

                                                    <input name="password" placeholder="ใส่รหัสผ่านเดิม" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password" value="<?php //echo $this->encrypt->decode(@$data->password);?>">
                                                  </div>
                                                  <br>
                                                  <div class="form-group form-group-default has-error">
                                                    <label class="">รหัสผ่านใหม่</label>
                                                    <input name="pass_new" id="pass_new" placeholder="ตั้งรหัสผ่านอย่างน้อย 8 ตัวอักษร" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                                    <p style="color: red;font-size: 14px;  font-family: 'dbch';" id="errors"></p>
                                                  </div>
                                                  <br>
                                                  <div class="form-group form-group-default has-error">
                                                    <label class="">ยืนยันรหัสผ่านใหม่</label>
                                                    <input name="pass_new_confirm" placeholder="พิมพ์รหัสผ่านใหม่อีกครั้ง" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                                  </div>
                                                  <br>
                                                  <label style="color:red;font-size:16px"> ตั้งรหัสผ่านไม่น้อยกว่า 8 ตัวอักษร ประกอบด้วยตัวอักษร ตัวเลข และเครื่องหมาย </label>
                                                </div>
                                                <br>

                                              <?php echo form_close(); ?>

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

                    <!-- end news crade -->
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
                    <li class="previous" id="hide_back" style="display:none;">
                      <button class="btn btn-default btn-cons pull-right" type="button">
                        <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
                      </button>
                    </li>
                    <li class="previous_tmp" id ="previous_hide" style="display:none;">
                      <a  href="<?php echo base_url('member'); ?>"  class="btn btn-white btn-cons pull-right" type="button">
                        <span><i class="fa fa-angle-left "></i> ย้อนกลับ</span>
                      </a>
                    </li>
                  </ul>
                </div>

              </div>



              <!-- END PLACE PAGE CONTENT HERE -->
            </div>
            <!-- END CONTAINER FLUID -->

          <!-- END PAGE CONTENT -->
</div>


<!--js  validate form -->

   <!-- Modal -->
<div class="modal fade" id="Success" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content  bg-success-dark">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body " style="color: white;">
            <div id="flash_1"></div>
            <div id="flash_2"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default"  data-dismiss="modal" onclick="window.location.href='<?php echo base_url('staff/user_manage'); ?>';">ตกลง</button>
        </div>
      </div>

    </div>
  </div>

