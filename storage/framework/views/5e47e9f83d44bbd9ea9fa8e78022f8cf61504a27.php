<?php
$langs = array_merge(trans('juzaweb::app', [], 'en'), trans('juzaweb::app'));
?><script type="text/javascript">var juzaweb={adminPrefix:"<?php echo e(config('juzaweb.admin_prefix')); ?>",adminUrl:"<?php echo e(url(config('juzaweb.admin_prefix'))); ?>",lang:JSON.parse(`<?php echo json_encode($langs, 15, 512) ?>`)}</script><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/components/juzaweb_langs.blade.php ENDPATH**/ ?>