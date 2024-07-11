<!DOCTYPE HTML>
<html lang="{{ Str::replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') | {{ Config::string('app.name') }}</title>
    @include('partials.meta')
</head>

<body>
    @include('partials.navbar')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>
