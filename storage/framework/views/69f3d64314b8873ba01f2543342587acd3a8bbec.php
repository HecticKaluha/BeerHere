<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    <?php echo e(Auth::user()->name); ?>

                    <small>Personal Feed.</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Home</li>
                    <li><a class="link-effect" href="">Personal feed</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <div class="col-lg-4">
            <?php echo $__env->make('feed.personal_feed', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="col-lg-8">
            <div class="col-lg-12">
                <?php echo $__env->make('feed.personal_timeline', ['feeditems' => $loggedInUser->orderedLikes, 'type' => 'like'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-lg-12 push-30-t">
                <?php echo $__env->make('feed.personal_timeline', ['feeditems' => $loggedInUser->orderedMatches, 'type' => 'matche'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>