@extends('layouts.app')
@section('title')
播放页面
@endsection

@section('content')
    <div class="bg-grey">
        <div class="container">
            <div class="la-player-t">
                <h3>{{ $animate->name }}</h3>
                <div class="la-player-ts">
                {{ Html::breadcrumb($animate->special->categories, $animate) }}
                <span>更新时间：{{ $animate->updated_at }}</span>
                </div>
            </div>

            <div class="">
                <div id="youkuplayer" class="la-player-body"></div>
            </div>

            <div class="la-player-footer row">
                <span class="la-co-span pull-left">
                    <span class="sp1">播放</span>
                    <span class="sp2">{{ $animate->played }}</span>
                </span>
                <span class="la-co-span pull-left">
                    <span class="sp1">评论</span>
                    <span class="sp2">{{ $animate->commented }}</span>
                </span>
                <span class="la-co-span pull-left">
                    <span class="sp1">喜欢</span>
                    <span class="sp2">{{ $animate->liked }}</span>
                </span>

                <button class="btn btn-sm la-like-vid" data-id="{{ $animate->id }}">喜欢</button>
            </div>

            <div class="la-player-footer row">
                <ul class="la-player-list">
                    @foreach ($lists as $list)
                        <li class="la-pit pull-left">
                            <a class="la-pit-t" href="{{ action('FrontController@videos', $list->av) }}">
                                {{ $list->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div>
                    {{ $animate->description }}
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript" src="http://player.youku.com/jsapi"></script>
    <script type="text/javascript">
    var player = new YKU.Player('youkuplayer',{
        styleid: '0',
        client_id: '0de5c9326327eda8',
        vid: '{{ $animate->source_uri }}',
        newPlayer: true
    });
    </script>
@endsection