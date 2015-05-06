angular.module('Admin', []);

angular.module('Admin')
    .controller('AdminCtrl', ['$scope', '$log',
        function ($scope, $log) {
            var socket = io('http://blvdia.herokuapp.com:80/');
            $scope.previewSrc = [];
            $scope.previewSrc[0] = '';
            $scope.previewSrc[1] = '';
            $scope.previewSrc[2] = '';
            $scope.previewSrc[3] = '';
            $scope.previewSrc[4] = '';
            $scope.previewSrc[5] = '';
            $scope.preview = function (cameraId) {
                socket.emit('preview', {
                    cameraId: cameraId
                });
            };
            socket.on('preview-complete', function (msg) {
                $scope.$apply(function () {
                    $scope.previewSrc[msg.cameraId] = msg.url;
                });
            });
        }
    ]);
