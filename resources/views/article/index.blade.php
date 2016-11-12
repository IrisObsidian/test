@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <caption style="font-size: 22px;margin-bottom: 15px;">文章列表信息</caption>
                    <thead>
                    <tr>
                        <th>title</th>
                        <th>keywords</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>产品1</td>
                        <td>23/11/2013</td>
                        <td>待发货</td></tr>
                    <tr>
                        <td>产品2</td>
                        <td>10/11/2013</td>
                        <td>发货中</td></tr>
                    <tr>
                        <td>产品3</td>
                        <td>20/10/2013</td>
                        <td>待确认</td></tr>
                    <tr>
                        <td>产品4</td>
                        <td>20/10/2013</td>
                        <td>已退货</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection