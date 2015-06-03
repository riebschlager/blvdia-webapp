@extends('layout')

@section('og')
<meta property="fb:app_id" content="697793977033303">
<meta property="og:title" content="My BLVDIA Passport Photo">
<meta property="og:type" content="article">
<meta property="og:description" content="Hello from Boulevardia!">
<meta property="og:url" content="{{url('/')}}/photo/{{$photo->uid}}">
{{-- <meta property="og:url" content="{{$photo->url}}"> --}}
<meta property="og:image" content="{{$photo->url}}">
<meta property="og:image:secure_url" content="{{$photo->url}}">
<meta property="og:image:width" content="640">
<meta property="og:image:height" content="480">
<meta property="og:image:user_generated" content="true">
<meta property="og:image:type" content="image/gif">
<meta property="og:site_name" content="Boulevardia">

<meta name="twitter:card" content="photo" />
<meta name="twitter:site" content="@blvdia" />
<meta name="twitter:title" content="Hello from Boulevardia!" />
<meta name="twitter:image" content="{{$photo->url}}" />
<meta name="twitter:url" content="{{url('/')}}/photo/{{$photo->uid}}" />

<meta name="twitter:player" content="{{url('/')}}/player/{{$photo->uid}}">
<meta name="twitter:player:width" content="480">
<meta name="twitter:player:height" content="360">

@stop

@section('title')
Welcome to Boulevardia
@stop

@section('scripts')
<script src="/js/vendor.js"></script>
<script src="/js/photo.js"></script>
@stop

@section('content')

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '697793977033303',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="container" ng-app="blvdiaPhoto" ng-controller="photoController">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <img src="/img/blvdia-banner.png" class="img-responsive blvdia-banner" alt="BLVDIA">
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <img src="{{$photo->url}}" alt="" class="img-responsive margin-top">
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3" ng-if="first">
            <button class="btn btn-primary btn-block btn-gold margin-top" ng-click="restart()">Let's try that again</button>
            <button class="btn btn-primary btn-block" ng-click="share()">Share photo</button>
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3" ng-if="!first">
            <p>Share your passport photo and declare your #BLVDIA citizenship.</p>
            <div class="row">
                <div class="col-xs-6">
                    <a ng-click="trackButton('facebook')" href="" ng-href="https://www.facebook.com/dialog/share?app_id=697793977033303&display=popup&href={{url('/')}}/photo/{{$photo->uid}}&redirect_uri={{url('/')}}/photo/{{$photo->uid}}" class="btn btn-primary btn-block margin-top">Facebook</a>
                </div>
                <div class="col-xs-6">
                    <a ng-click="trackButton('twitter')" target="_blank" href="" ng-href="https://twitter.com/intent/tweet?url={{url('/')}}/photo/{{$photo->uid}}" class="btn btn-primary btn-block margin-top">Twitter</a>
                </div>
                <div class="col-xs-6">
                    <a ng-click="trackButton('email')" href="" ng-href="mailto:?subject=My%20Boulevardia%20Passport%20Photo&body=Check%20out%20my%20Boulevardia%20passport%20photo!%20{{url('/')}}/photo/{{$photo->uid}}" class="btn btn-primary btn-block margin-top">Email</a>
                </div>
                <div class="col-xs-6">
                    <a ng-click="trackButton('sms')" href="" ng-href="sms:?body=Check%20out%20my%20Boulevardia%20passport%20photo!%20{{url('/')}}/photo/{{$photo->uid}}" class="btn btn-primary btn-block margin-top">SMS</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
