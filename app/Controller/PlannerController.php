<?php
App::uses('AppController', 'Controller');

class PlannerController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Planner';


	public $uses = array('Meal', 'Participant');

    protected function getDaysForView($from_date, $num_days = 7) {
        $start_date_timestamp = strtotime($from_date);
        $return_days_array = array();
        for($i = 0; $i < $num_days; $i++) {
            array_push($return_days_array, date('Y-m-d', $start_date_timestamp + (3600*24*$i)));
        }
        
        return $return_days_array;
    }
    
    public function index($from_date = null) {
        if($from_date === null) {
            $from_date = date('Y-m-d');
        }
        $days_for_view = $this->getDaysForView($from_date, 7);
        
        $this->set('days', $days_for_view);
        $this->set('participants', $this->Participant->find('all'));
    }
}
