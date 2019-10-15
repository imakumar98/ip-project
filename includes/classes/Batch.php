<?php

    //IMPORT DATABASE CLASS
    require_once('Database.php');


    class Batch{

        public  $id, $name, $trainerName, $course, $type, $zoomURL, $venue,

                $agreement, $acknowledgement,$reviewURL, $videoTestimonial,

                $selfiePhoto, $groupPhoto, $collegeId, $ownerId, $ambassadorId,

                $userId, $datetime;


        

        //FUNCTION TO GET ALL BATCHES
        public static function all(){

            $connection = Database::get_connection();

            $sql = "SELECT * FROM batches ORDER by id DESC";

            $result = Database::select($sql);

            if($result){

                if(mysqli_num_rows($result)<1){

                    return false;

                }else{

                    $batches = array();

                    while($batch_row = mysqli_fetch_array($result)){

                        $batch = new self;

                        $batch->id = $batch_row['id'];

                        $batch->name = $batch_row['name'];

                        $batch->trainerName = $batch_row['trainer_name'];

                        $batch->course = $batch_row['course'];

                        $batch->type = $batch_row['type'];

                        $batch->zoomURL = $batch_row['zoom_url'];

                        $batch->venue = $batch_row['venue'];

                        $batch->agreement = $batch_row['agreement'];

                        $batch->acknowledgement = $batch_row['acknowledgement'];

                        $batch->reviewURL = $batch_row['review_url'];

                        $batch->videoTestimonial = $batch_row['video_testimonial'];

                        $batch->selfiePhoto = $batch_row['selfie_photo'];

                        $batch->groupPhoto = $batch_row['group_photo'];

                        $batch->collegeId = $batch_row['college_id'];

                        $batch->ownerId = $batch_row['owner_id'];

                        $batch->ambassadorId = $batch_row['ambassador_id'];

                        $batch->userId = $batch_row['user_id'];

                        $batch->datetime = $batch_row['datetime'];

                        

                        array_push($batches,$batch);
                    }
                    return $batches;
                }
            }else{
                die("Query failed!!");
            }
        }


        //FUNCTION TO GET BATCHES BY AMBASSADOR
        public static function by_ambassador($id){

            $connection = Database::get_connection();

            $sql = "SELECT * FROM batches WHERE ambassador_id = $id ORDER by id DESC";

            $result = Database::select($sql);

            if($result){

                if(mysqli_num_rows($result)<1){

                    return false;

                }else{

                    $batches = array();

                    while($batch_row = mysqli_fetch_array($result)){

                        $batch = new self;

                        $batch->id = $batch_row['id'];

                        $batch->name = $batch_row['name'];

                        $batch->trainerName = $batch_row['trainer_name'];

                        $batch->course = $batch_row['course'];

                        $batch->type = $batch_row['type'];

                        $batch->zoomURL = $batch_row['zoom_url'];

                        $batch->venue = $batch_row['venue'];

                        $batch->agreement = $batch_row['agreement'];

                        $batch->acknowledgement = $batch_row['acknowledgement'];

                        $batch->reviewURL = $batch_row['review_url'];

                        $batch->videoTestimonial = $batch_row['video_testimonial'];

                        $batch->selfiePhoto = $batch_row['selfie_photo'];

                        $batch->groupPhoto = $batch_row['group_photo'];

                        $batch->collegeId = $batch_row['college_id'];

                        $batch->ownerId = $batch_row['owner_id'];

                        $batch->ambassadorId = $batch_row['ambassador_id'];

                        $batch->userId = $batch_row['user_id'];

                        $batch->datetime = $batch_row['datetime'];

                        

                        array_push($batches,$batch);
                    }
                    return $batches;
                }
            }else{
                die("Query failed!!");
            }
        }



        


        //FUNCTION TO RETURN BATCH NAME FROM ID
        public static function name($id){

            if(!empty($id)){

                $connection = Database::get_connection();

                $sql = "SELECT name from batches WHERE id = $id";

                $result = Database::select($sql);

                if(mysqli_num_rows($result)==0){

                    return 'Invalid Parameter';

                }else{

                    $batch_row = mysqli_fetch_array($result);

                    return $batch_row['name'];
                }
            }else{

                return 'Invalid Parameters';
            }
        }




        //FUNCTION TO CREATE BATCH
        public function create($trainerName, $course, $type, $zoomURL, $venue,
                               $collegeId, $ownerId, $ambassadorId, $userId)
        {

            // echo "COde running till ere";

            $this->trainerName = $trainerName;

            $this->course = 'Course';

            $this->type = $type;

            $this->zoomURL = $zoomURL;

            $this->venue = $venue;

            $this->collegeId = $collegeId;

            $this->ownerId = $ownerId;

            $this->ambassadorId = $ambassadorId;

            $this->userId = $userId;

            // $this->name = $course.' '.$trainerName.' '.Date::get_year();

            $this->name = $course.' '.$trainerName.' '.'2019';


            // var_dump($this);

            $connection = Database::get_connection();


            $sql = "INSERT INTO batches (name, trainer_name, course, type, zoom_url, venue, college_id, owner_id, ambassador_id, user_id) VALUES ('$this->name', '$this->trainerName', '$this->course', '$this->type', '$this->zoomURL', '$this->venue', $this->collegeId, $this->ownerId, $this->ambassadorId, $this->userId);";
            
            $insert_id = Database::insert($sql);

            if($insert_id){

                return $insert_id;

            }else{

                die(mysqli_error($connection));

            }
        }


        //FUNCTION TO DELETE BATCH
        public static function delete($id){

            $connection = Database::get_connection();

            $sql = "DELETE FROM batches WHERE id = $id";
            
            $is_deleted = Database::delete($sql);

            if($is_deleted){

                return true;

            }else{

                die(mysqli_error($connection));

            }
        }



        //FUNCTION TO UPDATE batch
        public static function update($id, $name, $location, $user_id){
            $connection = Database::get_connection();

            $sql = "UPDATE batchs SET name = '$name', location='$location', user_id='$user_id' WHERE id = $id";
            
            $is_updated = Database::update($sql);

            if($is_updated){
                echo "batch update successfully!!";
            }else{
                $message = Database::get_query_error_message($sql);
                echo $message;
            }
        }


        //Function to check if id exist
        public static function is_exist($id){
            if(!empty($id)){
                $connection = Database::get_connection();
                $sql = "SELECT name from batches WHERE id = $id";
                $result =  Database::select($sql);
                if(mysqli_num_rows($result)==0){
                    return false;
                }else{
                    return true;
                }
            }else{
                die('Invalid Parameter');
            }
        }




    }








?>