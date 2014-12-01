/**
 * Created by taevis on 11/18/14.
 */
angular.module('ServiceCtrl', []).controller('serviceController',['$location','$scope','$http',function($location, $scope, $http){
    "use strict";

    $scope.appointment = {};
    $scope.appointments = undefined;
    $http.get('/api/appointments', {params:{"pending":"true"}}).
        success(function(data) {
            console.log(data);
            $scope.appointments=data;
        }).
        error(function(data) {
            console.log(data);
        });

    $scope.isValidInput = function(){
        return $scope.appointment.selected!=undefined;
    };

    $scope.submitting = false;

    $scope.findAppointment = function(){

        $http.get('/api/appointments/'+$scope.appointment.selected.id).
            success(function(data) {
                $scope.appointment.fetched = data;
                console.log(data);
                $scope.submitting = false;
            }).
            error(function(data) {
                console.log(data);
            });
    }

    $scope.isValidCheckIn = function(){
        return $scope.appointment.arrived != null;
    };

    $scope.checkIn = function(){

        $http.put('/api/appointments/'+$scope.appointment.fetched.id,{arrived:$scope.appointment.arrived}).
            success(function(data) {
                $scope.appointment.fetched = data;
                console.log(data);
                $scope.submitting = false;
            }).
            error(function(data) {
                console.log(data);
            });
    }

    $scope.isValidCheckOut = function(){
        return $scope.appointment.departed != null;
    };

    $scope.checkOut = function(){

        $http.put('/api/appointments/'+$scope.appointment.fetched.id,{departed:$scope.appointment.departed}).
            success(function(data) {
                $scope.appointment.fetched = data;
                console.log(data);
                $scope.submitting = false;
            }).
            error(function(data) {
                console.log(data);
            });
    }

}]);