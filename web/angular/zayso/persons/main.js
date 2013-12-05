var myApp = angular.module('myApp',[]);

myApp.factory("Persons",function($http)
{
    var persons = {};
    
    $http.get('http://local.zayso.org/cerad2/api/v1/persons').success(function(data) 
    {
        persons.list = data;
    });
    
    return persons;
});

function PersonsCtrl($scope, Persons)
{
    $scope.persons = Persons;
}
