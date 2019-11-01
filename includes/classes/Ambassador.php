<?php
    require_once('Database.php');
    require_once('Date.php');


    class Ambassador{
        public $id;
        public $name;
        public $email;
        public $number;
        public $college_id;
        public $user_id;
        public $course_type_id;
        public $datetime;


        

        //FUNCTION TO GET AMBASSADOR
        public static function by_college($id){
            
            $sql = "SELECT * FROM ambassadors WHERE college_id = $id";

            $result = Database::select($sql);

            if($result){
                if(mysqli_num_rows($result)<1){
                    return false;
                }else{
                    $ambassadors = array();
                    while($ambassador_row = mysqli_fetch_array($result)){
                        $ambassador = new self;
                        $ambassador->id = $ambassador_row['id'];
                        $ambassador->name = $ambassador_row['name'];
                        $ambassador->email = $ambassador_row['email'];
                        $ambassador->number = $ambassador_row['number'];
                        $ambassador->college_id = $ambassador_row['college_id'];
                        $ambassador->user_id = $ambassador_row['user_id'];
                        $ambassador->course = $ambassador_row['course_type_id'];
                        $ambassador->datetime = $ambassador_row['datetime'];

                        array_push($ambassadors,$ambassador);
                    }
                    return $ambassadors;
                }
            }else{
                die("Query failed!!");
            }
            
            
        }

        //FUNCTION TO GET AMBASSADOR BY LAST DAYS
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

            

            $sql = "SELECT * FROM ambassadors WHERE datetime BETWEEN '$startDate' AND '$endDate' ORDER BY id DESC";

                $result = Database::select($sql);

                if($result){
                    if(mysqli_num_rows($result)<1){
                        return false;
                    }else{
                        $ambassadors = array();
                        while($ambassador_row = mysqli_fetch_array($result)){
                            $ambassador = new self;
                            $ambassador->id = $ambassador_row['id'];
                            $ambassador->name = $ambassador_row['name'];
                            $ambassador->email = $ambassador_row['email'];
                            $ambassador->number = $ambassador_row['number'];
                            $ambassador->college_id = $ambassador_row['college_id'];
                            $ambassador->user_id = $ambassador_row['user_id'];
                            $ambassador->course = $ambassador_row['course_type_id'];
                            $ambassador->datetime = $ambassador_row['datetime'];
                            

                            array_push($ambassadors,$ambassador);
                        }
                        return $ambassadors;
                    }
                }else{
                    die("Query failed!!");
                }
        }

        //FUNCTION TO CREATE COLLEGE
        public function create($name, $email, $number, $college_id, $user_id,$course_type_id){
            $this->name = $name;
            $this->email = $email;
            $this->number = $number;
            $this->college_id = $college_id;
            $this->user_id = $user_id;
            $this->course_type_id = $course_type_id;
            $connection = Database::get_connection();

            $sql = "INSERT INTO ambassadors (name, email, number, college_id, user_id, course_type_id) VALUES ('$this->name', '$this->email', '$this->number', $this->college_id, $this->user_id, $this->course_type_id);";
            
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


        //Function to return ambassador name from ID
        public static function name($id){
            if(!empty($id)){
                $connection = Database::get_connection();
                $sql = "SELECT name from ambassadors WHERE id = $id";

                $result =  Database::select($sql);

                if(mysqli_num_rows($result)==0){
                    return false;
                }else{
                    $ambassador_row = mysqli_fetch_array($result);

                    return $ambassador_row['name'];
                }
            }else{
                return 'Invalid Parameters';
            }
        }

        //Function to return count
        public static function count(){
            $sql = "SELECT * FROM ambassadors";
            $res = Database::select($sql);
            if(mysqli_num_rows($res)>0){
                return mysqli_num_rows($res);
            }
            return 0;
           
        }




    }

?>