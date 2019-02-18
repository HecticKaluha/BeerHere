@extends('layouts.landing.master')

@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">

@endpush

@section('content')
    <div class="col-lg-4 push-30-t col-lg-push-4 js-animation-object animated @if(!$errors->isEmpty()) shake @endif">
        <!-- Material Register -->
        <div class="block block-themed">
            <div class="block-header bg-success">
                <h3 class="block-title">Registreren</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" method="POST" action="{{ route('register') }}"
                      aria-label="{{ __('Register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                                       id="name" name="name"
                                       placeholder="Name..."
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
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="email"
                                       id="register2-email" name="email"
                                       placeholder="Email..."
                                       required>
                                <label for="register2-email">Email</label>
                                <span class="input-group-addon"><i class="si si-envelope"></i></span>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('place') ? ' is-invalid' : '' }}" type="text"
                                       id="place" name="place"
                                       placeholder="Amsterdam"
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
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       type="password" id="password" name="password"
                                       placeholder="Password..."
                                       required>
                                <label for="password">Password</label>
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control" type="password" id="password-confirm"
                                       name="password_confirmation" placeholder="Repeat password..." required>
                                <label for="password-confirm">Confirm password</label>
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="js-datepicker form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                       type="text" id="example-datepicker6"
                                       name="birthdate" data-date-format="dd-mm-yyyy"
                                       placeholder="dd-mm-yyyy" required>
                                <label for="example-datepicker6">Date of birth</label>
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
                        <div class="col-xs-12">
                            <div class="form-material input-group {{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                <label for="gender">Gender</label>
                                <div class="">
                                    <label id="gender" class="css-input css-radio css-radio-warning push-10-r">
                                        <input id="gender" type="radio" value="M" name="gender" checked=""><span></span> Male
                                    </label>
                                    <label class="css-input css-radio css-radio-warning">
                                        <input type="radio" value="F" name="gender"><span></span> Female
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i>Registreren
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Material Register -->
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
@endpush