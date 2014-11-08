/**
 * Created by taevis on 11/8/14.
 */
angular.module('MainCtrl', []).controller('mainController',['$rootScope','$location', function($rootScope, $location){
    "use strict";
    $rootScope.salesPage = $location.path()=='/sales';
    $rootScope.servicePage = $location.path()=='/service';
    $rootScope.statsPage = $location.path()=='/stats';
    $rootScope.$watch(function(){return $location.path();}, function(newValue, oldValue){
        if(newValue!==oldValue){
            $rootScope.salesPage = $location.path()=='/sales';
            $rootScope.servicePage = $location.path()=='/service';
            $rootScope.statsPage = $location.path()=='/stats';

        }

    });
    console.log($location.path());
    $rootScope.on = false;
}]);