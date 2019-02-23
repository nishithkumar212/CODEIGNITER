var angularFormApp= angular.module('angularFormApp',[]);
angularFormApp.controller('regController',['$scope','$http',
function ($scope,$http)
{
     $scope.user = {};
$scope.submitForm=function()
{
    $scope.message={};
       $http({
        method:'post',
       dataType:'json',
        data : $scope.user, //forms user object
        url:'http://localhost/codeigniter/Welcome/add',
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
    }).then(function (data)
    {
        $scope.sucessMsg = "register sucess";
            $scope.message=data;
    });
};
}]);