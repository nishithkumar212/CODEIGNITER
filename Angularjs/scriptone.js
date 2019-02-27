var app = angular.module('MyApp', ["ngStorage"])
app.controller('MyController', function ($scope, $localStorage, $window) {
    $scope.Save = function () 
    {  
        // var credentials = {
        //     'first' : '$scope.firstname',
        //     'second': '$scope.lastname',
        //     // 'third' :'$scope.email',
        //     // 'fourth':'$scope.password',
        //     // '$fifth':'$scope.phonenumber',
        // }
        $localStorage.LocalMessage=" $scope.firstname";
    }
$scope.Get = function () 
{
    $window.alert("the message is" + $localStorage.LocalMessage );
}
});