<?php
    require_once('Database.php');
    require_once('Date.php');

    // require_once('../common_functions.php');


    class EOI{
        public $id;
        public $name;
        public $email;
        public $number;
        public $college_id;
        public $user_id;
        public $course_id;
        public $datetime;
        public $is_payment_received;
        public $ambassador_id;


        

        //FUNCTION TO GET eoi
        public static function by_college($id){
            
            $sql = "SELECT * FROM eois WHERE college_id = $id";

            $result = Database::select($sql);

            if($result){
                if(mysqli_num_rows($result)<1){
                    return false;
                }else{
                    $eois = array();
                    while($eoi_row = mysqli_fetch_array($result)){
                        $eoi = new self;
                        $eoi->id = $eoi_row['id'];
                        $eoi->name = $eoi_row['name'];
                        $eoi->email = $eoi_row['email'];
                        $eoi->number = $eoi_row['number'];
                        $eoi->college_id = $eoi_row['college_id'];
                        $eoi->user_id = $eoi_row['user_id'];
                        $eoi->ambassadorId = $eoi_row['ambassador_id'];
                        $eoi->is_payment_received = $eoi_row['is_payment_received'];
                        $eoi->paymentDate = $eoi_row['payment_datetime'];
                        $eoi->course = $eoi_row['course_id'];
                        $eoi->datetime = $eoi_row['datetime'];

                        array_push($eois,$eoi);
                    }
                    return $eois;
                }
            }else{
                die("Query failed!!");
            }
            
            
        }

        //FUNCTION TO GET eoi BY LAST DAYS
        public static function by_days($number_of_days){
            $connection = Database::get_connection();
            $endDate = Date::today_date();
            $startDate = '';
            if($number_of_days==0){
                $startDate = Date::get_previous_date(0);
            }else if($number_of_days==7){
                $startDate = Date::get_previous_date(7);
            }else if($number_of_days==14){
                $startDate = Date::get_previous_date(14);
            }else if($number_of_days==28){
                $startDate = Date::get_previous_date(28);
                
            }

            

            $sql = "SELECT * FROM eois WHERE datetime BETWEEN '$startDate' AND '$endDate' ORDER BY id DESC";

                $result = Database::select($sql);

                if($result){
                    if(mysqli_num_rows($result)<1){
                        return false;
                    }else{
                        $eois = array();
                        while($eoi_row = mysqli_fetch_array($result)){
                            $eoi = new self;
                            $eoi->id = $eoi_row['id'];
                            $eoi->name = $eoi_row['name'];
                            $eoi->email = $eoi_row['email'];
                            $eoi->number = $eoi_row['number'];
                            $eoi->college_id = $eoi_row['college_id'];
                            $eoi->user_id = $eoi_row['user_id'];
                            $eoi->course = $eoi_row['course_type_id'];
                            $eoi->datetime = $eoi_row['datetime'];
                            

                            array_push($eois,$eoi);
                        }
                        return $eois;
                    }
                }else{
                    die("Query failed!!");
                }
        }

        //FUNCTION TO CREATE COLLEGE
        public function create($name, $email, $number, $college_id, $user_id,$course_id, $ambassador_id, $is_payment_received){
            $this->name = $name;
            $this->email = $email;
            $this->number = $number;
            $this->college_id = $college_id;
            $this->user_id = $user_id;
            $this->course_id = $course_id;
            $this->ambassador_id = $ambassador_id;
            $this->is_payment_received = $is_payment_received;
            $connection = Database::get_connection();

            $sql = "INSERT INTO eois (name, email, number, is_payment_received, course_id, user_id, ambassador_id, college_id) VALUES ('$this->name', '$this->email', '$this->number', $this->is_payment_received, $this->course_id, $this->user_id, $this->ambassador_id, $this->college_id);";
            
            $insert_id = Database::insert($sql);

            if($insert_id){
                return $insert_id;
            }else{
                die(mysqli_error($connection));
            }
        }

        //FUNCTION TO DELETE COLLEGE
        public static function delete(){
            $connection = Database::get_connection();

            $sql = "DELETE FROM colleges WHERE id = $id";
            
            $is_deleted = Database::delete($sql);

            if($is_deleted==true){
                echo "College created successfully!!";
            }else{
                echo $is_deleted;
            }
        }

        //FUNCTION TO UPDATE COLLEGE
        public static function update($id, $name, $location, $user_id){
            $connection = Database::get_connection();

            $sql = "UPDATE colleges SET name = '$name', location='$location', user_id='$user_id' WHERE id = $id";
            
            $is_updated = Database::update($sql);

            if($is_updated){
                echo "College update successfully!!";
            }else{
                $message = Database::get_query_error_message($sql);
                echo $message;
            }
        }


        //Function to return eoi name from ID
        public static function name($id){
            if(!empty($id)){
                $connection = Database::get_connection();
                $sql = "SELECT name from eois WHERE id = $id";

                $result =  Database::select($sql);

                if(mysqli_num_rows($result)==0){
                    return false;
                }else{
                    $eoi_row = mysqli_fetch_array($result);

                    return $eoi_row['name'];
                }
            }else{
                return 'Invalid Parameters';
            }
        }

        //Function to return count
        public static function count(){
            $sql = "SELECT * FROM eois";
            $res = Database::select($sql);
            if(mysqli_num_rows($res)>0){
                return mysqli_num_rows($res);
            }
            return 0;
           
        }

         //Function to return count
         public static function paymentCount(){
            $sql = "SELECT * FROM eois WHERE is_payment_received=1";
            $res = Database::select($sql);
            if(mysqli_num_rows($res)>0){
                return mysqli_num_rows($res);
            }
            return 0;
           
        }


        public function update_payment($id, $amount, $is_payment_received){
            $sql = "UPDATE eois SET amount = $amount, is_payment_received = $is_payment_received WHERE id = $id";
            $connection = Database::get_connection();
            $is_updated = Database::update($sql);


            if($is_updated){
                // echo get_json_response($created_id, 200, 'Payment status updated successfully', true, false);
                // // echo "Payment udpated";
                echo "1";
            }else{
                // echo get_json_response('NA', 400, 'Payment updation failed', false, true);
                echo "0";
               
    
            }


        }




    }

?>