<?php $__env->startSection('title', 'Welcome!'); ?>

<?php $__env->startSection('content'); ?>
    <?php if( count($errors) > 0 ): ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul><?php echo e($error); ?></ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6">
            <h3>User Sign Up</h3>
            <form action="<?php echo e(route('signup')); ?>" method="post" class="form-horizontal">
                <div class="form-group <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
                    <label for="username">Your Name</label>
                    <input class="form-control" type="text" name="username" id="username" value="<?php echo e(Request::old('username')); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="<?php echo e(Request::old('password')); ?>">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Your Password</label>
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="<?php echo e(Request::old('confirm_password')); ?>">
                </div>
                <button class="btn btn-primary" type="submit">Sign Up</button>
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            </form>
        </div>
        <div class="col-md-6">
            <h3>User Sign In</h3>
            <form action="<?php echo e(route('signin')); ?>" method="post">
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="<?php echo e(Request::old('password')); ?>">
                </div>
                <button class="btn btn-primary" type="submit">Sign In</button>
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>