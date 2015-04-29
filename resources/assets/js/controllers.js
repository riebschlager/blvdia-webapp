angular.module('BlvdiaApp')
    .controller('BlvdiaCtrl', ['$scope', '$log',
        function ($scope, $log) {
            var codes = ['0', '1', '2', '3', '4', '5'];
            var cameras = [{
                name: 'One',
                id: 0,
                code: '0'
            }, {
                name: 'Two',
                id: 1,
                code: '1'
            }, {
                name: 'Three',
                id: 2,
                code: '2'
            }, {
                name: 'Four',
                id: 3,
                code: '3'
            }, {
                name: 'Five',
                id: 4,
                code: '4'
            }, {
                name: 'Six',
                id: 5,
                code: '5'
            }];
            $scope.armed = false;
            $scope.badPassword = false;
            $scope.getStarted = function () {
                if (codes.indexOf($scope.code) > -1) {
                    $scope.camera = codes.indexOf($scope.code);
                    $scope.armed = true;
                } else {
                    $scope.badPassword = true;
                    $scope.code = '';
                }
            };
        }
    ]);
