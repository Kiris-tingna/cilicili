@extends('layouts.app')
@section('title')
    首页
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                @foreach($category as $cate)
                    <h3>{{$cate->band}}<small>{{$cate->slug}}</small></h3>
                    <ul class="la-idata-container row">
                    @foreach($cate->specials as $sp)
                        <li class="la-idata-item pull-left">
                            <a class="la-idata-pic" href="{{ url('/animate', $sp->id) }}">
                                <img class="la-idata-image" src="{{$sp->picture_uri}}" alt="">
                            </a>
                            <p class="la-idata-tit">{{$sp->name}}</p>
                            <p class="la-idata-sub"><span>{{$sp->played}}</span>次播放</p>
                        </li>
                    @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection