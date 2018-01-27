@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> Notice
                    <a class="btn btn-success pull-right" href="{{ route('notices.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                </h1>
            </div>

            <div class="panel-body">
                @if($notices->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Title</th> <th>Body</th> <th>User_id</th> <th>Department_id</th> <th>Reply_count</th> <th>View_count</th> <th>Last_reply_user_id</th> <th>Order</th> <th>Excerpt</th> <th>Slug</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($notices as $notice)
                                <tr>
                                    <td class="text-center"><strong>{{$notice->id}}</strong></td>

                                    <td>{{$notice->title}}</td> <td>{{$notice->body}}</td> <td>{{$notice->user_id}}</td> <td>{{$notice->department_id}}</td> <td>{{$notice->reply_count}}</td> <td>{{$notice->view_count}}</td> <td>{{$notice->last_reply_user_id}}</td> <td>{{$notice->order}}</td> <td>{{$notice->excerpt}}</td> <td>{{$notice->slug}}</td>
                                    
                                    <td class="text-right">
                                        <a class="btn btn-xs btn-primary" href="{{ route('notices.show', $notice->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i> 
                                        </a>
                                        
                                        <a class="btn btn-xs btn-warning" href="{{ route('notices.edit', $notice->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>

                                        <form action="{{ route('notices.destroy', $notice->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $notices->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection