<aside class="row info-area">
    @foreach ($cells as $cell)
        <div class="col info-box">
            <h3>{{ $cell->title }}</h3>
            <p>
                {!! $cell->description !!}
            </p>
            <p class="link">
                <a href="{{ $cell->destination }}" title="{{ $cell->link }}">
                    {{ $cell->link }}
                </a>
            </p>
        </div>
    @endforeach
</aside>
