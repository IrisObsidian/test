@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12" style="font-size: 22px;margin-bottom: 15px;">新增文章</div>
            @if(!is_null(\Illuminate\Support\Facades\Session::get('error')))
                <div style="font-size: 16px;margin-bottom: 15px;">
                    <p style="color: red;">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
                </div>
            @endif
            <form action="{{url('admin/article')}}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" style="font-size: 18px;">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="cate_id" class="col-sm-2 control-label">所属分类：</label>
                    <div class="col-sm-10">
                        <select name="cate_id" class="form-control">
                            <option value="0">Default</option>
                            @foreach($cate as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="keywords" class="col-sm-2 control-label">关&nbsp;&nbsp;键&nbsp;&nbsp;字&nbsp;：</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keywords" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="thumbnail" class="col-sm-2 control-label">缩&nbsp;&nbsp;略&nbsp;&nbsp;图&nbsp;：</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="thumbnail" type="file">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">文章内容：</label>
                    <div class="col-sm-10">
                        <script id="container" name="content" type="text/plain"></script>
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
                <input type="hidden" name="views" value="0">
                <input type="hidden" name="created_at" value="{{time()}}">
                <input type="hidden" name="updated_at" value="{{time()}}">
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-2">
                        <button type="submit" class="btn btn-default">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection