@extends('layouts.admin')
@section('title')
    发布通知页面
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">网站公告</h3>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                发送公告
            </div>
            <div class="panel-body">
                {!! Form::open(['url' => 'message/notify', 'method'=>'post']) !!}
                {!! Form::bsText('标题', 'title') !!}
                {!! Form::bsTextarea('通知内容', 'content') !!}
                {!! Form::submit('发送', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection