<?php $__env->startSection('content'); ?><div class="row mb-3"><div class="col-md-12"><div class="btn-group float-right"><a href="<?php echo e(route('admin.galleries.create')); ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->get('sbsl::app.add_new'); ?></a></div></div></div> <?php echo e($dataTable->render()); ?> <?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\plugins/sbhadra/galleries/src/resources/views/backend/gallery/index.blade.php ENDPATH**/ ?>