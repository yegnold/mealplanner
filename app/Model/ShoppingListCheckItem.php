<?php
App::uses('AppModel', 'Model');
/**
 * A ShoppingListCheckItem represents an item that may be used by a planned meal.
 * examples include:
 * - Tomato Puree
 * - Chicken
 * etc. 
 */
class ShoppingListCheckItem extends AppModel {
    public $name = 'ShoppingListCheckItem';
	public $order = 'ShoppingListCheckItem.name ASC';
    public $hasAndBelongsToMany = array(
        'Meal' => array(
            'className'              => 'Meal',
            'joinTable'              => 'meals_shopping_list_check_items',
            'foreignKey'             => 'shopping_list_check_items_id',
            'associationForeignKey'  => 'meals_id',
            'unique'                 => true,
        )
    );
}