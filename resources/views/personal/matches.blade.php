@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    {{Auth::user()->name}}
                    <small>Matches</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Personal</li>
                    <li><a class="link-effect" href="">Matches</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Profiles you matched with</h2>
        @if(!$matches->isEmpty())
            @foreach($matches as $user)
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
@endsection
