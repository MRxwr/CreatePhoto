<?php $__env->startSection('content'); ?><div class="row mb-3"><div class="col-md-12"><div class="btn-group float-right"></div></div></div><div class="row mb-2"><div class="col-md-12"><div class="table-responsive mb-5"><table class="table juzaweb-table"><thead><tr><th data-width="5%" data-field="code"><?php echo e(trans('juzaweb::app.language_code')); ?></th><th data-field="name"><?php echo e(trans('juzaweb::app.language')); ?></th><th data-width="20%" data-formatter="actions_formatter"><?php echo e(trans('juzaweb::app.actions')); ?></th></tr></thead></table></div></div></div><div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add-title" aria-hidden="true"><div class="modal-dialog" role="document"><form method="post" action="<?php echo e(route('admin.translations.type.add', [$type])); ?>" class="form-ajax"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="modal-add-title"><?php echo e(trans('juzaweb::app.add_language')); ?></h5><button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(trans('juzaweb::app.close')); ?>"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="form-group"><label><?php echo e(trans('juzaweb::app.language')); ?></label> <select name="locale" class="load-locales" data-placeholder="--- <?php echo e(trans('juzaweb::app.language')); ?> ---"></select></div></div><div class="modal-footer"><button type="submit" class="btn btn-primary"><?php echo e(trans('juzaweb::app.add')); ?></button> <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('juzaweb::app.close')); ?></button></div></div></form></div></div><script type="text/javascript">var linkLocale="<?php echo e(route('admin.translations.locale', [$type, '__LOCALE__'])); ?>";function actions_formatter(value,row,index){return`<a href="${linkLocale.replace('__LOCALE__', row.code)}">${juzaweb.lang.translations}</a>`;}
var table=new JuzawebTable({url:'<?php echo e(route('admin.translations.type.get-data', [$type])); ?>',});</script><?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\CreatePhoto\plugins/juzaweb/translation/src/resources/views/translation/module.blade.php ENDPATH**/ ?>