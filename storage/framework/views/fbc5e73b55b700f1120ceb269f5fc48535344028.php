<?php $__env->startSection('heading', 'Users'); ?>

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

<h3 class="text-center color-azul"><strong><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Seguridad de Usuarios&nbsp;<i class="fa fa-lock" aria-hidden="true"></i></strong></h3>  

<div class="models--actions">
    <a class="btn btn-labeled btn-success" href="<?php echo e(route('entrust-gui::users.create')); ?>"><span class="btn-label"><i class="fa fa-plus"></i></span><?php echo e(trans('entrust-gui::button.create-user')); ?></a>
</div>
<div class="table-responsive">
<table class="table table-hover">
 <thead>
  <tr>
    <th class="text-center">Email</th>
    <th >Acciones</th>
  </tr>
     </thead>

  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($user->email); ?></th>
      <td class="col-xs-3">
        <form action="<?php echo e(route('entrust-gui::users.destroy', $user->id)); ?>" method="post">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <a class="btn btn-labeled btn-info" href="<?php echo e(route('entrust-gui::users.edit', $user->id)); ?>"><span class="btn-label"><i class="fa fa-pencil"></i></span> <?php echo e(trans('entrust-gui::button.edit')); ?></a>
          <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span><?php echo e(trans('entrust-gui::button.delete')); ?></button>
        </form>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div>
<div class="text-center">
  <?php echo $users->render(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::get('entrust-gui.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>