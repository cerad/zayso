var app = angular.module('phoneApp',[]);

app.controller('phoneController',function($scope) {
    $scope.callHome = function() {
        console.log("Called home");
    }
})

app.directive('phone',function() {
    return {
        template: '<div class="button" ng-click="dial()">Call Home</div>',
        scope: {
            dial: '&' // Expression binding
        }
    }
})
