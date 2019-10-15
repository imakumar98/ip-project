<?php

    require_once('Database.php');
    require_once('Date.php');

    class Meeting{
        public $id;
        public $topic;
        public $college_id;
        public $quality;
        public $current_stage;
        public $next_step;
        public $next_date;
        public $from_id;
        public $user_id;
        public $datetime;

        //FUNCTION TO CREATE MEETING
        public function create($topic, $college_id, $quality, $current_stage, $next_step, $next_date, $from_id, $user_id){
            $this->topic = $topic;
            $this->college_id = $college_id;
            $this->quality = $quality;
            $this->current_stage =$current_stage;
            $this->next_step = $next_step;
            $this->next_date = $next_date;
            $this->from_id = $from_id;
            $this->user_id = $user_id;

            $connection = Database::get_connection();

            $sql = "INSERT INTO meetings (topic, college_id, quality, current_stage, next_step, next_date, from_id, user_id) VALUES ('$this->topic', $this->college_id, '$this->quality', '$this->current_stage',
                    '$this->next_step','$this->next_date',$this->from_id, $this->user_id);";
            
            $insert_id = Database::insert($sql);

            if($insert_id){
                return $insert_id;
            }else{
                die(mysqli_error($connection));
            }
        }

        //FUNCTION TO GET MY MEETINGS
        public static function me(){
            $connection = Database::get_connection();

            $user_id = 1;

            $sql = "SELECT * FROM meetings WHERE user_id = $user_id OR from_id = $user_id";

            $result = Database::select($sql);

            if($result){
                if(mysqli_num_rows($result)<1){
                    return false;
                }else{
                    $meetings = array();
                    while($meeting_row = mysqli_fetch_array($result)){
                        $meeting = new self;
                        $meeting->id = $meeting_row['id'];
                        $meeting->topic = $meeting_row['topic'];
                        $meeting->college_id = $meeting_row['college_id'];
                        $meeting->quality = $meeting_row['quality'];
                        $meeting->current_stage = $meeting_row['current_stage'];
                        $meeting->next_step = $meeting_row['next_step'];
                        $meeting->next_date = $meeting_row['next_date'];
                        $meeting->from_id = $meeting_row['from_id'];
                        $meeting->user_id = $meeting_row['user_id'];
                        $meeting->datetime = $meeting_row['datetime'];

                        array_push($meetings,$meeting);
                    }
                    return $meetings;
                }
            }else{
                die("Query failed!!");
            }
            
            
        }


        //FUNCTION TO GET MEETINGS BY LAST DAYS
        public static function by_days($number_of_days, $user_id){
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

            
            $sql = "SELECT * FROM meetings WHERE datetime BETWEEN '$startDate' AND '$endDate' AND user_id=$user_id OR from_id = $user_id ORDER BY id DESC";

                $result = Database::select($sql);

                if($result){
                    if(mysqli_num_rows($result)<1){
                        return false;
                    }else{
                        $meetings = array();
                        while($meeting_row = mysqli_fetch_array($result)){
                            $meeting = new self;
                            $meeting->id = $meeting_row['id'];
                            $meeting->topic = $meeting_row['topic'];
                            $meeting->college_id = $meeting_row['college_id'];
                            $meeting->quality = $meeting_row['quality'];
                            $meeting->current_stage = $meeting_row['current_stage'];
                            $meeting->next_step = $meeting_row['next_step'];
                            $meeting->next_date = $meeting_row['next_date'];
                            $meeting->from_id = $meeting_row['from_id'];
                            $meeting->user_id = $meeting_row['user_id'];
                            $meeting->datetime = $meeting_row['datetime'];

                            array_push($meetings,$meeting);
                        }
                        return $meetings;
                    }
                }else{
                    return false;
                }
        }

        

    }





?>