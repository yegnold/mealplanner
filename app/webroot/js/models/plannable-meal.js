define([
  'backbone'
], function(Backbone){
	var PlannableMeal = Backbone.Model.extend({
		defaults: function(){
			return {
				id: 0,
				name: "- -"
			}
		},
		/**
		 *  Set up this model based on an existing dom element.
		 */
		fromDomElement: function(elem) {
			this.set('id', elem.getAttribute('data-id'));
			this.set('name', elem.getAttribute('data-name'));
			return this;
		}
	});
	// Return the model for the module
	return PlannableMeal;
});