<div class="block block-themed">
    <div class="block-header <?php echo e($type == 'like' ? 'bg-primary' : 'bg-success'); ?>">
        <ul class="block-options">
            <li>
                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i
                            class="si si-size-fullscreen"></i></button>
            </li>
            <li>
                <button type="button" data-toggle="block-option" data-action="content_toggle"><i
                            class="si si-arrow-up"></i></button>
            </li>
        </ul>
        <h3 class="block-title"><a class="text-white" href="/personal/<?php echo e($type); ?>s"><?php echo e($type); ?>s</a></h3>
    </div>
    <div class="block-content timeline">
        <?php if(!$feeditems->isEmpty()): ?>
            <ul class="list list-timeline pull-t">
                <?php $__currentLoopData = $feeditems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('feed.feed_item', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php else: ?>
            <?php echo $__env->make('empty.empty', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>


    </div>
</div>

