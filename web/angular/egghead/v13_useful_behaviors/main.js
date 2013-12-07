var app = angular.module('behavior',[]);

app.directive('enter',function()
{
    function link(scope,element,attrs)
    {
        element.bind('mouseenter', function()
        {
            element.addClass(attrs.enter);
        })
    }
    return { link: link }
})
app.directive('leave',function()
{
    function link(scope,element,attrs)
    {
        element.bind('mouseleave', function()
        {
            element.removeClass(attrs.enter);
        })
    }
    return { link: link }
})

