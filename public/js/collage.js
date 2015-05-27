'use strict';

var app = angular.module('Collage', ['ngRoute']);

app.controller('CollageController', ['$scope', '$http', '$location', '$log', '$interval',
    function($scope, $http, $location, $log, $interval) {
        function init() {
            var params = $location.search();
            var url = '/api/photos/random-featured';
            if (params.all) {
                url = '/api/photos/random';
            }
            $http.get(url).then(function(res) {
                $scope.images = res.data;
            });
            $interval(function() {
                $http.get(url).then(function(res) {
                    $scope.images = res.data;
                });
            }, 60 * 1000);
        }
        init();
    }
]);