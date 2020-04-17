<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Сотрудники
                <div class="card-body">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(count($workers) > 0): ?>
                    <div class="panel-body">

                <!-- Поле поиска -->
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="поиск" aria-label="поиск">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>
                </form>

                      <table class="table table-striped task-table">

                        <!-- Заголовок таблицы -->
                        <thead>
                          <th>id Paralax</th>
                          <th>Имя</th>

                          <th>Должность</th>
                          <th>Офис</th>
                        </thead>

                        <!-- Тело таблицы -->
                        <tbody>
                          <?php $__currentLoopData = $workers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $worker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td class="table-text">
                                <div><?php echo e($worker->idParalax); ?></div>
                              </td>
                              <td class="table-text">
                                <div><?php echo e($worker->name); ?></div>
                              </td>

                              <td class="table-text">
                                <div><?php echo e($worker->namePost); ?></div>
                              </td>
                              <td class="table-text">
                                <div><?php echo e($worker->nameOffice); ?></div>
                              </td>
                              <td class="table-text">
                                <div>
                                  <form action="<?php echo e(url('workers/delete/'.$worker->id)); ?>" method="POST" class="delete">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>


                                    <button type="submit" class="btn btn-danger btn-sm" value="DELETE">
                                      <i class="fa fa-trash-o fa-fw"></i> Удалить
                                    </button>
                                  </form>
                                  <form action="<?php echo e(url('workers/editForAccountant/'.$worker->id)); ?>" method="GET">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                      <i class="fa fa-pencil fa-fw"></i> Изменить
                                    </button>
                                  </form>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                    <?php else: ?>
                        No Records
                    <?php endif; ?>

                    <button class="btn btn-primary" type="button" onclick="window.location='<?php echo e(url("workers/add")); ?>'">
                      <i class="fa fa-plus fa-fw"></i> Добавить нового сотрудника
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
    $(".delete").on("submit", function(){
        return confirm("Вы уверены?");
    });
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\UserPC\OSPanel\domains\matilda\resources\views/workers/listForAccountant.blade.php ENDPATH**/ ?>