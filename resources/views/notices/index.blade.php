@extends('layouts.app')

@section('title', '新闻公告')

@section('content')

<div class="row">
    <div class="col-lg-9 col-md-9 notice-list">

        @if (isset($department))
            <div class="alert alert-info" role="alert">
                {{ $department->name }} ：{{ $department->description }}
            </div>
        @endif


        <div class="panel panel-default">

            <div class="panel-heading">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="#">最后回复</a></li>
                    <li role="presentation"><a href="#">最新发布</a></li>
                </ul>
            </div>

            <div class="panel-body">
                {{-- 公告列表 --}}
                @include('notices._notice_list', ['notices' => $notices])
                {{-- 分页 --}}
                {!! $notices->render() !!}
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 sidebar">
        @include('notices._sidebar')
    </div>
</div>

@endsection
