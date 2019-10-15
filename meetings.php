<?php require_once('includes/init.php'); ?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <?php get_page_title('Meetings'); ?>
        <?php require_once('partials/meta_tags.php'); ?>
        <?php require_once('partials/header_files.php'); ?>
        <style>

            .today-meetings{
                margin-bottom:50px;
            }

            .meeting-card{
                margin-bottom:20px;
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
                            <?php get_page_header('Minutes of Meetings'); ?>
                                <!--Start page content from here-->

                                <!--Today Meetings Row-->
                                <div class="today-meetings">
                                    <h5>Today</h5>
                                    <div class="row">
                                        <?php 
                                            $meetings = Meeting::by_days(0,2);
                                            if(!$meetings){
                                                // echo "No meetings today";
                                                ?>
                                                    <div class="col-md-12">
                                                        <div class="add-new-meeting">
                                                            <div class="form">
                                                                <div id="accordion">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            You had no meetings today!!
                                                                            
                                                                            <a class="card-link " data-toggle="collapse" href="#collapseOne">
                                                                                ADD NEW
                                                                            </a>
                                                                        </div>
                                                                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 offset-md-3">
                                                                                    <form id="add-new-meeting-form">
                                                                                        <div class="form-group">
                                                                                            <select name="from_id" class="form-control">
                                                                                                <option value="">-SELECT-TO-WHOM-</option>
                                                                                                <option value="1">Pooja</option>
                                                                                                <option value="2">Akhil</option>
                                                                                                <option value="3">Rohit</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <select name="college_id" class="form-control">
                                                                                                <option value="">-SELECT-COLLEGE-</option>
                                                                                                <option value="1">Stratford University</option>
                                                                                                <option value="2">Amity University</option>
                                                                                                <option value="3">Harvard University</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <input class="form-control" type="text" placeholder="Type Topic" name="topic"/>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <select name="quality" class="form-control">
                                                                                                <option value="">-SELECT-QUALITY-</option>
                                                                                                <option value="HOT">Hot</option>
                                                                                                <option value="WARM">Warm</option>
                                                                                                <option value="COLD">Cold</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <input class="form-control" type="text" placeholder="Type Topic" name="topic"/>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <input class="form-control" type="text" placeholder="Type Topic" name="topic"/>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <input class="form-control" type="text" placeholder="Type Topic" name="topic"/>
                                                                                        </div>
                                                                                    </form>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php
                                            }else{
                                                foreach($meetings as $meeting){
                                                    ?>
                                                    <div class="col-md-2">
                                                            <div class="card card-small" class="meeting-card">
                                                                <div class="card-body">
                                                                    <div class="meeting-details text-center">
                                                                        <p>Date: <?php echo $meeting->datetime; ?></p>
                                                                        <h3><?php echo $meeting->from_id; ?></h3>
                                                                        <b><p style="margin-bottom:0px">TOPIC: <?php echo $meeting->topic ?></p></b>
                                                                        <b><p>(<?php echo $meeting->college_id; ?>)</p></b>
                                                                        <hr>
                                                                        <div class="meeting-decription">
                                                                            <div class="current-stage">
                                                                                <?php echo $meeting->current_stage; ?>
                                                                            </div>
                                                                            <div class="next-step">
                                                                                <?php echo $meeting->next_step; ?>
                                                                            </div>
                                                                            <div class="next-date">
                                                                                <?php echo $meeting->next_date; ?>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    <?php
                                                }
                                            }


                                        ?>
                                        

                                    </div>
                                </div>

                                <div class="today-meetings">
                                    <h5>Yesterday</h5>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="card card-small">
                                                <div class="card-body">
                                                    <div class="meeting-details text-center">
                                                        <p>Date: 10 Aug 2018</p>
                                                        <h3>Akhil</h3>
                                                        <b><p style="margin-bottom:0px">TOPIC: VIZAG</p></b>
                                                        <b><p>(Amity University)</p></b>
                                                        <hr>
                                                        <div class="meeting-decription">
                                                            <div class="current-stage">
                                                                This is current stage
                                                            </div>
                                                            <div class="next-step">
                                                                This is next step
                                                            </div>
                                                            <div class="next-date">
                                                                This is next date
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-2">
                                            <div class="card card-small">
                                                <div class="card-body">
                                                    <div class="meeting-details text-center">
                                                        <p>Date: 10 Aug 2018</p>
                                                        <h3>Ashwani</h3>
                                                        <b><p style="margin-bottom:0px">TOPIC: VIZAG</p></b>
                                                        <b><p>(Amity University)</p></b>
                                                        <hr>
                                                        <div class="meeting-decription">
                                                            <div class="current-stage">
                                                                This is current stage
                                                            </div>
                                                            <div class="next-step">
                                                                This is next step
                                                            </div>
                                                            <div class="next-date">
                                                                This is next date
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>

                                <div class="today-meetings">
                                    <h5>18 Sept 2019</h5>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="card card-small">
                                                <div class="card-body">
                                                    <div class="meeting-details text-center">
                                                        <p>Date: 10 Aug 2018</p>
                                                        <h3>Akhil</h3>
                                                        <b><p style="margin-bottom:0px">TOPIC: VIZAG</p></b>
                                                        <b><p>(Amity University)</p></b>
                                                        <hr>
                                                        <div class="meeting-decription">
                                                            <div class="current-stage">
                                                                This is current stage
                                                            </div>
                                                            <div class="next-step">
                                                                This is next step
                                                            </div>
                                                            <div class="next-date">
                                                                This is next date
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-2">
                                            <div class="card card-small">
                                                <div class="card-body">
                                                    <div class="meeting-details text-center">
                                                        <p>Date: 10 Aug 2018</p>
                                                        <h3>Pooja</h3>
                                                        <b><p style="margin-bottom:0px">TOPIC: VIZAG</p></b>
                                                        <b><p>(Amity University)</p></b>
                                                        <hr>
                                                        <div class="meeting-decription">
                                                            <div class="current-stage">
                                                                This is current stage
                                                            </div>
                                                            <div class="next-step">
                                                                This is next step
                                                            </div>
                                                            <div class="next-date">
                                                                This is next date
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-2">
                                            <div class="card card-small">
                                                <div class="card-body">
                                                    <div class="meeting-details text-center">
                                                        <p>Date: 10 Aug 2018</p>
                                                        <h3>Manish</h3>
                                                        <b><p style="margin-bottom:0px">TOPIC: VIZAG</p></b>
                                                        <b><p>(Amity University)</p></b>
                                                        <hr>
                                                        <div class="meeting-decription">
                                                            <div class="current-stage">
                                                                This is current stage
                                                            </div>
                                                            <div class="next-step">
                                                                This is next step
                                                            </div>
                                                            <div class="next-date">
                                                                This is next date
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                

                                <!--Page content will end here-->
                        </div>
                    <?php require_once('partials/footer.php'); ?>
                </main>
            </div>
        </div>
        <?php require_once('partials/footer_files.php'); ?>
    </body>
</html>