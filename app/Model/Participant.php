<?php
App::uses('AppModel', 'Model');
/**
 * Participant represents a person who has meals planned for them
 * Examples include;
 * - Ed
 * - Kat
 */
class Participant extends AppModel {
    public $hasMany = array(
        'ScheduledMeal'
    );
   
}