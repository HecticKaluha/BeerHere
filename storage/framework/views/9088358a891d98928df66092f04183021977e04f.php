<div class="block">
    <div class="bg-image" style="background-image: url('<?php echo e(asset('image/profile_temp.jpg')); ?>');">
        <div class="bg-black-op">
            <a href="/profile/<?php echo e($user->id); ?>">
                <div class="block-content block-content-full text-center">
                    <?php if($displayAll): ?><i class="fa fa-4x fa-user text-warning push-30-t"></i><?php endif; ?>
                    <h3 class="h4 text-uppercase text-white push-30-t push-5"><?php echo e($user->name); ?></h3>
                    <h4 class="h5 text-white-op push-20"><?php if($displayAll): ?><?php echo e($user->about); ?> <?php endif; ?></h4>
                </div>
            </a>
        </div>
    </div>
    <div class="block-content block-content-full">
        <div class="row text-center">
            <div class="row items-push text-center">
                <div class="col-xs col-lg-3 col-xs-3 remove-margin-b">
                    <div class="push-5"><i
                            class="si <?php if($user->gender == 'M'): ?> si-user <?php else: ?> si-user-female <?php endif; ?> fa-2x"></i>
                    </div>
                    <div class="h5 font-w300 text-muted">Gender</div>
                </div>
                <div class="col-xs col-lg-3 col-xs-3 remove-margin-b">
                    <div class="push-5 h3"><?php echo e(\Carbon\Carbon::parse($user->birthdate)->age); ?></div>
                    <div class="h5 font-w300 text-muted">Age</div>
                </div>
                <div class="col-xs col-lg-3 col-xs-3 remove-margin-b">
                    <div class="push-5"><i class="si si-home fa-2x"></i></div>
                    <div class="h5 font-w300 text-muted respsonsive_truncation"><?php echo e($user->place); ?></div>
                </div>
                <div class="col-xs col-lg-3 col-xs-3 remove-margin-b">
                    <div class="push-5"><i class="si si-eye fa-2x"></i></div>
                    <div class="h5 font-w300 text-muted respsonsive_truncation"><?php if(\Carbon\Carbon::parse($user->last_login)->diffInDays() < 1): ?>Today <?php elseif(\Carbon\Carbon::parse($user->last_login)->diffInDays() <= 7): ?> <?php echo e(\Carbon\Carbon::parse($user->last_login)->diffInDays() . " " . str_plural('day', \Carbon\Carbon::parse($user->last_login)->diffInDays()) . ' ago'); ?> <?php else: ?> Long ago <?php endif; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
