<?php
App::uses('AppModel', 'Model');
/**
 * Meal represents a meal that could be planned for a given mealtime.
 * Examples include;
 * - Chicken Fanjitas
 * - Tomato Soup
 */
class Meal extends AppModel {
    public $name = 'Meal';
	public $order = 'Meal.name ASC';
    public $hasAndBelongsToMany = array(
        'ShoppingListCheckItem' => array(
            'className'              => 'ShoppingListCheckItem',
            'joinTable'              => 'meals_shopping_list_check_items',
            'foreignKey'             => 'meals_id',
            'associationForeignKey'  => 'shopping_list_check_items_id',
            'unique'                 => true,
        )
    );
}