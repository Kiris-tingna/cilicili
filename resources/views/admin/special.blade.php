@extends('layouts.admin')
@section('title')
    动漫操作页面
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">合集栏目关系</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>所属栏目</th>
                            <th>栏目操作</th>
                            <th>合集操作</th>
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
                                    <select class="la-admin-select form-control">
                                        @foreach($cates as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->band }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-info btn-sm la-admin-cate" data-id="{{ $cates[0]->id }}"
                                            data-sid="{{ $spe->id }}">增加栏目
                                    </button>
                                    <button class="btn btn-danger btn-sm la-admin-sync" data-id="{{ $cates[0]->id }}"
                                            data-sid="{{ $spe->id }}">更新栏目
                                    </button>
                                </td>
                                <td>
                                    <a href="{{ url('/snatch/sync', $spe->id) }}" class="btn btn-sm btn-primary">同步合集</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $specials->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
