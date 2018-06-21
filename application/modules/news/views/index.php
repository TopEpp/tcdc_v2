    
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
      <!-- START PAGE CONTENT -->
      <div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
          <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url("member");?>">หน้าแรก</a></li>
                <li class="breadcrumb-item active">ข่าวสาร</li>
              </ol>
              <!-- END BREADCRUMB -->
            </div>
          </div>
        </div>
        <!-- END JUMBOTRON -->
        <!-- START CONTAINER FLUID -->
        <div class=" container-fluid   container-fixed-lg">
          <!-- BEGIN PlACE PAGE CONTENT HERE -->
          <!-- start news crade -->
          <div class=" container-fluid   container-fixed-lg">
            <div class="row">
              <div class="col-lg-12">
                <div class="card card-transparent">
                  <div class="card-header ">
                    <div class="card-title">
                      <h5>ข่าวสาร</h5>
                      
                      
                    </div>
                  </div>
                </div>

                <div class="card-block" >
                  <div class="row" style="display:none;">
                    <?php foreach ($news as $key => $value) { ?>
                      <div class="col-lg-4">
                        <div id="card-linear-color" class="card card-default card2">
                          <div class="card-header ">
                            <div class="card-title">ข่าวเด่น</div>
                          </div>
                          <div class="card-block">
                            <div class="scrollable">
                              <div class="demo-card-scrollable">
                                  <h3><span class="semi-bold"><?php echo $value->news_name; ?></span></h3>
                                  <p><?php echo $value->news_detail; ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

            
        <!-- END PAGE CONTAINER -->