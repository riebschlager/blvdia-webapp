angular.module('BlvdiaApp', []);

angular.module('BlvdiaApp')
    .controller('BlvdiaCtrl', ['$scope', '$log',
        function ($scope, $log) {
            document.getElementById('code').focus();
            var camera = {};
            var cameras = [{
                name: 'One',
                id: 0,
                code: '1'
            }, {
                name: 'Two',
                id: 1,
                code: '2'
            }, {
                name: 'Three',
                id: 2,
                code: '3'
            }, {
                name: 'Four',
                id: 3,
                code: '4'
            }, {
                name: 'Five',
                id: 4,
                code: '5'
            }, {
                name: 'Six',
                id: 5,
                code: '6'
            }];
            $scope.armed = false;
            $scope.checkPassword = function () {
                var condition = false;
                _.each(cameras, function (obj, index) {
                    if (obj.code === $scope.code) {
                        condition = true;
                        camera = cameras[index];
                    }
                });
                return condition;
            };
        }
    ]);
