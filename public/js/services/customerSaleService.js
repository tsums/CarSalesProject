/**
 * Created by taevis on 11/8/14.
 */
angular.module('CustSaleSrv', []).service('customerSaleService',function(){
    "use strict";
   var customerIdNumber = undefined;

    var saveCustomerIdNumber = function(idNumber){
        customerIdNumber = idNumber;
    };

    var getCustomerIdNumber = function(){
        return customerIdNumber;
    };

    var resetCustomerIdNumber = function(){
        customerIdNumber = undefined;
    };

    return {
        saveCustomerIdNumber: saveCustomerIdNumber,
        getCustomerIdNumber: getCustomerIdNumber,
        resetCustomerIdNumber: resetCustomerIdNumber
    };
});