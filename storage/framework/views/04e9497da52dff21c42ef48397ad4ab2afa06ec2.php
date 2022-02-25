<?php
    $taxonomies = \Juzaweb\Facades\HookAction::getTaxonomies($postType);
?> <?php $__currentLoopData = $taxonomies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $__env->startComponent('juzaweb::components.form_taxonomies', [
        'taxonomy' => $taxonomy,
        'model' => $model
    ]); ?><?php echo $__env->renderComponent(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/components/taxonomies.blade.php ENDPATH**/ ?>