@if (is_string($item))
    <li class="header">{{ $item }}</li>
@else
    @if (isset($item['permission']))
        @can($item['permission'])
            @include('adminlte::partials.menu-item')
        @endcan
    @else
        @include('adminlte::partials.menu-item')
    @endif
@endif
