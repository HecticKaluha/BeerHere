<div class="col-lg-4">
    <a class="block block-link-hover3">
        <div class="block-content block-content-full text-center bg-image"
             style="background-image: url('<?php echo e(asset('image/beer_interest.jpg')); ?>');">
            <div class="block-content block-content-mini block-content-full">
                <h3 class="h4 text-uppercase text-warning push-5"><i class="fa fa-glass text-warning"></i> <?php echo e($interest->name); ?></h3>
            </div>
        </div>
        <div class="block-content">
            <div class="row items-push text-center">
                <?php if(Auth::user()->id == $user->id): ?>
                    <div class="col-xs-6">
                        <div class="push-5"><i class="si si-users fa-2x"></i></div>
                        <div class="h5 font-w300 text-muted"><?php echo e($interest->users->count()); ?> subscriber(s)</div>
                    </div>

                    <div class="col-xs-6">
                        <?php if($interests->pluck('id')->contains($interest->id)): ?>
                            <div class="cursor_hand text-danger"
                                 onclick="window.location = '/interests/unsubscribe/<?php echo e($interest->id); ?>'">
                                <div class="push-5"><i class="si si-close fa-2x"></i></div>
                                <div class="h5 font-w300 text-muted">Unsubscribe</div>
                            </div>
                        <?php else: ?>
                            <div class="cursor_hand text-success"
                                 onclick="window.location = '/interests/subscribe/<?php echo e($interest->id); ?>'">
                                <div class="push-5"><i class="si si-check fa-2x"></i></div>
                                <div class="h5 font-w300 text-muted">Subscribe</div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php else: ?>
                    <div class="col-xs-12">
                        <div class="push-5"><i class="si si-users fa-2x"></i></div>
                        <div class="h5 font-w300 text-muted"><?php echo e($interest->users->count()); ?> subscriber(s)</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </a>
</div>
