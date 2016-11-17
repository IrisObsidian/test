@extends('layouts.app')
@section('content')
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-12">
                <form></form>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <caption style="font-size: 22px;margin-bottom: 15px;">文章列表信息</caption>
                        <thead>
                        <tr>
                            <th>title</th>
                            <th>keywords</th>
                            <th>thumbnail</th>
                            <th>content</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $value)
                            <tr>
                                <td>{{$value->title}}</td>
                                <td>{{$value->keywords}}</td>
                                <td><img src="{{asset('img/'.$value->thumbnail)}}" width="100px" height="100px" alt=""></td>
                                <td>{!! $value->content !!}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->updated_at}}</td>
                                <td>
                                    <p><a href="">查看</a></p>
                                    <p><a href="">查看</a></p>
                                    <p><a href="">查看</a></p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection