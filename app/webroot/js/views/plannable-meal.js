define([
  'backbone', 'mustache', 'views/templates/plannable_meal_li'
], function(Backbone, Mustache, PlannableMealLiTemplate){
	/**
	*  This view represents a plannable meal List Item.
	*/
	var PlannableMealLi = Backbone.View.extend({

		tagName: "li",
		className: "meal plannable-meal",
		events: {
			'dragstart': 'handleDragStart',
			'dragover': 'handleDragOver',
			'dragend': 'handleDragEnd',
			'drop': 'handleDrop'
		},
		initialize: function() {
			this.listenTo(this.model, "change", this.render);
		},
		render: function() {
			this.$el.attr('id','plannable-meal-' + this.model.id);
			this.$el.attr('data-id', this.model.get('id'));
			this.$el.attr('data-name', this.model.get('name'));
			this.$el.html(Mustache.to_html(PlannableMealLiTemplate, this.model.toJSON()));
			return this;
		},
		handleDragStart: function(e) {
			e.originalEvent.dataTransfer.effectAllowed = 'copy';
			e.originalEvent.dataTransfer.setData('text/plain', 'PlannableMeal:'+this.model.get('id'));
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
			return true;
		}

	});
	// Return the view for the module
	return PlannableMealLi;
});