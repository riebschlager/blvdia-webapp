angular.module('BlvdiaApp', []);

angular.module('BlvdiaApp')
    .controller('BlvdiaCtrl', ['$scope', '$log', '$http', '$interval',
        function($scope, $log, $http, $interval) {
          document.getElementById('code').focus();
          var socket = io('http://blvdia.herokuapp.com:80/');
          var clientId = '';
          $scope.camera = {};
          $scope.preview = '';
          $interval(function() {
            if (!$scope.isSnapping && $scope.checkPassword()) {
              socket.emit('preview', {
                cameraId: $scope.camera.id
              });
            }
          }, 2000);
          var cameras = [{
            name: 'Unfiltered Wheat',
            id: 0,
            code: '1234'
          }, {
            name: 'Pale Ale',
            id: 1,
            code: '2345'
          }, {
            name: 'Bully Porter',
            id: 2,
            code: '3456'
          }, {
            name: 'Single Wide IPA',
            id: 3,
            code: '4567'
          }, {
            name: 'Love Child #5',
            id: 4,
            code: '5678'
          }, {
            name: 'Double Wide IPA',
            id: 5,
            code: '6789'
          }];

          socket.on('preview-complete', function(msg) {
            if (msg.cameraId === $scope.camera.id) {
              $scope.$apply(function() {
                $scope.preview = msg.url;
              });
            }
          });

          socket.on('shutter', function(msg) {
            if (msg.clientId === clientId) {
              console.log('shutter', msg);
            }
          });

          socket.on('complete', function(msg) {
            if (msg.clientId === clientId) {
              console.log('complete', msg);
              $scope.$apply(function() {
                $scope.status = 'Done!';
                var params = {
                  url: msg.url,
                  uid: clientId
                };
                $http.post('/photo', params).success(function(res) {
                  $log.debug(res);
                  window.location.assign(res.success);
                });
              });
            }
          });

          socket.on('snap', function(msg) {
            if (msg.clientId === clientId) {
              console.log('snap', msg);
              $scope.$apply(function() {
                $scope.status = 'Snapping Photo ' + (msg.index + 1) + ' of 5.';
                if (msg.index === 4) {
                  $scope.status = 'Processing. Gimme just one second!';
                }
              });
            }
          });

          $scope.go = function() {
            $scope.isSnapping = true;
            $scope.status = 'Get ready!';
            clientId = makeId();
            socket.emit('shutter', {
              cameraId: $scope.camera.id,
              clientId: clientId
            });
          };

          var makeId = function() {
            var text = '';
            var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            for (var i = 0; i < 6; i++) {
              text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            return text;
          };

          $scope.isSnapping = false;
          $scope.status = '';

          $scope.clearPlaceholder = function() {
            document.getElementById('code').setAttribute('placeholder', '');
          };

          $scope.checkPassword = function() {
            var condition = false;
            _.each(cameras, function(obj, index) {
              if (obj.code === $scope.code) {
                condition = true;
                $scope.camera = cameras[index];
                document.getElementById('code').blur();
              }
            });
            return condition;
          };
        }
    ]);
