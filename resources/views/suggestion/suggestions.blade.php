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
        <div id="suggestions" class="parent col-lg-6 col-lg-push-3 remove-padding col-xs-12 col-md-6 col-md-push-3"
             data-equal-height-children>
            @if($user != null)
                <div class="child block suggestion">
                    @include('profile.profile_card', compact('user', 'displayAll'))
                    <div class="block-content block-content-mini block-content-full bg-gray-lighter">
                        <div id="profileInCommon" class="text-center text-muted">In
                            common: @foreach($user->getCommonInterests as $commonInterest) <i
                                    class="fa fa-beer text-success"> {{$commonInterest->name}}</i>  @endforeach
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push text-center">
                            <div class="col-xs-6">
                                <a id="profileLike" class="cursor_hand like" onclick="like({{$user->id}})">
                                    <div class="push-5 text-success"><i class="si si-like fa-2x"></i></div>
                                    <div class="h5 font-w300 text-success">Like</div>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a id="profileDislike" onclick="dislike({{$user->id}})" class="cursor_hand dislike">
                                    <div class="push-5 text-danger"><i class="si si-dislike fa-2x"></i></div>
                                    <div class="h5 font-w300 text-danger">Dislike</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @include('empty.empty_suggestions')
            @endif
        </div>


    </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/equal_height/jquery.equalHeightChildren.js')}}"></script>
    <script src="{{asset('assets/js/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/pluralize/pluralize.js')}}"></script>

    <script id="noMoreSuggestions" type="text/x-custom-template">
        <div class="block">
            <div class="block-content block-content-full text-center">
                <h3 class="font-w300 text-black push-30-t push-30">Sorry, we couldn't find anymore profiles with common
                    interests. How about broadening the horizons?</h3>
                <div class="push-30">
                <span class="item item-2x item-circle bg-success-light">
                    <i class="si si-shuffle text-success"></i>
                </span>
                </div>
                <a class="btn btn-minw btn-rounded btn-noborder btn-success push-5" href="/personal/interests">Update
                    your interests</a>
                <p class="font-s12 text-muted">Mix it up!</p>
            </div>
        </div>
    </script>

    <script>
        $(window).load(function () {
            fixSize();
        });

        $(window).resize(function () {
            fixSize();
        });

        function fixSize() {
            $(".child").each(function (i, item) {
                $(item).width($('.parent').innerWidth());
            });
            $('.parent').height($('.child').innerHeight());
        }
    </script>

    <script>
        var nextSuggestion;

        var noMoreSuggestions = $('#noMoreSuggestions').html();

        function like(userId) {
            var target = event.target;
            var data = {id: userId, _token: '{{csrf_token()}}'};
            $.ajax({
                type: "POST",
                url: '/like',
                data: data,
                success: function (data) {
                    emptyAlert();
                    if (data.fail) {
                        $(document.body).append("<div id='flash-message' class='alert alert-danger js-animation-object animated shake' role='alert' style='z-index: 999999;'>" + data.errors.error + "</div>");
                    } else {
                        $(document.body).append("<div id='flash-message' class='alert alert-success js-animation-object animated pulse' role='alert' style='z-index: 999999;'>" + data.message.message + "</div>");
                        nextSuggestion = $(target).closest('.suggestion').clone();
                        $(target).closest('.suggestion').addClass("animated bounceOutLeft");
                        setTimeout(function () {
                            removeSuggestion(target)
                        }, 2000);
                    }
                    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            }).done(function (msg) {
                if (!msg.fail) {
                    getNextSuggestion();
                }
            });
        }

        function dislike(userId) {
            var target = event.target;
            var data = {id: userId, _token: '{{csrf_token()}}'};
            $.ajax({
                type: "POST",
                url: '/dislike',
                data: data,
                success: function (data) {
                    emptyAlert();

                    if (data.fail) {
                        $(document.body).append("<div id='flash-message' class='alert alert-danger js-animation-object animated shake' role='alert' style='z-index: 999999;'>" + data.errors.error + "</div>");
                    } else {
                        $(document.body).append("<div id='flash-message' class='alert alert-warning js-animation-object animated pulse' role='alert' style='z-index: 999999;'>" + data.message.message + "</div>");
                        nextSuggestion = $(target).closest('.suggestion').clone();
                        $(target).closest('.suggestion').addClass("animated bounceOutRight").css('z-index', '99');
                        setTimeout(function () {
                            removeSuggestion(target)
                        }, 2000);
                    }
                    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
                },
            }).done(function (msg) {
                if (!msg.fail) {
                    getNextSuggestion();
                }
            });
        }

        function removeSuggestion(target) {
            $(target).closest('.suggestion').remove();
        }

        function emptyAlert() {
            $('.alert').not('alert-important').remove();
        }

        function getNextSuggestion() {
            $.ajax({
                type: "GET",
                url: '/nextsuggestion',
                cache: false,
                success: function (data) {
                    if (data.fail) {
                        //fail
                        $("#suggestions").empty().append(noMoreSuggestions);
                    } else {
                        //success
                        $("#suggestions").prepend(nextSuggestion);

                        var _data = {id: data.message.id, _token: '{{csrf_token()}}'};
                        $.ajax({
                            type: "POST",
                            url: '/getcommoninterests',
                            data: _data,
                            success: function (response) {
                                if (response.fail) {
                                    $(nextSuggestion).find("#profileInCommon").empty().append("No interests in common");
                                } else {
                                    $(nextSuggestion).find("#profileInCommon").empty().append("In common: ");
                                    response.message.forEach(function (interest) {
                                        $(nextSuggestion).find("#profileInCommon").append("<i\n" +
                                            "                                    class=\"fa fa-beer text-success\"> " + interest.name + "</i> ");

                                    });
                                }
                            },
                            error: function (response) {

                            },
                        }).done(function (msg) {

                        });

                        if(data.message.avatar_url){
                            $(nextSuggestion).find("#profileAvatar").css("backgroundImage","url('"+data.message.avatar_url+"')");
                        }
                        else{
                            $(nextSuggestion).find("#profileAvatar").css("backgroundImage","url('image/no-profile.gif')");
                        }

                        $(nextSuggestion).find("#profileLink").attr("href", "/profile/"+data.message.id);
                        console.log($(nextSuggestion).find("#profileLink"));

                        $(nextSuggestion).find("#profileName").html(data.message.name);
                        $(nextSuggestion).find("#profileAbout").html(data.message.about);
                        if (data.message.gender === "M") {
                            $(nextSuggestion).find("#profileGenderIcon").removeClass("si-user si-user-female").addClass("si-user");
                        } else {
                            $(nextSuggestion).find("#profileGenderIcon").removeClass("si-user si-user-female").addClass("si-user-female");
                        }
                        var age = moment().diff(data.message.birthdate, 'years');
                        $(nextSuggestion).find("#profileAge").html(age);
                        $(nextSuggestion).find("#profilePlace").html(data.message.place);

                        var days = moment().diff(data.message.last_login, 'days');
                        if (days < 1) {
                            $(nextSuggestion).find("#profileLastSeen").html("Today");
                        } else if (days <= 7) {
                            $(nextSuggestion).find("#profileLastSeen").html(days + " " + pluralize('day', days) + " ago");
                        } else {
                            $(nextSuggestion).find("#profileLastSeen").html("Long ago");
                        }

                        $(nextSuggestion).find("#profileDislike").attr("onclick", "dislike(" + data.message.id + ")");
                        $(nextSuggestion).find("#profileLike").attr("onclick", "like(" + data.message.id + ")");


                        $(nextSuggestion).find("#profileLike").attr("onclick", "like(" + data.message.id + ")");
                    }
                },
                error: function (data) {

                },
            }).done(function (msg) {
                // alert( msg.msg );
            });
        }

    </script>
@endpush
