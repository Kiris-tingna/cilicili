@extends('layouts.admin')
@section('title')
    同步合集页面
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">同步合集</h3>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                同步合集
            </div>
            <div class="panel-body">
                {!! Form::open(['url' => 'snatch/sync']) !!}
                {!! Form::bsText('合集id', 'id', $id) !!}
                {!! Form::bsText('源地址', 'url') !!}
                {!! Form::submit('同步', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection