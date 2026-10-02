<?php $__env->startSection('title', __('Patient List')); ?>
<?php $__env->startSection('page_title', __('Patient List')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-2"><?php echo e(__('Patient List')); ?></h1>
    <p class="text-gray-500 mb-6 text-sm"><?php echo e(__('Approved patients')); ?></p>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="bg-white rounded-2xl overflow-x-auto" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3"><?php echo e(__('Patient Name')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Phone')); ?> / <?php echo e(__('City')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Date of Birth')); ?> / <?php echo e(__('Gender')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Vaccine')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Appointment Date')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Test Result')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Vaccination Date')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Status')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <p class="font-semibold text-gray-800"><?php echo e($apt->patient->name); ?></p>
                            <p class="text-xs text-gray-500"><?php echo e($apt->patient->email); ?></p>
                        </td>
                        <td class="px-4 py-3 text-gray-700">
                            <?php echo e($apt->patient->patientProfile->phone ?? 'N/A'); ?><br>
                            <span class="text-xs text-gray-500"><?php echo e($apt->patient->patientProfile->city ?? ''); ?></span>
                        </td>
                        <td class="px-4 py-3 text-gray-700 text-xs">
                            <?php echo e($apt->patient->patientProfile->dob ?? 'N/A'); ?><br>
                            <?php echo e($apt->patient->patientProfile->gender ? __( ucfirst($apt->patient->patientProfile->gender) ) : ''); ?>

                        </td>
                        <td class="px-4 py-3 text-gray-700"><?php echo e($apt->vaccine->name ?? 'N/A'); ?></td>
                        <td class="px-4 py-3 text-gray-700"><?php echo e($apt->appointment_date); ?></td>
                        <td class="px-4 py-3">
                            <?php if($apt->testResult): ?>
                                <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-2 py-1 rounded-full text-xs font-semibold','bg-red-100 text-red-700'=>$apt->testResult->result==='positive','bg-green-100 text-green-700'=>$apt->testResult->result==='negative','bg-yellow-100 text-yellow-700'=>$apt->testResult->result==='pending']); ?>">
                                    <?php echo e(__( ucfirst($apt->testResult->result) )); ?>

                                </span>
                                <?php if($apt->testResult->notes): ?>
                                    <p class="text-xs text-gray-500 mt-1"><?php echo e(Str::limit($apt->testResult->notes, 40)); ?></p>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="text-gray-400 text-xs"><?php echo e(__('Not available')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <?php if($apt->vaccination): ?>
                                <span class="text-green-700 text-xs font-semibold">
                                    <?php echo e(__('Dose Number')); ?> <?php echo e(convertToUrduNumerals($apt->vaccination->dose_number)); ?><br>
                                    <?php echo e($apt->vaccination->vaccination_date); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-gray-400 text-xs"><?php echo e(__('Not available')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-2 py-1 rounded-full text-xs font-semibold','bg-green-100 text-green-800'=>$apt->status==='approved','bg-blue-100 text-blue-800'=>$apt->status==='completed']); ?>">
                                <?php echo e(__( ucfirst($apt->status) )); ?>

                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="8" class="px-4 py-8 text-center text-gray-500"><?php echo e(__('No patients found.')); ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospital', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/hospital/patients.blade.php ENDPATH**/ ?>