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
        <div class="parent col-lg-6 col-lg-push-3 remove-padding col-xs-12 col-md-6 col-md-push-3" data-equal-height-children>
            @foreach($suggestions as $key=>$user)
                <div class="child block remove-padding suggestion"
                     style="z-index:{{$key}};">
                    @include('profile.profile_card', compact('user', 'displayAll'))
                    <div class="block-content block-content-mini block-content-full bg-gray-lighter">
                        <div class="text-center text-muted">Overeenkomstige interests</div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push text-center">
                            <div class="col-xs-6">
                                <a href="">
                                    <div class="push-5 text-danger"><i class="si si-like fa-2x"></i></div>
                                    <div class="h5 font-w300 text-succes">Like</div>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#">
                                    <div class="push-5 text-danger"><i class="si si-dislike fa-2x"></i></div>
                                    <div class="h5 font-w300 text-danger">Dislike</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.parent').height($('.child').innerHeight() + 25);
        $('.child').width($('.parent').innerWidth());

        $(window).resize(function() {
            $(".child").each(function(i,item){
                $(item).width($('.parent').innerWidth());
            });
        });
    </script>
    <script src="{{asset('assets/js/plugins/equal_height/jquery.equalHeightChildren.js')}}"></script>


@endpush
