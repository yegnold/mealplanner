<?php
App::uses('AppModel', 'Model');
/**
 * ScheduledMeal represents a meal, planned for a given mealtime.
 * Examples include;
 * - Chicken Fanjitas on Wednesday 15th May 2013 at Dinner time.
 */
class ScheduledMeal extends AppModel {
    public $name = 'ScheduledMeal';
    public $useTable = 'meals_scheduled';
    public $belongsTo = array('Meal', 'Participant');
	public $order = 'ScheduledMeal.date ASC';
	public $actsAs = array('Containable');
   
	/**
	 * 
	 * @param array $days An array of YYYY-MM-DD dates.
	 * @param array $participants The result of Participant::find('all') or similarly formatted array.
	 */
	public function findOrganisedByDaysandParticipants($days, $participants) {
		$organised_days = array();
		foreach($days as $day) {
			$organised_days[$day] = array();
			foreach($participants as $participant_id => $participant) {
				$organised_days[$day][$participant_id]['L'] = $this->find('all', 
						array('conditions' => 
							array('ScheduledMeal.participant_id' => $participant_id, 
								  'ScheduledMeal.date' => $day,
								  'ScheduledMeal.meal_type' => 'L')
							)
					);
				
				$organised_days[$day][$participant_id]['D'] = $this->find('all', 
						array('conditions' => 
							array('ScheduledMeal.participant_id' => $participant_id, 
								  'ScheduledMeal.date' => $day,
								  'ScheduledMeal.meal_type' => 'D')
							)
					);
			}
		}
		return $organised_days;
	}
	
	/**
	 * Generate a list of scheduled meals for a range of days.
	 * @param array $participant_list - The results of Participant::find('list');
	 * @param type $date_list - A numerically-indexed list of dates in YYYY-MM-DD format.
	 */
	public function findAllScheduledMealsForDateList($participant_list, $date_list) {
		return $this->find('all',
				array('conditions' => array('ScheduledMeal.participant_id' => array_keys($participant_list), 
						'ScheduledMeal.date' => array_values($date_list),
						)
					,
					'contain' => array('Participant', 'Meal' => array('ShoppingListCheckItem'))
					)
			);
	}
	
	/**
	 * Generate a list of required ingredients/shopping items for a range of days.
	 * This should include the number of instances of each ingredient and the list of meals they're included in.
	 * This can optionally be displayed to the user.
	 * @param array $participant_list - The results of Participant::find('list');
	 * @param type $date_list - A numerically-indexed list of dates in YYYY-MM-DD format.
	 */
	public function generateShoppingListForDateList($participant_list, $date_list) {		
		
		/**
		 * Note. I'm sure there's a more efficient or straightforward way of doing this,
		 * maybe with the more complex model find() functionality..
		 * 
		 * As a future optimisation this method should be revisited. 
		 * 
		 * I think a good approach might be to do $this->Meal->ShoppingListCheckItem->find() with some joins back.
		 *
		 */
		
		$scheduled_meals = $this->findAllScheduledMealsForDateList($participant_list, $date_list);
		
		$return_array = array();
		
		foreach($scheduled_meals as $k => $scheduled_meal) {
			if(!array_key_exists('Meal', $scheduled_meal) || !is_array($scheduled_meal['Meal'])) {
				continue;
			}
			if(!array_key_exists('ShoppingListCheckItem', $scheduled_meal['Meal'])) {
				continue;
			}
			foreach($scheduled_meal['Meal']['ShoppingListCheckItem'] as $check_item) {
				$return_array[$check_item['id']]['name'] = $check_item['name'];
				if(!array_key_exists('instances', $return_array[$check_item['id']])) {
					$return_array[$check_item['id']]['instances'] = 0;
				}
				$return_array[$check_item['id']]['instances']++;
				
				$return_array[$check_item['id']]['meals'][$k]['ScheduledMeal'] = $scheduled_meal['ScheduledMeal'];
				$return_array[$check_item['id']]['meals'][$k]['Participant'] = $scheduled_meal['Participant'];
				unset($scheduled_meal['Meal']['ShoppingListCheckItem']);
				$return_array[$check_item['id']]['meals'][$k]['Meal'] = $scheduled_meal['Meal'];
			}
		}
		
		return $return_array;
		
	}
}