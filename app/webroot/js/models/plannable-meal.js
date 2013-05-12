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
		
		fromDomElement: function(elem) {
			alert('Todo: Set up the instance based on HTML properties of elem.');
			this.set('id', 0);
			this.set('name', '');
			return this;
		}
	});
	// Return the model for the module
	return PlannableMeal;
});