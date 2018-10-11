@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/slick/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/slick/slick-theme.min.css')}}">
@endpush

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

        <div class="col-lg-12">
            <h2 class="content-heading">Profile</h2>
            <div class="col-lg-5">
                @include('profile.profile_card')
            </div>
            <div class="col-lg-7">
                <div class="block block-themed">
                        <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <span>3 Photos</span>
                            </li>
                        </ul>
                        <h3 class="block-title">Gallery</h3>
                    </div>
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <!-- Menu -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Items -->
                        <div class="carousel-inner">

                            <div class="item active background">
                                <img class="img-responsive bg-image-cover" src="{{asset('image/profile_temp.jpg')}}" alt="Slide 1" />
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="{{asset('image/profile_temp.jpg')}}" alt="Slide 2" />
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="{{asset('image/profile_temp.jpg')}}" alt="Slide 3" />
                            </div>
                        </div>
                        <a href="#carousel" class="left carousel-control" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#carousel" class="right carousel-control" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
        <h2 class="content-heading">Subscribed Interests</h2>
            @foreach($interests as $interest)
                @include('interests.interest')
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script>
            $('.carousel').carousel()
        </script>
    @endpush

@endsection
