//Creating an module with the name
var angularFormApp = angular.module('angularFormApp', []);

//creating an controller with the name linked with the module
angularFormApp.controller('regController', ['$scope', '$http',
    function ($scope, $http) {
        $scope.user = {};

        //Creating a function 
        $scope.submitForm = function () {
            $scope.message = {};
            $http({
                method: 'post',
                dataType: 'json',
                data: $scope.user, //forms user object
                url: 'http://localhost/codeigniter/Welcome/add',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function (data) {
                debugger;
                if (data.data.error != '') {
                    //Assigning the error to the message
                    $scope.alertMessage = data.data.error;
                }
                else {
                    //Asssigning the message 
                    $scope.alertMessage = data.data.message;
                }
            });
        };
    }]);