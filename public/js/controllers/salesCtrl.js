/**
 * Created by taevis on 11/8/14.
 */
angular.module('SalesCtrl', []).controller('salesController',['$location','$scope','$http','customerSaleService',function($location, $scope, $http, customerSaleService){
    "use strict";
    $scope.customer = {};
    $scope.customers = [];
    $http.get('/api/customers').
        success(function(data) {
            $scope.customers=data;
            angular.forEach($scope.customers, function(value){
                value.birthDate=new Date(value.birthDate);
            });
        }).
        error(function(data) {
            console.log(data);
        });

    $scope.nope = function(){
        $scope.customer.selected=undefined;
    };

    $scope.shouldISaveAndContinue = function(){
        if($scope.customer.selected) return "";
        else return "Save and ";
    };

    $scope.submitAndContinue = function(){
        if($scope.customer.selected){
            customerSaleService.saveCustomerIdNumber($scope.customer.selected.id);
            $location.path('/carsale');
        }
    }

}]);