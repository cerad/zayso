var myApp = angular.module('myApp',[]);

myApp.Person        = function(params) { angular.extend(this,params); };
myApp.PersonFed     = function(params) { angular.extend(this,params); };
myApp.PersonFedOrg  = function(params) { angular.extend(this,params); };
myApp.PersonFedCert = function(params) { angular.extend(this,params); };

myApp.Person.prototype = 
{   
    getFed: function(role)
    {
        // Relies on index array, loop might be better?
        var params = this.feds[role] === undefined ? {} : this.feds[role];
        
        return new myApp.PersonFed(params);
    }
};
myApp.PersonFed.prototype = 
{   
    getCert: function(role)
    {
        // Relies on index array, loop might be better?
        var params = this.certs[role] === undefined ? {} : this.certs[role];
        
        return new myApp.PersonFedCert(params);
    },
    getOrg: function(role)
    {
        // Relies on index array, loop might be better?
        var params = this.orgs[role] === undefined ? {} : this.orgs[role];
        
        return new myApp.PersonFedOrg(params);
    }
};

/* ====================================================
 * TODO: Want to use resource instead of http
 */
myApp.factory("PersonsFactory",function($http)
{
    var persons = {};
    
    persons.list = new Array();
    
    $http.get('http://local.zayso.org/cerad2/api/v1/persons').success(function(items) 
    {
      //for (var i = 0, len = items.length; i < len; i++)
        for (var i in items)
        {
            // Assigning the prototype does not seem to work
            // items[i].prototype = myApp.Person.prototype;
            // console.log(items[i]);
            
            var person = new myApp.Person(items[i]);
            persons.list.push(person);
            
          //ng-repeat complains
          //persons.list[person.id] = person;
            
          //console.log(person);
          //console.log(person.laugh());
        }
        delete items;
    });
    
    return persons;
});

function PersonsController($scope, PersonsFactory)
{
    $scope.persons = PersonsFactory;
}
