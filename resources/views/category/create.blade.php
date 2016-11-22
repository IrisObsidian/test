@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="col-sm-12" style="font-size: 22px;margin-bottom: 15px;">新增分类</div>
        @if(!is_null(\Illuminate\Support\Facades\Session::get('errors')))
            <div style="font-size: 16px;margin-bottom: 15px;">
                <p style="color: red;">{{\Illuminate\Support\Facades\Session::get('errors')}}</p>
            </div>
        @elseif(count($errors)>0)
            <div style="font-size: 16px;margin-bottom: 15px;">
                <p style="color: red;">{{$errors}}</p>
            </div>
        @endif
        <form id="category" class="form-horizontal" role="form">
            {{csrf_field()}}
            <div class="form-group" style="font-size: 18px;">
                <label for="name" class="col-sm-2 control-label" style="font-weight: normal;">分类名称：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required="required">
                </div>
            </div>
            <div class="form-group" style="font-size: 18px;">
                <label for="keywords" class="col-sm-2 control-label" style="font-weight: normal;">关&nbsp;&nbsp;键&nbsp;&nbsp;词：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="keywords" required="required">
                </div>
            </div>
            <div class="form-group" style="font-size: 18px;">
                <label for="description" class="col-sm-2 control-label" style="font-weight: normal;">描&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;述：</label>
                <div class="col-sm-10 text-left">
                    <textarea name="description" id="description" class="col-sm-12" rows="8"></textarea>
                </div>
            </div>
            <input type="hidden" name="created_at" value="{{time()}}">
            <input type="hidden" name="updated_at" value="{{time()}}">
        </form>
        <div class="col-sm-offset-5 col-sm-2">
            <button class="btn btn-default btn-primary" onclick="commit()">提交</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function commit() {
            //异步提交表单数据，返回将数据存入数据库的状态码
            $.post("{{url('admin/category')}}",$('#category').serialize(),function (status) {
                if (status == 1)
                {
                    layer.confirm('分类添加成功',{
                        btn : ['确定']//单击该按钮，进行网页跳转
                    },function () {
                        window.location.href = "{{url('admin/category')}}";//网页跳转
                    });
                }
                else
                {
                    layer.confirm('分类添加失败，请稍后重试',{
                        btn : ['确定']
                    })
                }
            });
        }
    </script>
@endsection