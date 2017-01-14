@extends('layouts.app')
@section('title')
    动漫操作页面
@endsection

@section('content')
    <div class="container">

        @include('layouts.sidebar')

        <div class="col-md-10 col-sm-10 col-lg-10">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>名称</td>
                <td>所属栏目</td>
                <td>栏目操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($specials as $spe)
                <tr>
                    <td>{{ $spe->id }}</td>
                    <td>{{ $spe->name }}</td>
                    <td>
                        <p class="la-admin-label" data-sid="{{ $spe->id }}">
                        @foreach($spe->categories as $cate)
                            <label>{{ $cate->band }}</label>
                        @endforeach
                        </p>
                    </td>
                    <td>
                        <select class="la-admin-select">
                            @foreach($cates as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->band }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-info btn-sm la-admin-cate" data-id="{{ $cates[0]->id }}" data-sid="{{ $spe->id }}">增加栏目</button>
                        <button class="btn btn-danger btn-sm la-admin-sync" data-id="{{ $cates[0]->id }}" data-sid="{{ $spe->id }}">更新栏目</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $specials->links() !!}
        </div>
    </div>
@endsection
