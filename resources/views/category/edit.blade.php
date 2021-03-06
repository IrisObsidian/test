@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <form action="{{url('admin/category/'.$data->id)}}" class="form-horizontal" role="form" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <div class="form-group" style="font-size: 22px;margin-bottom: 25px;">编辑分类</div>
            @if(!is_null(\Illuminate\Support\Facades\Session::get('errors')))
                <div class="form-group" style="font-size: 18px;margin-bottom: 25px;">
                    <p style="color: red;">{{\Illuminate\Support\Facades\Session::get('errors')}}</p>
                </div>
            @endif
            <div class="form-group" style="font-size: 18px;">
                <label for="name" class="col-sm-2 control-label" style="font-weight: normal;">分类名称：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required="required" value="{{$data->name}}">
                </div>
            </div>
            <div class="form-group" style="font-size: 18px;">
                <label for="keywords" class="col-sm-2 control-label" style="font-weight: normal;">关&nbsp;&nbsp;键&nbsp;&nbsp;词：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="keywords" required="required" value="{{$data->keywords}}">
                </div>
            </div>
            <div class="form-group" style="font-size: 18px;">
                <label for="description" class="col-sm-2 control-label" style="font-weight: normal;">描&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;述：</label>
                <div class="col-sm-10 text-left">
                    <textarea name="description" id="description" class="col-sm-12" rows="8">{{$data->description}}</textarea>
                </div>
            </div>
            <input type="hidden" name="updated_at" value="{{date('Y-m-d H:i:s',time())}}">
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2">
                    <button type="submit" class="btn btn-default btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection