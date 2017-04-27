@extends('layouts.master')

@section('title',$title)

@section('content')
    <script type="text/javascript">
        var app = angular.module('module', ['angularUtils.directives.dirPagination','angular-loading-bar', 'ngAnimate']).config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
            cfpLoadingBarProvider.includeSpinner = false;
        }]).config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
        });
        
        app.controller('moduleController',['$scope','$http',function($scope, $http) {

            $scope.listModules = function(){
                $http({
                        method:'GET',
                        url:'{{url('/admin/module/list/json')}}'
                    }).success(function(response){
                        $scope.modules = response;
                    });
            }

            $scope.deleteModule = function(moduleId){
                swal({   
                    title: "<span style='font-size: 25px;'>You are about to delete Module with ID: <span class='color_msg'>"+moduleId+"</span>.</span>",   
                    text: "Click OK to continue or CANCEL to abort.",   
                    type: "info", 
                    html: true,
                    showCancelButton: true,   
                    closeOnConfirm: false,   
                    showLoaderOnConfirm: true, 
                    
                }, function(){
                    $http({
                        'method':'DELETE',
                        'url':'{{url('/admin/module/delete')}}'+'/'+moduleId
                    }).success(function(response){
                        if(response.status == 'success'){
                            swal({
                                    title:"SUCCESSFUL",
                                    text: response.msg, 
                                    type:"success", 
                                    html: true,
                                    timer: 2000,
                                });
                        }
                        setTimeout(function(){		
                            window.location.reload();
                        },2000);
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


            $scope.clearModuleData = function(){
                $('#moduleName').val('');
                $('#moduleType').val('');
                $('#moduleDes').val('');
            }

            $scope.createModule = function(){
                swal({   
                    title: "<span style='font-size: 25px;'>You are about to create new Module!</span>",   
                    text: "Click OK to continue or CANCEL",   
                    type: "info", 
                    html: true,
                    showCancelButton: true,   
                    closeOnConfirm: false,   
                    showLoaderOnConfirm: true, 
                    
                }, function(){
                    $http({
                        'method':'POST',
                        'url':'{{url('/admin/module/create')}}',
                        'data':{
                            'moduleName':$('#moduleName').val(),
                            'moduleType':$('#moduleType').val(),
                            'moduleStatus':$('#moduleStatus').val(),
                            'moduleDes': $('#moduleDes').val()
                        }
                    }).success(function(res){
                        if(res.status == 'success'){
                            swal({
                                    title:"SUCCESSFUL",
                                    text: res.msg, 
                                    type:"success", 
                                    html: true,
                                    timer: 2000,
                                });
                        }
                        setTimeout(function(){		
                            window.location.reload();
                        },2000);
                    });
                });
            }
        }]);
</script>
<script>
    $(document).ready(function(){
        $('#btn-create').click(function(){
            $('#frmModule').modal('toggle');
        });
    });
   
</script>
    <div class="content-wrapper" ng-app="module" ng-controller="moduleController">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Modules</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i>Modules</a></li>
            </ol>
        </section>

        <section class="content col-xs-12 col-sm-12 col-lg-12">
            <!-- Default box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <div style="background: #fff;margin-top: 15px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -5px;">
                            <button type="button" id="btn-create" class="btn btn-app" ><i class="fa fa-plus" aria-hidden="true"></i> Create</button>
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
                                    <div class="tablecontainer table-responsive" data-ng-init="listModules()">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            <tr dir-paginate="m in modules | itemsPerPage: pageSize.row">
                                                <td>{[{m.MID}]}</td>
                                                <td>{[{m.MName}]}</td>
                                                <td>{[{m.MDescription}]}</td>
                                                <td>{[{m.MType}]}</td>
                                                <td>{[{m.MStatus=='1'?'Active':'Inactive'}]}</td>
                                                <td class="text-center" style="min-width: 100px;">
                                                    <a href="#" ng-click="editModule('m.MID')"><button type="button" class="btn btn-xs" data-toggle="tooltip" title="edit"><i class="fa fa-pencil text-primary"></i></button></a>
                                                    <a href="#" ng-click="deleteModule('m.MID')"><button type="button" class="btn btn-xs" data-toggle="tooltip" title="delete"><i class="fa fa-trash text-danger"></i></button></a>
                                                    <a href="/module/view/{[{m.MID}]}"><button type="button" data-toggle="tooltip" class="btn btn-xs" title="view"><i class="fa fa-eye text-info"></i></button></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade modal-default" id="frmModule" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" ng-click="clearModuleData()" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b id="tEvent">Create Module</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form id="frmCreateModule">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name <span class="requrie">(Required)</span></label>
                                                <input id="moduleName" name="moduleName" class="form-control" type="text" placeholder="">
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <input type="text" class="form-control" name="moduleType" id="moduleType"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label> 
                                                <select class="form-control select2" name="moduleStatus" id="moduleStatus" style="width: 100%;">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description </label>
                                                <textarea rows="4" cols="" name="moduleDes" id="moduleDes" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class='col-xs-12'>
                                <button type="reset" id="btnCancel" ng-click="clearModuleData()" name="btnCancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                &nbsp;&nbsp;
                                <button type="button" id="btnSave" name="btnSave"  class="btn btn-primary pull-right" ng-click='createModule()'>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection