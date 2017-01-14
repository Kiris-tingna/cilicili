@extends('layouts.app')
@section('title')
    搜索页面
@endsection

@section('content')
    @foreach($results as $r)
    <p>{{ $r->name }}</p>
    @endforeach
    {!! $results->links() !!}
@endsection