@extends('layout')

@section('title')
Welcome to Boulevardia
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
    <div class="welcome"><span>Welcome to the</span><br>#BLVDIA passport office</div>
    <p>Declare and share your proof of citizenship to our country within a country.</p>
    <p>No oaths are required; simply choose from one of the six stations and enter the code from that station to begin.</p>
    <input type="text" class="form-control">
    <button class="btn btn-block margin-top">Get Started</button>
</div>

@stop
