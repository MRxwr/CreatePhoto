<?php $__env->startSection('content'); ?><div class="row" id="widget-container"><div class="col-md-4"><?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $__env->startComponent('juzaweb::backend.widget.components.widget_item', [
                        'widget' => $widget,
                        'key' => $key,
                        'sidebars' => $sidebars
                    ]); ?> <?php echo $__env->renderComponent(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div><div class="col-md-8"><?php
            $index = 0;
            ?> <?php $__currentLoopData = $sidebars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $__env->startComponent('juzaweb::backend.widget.components.sidebar_item', [
                    'item' => $sidebar,
                    'show' => $index == 0,
                ]); ?> <?php echo $__env->renderComponent(); ?> <?php
                    $index ++;
                ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div></div> <?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/widget/index.blade.php ENDPATH**/ ?>