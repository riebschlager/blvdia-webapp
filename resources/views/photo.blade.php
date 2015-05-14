@extends('layout')

@section('og')
<meta property="og:title" content="My BLVDIA Passport Photo" />
<meta property="og:type" content="website" />
<meta property="og:description" content="Hello from Boulevardia!" />
<meta property="og:url" content="{{url('/')}}/photo/{{$photo->uid}}" />
<meta property="og:image" content="{{$photo->url}}" />
<meta property="og:image:user_generated" content="true">
<meta property="og:image:type" content="image/gif">
<meta property="og:site_name" content="Boulevardia">
@stop

@section('title')
Welcome to Boulevardia
@stop

@section('scripts')
<script src="/js/vendor.js"></script>
<script src="/js/photo.js"></script>
@stop

@section('content')

<div class="container" ng-app="blvdiaPhoto" ng-controller="photoController">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <img src="/img/blvdia-banner.png" class="img-responsive blvdia-banner" alt="BLVDIA">
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <img src="{{$photo->url}}" alt="" class="img-responsive margin-top">
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3" ng-if="first">
            <button class="btn btn-primary btn-block" ng-click="restart()">Let's try that again</button>
            <button class="btn btn-primary btn-block" ng-click="share()">Share photo</button>
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3" ng-if="!first">
            <p>Share your passport photo and declare your #BLVDIA citizenship.</p>
            <div class="row">
                <div class="col-xs-6"><button class="btn btn-primary btn-block margin-top">Facebook</button></div>
                <div class="col-xs-6"><button class="btn btn-primary btn-block margin-top">Twitter</button></div>
                <div class="col-xs-6"><button class="btn btn-primary btn-block margin-top">Email</button></div>
                <div class="col-xs-6"><button class="btn btn-primary btn-block margin-top">SMS</button></div>
            </div>
        </div>
    </div>
</div>

@stop
