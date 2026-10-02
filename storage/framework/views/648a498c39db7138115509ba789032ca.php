
<?php $__env->startSection('title', __('All Patients')); ?>
<?php $__env->startSection('page_title', __('Patients')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="flex items-center gap-3 mb-6">
        <h1 class="text-2xl font-bold text-gray-800"><?php echo e(__('All Patients')); ?></h1>
        <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1 rounded-full">
            <?php echo e(convertToUrduNumerals($patients->count())); ?>

        </span>
    </div>
    <div class="space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.08);">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800"><?php echo e($patient->name); ?></h2>
                        <p class="text-gray-600 text-sm"><?php echo e($patient->email); ?></p>
                        <?php if($patient->patientProfile): ?>
                            <p class="text-gray-600 text-sm">
                                <?php echo e(__('Phone')); ?>: <?php echo e($patient->patientProfile->phone); ?> |
                                <?php echo e(__('City')); ?>: <?php echo e($patient->patientProfile->city); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($patient->appointments->isEmpty()): ?>
                    <p class="text-gray-500 text-sm"><?php echo e(__('No appointments yet.')); ?></p>
                <?php else: ?>
                    <div class="border-t pt-3 mt-3 space-y-2">
                        <?php $__currentLoopData = $patient->appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-700">
                                    <?php echo e($appointment->hospital->hospitalProfile->hospital_name ?? 'N/A'); ?>

                                    — <?php echo e($appointment->vaccine->name ?? 'N/A'); ?>

                                    (<?php echo e($appointment->appointment_date); ?>)
                                    <?php if($appointment->vaccination): ?>
                                        — <?php echo e(__('Dose Number')); ?> <?php echo e(convertToUrduNumerals($appointment->vaccination->dose_number)); ?>

                                    <?php endif; ?>
                                </span>
                                <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-2 py-1 rounded-lg text-xs font-medium','bg-yellow-200 text-yellow-800'=>$appointment->status==='pending','bg-green-200 text-green-800'=>$appointment->status==='approved','bg-red-200 text-red-800'=>$appointment->status==='rejected','bg-blue-200 text-blue-800'=>$appointment->status==='completed']); ?>">
                                    <?php echo e(__( ucfirst($appointment->status) )); ?>

                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white rounded-2xl p-8 text-center text-gray-500" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.10);">
                <?php echo e(__('No patients found.')); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\covid19\resources\views/admin/patients/index.blade.php ENDPATH**/ ?>