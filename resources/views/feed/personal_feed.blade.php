<div class="bg-white">
    <section class="content">
        <div class="block col-lg-4">
            <div class="bg-image" style="background-image: url('image/profile_temp.jpg');">
                <div class="bg-black-op">
                    <div class="block-content block-content-full text-center">
                        <i class="fa fa-4x fa-sun-o text-warning push-30-t"></i>
                        <h3 class="h4 text-uppercase text-white push-30-t push-5">{{$loggedInUser->name}}</h3>
                        <h4 class="h5 text-white-op push-20">{{$loggedInUser->place}}</h4>
                    </div>
                </div>
            </div>
            {{--{{dd($loggedInUser->likes, $loggedInUser->likedBy)}}--}}
            <div class="block-content block-content-full">
                <div class="row text-center">
                    <div class="col-xs-4">
                        <div class="h2 font-w300">{{$loggedInUser->interests->count()}}</div>
                        <div class="h5 text-muted push-5-t">Interests</div>
                    </div>
                    <div class="col-xs-4">
                        <div class="h2 font-w300">{{$loggedInUser->likes->count()}}</div>
                        <div class="h5 text-muted push-5-t">Liked</div>
                    </div>
                    <div class="col-xs-4">
                        <div class="h2 font-w300">{{$loggedInUser->likedBy->count()}}</div>
                        <div class="h5 text-muted push-5-t">Liked By</div>
                    </div>
                    <div class="col-xs-4">
                        <div class="h2 font-w300">{{$loggedInUser->matches->count()}}</div>
                        <div class="h5 text-muted push-5-t">Matches</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
