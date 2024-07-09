<header class="main-header">
    <nav>
        <div class="top">
            <div class="left">
                <a href="">{{ Config::string('app.name') }} | Home</a>
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
                        <a href="">LogIn</a> |
                        <a href="">SignUp</a>

                    @else
                        <a href="">LogOut</a>
                    @endguest
                </ul>
            </div>

            <ul class="links">
                @foreach (Config::array('openspace.pages') as $name => $route)
                    @php $css = active($route, 'active'); @endphp
                    <li class="{{ $css }}">
                        <a href="{{ $route }}">
                            {{ $name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
