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
   
}