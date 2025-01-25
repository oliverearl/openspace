<div class="person">
    <a href="{{ $user->profile_url }}">
        <p>{{ $user->name }}</p>
    </a>

    <a href="{{ $user->profile_url }}">
        <img
            class="pfp-fallback"
            src="{{ $user->profile_picture }}"
            alt="{{ $user->name }}"
            loading="lazy"
            style="width: 100%; max-height: 95px; aspect-ratio: 1/1;"
        />
    </a>
</div>
