<?php require_once('includes/init.php'); ?>
<?php require_once('includes/validate_globals.php'); ?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <?php get_page_title('EOI'); ?>
        <?php require_once('partials/meta_tags.php'); ?>
        <?php require_once('partials/header_files.php'); ?>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                <?php require_once('partials/main_sidebar.php'); ?>
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    <?php require_once('partials/main_navbar.php'); ?>
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert" id="add-eoi-success-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button> <i class="fa fa-check mx-2"></i>
                            <strong>Success</strong> 
                            EOI saved successfully!!
                        </div>
                        <div class="main-content-container container-fluid px-4">
                            
                            <?php get_page_header('EOI in '.College::name($college_id));?>
                            <!--Start page content from here-->

                                <!-- eoi Table -->
                                <div class="row">
                                    <div class="col">
                                        <div class="card card-small mb-4">
                                            <div class="card-header border-bottom">
                                                <h6 class="m-0">EOI</h6>
                                                <div class="actions" style="float:right; margin-top:-25px">
                                                    <button id="add-eoi-button" class="mb-2 btn btn-primary mr-1">ADD</button>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 pb-3 text-center">
                                                <div class="eoi-form-div" id="eoi-form-div" style="margin-top:20px">
                                                    <div class="container">
                                                        <h6 style="float:left">Fill Details</h6>
                                                        <br clear="all"/>
                                                        <form method="POST" id="add-eoi-form" onsubmit="submitThisForm(event, this.id)">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" class="form-control" placeholder="Type Name"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" class="form-control" placeholder="Type Email"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select name="ambassador_id" class="form-control">
                                                                            <option value="">-CHOOSE-AMBASSADOR-</option>
                                                                            <?php 
                                                                                $ambassadors = Ambassador::by_college($college_id);
                                                                                foreach($ambassadors as $ambassador){
                                                                                    ?><option value="<?php echo $ambassador->id ?>"><?php echo $ambassador->name; ?></option><?php 
                                                                                }
                                                                            ?>
                                                                        </select>
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
                                                                                $courses = Course::all('inner');
                                                                                foreach($courses as $course){
                                                                                    ?><option value="<?php echo $course->id ?>"><?php echo $course->name; ?></option><?php 
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select name="is_payment_received" class="form-control">
                                                                            <option value="">-PAYMENT-STATUS-</option>
                                                                            <option value="0">Pending</option>
                                                                            <option value="1">Done</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12 text-center">
                                                                    <input type="hidden" name="college_id" value="<?php echo $college_id; ?>"/>
                                                                    <input type="hidden" name="addEOI"/>
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
                                                            <th scope="col" class="border-0">Ambassador</th>
                                                            <th scope="col" class="border-0">Payment Status</th>
                                                            <th scope="col" class="border-0">Payment Date</th>
                                                            <th scope="col" class="border-0">Added By</th>
                                                            <th scope="col" class="border-0">Action</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $eois = eoi::by_college($college_id);
                                                            if(!$eois){
                                                                ?><tr><td>No EOI Yet!!</td><td></td><td></td><td></td><td></td><td></td><td></td></tr><?php
                                                            }else{
                                                                foreach($eois as $eoi){
                                                                    ?>
                                                                        <tr>
                                                                            <td><?php echo $eoi->id; ?></td>
                                                                            <td><a href="batches.php?college_id=<?php echo $college_id; ?><?php ?>&eoi_id=<?php echo $eoi->id; ?>"><?php echo $eoi->name; ?></a></td>
                                                                            <td><?php echo $eoi->email; ?></td>
                                                                            <td><?php echo $eoi->number; ?></td>
                                                                            <td><?php echo Course::name($eoi->course); ?></td>
                                                                            <td><?php echo Ambassador::name($eoi->ambassadorId) ?></td>
                                                                            <td><?php if($eoi->is_payment_received){ echo 'Done'; } else {echo 'Pending';}?></td>
                                                                            <td><?php echo $eoi->paymentDate; ?></td>
                                                                            <td><?php echo $eoi->user_id; ?></td>
                                                                            <td style="font-size:12px;"><a class="payment-update-button" data-id="<?php echo $eoi->id;  ?>" data-toggle="modal" href="#" data-target="#payment-modal">UPDATE</a></td>
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
                    <div class="modal fade" id="payment-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">EOI Payment Status</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="update-payment-status" onsubmit="submitThisForm(event, this.id)">
                                        <div class="form-group">
                                            <select name="is_payment_received" class="form-control">
                                                <option value="">-PAYMENT-STATUS-</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Done</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fill Amount</label>
                                            <input type="text" class="form-control" name="amount" placeholder="Eg: 1000, 5000, 10000"/> 
                                        </div>
                                        <input type="hidden" name="eoi_id" id="payment-update-eoi-id" value=""/>
                                        <input type="hidden" name="updatePaymentStatus"/>
                                        <input type="submit" class="btn btn-primary" value="UPDATE"/>
                                    </form>
                                </div>
                                
                               
                                
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php require_once('partials/footer_files.php'); ?>
    </body>
</html>