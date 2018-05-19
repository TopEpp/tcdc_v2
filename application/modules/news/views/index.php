    
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
                <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
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
                      <h3>ข่าวสาร</h3>
                      <p>คุณสามารถแจ้งข่าวสร้างหรือแจ้งเตือนผู้ใช้ของคุณโดยการสร้างข่าวสารใหม่ โดยระบบจะส่งข้อความไปยังผู้ใช้งานของคุณทั้งทางอีเมล์และผ่านหน้าเว็บ</p>
                      
                    </div>
                  </div>
                </div>

                <div class="card-block">
                  <div class="row">
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

            <div class=" container-fluid  container-fixed-lg footer">
              <div class="copyright sm-text-center">
                <p class="small no-margin pull-left sm-pull-reset">
                  <span class="hint-text">Copyright &copy; 2018 </span>
                  <span class="font-montserrat">TCDC Chiang Mai</span>.
                  <span class="hint-text">All rights reserved. </span>
                  <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
                </p>

                <div class="clearfix"></div>
              </div>
            </div>
            <!-- END COPYRIGHT -->
          </div>
          <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTAINER -->