@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-10">
            @foreach($category as $cate)
                <p>{{$cate->band}}{{$cate->slug}}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection
