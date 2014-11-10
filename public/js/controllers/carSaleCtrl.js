/**
 * Created by taevis on 11/8/14.
 */
angular.module('CarSaleCtrl', []).controller('carSaleController',['$scope','$http', 'customerSaleService', function($scope, $http, customerSaleService){
    "use strict";
    $scope.car = {};
    $scope.cars = [];
    $scope.customerNumber = customerSaleService.getCustomerIdNumber();
    $http.get('/api/cars/unsold').
        success(function(data) {
            $scope.cars=data;
        }).
        error(function(data) {
            console.log(data);
        });

    $scope.submitPurchaseOrder = function(){
        $http.post('/api/sales',{"when": new Date().toISOString().substring(0,10),"customer_id": $scope.customerNumber,
            "car_VIN": $scope.car.selected.VIN, "price": $scope.car.selected.msrp})
        .success(function(data){
            console.log(data);
        }).error(function(data){
           console.log(data);
        });
    }
}]);
