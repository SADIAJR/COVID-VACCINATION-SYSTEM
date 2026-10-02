

<?php $__env->startSection('title', __('Hospital Dashboard')); ?>
<?php $__env->startSection('page_title', __('Hospital Dashboard')); ?>

<?php $__env->startSection('content'); ?>
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800"><?php echo e($profile->hospital_name); ?></h1>
        <a href="<?php echo e(route('hospital.profile.edit')); ?>"
            class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition text-sm font-medium"
            style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);">
            <?php echo e(__('Edit Profile')); ?>

        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4"
            style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="bg-white rounded-2xl p-6 mb-6"
        style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 2px 10px 0 rgba(0,0,0,0.10);">
        <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0"
                style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.14);">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-4a1 1 0 011-1h4a1 1 0 011 1v4"/>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-800"><?php echo e($profile->hospital_name); ?></h2>
                <span class="inline-block mt-0.5 px-2 py-0.5 bg-green-100 text-green-700 text-xs rounded-full font-medium"><?php echo e(__('Approved')); ?></span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Contact Person')); ?></p>
                <p class="font-medium text-gray-800"><?php echo e($user->name); ?></p>
                <p class="text-gray-500 text-xs"><?php echo e($user->email); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Phone')); ?></p>
                <p class="font-medium text-gray-800"><?php echo e($profile->phone); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('City')); ?></p>
                <p class="font-medium text-gray-800"><?php echo e($profile->city); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('License No')); ?></p>
                <p class="font-medium text-gray-800"><?php echo e($profile->license_no); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3 md:col-span-2" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Address')); ?></p>
                <p class="font-medium text-gray-800"><?php echo e($profile->address); ?></p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-5 text-center"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-blue-600"><?php echo e(convertToUrduNumerals($totalAppointments)); ?></p>
            <p class="text-xs text-gray-500 mt-1"><?php echo e(__('Total Appointments')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-yellow-500"><?php echo e(convertToUrduNumerals($pending)); ?></p>
            <p class="text-xs text-gray-500 mt-1"><?php echo e(__('Pending')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-green-600"><?php echo e(convertToUrduNumerals($approved)); ?></p>
            <p class="text-xs text-gray-500 mt-1"><?php echo e(__('Approved')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-purple-600"><?php echo e(convertToUrduNumerals($completed)); ?></p>
            <p class="text-xs text-gray-500 mt-1"><?php echo e(__('Completed')); ?></p>
        </div>
    </div>

    
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <a href="<?php echo e(route('hospital.appointments.index')); ?>"
            class="bg-blue-600 text-white rounded-2xl p-5 text-center hover:bg-blue-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="font-semibold text-white"><?php echo e(__('Appointments')); ?></p>
            <p class="text-xs text-white/70 mt-1"><?php echo e(__('Approve / Reject')); ?></p>
        </a>
        <a href="<?php echo e(route('hospital.patients')); ?>"
            class="bg-green-600 text-white rounded-2xl p-5 text-center hover:bg-green-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-1a4 4 0 00-5-3.87M9 20H4v-1a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/>
                </svg>
            </div>
            <p class="font-semibold text-white"><?php echo e(__('Patient List')); ?></p>
            <p class="text-xs text-white/70 mt-1"><?php echo e(__('Approved patients')); ?></p>
        </a>
        <a href="<?php echo e(route('hospital.vaccines.index')); ?>"
            class="bg-purple-600 text-white rounded-2xl p-5 text-center hover:bg-purple-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <p class="font-semibold text-white"><?php echo e(__('Manage Vaccines')); ?></p>
            <p class="text-xs text-white/70 mt-1"><?php echo e(__('Stock & availability')); ?></p>
        </a>
    </div>

    
    <div class="bg-white rounded-2xl p-6 mt-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.10);">
        <h2 class="text-lg font-bold text-gray-800 mb-4">⭐ <?php echo e(__('Patient Reviews')); ?></h2>

        <?php if($reviews->isEmpty()): ?>
            <div class="text-center py-10 text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <p class="text-sm"><?php echo e(__('No reviews yet')); ?></p>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border border-gray-100 rounded-xl p-4" style="box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                    <div class="flex items-start justify-between gap-3">
                        
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-sm flex-shrink-0">
                                <?php echo e(strtoupper(substr($review->user->name ?? 'P', 0, 1))); ?>

                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm"><?php echo e($review->user->name ?? __('Unknown')); ?></p>
                                <p class="text-xs text-gray-400"><?php echo e($review->created_at->translatedFormat(app()->getLocale() === 'ur' ? 'd M Y، h:i A' : 'd M Y, h:i A')); ?></p>
                            </div>
                        </div>
                        
                        <div class="flex gap-0.5 flex-shrink-0">
                            <?php for($s = 1; $s <= 5; $s++): ?>
                                <span style="font-size:18px; color:<?php echo e($s <= $review->stars ? '#f59e0b' : '#d1d5db'); ?>;">&#9733;</span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <?php if($review->message): ?>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed"><?php echo e($review->message); ?></p>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospital', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/dashboards/hospital.blade.php ENDPATH**/ ?>