<ul class="juzaweb__menuLeft__navigation"> <?php
        $adminPrefix = config('juzaweb.admin_prefix');
        $adminUrl = url($adminPrefix);
        $currentUrl = url()->current();
        $segment3 = request()->segment(3);
        $segment2 = request()->segment(2);
        $items = \Juzaweb\Support\MenuCollection::make(\Juzaweb\Facades\HookAction::getAdminMenu());
    ?> <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($item->hasChildren()): ?> <?php
            $strChild = '';
            $hasActive = false;
            foreach($item->getChildrens() as $child) {
                if (empty($segment2)) {
                    $active = empty($child->getUrl());
                } else {
                    $active = request()->is($adminPrefix .'/'. $child->get('url') . '*');
                }

                if ($active) {
                    $hasActive = true;
                }

                $strChild .= view('juzaweb::backend.items.menu_left_item', [
                    'adminUrl' => $adminUrl,
                    'item' => $child,
                    'active' => $active
                ])->render();
            }
            ?><li class="juzaweb__menuLeft__item juzaweb__menuLeft__submenu juzaweb__menuLeft__item-<?php echo e($item->get('slug')); ?> <?php if($hasActive): ?> juzaweb__menuLeft__submenu--toggled <?php endif; ?>"><span class="juzaweb__menuLeft__item__link"><i class="juzaweb__menuLeft__item__icon <?php echo e($item->get('icon')); ?>"></i> <span class="juzaweb__menuLeft__item__title"><?php echo e($item->get('title')); ?></span></span><ul class="juzaweb__menuLeft__navigation" <?php if($hasActive): ?> style="display: block;" <?php endif; ?>><?php echo $strChild; ?></ul></li> <?php else: ?> <?php $__env->startComponent('juzaweb::backend.items.menu_left_item', [
                'adminUrl' => $adminUrl,
                'item' => $item,
                'active' => request()->is($adminPrefix .'/'. $item->get('url') . '*'),
            ]); ?> <?php echo $__env->renderComponent(); ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul><?php /**PATH C:\wamp64\www\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/menu_left.blade.php ENDPATH**/ ?>