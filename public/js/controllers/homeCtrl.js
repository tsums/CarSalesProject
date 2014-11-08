/**
 * Created by taevis on 11/8/14.
 */
angular.module('HomeCtrl', []).controller('homeController',['$location','$scope',function($location, $scope){
    "use strict";
    $scope.helloMessage = "Hello World";
}]);