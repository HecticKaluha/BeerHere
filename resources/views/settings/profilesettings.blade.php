@extends('layouts.master')


@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    {{Auth::user()->name}}
                    <small>Settings</small>
                </h1>
            </div>
            {{--<div class="col-sm-5 text-right hidden-xs">--}}
                {{--<ol class="breadcrumb push-10-t">--}}
                    {{--<li>Settings</li>--}}
                    {{--<li><a class="link-effect" href="">Profile</a></li>--}}
                {{--</ol>--}}
            {{--</div>--}}
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Profile settings</h2>
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"><i
                                    class="si si-arrow-up"></i></button>
                    </li>
                </ul>
                <h3 class="block-title">Edit profile</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="/settings/editprofile" method="post"
                      id="upload_form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               type="text"
                                               id="name" name="name"
                                               placeholder="Name..."
                                               value="{{$loggedInUser->name}}"
                                               autofocus required>
                                        <label for="name">Naam</label>
                                        <span class="input-group-addon"><i class="si si-user"></i></span>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('place') ? ' is-invalid' : '' }}"
                                               type="text"
                                               id="place" name="place"
                                               placeholder="Amsterdam"
                                               value="{{$loggedInUser->place}}"
                                               required>
                                        <label for="place">Where do you live?</label>
                                        <span class="input-group-addon"><i class="si si-pointer"></i></span>
                                    </div>
                                    @if ($errors->has('place'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="">
                                        <label for="mega-bio">About</label>
                                        <textarea
                                                class="form-control input-lg {{ $errors->has('about') ? ' is-invalid' : '' }}"
                                                id="mega-bio" name="about" rows="22"
                                                placeholder="Enter a few details about yourself...">{{$loggedInUser->about}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material input-group">
                                        <input class="js-datepicker form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                               type="text" id="example-datepicker6"
                                               name="birthdate" data-date-format="dd-mm-yyyy"
                                               placeholder="dd-mm-yyyy"
                                               value="{{\Carbon\Carbon::parse($loggedInUser->birthdate)->format('d-m-Y')}}"
                                               required>
                                        <label for="example-datepicker6">Birthdate</label>
                                        <span class="input-group-addon"><i class="si si-calendar"></i></span>
                                    </div>
                                    @if ($errors->has('birthdate'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="gender">Gender</label>
                                    <div class="">
                                        <label id="gender"
                                               class="css-input css-radio css-radio-warning push-10-r {{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                            <input id="gender" type="radio" value="M" name="gender"
                                                   @if($loggedInUser->gender == 'M') checked="" @endif ><span></span>
                                            Male
                                        </label>
                                        <label class="css-input css-radio css-radio-warning">
                                            <input type="radio" value="F" name="gender"
                                                   @if($loggedInUser->gender == 'F') checked="" @endif ><span></span>
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                       for="image">Upload a profile picture</label>
                                <div class="col-xs-12">
                                    <input type="file" id="image" name="image">
                                </div>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div id="profile_picture" class="img-container fx-img-zoom-in fx-opt-slide-down">
                                        <img id="preview_image" class="img-responsive"
                                             src="@if($loggedInUser->avatar_url){{asset($loggedInUser->avatar_url)}}@else {{asset('image/no-profile.gif')}} @endif"
                                             alt="">
                                        <div class="img-options">
                                            <div class="img-options-content">
                                                <a class="btn btn-sm btn-default" id="delete" onclick="remove()"><i
                                                            class="fa fa-times"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-warning" type="submit"><i class="fa fa-check push-5-r"></i> Update
                                profile
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a name="upload_pictures"></a>
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"><i
                                    class="si si-arrow-up"></i></button>
                    </li>
                </ul>
                <h3 class="block-title">Upload pictures</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="/upload/images" method="post"
                      id="upload_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-important alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p class="font-w300 push-15">{{ session('error') }}</p>
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="col-xs-12 {{ $errors->has('images') ? ' is-invalid' : '' }}"
                                       for="images">Upload pictures</label>

                                <div class="col-xs-12">
                                    <input type="file" id="images" name="images[]" multiple>
                                    {{--@if ($errors->has('images'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                    {{--<strong>{{ $errors->first('images') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    @if ($errors->has('images.*') || $errors->has('images'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first()}}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-warning" type="submit"><i class="fa fa-check push-5-r"></i> Upload
                                pictures
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script>
        var removed = false;
        var formData = $('form').serializeArray();

        $("#upload_form").submit(function () {

                if (removed) {
                    var input = $("<input>")
                        .attr("type", "hidden")
                        .attr("name", "removed").val("true");
                    $('#upload_form').append(input);
                }
            });


        jQuery(function () {
            // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
            App.initHelpers(['datepicker']);
        });
        $("#image").change(function () {
            var input = this;
            var form_data = new FormData();
            form_data.append('file', this.files[0]);
            form_data.append('_token', '{{csrf_token()}}');
            $.ajax({
                url: '/validate/image',
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        alert(data.errors['file']);
                        $('#image').val('');
                    }
                    else {
                        var imgpreview = DisplayImagePreview(input);
                    }
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    $('#preview_image').attr('src', '{{asset('image/no-profile.gif')}}');
                }
            })
        });

        $("#images").change(function () {
            var form_data = new FormData();
            var numberOfFiles = 0;
            $.each(this.files, function(i, file) {
                form_data.append('file[]', file);
                numberOfFiles++;
            });
            form_data.append('_token', '{{csrf_token()}}');
            $.ajax({
                url: '/validate/images',
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        $.each(data.errors, function(index, value){
                            var number = parseInt(index.substr(index.indexOf('.') +1)) +1;
                            index = index.replace('.', ' ');
                            index = index.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                return letter.toUpperCase();
                            });
                            console.log("File " + number + ": " +value[0]);
                        });
                        $('#images').val('');
                    }
                    else {
                        
                    }
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            })
        });

        function DisplayImagePreview(input) {
            // console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                $('#profile_picture').append("<div class='img-options'><div class='img-options-content'><a class='btn btn-sm btn-default' id='delete' onclick='remove()'><i class='fa fa-times'></i> Delete</a></div></div>");

            }
        }

        function remove() {
            $('#preview_image').attr('src', '{{asset('image/no-profile.gif')}}');
            $('.img-options').remove();
            $('#image').val('');
            removed = true;
        }


    </script>


@endpush