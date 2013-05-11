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
   
	/**
	 * 
	 * @param array $days An array of YYYY-MM-DD dates.
	 * @param array $participants The result of Participant::find('all') or similarly formatted array.
	 */
	public function findOrganisedByDaysandParticipants($days, $participants) {
		$organised_days = array();
		foreach($days as $day) {
			$organised_days[$day] = array();
			foreach($participants as $participant) {
				$organised_days[$day][$participant['Participant']['id']]['L'] = $this->find('all', 
						array('conditions' => 
							array('ScheduledMeal.participant_id' => $participant['Participant']['id'], 
								  'ScheduledMeal.date' => $day,
								  'ScheduledMeal.meal_type' => 'L')
							)
					);
				
				$organised_days[$day][$participant['Participant']['id']]['D'] = $this->find('all', 
						array('conditions' => 
							array('ScheduledMeal.participant_id' => $participant['Participant']['id'], 
								  'ScheduledMeal.date' => $day,
								  'ScheduledMeal.meal_type' => 'D')
							)
					);
			}
		}
		return $organised_days;
	}
}