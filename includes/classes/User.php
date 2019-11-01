<?php 

	require_once('Database.php');

	class User{
		public $id;
		public $name;
		public $email;
		public $password;
		public $active;
		public $datetime;
		public $position;




		//Function to return position string
		public static function get_position($position_id){
			
			if(!empty($position_id)){
				if($position_id==1){
					return 'SUPERADMIN';
				}else if($position_id==2){
					return 'ADMIN';
				}else if($position_id==3){
					return 'USER';
				}else{
					return 'Invalid Argument';
				}
			}else{
				return 'Invalid Argument';
			}
		}


		//Function to create user
		public function create($name, $email, $password, $position){
			$password = Database::get_hash($password);
			$sql = "INSERT INTO users (name, email, password, position) VALUES ('$name','$email','$password',$position);";
			$inserted_id = Database::insert($sql);
			if($inserted_id) return $inserted_id;
			return false;
		}


		//Static function to get all users
		public static function all(){
			$sql = "SELECT * FROM users WHERE position<>1";
			$result = Database::select($sql);
			if($result){
                if(mysqli_num_rows($result)<1){
                    return false;
                }else{
                    $users = array();
                    while($user_row = mysqli_fetch_array($result)){
                        $user = new self;
                        $user->id = $user_row['id'];
                        $user->name = $user_row['name'];
                        $user->email = $user_row['email'];
                        $user->active = $user_row['active'];
                        $user->datetime = $user_row['datetime'];
                        $user->position = $user_row['position'];

                        array_push($users,$user);
                    }
                    return $users;
                }
            }else{
                die("Query failed!!");
            }

		}


		public static function change_status($id){
			$sql = "SELECT * FROM users WHERE id = $id";

			$result = Database::select($sql);

			$user = mysqli_fetch_array($result);

			if($user['active']){
				$sql = "UPDATE users SET active = 0 WHERE id = $id";
				$is_updated = Database::update($sql);
				if($is_updated) return 0;
				die("Update query failed");

			}else{
				$sql = "UPDATE users SET active = 1 WHERE id = $id";
				$is_updated = Database::update($sql);
				if($is_updated) return 1;
				die("Update query failed");
			}
		}

	}

?>