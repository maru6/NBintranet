@if (count($noticereplies))

<ul class="list-group">
    @foreach ($noticereplies as $noticereply)
        <li class="list-group-item">
            <a href="{{ $noticereply->notice->link(['#noticereply' . $noticereply->id]) }}">
                {{ $noticereply->notice->title }}
            </a>

            <div class="noticereply-content" style="margin: 6px 0;">
                {!! $noticereply->content !!}
            </div>

            <div class="meta">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 回复于 {{ $noticereply->created_at->diffForHumans() }}
            </div>
        </li>
    @endforeach
</ul>

@else
   <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
{!! $noticereplies->appends(Request::except('page'))->render() !!}
