define([
  'backbone'
], function(Backbone){
	var ScheduledMeal = Backbone.Model.extend({
		// TODO: Need to make URL proper innit bruv
		urlRoot: document.getElementById('planner-table').getAttribute('data-scheduled_meals_path'),
		defaults: function(){
			return {
				id: null,
				date: '1970-01-01',
				meal_id: 0,
				meal_type: 'L',
				participant_id: 0,
				is_disabled: 0,
			}
		},
		/**
		 *  Set up this model based on an existing dom element.
		 */
		fromDomElement: function(elem) {
			this.set('id', elem.getAttribute('data-id'));
			this.set('participant_id', elem.getAttribute('data-participant_id'));
			this.set('is_disabled', elem.getAttribute('data-is_disabled'));
			this.set('meal_type', elem.getAttribute('data-meal_type'));
			this.set('meal_id', elem.getAttribute('data-meal_id'));
			this.set('date', elem.getAttribute('data-date'));
			return this;
		}
	
	});
	// Return the model for the module
	return ScheduledMeal;
});