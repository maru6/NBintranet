@if (count($notices))

    <ul class="media-list">
        @foreach ($notices as $notice)
            <li class="media">
                <div class="media-left">
                    <a href="{{ route('users.show', [$notice->user_id]) }}">
                    </a>
                </div>

                <div class="media-body">

                    <div class="media-heading">
                        <a href="{{ route('notices.show', [$notice->id]) }}" class=" badge-{{ $notice->sticky_post ? 'bright' : 'normal' }}"  title="{{ $notice->title }}">
                            @if($notice->sticky_post)
                            <span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
                            @endif
                             {{ $notice->title }}
                        </a>

                        <a class="pull-right" href="{{ route('notices.show', [$notice->id]) }}" >
                            <span class="badge"> {{ $notice->reply_count }} </span>
                        </a>
                    </div>

                    <div class="media-body meta">

                        <a href="{{ route('departments.show', $notice->department->id) }}" title="{{ $notice->department->name }}">
                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                             {{ $notice->department->name }}
                        </a>
                        <span> • </span>
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <span class="timeago" title="最后活跃于">{{ $notice->updated_at }}</span>
                    </div>

                </div>
            </li>

            @if ( ! $loop->last)
                <hr>
            @endif

        @endforeach
    </ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif
