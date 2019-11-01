<?php require_once('includes/init.php'); ?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <?php get_page_title('Dashboard'); ?>
        <?php require_once('partials/meta_tags.php'); ?>
        <?php require_once('partials/header_files.php'); ?>
        <style>
            .count-blocks .label{
              font-size:0.75rem;
              color:#818ea3;
              letter-spacing:.0625rem;
            }
            .count-blocks .count{
              margin-top:15px;
              font-size:2rem;
               font-weight:500;
            }
        </style>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                <?php require_once('partials/main_sidebar.php'); ?>
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    <?php require_once('partials/main_navbar.php'); ?>
                        <div class="main-content-container container-fluid px-4">
                            <?php get_page_header('Dashboard'); ?>
                            <!--Start page content from here-->

                                <!-- Small Stats Blocks -->
                                <div class="row">
                                  <div class="col-lg col-md-6 col-sm-6 mb-4">
                                    <div class="card count-blocks">
                                      <div class="card-body">
                                        <div class="text-center">
                                          <span class="text-uppercase label">Ambassador Count</span>
                                            <h6 class="count"><b><?php echo Ambassador::count(); ?></b></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg col-md-6 col-sm-6 mb-4">
                                    <div class="card count-blocks">
                                      <div class="card-body">
                                        <div class="text-center">
                                          <span class="text-uppercase label">EOI Count</span>
                                            <h6 class="count"><b><?php echo EOI::count(); ?></b></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg col-md-6 col-sm-6 mb-4">
                                    <div class="card count-blocks">
                                      <div class="card-body">
                                        <div class="text-center">
                                          <span class="text-uppercase label">Payment received Count</span>
                                            <h6 class="count"><b><?php echo EOI::paymentCount(); ?></b></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg col-md-6 col-sm-6 mb-4">
                                    <div class="card count-blocks">
                                      <div class="card-body">
                                        <div class="text-center">
                                          <span class="text-uppercase label">Batch Count Count</span>
                                            <h6 class="count"><b><?php echo Batch::count(); ?></b></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg col-md-6 col-sm-6 mb-4">
                                    <div class="card count-blocks">
                                      <div class="card-body">
                                        <div class="text-center">
                                          <span class="text-uppercase label">Total Colleges</span>
                                            <h6 class="count"><b><?php echo College::count(); ?></b></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--End small stats block-->
                                <!--Ambassador added-->
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
                                        <div class="card card-small">
                                          <div class="card-header border-bottom">
                                            <h6 class="m-0">Ambassador Added</h6>
                                          </div>
                                          <div class="card-body p-0">
                                            <ul class="list-group list-group-small list-group-flush" id="ambassador-list">
                                                <?php 
                                                    $ambassadors = Ambassador::by_days(0);

                                                    if(!$ambassadors){
                                                      ?>
                                                      <li class="list-group-item d-flex px-3">
                                                        <span class="text-semibold text-fiord-blue">No Ambassadors Added Today</span>
                                                      </li>
                                                      <?php 
                                                    }else{
                                                      foreach($ambassadors as $ambassador){
                                                          ?>
                                                          <li class="list-group-item d-flex px-3">
                                                              <span class="text-semibold text-fiord-blue"><?php echo $ambassador->name; ?></span>
                                                              <span class="ml-auto text-right text-semibold text-reagent-gray"><?php echo $ambassador->user_id; ?></span>
                                                          </li>
                                                          <?php
                                                      }
                                                    }
                                                    
                                                ?>
                                            </ul>
                                          </div>
                                          <div class="card-footer border-top">
                                            <div class="row">
                                              <div class="col">
                                                <select class="custom-select custom-select-sm" id="days">
                                                  <option selected value="0">Today</option>
                                                  <option value="7">Last 7 Days</option>
                                                  <option value="14">Last 14 Days</option>
                                                  <option value="28">Last 28 Days</option>
                                                </select>
                                              </div>
                                              <!-- <div class="col text-right view-report">
                                                <a href="ambassadors.php">Full report &rarr;</a>
                                              </div> -->
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  <!-- End Top Referrals Component -->

                                <!--End of embassador added-->

                            <!--Page content will end here-->
                        </div>
                    <?php require_once('partials/footer.php'); ?>
                </main>
            </div>
        </div>
        <?php require_once('partials/footer_files.php'); ?>
    </body>
</html>