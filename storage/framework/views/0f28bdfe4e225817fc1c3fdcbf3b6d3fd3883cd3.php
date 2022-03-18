<div class="theme-editor__panel-body"><div class="ui-stack ui-stack--vertical next-tab__panel--grow"><div class="ui-stack-item ui-stack-item--fill"><section class="next-card theme-editor__card"><ul class="theme-editor-action-list theme-editor-action-list--divided theme-editor-action-list--rounded"><?php $__currentLoopData = $panels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $panel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $__env->startComponent('juzaweb::backend.editor.components.action_item', [
                            'title' => $panel->get('title'),
                            'key' => $key,
                            'id' => 'panel-' . $key,
                        ]); ?> <?php echo $__env->renderComponent(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></section></div></div></div> <?php $__currentLoopData = $panels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $panel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $__env->startComponent('juzaweb::backend.editor.components.editor_panel', [
        'key' => $key,
        'id' => 'panel-' . $key,
        'panel' => $panel
    ]); ?> <?php echo $__env->renderComponent(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/editor/config_option.blade.php ENDPATH**/ ?>