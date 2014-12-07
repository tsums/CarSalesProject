/**
 * Created by taevis on 12/3/14.
 */
angular.module('StatCtrl', []).controller('statisticController',['$location','$scope','$http',function($location, $scope, $http){
    "use strict";
    $scope.startDate = "" ;
    $scope.endDate= "" ;
    $scope.statData={count:0,profit:[]};
    $scope.sortOrder = "profit";
    $scope.reverse = true;

    $scope.isValidDate = function(){
        return ($scope.endDate > $scope.startDate) && $scope.endDate && $scope.startDate;
    };

    $scope.validateAndSubmit = function(){
        if($scope.endDate > $scope.startDate){
            $http.get("/api/statistics",{params:{startDate:$scope.startDate.toISOString(), endDate:$scope.endDate.toISOString()}}).
                success(function(data){
                $scope.statData=data;
            }).
                error(function(data){
                    console.log(data);
            });
        }
    }

}]);