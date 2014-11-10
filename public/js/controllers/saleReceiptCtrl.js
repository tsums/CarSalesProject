/**
 * Created by taevis on 11/9/14.
 */
/**
 * Created by taevis on 11/8/14.
 */
angular.module('SalesReceiptCtrl', []).controller('salesReceiptController',['$location','$scope','$http','customerSaleService',function($location, $scope, $http, customerSaleService){
    "use strict";

    $scope.salesIdNumber = customerSaleService.getSaleIdNumber();

    if(!$scope.salesIdNumber){
        $location.path('/sales');
    }

    $scope.saleObject = undefined;
    $scope.customerObject = undefined;
    $scope.carObject = undefined;
    $http.get('/api/sales/'+$scope.salesIdNumber).success(function(data){
        $scope.saleObject = data;
    }).error(function(data){
        console.log(data);
    });
    $http.get('/api/sales/'+$scope.salesIdNumber+'/customer').success(function(data){
        $scope.customerObject = data;
    }).error(function(data){
        console.log(data);
    });
    $http.get('/api/sales/'+$scope.salesIdNumber+'/car').success(function(data){
        $scope.carObject = data;
    }).error(function(data){
        console.log(data);
    });
}]);