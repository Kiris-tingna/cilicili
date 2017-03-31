@extends('layouts.app')
@section('title')
    文章列表页面
@endsection

@section('content')
    <div class="container">
        <style>
            .la-post-item {
                width: 100%;
                margin: 0 8px 20px 12px;
                position: relative;
            }
            .rank {
                position: absolute;
                display: block;
                left: -12px;
                top: 0;
                width: 48px;
                height: 48px;
                padding: 0 10px;
                background-color: rgb(253, 71, 77);
                color: rgb(255, 255, 255);
                text-align: right;
                cursor: pointer;
                transition: all 0.2s ease 0.1s;
                overflow: hidden;
            }
            .rank:hover {
                background-color: #ff8e3e;
                left: -16px;
            }
            .rank .votes {
                font-size: 18px;
                font-weight: 800;
            }
            .summary {
                padding-left: 42px;
                color: #b5bbc8;
                font-size: 12px;
            }
            .author {
                padding: 0;
                list-style-type: none;
            }
            .author .sub > a{
                color: #e04270;
                font-size: 12px;
            }
            .title {
                font-size: 16px;
                margin: 0;
            }
            .title > a{
                color: #e04270;
                text-decoration: none;
            }
        </style>
        <div class="row">
            <div class="col-md-9">
            @foreach($posts as $post)
                <section class="la-post-item">

                    <div class="rank">
                        <div class="votes">{{ $post->votes }}</div>
                        <small>投票</small>
                    </div>

                    <div class="summary">
                        <ul class="author">
                            <li class="sub">
                                <a href="#">{{ $post->user->name }}</a>
                                <span class="split">/</span>
                                {{ $post->created_at }}
                                <span class="split">/</span>
                                {{ $post->created_at->diffForHumans() }}
                            </li>
                        </ul>
                        <h2 class="title"><a href="{{ url('/post', $post->id) }}">{{ $post->title }}</a></h2>
                    </div>
                </section>
            @endforeach
            </div>
            <div class="col-md-3">
                @include('components.html.postaside')
            </div>
        </div>

    </div>

@endsection
