@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    {{Auth::user()->name}}
                    <small>Interests</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Personal</li>
                    <li><a class="link-effect" href="">Interests</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Suggested users</h2>
        <div class="row">
            @foreach($suggestions as $key=>$user)
                <div class="col-lg-6 position-fixed top push-5-l" style="z-index:{{$key}};">
                    @include('profile.profile_card', compact('user', 'displayAll'))
                </div>
            @endforeach
        </div>
    </div>
@endsection
