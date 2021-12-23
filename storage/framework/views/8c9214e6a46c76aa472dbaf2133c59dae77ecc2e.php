<div class="card sidebar-item" id="sidebar-<?php echo e($item->get('key')); ?>"><div class="card-header"><h5><?php echo e($item->get('label')); ?></h5><div class="text-right right-actions"><a href="javascript:void(0)" class="show-edit-form"><i class="fa fa-sort-down fa-2x"></i></a></div></div><div class="card-body <?php if(empty($show)): ?> box-hidden <?php endif; ?>"><div class="dd jw-widget-builder" data-key="<?php echo e($item->get('key')); ?>"> <?php
            $widgets = jw_get_widgets_sidebar($item->get('key'));
            ?><ol class="dd-list"><?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php
                    $widgetData = \Juzaweb\Facades\HookAction::getWidgets($widget['widget'] ?? 'null');
                    ?> <?php $__env->startComponent('juzaweb::backend.widget.components.sidebar_widget_item', [
                        'widget' => $widgetData,
                        'sidebar' => $item,
                        'key' => $key,
                        'data' => $widget
                    ]); ?> <?php echo $__env->renderComponent(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ol></div><button type="button" class="btn btn-success save-sidebar-widget" data-sidebar="<?php echo e($item->get('key')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('juzaweb::app.save')); ?> </button></div></div><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/widget/components/sidebar_item.blade.php ENDPATH**/ ?>