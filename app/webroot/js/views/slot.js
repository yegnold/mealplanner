define([
  'backbone'
], function(Backbone){
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
		/*** 
		 * To do: are we able to detect what the element that's being dragged is, and either
		 * return false ("YES you can drop this here") or true ("NO you cant drop this here") dependent on this?
		 */
		handleDragOver: function(e) {
			e.preventDefault();
			return false;
		},
		handleDrop: function(e) {
			e.originalEvent.dataTransfer.dropEffect = 'copy';
			// The dataTransfer object contains the ID of the meal we want to plan.
			var plan_meal_id = e.originalEvent.dataTransfer.getData('text/plain');
			
		}

	});
	// Return the view for the module
	return SlotTd;
});