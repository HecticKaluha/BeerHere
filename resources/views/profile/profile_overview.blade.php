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
                    <small>Profile</small>
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

        <div class="col-lg-12 row">
            <h2 class="content-heading">Profile</h2>
            <div class="row">
                <div class="col-lg-5">
                    @include('profile.profile_card')
                </div>
                <div class="col-lg-7">
                    <div class="block block-themed">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <span>{{$user->pictures->count()}} {{str_plural("picture",$user->pictures->count())}}</span>
                                </li>
                            </ul>
                            <h3 class="block-title">Gallery</h3>
                        </div>
                        @if(!$user->pictures->isEmpty())
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <!-- Menu -->
                                <ol class="carousel-indicators">
                                    @foreach($user->pictures as $key => $picture)
                                        <li data-target="#carousel" data-slide-to="{{$key}}"
                                            class="@if($key == 0) active @endif"></li>
                                    @endforeach
                                </ol>
                                <!-- Items -->
                                <div class="carousel-inner ribbon ribbon-modern ribbon-success">
                                    @if($user->id == Auth::user()->id)
                                        <a class="ribbon-box font-w600 cursor_hand"
                                           onclick="window.location = '/settings#upload_pictures'">
                                            <i class="fa fa-fw fa-plus"></i>
                                        </a>
                                    @endif
                                    {{--foreach image item--}}
                                    @foreach($user->pictures as $key => $picture)
                                        <div class="item @if($key == 0) active @endif">
                                            <img class="img-responsive" src="{{asset($picture->picture_url)}}"
                                                 alt=""/>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="#carousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a href="#carousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>

                        @else
                            <div>
                                <div class="carousel-inner">
                                    {{--foreach image item--}}
                                    <div class="block-content block-content-full ribbon ribbon-modern ribbon-success">
                                        @if($user->id == Auth::user()->id)
                                            <a class="ribbon-box font-w600 cursor_hand"
                                               onclick="window.location = '/settings#upload_pictures'">
                                                <i class="fa fa-fw fa-plus"></i>
                                            </a>
                                        @endif
                                        <div class="text-center push-20-t push">
                                            <i class="fa fa-picture-o fa-5x text-gray push"></i>
                                            <h3 class="h4">No pictures here yet :(</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 row">
            @include('personal.subscribed_interests')
        </div>
    </div>

    @push('scripts')
        <script>
            $('.carousel').carousel()
        </script>
    @endpush

@endsection
