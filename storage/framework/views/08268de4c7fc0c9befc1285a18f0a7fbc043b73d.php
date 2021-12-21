<?php $__env->startSection('content'); ?> <?php $__env->startComponent('juzaweb::components.form_resource', [
        'model' => $model,
    ]); ?> <?php $__env->startComponent('juzaweb::components.tabs', [
            'tabs' => [
                'information' => [
                    'label' => trans('juzaweb::app.information'),
                ],
            ],
        ]); ?> <?php $__env->slot('tab_information'); ?><div class="row"><div class="col-md-8"><?php echo e(Field::text($model, 'title', [
                        'required' => true,
                        'class' => empty($model->slug) ? 'generate-slug' : '',
                    ])); ?> <?php echo e(Field::editor($model, 'content')); ?> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('post_type.pages.form.left'); ?></div><div class="col-md-4"><?php echo e(Field::select($model, 'status', [
                        'options' => $model->getStatuses()
                    ])); ?> <?php echo e(Field::slug($model, 'slug')); ?> <?php echo e(Field::select($model, 'template', [
                        'options' => array_merge([
                            '' => trans('juzaweb::app.page_template')
                        ], $templates)
                    ])); ?> <?php echo e(Field::image($model, 'thumbnail')); ?> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('post_type.pages.form.right', $model); ?></div></div> <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?> <?php echo $__env->renderComponent(); ?> <?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/page/form.blade.php ENDPATH**/ ?>