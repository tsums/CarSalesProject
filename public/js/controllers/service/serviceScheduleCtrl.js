/**
 * Created by taevis on 11/19/14.
 */
angular.module('ServiceScheduleCtrl', []).controller('serviceScheduleController',['$location','$scope','$http',function($location, $scope, $http){
    "use strict";
    $scope.serviceAppointment = {};
    $scope.cars = undefined;
    $http.get('/api/cars/sold').
        success(function(data) {
            $scope.cars=data;
        }).
        error(function(data) {
            console.log(data);
        });

    $scope.isValidInput = function(){
        return $scope.serviceAppointment.apptTime != undefined && $scope.serviceAppointment.timeTaken != undefined && typeof($scope.serviceAppointment.timeTaken) == "number" && $scope.serviceAppointment.timeTaken > 0 && $scope.serviceAppointment.timeTaken <= 9000;
    };

    $scope.submitting = false;

    $scope.scheduleAppointment = function(){

        $http.post('/api/appointments',{car_id:$scope.serviceAppointment.car.id,scheduled:(new Date($scope.serviceAppointment.apptTime)).toISOString(),time_est:$scope.serviceAppointment.timeTaken}).
            success(function(data) {
                $scope.serviceAppointment = {};
                console.log(data);
                $scope.submitting = false;
            }).
            error(function(data) {
                console.log(data);
            });
    }

}]);