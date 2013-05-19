define([
  'backbone'
], function(Backbone){
	var ScheduledMeal = Backbone.Model.extend({
		// TODO: Need to make URL proper innit bruv
		url: 'scheduled_meals/ajax',
		defaults: function(){
			return {
				id: 0,
				date: '1970-01-01',
				meal_id: 0,
				meal_type: 'L',
				participant_id: 0,
				is_disabled: 0,
				name: ''
			}
		},
		/**
		 *  Set up this model based on an existing dom element.
		 */
		fromDomElement: function(elem) {
			console.log('TODO: Need to set ScheduledMeal up based on DOM element');
			//this.set('id', elem.getAttribute('data-id'));
			//this.set('name', elem.getAttribute('data-name'));
			return this;
		}
	});
	// Return the model for the module
	return ScheduledMeal;
});