<!doctype html>
<html lang="en" ng-app="Collage">
<head>
    <meta charset="utf-8">
    <title>BLVDIA</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="/js/collage.js"></script>
    <style>
        .image {
            float: left;
            width: 25%;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="page" ng-controller="CollageController">
        <img src="" class="image" ng-repeat="image in images | limitTo:12" ng-src="@{{image.url}}" alt="">
    </div>
</body>
</html>
