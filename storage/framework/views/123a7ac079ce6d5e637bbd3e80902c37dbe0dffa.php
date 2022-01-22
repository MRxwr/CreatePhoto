<div class="theme-editor__panel" id="panel-<?php echo e($id); ?>" tabindex="-1"> <?php
    $childs = $panel->get('childs', collect([]));
    ?><header class="te-panel__header"><button class="ui-button btn--plain te-panel__header-action" data-bind-event-click="closeSection()" data-trekkie-id="close-panel" aria-label="Back to theme settings" type="button" name="button"> <svg class="next-icon next-icon--size-20 next-icon--rotate-180 te-panel__header-action-icon"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-chevron"></use></svg> </button><h2 class="ui-heading theme-editor__heading"><?php echo e($panel->get('title')); ?></h2></header> <?php if($childs->isNotEmpty()): ?><div class="theme-editor__panel-body" data-scrollable><div class="ui-stack ui-stack--vertical next-tab__panel--grow"><div class="ui-stack-item ui-stack-item--fill"><section class="next-card theme-editor__card"><ul class="theme-editor-action-list theme-editor-action-list--divided theme-editor-action-list--rounded"><?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyChild => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $__env->startComponent('juzaweb::backend.editor.components.action_item', [
                        'title' => $child->get('title'),
                        'key' => $keyChild,
                        'id' => 'section-' . $keyChild
                    ]); ?> <?php echo $__env->renderComponent(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></section></div></div></div> <?php endif; ?> <?php
        $controls = $panel->get('controls', collect([]));
    ?> <?php if($controls->isNotEmpty()): ?> <?php $__env->startComponent('juzaweb::backend.editor.components.editor_card', [
            'key' => $key,
            'id' => $key,
            'title' => $panel->get('title')
        ]); ?> <?php $__currentLoopData = $controls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $control): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($control->get('control')->contentTemplate()); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php echo $__env->renderComponent(); ?> <?php endif; ?></div> <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyChild => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $__env->startComponent('juzaweb::backend.editor.components.editor_panel', [
        'key' => $keyChild,
        'id' => 'section-' . $keyChild,
        'panel' => $child
    ]); ?> <?php echo $__env->renderComponent(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/editor/components/editor_panel.blade.php ENDPATH**/ ?>