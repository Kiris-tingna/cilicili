@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">文件上传</div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4 control-label">选择文件</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="files_upload" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="提交">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-12">

                {!! Form::open(['url' => 'foo/bar']) !!}
                {!! Form::bsText('username') !!}
                {!! Form::bsDate('date', \Carbon\Carbon::now()) !!}
                {!! Form::bsText('first_name') !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
