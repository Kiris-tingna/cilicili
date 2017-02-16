<h3>新闻资讯<a class="la-idata-more pull-right" href="{{ url('/page') }}">更多 <i class="fa fa-angle-right"></i></a></h3>
<style>
    .la-post{
        padding: 0;
        list-style-type: none;
    }
    .la-post-i{
        line-height: 20px;
        height: 20px;
        overflow: hidden;
        font-size: 12px;
        margin: 5px 0;
    }
</style>
<ul class="la-post">
@foreach($posts as $post)
    <li class="la-post-i">{{ $post->title }}</li>
@endforeach
</ul>