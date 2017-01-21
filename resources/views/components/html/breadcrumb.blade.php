@foreach($parent as $breadcrumb)
    @foreach($breadcrumb->getAncestors() as $node)
        {{-- 当前节点 --}}
        <a href="@if( !!$node->parent_id ){{ url('/list', $node->id) }}@else{{ url('/index') }}@endif">{{ $node->band }}</a>
    @endforeach

    > <a href="{{ url('/list', $breadcrumb->id) }}">{{ $breadcrumb->band }}</a>
@endforeach
> {{ $current->name }}