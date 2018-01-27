@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Notice / Show #{{ $notice->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('notices.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('notices.edit', $notice->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>Title</label>
<p>
	{{ $notice->title }}
</p> <label>Body</label>
<p>
	{{ $notice->body }}
</p> <label>User_id</label>
<p>
	{{ $notice->user_id }}
</p> <label>Department_id</label>
<p>
	{{ $notice->department_id }}
</p> <label>Reply_count</label>
<p>
	{{ $notice->reply_count }}
</p> <label>View_count</label>
<p>
	{{ $notice->view_count }}
</p> <label>Last_reply_user_id</label>
<p>
	{{ $notice->last_reply_user_id }}
</p> <label>Order</label>
<p>
	{{ $notice->order }}
</p> <label>Excerpt</label>
<p>
	{{ $notice->excerpt }}
</p> <label>Slug</label>
<p>
	{{ $notice->slug }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
