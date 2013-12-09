var app = angular.module('drinkApp',[]);

/* =================================================
 * Two way binding between controllerFlavor and flavor
 * Not supposed to be very useful
 * Uses a property as opposed to a string value
 */
app.controller('drinkController',function($scope) {
    $scope.controllerFlavor = 'Blackberry';
})

app.directive('drink',function() {
    return {
        restrict: 'A', 
        template: '<input type="text" ng-model="flavor"/>',
      //template: '<div>{{ flavor }}</div>',
        scope: {
            flavor: '=' // Expects object binding
        }
    }
})
