<?php $__env->startSection('content'); ?><table class="table juzaweb-table" data-detail-view="true" data-detail-formatter="content_formatter" data-detail-view-by-click="true" ><thead><tr><th data-field="datetime" data-width="5%" data-formatter="time_formatter"><?php echo app('translator')->get('juzaweb::app.time'); ?></th><th data-width="5%" data-align="center" data-field="level" data-formatter="level_formatter"><?php echo app('translator')->get('juzaweb::app.level'); ?></th><th data-field="header" data-formatter="header_formatter"><?php echo app('translator')->get('juzaweb::app.header'); ?></th></tr></thead></table><script type="text/javascript">function time_formatter(value,row,index){return value.split(' ')[1]??'';}
function level_formatter(value,row,index){let spanClass='badge badge-info';switch(value){case'error':spanClass='badge badge-danger';}
return`<span class="p-2 ${spanClass}">${value}</span>`;}
function header_formatter(value,row,index){return`<div style="max-width: 780px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    text-align: center;">${value}</div>`;}
function content_formatter(value,row,index){return`<code style="color: black;">${row.stack}</code>`;}
var table=new JuzawebTable({url:'<?php echo e(route('admin.logs.error.get-logs-date', [$date])); ?>',});</script><?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/logs/error/logs.blade.php ENDPATH**/ ?>