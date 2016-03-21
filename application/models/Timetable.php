<?php
	class Timetable extends CI_Model {
		protected $xml = null;
		protected $courses = array();
		protected $booking = array();
		protected $days = array();
		protected $time = array();
		
		//constructor
		public function __construct(){
			parent::__construct();
			$this->xml = simplexml_load_file('data/schedule.xml');
			
			//build list of courses
			foreach($this->xml->courses->course as $course){
				$record = new stdClass();
				$record->name = (string)$course['name'];
				$record->number = (string)$course['number'];
				$record->booking = array();
				
				foreach($course->booking as $booking){
					
				}
			}
		}
		
		
	}
	
	class Booking extends CI_Model{
		protected $type = '';
		protected $start = '';
		protected $end = '';
		protected $building = '';
		protected $room = '';
		protected $instructorFirst = '';
		protected $instructorLast = '';
		
		
	}
?>
