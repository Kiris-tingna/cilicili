@extends('layouts.app')
@section('title')
    分类页
@endsection
@section('content')
    <div class="container">
        @foreach($specials as $sp)
            <p>{{ $sp->name }}</p>
        @endforeach
    </div>
@endsection