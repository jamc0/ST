<?php $__env->startSection('htmlheader_title'); ?>
    Inicio de Sesión
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body class="hold-transition login-page" style ="background-color: #ffffff;">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo">
<i style="color: #009688" class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                <a href="<?php echo e(url('/')); ?>"><font color="#ffa000" face="Arial Black" size=20;>ACME</font></a>





            </div><!-- /.login-logo -->

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> <?php echo e(trans('adminlte_lang::message.someproblems')); ?><br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="login-box-body" style ="background-color: #dcedc8;">
        <p class="login-box-msg"> <?php echo e(trans('adminlte_lang::message.siginsession')); ?> </p>

        <login-form name="<?php echo e(config('auth.providers.users.field','email')); ?>"
                    domain="<?php echo e(config('auth.defaults.domain','')); ?>"></login-form>

       

        <a href="<?php echo e(url('/password/reset')); ?>"><?php echo e(trans('adminlte_lang::message.forgotpassword')); ?></a><br>
        <a href="<?php echo e(url('/register')); ?>" class="text-center"><?php echo e(trans('adminlte_lang::message.registermember')); ?></a>

    </div>

    </div>
    </div>
    <?php echo $__env->make('adminlte::layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>