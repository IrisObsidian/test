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
                @foreach($data as $k=>$value)
                    <tr>
                        <th>{{$value->id}}</th>
                        <th>{{$value->name}}</th>
                        <th>{{$value->keywords}}</th>
                        <th>{{$value->description}}</th>
                        <th>{{$value->created_at}}</th>
                        <th>{{$value->updated_at}}</th>
                        <th>
                            <a href="{{url('admin/category/'.$value->id.'/edit')}}">修改</a>
                            <a href="#">删除</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection