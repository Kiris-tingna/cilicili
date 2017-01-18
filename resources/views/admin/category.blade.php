@extends('layouts.admin')
@section('title')
    栏目详情页面
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">栏目节点表</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                栏目节点
            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>栏目名</th>
                        <th>副标题</th>
                        <th>父节点</th>
                        <th>左值</th>
                        <th>右值</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cates as $cate)
                        <tr>
                            <td>{{ $cate->id }}</td>
                            <td>{{ $cate->band }}</td>
                            <td>{{ $cate->slug }}</td>
                            <td>{{ $cate->parent_id }}</td>
                            <td>{{$cate->_lft}}</td>
                            <td>{{$cate->_rgt}}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ url('/cate/up', $cate->id ) }}">同级上移</a>
                                <a class="btn btn-sm btn-default" href="{{ url('/cate/down', $cate->id) }}">同级下移</a>
                                <a class="btn btn-sm btn-danger" href="{{ url('/cate/root', $cate->id) }}">成为根节点</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                Panel Footer
            </div>
        </div>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    创建根节点
                </div>
                <div class="panel-body">
                {!! Form::open(['url' => 'cate/create']) !!}
                {!! Form::bsText('栏目名', 'band') !!}
                {!! Form::bsText('副标题', 'slug') !!}
                {!! Form::submit('创建', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    创建子节点
                </div>
                <div class="panel-body">
                {!! Form::open(['url' => 'cate/insert']) !!}
                {!! Form::bsText('父节点id', 'pid') !!}
                {!! Form::bsText('栏目名', 'band') !!}
                {!! Form::bsText('副标题', 'slug') !!}
                {!! Form::submit('创建', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection