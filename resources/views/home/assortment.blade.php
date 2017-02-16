@extends('layouts.app')
@section('title')
    分类页
@endsection
@section('content')
    <div class="container">
        <div class="col-md-9">
        <ul class="la-list-wrapper">
        @foreach($specials as $sp)
         <li class="has-img row">
             <a href="{{ url('/animate', $sp->id) }}" class="img-wrapper pull-left"><img src="{{ $sp->picture_uri }}" alt=""></a>
             <p class="la-list-text ll">{{ $sp->name }}</p>
             <p class="la-list-info">
                 <span>{{ $sp->updated_at->diffForHumans() }}</span>
                 <span>播放: {{$sp->played}}</span>
                 <span>评论: {{$sp->commented}}</span>
             </p>
             <p class="ss">{{ $sp->description }}</p>
         </li>
        @endforeach
        </ul>
        </div>

        <div class="col-md-3">
            @include('components.html.postaside')
        </div>
    </div>
@endsection