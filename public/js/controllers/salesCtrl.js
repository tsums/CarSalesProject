/**
 * Created by taevis on 11/8/14.
 */
angular.module('SalesCtrl', []).controller('salesController',['$location','$scope','$http','customerSaleService',function($location, $scope, $http, customerSaleService){
    "use strict";
    $scope.submitting = false;
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

    var validateCreate = function(jsonValidate){
        if(jsonValidate.name_last&&jsonValidate.name_first&&jsonValidate.address_1&&jsonValidate.city&&(jsonValidate.state).length==2&&(jsonValidate.zip).length==5&&jsonValidate.phone&&(jsonValidate.birthDate.toISOString().substring(0,10)).length==10&&jsonValidate.email){
            return true;
        } else{
            console.log(jsonValidate);
            return false;
        }
    };

    $scope.submitAndContinue = function(){
        $scope.submitting = true;
        if($scope.customer.selected) {
            customerSaleService.saveCustomerIdNumber($scope.customer.selected.id);
            $location.path('/carsale');
        } else if ($scope.customer.create && validateCreate($scope.customer.create)){
            $scope.customer.create.birthDate.toISOString().substring(0,10);
            $http.post('/api/customers',$scope.customer.create).success(function(data){
                customerSaleService.saveCustomerIdNumber(data.id);
                $location.path('/carsale');
            }).error(function(data){
                console.log(data);
                $scope.submitting = false;
            });
        } else {
            $scope.submitting = false;
        }
    }

}]);