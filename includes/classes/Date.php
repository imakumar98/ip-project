<?php

	class Date{

		//FUNCTION TO GET TODAYS DATE
	    public static function today_date(){
	        date_default_timezone_set('Asia/Kolkata');
	        $date = date('Y-m-d H:i:s');
	        return $date;
	    }

	    //GET PREVIOUS DATE AFTER SUBSTRACTION
	    public static function get_previous_date($difference){
	    	date_default_timezone_set('Asia/Kolkata');
	        $date = date_create(self::today_date());
	        $difference = $difference.' '.'days';
			date_sub($date,date_interval_create_from_date_string($difference));
			$startDate = date_format($date,"Y-m-d");
			$time = '00:00:00';

			return $startDate.' '.$time;
	    	
		}
		

		//GET YEAR
		public static function get_year(){
			return date('Y');
		}
	}


?>