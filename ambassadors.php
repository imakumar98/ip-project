<?php require_once('includes/init.php'); ?>
<?php require_once('includes/validate_globals.php'); ?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <?php get_page_title('Ambassadors'); ?>
        <?php require_once('partials/meta_tags.php'); ?>
        <?php require_once('partials/header_files.php'); ?>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                <?php require_once('partials/main_sidebar.php'); ?>
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    <?php require_once('partials/main_navbar.php'); ?>
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert" id="add-ambassador-success-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button> <i class="fa fa-check mx-2"></i>
                            <strong>Success</strong> 
                            Ambassador saved successfully!!
                        </div>
                        <div class="main-content-container container-fluid px-4">
                            
                            <?php get_page_header('Ambassadors in '.College::name($college_id));?>
                            <!--Start page content from here-->

                                <!-- Ambassador Table -->
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-small mb-4">
                                            <div class="card-header border-bottom">
                                                <h6 class="m-0">Ambassadors</h6>
                                                <div class="actions" style="float:right; margin-top:-25px">
                                                    <button id="add-ambassador-button" class="mb-2 btn btn-primary mr-1">ADD</button>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 pb-3 text-center">
                                                <div class="ambassador-form-div" id="ambassador-form-div" style="margin-top:20px">
                                                    <div class="container">
                                                        <h6 style="float:left">Fill Details</h6>
                                                        <br clear="all"/>
                                                        <form method="POST" id="add-ambassador-form">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" class="form-control" placeholder="Type Name"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" class="form-control" placeholder="Type Email"/>
                                                                    </div>
                                                                    

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="number" class="form-control" placeholder="Type Mobile Number"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select name="course_id" class="form-control">
                                                                            <option value="">-SELECT-COURSE-</option>
                                                                            <?php 
                                                                                $courses = Course::all();
                                                                                foreach($courses as $course){
                                                                                    ?><option value="<?php echo $course->id ?>"><?php echo $course->name; ?></option><?php 
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <input type="hidden" name="college_id" value="<?php echo $college_id; ?>"/>
                                                                    <input type="hidden" name="addAmbassador"/>
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
                                                            <th scope="col" class="border-0">Email</th>
                                                            <th scope="col" class="border-0">Contact Number</th>
                                                            <th scope="col" class="border-0">Course</th>
                                                            <th scope="col" class="border-0">Added By</th>
                                                            <th scope="col" class="border-0">Action</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $ambassadors = Ambassador::by_college($college_id);
                                                            if(!$ambassadors){
                                                                ?><tr><td>No Ambassadors in yet!!</td><td></td><td></td><td></td><td></td><td></td><td></td></tr><?php
                                                            }else{
                                                                foreach($ambassadors as $ambassador){
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $ambassador->id; ?></td>
                                                                            <td><a href="batches.php?college_id=<?php echo $college_id; ?><?php ?>&ambassador_id=<?php echo $ambassador->id; ?>"><?php echo $ambassador->name; ?></a></td>
                                                                            <td><?php echo $ambassador->email; ?></td>
                                                                            <td><?php echo $ambassador->number; ?></td>
                                                                            <td><?php echo Course::name($ambassador->course); ?></td>
                                                                            <td><?php echo $ambassador->user_id; ?></td>
                                                                            <td><a href="edit-ambassador.php?ambassador_id=<?php echo $ambassador->id; ?>">EDIT</a></td>
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