var app = angular.module('superhero',[]);

app.directive('supermanAttribute',function()
{
    return {
        restrict: 'A',
        link: function()
        {
            console.log('I am working as an attribute');
        }
    };
});
app.directive('supermanClass',function()
{
    return {
        restrict: 'C',
        link: function()
        {
            console.log('I am working as a class');
        }
    };
});

app.directive('supermanElement',function()
{
    return {
        restrict: 'E',
        template: '<div>Here I am to save the day</div>'
    };
});
