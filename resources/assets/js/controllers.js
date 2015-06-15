'use strict';

angular.module('BlvdiaApp')
    .controller('BlvdiaCtrl', ['$scope', '$log', '$http', '$interval', '$timeout',
        function($scope, $log, $http, $interval, $timeout) {
            document.getElementById('code').focus();
            var socket = io('http://blvdia.herokuapp.com:80/');
            var clientId = '';
            $scope.snark = [
                'Hang on. Photoshopping out that thing stuck in your teeth.',
                'Processing. By the way, where did you get that shirt?',
                'Almost done. You\'re a seriously photogenic bunch. Smell good too.',
                'Still tweaking a few things. So, um, come here often?',
                'Almost done. But... did you know your fly was down?',
                'Converting your hot bod into a series of 1s and 0s.',
                'Uploading... and emailing a copy to your mom.',
                'I\'m making you a GIF! Hooray!',
                'Almost done. Get off my back already, it\'s difficult!',
                'Processing your photo. Keep your pants on, chief.',
                'Uploading your photo through a series of tubes.',
                'I\'m working on it! Just hold on! GEEZ.',
                'Processing. Why not enjoy a refreshing Boulevard while you wait.'
            ];
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
                code: '9550'
            }, {
                name: 'Bob\s 47',
                id: 1,
                code: '3281'
            }, {
                name: 'KC Pils',
                id: 2,
                code: '1912'
            }, {
                name: 'Pale Ale',
                id: 3,
                code: '2113'
            }, {
                name: '80-Acre',
                id: 4,
                code: '3214'
            }, {
                name: 'Tank 7',
                id: 5,
                code: '8825'
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
                            window.location.assign(res.success + '#?first');
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
                            $timeout(function() {
                                $scope.status = $scope.snark[Math.floor(Math.random() * $scope.snark.length)];
                            }, 1000);
                            $interval(function() {
                                $scope.status = $scope.snark[Math.floor(Math.random() * $scope.snark.length)];
                            }, 3 * 1000);
                            $scope.processing = true;
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