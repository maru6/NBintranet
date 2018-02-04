@extends('layouts.app')

@section('title', $notice->title)
@section('description', $notice->excerpt)

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 notice-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="text-center">
                    {{ $notice->title }}
                </h1>

                <div class="article-meta text-center">
                    {{ $notice->created_at }}
                    ⋅
                    <a href="{{ route('users.show', [$notice->user_id]) }}" title="{{ $notice->user->name }}"  style="color: #636b6f">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        {{ $notice->user->name }}
                    </a>
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

        {{-- 用户回复列表 --}}
        <div class="panel panel-default notice-reply">
            <div class="panel-body">
                @includeWhen(Auth::check(),'notices._noticereply_box', ['notice' => $notice])
                @include('notices._noticereply_list', ['noticereplies' => $notice->noticereplies()->with('user')->get()])
            </div>
        </div>

    </div>
</div>
@stop
