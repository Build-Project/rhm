@extends('layouts.master')

@section('title',$title)

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/admin'')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            </ol>
        </section>
    </div>
@endsection