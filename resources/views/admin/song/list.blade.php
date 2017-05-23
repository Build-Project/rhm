@extends('layouts.master')

@section('title',$title)

@section('content')
    <script type="text/javascript">

        var app = angular.module('song', ['angularUtils.directives.dirPagination','angular-loading-bar', 'ngAnimate']).config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
            cfpLoadingBarProvider.includeSpinner = false;
        }]).config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
        });
        
        app.controller('songController',['$scope','$http',function($scope, $http) {
            $scope.listSongs = function () {
                $http.get("/admin/song/list").success(function (response) {
                    $scope.songs = response;
                });
            };

            $scope.deleteSong = function(sid){
                swal({   
                    title: "<span style='font-size: 25px;'>You are about to delete Song with ID: <span class='color_msg'>"+sid+"</span>.</span>",   
                    text: "Click OK to continue or CANCEL to abort.",   
                    type: "info", 
                    html: true,
                    showCancelButton: true,   
                    closeOnConfirm: false,   
                    showLoaderOnConfirm: true, 
                    
                }, function(){
                    $http({
                        method:"DELETE",
                        url:'{{url('/admin/song/delete')}}'+'/'+sid
                    }).success(function(response){
                        if(response.status == "success"){
                            swal({
                                title:"SUCCESSFUL",
                                text: response.msg, 
                                type:"success", 
                                html: true,
                                timer: 2000,
                            });
                            $scope.listSongs();
                        }else{
                             swal({
                                title:"FAILED!",
                                text: response.msg, 
                                type:"danger", 
                                html: true,
                                timer: 2000,
                            });
                        }
                    });
                });
            }

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
    <div class="content-wrapper"  ng-app="song" ng-controller="songController" style="min-height: 396px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Songs</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i>Songs</a></li>
            </ol>
        </section>

        <section class="content col-xs-12 col-sm-12 col-lg-12">
            <!-- Default box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <div style="background: #fff;margin-top: 15px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -5px;">
                            <a href='{{url('/admin/song/create')}}' class="btn btn-info btn-app" ><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
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
                                    <div class="tablecontainer table-responsive" data-ng-init="listSongs()">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Alias</th>
                                                <th>Album</th>
                                                <th>URL</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            <tr dir-paginate="s in songs | itemsPerPage:pageSize.row" class="ng-cloak">
                                                <td>{[{s.SID}]}</td>
                                                <td>{[{s.SName}]}</td>
                                                <td>{[{s.SAlias}]}</td>
                                                <td>{[{s.album.AName}]}</td>
                                                <td>{{URL::asset('/album/')}}/{[{s.SURL}]}</td>
                                                <td class="text-center" style="min-width: 100px;">
                                                    <a href="{{url('/admin/song/edit/{[{s.SID}]}')}}"><button type="button" class="btn btn-xs" data-toggle="tooltip" title="edit"><i class="fa fa-pencil text-primary"></i></button></a>
                                                    <a href="#" ng-click="deleteSong(s.SID)"><button type="button" class="btn btn-xs" data-toggle="tooltip" title="delete"><i class="fa fa-trash text-danger"></i></button></a>
                                                    <a href="/admin/song/view/{[{s.SID}]}"><button type="button" data-toggle="tooltip" class="btn btn-xs" title="view"><i class="fa fa-eye text-info"></i></button></a>
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
        <div class="clearfix"></div>
    </div>
@endsection