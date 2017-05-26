@extends('layouts.master')

@section('title',$title)

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) --> 
	<section class="content-header">
		<h1>Create Song</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#"> Create Song</a></li>
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
				<form method="post" id="frmSong" url="{{url('/admin/song/create')}}" enctype="multipart/form-data">
                    {{ csrf_field() }} 
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -5px;">
						<button type="submit" class="btn btn-app" id="btn_save"> <i class="fa fa-save"></i> Save</button> 
						<a class="btn btn-app" id="btn_clear"> <i class="fa fa-refresh" aria-hidden="true"></i>Clear</a> 
						<a class="btn btn-app" href="{{url('/admin/song')}}"> <i class="fa fa-reply"></i> Back </a>
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
                                            <input type="text" class="form-control" id="songName" name="songName">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <label class="font-label">Alias Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="songAlias" name="songAlias" accept="video/*">
                                        </div>
                                    </div>
                                    <!--<div class="col-xs-12">
                                        <label class="font-label">Description</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="songDes" id="songDes" cols="20" rows="5"></textarea>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <label class="font-label">Album <span class="requrie">(Required)</span></label>
                                        <div class="form-group">
                                            <select class="form-control select2" name="albumId" id="albumId" style="width:100%">
                                                <option value="1">Mini Album</option>
                                                <option value="2">Solo Album</option> 
										    </select>
                                        </div>
                                    </div>
                                     <div class="col-xs-12">
                                        <label class="font-label">Song<span class="requrie">(Required)</span></label>
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="songFile" name="songFile" multiple="multiple">
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
    <div class="clearfix"></div>
</div>
@endsection