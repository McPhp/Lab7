<?php
	class Timetable extends CI_Model
	{
		protected $xml = null;
		protected $courses = array();
		protected $days = array();
		
		//constructor
		public function __construct(){
			parent::__construct();
			$this->xml = simplexml_load_file('data/schedule.xml');
			
			//build list of courses
			foreach($this->xml->courses->course as $course)
			{
				$record = new stdClass();
				$record->name = (string)$course['name'];
				$record->number = (string)$course['number'];
				$record->booking = array();
				
				foreach($course->booking as $booking){
					array_push($record->booking, new Booking($booking));
				}
				array_push($this->courses, $record);
			}
			
		}
		
		function getCourses()
		{
			return $this->courses;
		}
	}
	
	class Booking extends CI_Model
	{
		public $type = '';
		public $start = '';
		public $end = '';
		public $building = '';
		public $room = '';
		public $firstname = '';
		public $lastname = '';
		
		function __construct($booking){
			$this->type = (string)$booking['type'];
			$this->start = (string)$booking['start'];
			$this->end = (string)$booking['end'];
			$this->building = $booking->building;
			$this->room = $booking->room;
			$this->firstname = $booking->instructor->firstname;
			$this->lastname = $booking->instructor->lastname;
		}
		
	}
?>
