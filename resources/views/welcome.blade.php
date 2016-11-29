@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if(isset($error))
                    <p class="text-center" style="color: red;font-size: 18px;">{{$error}}</p>
                @else
                    <div class="col-sm-2">
                        @foreach($category as $value)
                            <p><a onclick="ChangeCate('{{$value->name}}')">{{$value->name}}</a></p>
                        @endforeach
                    </div>
                    <div id="text" class="col-sm-10">
                        @foreach($article as $item)
                            <div class="col-sm-12">
                                <div class="col-sm-4"><a href="{{url('showart/'.$item->id)}}">{{$item->title}}</a></div>
                                <div class="col-sm-8">{{$item->keywords}}</div>
                                <div class="col-sm-4"><img src="{{asset('img/'.$item->thumbnail)}}" width="100px" height="100px" alt=""></div>
                                <div class="col-sm-8">{!! substr($item->content,0,690) !!}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function ChangeCate(cate_name) {
            $.get("{{url('chcate')}}"+"/"+cate_name,function (data) {
                $('#text').empty();
                var text = '';
                for(item in data)
                {
                    text += '<div class="col-sm-12">';
                    text += '<div class="col-sm-4"><a href="{{url('showart')}}'+"/"+data[item]['id']+'">'+data[item]["title"]+'</a></div>';
                    text += '<div class="col-sm-8">'+data[item]['keywords']+'</div>';
                    text += '<div class="col-sm-4"><img src="{{asset('img/')}}'+"/"+data[item]['thumbnail']+'" width="100px" height="100px" alt=""></div>';
                    text += '<div class="col-sm-8">'+data[item]['content']+'</div>';
                    text += '</div>';
                }
                $('#text').append(text);
            })
        }
    </script>
@endsection
