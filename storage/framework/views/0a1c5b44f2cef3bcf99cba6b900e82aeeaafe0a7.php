<div class="juzaweb__topbar"><div class="mr-4"><a href="<?php echo e(url('/')); ?>" class="mr-2" target="_blank"><i class="dropdown-toggle-icon fa fa-home" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Visit website"></i> Visit Site </a></div><div class="mr-auto"><div class="dropdown mr-4 d-none d-sm-block"><a href="javascript:void(0)" class="dropdown-toggle text-nowrap" data-toggle="dropdown"><i class="fa fa-plus"></i> <span class="dropdown-toggle-text">New</span></a><div class="dropdown-menu" role="menu"><a class="dropdown-item" href="<?php echo e(route('admin.users.create')); ?>"><?php echo app('translator')->get('juzaweb::app.user'); ?></a></div></div></div> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('backend.menu_top'); ?><div class="juzaweb__topbar__actionsDropdown dropdown mr-4 d-none d-sm-block"><a href="javascript:void(0)" class="dropdown-toggle text-nowrap" data-toggle="dropdown" aria-expanded="false" data-offset="0,15"><i class="dropdown-toggle-icon fa fa-bell-o"></i></a> <?php
            $total = count_unread_notifications();

            $items = Auth::user()
                ->unreadNotifications()
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get(['id', 'data', 'created_at']);
        ?><div class="juzaweb__topbar__actionsDropdownMenu dropdown-menu dropdown-menu-right" role="menu"><div style="width: 350px;"><div class="card-body"><div class="tab-content"><div class="jw__l1"><div class="text-uppercase mb-2 text-gray-6 mb-2 font-weight-bold"><?php echo app('translator')->get('juzaweb::app.notifications'); ?> (<?php echo e($total); ?>)</div><hr><ul class="list-unstyled"> <?php if($items->isEmpty()): ?><p><?php echo app('translator')->get('juzaweb::app.no_notifications'); ?></p> <?php else: ?> <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li class="jw__l1__item"><a href="<?php echo e(@$notify->data['url']); ?>" class="jw__l1__itemLink" data-turbolinks="false"><div class="jw__l1__itemPic mr-3"> <?php if(empty($notify->data['image'])): ?> <i class="jw__l1__itemIcon fa fa-envelope-square"></i> <?php else: ?> <img src="<?php echo e(upload_url($notify->data['image'])); ?>" alt=""> <?php endif; ?></div><div><div class="text-blue"><?php echo e(@$notify->data['subject']); ?></div><div class="text-muted"><?php echo e($notify->created_at ? $notify->created_at->diffForHumans() : ''); ?></div></div></a></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?></ul></div></div></div></div></div></div> <?php
        $user = jw_current_user();
        
    ?><div class="dropdown user-menu"><a href="" class="dropdown-toggle text-nowrap" data-toggle="dropdown" aria-expanded="false" data-offset="5,15"><img class="dropdown-toggle-avatar img-circle" src="<?php echo e($user->getAvatar()); ?>" alt="User avatar" width="30" height="30"/> </a><ul class="dropdown-menu dropdown-menu-right" role="menu"><li class="user-header"><img src="<?php echo e($user->getAvatar()); ?>" style="width:100px; height:100px;" class="img-circle" alt="User Image"><p><?php echo e($user->name); ?> - Web Developer</p></li><li class="user-footer"><div class="pull-left"><a class="btn btn-default " href="<?php echo e(route('admin.users.edit', [$user->id])); ?>"><i class="dropdown-icon fe fe-user"></i> <?php echo e(trans('juzaweb::app.profile')); ?> </a></div><div class="pull-right"><a href="<?php echo e(route('logout')); ?>" class="btn btn-default " data-turbolinks="false"><i class="dropdown-icon fe fe-log-out"></i> <?php echo e(trans('juzaweb::app.logout')); ?> </a></div></li></ul></div></div><?php /**PATH C:\wamp64\www\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/menu_top.blade.php ENDPATH**/ ?>