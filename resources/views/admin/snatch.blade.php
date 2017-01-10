@extends('layouts.app')
@section('title')
    抓取页面
@endsection

@section('content')
    <div class="container">
        @include('layouts.sidebar')

        <div class="col-md-10 col-sm-10 col-lg-10">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['url' => 'snatch/scrapy', 'method'=>'post']) !!}

                    {!! Form::bsText('url') !!}

                    {!! Form::submit('抓取', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection