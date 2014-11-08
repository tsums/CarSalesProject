/**
 * Created by taevis on 11/8/14.
 */
angular.module('SalesCtrl', []).controller('salesController',['$sce','$scope',function($sce, $scope){
    "use strict";
    $scope.customer = {};
    $scope.customers = [
        { lastName:"Savage", firstName: 'Adam',     email: 'adam@email.com',      age: 12, country: 'United States' },
        { lastName:"Sanchez", firstName: 'Amalie',    email: 'amalie@email.com',    age: 12, country: 'Argentina' },
        { lastName:"Adams", firstName: 'Estefanía', email: 'estefania@email.com', age: 21, country: 'Argentina' },
        { lastName:"Emilio", firstName: 'Adrian',    email: 'adrian@email.com',    age: 21, country: 'Ecuador' },
        { lastName:"Esteban", firstName: 'Wladimir',  email: 'wladimir@email.com',  age: 30, country: 'Ecuador' },
        { lastName:"Frenchy", firstName: 'Samantha',  email: 'samantha@email.com',  age: 30, country: 'United States' },
        { lastName:"Nicole", firstName: 'Nicole',    email: 'nicole@email.com',    age: 43, country: 'Colombia' },
        { lastName:"Reddit", firstName: 'Natasha',   email: 'natasha@email.com',   age: 54, country: 'Ecuador' },
        { lastName:"Find Me", firstName: 'Michael',   email: 'michael@email.com',   age: 15, country: 'Colombia' },
        { lastName:"O'Connor", firstName: 'Nicolás',   email: 'nicolas@email.com',    age: 43, country: 'Colombia' }
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