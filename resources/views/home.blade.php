@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    {{Auth::user()->name}}
                    <small>Personal Feed</small>
                </h1>
            </div>
            {{--<div class="col-sm-5 text-right hidden-xs">--}}
                {{--<ol class="breadcrumb push-10-t">--}}
                    {{--<li>Home</li>--}}
                    {{--<li><a class="link-effect" href="">Personal feed</a></li>--}}
                {{--</ol>--}}
            {{--</div>--}}
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        @include('alerts.matchesWhenAway')
        <div class="row">
            <div class="col-lg-4">
                @include('feed.personal_feed')
            </div>

            <div class="col-lg-8">
                @include('feed.personal_timeline', ['feeditems' => $loggedInUser->orderedMatches, 'type' => 'matche'])
                @include('feed.personal_timeline', ['feeditems' => $loggedInUser->orderedLikes, 'type' => 'like'])
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
