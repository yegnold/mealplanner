<?php
App::uses('AppController', 'Controller');

class PlannerController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Planner';


	public $uses = array('Meal', 'Participant', 'ScheduledMeal');

    protected function getDaysForView($from_date, $num_days = 7) {
        $start_date_timestamp = strtotime($from_date);
        $return_days_array = array();
        for($i = 0; $i < $num_days; $i++) {
            array_push($return_days_array, date('Y-m-d', $start_date_timestamp + (3600*24*$i)));
        }
        
        return $return_days_array;
    }
    
    protected function setAllParticipantsForView() {
         $all_participants = $this->Participant->find('list');
         $this->set('participants', $all_participants);
         return $all_participants;
    }
    
    protected function setDefaultMealListForView() {
         $this->set('default_meal_list', $this->Meal->find('all', array('order' => 'Meal.name ASC')));
    }
    
    public function index($from_date = null) {
        if($from_date === null) {
            $from_date = date('Y-m-d');
        }
        
		$from_date_timestamp = strtotime($from_date);
		$this->set('previous_day', date('Y-m-d', $from_date_timestamp - (3600 * 24)));
		$this->set('next_day', date('Y-m-d', $from_date_timestamp + (3600 * 24)));
		
        $days_for_view = $this->getDaysForView($from_date, 7);
        $this->set('days', $days_for_view);
        
		$participants = $this->setAllParticipantsForView();
		
		$view_organised_meals = $this->ScheduledMeal->findOrganisedByDaysandParticipants($days_for_view, $participants);
		$this->set('scheduled_meals', $view_organised_meals);

		$this->setDefaultMealListForView();
       
    }
	
	public function shopping_list() {
		$participants = $this->setAllParticipantsForView();
		
		if(!empty($this->data) && array_key_exists('generate_shopping_list_dates', $this->data)) {
			$shopping_list = $this->ScheduledMeal->generateShoppingListForDateList($participants, $this->data['generate_shopping_list_dates']);
			$this->set('shopping_list', $shopping_list);
		}
	}
}
