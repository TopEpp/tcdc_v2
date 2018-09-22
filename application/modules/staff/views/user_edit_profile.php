<!-- START PAGE CONTENT -->
<div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">

                <?php if ($this->session->userdata('sesUserType') != '3') {?>
                  <li class="breadcrumb-item"><a href="<?PHP echo base_url('staff') ?>"><?=lang('Homepage');?></a></li>
                  <li class="breadcrumb-item "><a href="<?php echo base_url('staff/user_manage') ?>">ผู้ใช้งาน</a></li>
                <?php } else {?>
                  <li class="breadcrumb-item"><a href="<?PHP echo base_url('member') ?>"><?=lang('Homepage');?></a></li>
                <?php }?>

                <li class="breadcrumb-item active"><?php echo (empty($data)) ? 'สร้าง' : ''; ?><?=lang('Edit_User_Account');?></li>
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
                    <a class="active" data-toggle="tab" href="#tab1" role="tab"><i class="pg-outdent tab-icon"></i> <span><?=lang('Edit_Information');?></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="" data-toggle="tab" href="#tab2" role="tab"><i class="fa fa-hospital-o tab-icon"></i> <span><?=lang('Edit_Account');?></span></a>
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
                                              <p class="m-t-5"><?=lang('First_name-Last_name');?>: <?php echo @$data->firstname . ' ' . @$data->lastname; ?> </p>
                                              <p class="m-t-5"><?=lang('Email');?>: <?php echo @$data->email; ?> </p>
                                              <?php $type = [1 => 'Admin', 2 => 'Program Manager', 3 => 'Member', 4 => 'Editor'];?>
                                              <p class="m-t-5"><?=lang('Account Type');?>: <?php echo @$type[@$data->user_type]; ?> </p>

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

                                                <p><?=lang('Personal_Information');?></p>
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
                                                        <label><?=lang('Title');?></label>
                                                        <select style="width:100%" name="prename" id="prename"  class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2">

                                                          <option  <?php echo (@$data->prename == '') ? 'selected' : ''; ?> value="" ><?=lang('Select');?></option>
                                                          <option  <?php echo (@$data->prename == 1) ? 'selected' : ''; ?> value="1"><?=lang('Mr.');?></option>
                                                          <option  <?php echo (@$data->prename == 2) ? 'selected' : ''; ?> value="2"><?=lang('Mrs.');?></option>
                                                          <option  <?php echo (@$data->prename == 3) ? 'selected' : ''; ?> value="3"><?=lang('Ms.');?></option>
                                                          <option  <?php echo (@$data->prename == 4) ? 'selected' : ''; ?> value="4"><?=lang('Not_Specify');?></option>
                                                        </select>

                                                      </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                      <div class="form-group form-group-default required">
                                                        <label><?=lang('First_Name');?></label>
                                                        <input type="text" name="firstname" class="form-control" value="<?php echo @$data->firstname; ?>" >
                                                      </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                      <div class="form-group form-group-default required">
                                                        <label><?=lang('Last_Name');?></label>
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
                                                          <label><?=lang('House_No');?></label><span class="text-danger"><?php echo form_error('address'); ?></span>
                                                          <input type="text" name="address" class="form-control" placeholder="" value="<?php echo @$data->address; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-sm-3">
                                                        <div class="form-group form-group-default ">
                                                          <label><?=lang('Moo');?></label><span class="text-danger"><?php echo form_error('village'); ?></span>
                                                          <input type="text" name="village" class="form-control" placeholder="" value="<?php echo @$data->village; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-sm-3">
                                                        <div class="form-group form-group-default ">
                                                          <label><?=lang('Soi');?></label><span class="text-danger"><?php echo form_error('lane'); ?></span>
                                                          <input type="text" name="lane" class="form-control" placeholder="" value="<?php echo @$data->lane; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-sm-3">
                                                        <div class="form-group form-group-default ">
                                                          <label><?=lang('Road');?></label><span class="text-danger"><?php echo form_error('Road'); ?></span>
                                                          <input type="text" name="road" class="form-control" placeholder="" value="<?php echo @$data->road; ?>">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  <div class="row clearfix">
                                                  <div class="col-sm-6">
                                                      <div class="form-group form-group-default required">
                                                        <label><?=lang('Subdistrict');?></label>
                                                        <input  name="subdistrict" type="text" class="form-control" placeholder="" value="<?php echo @$data->subdistrict; ?>">
                                                      </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                      <div class="form-group form-group-default required">
                                                        <label><?=lang('District/Area');?></label>
                                                        <input name="district" type="text" class="form-control" value="<?php echo @$data->district; ?>">
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row clearfix">

                                                    <div class="col-sm-4">
                                                      <div class="form-group form-group-default required form-group-default-selectFx "><!--form-group-default-selectFx-->
                                                        <label><?=lang('Country');?></label><span class="text-danger" style="text-align:center;"><?php echo form_error('country'); ?></span>
                                                        <select style="width:100%" name="country" id="country" class=" form-control" data-init-plugin="select2"  >
                                                          <option value=""><?=lang('Select');?></option>
                                                          <?php foreach ($countries as $key => $value) {?>
                                                            <?php
$select = '';
    if (!empty(set_value('country'))) {
        if (set_value('country') == $value->id) {
            $select = 'selected="selected"';
        }
    } else {
        if ('ไทย' == $value->name || 'Thailand' == $value->name) {
            $select = 'selected="selected"';
        }
    }

    ?>
                                                            <?php if ($this->session->userdata('site_lang') == 'english') {?>
                                                            <option <?php echo $select; ?>  value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                            <?php } else {?>
                                                              <option <?php echo $select; ?>  value="<?php echo $value->id; ?>"><?php echo $value->value; ?></option>
                                                            <?php }?>
                                                          <?php }?>

                                                        </select>
                                                      </div>
                                                    </div>
                                                  <div class="col-sm-4">
                                                      <div class="form-group form-group-default required form-group-default-selectFx">
                                                        <label for="province"><?=lang('Province');?></label>
                                                        <select style="width:100%" id="province" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="select2" name="province">
                                                          <option  value="" ><?=lang('Select');?></option>
                                                          <?php foreach ($province as $key => $value) {?>
                                                            <?php
$select = '';
    if (@$data->province == $value->code) {
        $select = "selected='selected'";
    }?>
                                                            <?php if ($this->session->userdata('site_lang') == 'english') {?>
                                                              <option <?php echo $select; ?>  value="<?php echo $value->code; ?>"><?php echo $value->name_eng; ?></option>
                                                            <?php } else {?>
                                                              <option <?php echo $select; ?>  value="<?php echo $value->code; ?>"><?php echo $value->name_th; ?></option>
                                                            <?php }?>
                                                          <?php }?>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                      <div class="form-group form-group-default required">
                                                        <label><?=lang('Postcode');?></label>
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
                                                          <label><?=lang('Phone_No');?></label>

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
                                                      <p><?=lang('Profile_Image');?></p>
                                                      <!-- <form  class="dropzone" id="form-regis-upload"> -->
                                                        <div class="fallback">
                                                          <input name="profile_img" type="file" size='20' />
                                                        </div>
                                                        <p style="color:red"><?=lang('Note_jpg');?></p>
                                                      <!-- </form> -->
                                                    </div>
                                                  <br>


                                                  <br>


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
                                        <?php if ($this->session->userdata('site_lang') == 'english') {?>
                                          <p><?=lang('Account_Status');?> : <?php echo ($data->user_active == 1) ? "Normal" : "<span style='color:red'>abnormal</span>"; ?></p>
                                        <?php } else {?>
                                          <p><?=lang('Account_Status');?> : <?php echo ($data->user_active == 1) ? "ปกติ" : "<span style='color:red'>ไม่ปกติ</span>"; ?></p>
                                        <?php }?>

                                        <div class="row">
                                          <div class="col-sm-6">
                                          <h5 style="font-family: 'dbch';"><?=lang('Change_Account_Status');?></h5>
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
                                        <!-- <label><input type="radio" name="user_type" value="1" <?php echo ($data->user_type == 1) ? 'checked="checked"' : ''; ?> > Admin</label> <br> -->
                                        <label><input type="radio" name="user_type" value="2" <?php echo ($data->user_type == 2) ? 'checked="checked"' : ''; ?> > Program Manager</label> <br>
                                        <label><input type="radio" name="user_type" value="4" <?php echo ($data->user_type == 4) ? 'checked="checked"' : ''; ?>> Editor</label><br>
                                        <label><input type="radio" name="user_type" value="3" <?php echo ($data->user_type == 3) ? 'checked="checked"' : ''; ?>> Member</label>
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

                                                <p><?=lang('Account_Information');?></p>
                                                <div class="form-group-attached">
                                                  <div class="row clearfix">
                                                    <div class="col-sm-12">
                                                          <div class="form-group form-group-default required">
                                                            <label><?=lang('Email');?></label>
                                                            <input disabled name="email" type="text" class="form-control" value="<?php echo @$data->email; ?>">
                                                          </div>
                                                        </div>
                                                  </div>

                                                  <br>
                                                  <p><?=lang('Password');?></p>
                                                  <div class="form-group form-group-default has-error">
                                                    <label class=""><?=lang('Old_Password');?></label>

                                                    <input name="password" placeholder="<?=lang('Enter_your_old_password');?>" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password" value="<?php //echo $this->encrypt->decode(@$data->password);?>">
                                                  </div>
                                                  <br>
                                                  <div class="form-group form-group-default has-error">
                                                    <label class=""><?=lang('New_Password');?></label>
                                                    <input name="pass_new" id="pass_new" placeholder="<?=lang('Enter_your_new_password');?>" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                                    <p style="color: red;font-size: 14px;  font-family: 'dbch';" id="errors"></p>
                                                  </div>
                                                  <br>
                                                  <div class="form-group form-group-default has-error">
                                                    <label class=""><?=lang('Confirm_New_Password');?></label>
                                                    <input name="pass_new_confirm" placeholder="<?=lang('Enter_your_new_password_again');?>" class="form-control error" required="" aria-required="true" aria-invalid="true" type="password">
                                                  </div>
                                                  <br>
                                                  <label style="color:red;font-size:16px"> <?=lang('Choose_a_password');?> </label>
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
                        <span><?=lang('next');?> <i class="fa fa-angle-right "></i></span>
                      </button>
                    </li>
                    <li class="next finish hidden">
                      <button id="btn-finish" class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                        <span><?=lang('Confirm');?></span>
                      </button>
                    </li>
                    <li class="previous first hidden">
                      <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                        <span>หน้าสุด</span>
                      </button>
                    </li>
                    <li class="previous" id="hide_back" style="display:none;">
                      <button class="btn btn-default btn-cons pull-right" type="button">
                        <span><i class="fa fa-angle-left "></i> <?=lang('back');?></span>
                      </button>
                    </li>
                    <li class="previous_tmp" id ="previous_hide" style="display:none;">
                      <a  href="<?php echo base_url('member'); ?>"  class="btn btn-white btn-cons pull-right" type="button">
                        <span><i class="fa fa-angle-left "></i> <?=lang('back');?></span>
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

