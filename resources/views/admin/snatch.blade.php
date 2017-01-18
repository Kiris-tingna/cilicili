@extends('layouts.admin')
@section('title')
    抓取页面
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">新增合集</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-sm-10 col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    bilibili 源
                </div>
                <div class="panel-body">
                {!! Form::open(['url' => 'snatch/scrapy', 'method'=>'post']) !!}

                {!! Form::bsText('url') !!}

                {!! Form::submit('抓取', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection