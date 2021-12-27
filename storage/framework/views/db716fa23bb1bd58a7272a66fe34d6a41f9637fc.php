<?php $__env->startSection('content'); ?><div class="row"><div class="col-md-4"><h5><?php echo e(trans('juzaweb::app.add_new')); ?></h5> <?php
                $type = $setting->get('type');
                $postType = $setting->get('post_type');
            ?><form method="post" action="<?php echo e(route('admin.'. $type .'.taxonomy.store', [$taxonomy])); ?>" class="form-ajax" data-success="reload_data" id="form-add"> <?php $__env->startComponent('juzaweb::components.form_input', [
                    'name' => 'name',
                    'label' => trans('juzaweb::app.name'),
                    'value' => '',
                    'required' => true,
                ]); ?> <?php echo $__env->renderComponent(); ?> <?php $__env->startComponent('juzaweb::components.form_textarea', [
                    'name' => 'description',
                    'rows' => '3',
                    'label' => trans('juzaweb::app.description'),
                    'value' => ''
                ]); ?> <?php echo $__env->renderComponent(); ?> <?php if(in_array('hierarchical', $setting->get('supports', []))): ?><div class="form-group"><label class="col-form-label" for="parent_id"><?php echo e(trans('juzaweb::app.parent')); ?></label> <select name="parent_id" id="parent_id" class="form-control load-taxonomies" data-post-type="<?php echo e($setting->get('post_type')); ?>" data-taxonomy="<?php echo e($setting->get('taxonomy')); ?>" data-placeholder="<?php echo e(trans('juzaweb::app.parent')); ?>"></select></div> <?php endif; ?> <input type="hidden" name="post_type" value="<?php echo e($postType); ?>"><input type="hidden" name="taxonomy" value="<?php echo e($taxonomy); ?>"> <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo e(trans('juzaweb::app.add')); ?> <?php echo e($setting->get('label')); ?> </button></form></div><div class="col-md-8"><?php echo e($dataTable->render()); ?></div></div><script type="text/javascript">function reload_data(form){$('#form-add input[type="text"], #form-add textarea').val(null);$('#form-add #parent_id').val(null).trigger('change.select2');table.refresh();}</script><?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/taxonomy/index.blade.php ENDPATH**/ ?>