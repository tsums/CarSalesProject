/**
 * Created by taevis on 11/8/14.
 */
angular.module('SalesCtrl', []).controller('salesController',['$sce','$scope','$http',function($sce, $scope,$http){
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

    $scope.trustAsHtml = function(value) {
        return $sce.trustAsHtml(value);
    };

    $scope.nope = function(){
        $scope.customer.selected=undefined;
    };

    $scope.shouldISaveAndContinue = function(){
        if($scope.customer.selected) return "";
        else return "Save and ";
    };

}]);