@extends('layouts.app')
@section('content')
    <div class="container-fluid text-center">
        <div class="table-responsive">
            <table class="table table-bordered">
                <caption style="font-size: 22px;margin-bottom: 25px;">分类信息列表</caption>
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>keywords</th>
                    <th>description</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $value)
                    <tr id="{{$value->id}}">
                        <th>{{$value->id}}</th>
                        <th>{{$value->name}}</th>
                        <th>{{$value->keywords}}</th>
                        <th>{{$value->description}}</th>
                        <th>{{$value->created_at}}</th>
                        <th>{{$value->updated_at}}</th>
                        <th>
                            <p><a href="{{url('admin/category/'.$value->id.'/edit')}}">修改</a></p>
                            <p><a onclick="del({{$value->id}})">删除</a></p>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function del(cate_id) {
            layer.confirm('您确定删除该分类吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //不知道如何在blade模板中读取JS的变量
                $.post("{{url('admin/category/1')}}",{'_token':'{{csrf_token()}}','_method':'delete','cate_id':cate_id},function (data) {
                    if(data.status)
                    {
                        $("#"+data.id).remove();
                        layer.msg(data.msg,{icon:1});
                    }
                    else
                        layer.msg(data.msg,{icon:2});
                });
            });
        }
    </script>
@endsection