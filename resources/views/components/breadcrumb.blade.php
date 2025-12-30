@props(['items' => []])

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-house-door"></i> Home
            </a>
        </li>
        
        @foreach($items as $item)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $item['label'] }}</li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
