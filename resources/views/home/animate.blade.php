@extends('layouts.app')
@section('title')
    动漫详情页面
@endsection

@section('content')
    <style>
        .la-ani-header {
            font-size: 14px;
            margin-top: 10px;
            line-height: 26px;
        }
        .la-ani-header > a{
            font-size: 14px;
            text-decoration: none;
        }
    </style>
    <div class="bg-grey">
    <div class="container">
        <div class="la-ani-header">
        {{ Html::breadcrumb($special->categories, $special) }}
        </div>
        <div class="la-ani row">
            <div class="la-ani-band">
                <img class="la-ani-image" src="{{ $special->picture_uri }}" alt="">
            </div>

            <div class="la-ani-main">
                <h4 class="la-ani-tit">{{ $special->name }} <div class="la-ani-tw pull-right"><span class="la-ani-tip">{{ $special->month }}月番</span></div></h4>
                <p class="la-ani-update">
                    <span>更新周次：{{ $special->weekday }}</span>
                </p>
                <div class="la-ani-desc">
                    <p>
                        <span>地区：{{ $special->area }}</span>
                        <span>年代：{{ $special->year }}/{{ $special->month }}</span>
                    </p>
                    <p>
                        <span>浏览：{{ $special->played }}</span>
                        <span>评论：{{ $special->commented }}</span>
                        <span>喜欢：{{ $special->liked }} </span>
                    </p>
                </div>
                <p>特点：{{ $special->info }}</p>
                <p class="la-ani-update">于{{ $special->created_at->diffForHumans() }}创建</p>

                <p class="la-ani-into">简介：{{ $special->description }}</p>


                <button class="btn btn-sm la-like-spe" data-aid="{{ $special->id }}"><i class="fa fa-heart-o"></i>喜欢</button>
            </div>
        </div>
        {{-- 分集 --}}
        <div class="la-fj row">
        <h3>分集</h3>
        <ul class="la-fj-ul">
        <?php
            if($lists->count() < 20) {
                $class = 'col-md-6';
            }
            else if($lists->count() < 30) {
                $class = 'col-md-4';
            }
            else{
                $class = 'col-md-3';
            }
        ?>
        @foreach ($lists as $item)
        <li class="{{$class}}">
            <a class="la-fj-li" href="{{ action('FrontController@videos', $item->av) }}">
                <p class="la-fj-tit">第 {{ $item->episode }} 集   {{ $item->name }}</p>
                <p>{{ $item->description }}</p>
            </a>
        </li>
        @endforeach
        </ul>
        </div>
        </div>
    </div>
@endsection
