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
        url:'http://localhost/codeigniter/Welcome/login',
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
    }).then(function (data)
    {
        debugger
        if(data.data.error != '')
        {
         $scope.alertClass = 'alert-danger';
         $scope.alertMessage = data.data.error;
        }
        else
        {  
         $scope.alertClass = 'alert-success';
         $scope.alertMessage = data.data.message;
        }
    });
};
}]);