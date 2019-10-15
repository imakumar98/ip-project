<?php require_once('includes/init.php'); ?>
<?php require_once('includes/validate_globals.php'); ?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <?php get_page_title('Batches'); ?>
        <?php require_once('partials/meta_tags.php'); ?>
        <?php require_once('partials/header_files.php'); ?>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                <?php require_once('partials/main_sidebar.php'); ?>
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    <?php require_once('partials/main_navbar.php'); ?>
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert" id="add-batch-success-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button> <i class="fa fa-check mx-2"></i>
                            <strong>Success</strong> 
                            Batch Created successfully!!
                        </div>
                        <div class="main-content-container container-fluid px-4">
                            
                            <?php get_page_header('All Batches');?>
                            <!--Start page content from here-->

                                <!-- Ambassador Table -->
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-small mb-4">
                                            <div class="card-header border-bottom">
                                                <h6 class="m-0">Batches</h6>
                                                <!-- <div class="actions" style="float:right; margin-top:-25px">
                                                    <button id="add-batch-button" class="mb-2 btn btn-primary mr-1">CREATE BATCH</button>
                                                </div> -->
                                            </div>
                                            <div class="card-body p-0 pb-3 text-center">
                                                <div class="batch-form-div" id="batch-form-div" style="margin-top:20px">
                                                    <div class="container">
                                                        <h6 style="float:left">Fill Details</h6>
                                                        <br clear="all"/>
                                                        <form method="POST" id="add-batch-form" onsubmit="submitThisForm(event, this.id)">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" class="form-control" placeholder="Type trainer name"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select name="course" class="form-control">
                                                                            <option value="">-SELECT-COURSE-</option>
                                                                            <option value="1">Course 1</option>
                                                                            <option value="2">Course 2</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select name="owner_id" class="form-control">
                                                                            <option value="">-SELECT-BATCH-OWNER-</option>
                                                                            <option value="1">User 1</option>
                                                                            <option value="2">User 2</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group" style="text-align:left">
                                                                        Type: &nbsp; &nbsp; &nbsp; &nbsp;
                                                                        <input type="radio" name="type" value="online" onclick="selectType(this.value)">Online
                                                                        <input type="radio" style="margin-bottom:20px; margin-left:40px;" onclick="selectType(this.value)" name="type" value="classroom">Classroom<br>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="zoom_url"  id="zoom-url" class="form-control" placeholder="Paste Zoom URL"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="venue" class="form-control" placeholder="Type venue name"/>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <input type="hidden" name="ambassador_id" value="<?php echo $ambassador_id; ?>"/>
                                                                    <input type="hidden" name="college_id" value="<?php echo $college_id; ?>"/>
                                                                    <input type="hidden" name="addBatch"/>
                                                                    <input type="submit" class="btn btn-primary submit-button" value="SAVE"/>
                                                                </div>
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <table class="table mb-0">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th scope="col" class="border-0">#</th>
                                                            <th scope="col" class="border-0">Name</th>
                                                            <th scope="col" class="border-0">Trainer</th>
                                                            <th scope="col" class="border-0">Batch Owner</th>
                                                            <th scope="col" class="border-0">Course</th>
                                                            <th scope="col" class="border-0">Type</th>
                                                            <th scope="col" class="border-0">Zoom URL</th>
                                                            <th scope="col" class="border-0">Venue</th>
                                                            <th scope="col" class="border-0">Agreement</th>
                                                            <th scope="col" class="border-0">Acknowledgement</th>
                                                            <th scope="col" class="border-0">Video Testimonial</th>
                                                            <th scope="col" class="border-0">Selfie Photo</th>
                                                            <th scope="col" class="border-0">Group Photo</th>
                                                            <th scope="col" class="border-0">College</th>
                                                           
                                                            <!-- <th scope="col" class="border-0">Action</th> -->
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $batches = Batch::all();
                                                            if(!$batches){
                                                                ?><tr><td>No Batches added yet!!</td><td></td><td></td><td></td><td></td><td></td></tr><?php
                                                            }else{
                                                                foreach($batches as $batch){
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $batch->id; ?></td>
                                                                            <td><?php echo $batch->name; ?></td>
                                                                            <td><?php echo $batch->trainerName; ?></td>
                                                                            <td><?php echo $batch->ownerId; ?></td>
                                                                            <td><?php echo $batch->course; ?></td>
                                                                            <td><?php echo $batch->type; ?></td>
                                                                            <td><?php echo $batch->zoomURL; ?></td>
                                                                            <td><?php echo $batch->venue; ?></td>
                                                                            <td><?php echo $batch->agreement; ?></td>
                                                                            <td><?php echo $batch->acknowledgement; ?></td>
                                                                            <td><?php echo $batch->videoTestimonial; ?></td>
                                                                            <td><?php echo $batch->selfiePhoto; ?></td>
                                                                            <td><?php echo $batch->groupPhoto; ?></td>
                                                                            <td><?php echo $batch->college; ?></td>
                                                                           
                                                                          
                                                                            <!-- <td><a href="edit-batch.php?batch_id=<?php echo $batch->id; ?>">EDIT</a></td> -->
                                                                        </tr>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- End Default Light Table -->

                            <!--Page content will end here-->
                        </div>
                    <?php require_once('partials/footer.php'); ?>
                </main>
            </div>
        </div>
        <?php require_once('partials/footer_files.php'); ?>
    </body>
</html>