<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jimmy Bob's Car-a-Palooza</title>

    <!-- CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/angular-ui-select/dist/select.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- JS -->
    <script src="bower_components/angular/angular.min.js"></script> <!-- load angular -->
    <script src="bower_components/angular-route/angular-route.min.js"></script>
    <script src="bower_components/angular-ui-select/dist/select.min.js"></script>

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/app.js"></script> <!-- load our application -->
    <script src="js/routes.js"></script>
    <script src="js/selectConfig.js"></script>
    <script src="js/controllers/mainCtrl.js"></script>
    <script src="js/controllers/homeCtrl.js"></script>
    <script src="js/controllers/salesCtrl.js"></script>
    <script src="js/controllers/carSaleCtrl.js"></script>
    <script src="js/services/customerSaleService.js"></script>


</head>
<body  ng-app="carSailsApp" ng-controller="mainController">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Jimmy Bob's Car-a-Palooza</a>
            </div>
            <ul class="nav navbar-nav">
                <li ng-class="{active: salesPage}"><a href="#sales">Sales</a></li>
                <li ng-class="{active: servicePage}"><a href="#service">Service</a></li>
                <li ng-class="{active: statsPage}"><a href="#stats">Statistics</a></li>
            </ul>
        </div>
    </nav>
    <div class="container" ng-view>
    </div>
</body>
</html>