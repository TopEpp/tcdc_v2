<!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('member'); ?>"><?=lang('Homepage');?></a></li>
                  <li class="breadcrumb-item active"><?=lang('Profile');?></li>
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
                      <h5><?=lang('Profile');?></h5>

                    </div>
                  </div>
                  <?php if (!empty($project)) {?>
                    <div class="card-block">
                      <div class="table-responsive">
                      <div class="card-block">
                      <div class="table-responsive">
                        <table class="table table-hover table-condensed table-detailed " id="detailedTable">
                        <!-- detailedTable -->
                            <thead>
                              <tr>
                                <th style="width:35%"><?=lang('Activity_Name');?></th>
                                <th style="width:25%"><?=lang('Category');?></th>
                                <th style="width:20%"><?=lang('Status');?></th>
                                <th style="width:20%"><?=lang('Latest_Update');?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($project as $key => $prj) {

    ?>
                                <tr id="<?php echo $prj->project_id; ?>">
                                  <td class="v-align-middle semi-bold"><?php echo $prj->project_name; ?></td>
                                  <td class="v-align-middle semi-bold"><?php echo $prj->type_name; ?></td>
                                  <td class="v-align-middle"><?php echo ($prj->reg_status == 1) ? '<span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">ได้เข้าร่วมกิจกรรม</span>' : '<span class=" label label-danger p-t-5 m-l-5 p-b-5 inline fs-12">' . lang('Waiting_confirmation') . '</span>'; ?></td>
                                  <td class="v-align-middle"><?php echo $this->mydate->date_2dot($prj->approve_date); ?></td>
                                </tr>
                              <?php }?>
                            </tbody>
                        </table>

                          <?php foreach ($project as $key => $prj) {?>
                            <div id="table-detail-<?php echo $prj->project_id; ?>" style="display: none">
                              <div class="table-responsive">
                                <table class="table table-inline  table-detailed" >
                                  <tbody>
                                    <tr>
                                      <td width="" style="vertical-align:top"><?=lang('Details');?> <p><?php echo $prj->project_detail; ?></p></td>
                                      <!-- <td width="10%" style="vertical-align:top"></td> -->
                                      <td width="" style="vertical-align:top"><?=lang('Application_Period');?> <p><?php echo $this->mydate->date_eng2thai($prj->register_start_date, 543, 'S') . ' - ' . $this->mydate->date_eng2thai($prj->register_finish_date, 543, 'S'); ?></p> <br>
                                      <?=lang('Activity_Period');?> <p><?php echo $this->mydate->date_eng2thai($prj->project_start_date, 543, 'S') . ' - ' . $this->mydate->date_eng2thai($prj->project_finish_date, 543, 'S'); ?></p></td>
                                      <td width="" style="vertical-align:top; text-align: center;"><a class="btn btn-bg-warning btn-cons m-t-10 fn_from" href="<?php echo base_url($this->uri->segment(1) . '/member/form/' . $prj->project_id) . '/1' ?>"><?=lang('View');?></a></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          <?php }?>
                      </div>
                    </div>
                  <?php } else {?>
                    <div class="card-block">
                    <div class="table-responsive">
                    <div class="card-block">
                    <div class="table-responsive">
                      <table class="table table-hover table-condensed " id="">
                      <!-- detailedTable -->
                          <thead>
                            <tr>
                                <th style="width:35%"><?=lang('Activity_Name');?></th>
                                <th style="width:25%"><?=lang('Category');?></th>
                                <th style="width:20%"><?=lang('Status');?></th>
                                <th style="width:20%"><?=lang('Latest_Update');?></th>
                              </tr>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>


                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
        </div>
      </div>



            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->