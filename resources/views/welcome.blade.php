@extends('layout')

@section('title')
Welcome to Boulevardia
@stop

@section('scripts')
<script src="/js/vendor.js"></script>
<script src="/js/app.js"></script>
@stop

@section('content')

<div class="container hidden-xs hidden-sm">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <img src="/img/blvdia-banner.png" class="img-responsive blvdia-banner" alt="BLVDIA">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <p class="text-center margin-top">This is really more of a phone thing.</p>
        </div>
    </div>
</div>

<div ng-app="BlvdiaApp" ng-controller="BlvdiaCtrl" ng-cloak class="container hidden-lg hidden-md">
    <div class="row">
        <div class="col-xs-12">
            <img src="/img/blvdia-banner.png" class="img-responsive blvdia-banner" alt="BLVDIA">
        </div>
    </div>
    <div ng-show="!checkPassword()">
        <div class="welcome">
            <div class="line-1">Welcome to the</div>
            <div class="line-2">#BLVDIA passport office</div>
        </div>
        <div class="intro-copy">
            <p>Declare and share your proof of citizenship to our country within a country.</p>
            <p>No oaths are required; simply choose from one of the six stations and enter the code from that station to begin.</p>
        </div>
        <input type="text" pattern="\d*" ng-click="clearPlaceholder()" autocomplete="off" placeholder="Enter Code" class="form-control" id="code" ng-model="code" ng-change="checkPassword()">
    </div>
    <div ng-show="checkPassword()">
        <div class="welcome">
            <div class="line-1">Passport Station</div>
            <div class="line-2">@{{camera.name}}</div>
        </div>
        <div class="preview" ng-hide="isSnapping">
            <img class="passport-preview" ng-src="@{{preview}}" src="http://placehold.it/640x480/E2C99C/956a25/&amp;text=Generating%20Preview" alt="">
        </div>
        <div>
            <button class="btn btn-block margin-top" ng-click="go()" ng-hide="isSnapping">TAKE PHOTO</button>
        </div>
        <div ng-hide="isSnapping" class="intro-copy text-center">
            <p>Strike a pose and prepare for your picture.</p>
        </div>
        <p ng-bind="status" class="status text-center"></p>
        <p ng-if="processing" class="text-center"><img src="/img/loader.gif" alt=""></p>
    </div>
</div>

@stop
