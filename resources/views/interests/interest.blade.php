<div class="col-lg-4">
    <a class="block block-link-hover3">
        <div class="block-content block-content-full text-center bg-image"
             style="background-image: url('{{asset('image/beer_interest.jpg')}}');">

            <i class="fa fa-4x fa-glass text-warning push-30-t"></i>
            <div class="block-content block-content-mini block-content-full">
                <div class="text-center text-muted">{{$interest->name}}</div>
            </div>
        </div>
        <div class="block-content">
            <div class="row items-push text-center">
                <div class="col-xs-6">
                    <div class="push-5"><i class="si si-user fa-2x"></i></div>
                    <div class="h5 font-w300 text-muted">{{$interest->users->count()}} subscriber(s)</div>
                </div>
                <div class="col-xs-6">
                    @if($interests->pluck('id')->contains($interest->id))
                        <div class="cursor_hand text-danger" onclick="window.location = '/interests/unsubscribe/{{$interest->id}}'">
                            <div class="push-5"><i class="si si-close fa-2x"></i></div>
                            <div class="h5 font-w300 text-muted">Unsubscribe</div>
                        </div>
                    @else
                        <div class="cursor_hand text-success" onclick="window.location = '/interests/subscribe/{{$interest->id}}'">
                            <div class="push-5"><i class="si si-check fa-2x"></i></div>
                            <div class="h5 font-w300 text-muted">Subscribe</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </a>
</div>
