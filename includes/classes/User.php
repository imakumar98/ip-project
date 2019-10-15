<?php 

	class User{

		private $name;
		private $position;




		//Function to return position string
		public function get_position($position_id){
			
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
	}



	$user = new User();
	$user->create('Ashwani','')



?>