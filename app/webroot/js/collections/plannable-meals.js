define([
  'backbone',
  'models/plannable-meal'
], function(Backbone, PlannableMeal){
	var PlannableMeals = Backbone.Collection.extend({
		model: PlannableMeal
	});
	// Return the model for the module
	return PlannableMeals;
});
	