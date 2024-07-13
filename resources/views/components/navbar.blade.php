<ul class="links">
    @foreach ($links as $name => $route)
        @php $css = active($route, 'active'); @endphp
        <li class="{{ $css }}">
            <a href="{{ $route }}">
                {{ $name }}
            </a>
        </li>
    @endforeach
</ul>
