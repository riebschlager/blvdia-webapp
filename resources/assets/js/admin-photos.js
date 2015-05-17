angular.module('AdminPhotos', []);

angular.module('AdminPhotos')
    .controller('AdminPhotosCtrl', ['$scope', '$log', '$http',
        function($scope, $log, $http) {
          $http.get('/api/photos').then(function(res) {
            $log.debug(res);
            $scope.photos = res.data.data;
            $scope.nextPage = res.data['next_page_url'];
            $scope.prevPage = res.data['prev_page_url'];
          });

          $scope.next = function() {
            $http.get($scope.prevPage).then(function(res) {
              $scope.photos = res.data.data;
              $scope.nextPage = res.data['next_page_url'];
              $scope.prevPage = res.data['prev_page_url'];
            });
          };

          $scope.prev = function() {
            $http.get($scope.nextPage).then(function(res) {
              $scope.photos = res.data.data;
              $scope.nextPage = res.data['next_page_url'];
              $scope.prevPage = res.data['prev_page_url'];
            });
          };

          $scope.feature = function(photo) {
            var params = {
              'id': photo.id
            };
            $http.post('/api/photos/feature', params).then(function(res) {
              photo.featured = true;
            });
          };

          $scope.unfeature = function(photo) {
            var params = {
              'id': photo.id
            };
            $http.post('/api/photos/unfeature', params).then(function(res) {
              photo.featured = false;
            });
          };
        }
    ]);
