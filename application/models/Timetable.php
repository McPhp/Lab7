<?php
	class Timetable extends CI_Model
	{
		protected $xml = null;
		protected $courses = array();
		protected $days = array();
		protected $timeslots = array();
		
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
				
				foreach($course->booking as $booking)
					array_push($record->booking, new Booking($booking));
					
				array_push($this->courses, $record);
			}
			
			// build list of days
			foreach($this->xml->days->day as $day)
			{
				$record = new stdClass();
				$record->day_of_the_week = (string)$day['day_of_the_week'];
				$record->booking = array();
				
				foreach($day->booking as $booking)
					array_push($record->booking, new Booking($booking));
				
				array_push($this->days, $record);
			}
			
			foreach($this->xml->timeslots->hour as $time)
			{
				$record = new stdClass();
				$record->start = (string) $time['start'];
				$record->booking = array();
				
				foreach($time->booking as $booking)
					array_push($record->booking, new Booking($booking));
					
				array_push($this->timeslots, $record);
			}
			
		}
		
		/* Facets */
		function getCourses()
		{
			return $this->courses;
		}
		
		function getDays()
		{
			return $this->days;
		}
		
		function getTimeslots()
		{
			return $this->timeslots;
		}
	}
	
	class Booking extends CI_Model
	{
		public $type = '';
		public $start = '';
		public $end = '';
		public $room = '';
		public $course = '';
		public $building = '';
		public $instructorFirst = '';
		public $instructorlast = '';
		
		function __construct($booking)
		{
			$this->type = (string)$booking['type'];
			$this->start = (string)$booking['start'];
			$this->end = (string)$booking['end'];
			$this->course = (string)$booking['course'];
			$this->building = $booking->building;
			$this->room = $booking->room;
			$this->instructorFirst = $booking->instructor->firstname;
			$this->instructorLast = $booking->instructor->lastname;
		}
	}
?>
