
<?php $__env->startSection('title', __('My Appointments')); ?>
<?php $__env->startSection('page_title', __('My Appointments')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800"><?php echo e(__('My Appointments')); ?></h1>
        <a href="<?php echo e(route('patient.search-hospitals')); ?>"
            class="bg-emerald-600 text-white px-4 py-2 rounded-xl hover:bg-emerald-700 transition text-sm font-medium"
            style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);">
            <?php echo e(__('Book New Appointment')); ?>

        </a>
    </div>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-yellow-50 rounded-xl p-4 text-center border border-yellow-100" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-2xl font-bold text-yellow-600"><?php echo e(convertToUrduNumerals($appointments->where('status','pending')->count())); ?></p>
            <p class="text-sm text-yellow-600 font-medium mt-0.5"><?php echo e(__('Pending')); ?></p>
        </div>
        <div class="bg-green-50 rounded-xl p-4 text-center border border-green-100" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-2xl font-bold text-green-600"><?php echo e(convertToUrduNumerals($appointments->where('status','approved')->count())); ?></p>
            <p class="text-sm text-green-600 font-medium mt-0.5"><?php echo e(__('Approved')); ?></p>
        </div>
        <div class="bg-red-50 rounded-xl p-4 text-center border border-red-100" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-2xl font-bold text-red-600"><?php echo e(convertToUrduNumerals($appointments->where('status','rejected')->count())); ?></p>
            <p class="text-sm text-red-600 font-medium mt-0.5"><?php echo e(__('Rejected')); ?></p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 text-center border border-blue-100" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-2xl font-bold text-blue-600"><?php echo e(convertToUrduNumerals($appointments->where('status','completed')->count())); ?></p>
            <p class="text-sm text-blue-600 font-medium mt-0.5"><?php echo e(__('Completed')); ?></p>
        </div>
    </div>
    <div class="space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 2px 10px 0 rgba(0,0,0,0.10);">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800"><?php echo e($apt->hospital->hospitalProfile->hospital_name ?? 'N/A'); ?></h2>
                        <p class="text-gray-500 text-sm"><?php echo e($apt->hospital->hospitalProfile->address ?? ''); ?>, <?php echo e($apt->hospital->hospitalProfile->city ?? ''); ?></p>
                        <p class="text-gray-500 text-sm"><?php echo e(__('Phone')); ?>: <?php echo e($apt->hospital->hospitalProfile->phone ?? 'N/A'); ?></p>
                    </div>
                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-3 py-1 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$apt->status==='pending','bg-green-100 text-green-800'=>$apt->status==='approved','bg-red-100 text-red-800'=>$apt->status==='rejected','bg-blue-100 text-blue-800'=>$apt->status==='completed']); ?>">
                        <?php echo e(__( ucfirst($apt->status) )); ?>

                    </span>
                </div>
                <div class="grid md:grid-cols-3 gap-3 text-sm border-t pt-3">
                    <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        <p class="text-gray-400 text-xs uppercase mb-1"><?php echo e(__('Vaccine')); ?></p>
                        <p class="font-medium text-gray-800"><?php echo e($apt->vaccine->name ?? 'N/A'); ?></p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        <p class="text-gray-400 text-xs uppercase mb-1"><?php echo e(__('Appointment Date')); ?></p>
                        <p class="font-medium text-gray-800"><?php echo e($apt->appointment_date); ?></p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        <p class="text-gray-400 text-xs uppercase mb-1"><?php echo e(__('Test Result')); ?></p>
                        <?php if($apt->testResult): ?>
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-2 py-0.5 rounded-lg text-xs font-semibold','bg-red-100 text-red-700'=>$apt->testResult->result==='positive','bg-green-100 text-green-700'=>$apt->testResult->result==='negative','bg-yellow-100 text-yellow-700'=>$apt->testResult->result==='pending']); ?>"><?php echo e(__( ucfirst($apt->testResult->result) )); ?></span>
                        <?php else: ?>
                            <p class="text-gray-400 text-xs"><?php echo e(__('Not available')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($apt->vaccination): ?>
                    <div class="mt-3 text-sm border-t pt-3 text-green-700 bg-green-50 rounded-xl p-3" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        💉 <?php echo e(__('Vaccination given')); ?> — <?php echo e(__('Dose Number')); ?> <?php echo e(convertToUrduNumerals($apt->vaccination->dose_number)); ?> — <?php echo e($apt->vaccination->vaccination_date); ?> (Batch: <?php echo e($apt->vaccination->batch_no); ?>)
                    </div>
                <?php endif; ?>
                <?php if($apt->testResult): ?>
                    <div class="mt-3 flex gap-2">
                        <a href="<?php echo e(route('patient.result', $apt->id)); ?>" class="bg-blue-600 text-white px-4 py-1.5 rounded-xl text-sm hover:bg-blue-700 transition" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.20);"><?php echo e(__('View Full Result')); ?></a>
                        <?php if(in_array($apt->status, ['approved','completed'])): ?>
                            <a href="<?php echo e(route('patient.vaccine-card', $apt->id)); ?>" class="bg-emerald-600 text-white px-4 py-1.5 rounded-xl text-sm hover:bg-emerald-700 transition" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.20);">💉 <?php echo e(__('Vaccination Card')); ?></a>
                        <?php endif; ?>
                    </div>
                <?php elseif(in_array($apt->status, ['approved','completed'])): ?>
                    <div class="mt-3">
                        <a href="<?php echo e(route('patient.vaccine-card', $apt->id)); ?>" class="bg-emerald-600 text-white px-4 py-1.5 rounded-xl text-sm hover:bg-emerald-700 transition inline-flex items-center gap-1" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.20);">💉 <?php echo e(__('Vaccination Card')); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white rounded-2xl p-10 text-center text-gray-500" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18);">
                <p class="text-lg mb-2"><?php echo e(__('No appointments yet.')); ?></p>
                <a href="<?php echo e(route('patient.search-hospitals')); ?>" class="text-emerald-600 hover:underline font-medium"><?php echo e(__('Search hospitals and book your first appointment')); ?> →</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.patient', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/patient/appointments.blade.php ENDPATH**/ ?>