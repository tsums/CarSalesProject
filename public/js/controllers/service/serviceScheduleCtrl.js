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

}]);