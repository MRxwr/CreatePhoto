<?php $__env->startSection('content'); ?><div id="media-container"><div class="row mb-2"><div class="col-md-8"><form action="" method="get" class="form-inline"><input type="text" class="form-control w-25" name="search" placeholder="<?php echo e(trans('juzaweb::app.search_by_name')); ?>" autocomplete="off"><select name="type" class="form-control w-25 ml-1"><option value=""><?php echo e(trans('juzaweb::app.all_type')); ?></option> <?php $__currentLoopData = $fileTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($key); ?>" <?php echo e($type == $key ? 'selected' : ''); ?>><?php echo e(strtoupper($key)); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select> <button type="submit" class="btn btn-primary ml-1"><?php echo app('translator')->get('juzaweb::app.search'); ?></button></form></div><div class="col-md-4"><div class="btn-group float-right"><a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#add-folder-modal"><i class="fa fa-plus"></i> <?php echo e(trans('juzaweb::app.add_folder')); ?></a> <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#upload-modal"><i class="fa fa-cloud-upload"></i> <?php echo e(trans('juzaweb::app.upload')); ?></a></div></div></div><div class="list-media mt-5"><ul class="media-list"> <?php $__currentLoopData = $mediaItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li class="media-item"><a <?php if($item->is_file): ?> href="javascript:void(0)" <?php else: ?> href="<?php echo e(route('admin.media.folder', [$item->id])); ?>" <?php endif; ?>><div class="attachment-preview"><div class="thumbnail <?php if(empty($item->is_file)): ?> media-folder <?php endif; ?>"><div class="centered"> <?php if($item->thumb): ?> <img src="<?php echo e($item->thumb); ?>" alt="<?php echo e($item->name); ?>"><?php else: ?> <i class="fa <?php echo e($item->icon); ?> fa-3x"></i> <?php endif; ?></div></div></div></a></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div></div> <?php $__env->stopSection(); ?> <?php $__env->startSection('footer'); ?> <?php echo $__env->make('juzaweb::backend.media.add_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo $__env->make('juzaweb::backend.media.upload_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><script>Dropzone.autoDiscover=false;document.addEventListener("turbolinks:load",function(){new Dropzone("#uploadForm",{paramName:"upload",uploadMultiple:false,parallelUploads:5,timeout:0,clickable:'#upload-button',dictDefaultMessage:"<?php echo e(trans('juzaweb::filemanager.message-drop')); ?>",init:function(){var _this=this;this.on('success',function(file,response){if(response=='OK'){Turbolinks.visit("",{action:"replace"});}
else{this.defaultOptions.error(file,response.join('\n'));}});},headers:{'Authorization':"Bearer <?php echo e(csrf_token()); ?>"},acceptedFiles:"<?php echo e(implode(',', $mimeTypes)); ?>",maxFilesize:parseInt("<?php echo e($maxSize); ?>"),chunking:true,chunkSize:1048576,});});function add_folder_success(form){Turbolinks.visit("",{action:"replace"});}</script><?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/media/index.blade.php ENDPATH**/ ?>