/**
 * Created by taevis on 11/8/14.
 */
angular.module('CarSaleCtrl', []).controller('carSaleController',['$scope','$http',function($scope,$http){
    "use strict";
    $scope.car = {};
    $scope.cars = [];
    $http.get('/api/cars').
        success(function(data) {
            $scope.cars=data;
        }).
        error(function(data) {
            console.log(data);
        });


}]);
