<?php $__env->startSection('content'); ?>
    <div class="col-lg-4 push-30-t col-lg-push-4 animated <?php if(!$errors->isEmpty()): ?> shake <?php endif; ?>">
        <div class="block block-themed">
            <div class="block-header bg-primary">
                <h3 class="block-title">Login</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" method="POST" action="<?php echo e(route('login')); ?>"
                      aria-label="<?php echo e(__('Login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group form-material">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                       class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                                       value="<?php echo e(old('email')); ?>" placeholder="Vul je email in..." required autofocus>
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <label for="password">Wachtwoord</label>
                                <input class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"  type="password" id="password" name="password"
                                       placeholder="Vul je wachtwoord in..."
                                       required>
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="css-input switch switch-sm switch-primary">
                                <input name="remember"
                                       <?php echo e(old('remember') ? 'checked' : ''); ?> type="checkbox"><span></span> Remember Me?
                            </label>
                            <a class="small pull-right" href="<?php echo e(route('password.request')); ?>">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-primary" type="submit"><i
                                        class="fa fa-arrow-right push-5-r"></i> Log in
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>