@extends('layouts.admin')
@section('title')
    文章页面
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">新增文章</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-sm-10 col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    文章列表
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'post/create', 'method'=>'post']) !!}

                    {!! Form::bsText('标题', 'title') !!}
                    {!! Form::bsTextarea('内容', 'topic') !!}

                    {!! Form::submit('新增', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection