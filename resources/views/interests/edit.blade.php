@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Edit
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
        <h2 class="content-heading">Edit {{$interest->name}}</h2>
        <div class="row">
            <form class="" action="/interests/update/{{$interest->id}}" method="post"
                  id="editInterest" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-lg-4 col-lg-push-4">
                    @if(!$errors->isEmpty())
                        <div class="alert alert-important alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h3 class="font-w300 push-15">There was something wrong with the data you entered</h3>
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                    <a class="block block-link-hover3">
                        <div class="text-center bg-image" id="preview_image"
                             style="background-image: url('{{asset($interest->picture_url)}}');">
                            <div class="bg-black-op block-content block-content-full">
                                <div class="block-content block-content-mini block-content-full">
                                    <div class="form-group push-50">
                                        <div class="col-sm-12">
                                            <div class="form-material floating">
                                                <input class="form-control" type="text" id="name" name="name" value="{{$interest->name}}">
                                                {{--<label for="name"><h3--}}
                                                {{--class="h4 text-uppercase text-warning push-5">Name</h3></label>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row items-push text-center">
                                <div class="col-xs-6">
                                    <div class="text-info upload-btn-wrapper">
                                        <div class="push-5"><i class="si si-camera fa-2x"></i></div>
                                        <div class="h5 font-w300 text-muted">Change image</div>
                                        <input type="file" id="image" name="image"/>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="cursor_hand text-success" onclick="document.getElementById('editInterest').submit();">
                                        <div class="push-5"><i class="fa fa-check fa-2x"></i></div>
                                        <div class="h5 font-w300 text-muted">Apply</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("#image").change(function () {
            var input = this;
            var form_data = new FormData();
            form_data.set('file', this.files[0]);
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
                        DisplayImagePreview(input);
                    }
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    $('#preview_image').css("backgroundImage","url('')");
                }
            })
        });

        function DisplayImagePreview(input) {
            // console.log(input.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview_image').css("backgroundImage","url('"+e.target.result+"')");
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush


