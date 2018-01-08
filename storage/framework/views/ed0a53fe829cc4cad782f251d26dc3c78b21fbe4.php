<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="name" class="form-control" id="name" placeholder="Nombre" name="name" value="<?php echo e((Session::has('errors')) ? old('name', '') : $user->name); ?>">
</div>
<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="example@example.com" name="email" value="<?php echo e((Session::has('errors')) ? old('email', '') : $user->email); ?>">
    <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
    <?php if(Route::currentRouteName() == 'entrust-gui::users.edit'): ?>
        <div class="alert alert-warning">
          <span class="fa fa-info-circle"></span> Deje el campo de contraseña en blanco si desea mantenerlo igual.
        </div>
    <?php endif; ?>
</div>
<?php if(Config::get('entrust-gui.confirmable') === true): ?>
<div class="form-group">
    <label for="password">Confirmar Contraseña</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirmar Contraseña" name="password_confirmation">
</div>
<?php endif; ?>
<div class="form-group">
    <label for="roles">Roles</label>
    <select name="roles[]" id="roles" multiple class="form-control">
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($index); ?>" <?php echo e(((in_array($index, old('roles', []))) || ( ! Session::has('errors') && $user->roles->contains('id', $index))) ? 'selected' : ''); ?>><?php echo e($role); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
