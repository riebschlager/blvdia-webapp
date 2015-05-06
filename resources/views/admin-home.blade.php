@extends('admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                    <button class="btn btn-primary" ng-click="preview(0)">Camera 0</button>
                    <button class="btn btn-primary" ng-click="preview(1)">Camera 1</button>
                    <button class="btn btn-primary" ng-click="preview(2)">Camera 2</button>
                    <button class="btn btn-primary" ng-click="preview(3)">Camera 3</button>
                    <button class="btn btn-primary" ng-click="preview(4)">Camera 4</button>
                    <button class="btn btn-primary" ng-click="preview(5)">Camera 5</button>
                </div>
                <div>
                    <img src="" ng-if="previewSrc[0] != ''" ng-src="@{{previewSrc[0]}}" alt="">
                    <img src="" ng-if="previewSrc[1] != ''" ng-src="@{{previewSrc[1]}}" alt="">
                    <img src="" ng-if="previewSrc[2] != ''" ng-src="@{{previewSrc[2]}}" alt="">
                    <img src="" ng-if="previewSrc[3] != ''" ng-src="@{{previewSrc[3]}}" alt="">
                    <img src="" ng-if="previewSrc[4] != ''" ng-src="@{{previewSrc[4]}}" alt="">
                    <img src="" ng-if="previewSrc[5] != ''" ng-src="@{{previewSrc[5]}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@stop