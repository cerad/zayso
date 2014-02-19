var myApp = angular.module('myApp',[]);

myApp.factory("Data", function()
{
    return { message: "Data from a service"};
})
function FirstCtrl($scope, Data)
{
  $scope.data = Data;
}
function SecondCtrl($scope, Data)
{
  $scope.data = Data;
  
  $scope.reversedMessage = function(message)
  {
    return message.split(" ").reverse().join(" ");
  };
  $scope.reversedMessageBad = function()
  {
    return $scope.data.message.split(" ").reverse().join(" ");
  };
}


