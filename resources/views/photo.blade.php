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
@stop

@section('content')

<div class="container hidden-xs hidden-sm">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <img src="/img/blvdia-banner.png" class="img-responsive" alt="BLVDIA">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <p class="text-center">This is really more of a phone thing.</p>
        </div>
    </div>
</div>

<div class="container hidden-lg hidden-md">
    <div class="row">
        <div class="col-xs-12">
            <img src="/img/blvdia-banner.png" class="img-responsive" alt="BLVDIA">
        </div>
    </div>
    <div ng-show="checkPassword()">
        <div class="welcome">
            <div class="line-1">Passport Station</div>
            <div class="line-2">@{{camera.name}}</div>
        </div>
        <img src="{{$photo->url}}" alt="" class="img-responsive">
        <button class="btn btn-block" ng-click="go()" ng-hide="isSnapping">TAKE PHOTO</button>
        <p ng-bind="status" class="status text-center"></p>
    </div>
</div>


@stop
