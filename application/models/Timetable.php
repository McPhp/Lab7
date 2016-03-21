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
					array_push($record->booking, new Booking($booking));
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
		
		function __construct($booking){
			$this->type = (string)$booking->type;
			$this->start = (string)$booking->start;
			$this->end = (string)$booking->end;
			$this->building = $booking->building;
			$this->room = $booking->room;
			$this->instructorFirst = $booking->instructor->firstname;
			$this->instructorLast = $booking->instructor->lastname;
			
		}
		
	}
?>
