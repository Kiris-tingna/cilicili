<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-envelope-o" style="font-size: 16px"></i> <span class="la-message">@if($message->count() > 0) {{ $message->count() }}@endif</span>
    </a>

    <ul class="dropdown-menu la-menu" role="menu">
        @foreach($message as $m)
            <li class="la-message-item">
                <p class="p1"><i class="fa fa-dot-circle-o"></i><span class="b1" >{{ $m->subject }}</span> <span class="b2 pull-right">{{ $m->creator()->name }}</span></p>
                <p class="p2">{{ str_limit($m->latestMessage->body, 22) }}</p>

                {{--participantsString传入的参数 用户排除当前用户--}}
                {{--<p>{{ $m->participantsString(Auth::id()) }}</p>--}}
            </li>
        @endforeach
        <li class="la-message-more"><a href="#">查看更多</a></li>
    </ul>
</li>