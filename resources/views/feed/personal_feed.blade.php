<div class="col-lg-4">
    <div class="block">
        <div class="bg-image" style="background-image: url('{{asset('image/profile_temp.jpg')}}');">
            <div class="bg-black-op">
                <a href="#">
                    <div class="block-content block-content-full text-center">
                        <i class="fa fa-4x fa-user text-warning push-30-t"></i>
                        <h3 class="h4 text-uppercase text-white push-30-t push-5">{{$loggedInUser->name}}</h3>
                        <h4 class="h5 text-white-op push-20">{{$loggedInUser->place}}</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="row text-center">
                <div class="col-xs-4">
                    <a class="h2 font-w300" href="/personal/interests">{{$loggedInUser->interests->count()}}</a>
                    <div class="h5 text-muted push-5-t">Interests</div>
                </div>
                <div class="col-xs-4">
                    <a class="h2 font-w300" href="#">{{$loggedInUser->likes->count()}}</a>
                    <div class="h5 text-muted push-5-t">Liked</div>
                </div>
                <div class="col-xs-4">
                    <a class="h2 font-w300" href="#">{{$loggedInUser->matches->count()}}</a>
                    <div class="h5 text-muted push-5-t">Matches</div>
                </div>
            </div>
        </div>
    </div>
</div>
