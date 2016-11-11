@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12" style="font-size: 22px;margin-bottom: 25px;">新增文章</div>
            <form action="{{url('admin/article')}}" class="form-horizontal" role="form" method="post" style="font-size: 18px;">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">所属分类：</label>
                    <div class="col-sm-10">
                        <select name="cate_id" class="form-control">
                            @foreach($cate as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-2">
                        <button type="submit" class="btn btn-default">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection