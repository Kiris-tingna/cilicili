<h3>时间表</h3>
<div class="la-time">
<!-- Nav tabs -->
<ul class="nav nav-tabs la-timeboard" role="tablist">
    <li role="presentation" class="la-timeboard-nav active"><a href="#sunday" role="tab" data-toggle="tab">周日</a></li>
    <li role="presentation" class="la-timeboard-nav"><a href="#monday" role="tab" data-toggle="tab">周一</a></li>
    <li role="presentation" class="la-timeboard-nav"><a href="#tuesday" role="tab" data-toggle="tab">周二</a></li>
    <li role="presentation" class="la-timeboard-nav"><a href="#wednesday" role="tab" data-toggle="tab">周三</a></li>
    <li role="presentation" class="la-timeboard-nav"><a href="#thursday" role="tab" data-toggle="tab">周四</a></li>
    <li role="presentation" class="la-timeboard-nav"><a href="#friday" role="tab" data-toggle="tab">周五</a></li>
    <li role="presentation" class="la-timeboard-nav"><a href="#saturday" role="tab" data-toggle="tab">周六</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    @foreach($board as $key => $day)
        <div role="tabpanel" class="tab-pane @if($key == 'sunday') active @endif" id="{{ $key }}">
            <ul class="la-timeboard-content">
            @foreach($day as $t)
                <li>{{ $t->name }} <span class="la-timeboard-desc">更新至{{$t->particles}} {{ $t->state }}</span></li>
            @endforeach
            </ul>
        </div>
    @endforeach
</div>
</div>