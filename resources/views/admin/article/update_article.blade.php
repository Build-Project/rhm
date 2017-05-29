@extends('layouts.master')

@section('title',$title)

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) --> 
	<section class="content-header">
		<h1>Update Article</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#"> Update Article</a></li>
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
				<form method="post" id="frmArticle" url="{{url('/admin/article/edit')}}".'/'.{{$article->ARTID}}>
                    {{ csrf_field() }} 
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -5px;">
						<button type="submit" class="btn btn-app" id="btn_save"> <i class="fa fa-save"></i> Save</button> 
						<a class="btn btn-app" id="btn_clear"> <i class="fa fa-refresh" aria-hidden="true"></i>Clear</a> 
						<a class="btn btn-app" href="{{url('/admin/article')}}"> <i class="fa fa-reply"></i> Back </a>
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
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <label class="font-label">Name <span class="requrie">(Required)</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="artName" name="artName" value="{{$article->ARTName}}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <label class="font-label">Category</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="artCategory" name="artCategory" value="{{$article->ARTCategory}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <label class="font-label">Description</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="artDes" id="artDes" cols="20" rows="5">{{$article->ARTDescription}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</section>
    <div class="clearfix"></div>
</div>
@endsection