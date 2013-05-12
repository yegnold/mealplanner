define([
  'backbone'
], function(Backbone){
	
	var initialize = function() {
		require(['models/plannable-meal', 'collections/plannable-meals'], function(PlannableMeal, PlannableMeals) {
			
			
			var bee_eff = new PlannableMeal;
			bee_eff.fromDomElement(document.getElementById('example-meal'));
			
			var false_list = [bee_eff, bee_eff, bee_eff];
			console.log(false_list);
			var collection = new PlannableMeals(false_list);
			console.log(collection.toJSON());
			
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
 *   
 */