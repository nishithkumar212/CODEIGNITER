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
        debugger;
        if(data.data.error != '')
   {
   
    $scope.alertMessage = data.data.error;
   }
   else
   {  
    window.location.href='http://localhost/codeigniter/Welcome/direction.html';
    $scope.alertMessage = data.data.message;
   }
    });
};
}]);