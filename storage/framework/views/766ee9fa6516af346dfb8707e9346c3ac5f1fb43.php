<?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php
        $widgetData = \Juzaweb\Facades\HookAction::getWidgets($widget['widget'] ?? 'null');
    ?> <?php echo $sidebar->get('before_widget'); ?> <?php echo e($widgetData['widget']->show($widget)); ?> <?php echo $sidebar->get('after_widget'); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/components/dynamic_sidebar.blade.php ENDPATH**/ ?>