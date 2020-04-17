<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Изменение сотрудника</div>

                <div class="card-body">
                  <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(url('workers/update/'.$worker->id)); ?>" method="POST" class="form-horizontal">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('PATCH')); ?>


                      <div class="form-group">
                        <label for="idParalax" class="col-sm-3 control-label">idParalax</label>

                        <div class="col-sm-6">
                          <input type="text" name="idParalax" id="idParalax" class="form-control" value="<?php echo e($worker->idParalax); ?>">
                        </div>

                        <label for="name" class="col-sm-3 control-label">Имя</label>

                        <div class="col-sm-6">
                          <input type="text" name="name" id="name" class="form-control" value="<?php echo e($worker->name); ?>">
                        </div>

                        <label for="fixedSalary" class="col-sm-3 control-label">Зарплата</label>

                        <div class="col-sm-6">
                          <input type="text" name="fixedSalary" id="fixedSalary" class="form-control" value="<?php echo e($worker->fixedSalary); ?>">
                        </div>


                        <label for="idPost" class="col-sm-3 control-label">Должность</label>

<div class="col-sm-6">
  <select name="idPost" id="idPost" class="form-control">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <option value="<?php echo e($post->idPost); ?>"
          <?php if($post->idPost == old('myselect', $worker->idPost)): ?>
              selected="selected"
          <?php endif; ?>
          ><?php echo e($post->namePost); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>

                        <label for="idOffice" class="col-sm-3 control-label">Офис</label>

                        <div class="col-sm-6">
                          <select id="idOffice" name="idOffice" class="form-control">
                            <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <option value="<?php echo e($office->idOffice); ?>"
                                  <?php if($office->idOffice == old('myselect', $worker->idOffice)): ?>
                                      selected="selected"
                                  <?php endif; ?>
                                  ><?php echo e($office->nameOffice); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Сохранить
                          </button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\UserPC\OSPanel\domains\matilda\resources\views/workers/edit.blade.php ENDPATH**/ ?>