@extends('layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    {{$user->name}}
                    <small>profile</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Profile</li>
                    <li><a class="link-effect" href="">{{$user->name}}</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">


        <div class="content">
            <h2 class="content-heading">Subscribed Interests</h2>
            <div class="row">
                @foreach($interests as $interest)
                    @include('interests.interest')
                @endforeach
            </div>
    </div>
@endsection
