/**
 * Created by taevis on 11/8/14.
 */
angular.module('appRoutes', []).config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
    $routeProvider
        .when('/',{
            templateUrl:'views/home.html',
            controller: 'homeController'

        }).when('/sales',{
            templateUrl:'views/sales.html',
            controller: 'salesController'

        }).when('/carsale',{
            templateUrl:'views/carSale.html',
            controller: 'carSaleController'

        }).otherwise({
            redirectTo:'/'
        });

    $locationProvider.html5Mode({
        enabled: false,
        requireBase: false
    });


}]);
