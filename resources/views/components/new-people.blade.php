<div class="new-people cool">
    <div class="top">
        <h4>Cool new people</h4>

        <div class="inner">
            {{-- TODO: Actually set values here. --}}
            @foreach($people as $user)
                <x-person :$user />
            @endforeach
        </div>
    </div>
</div>
