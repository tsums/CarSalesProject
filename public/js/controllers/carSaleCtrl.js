/**
 * Created by taevis on 11/8/14.
 */
angular.module('CarSaleCtrl', []).controller('carSaleController',['$scope','$http', 'customerSaleService', function($scope, $http, customerSaleService){
    "use strict";
    $scope.car = {};
    $scope.cars = [];
    $scope.customerNumber = customerSaleService.getCustomerIdNumber();
    $http.get('/api/cars').
        success(function(data) {
            $scope.cars=data;
        }).
        error(function(data) {
            console.log(data);
        });


}]);
