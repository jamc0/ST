<?php $__env->startSection('heading', 'Edit User'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/jquery.bootgrid.min.css" type="text/css"> 
  <style>


    .fa-list
    {
      color: #bf9d11;
    }
    .fa-eye,.fa-pencil
    {
      color: #fff;
    }
    .active>span,.active>
    {
      color: #fff  !important;
      background-color: #bf9d11  !important;
      border-color: #bf9d11  !important;
    }
    .content-wrapper
    {
        background-color: #ffffff;
    }
    .color-azul
    {
      color: #bf9d11;   
    }

    thead>tr
    {
      color: #259f0a;
    }

    thead>tr
    {
      background-color: #bf9d11 !important;
        color: #fff !important; 
    }

    tr:hover
    {
        background-color: #bf9d11 !important;
        color: #fff !important;
    }
    
    .bootgrid-table th:hover {
         background: #bf9d11; 
    }
    .color-white
    {
      color: #fff !important;
    }

  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<form action="<?php echo e(route('entrust-gui::users.update', $user->id)); ?>" method="post" role="form">
    <input type="hidden" name="_method" value="put">
    <?php echo $__env->make('entrust-gui::users.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <button type="submit" id="save" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-check"></i></span><?php echo e(trans('entrust-gui::button.save')); ?></button>
    <a class="btn btn-labeled btn-warning" href="<?php echo e(route('entrust-gui::users.index')); ?>"><span class="btn-label"><i class="fa fa-chevron-left"></i></span><?php echo e(trans('entrust-gui::button.cancel')); ?></a>
</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make(Config::get('entrust-gui.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>