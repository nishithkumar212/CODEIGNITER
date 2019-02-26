angular.module('Myform',[])
.controller('appcontroller',['$scope','$http',
function($scope,$http)
{
    $scope.user = {};
$scope.submitForm=function()
{
    $scope.message={};
       $http({
        method:'post',
       dataType:'json',
        data : $scope.user, //forms user object
        url:'http://localhost/codeigniter/Welcome/finddetails',
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
    }).then(function (data)
    {
         debugger;
         $scope.alertMessage = data.data.message;
    });
};
}]);