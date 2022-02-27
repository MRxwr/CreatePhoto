<?php
    if (!isset($action)) {
        $currentUrl = url()->current();
        if (isset($model)) {
            $url = explode('/', $currentUrl);
            array_pop($url);
            $currentUrl =  implode('/', $url); 
            $action = $model->id ?
                str_replace('/edit', '', $currentUrl) :
                str_replace('', '', $currentUrl);
        } else {
            $action = '';
        }
    }

    if (!isset($method)) {
        if (isset($model)) {
            $method = $model->id ? 'put' : 'post';
        } else {
            $method = 'post';
        }
    }
?><form action="<?php echo e($action); ?>" method="post" class="form-ajax" > <?php echo csrf_field(); ?> <?php if($method == 'put'): ?> <?php echo method_field('PUT'); ?> <?php endif; ?><div class="row mb-2"><div class="col-md-6"></div><div class="col-md-6"><div class="btn-group float-right"><button type="submit" class="btn btn-success px-5"><i class="fa fa-save"></i> <?php echo e(trans('juzaweb::app.save')); ?></button> <button type="button" class="btn btn-warning cancel-button px-3"><i class="fa fa-refresh"></i> <?php echo e(trans('juzaweb::app.reset')); ?></button></div></div></div> <?php echo e($slot ?? ''); ?></form><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/components/form_resource.blade.php ENDPATH**/ ?>