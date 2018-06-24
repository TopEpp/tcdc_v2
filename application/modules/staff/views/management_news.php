<!-- START PAGE CONTENT -->
<div class="content ">
    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax">
      <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
          <!-- START BREADCRUMB -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('staff')?>">หน้าแรก</a></li>
            <li class="breadcrumb-item "><a href="<?php echo base_url('staff/management')?>">กิจกรรม</a></li>
            <li class="breadcrumb-item active"><?php echo (!empty($news))? 'แก้ไขข่าวสาร':'สร้างข่าวสาร'?></li>
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
                    <div class="col-md-12">
                      <div class="padding-10 sm-padding-5 sm-m-t-15 ">
                         <h2><?php echo (!empty($news))? 'แก้ไขข่าวสาร':'สร้างข่าวสาร'?></h2>
                        <?php $attributes = array('name' => 'form-news', 'id' => 'form-news');
                              $lang = $this->uri->segment(1);
                               echo form_open_multipart($lang.'/staff/saveNews/', $attributes); 
                        ?>
                        <input type="hidden" class="form-control" name="news_id" id="news_id" value="<?php echo (!empty($news))? $news->news_id:''?>">
                        <div class="form-group-attached">
                          <div class="row">
                            <div class="col-md-12">
                              <p>หัวข้อ</p>
                              <div class="form-group ">
                          
                                <input type="text" class="form-control" name="news_name" id="news_name" value="<?php echo (!empty($news))? $news->news_name:''?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <!-- <div class="col-md-12" style="margin-top: 5px;">
                              <p>เนื้อหา</p>
                              <div class="wysiwyg5-wrapper b-a b-grey">
                                <textarea name="news_detail" id="news_detail" class="wysiwyg demo-form-wysiwyg" placeholder=""  ui-jq="wysihtml5" ui-options="{
                                html: true,
                                stylesheets: ['pages/css/editor.css']
                              }" required><?php echo (!empty($news))? $news->news_name:''?></textarea>

                            </div> -->
                             <div class="col-md-12" style="margin-top: 5px;">
                              <textarea id="summernote" name="news_detail"><?php echo (!empty($news))? ($news->news_detail):''?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row" >
                          <div class="col-md-10">
                          </div>
                          <div class="col-md-2" >
                            <button type="submit" class="btn btn-primary btn-block m-t-5" id="btnSubmitNews"><span>ยืนยัน</span></button>
                          </div>
                        </div>
                      </form>
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

