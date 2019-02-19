<div class="col-lg-4">
    <a class="block block-link-hover3">
        <div class="block-content block-content-full text-center bg-image"
             style="background-image: url('{{$interest->picture_url}}');">
            <div class="block-content block-content-mini block-content-full">
                <h3 class="h4 text-uppercase text-warning push-5"><i
                            class="fa fa-glass text-warning"></i> {{$interest->name}}</h3>
            </div>
        </div>
        <div class="block-content">
            <div class="row items-push text-center">
                <div class="col-xs-6">
                    <div class="cursor_hand text-info"
                         onclick="window.location = '/interests/edit/{{$interest->id}}'">
                        <div class="push-5"><i class="si si-pencil fa-2x"></i></div>
                        <div class="h5 font-w300 text-muted">Edit</div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="cursor_hand text-danger"
                         onclick="window.location = '/interests/delete/{{$interest->id}}'">
                        <div class="push-5"><i class="fa fa-times fa-2x"></i></div>
                        <div class="h5 font-w300 text-muted">Delete</div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
