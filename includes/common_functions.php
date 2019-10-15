<?php
    
    //IMPORT DATABASE FILE
    require_once('classes/Database.php');

    //FUNCTION TO GET ERROR MESSAGE IF QUERY FAILED
    function get_query_error_message($env,$sql){
        if($env==DEV){
            return "Your Query : ". $sql. " failed due to ".mysqli_error($connection);
        }else{
            return 'Something went wrong';
        }
    }

    function get_json_response($id, $status, $message, $success, $error){
        $response = array();
        //$response['id'] = $id;
        $reponse['status'] = $status;
        $reponse['message'] = $message;
        $reponse['success'] = $success;
        $reponse['error'] = $error;


        return json_encode($response);
    }


    





?>