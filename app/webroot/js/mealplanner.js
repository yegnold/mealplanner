define([
  'backbone'
], function(Backbone){
	
	var initialize = function() {
		require(['models/plannable-meal'], function(PlannableMeal) {
			
			/*
			var bee_eff = new PlannableMeal;
			bee_eff.fromDomElement(document.getElementById('example-meal'));
			alert(bee_eff.get('name'));
			*/
		});
	}
	return {
		initialize: initialize
	};
});