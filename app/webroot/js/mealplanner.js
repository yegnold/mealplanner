define([
  'backbone'
], function(Backbone){
	
	var initialize = function() {
		require([
					'models/plannable-meal',
					'collections/plannable-meals',
					'views/plannable-meal',
					'views/slot',
					'models/scheduled-meal',
					'views/scheduled-meal',
					'views/bin'
				],
				function(
					PlannableMeal,
					PlannableMeals,
					PlannableMealLi,
					SlotTd,
					ScheduledMeal,
					ScheduledMealSpan,
					Bin
				) {
			
			var plannable_meal_models = [];
			var plannable_meal_views = [];
			var slot_views = [];
			var scheduled_meal_models = [];
			var scheduled_meal_views = [];
			
			/**
			 * Function to create a plannableMeal model and a plannable meal view for
			 * a dom element representing a plannable meal 
			 * Wonder if this should be done using PlannableMeals collection?
			 */
			function plannableMealFromDOMFactory(element) {
				var plannable_meal_model = new PlannableMeal;
				plannable_meal_model.fromDomElement(element);
				plannable_meal_models.push(plannable_meal_model);
		
				var plannable_meal_li = new PlannableMealLi({model: plannable_meal_model});
				plannable_meal_li.setElement(element);
				plannable_meal_views.push(plannable_meal_li);
			}
			/** 
			 * Set up all PlannableMeals. These can be drag and dropped.
			 */
			_.each(document.querySelectorAll('.plannable-meal'), plannableMealFromDOMFactory);
			
			/**
			 * Utility function to set up backbone views for slots
			 * Dragging a plannable meal on to one of these views will trigger the schedule of a meal.
			 */
			function slotFromDOMFactory(element) {
				var slot_td = new SlotTd();
				slot_td.setElement(element);
				slot_views.push(slot_td);
			}
			
			// The meals are droppable on to '.slot' tds
			_.each(document.querySelectorAll('.slot'), slotFromDOMFactory);
			
			/**
			 * Utility function to set up backbone views for scheduled meals
			 * Dragging a scheduled meal on to the bin will delete it.
			 */
			function scheduledMealFromDOMFactory(element) {
				var scheduled_meal_model = new ScheduledMeal;
				scheduled_meal_model.fromDomElement(element);
				scheduled_meal_models.push(scheduled_meal_model);
				
				var scheduled_meal_span = new ScheduledMealSpan({model: scheduled_meal_model});
				scheduled_meal_span.setElement(element);
				scheduled_meal_views.push(scheduled_meal_span);
			}
			
			// The scheduled meals are droppable on to '.bin'
			_.each(document.querySelectorAll('.scheduled-meal'), scheduledMealFromDOMFactory);
			
			var bin = new Bin;
			bin.setElement(document.getElementById('bin'));
		
		});
	}
	return {
		initialize: initialize
	};
});

/**
 *  Plan.
 *  Models:
 *   -PlannableMeal
 *   -ScheduledMeal
 *   
 *   Collections:
 *   - PlannableMealCollection
 *   - ScheduledMealCollection
 *   
 *   It is possible to DRAG PlannableMeal DOMG elements and DROP those elements on to td.slot - this should trigger creation of a ScheduledMeal.
 *   
 *   e.dataTransfer.setData('text/html', data)
 *   
 *   dragstart: set drag data dataTransfer
 *   drop:  take that data
 *   
 */