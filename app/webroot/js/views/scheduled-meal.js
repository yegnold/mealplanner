define([
  'backbone', 'mustache', 'views/templates/scheduled_meal_span'
], function(Backbone, Mustache, ScheduledMealSpanTemplate){
	/**
	*  This view represents a plannable meal List Item.
	*/
	var ScheduledMealSpan = Backbone.View.extend({

		tagName: "span",
		className: "meal scheduled-meal",
		events: {
			'dragstart': 'handleDragStart',
			'dragover': 'handleDragOver',
			'dragend': 'handleDragEnd',
			'drop': 'handleDrop'
		},
		initialize: function() {
			this.listenTo(this.model, "change", this.render);
			this.listenTo(this.model, 'destroy', this.remove);
		},
		render: function() {
			this.$el.attr('id','scheduled-meal-' + this.model.get('id'));
			this.$el.attr('draggable',true);
			this.$el.attr('data-id', this.model.get('id'));
			this.$el.attr('data-participant_id', this.model.get('participant_id'));
			this.$el.attr('data-is_disabled', this.model.get('is_disabled'));
			this.$el.attr('data-meal_type', this.model.get('meal_type'));
			this.$el.attr('data-meal_id', this.model.get('meal_id'));
			this.$el.attr('data-date', this.model.get('date'));
			this.$el.html(Mustache.to_html(ScheduledMealSpanTemplate, this.model.toJSON()));
			return this;
		},
		handleDragStart: function(e) {
			e.originalEvent.dataTransfer.effectAllowed = 'move';
			e.originalEvent.dataTransfer.setData('text/plain', 'ScheduledMeal:'+this.model.get('id'));
			return true;
		},
		handleDragOver: function(e) {
			// Drag over should be true, i.e. it is not possible to drop on to these items.
			return true;
		},
		handleDragEnd: function(e) {
			if (e.stopPropagation) {
				e.stopPropagation(); // stops the browser from redirecting.
			}
			if(e.originalEvent.dataTransfer.dropEffect === 'move') {
				// Remove the dragged element
				this.$el.remove();
			}
			return true;
		},

	});
	// Return the view for the module
	return ScheduledMealSpan;
});