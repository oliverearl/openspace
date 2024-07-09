<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="utf-8" />
<meta name="description" content="{{ Config::string('openspace.meta.description') }}" />

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ Config::string('app.url') }}" />
<meta property="og:title" content="{{ Config::string('app.name') }}" />
<meta property="og:description" content="{{ Config::string('openspace.meta.description') }}" />
<meta property="og:image" content="https://3to.moe/a/corespace.png" />

{{-- X --}}
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ Config::string('app.url') }}" />
<meta name="twitter:title" content="{{ Config::string('app.name') }}" />
<meta name="twitter:description" content="{{ Config::string('openspace.meta.description') }}" />
<meta name="twitter:image" content="https://3to.moe/a/corespace.png" />

<link rel="icon" href="{{ asset('favicon.ico') }}" />

@vite('resources/css/app.css')
