@extends('layouts.master')

@section('title',$title)

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) --> 
	<section class="content-header">
		<h1>Create Slideshow</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#"> Create Slideshow</a></li>
		</ol>
	</section>
    <script>
        $(document).ready(function(){
            $('#btn_save').click(function(){
               // $('#frmSlide').submit();
            });
        });
    </script>
    <section class="content">
		<div class="box box-danger">			
			<div class="box-body">			
				<form method="post" id="frmSlide" url="{{url('/admin/slideshow/create')}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -5px;">
						<button type="submit" class="btn btn-info btn-app" id="btn_save"> <i class="fa fa-save"></i> Save</button> 
						<a class="btn btn-info btn-app" id="btn_clear"> <i class="fa fa-refresh" aria-hidden="true"></i>Clear</a> 
						<a class="btn btn-info btn-app" href="{{url('/admin/slideshow')}}"> <i class="fa fa-reply"></i> Back </a>
					</div>
                     @if(session('msg'))
                        <div class="alert alter-info">
                            <span>{{session('msg')}}</span>
                        </div>
                    @endif
					<div class="clearfix"></div>
					<div class="col-sm-2"><h4>Overview</h4></div>
					<div class="col-sm-12"><hr style="margin-top: 3px;" /></div>
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="col-xs-12">
                                        <label class="font-label">Name <span class="requrie">(Required)</span></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="slideName" name="slideName">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <label class="font-label">Description</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="sildeDes" id="slideDes" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <label class="font-label">Status <span class="requrie">(Required)</span></label>
                                        <div class="form-group">
                                            <select class="form-control select2" name="slideStatus" id="slideStatus" style="width:100%">
                                                <option value="1">Publish</option>
                                                <option value="0">Unpublish</option> 
										    </select>
                                        </div>
                                    </div>
                                     <div class="col-xs-12">
                                        <label class="font-label">Image <span class="requrie">(Required)</span></label>
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="slideImage" name="slideImage">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</section>
</div>
@endsection