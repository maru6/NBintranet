@extends('layouts.app')

@section('title', $notice->title)
@section('description', $notice->excerpt)

@section('content')

<div class="row">

    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="text-center">
                    作者：{{ $notice->user->name }}
                </div>
                <hr>
                <div class="media">
                    <div align="center">
                        <a href="{{ route('users.show', $notice->user->id) }}">
                            <img class="thumbnail img-responsive" src="{{ $notice->user->avatar }}" width="300px" height="300px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 notice-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="text-center">
                    {{ $notice->title }}
                </h1>

                <div class="article-meta text-center">
                    {{ $notice->created_at }}
                    ⋅
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                    {{ $notice->reply_count }}
                </div>

                <div class="notice-body">
                    {!! $notice->body !!}
                </div>

                @can('update', $notice)
                    <div class="operate">
                        <hr>
                        <a href="{{ route('notices.edit', $notice->id) }}" class="btn btn-default btn-xs pull-left" role="button">
                            <i class="glyphicon glyphicon-edit"></i> 编辑
                        </a>
                        <form action="{{ route('notices.destroy', $notice->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-default btn-xs pull-left" style="margin-left: 6px">
                                <i class="glyphicon glyphicon-trash"></i>
                                 删除
                            </button>
                        </form>
                    </div>
                @endcan

            </div>
        </div>
    </div>
</div>
@stop
