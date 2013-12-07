var app = angular.module('behavior',[]);

app.directive('enter',function()
{
    return function(scope,element)
    {
        element.bind('mouseenter', function()
        {
            console.log('Entered');
        })
    };
});
app.directive('leave',function()
{
    function link(scope,element,attrs)
    {
        element.bind('mouseleave', function()
        {
            console.log('Left');
        })
    }
    return { link: link } // Docs recommend returning object
})

