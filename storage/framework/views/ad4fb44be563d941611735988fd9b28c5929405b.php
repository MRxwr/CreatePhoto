<ul class="nav nav-tabs"> <?php
    $index = 0;
    $tabs = $tabs ?? [];
    ?> <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li class="nav-item"><a href="#<?php echo e($key); ?>-tab" class="nav-link <?php if($index == 0): ?> active <?php endif; ?>" id="<?php echo e($key); ?>-label" data-toggle="tab" role="tab" data-turbolinks="false"><?php echo e($tab['label'] ?? trans('juzaweb::app.' . $key)); ?></a> <?php
            $index ++;
        ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul><div class="tab-content"> <?php
        $index = 0;
    ?> <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="tab-pane p-3 <?php if($index == 0): ?> active <?php endif; ?>" id="<?php echo e($key); ?>-tab" role="tabpanel" aria-labelledby="<?php echo e($key); ?>-label"><?php echo e(${'tab_'.$key} ?? ''); ?> <?php
            $index ++;
        ?></div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/components/tabs.blade.php ENDPATH**/ ?>