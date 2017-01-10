@extends('layouts.app')
@section('title')
播放页面
@endsection

@section('content')
    <div id="youkuplayer" style="width:480px;height:400px"></div>

    <p>名称：{{ $animate->name }}</p>
    <p>简介：{{ $animate->description }}</p>
    <p>ID：{{ $animate->special_id }}</p>
    <p>图片地址：{{ $animate->picture_uri }}</p>
    <p>更新时间：{{ $animate->updated_at }}</p>
    <p>播放：{{ $animate->played }}</p>
    <p>评论：{{ $animate->commented }}</p>
    <p>喜欢：{{ $animate->liked }}</p>
    <button class="btn btn-sm la-like-vid" data-id="{{ $animate->id }}">喜欢</button>

    @foreach ($lists as $list)
        <li>
            <a href="{{ action('HomeController@videos', $list->av) }}">
                <p>第 {{ $list->episode }} 集{{ $list->name }}</p>
                <p>{{ $list->description }}</p>
            </a>
        </li>
    @endforeach

    <script type="text/javascript" src="http://player.youku.com/jsapi"></script>
    <script type="text/javascript">
    var player = new YKU.Player('youkuplayer',{
        styleid: '0',
        client_id: '0de5c9326327eda8',
        vid: 'XMTc1MjgzNTQyNA==',
        newPlayer: true
    });
    </script>
@endsection