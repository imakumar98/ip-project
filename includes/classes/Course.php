<?php
    
    require_once('Database.php');

    class Course{
        public $id;
        public $name;
        public $active;


        
        //Function to get all course list
        public static function all($type){
            $is_subject;
            if($type=='inner'){
                $is_subject = 1;
            }else if($type=='outer'){
                $is_subject = 0;
            }

            $sql = "SELECT * FROM courses WHERE is_subject = $is_subject";

            $result = Database::select($sql);

            if($result){
                if(mysqli_num_rows($result)<1){
                    return "No course found";
                }else{
                    $courses = array();
                    while($course_row = mysqli_fetch_array($result)){
                        $course = new self;
                        $course->id = $course_row['id'];
                        $course->name = $course_row['name'];
                        $course->location = $course_row['active'];
                        

                        array_push($courses,$course);
                    }
                    return $courses;
                }
            }else{
                die("Query failed!!");
            }
            
            
        }

        //FUNCTION TO CREATE COLLEGE
        public function create($name){
            $this->name = $name;
            $this->active = 0;
            

            $sql = "INSERT INTO courses (name, active) VALUES ('$this->name', '$this->active');";
            
            $is_inserted = Database::insert($sql);

            if($is_inserted==true){
                echo "College created successfully!!";
            }else{
                $message = Database::get_query_error_message($sql);
                echo $message;
            }
        }


        //Function to return college name from ID
        public static function name($id){
            if(!empty($id)){
                $connection = Database::get_connection();
                $sql = "SELECT name from courses WHERE id = $id";

                $result =  Database::select($sql);

                if(mysqli_num_rows($result)==0){
                    return false;
                }else{
                    $course_row = mysqli_fetch_array($result);

                    return $course_row['name'];
                }
            }else{
                return 'Invalid Parameters';
            }
        }
    }



?>