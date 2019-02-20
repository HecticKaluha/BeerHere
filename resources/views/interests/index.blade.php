@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Manage
                    <small>Interests</small>
                </h1>
            </div>
            {{--<div class="col-sm-5 text-right hidden-xs">--}}
            {{--<ol class="breadcrumb push-10-t">--}}
            {{--<li>Personal</li>--}}
            {{--<li><a class="link-effect" href="">Interests</a></li>--}}
            {{--</ol>--}}
            {{--</div>--}}
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Existing interests</h2>
        <div class="row">
            <div class="col-lg-4">
                <a class="block block-link-hover3">
                    <div class="text-center bg-image bg-city">
                        <div class="block-content block-content-full">
                            <div class="block-content block-content-mini block-content-full">
                                <div class="push-50">
                                    <div class="col-sm-12">
                                        <div class="form-material floating">
                                            <h3 class="h4 text-uppercase text-warning push-5"> New Interest</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push text-center">
                            <div class="col-xs-12">
                                <div class="cursor_hand text-info"
                                     onclick="window.location = '/interests/create/'">
                                    <div class="push-5"><i class="si si-plus fa-2x"></i></div>
                                    <div class="h5 font-w300 text-muted">Create new</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        @foreach($interests as $interest)
                @include('interests.crud_interest_card')
            @endforeach
        </div>
    </div>
@endsection
