<?php
	class Timetable extends CI_Model
	{
		protected $xml = null;
		protected $courses = array();
		protected $days = array();
		protected $timeslots = array();
		protected $info = array();
		
		//constructor
		public function __construct()
		{
			parent::__construct();
			
			$this->xml = simplexml_load_file('data/schedule.xml');
			
			foreach($this->xml->info as $sched)
			{
				$record = new stdClass();
				$record->program = $sched->program;
				$record->year = $sched->year;
				$record->term = $sched->term;
				$record->set = $sched->set;
				array_push($this->info, $record);
			}
			
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
		
		function getInfo()
		{
			return $this->info;
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
                function getAllDays() {
                return array
                ("Monday"    => "Monday",
                 "Tuesday"   => "Tuesday",
                 "Wednesday" => "Wednesday",
                 "Thursday"  => "Thursday",
                 "Friday"    => "Friday");
                }

                function getAllTimes() {
                return array
                ("8:30"   => "8:30",
                 "9:30"   => "9:30",
                 "10:30"  => "10:30",
                 "11:30"  => "11:30",
                 "12:30"  => "12:30",
                 "1:30"   => "1:30",
                 "2:30"   => "2:30",
                 "3:30"   => "3:30",
                 "4:30"   => "4:30",
                 "5:30"    => "5:30");
                }
                function getDayBooking($day, $time) {
                $result = array();
                    foreach($this->days as $weekDay){
                        if($weekDay->day_of_the_week == $day) {
                            foreach($weekDay->booking as $booking) {
                                if ($booking->start == $time) {
                                    array_push($result, $booking);
                                }
                            }
                        }
                    }
                return $result;
                }
                
                function getCourseBooking($day, $time) {
                    $result = array();
                    foreach($this->courses as $course) {
                        foreach ($course->booking as $booking) {
                            if ($booking->day == $day && $booking->start == $time) {
                                array_push($result, $booking);
                            }
                        }
                    }
                    return $result;
                }
                
                function getTimeslotBooking($day, $time) {
                    $result = array();
                    foreach($this->timeslots as $timeslot) {
                        if($timeslot->start) {
                            foreach ($timeslot->booking as $booking) {
                                if ($booking->day == $day) {
                                    array_push($result, $booking);
                                }
                            }
                        }
                    }
                return $result;
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
		public $day = '';
		
		function __construct($booking)
		{
			$this->type = (string)$booking['type'];
			$this->start = (string)$booking['start'];
			$this->end = (string)$booking['end'];
			$this->course = (string)$booking['course'];
			$this->day = (string)$booking['day'];
			$this->building = $booking->building;
			$this->room = $booking->room;
			$this->instructorFirst = $booking->instructor->firstname;
			$this->instructorLast = $booking->instructor->lastname;
		}
	}
?>
