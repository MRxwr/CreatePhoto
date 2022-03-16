<?php $__env->startSection('content'); ?><section class="package-section py-5"><div class="container"><div class="row justify-content-center"><div class="col-xxl-12"><div class="row"><div class="col-xl-12 pb-5"><div class="site-title position-relative d-flex align-items-center"><div class="bg-white"><h3 class="fs30 text-300 SegoeUIL pe-4"> <?php echo e($post->getTitle()); ?></h3></div></div></div></div></div></div></div><div class="container"><div class="row justify-content-center"><div class="col-xxl-12"><div class="px-xxl-5"><div class="row package-item"><div class="col-sm-6 ps-xl-5 mb-sm-5 mb-5 d-block d-sm-none"><img src="<?php echo e($post->getThumbnail()); ?>" alt="<?php echo e($post->getTitle()); ?>" class="w-100 mt-xl-0 mt-4"></div><div class="col-sm-6 pe-xl-5"><div class="package-head bg-light radius15 mh53 py-1 px-3 mb-3 d-inline-flex align-items-center"><h4 class="fs23"> Included In This Package:</h4></div><div class="package-body text-muted mb-5 pb-4 pt-3"><?php echo str_replace('<ul>','<ul class="package-list ps-4">',$post->getContent()); ?> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('theme.package_data'); ?></div><div class="package-head bg-light radius15 mh53 py-1 px-3 mb-3 d-inline-flex align-items-center"><h4 class="fs23"> Extra Charges:</h4></div><div class="package-body text-muted mb-5 pb-4 pt-3"> <?php if($post->services): ?><h5><?php echo app('translator')->get('theme::app.extra_charges'); ?></h5><ul class="package-list ps-4"> <?php $__currentLoopData = $post->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($service->title); ?> <?php echo e($service->price); ?> KD</li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul> <?php endif; ?></div><div class="package-head bg-light radius15 mh53 py-1 px-3 mb-3 d-inline-flex align-items-center"><h4 class="fs23">Theme:</h4></div><div class="package-body text-muted mb-5 pb-4 pt-3"><select class="form-control teheme2"><option value="1">Choose Your Theme Category</option><option value="2">Choose Your Theme Category 2</option></select></div></div><div class="col-sm-6 ps-xl-5 mb-sm-5 mb-5 d-none d-sm-block"><img src="<?php echo e($post->getThumbnail()); ?>" alt="<?php echo e($post->getTitle()); ?>" class="w-100 mt-xl-0 mt-4"></div></div></div></div></div></div><div class="container-fluid mb-5 overflow-hidden"><div class="ps-xxl-5 ms-xxl-5"><div class="row ps-xxl-4"><div class="col-xl-10 pe-xxl-0"><div class="theme_select_slider owl-carousel owl-theme"><div class="theme-select"><label class="container_radio themeCheck"><label for="slect1" class="d-inline-block">Blue Birthday</label> <input type="radio" id="slect1" name="themeCheck"><span class="checkmark"></span> <a href="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck.jpg" class="themeCheck_img image-link border"><img src="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck.jpg" alt="img" class="w-100"></a></label></div><div class="theme-select"><label class="container_radio themeCheck"><label for="slect12" class="d-inline-block">Violet Birthday Birthday</label> <input type="radio" id="slect12" name="themeCheck"><span class="checkmark"></span> <a href="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck2.jpg" class="themeCheck_img image-link border"><img src="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck2.jpg" alt="img" class="w-100"></a></label></div><div class="theme-select"><label class="container_radio themeCheck"><label for="slect13" class="d-inline-block">Golden Birthday</label> <input type="radio" id="slect13" name="themeCheck"><span class="checkmark"></span> <a href="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck3.jpg" class="themeCheck_img image-link border"><img src="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck3.jpg" alt="img" class="w-100"></a></label></div><div class="theme-select"><label class="container_radio themeCheck"><label for="slect14" class="d-inline-block">Girlish</label> <input type="radio" id="slect14" name="themeCheck"><span class="checkmark"></span> <a href="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck4.jpg" class="themeCheck_img image-link border"><img src="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck4.jpg" alt="img" class="w-100"></a></label></div><div class="theme-select"><label class="container_radio themeCheck"><label for="slect15" class="d-inline-block">Blue Birthday</label> <input type="radio" id="slect15" name="themeCheck"><span class="checkmark"></span> <a href="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck.jpg" class="themeCheck_img image-link border"><img src="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/themeCheck.jpg" alt="img" class="w-100"></a></label></div></div></div><div class="col-xl-12 pt-5 d-flex align-items-center justify-content-center"><button class='owl-arrow MyPrevButton'>Previous</button> <button class='owl-arrow MyNextButton'>Next</button></div></div></div></div><div class="container"><div class="px-xxl-5"><div class="row"><div class="col-xl-12"><div class="package-head bg-light radius15 mh53 py-1 px-3 mb-5 d-inline-flex align-items-center"><h4 class="fs23"> Choose Preferred Day:</h4></div></div><div class="col-xl-4"><input type="hidden" name="package_id" id="package_id" value="<?php echo e($post->id); ?>"><input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="hidden" /><div id="bookingdate"></div></div><div class="col-xl-4 pt-5 mt-xl-4"><ul class="pb-3"><li class="mb-3"><div class="d-flex align-items-start"><img src="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/available.svg" alt="img" class="ms-2 me-3 mt-2"><div><h4 class="fs25 mb-2">Available.</h4><h6 class="fs18"> You Can Find Available Sessions At These Days.</h6></div></div></li><li class="mb-3"><div class="d-flex align-items-start"><img src="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/reserved.svg" alt="img" class="ms-2 me-3 mt-2"><div><h4 class="fs25 mb-2">Reserved.</h4><h6 class="fs18"> Fully Booked.</h6></div></div></li><li class="mb-3"><div class="d-flex align-items-start"><img src="<?php echo e(asset('/')); ?>jw-styles/themes/cstudio/assets/img/vacation.svg" alt="img" class="ms-2 me-3 mt-2"><div><h4 class="fs25 mb-2">Vacation.</h4><h6 class="fs18"> Holiday Or Weekends.</h6></div></div></li></ul><a href="#" class="btn btn-lg btn-light fs32 radius30" id="booknow"><?php echo app('translator')->get('theme::app.book_now'); ?></a></div></div></div></div></section> <?php $__env->stopSection(); ?> <?php echo $__env->make('juzaweb::layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\github\CreatePhoto\themes/cstudio/views/template-parts/single-package.blade.php ENDPATH**/ ?>