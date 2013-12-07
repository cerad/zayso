var app = angular.module('twitterApp',[]);

app.directive('enter',function()
{
    function link(scope,element,attrs)
    {
        element.bind('mouseenter', function()
        {
            // Not good
            // Requires directive to know scope function
          //scope.loadMoreTweets();
            
            // Does the same as above example, sort of like eval?
          //scope.$apply('loadMoreTweets()');
            
            // Pull the method name from the enter attribute
            scope.$apply(attrs.enter);
            
        })
    }
    return { link: link }
})
app.controller('twitterController',function($scope)
{
    $scope.loadMoreTweets = function()
    {
        console.log('Load more tweets');
    }
    $scope.deleteTweets = function()
    {
        console.log('Delete tweets');
    }
})
