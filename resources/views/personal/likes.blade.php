@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    {{Auth::user()->name}}
                    <small>Likes</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Personal</li>
                    <li><a class="link-effect" href="">Likes</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Liked profiles</h2>
        <div class="row">
            @if(!$likes->isEmpty())
                @foreach($likes as $user)
                    <div class="col-lg-4">
                        @include('profile.profile_card')
                    </div>
                @endforeach
            @else
                <div class="col-lg-12">
                    @include('empty.empty')
                </div>
            @endif
        </div>
    </div>
@endsection
