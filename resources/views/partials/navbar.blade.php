<header class="main-header">
    <nav>
        <div class="top">
            <div class="left">
                <a href="{{ homepage_route() }}">{{ Config::string('app.name') }} | Home</a>
            </div>

            <div class="center">
                <form>
                    @csrf
                    <label>{{ Config::string('app.name') }}</label>
                    <input type="text" name="search" />
                    <input class="submit-btn" type="submit" name="submit-button" value="Search" />
                </form>
            </div>

            <div class="right">
                <ul class="topnav signup">
                    <a href="">Help</a> |
                    @guest
                        <a href="{{ route('login') }}">Log in</a> |
                        <a href="{{ route('register') }}">Register</a>

                    @else
                        <a href="{{ route('logout') }}">Log out</a>
                    @endguest
                </ul>
            </div>
        </div>

        <x-navbar />
    </nav>
</header>
