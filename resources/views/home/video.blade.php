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

            <div class="J_hook_id" data-episode-id="{{ $animate->source_uri }}">
                <video id="bilibili" src="" controls="controls" autoplay="autoplay" class="la-player-body"></video>
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
@endsection

@section('js')
    <script type="application/javascript">
    $(function(){
        /**
         * --------------- bilibili video operation --------------------
         */
        var BiliBiliApi = function(aid, page, quality) {
            $.ajax({
                url: '/api/resolve/'+aid+'/'+page+'/'+quality,
                type: 'GET',
                dataType: 'json',
            }).done(function (data) {
                $('#bilibili').attr('src', data.data)
            })
        }

        BiliBiliApi($('.J_hook_id').data('episode-id'), 1, 2);
    })
    </script>
@endsection