var Myform=angular.module("Myform",[]);
Myform.controller("appcontroller",['$scope','$http',
function($scope,$http)
{
    $scope.user = {};
$scope.myFunction=function()
{
    $scope.message={};
       $http({
        method:'post',
       dataType:'json',
        data : $scope.user, //forms user object
        url:'http://localhost/codeigniter/Welcome/login',
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
    }).then(function (data)
    {
        $scope.sucessMsg = "login sucess";
            $scope.message=data;
    });
};
}]);