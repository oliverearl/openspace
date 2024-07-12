@extends('master')
@section('title', $title)

@push('head')
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
        }

        @media screen and (max-width: 768px) {
            .row.home {
                display: flex;
                flex-direction: column;
            }

            .col {
                width: 100%;
            }

            .col.right {
                width: 60%;
                margin: 0 auto;
            }

            .col.w-60 {
                width: 100%;
            }

            .master-container {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <div class="row home">
        <div class="col w-60 left">
            <x-new-people />
            <x-music />
            <x-announcements />
        </div>

        <div class="col right">
            <x-message-of-the-day />
            <x-login-signup-form />

            <div class="value-info">
                Stuff goes here.
            </div>

            <div class="indie-box">
                <p>
                    {{ Config::string('app.name') }} is an open source social network. Check out the code and host your
                    own instance!
                </p>

                <p>
                    <a href="{{ Config::string('openspace.social.github') }}" class="more-details">[more details]</a>
                </p>
            </div>
        </div>
    </div>

    <div class="row info-area">
        <div class="col info-box">
            <h3>Retro Social</h3>
            <p>All the things you missed most about Social Networks are back: Bulletins, Blogs, Forums, and so
                much more!</p>
            <p class="link">&raquo; <a href="register.php"
                                       title="Join {{ Config::string('app.name') }} Today">Join Today</a></p>
        </div>
        <div class="col info-box">
            <h3>Privacy Friendly</h3>
            <p>No algorithms, no tracking, no personalized Ads - just a safe space for you and your friends to
                hang out online!</p>
            <p class="link">&raquo; <a href="browse.php"
                                       title="Browse {{ Config::string('app.name') }} Profiles">Browse Profiles</a></p>
        </div>
        <div class="col info-box">
            <h3>Fully Customizable</h3>
            <p>Featuring custom HTML and CSS to give you all the freedom you need to make your Profile truly
                <i>your</i> Space on the web!
            </p>
            <p class="link">&raquo; <a href="layouts/"
                                       title="Discover custom {{ Config::string('app.name') }} Layouts">Discover Layouts</a></p>
        </div>
        <div class="col info-box">
            <h3>Join Today!</h3>
            <p>Join your friends on the web or meet some new ones.</p>
            <p class="link">&raquo; <a href="register.php"
                                       title="Sign Up for {{ Config::string('app.name') }}">SignUp Now</a></p>
        </div>
    </div>
@endsection
