'use strict';

var app = angular.module('blvdiaPhoto', []);
app.controller('photoController', ['$scope', '$log', '$location', '$window',
    function($scope, $log, $location, $window) {
        $scope.first = !!($location.search().first);
        $scope.restart = function() {
            $window.location.href = '/';
            window.ga('send', 'event', 'action', 'restart');
        };
        $scope.share = function() {
            $scope.first = null;
            window.ga('send', 'event', 'action', 'open-share');
        };
        $scope.trackButton = function(btn) {
            window.ga('send', 'event', 'share', btn);
        };
    }
]);