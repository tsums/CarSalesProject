/**
 * Created by taevis on 11/8/14.
 */
angular.module('SalesCtrl', []).controller('salesController',['$sce','$scope',function($sce, $scope){
    "use strict";
    $scope.customer = {};
    $scope.customers = [
        { customerId:"000000001", lastName:"Savage", firstName: 'Adam',     email: 'adam@email.com', addressLine1:"123 Any Street", addressLine2:"", city:"Dayton", state:"NJ", zipCode:"08810"},
        { customerId:"000000002", lastName:"Savage", firstName: 'Adam',    email: 'adam@gmail.com', addressLine1:"123 Any Street", addressLine2:"", city:"Princeton", state:"NJ", zipCode:"08540"},
        { customerId:"000000003", lastName:"Adams", firstName: 'Estefanía', email: 'estefania@email.com', addressLine1:"123 Any Street", addressLine2:"", city:"Doylestown", state:"PA", zipCode:"00224"},
        { customerId:"000000004", lastName:"Emilio", firstName: 'Adrian',    email: 'adrian@email.com', addressLine1:"123 Any Street", addressLine2:"", city:"Philadelphia", state:"PA", zipCode:"00223"},
        { customerId:"000000005", lastName:"Esteban", firstName: 'Wladimir',  email: 'wladimir@email.com', addressLine1:"123 Any Street", addressLine2:"", city:"Newark", state:"NJ", zipCode:"07103"}
    ];

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