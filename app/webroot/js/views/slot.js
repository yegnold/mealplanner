define([
  'backbone',
  'models/scheduled-meal'
], function(Backbone, ScheduledMeal){
	/**
	*  This view represents a slot, on to which meals can be planned
	*/
	var SlotTd = Backbone.View.extend({

		tagName: "td",
		className: "slot",
		events: {
			'dragover'	: 'handleDragOver',
			'drop'		: 'handleDrop'
		},
		initialize: function() {
			
		},
		render: function() {
			
		},
		/**
		 * If the element being dragged to this SlotTd is a PlannableMeal View instance
		 * (i.e. the dataTransfer value contains PlannableMeal), allow a drop here)
		 */
		handleDragOver: function(e) {
			var transfer_data = e.originalEvent.dataTransfer.getData('text/plain');
			if(transfer_data.match(/PlannableMeal/)) {
				e.preventDefault();
				return false;
			}
			return true;
			
		},
		/**
		 * Handle the drop of a PlannableMeal instance on to this slot.
		 * In this case we want to create a new instance of the ScheduledMeal model.
		 */
		handleDrop: function(e) {
			if (e.stopPropagation) {
				e.stopPropagation(); // stops the browser from redirecting.
			}
			// stop the browser from handling the drop 'normally'....
			e.preventDefault();
			
			e.originalEvent.dataTransfer.dropEffect = 'copy';
			// The dataTransfer object contains the model name and ID of the dragged element.
			var transfer_data = e.originalEvent.dataTransfer.getData('text/plain');
			if(transfer_data.match(/PlannableMeal:([0-9]+)$/)) {
				var new_scheduled_meal = new ScheduledMeal;
				new_scheduled_meal.set('meal_type', e.target.getAttribute('data-meal_type'));
				new_scheduled_meal.set('participant_id', parseInt(e.target.getAttribute('data-participant_id')));
				new_scheduled_meal.set('date', e.target.getAttribute('data-date'));
				new_scheduled_meal.set('is_disabled', 0);
				// Pull out the dropped meal ID from the dataTransfer data.
				var dropped_meal_parts = transfer_data.match(/PlannableMeal:([0-9]+)$/);
				new_scheduled_meal.set('meal_id', parseInt(dropped_meal_parts[1]));
				console.log(new_scheduled_meal.save());
			}
			
		}

	});
	// Return the view for the module
	return SlotTd;
});