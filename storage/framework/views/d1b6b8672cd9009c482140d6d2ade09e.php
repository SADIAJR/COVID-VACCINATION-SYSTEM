

<?php $__env->startSection('title', __('My Profile')); ?>
<?php $__env->startSection('page_title', __('My Profile')); ?>

<?php $__env->startSection('content'); ?>
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800"><?php echo e(__('My Profile')); ?></h1>
        <a href="<?php echo e(route('patient.profile.edit')); ?>"
            class="bg-emerald-600 text-white px-4 py-2 rounded-xl hover:bg-emerald-700 transition text-sm font-medium"
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
        <div class="flex items-center gap-4 mb-6">
            <div class="bg-emerald-100 text-emerald-700 rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold flex-shrink-0"
                style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.15);">
                <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-800"><?php echo e($user->name); ?></h2>
                <p class="text-gray-500 text-sm"><?php echo e($user->email); ?></p>
                <span class="inline-block mt-1 px-2 py-0.5 bg-emerald-100 text-emerald-700 text-xs rounded-full font-medium"><?php echo e(__('Patient')); ?></span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Phone')); ?></p>
                <p class="text-gray-800 font-medium"><?php echo e($user->patientProfile->phone ? convertToUrduNumerals($user->patientProfile->phone) : __('Not set')); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Date of Birth')); ?></p>
                <p class="text-gray-800 font-medium"><?php echo e($user->patientProfile->dob ?? __('Not set')); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Gender')); ?></p>
                <p class="text-gray-800 font-medium"><?php echo e($user->patientProfile->gender ? __( ucfirst($user->patientProfile->gender) ) : __('Not set')); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('City')); ?></p>
                <p class="text-gray-800 font-medium"><?php echo e($user->patientProfile->city ?? __('Not set')); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3 md:col-span-2" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Address')); ?></p>
                <p class="text-gray-800 font-medium"><?php echo e($user->patientProfile->address ?? __('Not set')); ?></p>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <a href="<?php echo e(route('patient.search-hospitals')); ?>"
            class="bg-blue-600 text-white rounded-xl p-4 text-center hover:bg-blue-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.18), 0 2px 8px 0 rgba(0,0,0,0.12);">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-2">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-4a1 1 0 011-1h4a1 1 0 011 1v4"/>
                </svg>
            </div>
            <p class="text-sm font-semibold text-white"><?php echo e(__('Search Hospitals')); ?></p>
        </a>
        <a href="<?php echo e(route('patient.appointments.index')); ?>"
            class="bg-emerald-600 text-white rounded-xl p-4 text-center hover:bg-emerald-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.18), 0 2px 8px 0 rgba(0,0,0,0.12);">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-2">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
            </div>
            <p class="text-sm font-semibold text-white"><?php echo e(__('My Appointments')); ?></p>
        </a>
        <a href="<?php echo e(route('patient.tracking')); ?>"
            class="bg-purple-600 text-white rounded-xl p-4 text-center hover:bg-purple-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.18), 0 2px 8px 0 rgba(0,0,0,0.12);">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-2">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <p class="text-sm font-semibold text-white"><?php echo e(__('Track Vaccination')); ?></p>
        </a>
        <a href="<?php echo e(route('contact')); ?>"
            class="bg-yellow-500 text-white rounded-xl p-4 text-center hover:bg-yellow-600 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.18), 0 2px 8px 0 rgba(0,0,0,0.12);">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-2">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-sm font-semibold text-white"><?php echo e(__('Contact')); ?></p>
        </a>
    </div>

    
    <div class="bg-red-50 border border-red-200 rounded-2xl p-5"
        style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
        <h3 class="text-red-700 font-semibold mb-2"><?php echo e(__('Delete Account')); ?></h3>
        <p class="text-red-600 text-sm mb-3"><?php echo e(__('This will permanently delete your account and all data. This action cannot be undone.')); ?></p>
        <form method="POST" action="<?php echo e(route('patient.profile.delete')); ?>" id="deleteAccountForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="button" onclick="document.getElementById('deleteAccountPopup').classList.remove('hidden')"
                class="bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700 transition text-sm font-medium"
                style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.20);">
                <?php echo e(__('Delete My Account')); ?>

            </button>
        </form>
    </div>

    
    <div id="deleteAccountPopup" class="hidden fixed inset-0 z-50 flex items-center justify-center"
        style="background: rgba(0,0,0,0.60);">
        <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-sm mx-4 text-center"
            style="box-shadow: 0 20px 60px 0 rgba(0,0,0,0.40);">

            
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </div>

            <h3 class="text-xl font-bold text-gray-800 mb-2">Delete Account?</h3>
            <p class="text-gray-500 text-sm mb-6">This will <span class="text-red-600 font-semibold">permanently delete</span> your account and all data. This action <span class="font-semibold">cannot be undone</span>.</p>

            <div class="flex gap-3">
                
                <button onclick="document.getElementById('deleteAccountPopup').classList.add('hidden')"
                    class="flex-1 bg-gray-100 text-gray-700 py-2.5 rounded-xl hover:bg-gray-200 transition font-semibold text-sm">
                    Cancel
                </button>
                
                <button onclick="document.getElementById('deleteAccountForm').submit()"
                    class="flex-1 bg-red-600 text-white py-2.5 rounded-xl hover:bg-red-700 transition font-semibold text-sm"
                    style="box-shadow: 0 4px 14px 0 rgba(220,38,38,0.35);">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.patient', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/dashboards/patient.blade.php ENDPATH**/ ?>