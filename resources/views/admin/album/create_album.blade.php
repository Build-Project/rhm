@extends('layouts.master')

@section('title',$title)

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) --> 
	<section class="content-header">
		<h1>Create Album</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#"> Create Album</a></li>
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
				<form method="post" id="frmAlbum" url="{{url('/admin/album/create')}}" enctype="multipart/form-data">
                    {{ csrf_field() }} 
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<button type="submit" class="btn btn-default" id="btn_save"> <i class="fa fa-save"></i> Save</button> 
						<a class="btn btn-default" id="btn_clear"> <i class="fa fa-refresh" aria-hidden="true"></i> Clear</a> 
						<a class="btn btn-default" href="{{url('/admin/album')}}"> <i class="fa fa-reply"></i> Back </a>
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-2"><h4>Overview</h4></div>
					<div class="col-sm-12"><hr style="margin-top: 3px;" /></div>
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="col-xs-12 col-sm-6">
                                        <label class="font-label">Name <span class="requrie">(Required)</span></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="albumName" name="albumName">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <label class="font-label">Alias</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="albumAlias" name="albumAlias">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <label class="font-label">Type</label>
                                        <div class="form-group">
                                            <select class="select2 form-control" style="width:100%" name="type" id="type">
                                                <option value="">-- Select Type --</option>
                                                @foreach ($type as $t)
                                                    <option value="{{$t->TID}}">{{$t->TName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <label class="font-label">Production</label>
                                        <div class="form-group">
                                            <select class="select2 form-control" style="width:100%" name="production" id="production">
                                                <option value="">-- Select Production --</option>
                                                @foreach ($pro as $p)
                                                    <option value="{{$p->ProID}}">{{$p->ProName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <label class="font-label">Description</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="albumDes" id="albumDes" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-xs-12">
                                        <label class="font-label">Sort Order</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="asr" name="asr">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <label class="font-label">Logo <span class="requrie">(Required)</span></label>
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="albumLogo" name="albumLogo">
                                        </div>
                                    </div>
                                </div>
                            </div
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</section>
    <div class="clearfix"></div>
</div>
@endsection