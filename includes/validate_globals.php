<?php

    require_once('classes/College.php');
    require_once('classes/Ambassador.php');
    require_once('classes/Batch.php');
    require_once('classes/User.php');
    require_once('classes/EOI.php');
    require_once('common_functions.php');
    

    if(isset($_GET['college_id'])){
        $college_id = Database::escaped_string(trim($_GET['college_id']));
        if(!College::is_exist($college_id)){
            die("Invalid Page");
        }
    }

    if(isset($_GET['ambassador_id']) && isset($_GET['college_id'])){
        $ambassador_id = Database::escaped_string(trim($_GET['ambassador_id']));
        // if(!Batch::is_exist($batch_id)){
        //     die("Invalid Page");
        // }
    }


    if(isset($_POST['addAmbassador'])){
    	$name = Database::escaped_string($_POST['name']);
    	$email = Database::escaped_string($_POST['email']);
    	$number = Database::escaped_string($_POST['number']);
    	$course_id = Database::escaped_string($_POST['course_id']);
    	$college_id = Database::escaped_string($_POST['college_id']);
    	
    	//Validate Values
    	$ambassador = new Ambassador();

    	//Fecth User Id
    	//$user_id = User::id;

    	$user_id = 1;
    	
    	$created_id = $ambassador->create($name, $email, $number, $college_id, $user_id, $course_id);
    	if($created_id){
    		echo get_json_response($created_id, 201, 'Ambassador Created Successfully', true, false);
    	}else{
    		echo get_json_response('NA', 400, 'Ambassador Creation Failed', false, true);

    	}


    }


    //CREATE COLLEGE
    if(isset($_POST['addCollege'])){
        $name = Database::escaped_string($_POST['name']);
        $location = Database::escaped_string($_POST['location']);
        
        
        //Validate Values
        $college = new College();

        //Fecth User Id
        //$user_id = User::id;

        $user_id = 1;
        
        $created_id = $college->create($name, $location, $user_id);
        if($created_id){
            echo get_json_response($created_id, 201, 'College Created Successfully', true, false);
        }else{
            echo get_json_response('NA', 400, 'College Creation Failed', false, true);

        }


    }


    if(isset($_POST['days'])){
        $days = Database::escaped_string($_POST['days']);

        $ambassadors = Ambassador::by_days($days);

        echo json_encode($ambassadors);
    }



    //ADD BATCH
    if(isset($_POST['addBatch'])){
        $trainerName = Database::escaped_string($_POST['name']);
    	$course = Database::escaped_string($_POST['course']);
        $type = Database::escaped_string($_POST['type']);
        $zoomURL = Database::escaped_string($_POST['zoom_url']);
        $venue = Database::escaped_string($_POST['venue']);
        
        $ownerId = Database::escaped_string($_POST['owner_id']);
        $ambassadorId = Database::escaped_string($_POST['ambassador_id']);
        $collegeId = Database::escaped_string($_POST['college_id']);
        


        // print_r($_POST);
    	
    	//Validate Values
    	$batch = new Batch();

    	//Fecth User Id
    	//$user_id = User::id;

    	$userId = 1;
    	
    	$created_id = $batch->create($trainerName, $course, $type, $zoomURL, $venue, $collegeId, $ownerId, $ambassadorId, $userId);
    	// if($created_id){
    	// 	echo get_json_response($created_id, 201, 'Batch Created Successfully', true, false);
    	// }else{
    	// 	echo get_json_response('NA', 400, 'Batch Creation Failed', false, true);

    	// }
    }


    //Change user status
    if(isset($_POST['change_status']) && isset($_POST['user_id'])){
        $user_id = Database::escaped_string($_POST['user_id']);
        $update_status_to = User::change_status($user_id);
        echo $update_status_to;
    }


    //Add EOI
    if(isset($_POST['addEOI'])){
        $name = Database::escaped_string($_POST['name']);
    	$email = Database::escaped_string($_POST['email']);
    	$number = Database::escaped_string($_POST['number']);
    	$course_id = Database::escaped_string($_POST['course_id']);
        $college_id = Database::escaped_string($_POST['college_id']);
        $ambassador_id = Database::escaped_string($_POST['ambassador_id']);
        $is_payment_received = Database::escaped_string($_POST['is_payment_received']);
    	
    	//Validate Values
    	$eoi = new EOI();

    	//Fecth User Id
    	//$user_id = User::id;

    	$user_id = 1;
    	
    	$created_id = $eoi->create($name, $email, $number, $college_id, $user_id, $course_id, $ambassador_id, $is_payment_received);
    	if($created_id){
    		echo get_json_response($created_id, 201, 'Ambassador Created Successfully', true, false);
    	}else{
    		echo get_json_response('NA', 400, 'Ambassador Creation Failed', false, true);

    	}
    }


    if(isset($_POST['updatePaymentStatus'])){
        $is_payment_received = Database::escaped_string($_POST['is_payment_received']);
        $eoi_id = Database::escaped_string($_POST['eoi_id']);
        $amount = Database::escaped_string($_POST['amount']);


        $eoi = new EOI();

        $eoi->update_payment($eoi_id, $amount, $is_payment_received);



    }



?>