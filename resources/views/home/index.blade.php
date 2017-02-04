@extends('layouts.app')
@section('title')
    首页
@endsection
@section('content')
    <div class="container">
        @foreach($category as $k=>$cate)
            <div class="row">
                <div class="col-md-9">
                    <h3>{{$cate->band}}
                        <small>{{ $cate->slug }}</small>
                        <a class="la-idata-more pull-right" href="{{ url('/list', $cate->id) }}">更多 <i class="fa fa-angle-right"></i></a>
                    </h3>
                    <ul class="la-idata-container">
                        @foreach($cate->specials as $sp)
                            <li class="la-idata-item pull-left">
                                <a class="la-idata-pic" href="{{ url('/animate', $sp->id) }}">
                                    <img class="la-idata-image" src="{{$sp->picture_uri}}" alt="">
                                </a>
                                <p class="la-idata-tit">{{$sp->name}}</p>
                                <p class="la-idata-sub"><!--更新至<span>{{$sp->particles}}</span>话&nbsp;--><span>{{$sp->played}}</span>次浏览</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3">
                    @if($k == 0)
                        @include('components.html.timeboard')
                    @elseif($k == 1)
                        @include('components.html.postaside')
                    @endif
                </div>
            </div>
        @endforeach

    </div>
@endsection