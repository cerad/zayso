var myApp = angular.module('myApp',[]);

/* ====================================================
 * TODO: Want to use resource instead of http
 */
myApp.factory("PersonsFactory",function($http)
{
    var persons = {};
    
    $http.get('http://local.zayso.org/cerad2/api/v1/persons').success(function(data) 
    {
        persons.list = data;
    });
    
    return persons;
});

function PersonsController($scope, PersonsFactory)
{
    $scope.persons = PersonsFactory;
}
