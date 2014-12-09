<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>&lt;Business Name&gt;</title>
    <link rel="icon" type="image/x-icon" href="assets/car.ico">
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
    <script src="js/controllers/sales/salesCtrl.js"></script>
    <script src="js/controllers/sales/carSaleCtrl.js"></script>
    <script src="js/controllers/sales/saleReceiptCtrl.js"></script>
    <script src="js/controllers/service/serviceCtrl.js"></script>
    <script src="js/controllers/service/serviceScheduleCtrl.js"></script>
    <script src="js/controllers/stats/statCtrl.js"></script>
    <script src="js/services/customerSaleService.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-56562247-1', 'auto');
      ga('send', 'pageview','/dolomite');
    </script>
</head>
<body  ng-app="carSailsApp" ng-controller="mainController">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">&lt;Business Name&gt;</a>
            </div>
            <ul class="nav navbar-nav">
                <li ng-class="{active: salesPage}"><a href="#sales">Sales</a></li>
                <li ng-class="{active: serviceSchedulePage}"><a href="#servicesched">Service Schedule</a></li>
                <li ng-class="{active: serviceAppointmentPage}"><a href="#serviceappt">Service Appointment</a></li>
                <li ng-class="{active: statsPage}"><a href="#statistics">Statistics</a></li>
            </ul>
        </div>
    </nav>
    <div class="container" ng-view>
    </div>
</body>
</html>
