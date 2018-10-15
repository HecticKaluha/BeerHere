<li>
    <div class="list-timeline-time"><?php echo e(\Carbon\Carbon::parse($item->pivot->liked_on)->format('D d-m-Y')); ?></div>
    <i class="si <?php echo e($type == 'like' ? 'si-like' : 'si-heart'); ?> list-timeline-icon bg-success"></i>
    <div class="list-timeline-content">
        <ul class="nav-users push">
            <li>
                <a href="/profile/<?php echo e($item->id); ?>">
                    <img class="img-avatar" src="<?php echo e(asset('image/profile_temp.jpg')); ?>" alt="">
                    You <?php echo e($type); ?>d <?php echo e($type == 'matche' ? 'with' : ''); ?> <?php echo e($item->name); ?>

                    <div class="font-w400 text-muted">
                        <small><?php echo e($item->place); ?></small>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</li>