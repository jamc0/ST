<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $__env->yieldContent('contentheader_title', ''); ?>
        <small><?php echo $__env->yieldContent('contentheader_description'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo e(trans('adminlte_lang::message.level')); ?></a></li>
        <li class="active"><?php echo e(trans('adminlte_lang::message.here')); ?></li>
    </ol>
    <?php echo $__env->make('adminlte::layouts.partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</section>