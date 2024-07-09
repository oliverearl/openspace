<footer>
    <p>
        <a href="{{ Config::string('openspace.social.github') }}" target="_blank" rel="noopener">
            {{ Config::string('app.name') }} Engine
        </a>
    </p>
    <p>
        <em>Disclaimer: This project is not affiliated with MySpace&reg; in any way.</em>
    </p>
    <ul class="links">
        <li>
            <a href="">About</a>
        </li>
        <li>
            <a href="">Rules</a>
        </li>
        <li>
            <a href="{{ Config::string('openspace.social.github') }}" target="_blank" rel="noopener">
                Source Code
            </a>
        </li>
        <li>
            <a href="{{ Config::string('openspace.social.license') }}" target="_blank" rel="noopener">
                License
            </a>
        </li>
    </ul>

    <p class="copyright">
        <a href="{{ Config::string('openspace.social.github') }}" target="_blank" rel="noopener">
            &copy; {{ date('Y') }} {{ Config::string('app.name') }}
        </a>
    </p>

    @vite('resources/js/app.js')
</footer>
