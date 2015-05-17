@extends('admin')

@section('content')
<div class="container" ng-app="AdminPhotos" ng-controller="AdminPhotosCtrl">
<nav>
  <ul class="pager">
    <li class="previous" ng-click="prev()" ng-class="{'disabled':prevPage}"><a href="#">&larr; Older</a></li>
    <li class="next" ng-click="next()" ng-class="{'disabled':nextPage}"><a href="#">Newer &rarr;</a></li>
  </ul>
</nav>
    <div class="row">
        <div class="col-sm-3 form-group" ng-repeat="photo in photos">
            <img src="" ng-src="@{{photo.url}}" alt="" class="img-responsive thumbnail">
            <button ng-if="!photo.featured" class="btn btn-primary btn-sm" ng-click="feature(photo)">Feature</button>
            <div class="btn-group" role="group" ng-if="photo.featured">
                <button class="btn btn-default btn-sm" disabled>Featured!</button>
                <button class="btn btn-default btn-sm" ng-click="unfeature(photo)">Undo</button>
            </div>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.5/socket.io.min.js"></script>
<script src="/js/admin-photos.js"></script>
@stop