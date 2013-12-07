var myApp = angular.module('myApp',[]);

myApp.factory("Avengers",function($http)
{
    var avengers = {};
    
    $http.get('avengers.json').success(function(data) 
    {
        avengers.cast = data;
    });
    
    return avengers;
});

function AvengersCtrl($scope, Avengers)
{
    $scope.avengers = Avengers;
}
