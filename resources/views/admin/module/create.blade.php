@extends('layouts.master')

@section('title',$title)

@section('content')
<div class="content-wrapper" ng-app="campaign" ng-controller="campController">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Create Module</h1>
		<ol class="breadcrumb">
			<li><a href="${pageContext.request.contextPath}"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#"> Create Module</a></li>
		</ol>
	</section>
    <section class="content">
		<!-- Default box -->
		<div class="box box-danger">
			<div class="box-body">
				<form method="post" id="form-module" url="{{url('/admin/module/create')}}">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -5px;">
						<button type="button" class="btn btn-info btn-app" id="btn_save" > <i class="fa fa-save"></i> Save</button> 
						<a class="btn btn-info btn-app" id="btn_clear"> <i class="fa fa-refresh" aria-hidden="true"></i>Clear</a> 
						<a class="btn btn-info btn-app"  href="{{url('admin/module')}}"> <i class="fa fa-reply"></i> Back </a>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-2"><h4>Overview</h4></div>
					<div class="col-sm-12"><hr style="margin-top: 3px;" /></div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
									<label class="font-label">Name <span class="requrie">(Required)</span></label>
									<div class="form-group">
										<input type="text" class="form-control" name="moduleName" id="moduleName">
									</div>
								</div>
								<div class="clearfix hidden-lg"></div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<label class="font-label">Start date <span class="requrie">(Required)</span></label>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control call-data-time pull-right" readonly="readonly" name="startDate" id="startDate">
										</div> 
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">							
				                    <div class="bootstrap-timepicker">
										<div class="form-group">
											<label>Duration <span class="requrie">(Required)</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-clock-o"></i>
												</div>
												<input type="text" class="form-control timepicker active" name="duration" id="duration" placeholder="hours:minutes" readonly="readonly">
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3" data-ng-init="listStatus()" >
									<label class="font-label">Status <span class="requrie">(Required)</span></label>
									<div class="form-group">
										<select class="form-control select2-small" name="status" id="status" style="width: 100%;">
											<option value="">--SELECT Status</option>
											<option></option>
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3"  data-ng-init="listCampUser()">
									<label class="font-label">Assigned to  </label>
									<div class="form-group">
										<select class="form-control select2-small"  name="assignTo" id="assignTo" style="width: 100%;">
					                      <option value=""></option>           
					                    </select>
									</div>
								</div>
								<div class="clearfix hidden-lg"></div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<label class="font-label">Related To </label>
									<div class="form-group">
										<select class="form-control select2-small" name="reportType" id="reportType" style="width: 100%;">
											<option value="">--SELECT Related--</option>
											<optgroup label="Marketing">
												<option value="Campaign">Campaign</option>
												<option value="Lead">Lead</option>
											</optgroup>
											<optgroup label="Sales">
												<option value="Customer">Customer</option>
												<option value="Contact">Contact</option>
												<option value="Opportunity">Opportunity</option>
											</optgroup>
											<optgroup label="Activities">
												<option value="Task">Tasks</option>
											</optgroup>
											<optgroup label="Support">
												<option value="Case">Case</option>
											</optgroup>
											
										</select>
									</div>
								</div>
								
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<label class="font-label">&nbsp;</label>
									<div class="form-group">
										<select class="form-control select2-small" name="reportTo" id="reportTo" style="width: 100%;">
											<option value="">--SELECT--</option>
										</select>
									</div>
								</div>
		
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-12">
								<div class="col-sm-12">
									<label class="font-label">Description </label>
									<div class="form-group">
										<textarea style="height: 120px" rows="" cols="" name="description" id="description"	class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="box-footer">
		</div>
		</div>
	</section>
</div>
@endsection