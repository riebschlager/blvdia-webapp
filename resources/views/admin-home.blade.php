@extends('admin')

@section('content')
<div class="container" ng-app="Admin" ng-controller="AdminCtrl">
    <button class="btn btn-xs btn-default" ng-click="deploy()">Deploy</button>
    <div class="row">
        <div class="col-sm-4">
            <h3>
                Camera 0
                <span ng-if="isAlive(0)" style="color:#0c0;">&bull;</span>
                <span ng-if="!isAlive(0)" style="color:#c00;">&bull;</span>
            </h3>
            <img class="img-responsive" ng-src="@{{previewSrc[0]}}" src="http://placehold.it/640x480&amp;text=BLVDIA" alt="">
            <div style="margin-top: 0.5em;">
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(0)" ng-click="preview(0)">Preview</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(0)" ng-click="reboot(0)">Reboot</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(0)" ng-click="shutdown(0)">Shutdown</button>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>
                Camera 1
                <span ng-if="isAlive(1)" style="color:#0c0;">&bull;</span>
                <span ng-if="!isAlive(1)" style="color:#c00;">&bull;</span>
            </h3>
            <img class="img-responsive" ng-src="@{{previewSrc[1]}}" src="http://placehold.it/640x480&amp;text=BLVDIA" alt="">
            <div style="margin-top: 0.5em;">
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(1)" ng-click="preview(1)">Preview</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(1)" ng-click="reboot(1)">Reboot</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(1)" ng-click="shutdown(1)">Shutdown</button>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>
                Camera 2
                <span ng-if="isAlive(2)" style="color:#0c0;">&bull;</span>
                <span ng-if="!isAlive(2)" style="color:#c00;">&bull;</span>
            </h3>
            <img class="img-responsive" ng-src="@{{previewSrc[2]}}" src="http://placehold.it/640x480&amp;text=BLVDIA" alt="">
            <div style="margin-top: 0.5em;">
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(2)" ng-click="preview(2)">Preview</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(2)" ng-click="reboot(2)">Reboot</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(2)" ng-click="shutdown(2)">Shutdown</button>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>
                Camera 3
                <span ng-if="isAlive(3)" style="color:#0c0;">&bull;</span>
                <span ng-if="!isAlive(3)" style="color:#c00;">&bull;</span>
            </h3>
            <img class="img-responsive" ng-src="@{{previewSrc[3]}}" src="http://placehold.it/640x480&amp;text=BLVDIA" alt="">
            <div style="margin-top: 0.5em;">
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(3)" ng-click="preview(3)">Preview</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(3)" ng-click="reboot(3)">Reboot</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(3)" ng-click="shutdown(3)">Shutdown</button>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>
                Camera 4
                <span ng-if="isAlive(4)" style="color:#0c0;">&bull;</span>
                <span ng-if="!isAlive(4)" style="color:#c00;">&bull;</span>
            </h3>
            <img class="img-responsive" ng-src="@{{previewSrc[4]}}" src="http://placehold.it/640x480&amp;text=BLVDIA" alt="">
            <div style="margin-top: 0.5em;">
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(4)" ng-click="preview(4)">Preview</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(4)" ng-click="reboot(4)">Reboot</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(4)" ng-click="shutdown(4)">Shutdown</button>
            </div>
        </div>
        <div class="col-sm-4">
            <h3>
                Camera 5
                <span ng-if="isAlive(5)" style="color:#0c0;">&bull;</span>
                <span ng-if="!isAlive(5)" style="color:#c00;">&bull;</span>
            </h3>
            <img class="img-responsive" ng-src="@{{previewSrc[5]}}" src="http://placehold.it/640x480&amp;text=BLVDIA" alt="">
            <div style="margin-top: 0.5em;">
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(5)" ng-click="preview(5)">Preview</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(5)" ng-click="reboot(5)">Reboot</button>
                <button class="btn btn-xs btn-default" ng-disabled="!isAlive(5)" ng-click="shutdown(5)">Shutdown</button>
            </div>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.5/socket.io.min.js"></script>
<script src="/js/admin.js"></script>
@stop