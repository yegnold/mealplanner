require.config({
  paths: {
    underscore: 'underscore-min',
    backbone: 'backbone-min',
  },
  shim: {
        backbone : {
            deps : [ 'underscore' ],
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