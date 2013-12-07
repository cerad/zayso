var app = angular.module('choreApp',[]);

/* ================================================
 * This is still very confusing
 * Clicking on the I am done button somehow trugger logChore
 * <kid done="logChore(chore)">
 */
app.controller('choreController',function($scope) {
    $scope.logChore = function(chore ) {
        console.log(chore + ' is done');
    }
})
app.directive('kid',function() {
    return {
        restrict: 'E', 
        templateUrl: 'kid.tpl.html',
        scope: {
            done: '&' // Expression
        }
    }
})
// Same but with template string
app.directive('kidx',function() 
{
    return {
        restrict: 'E', 
        template: 
                '<input type="text" ng-model="chore"/>' +
                '{{ chore }}' +
                '<div class="button" ng-click="done({ chore: chore })">I am done</div>',
        scope: {
            done: '&' // Expression
        }
    }
})
