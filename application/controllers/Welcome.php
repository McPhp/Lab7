<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['pagebody'] = 'welcome';
		
		$this->data['scheduleInfo'] = $this->Timetable->getInfo();
		$this->data['courses'] = $this->Timetable->getCourses();
		$this->data['days'] = $this->Timetable->getDays();
		$this->data['timeslots'] = $this->Timetable->getTimeslots();
                $this->data['alldays'] = form_dropdown('day',  $this->Timetable->getAllDays());
                $this->data['alltimes'] = form_dropdown('time', $this->Timetable->getAllTimes());
                
                $this->data['courseMsg'] = "";
                $this->data['timeslotMsg'] = "";
                $this->data['dayMsg'] = "";
                $this->data['bingo'] = "";
                $this->data['match'] = "";
		
		$this->render();
	}
        
        public function search() {
            $this->data['pagebody']  = "welcome";
            $this->data['scheduleInfo'] = $this->Timetable->getInfo();
            $this->data['courses'] = $this->Timetable->getCourses();
            $this->data['days'] = $this->Timetable->getDays();
            $this->data['timeslots'] = $this->Timetable->getTimeslots();
            $this->data['alldays'] = form_dropdown('day',  $this->Timetable->getAllDays());
            $this->data['alltimes'] = form_dropdown('time', $this->Timetable->getAllTimes());
            
            $day = $this->input->post('day');
            $time = $this->input->post('time');
            
            $days = $this->Timetable->getDayBooking($day, $time);
            $courses = $this->Timetable->getCourseBooking($day, $time);
            $timeslot = $this->Timetable->getTimeslotBooking($day, $time);
            
            
        
        $nomatch = false;
        if (count($days) != 1) {
            $nomatch = true;
            $this->data['courseMsg']   = "by days gives less or more than 1";
        }
        if (count($timeslot) != 1) {
            $nomatch = true;
            $this->data['courseMsg']   = "by timeslot gives less or more than 1";
        }
        if (count($courses) != 1) {
            $nomatch = true;
            $this->data['courseMsg']   = "by courses gives less or more than 1";
        }
  
        if ($nomatch) {
            $this->data['bingo']   = "";
            $this->data['match'] = "";
            $this->render();
            return;
        } else {
            $result = array();
            foreach($timeslot[0] as $key => $info) {
                $result[$key] = $info;
            }
            $this->data['courseMsg'] = "";
            $this->data['bingo']   = "Bingo";
            $this->data['match'] = "Course: " . $result['course'] . "<br>Day: " . $result['day'] . 
                   "<br>Type: ". $result['type'] . "<br>Room: " . $result['room'] . "<br>Building: "
                    . $result['building'] . "<br>Teacher: " . $result['instructorLast'] . ", " . $result['instructorFirst'];
            $this->render();
        }
    }
}