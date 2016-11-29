@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center" style="font-size: 22px;font-weight: bolder">{{$data->title}}</div>
            <div class="col-sm-12">关键字：<span style="color: red">{{$data->keywords}}</span></div>
            <div class="col-sm-12">
                <img src="{{asset('img/'.$data->thumbnail)}}" width="120px" height="120px" style="float: left" alt="">
                <span style="text-indent: 2em;">{!! $data->content !!}</span>
            </div>
            <div class="col-sm-12 text-right">
                <span>浏览次数：{{$data->views}}</span>&emsp;
                <span>创建于：{{$data->created_at}}</span>&emsp;
                <span>最近更新：{{$data->created_at}}</span>
            </div>
        </div>
    </div>
@endsection