@extends('layouts.app')
@section('title')
    文章列表页面
@endsection

@section('content')
    <div class="container">

        <div class="row">
            @foreach($posts as $post)
                <section class="">

                    <div class="rank">
                        <div class="votes">
                            {{ $post->votes }}
                            <small>支持</small>
                        </div>
                    </div>

                    <div class="summary">
                        <ul class="author">
                            <li>
                                <a href="#">###</a>
                                <span class="split"></span>
                                {{ $post->created_at->diffForHumans() }}
                            </li>
                        </ul>
                        <h2 class="title"><a href="{{ url('/post', $post->id) }}">{{ $post->title }}</a></h2>
                    </div>
                </section>
            @endforeach
        </div>

    </div>

@endsection
