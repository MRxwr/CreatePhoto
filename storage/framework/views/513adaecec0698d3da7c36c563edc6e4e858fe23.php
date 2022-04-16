<?php $__env->startSection('content'); ?> <?php
        $type = $setting->get('type');
        $postType = $setting->get('post_type');
    ?> <?php $__env->startComponent('juzaweb::components.form_resource', [
        'method' => $model->id ? 'put' : 'post',
        'action' => $model->id ?
            route('admin.'. $type .'.taxonomy.update', [$taxonomy, $model->id]) :
            route('admin.'. $type .'.taxonomy.store', [$taxonomy])
    ]); ?><div class="row"><div class="col-md-8"><input type="hidden" name="redirect" value="<?php echo e(path_url(route('admin.'. $type .'.taxonomy.index', [$taxonomy]))); ?>"> <?php $__env->startComponent('juzaweb::components.form_input', [
                    'name' => 'name',
                    'label' => trans('juzaweb::app.name'),
                    'value' => $model->name,
                    'required' => true,
                ]); ?> <?php echo $__env->renderComponent(); ?> <?php $__env->startComponent('juzaweb::components.form_textarea', [
                    'name' => 'description',
                    'label' => trans('juzaweb::app.description'),
                    'value' => $model->description
                ]); ?> <?php echo $__env->renderComponent(); ?> <?php if(in_array('hierarchical', $setting->get('supports', []))): ?><div class="form-group"><label class="col-form-label" for="parent_id"><?php echo app('translator')->get('juzaweb::app.parent'); ?></label> <select name="parent_id" id="parent_id" class="form-control load-taxonomies" data-post-type="<?php echo e($setting->get('post_type')); ?>" data-taxonomy="<?php echo e($setting->get('taxonomy')); ?>" data-placeholder="<?php echo e(trans('juzaweb::app.parent')); ?>" data-explodes="<?php echo e($model->id); ?>"> <?php if($model->parent): ?><option value="<?php echo e($model->parent->id); ?>" selected><?php echo e($model->parent->name); ?></option> <?php endif; ?> </select></div> <?php endif; ?></div><div class="col-md-4"><?php $__env->startComponent('juzaweb::components.form_image', [
                    'name' => 'thumbnail',
                    'label' => trans('juzaweb::app.thumbnail'),
                    'value' => $model->thumbnail
                ]); ?><?php echo $__env->renderComponent(); ?></div><input type="hidden" name="post_type" value="<?php echo e($postType); ?>"><input type="hidden" name="taxonomy" value="<?php echo e($taxonomy); ?>"></div> <?php echo $__env->renderComponent(); ?> <?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/taxonomy/form.blade.php ENDPATH**/ ?>