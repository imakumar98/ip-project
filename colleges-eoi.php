<?php require_once('includes/init.php'); ?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <?php get_page_title('Colleges'); ?>
        <?php require_once('partials/meta_tags.php'); ?>
        <?php require_once('partials/header_files.php'); ?>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                <?php require_once('partials/main_sidebar.php'); ?>
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    <?php require_once('partials/main_navbar.php'); ?>
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert" id="add-college-success-alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button> <i class="fa fa-check mx-2"></i>
                        <strong>Success</strong> 
                        College saved successfully!!
                    </div>
                        <div class="main-content-container container-fluid px-4">
                            
                            <?php get_page_header('List Of Colleges'); ?>
                            <!--Start page content from here-->

                                <!-- College Table -->
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-small mb-4">
                                            <div class="card-header border-bottom">
                                                <h6 class="m-0">Colleges</h6>
                                                <div class="actions" style="float:right; margin-top:-25px">
                                                    <button id="add-college-button" class="mb-2 btn btn-primary mr-1">ADD</button>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 pb-6 text-center">
                                                <div class="college-form-div" id="college-form-div" style="margin-top:20px">
                                                    <div class="container">
                                                        <h6 style="float:left">Fill Details</h6>
                                                        <br clear="all"/>
                                                        <form method="POST" id="add-college-form">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" class="form-control" placeholder="Type College Name"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="location" class="form-control" placeholder="Type Location"/>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12 text-center">
                                                                    
                                                                    <input type="hidden" name="addCollege"/>
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
                                                            <th scope="col" class="border-0">Location</th>
                                                            <th scope="col" class="border-0">Added by</th>
                                                            <th scope="col" class="border-0">Date Time</th>
                                                            <th scope="col" class="border-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $colleges = College::all();
                                                            if(!$colleges){
                                                                ?><tr><td>No Colleges added yet!!</td><td></td><td></td><td></td><td></td><td></td></tr><?php
                                                            }else{
                                                                foreach($colleges as $college){
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $college->id; ?></td>
                                                                            <td><a href="eoi.php?college_id=<?php echo $college->id; ?>"><?php echo $college->name; ?></a></td>
                                                                            <td><?php echo $college->location; ?></td>
                                                                            <td><?php echo $college->user_id; ?></td>
                                                                            <td><?php echo $college->datetime; ?></td>
                                                                            <td><a href="edit-college.php?college_id=<?php echo $college->id; ?>">EDIT</a></td>
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