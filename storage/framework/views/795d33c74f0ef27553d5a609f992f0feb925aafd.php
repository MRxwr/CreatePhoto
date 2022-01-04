<?php $__env->startSection('content'); ?> <?php $__env->startComponent('juzaweb::components.form_resource', [
        'model' => $model,
    ]); ?><div class="row"><div class="col-md-8"><?php echo e(Field::text($model, 'title', [
                    'required' => true,
                    'class' => empty($model->slug) ? 'generate-slug' : '',
                ])); ?> <?php echo e(Field::editor($model, 'content')); ?> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('post_type.'. $postType .'.form.left'); ?></div><div class="col-md-4"><?php echo e(Field::select($model, 'status', [
                    'options' => $model->getStatuses()
                ])); ?> <?php echo e(Field::image($model, 'thumbnail')); ?> <?php echo e(Field::slug($model, 'slug')); ?> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('post_type.'. $postType .'.form.right', $model); ?></div></div> <?php echo $__env->renderComponent(); ?> <?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\plugins/sbhadra/photography/src/resources/views/backend/booking/form.blade.php ENDPATH**/ ?>