@extends('layouts.app')
@section('title')
    动漫详情页面
@endsection

@section('content')

    <p>名称：{{ $special->name }}</p>
    <p>特点：{{ $special->info }}</p>
    <p>简介：{{ $special->description }}</p>
    <p>地区：{{ $special->area }}</p>

    <p>年代：{{ $special->year }}/{{ $special->month }}</p>
    <p>更新周次：{{ $special->weekday }}</p>

    <p>图片地址：{{ $special->picture_uri }}</p>
    <p>更新时间：{{ $special->updated_at }}</p>
    <p>浏览：{{ $special->played }}</p>
    <p>评论：{{ $special->commented }}</p>
    <p>喜欢：{{ $special->liked }} </p>
    <button class="btn btn-sm la-like-spe" data-aid="{{ $special->id }}">喜欢</button>

    @foreach ($lists as $item)
        <li>
            <a href="{{ action('HomeController@videos', $item->av) }}">
                <p>第 {{ $item->episode }} 集{{ $item->name }}</p>
                <p>{{ $item->description }}</p>
            </a>
        </li>
    @endforeach

@endsection