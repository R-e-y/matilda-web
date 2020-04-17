<!-- resources/views/common/errors.blade.php -->

<?php if(count($errors) > 0): ?>
  <!-- Список ошибок формы -->
  <div class="alert alert-danger">
    <strong>Упс! Что-то пошло не так!</strong>

    <br><br>

    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?><?php /**PATH C:\Users\UserPC\OSPanel\domains\matilda\resources\views/common/errors.blade.php ENDPATH**/ ?>