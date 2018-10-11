<div class="block">
    <div class="bg-image" style="background-image: url('{{asset('image/profile_temp.jpg')}}');">
        <div class="bg-black-op">
            <div class="block-content block-content-full text-center">
                <i class="fa fa-4x fa-user text-warning push-30-t"></i>
                <h3 class="h4 text-uppercase text-white push-30-t push-5">{{$user->name}}</h3>
                <h4 class="h5 text-white-op push-20">{{$user->about}}</h4>
            </div>
        </div>
    </div>
    <div class="block-content block-content-full">
        <div class="row text-center">
            <div class="row items-push text-center">
                <div class="col-xs col-lg-3 col-xs-3 remove-margin-b">
                    <div class="push-5"><i
                            class="si @if($user->gender == 'M') si-user @else si-user-female @endif fa-2x"></i>
                    </div>
                    <div class="h5 font-w300 text-muted">Gender</div>
                </div>
                <div class="col-xs col-lg-3 col-xs-3 remove-margin-b">
                    <div class="push-5 h3">{{$user->age}}</div>
                    <div class="h5 font-w300 text-muted">Age</div>
                </div>
                <div class="col-xs col-lg-3 col-xs-3 remove-margin-b">
                    <div class="push-5"><i class="si si-home fa-2x"></i></div>
                    <div class="h5 font-w300 text-muted">{{$user->place}}</div>
                </div>
                <div class="col-xs col-lg-3 col-xs-3 remove-margin-b">
                    <div class="push-5"><i class="si si-eye fa-2x"></i></div>
                    <div class="h5 font-w300 text-muted">{{$last_login}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
