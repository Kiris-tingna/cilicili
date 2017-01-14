@foreach($parent as $breadcrumb)
    @foreach($breadcrumb->getAncestors() as $node)
        {{-- 当前节点 --}}
        {{ $node->band }}
    @endforeach

    /{{ $breadcrumb->band }}
@endforeach
/{{ $current->name }}