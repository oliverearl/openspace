@use(Illuminate\Support\Carbon)

<aside class="statistics col">
    <div class="heading">
        <h4>{{ $user->name }} statistics</h4>
        <br />
        <h4>{{ Carbon::now()->toFormattedDateString() }}</h4>
    </div>

    <div class="inner">
        <div class="m-row">
            <div class="m-col">
                <p>
                    Your friends: <br />
                    <a href=""><span class="count">Count</span></a>
                </p>
            </div>

            <div class="m-col">
                <p>
                    Profile views: <br />
                    <span class="count">Count</span>
                </p>
            </div>

            <div class="m-col">
                <p>
                    Joined: <br />
                    <span class="count"><em>Since</em></span>
                </p>
            </div>
        </div>
    </div>
</aside>
