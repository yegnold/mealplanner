<?php
class ScheduledMealsController extends AppController {
    public $scaffold = 'admin';
    public $components = array('RequestHandler');
    
    public function index() {
        $scheduled_meals = $this->ScheduledMeal->find('all');
        $this->set(array(
            'scheduled_meals' => $scheduled_meals,
            '_serialize' => array('scheduled_meals')
        ));
    }

    public function view($id) {
        $scheduled_meal = $this->ScheduledMeal->findById($id);
        $this->set(array(
            'scheduled_meal' => $scheduled_meal,
            '_serialize' => array('scheduled_meal')
        ));
    }
    
    public function add() {
        $this->ScheduledMeal->create();
        if ($this->ScheduledMeal->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $scheduled_meal = $this->ScheduledMeal->findById($this->ScheduledMeal->id);
        $this->set(array(
            'message' => $message,
            'name' => $scheduled_meal['Meal']['name'],
            'id' => $this->ScheduledMeal->id,
            '_serialize' => array('message', 'id', 'name')
        ));
    }

    public function edit($id) {
        $this->ScheduledMeal->id = $id;
        if ($this->ScheduledMeal->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->ScheduledMeal->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}