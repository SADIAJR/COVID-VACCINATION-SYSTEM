
<?php $__env->startSection('title', __('Search Hospitals')); ?>
<?php $__env->startSection('page_title', __('Search Hospitals')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-1"><?php echo e(__('Search Hospitals')); ?></h1>
    <p class="text-gray-500 mb-6 text-sm"><?php echo e(__('Search for COVID-19 test and vaccination hospitals near you.')); ?></p>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);">
            <ul class="list-disc list-inside"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
        </div>
    <?php endif; ?>
    <form method="GET" action="<?php echo e(route('patient.search-hospitals')); ?>" class="mb-6">
        <div class="flex gap-2">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                placeholder="<?php echo e(__('Search by hospital name or city...')); ?>"
                class="flex-1 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-400 text-sm bg-white"
                style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.12);">
            <button type="submit" class="bg-emerald-600 text-white px-6 py-3 rounded-xl hover:bg-emerald-700 transition font-medium text-sm" style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);"><?php echo e(__('Search')); ?></button>
            <?php if(request('search')): ?>
                <a href="<?php echo e(route('patient.search-hospitals')); ?>" class="bg-gray-100 text-gray-700 px-4 py-3 rounded-xl hover:bg-gray-200 transition text-sm flex items-center" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.12);"><?php echo e(__('Clear')); ?></a>
            <?php endif; ?>
        </div>
    </form>
    <?php if(request('search')): ?>
        <p class="text-sm text-gray-500 mb-4"><?php echo e(convertToUrduNumerals($hospitals->count())); ?> <?php echo e(__('hospital(s) found')); ?></p>
    <?php endif; ?>
    <div class="space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 2px 10px 0 rgba(0,0,0,0.10);">
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-800"><?php echo e($hospital->hospital_name); ?></h2>
                    <p class="text-gray-500 text-sm mt-1">📍 <?php echo e($hospital->address); ?>, <?php echo e($hospital->city); ?></p>
                    <p class="text-gray-500 text-sm">📞 <?php echo e($hospital->phone); ?></p>
                    <span class="inline-block mt-2 bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full font-semibold">✓ <?php echo e(__('Approved')); ?></span>
                </div>
                <form method="POST" action="<?php echo e(route('patient.book-appointment')); ?>" class="border-t pt-4 flex flex-wrap gap-3 items-end">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="hospital_id" value="<?php echo e($hospital->user_id); ?>">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1"><?php echo e(__('Select Vaccine')); ?></label>
                        <select name="vaccine_id" class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.10);">
                            <?php $__currentLoopData = $vaccines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaccine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vaccine->id); ?>"><?php echo e($vaccine->name); ?> (<?php echo e(__('Stock')); ?>: <?php echo e(convertToUrduNumerals($vaccine->stock)); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1"><?php echo e(__('Appointment Date')); ?></label>
                        <input type="date" name="appointment_date" min="<?php echo e(date('Y-m-d')); ?>" class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.10);">
                    </div>
                    <button type="submit" class="bg-emerald-600 text-white px-5 py-2 rounded-xl hover:bg-emerald-700 transition text-sm font-medium" style="box-shadow: 0 6px 18px 0 rgba(0,0,0,0.22);"><?php echo e(__('Book Appointment')); ?></button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white rounded-2xl p-10 text-center text-gray-500" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18);">
                <p class="text-lg"><?php echo e(__('No approved hospitals available.')); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.patient', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/patient/search-hospitals.blade.php ENDPATH**/ ?>