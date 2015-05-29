'use strict';

var app = angular.module('blvdiaPhoto', []);
app.controller('photoController', ['$scope', '$log', '$location', '$window',
    function($scope, $log, $location, $window) {
        $scope.first = !!($location.search().first);
        $scope.restart = function() {
            $window.location.href = '/';
        };
        $scope.share = function() {
            $scope.first = null;
        };
        $scope.trackButton = function(btn) {
            $log.debug(btn);
            window.ga('send','event','share',btn);
        };
    }
]);