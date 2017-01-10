@extends('layouts.app')
@section('title')
    栏目详情页面
@endsection

@section('content')
    <div class="container">
        @include('layouts.sidebar')

        <div class="col-md-10 col-sm-10 col-lg-10">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>band</td>
                <td>slug</td>
                <td>父节点</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($cates as $cate)
                <tr>
                    <td>{{ $cate->id }}</td>
                    <td>{{ $cate->band }}</td>
                    <td>{{ $cate->slug }}</td>
                    <td>{{ $cate->parent_id }} {{$cate->_lft}}{{$cate->_rgt}}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ url('/cate/up', $cate->id ) }}">同级上移</a>
                        <a class="btn btn-sm btn-default" href="{{ url('/cate/down', $cate->id) }}">同级下移</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => 'cate/insert']) !!}
                {!! Form::bsText('pid') !!}
                {!! Form::bsText('band') !!}
                {!! Form::bsText('slug') !!}
                {!! Form::submit('创建') !!}
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
@endsection