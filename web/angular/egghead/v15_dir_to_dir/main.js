var app = angular.module('superApp',[]);

app.directive('superhero',function()
{
    function controller($scope)
    {
        $scope.abilities = [];
        
        this.addStrength = function() { $scope.abilities.push('strength'); }
        this.addSpeed    = function() { $scope.abilities.push('speed');    }
        this.addFlight   = function() { $scope.abilities.push('flight');   }
    }
    function link(scope,element,attrs)
    {
        element.addClass('button');
        element.bind('mouseenter', function()
        {
            console.log(scope.abilities);
        })
    }
    // Isolate scope with controller
    // Assignes abilities to individual elements
    return { restrict: 'E', controller: controller, link: link, scope: {} }
})
app.directive('strength',function()
{
    function link(scope,element,attrs,controller)
    {
        controller.addStrength();
    }
    return { restrict: 'A', require: 'superhero', link: link }
})
app.directive('speed',function()
{
    function link(scope,element,attrs,controller)
    {
        controller.addSpeed();
    }
    return { restrict: 'A', require: 'superhero', link: link }
})
app.directive('flight',function()
{
    function link(scope,element,attrs,controller)
    {
        controller.addFlight();
    }
    return { restrict: 'A', require: 'superhero', link: link }
})
