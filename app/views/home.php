<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel and Angular Comment System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

    <!-- JS -->
    <script src="bower_components/angular/angular.min.js"></script> <!-- load angular -->
    <script src="bower_components/angular-route/angular-route.min.js"></script>
    <script src="bower_components/angular-ui-select/dist/select.min.js"></script>

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/app.js"></script> <!-- load our application -->
    <script src="js/routes.js"></script>
    <script src="js/controllers/mainCtrl.js"></script>
    <script src="js/controllers/homeCtrl.js"></script>
    <script src="js/controllers/salesCtrl.js"></script>


</head>
<body ng-app="carSailsApp" ng-controller="mainController">
    <div ng-view>
    </div>
</body>
</html>