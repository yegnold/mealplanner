define([
  'backbone',
  'models/scheduled-meal'
], function(Backbone, ScheduledMeal){
	/**
	*  This view represents a bin
	*/
	var Bin = Backbone.View.extend({

		tagName: "div",
		className: "bin",
		events: {
			'dragover'	: 'handleDragOver',
			'dragleave' : 'handleDragLeave',
			'drop'		: 'handleDrop',
		},
		initialize: function() {
			
		},
		render: function() {
			// bin already exists on page, no need to define render method
		},
		
		/**
		 * If the element being dragged to this Bin is a ScheduledMeal View instance
		 * (i.e. the dataTransfer value contains ScheduledMeal), allow a drop here)
		 */
		handleDragOver: function(e) {
			var transfer_data = e.originalEvent.dataTransfer.getData('text/plain');
			if(transfer_data.match(/ScheduledMeal/)) {
				e.preventDefault();
				this.$el.addClass('active');
				return false;
			}
			return true;
			
		},
		handleDragLeave: function(e) {
			this.$el.removeClass('active');
		},
		/**
		 * Handle the drop of a ScheduledMeal instance on to this slot.
		 * In this case we want to delete the ScheduledMeal.
		 */
		handleDrop: function(e) {
			if (e.stopPropagation) {
				e.stopPropagation(); // stops the browser from redirecting.
			}
			// stop the browser from handling the drop 'normally'....
			e.preventDefault();
			
			e.originalEvent.dataTransfer.dropEffect = 'move';
			// The dataTransfer object contains the model name and ID of the dragged element.
			var transfer_data = e.originalEvent.dataTransfer.getData('text/plain');
			if(transfer_data.match(/ScheduledMeal:([0-9]+)$/)) {
				//console.log(e);
				var dropped_meal_parts = transfer_data.match(/ScheduledMeal:([0-9]+)$/);
				var scheduled_meal_model = new ScheduledMeal({id: dropped_meal_parts[1]});
				scheduled_meal_model.destroy();
				this.$el.removeClass('active');
				return true;
			}
			return false;
		},
		

	});
	// Return the view for the module
	return Bin;
});