@extends('admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <button class="btn btn-block btn-sm btn-primary" ng-click="preview(0)">Camera 0</button>
            <img class="img-responsive" src="" ng-if="previewSrc[0] != ''" ng-src="@{{previewSrc[0]}}" alt="">
            <img class="img-responsive" ng-if="previewSrc[0] == ''" src="http://placehold.it/400x300&amp;text=Preview" alt="">
        </div>
        <div class="col-sm-4">
            <button class="btn btn-block btn-sm btn-primary" ng-click="preview(1)">Camera 1</button>
            <img class="img-responsive" src="" ng-if="previewSrc[1] != ''" ng-src="@{{previewSrc[1]}}" alt="">
            <img class="img-responsive" ng-if="previewSrc[1] == ''" src="http://placehold.it/400x300&amp;text=Preview" alt="">
        </div>
        <div class="col-sm-4">
            <button class="btn btn-block btn-sm btn-primary" ng-click="preview(2)">Camera 2</button>
            <img class="img-responsive" src="" ng-if="previewSrc[2] != ''" ng-src="@{{previewSrc[2]}}" alt="">
            <img class="img-responsive" ng-if="previewSrc[2] == ''" src="http://placehold.it/400x300&amp;text=Preview" alt="">
        </div>
        <div class="col-sm-4">
            <button class="btn btn-block btn-sm btn-primary" ng-click="preview(3)">Camera 3</button>
            <img class="img-responsive" src="" ng-if="previewSrc[3] != ''" ng-src="@{{previewSrc[3]}}" alt="">
            <img class="img-responsive" ng-if="previewSrc[3] == ''" src="http://placehold.it/400x300&amp;text=Preview" alt="">
        </div>
        <div class="col-sm-4">
            <button class="btn btn-block btn-sm btn-primary" ng-click="preview(4)">Camera 4</button>
            <img class="img-responsive" src="" ng-if="previewSrc[4] != ''" ng-src="@{{previewSrc[4]}}" alt="">
            <img class="img-responsive" ng-if="previewSrc[4] == ''" src="http://placehold.it/400x300&amp;text=Preview" alt="">
        </div>
        <div class="col-sm-4">
            <button class="btn btn-block btn-sm btn-primary" ng-click="preview(5)">Camera 5</button>
            <img class="img-responsive" src="" ng-if="previewSrc[5] != ''" ng-src="@{{previewSrc[5]}}" alt="">
            <img class="img-responsive" ng-if="previewSrc[5] == ''" src="http://placehold.it/400x300&amp;text=Preview" alt="">
        </div>
    </div>
</div>
@stop