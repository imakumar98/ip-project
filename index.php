<?php require_once('includes/init.php'); ?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <?php get_page_title('Dashboard'); ?>
        <?php require_once('partials/meta_tags.php'); ?>
        <?php require_once('partials/header_files.php'); ?>
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
                                    <div class="stats-small stats-small--1 card card-small">
                                      <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                          <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Posts</span>
                                            <h6 class="stats-small__value count my-3">2,390</h6>
                                          </div>
                                          <div class="stats-small__data">
                                            <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>
                                          </div>
                                        </div>
                                        <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg col-md-6 col-sm-6 mb-4">
                                    <div class="stats-small stats-small--1 card card-small">
                                      <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                          <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Pages</span>
                                            <h6 class="stats-small__value count my-3">182</h6>
                                          </div>
                                          <div class="stats-small__data">
                                            <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                                          </div>
                                        </div>
                                        <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg col-md-4 col-sm-6 mb-4">
                                    <div class="stats-small stats-small--1 card card-small">
                                      <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                          <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Comments</span>
                                            <h6 class="stats-small__value count my-3">8,147</h6>
                                          </div>
                                          <div class="stats-small__data">
                                            <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
                                          </div>
                                        </div>
                                        <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg col-md-4 col-sm-6 mb-4">
                                    <div class="stats-small stats-small--1 card card-small">
                                      <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                          <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Users</span>
                                            <h6 class="stats-small__value count my-3">2,413</h6>
                                          </div>
                                          <div class="stats-small__data">
                                            <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                                          </div>
                                        </div>
                                        <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg col-md-4 col-sm-12 mb-4">
                                    <div class="stats-small stats-small--1 card card-small">
                                      <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                          <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Subscribers</span>
                                            <h6 class="stats-small__value count my-3">17,281</h6>
                                          </div>
                                          <div class="stats-small__data">
                                            <span class="stats-small__percentage stats-small__percentage--decrease">2.4%</span>
                                          </div>
                                        </div>
                                        <canvas height="120" class="blog-overview-stats-small-5"></canvas>
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
                                                    foreach($ambassadors as $ambassador){
                                                        ?>
                                                        <li class="list-group-item d-flex px-3">
                                                            <span class="text-semibold text-fiord-blue"><?php echo $ambassador->name; ?></span>
                                                            <span class="ml-auto text-right text-semibold text-reagent-gray"><?php echo $ambassador->user_id; ?></span>
                                                        </li>
                                                        <?php
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