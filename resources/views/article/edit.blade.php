@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12" style="font-size: 22px;margin-bottom: 15px;">修改文章</div>
            <form action="{{url('admin/article/'.$data->id)}}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" style="font-size: 18px;">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="cate_name" class="col-sm-2 control-label">所属分类：</label>
                    <div class="col-sm-3">
                        <select name="cate_name" class="form-control">
                            @foreach($cate as $value)
                                @if($value->name == $data->name)
                                    <option value="{{$value->name}}" selected="selected">{{$value->name}}</option>
                                @endif
                                <option value="{{$value->name}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" required="required" value="{{$data->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="keywords" class="col-sm-2 control-label">关&nbsp;&nbsp;键&nbsp;&nbsp;字&nbsp;：</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keywords" required="required" value="{{$data->keywords}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1 col-sm-offset-2">
                        <img src="{{asset('img/'.$data->thumbnail)}}" width="100px" height="100px" alt="">
                    </div>
                    <label for="thumbnail" class="col-sm-2 control-label">缩&nbsp;&nbsp;略&nbsp;&nbsp;图&nbsp;：</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="thumbnail" type="file">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">文章内容：</label>
                    <div class="col-sm-10">
                        <script id="container" name="content" type="text/plain">{!! $data->content !!}</script>
                        <script type="text/javascript" src="{{asset('utf8-php/ueditor.config.js')}}"></script>
                        <script type="text/javascript" src="{{asset('utf8-php/ueditor.all.js')}}"></script>
                        <script type="text/javascript">
                            var ue = UE.getEditor('container',{initialFrameHeight:500});
                        </script>
                        {{--修正UEditor样式--}}
                        <style>
                            .edui-default{line-height: 28px;}
                            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body{overflow: hidden;height: 20px;}
                            div.edui-box{overflow: hidden;height: 22px;}
                        </style>
                    </div>
                </div>
                <input type="hidden" name="updated_at" value="{{time()}}">
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-2">
                        <button type="submit" class="btn btn-default btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection