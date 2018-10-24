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
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Settings</li>
                    <li><a class="link-effect" href="">Profile</a></li>
                </ol>
            </div>
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
                <form class="form-horizontal push-10-t push-10" action="/settings/editprofile" method="post">
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
                                        <textarea class="form-control input-lg {{ $errors->has('about') ? ' is-invalid' : '' }}" id="mega-bio" name="about" rows="22"
                                                  placeholder="Enter a few details about yourself..." value="{{$loggedInUser->about}}"></textarea>
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
                                               placeholder="dd-mm-yyyy" value="{{$loggedInUser->birthdate}}" required>
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
                                        <label id="gender" class="css-input css-radio css-radio-warning push-10-r {{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                            <input id="gender" type="radio" value="M" name="gender"
                                                   @if($loggedInUser->gender == 'M') checked="" @endif ><span></span> Male
                                        </label>
                                        <label class="css-input css-radio css-radio-warning">
                                            <input type="radio" value="F" name="gender" @if($loggedInUser->gender == 'F') checked="" @endif ><span></span> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 {{ $errors->has('image') ? ' is-invalid' : '' }}" for="example-file-input">File Input</label>
                                <div class="col-xs-12">
                                    <input type="file" id="example-file-input" name="image">
                                </div>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="img-container fx-img-zoom-in fx-opt-slide-down">
                                        <img class="img-responsive" src="{{asset('image/profile_temp.jpg')}}" alt="">
                                        <div class="img-options">
                                            <div class="img-options-content">
                                                <a class="btn btn-sm btn-default" href="javascript:void(0)"><i
                                                            class="fa fa-pencil"></i> Edit</a>
                                                <a class="btn btn-sm btn-default" href="javascript:void(0)"><i
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
    </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
            App.initHelpers(['datepicker']);
        });
    </script>

    <script>
        function uploadImage(){

        }
    </script>


@endpush