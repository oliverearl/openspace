<div class="new-people cool">
    <div class="top">
        <h4>Cool New People</h4>

        <div class="inner">
            {{-- TODO: Actually set values here. --}}
            @foreach($people as $person)
                <div class="person">
                    <a href="">
                        <p>Username</p>
                    </a>
                    <a href="">
                        <img
                            class="pfp-fallback"
                            src=""
                            alt="Username"
                            loading="lazy"
                            style="width: 100%; max-height: 95px; aspect-ratio: 1/1;"
                        />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
