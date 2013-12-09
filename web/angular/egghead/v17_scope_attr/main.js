var app = angular.module('drinkApp',[]);

/* =================================================
 * Could set types of flavors here
 * All "passed as string"
 */
app.controller('drinkController',function($scope) {
    $scope.controllerFlavor = 'Blackberry';
})

app.directive('drink',function() {
    return {
        restrict: 'A', 
        template: '<div>{{ flavor }}</div>',
        scope: {
            flavor: '@' // Reads the value of the flavor attribute
          //done: '&'   // Expression
        }
        // The @ replaces this
      //link: function(scope,element,attrs) {
      //    scope.flavor = attrs.flavor;
      //}
    }
})
