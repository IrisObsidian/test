@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 text-center">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <caption style="font-size: 22px;margin-bottom: 25px;">系统基本信息</caption>
                    <tbody>
                    <tr>
                        <td>操作系统：</td>
                        <td>{{PHP_OS}}</td>
                    </tr>
                    <tr>
                        <td>运行环境：</td>
                        <td>{{$_SERVER['SERVER_SOFTWARE']}}</td>
                    </tr>
                    <tr>
                        <td>上传附件限制：</td>
                        <td>{{get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"}}</td>
                    </tr>
                    <tr>
                        <td>北京时间：</td>
                        <td>{{date('Y年m月d日 H:i:s')}}</td>
                    </tr>
                    <tr>
                        <td>服务器域名/IP：</td>
                        <td>{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</td>
                    </tr>
                    <tr>
                        <td>Host：</td>
                        <td>{{$_SERVER['SERVER_ADDR']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
