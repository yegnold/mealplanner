require.config({
  paths: {
	jquery: 'jquery-min',
	underscore: 'underscore-min',
    backbone: 'backbone-min',
  },
  shim: {
        backbone : {
            deps : [ 'underscore', 'jquery' ],
            exports : 'Backbone'
        }
    }
});

require([
  // Load our app module and pass it to our definition function
  'mealplanner',
], function(MealPlanner){
  MealPlanner.initialize();
});