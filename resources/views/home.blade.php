@extends('master')
@section('title', $title)

@section('content')
    <div class="row profile user-home">
        <div class="col w-40 left">
            <x-home-actions :$user />
            <x-indie-box />
            <x-announcements />
        </div>

        <div class="col right">
            <div class="row top-row">
                <div class="row top-row">
                    <x-blog-preview :$user />
                    <x-home-statistics :$user />
                </div>
            </div>

            <x-new-people />
        </div>
    </div>
@endsection
