<?php
    require_once('Database.php');


    class College{
        public $id;
        public $name;
        public $location;
        public $user_id;
        public $datetime;


       

        //FUNCTION TO GET ALL COLLEGES
        public static function all(){
            $connection = Database::get_connection();

            $sql = "SELECT * FROM colleges";

            $result = Database::select($sql);

            if($result){
                if(mysqli_num_rows($result)<1){
                    return false;
                }else{
                    $colleges = array();
                    while($college_row = mysqli_fetch_array($result)){
                        $college = new self;
                        $college->id = $college_row['id'];
                        $college->name = $college_row['name'];
                        $college->location = $college_row['location'];
                        $college->user_id = $college_row['user_id'];
                        $college->datetime = $college_row['datetime'];

                        array_push($colleges,$college);
                    }
                    return $colleges;
                }
            }else{
                die("Query failed!!");
            }
            
            
        }

        //Function to return college name from ID
        public static function name($id){
            if(!empty($id)){
                $connection = Database::get_connection();
                $sql = "SELECT name from colleges WHERE id = $id";

                $result =  Database::select($sql);

                if(mysqli_num_rows($result)==0){
                    return 'Undefined';
                }else{
                    $college_row = mysqli_fetch_array($result);

                    return $college_row['name'];
                }
            }else{
                return 'Invalid Parameters';
            }
        }




        //FUNCTION TO CREATE COLLEGE
        public function create($name, $location, $user_id){
            $this->name = $name;
            $this->location = $location;
            $this->user_id = $user_id;
            $connection = Database::get_connection();

            $sql = "INSERT INTO colleges (name, location, user_id) VALUES ('$this->name', '$this->location', $this->user_id);";
            
            $is_inserted = Database::insert($sql);

            if($is_inserted==true){
                echo "College created successfully!!";
            }else{
                $message = Database::get_query_error_message($sql);
                echo $message;
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


        //Function to check if id exist
        public static function is_exist($id){
            if(!empty($id)){
                $connection = Database::get_connection();
                $sql = "SELECT name from colleges WHERE id = $id";
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

        //Function to return count
        public static function count(){
            $sql = "SELECT * FROM colleges";
            $res = Database::select($sql);
            if(mysqli_num_rows($res)>0){
                return mysqli_num_rows($res);
            }
            return 0;
        
        }




    }


     








?>