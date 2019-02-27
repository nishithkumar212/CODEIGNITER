//creating a module
angular.module('Myform', [])

    //creating the controller
    .controller('appcontroller', ['$scope', '$http',
        function ($scope, $http) {
            $scope.user = {};

            //Creating a function 
            $scope.submitForm = function () {
                $scope.message = {};
                $http({
                    method: 'post',
                    dataType: 'json',
                    data: $scope.user, //forms user object
                    //calling the api
                    url: 'http://localhost/codeigniter/Welcome/login',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (data) {
                    debugger
                    if (data.data.error != '') {
                        $scope.alertClass = 'alert-danger';
                        //Assigning the error to the message
                        $scope.alertMessage = data.data.error;
                    }
                    else {
                        $scope.alertClass = 'alert-success';
                        //Assigning the error to the message
                        $scope.alertMessage = data.data.message;
                    }
                });
            };
        }]);