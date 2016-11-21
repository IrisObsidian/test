@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="col-sm-4 col-sm-offset-4 form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 text-right" style="font-size: 18px;">选择分类：</label>
                        <div class="col-sm-8">
                            <select id="cate" class="form-control" onchange="ChangeCate(this.value)">
                                @foreach($cate as $value)
                                    @if($value->name == $data[0]->cate_name)
                                        <option value="{{$value->name}}" selected="selected">{{$value->name}}</option>
                                    @else
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
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
                        <tbody id="info">
                        @foreach($data as $value)
                            <tr>
                                <td>{{$value->title}}</td>
                                <td>{{$value->keywords}}</td>
                                <td><img src="{{asset('img/'.$value->thumbnail)}}" width="100px" height="100px" alt=""></td>
                                <td>{!! substr($value->content,0,690) !!}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->updated_at}}</td>
                                <td>
                                    <p><a href="{{url('admin/article/'.$value->id)}}">查看</a></p>
                                    <p><a href="">修改</a></p>
                                    <p><a href="">删除</a></p>
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
@section('script')
    <script>
        function ChangeCate(cate_name) {
            $.post("{{url('admin/article')}}"+"/"+cate_name,{'_token':'{{csrf_token()}}'},function (data) {
                $('#info').empty();
                var info;
                //异步更改表内容
                for (item in data)
                {
                    info += '<tr>';
                    info += '<td>'+data[item]['title']+'</td>';
                    info += '<td>'+data[item]['keywords']+'</td>';
                    info += '<td><img src="{{asset('img/')}}'+"/"+data[item]['thumbnail']+'" width="100px" height="100px"></td>';
                    info += '<td>'+data[item]['content'].substr(0,690)+'</td>';
                    info += '<td>'+data[item]['created_at']+'</td>';
                    info += '<td>'+data[item]['updated_at']+'</td>';
                    info += '<td> <p><a href="{{url('admin/article')}}'+"/"+data[item]['id']+'">查看</a></p><p><a href="">修改</a></p> <p><a href="">删除</a></p> </td>';
                    info += '</tr>';
                }
                $('#info').append(info);
            });
        }
    </script>
@endsection