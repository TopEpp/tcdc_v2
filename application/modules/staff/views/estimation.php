<style>
#est_chart {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}					
</style>
	<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
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
                <li class="breadcrumb-item"><a href="#">ผลการประเมิน</a></li>
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
                <div class="card card-transparent">
                  <div class="card-header ">
                    <div class="card-title">
                      <h3>กราฟแท่งผลการประเมิน <?php echo $prj->project_name?></h3>
                      <h4>จำนวนผู้ตอบแบบสอบถาม <?php echo $est[0]->num_user;?> คน</h4>
                    </div>
                  </div>
                  <div class="card-block" style="height: 600px">
                    <div class="table-responsive">
                     	<div id="est_chart"></div>
                     	<?php 
                     	foreach ($est[0] as $key => $value) { ?>
                     		<input type="hidden" id="<?php echo $key?>" value="<?php echo $value?>">
                     	<?php }
                     	?>
                    </div>
                  </div>
                </div>
                <!-- END card -->
              </div>
            </div>
          </div>

        </div>
      </div>

            
          </div>
          <!-- END PAGE CONTENT WRAPPER -->
        
        <!-- END PAGE CONTAINER -->