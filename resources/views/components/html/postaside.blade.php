<h3>新闻资讯</h3>
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