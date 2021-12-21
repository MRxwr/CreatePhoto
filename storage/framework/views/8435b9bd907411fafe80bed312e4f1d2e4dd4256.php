<?php $__env->startSection('content'); ?> <?php
    $package_services = array();
    $package_slots = array();
        if($model->services){
            foreach($model->services as $service){
               $package_services[] = $service->id;
           } 
        }
        if($model->slots){
            foreach($model->slots as $slot){
               $package_slots[] = $slot->id;
           } 
        }  
   
    ?> <?php $__env->startComponent('juzaweb::components.form_resource', [
        'model' => $model,
    ]); ?><div class="row"><div class="col-md-8"><?php echo e(Field::text($model, 'title', [
                    'required' => true,
                    'class' => empty($model->slug) ? 'generate-slug' : '',
                ])); ?> <?php echo e(Field::slug($model, 'slug')); ?> <?php echo e(Field::editor($model, 'content')); ?> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('post_type.'. $postType .'.form.left'); ?></div><div class="col-md-4"> <?php echo e(Field::select($model, 'status', [
                    'options' => $model->getStatuses()
                ])); ?> <?php echo e(Field::image($model, 'thumbnail')); ?><div class="form-group"><label class="col-form-label" for="release"><?php echo app('translator')->get('sbph::app.price'); ?></label> <input type="number" name="price" class="form-control" id="price" value="<?php echo e($model->price); ?>" autocomplete="off"></div><div class="form-group"><label class="col-form-label" for="services"><?php echo app('translator')->get('sbph::app.services'); ?></label> <select name="services[]" id="services" class="form-control select2-default" multiple="multiple"> <?php $__currentLoopData = $services ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($service->id); ?>" <?php if(in_array($service->id,$package_services)): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($service->title); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select></div><div class="form-group"><label class="col-form-label" for="timeslots"><?php echo app('translator')->get('sbph::app.timeslots'); ?></label> <select name="slots[]" id="timeslots" class="form-control select2-default" multiple="multiple"> <?php $__currentLoopData = $timeslots ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($slot->id); ?>" <?php if(in_array($slot->id,$package_slots)): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($slot->title); ?> [<?php echo e($slot->starttime); ?> - <?php echo e($slot->endtime); ?>]</option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select></div> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('post_type.'. $postType .'.form.right', $model); ?></div></div> <?php echo $__env->renderComponent(); ?> <?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\plugins/sbhadra/photography/src/resources/views/backend/package/form.blade.php ENDPATH**/ ?>