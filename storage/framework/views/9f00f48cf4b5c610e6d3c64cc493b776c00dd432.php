<nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('juzaweb::app.dashboard'); ?></a></li> <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(isset($item['url'])): ?><li class="breadcrumb-item"><a href="<?php echo e($item['url']); ?>" class="text-capitalize"><?php echo e($item['title']); ?></a></li> <?php else: ?><li class="breadcrumb-item text-capitalize active" aria-current="page"><?php echo e($item['title']); ?></li> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ol></nav><?php /**PATH C:\wamp64\www\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/items/breadcrumb.blade.php ENDPATH**/ ?>