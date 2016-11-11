@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                @foreach($category as $value)
                    <p>{{$value->name}}&nbsp;()</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
