<div class="form-group"><label class="col-form-label" for="<?php echo e($name); ?>"><?php echo e($label ?? $name); ?> <?php if($required ?? false): ?> <abbr>*</abbr> <?php endif; ?> </label> <input type="text" name="<?php echo e($name); ?>" class="form-control <?php echo e($class ?? ''); ?>" id="<?php echo e($name); ?>" value="<?php echo e($value ?? ''); ?>" autocomplete="off" <?php if($required ?? false): ?> required <?php endif; ?> <?php if($readonly ?? false): ?> readonly <?php endif; ?> <?php $__currentLoopData = $data ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e('data-' . $key. '="'. $val .'"'); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> ></div><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/components/form_input.blade.php ENDPATH**/ ?>