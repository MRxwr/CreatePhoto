<?php $__env->startSection('content'); ?><div class="row"><div class="col-md-8"></div></div><div class="row" id="theme-list"></div> <template id="theme-template"><div class="col-md-4">{content}</div> </template><script>var listView=new JuzawebListView({url:"<?php echo e(route('admin.themes.install.all')); ?>",list:"#theme-list",template:"theme-template",page_size:9,});</script><?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/theme/install.blade.php ENDPATH**/ ?>