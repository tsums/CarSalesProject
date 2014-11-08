/**
 * Created by taevis on 11/8/14.
 */
angular.module('SalesCtrl', []).controller('salesController',['$sce','$scope',function($sce, $scope){
    "use strict";
    $scope.customer = {};
    $scope.customers = [
        { customerId:"000000001", lastName:"Savage", firstName: 'Adam',     email: 'adam@email.com', addressLine1:"123 Any Street", addressLine2:"", city:"Dayton", state:"NJ", zipCode:"08810", dob:new Date("1980-01-31"), phone:"9088675309"},
        { customerId:"000000002", lastName:"Savage", firstName: 'Adam',    email: 'adam@gmail.com', addressLine1:"123 Any Street", addressLine2:"", city:"Princeton", state:"NJ", zipCode:"08540", dob:new Date("1990-01-31"), phone:"9088675309"},
        { customerId:"000000003", lastName:"Adams", firstName: 'Estefanía', email: 'estefania@email.com', addressLine1:"123 Any Street", addressLine2:"", city:"Doylestown", state:"PA", zipCode:"00224", dob:new Date("1970-01-31"), phone:"9088675309"},
        { customerId:"000000004", lastName:"Emilio", firstName: 'Adrian',    email: 'adrian@email.com', addressLine1:"123 Any Street", addressLine2:"", city:"Philadelphia", state:"PA", zipCode:"00223", dob:new Date("1980-01-20"), phone:"9088675309"},
        { customerId:"000000005", lastName:"Esteban", firstName: 'Wladimir',  email: 'wladimir@email.com', addressLine1:"123 Any Street", addressLine2:"", city:"Newark", state:"NJ", zipCode:"07103", dob:new Date("1980-03-31"), phone:"9088675309"}
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