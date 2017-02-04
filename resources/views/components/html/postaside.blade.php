<h3>新闻资讯</h3>
<ul>
@foreach($posts as $post)
    <li>{{ $post->title }}</li>
@endforeach
</ul>