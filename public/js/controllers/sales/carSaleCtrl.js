/**
 * Created by taevis on 11/8/14.
 */
angular.module('CarSaleCtrl', []).controller('carSaleController',['$scope','$http', '$location', 'customerSaleService', function($scope, $http, $location, customerSaleService){
    "use strict";
    $scope.car = {};
    $scope.cars = [];
    $scope.customerNumber = customerSaleService.getCustomerIdNumber();

    if(!$scope.customerNumber){
        $location.path('/sales');
    }

    $scope.submitting = false;
    $http.get('/api/cars/unsold').
        success(function(data) {
            $scope.cars=data;
        }).
        error(function(data) {
            console.log(data);
        });

    $scope.isValidPurchase = function(){
        //Checks if the car is selected, and then checks if the msrp is of valid string.
        return $scope.car.selected && ($scope.car.selected.msrp.match(/\./g) || []).length < 2 &&(($scope.car.selected.msrp.indexOf('.')==$scope.car.selected.msrp.length-3)||($scope.car.selected.msrp.indexOf('.')==-1))
    };


    $scope.submitPurchaseOrder = function(){
        $scope.submitting = true;
        if($scope.isValidPurchase()){
            $http.post('/api/sales',{"when": new Date().toISOString().substring(0,10),"customer_id": $scope.customerNumber,
                "car_id": $scope.car.selected.id, "price": $scope.car.selected.msrp})
                .success(function(data){
                    customerSaleService.saveSaleIdNumber(data.id);
                    $location.path('/salereceipt');
                }).error(function(data){
                    console.log(data);
                    $scope.submitting = false;
                });
        } else {
            $scope.submitting = false;
        }

    }
}]);
