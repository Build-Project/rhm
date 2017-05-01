@extends('layouts.master')

@section('title',$title)

@section('content')
    <script type="text/javascript">

        var app = angular.module('slideshow', ['angularUtils.directives.dirPagination','angular-loading-bar', 'ngAnimate']).config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
            cfpLoadingBarProvider.includeSpinner = false;
        }]).config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
        });
        
        app.controller('slideshowController',['$scope','$http',function($scope, $http) {
            $scope.listSlideShows = function () {
                $http.get("/admin/slideshow/list").success(function (response) {
                    $scope.slideshows = response;
                });
            };

            $scope.sort = function (keyname) {
                $scope.sortKey = keyname;   //set the sortKey to the param passed
                $scope.reverse = !$scope.reverse; //if true make it false and vice versa
            };
           
            $scope.pageSize = {};

            $scope.pageSize.rows = [
                {value: "5", label: "5"},
                {value: "10", label: "10"},
                {value: "15", label: "15"},
                {value: "20", label: "20"},
                {value: "25", label: "25"},
                {value: "30", label: "30"},
            ];
            $scope.pageSize.row = $scope.pageSize.rows[1].value;
        }]);
</script>
    <div class="content-wrapper" ng-app="slideshow" ng-controller="slideshowController">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Slide Show</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i>Slide Show</a></li>
            </ol>
        </section>

        <section class="content col-xs-12 col-sm-12 col-lg-12">
            <!-- Default box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <div style="background: #fff;margin-top: 15px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -5px;">
                            <a href='{{url('/admin/slideshow/create')}}' class="btn btn-info btn-app" ><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
                        </div>
                    </div>
                </div>
                <div class="box-body" style="background: url({{asset('images/boxed-bg.jpg')}});">
                    <div class="clearfix"></div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-9 col-sm-6 col-md-4 col-lg-4">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <div class="input-group">
							        		 <span class="input-group-btn">
									       	 	<button class="btn btn-default" type="button" disabled="disabled"><i class="fa fa-search" aria-hidden="true"></i></button>
									      	</span>
                                                <input type="text" ng-model="search" class="form-control" placeholder="Search">
                                            </div>
                                        </div>
                                    </form>
                                    <br/>
                                </div>
                                <div class="col-xs-3 col-sm-2 col-sm-offset-4 col-md-offset-6 col-lg-2 col-lg-offset-6">
                                    <form class="form-inline">
                                        <div class="form-group pull-right">
                                            <div class="input-group">
                                                <select class="form-control" ng-model="pageSize.row" id ="row" ng-options="obj.value as obj.label for obj in pageSize.rows"></select>
                                            </div>
                                        </div>
                                    </form>
                                    <br/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="tablecontainer table-responsive" data-ng-init="listSlideShows()">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            <tr dir-paginate="s in slideshows | itemsPerPage:pageSize.row" class="ng-cloak">
                                                <td>{[{s.SLSID}]}</td>
                                                <td>{[{s.SLSName}]}</td>
                                                <td>{[{s.SLSDescription}]}</td>
                                                <td>{[{s.SLStatus == 1?'Publish': 'Unpublish'}]}</td>
                                                <td>{{URL::asset('/images/slides')}}/{[{s.SLSImage}]}</td>
                                                <td class="text-center" style="min-width: 100px;">
                                                    <a href="{{url('/admin/slideshow/edit/{[{s.SLSID}]}')}}"><button type="button" class="btn btn-xs" data-toggle="tooltip" title="edit"><i class="fa fa-pencil text-primary"></i></button></a>
                                                    <a href="#" ng-click="deleteModule('m.MID')"><button type="button" class="btn btn-xs" data-toggle="tooltip" title="delete"><i class="fa fa-trash text-danger"></i></button></a>
                                                    <a href="/module/view/{[{m.MID}]}"><button type="button" data-toggle="tooltip" class="btn btn-xs" title="view"><i class="fa fa-eye text-info"></i></button></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <dir-pagination-controls max-size="pageSize.row" direction-links="true" boundary-links="true"></dir-pagination-controls>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection