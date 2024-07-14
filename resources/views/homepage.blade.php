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

    <x-info-area />
@endsection
