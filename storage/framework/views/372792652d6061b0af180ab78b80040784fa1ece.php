<?php
$items = app($taxonomy->get('model'))
    ->where('post_type', '=', $taxonomy->get('post_type'))
    ->where('taxonomy', '=', $taxonomy->get('taxonomy'))
    ->orderBy('id', 'desc')
    ->limit(5)
    ->get();
?><ul class="nav nav-tabs" role="tablist"><li class="nav-item"><a class="nav-link active" href="javascript:void(0);" data-toggle="tab"><?php echo e(trans('juzaweb::app.latest')); ?></a></li><li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-toggle="tab"><?php echo e(trans('juzaweb::app.search')); ?></a></li></ul><div class="tab-content"><div class="tab-pane fade p-2 active show" id="box-<?php echo e($key); ?>-latest" role="tabpanel" aria-labelledby="box-<?php echo e($key); ?>-latest-tab"> <?php $__currentLoopData = $items ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="form-check mt-1"><label class="form-check-label"><input class="form-check-input select-all-<?php echo e($key); ?>" type="checkbox" name="items[]" value="<?php echo e($item->id); ?>"> <?php echo e($item->name ?? $item->title); ?> </label></div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><div class="row mt-3"><div class="col-md-6"><div class="form-check"><label class="form-check-label"><input class="form-check-input select-all-checkbox" type="checkbox" data-select="select-all-<?php echo e($key); ?>"> <?php echo e(trans('juzaweb::app.select_all')); ?> </label></div></div></div></div><div class="tab-pane fade p-2" id="box-<?php echo e($key); ?>-search" role="tabpanel" aria-labelledby="box-<?php echo e($key); ?>-tab"></div></div><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/menu/boxs/taxonomy_add.blade.php ENDPATH**/ ?>