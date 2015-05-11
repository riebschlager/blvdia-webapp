angular.module('Admin', []);

angular.module('Admin')
    .controller('AdminCtrl', ['$scope', '$log',
        function($scope, $log) {
          var socket = io('http://blvdia.herokuapp.com:80/');
          $scope.heartbeats = [];
          $scope.previewSrc = [];
          $scope.previewSrc[0] = '';
          $scope.previewSrc[1] = '';
          $scope.previewSrc[2] = '';
          $scope.previewSrc[3] = '';
          $scope.previewSrc[4] = '';
          $scope.previewSrc[5] = '';

          for (var i = 0; i < 6; i++) {
            $scope.heartbeats[i] = {
              current: 0,
              previous: 0
            }
          }

          $scope.deploy = function() {
            for (var i = 0; i < 6; i++) {
              $scope.heartbeats[i].current = 0;
              $scope.heartbeats[i].previous = 0;
            }
            socket.emit('deploy');
          };

          $scope.preview = function(cameraId) {
            socket.emit('preview', {
              cameraId: cameraId
            });
          };

          $scope.reboot = function(cameraId) {
            $scope.heartbeats[cameraId].current = 0;
            $scope.heartbeats[cameraId].previous = 0;
            socket.emit('reboot', {
              cameraId: cameraId
            });
          };

          $scope.shutdown = function(cameraId) {
            socket.emit('shutdown', {
              cameraId: cameraId
            });
          };

          $scope.isAlive = function(cameraId) {
            var isAlive = true;
            if ($scope.heartbeats[cameraId].previous === $scope.heartbeats[cameraId].current) {
              isAlive = false;
            } else {
              isAlive = $scope.heartbeats[cameraId].current - $scope.heartbeats[cameraId].previous < 1500;
            }
            return isAlive;
          }

          socket.on('preview-complete', function(msg) {
            $scope.$apply(function() {
              $scope.previewSrc[msg.cameraId] = msg.url;
            });
          });

          socket.on('heartbeat', function(msg) {
            $scope.$apply(function() {
              $scope.heartbeats[msg.cameraId].previous = $scope.heartbeats[msg.cameraId].current;
              $scope.heartbeats[msg.cameraId].current = msg.time;
            });
          });

        }
    ]);
