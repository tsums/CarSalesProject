/**
 * Created by taevis on 11/8/14.
 */
angular.module('appRoutes', []).config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
    $routeProvider
        .when('/',{
            templateUrl:'views/home.html',
            controller: 'homeController'

        }).when('/sales',{
            templateUrl:'views/sales/sales.html',
            controller: 'salesController'

        }).when('/carsale',{
            templateUrl:'views/sales/carSale.html',
            controller: 'carSaleController'

        }).when('/salereceipt',{
            templateUrl:'views/sales/saleReceipt.html',
            controller: 'salesReceiptController'

        }).when('/servicesched',{
            templateUrl:'views/service/schedule.html',
            controller: 'serviceController'

        }).when('/serviceappt',{
            templateUrl:'views/service/appointment.html',
            controller: 'serviceController'

        }).otherwise({
            redirectTo:'/'
        });

    $locationProvider.html5Mode({
        enabled: false,
        requireBase: false
    });


}]);
