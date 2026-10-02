<?php $__env->startSection('title', __('COVID-19 Test Result')); ?>
<?php $__env->startSection('page_title', __('Test Result')); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="<?php echo e(route('patient.appointments.index')); ?>" class="text-emerald-600 hover:underline text-sm font-medium">← <?php echo e(__('Back to My Appointments')); ?></a>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><?php echo e(__('COVID-19 Test Result')); ?></h1>

    <div class="bg-white rounded-2xl p-6 mb-4" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.12), 0 2px 10px 0 rgba(0,0,0,0.08);">
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-gray-400 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Patient Name')); ?></p>
                <p class="font-semibold text-gray-800"><?php echo e($appointment->patient->name); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-gray-400 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Hospital')); ?></p>
                <p class="font-semibold text-gray-800"><?php echo e($appointment->hospital->hospitalProfile->hospital_name ?? 'N/A'); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-gray-400 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Appointment Date')); ?></p>
                <p class="font-semibold text-gray-800"><?php echo e($appointment->appointment_date); ?></p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-gray-400 text-xs uppercase tracking-wide mb-1"><?php echo e(__('Vaccine')); ?></p>
                <p class="font-semibold text-gray-800"><?php echo e($appointment->vaccine->name ?? 'N/A'); ?></p>
            </div>
        </div>
    </div>

    <?php if($appointment->testResult): ?>
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['rounded-2xl p-6 mb-4 border-l-4','bg-red-50 border-red-500'=>$appointment->testResult->result==='positive','bg-green-50 border-green-500'=>$appointment->testResult->result==='negative','bg-yellow-50 border-yellow-500'=>$appointment->testResult->result==='pending']); ?>" style="box-shadow: 0 8px 28px 0 rgba(0,0,0,0.10);">
            <h2 class="text-lg font-bold text-gray-800 mb-3"><?php echo e(__('Test Result')); ?></h2>
            <div class="grid md:grid-cols-2 gap-4 text-sm mb-3">
                <div>
                    <p class="text-gray-500 text-xs uppercase mb-1"><?php echo e(__('Result')); ?></p>
                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-3 py-1 rounded-full text-sm font-bold','bg-red-200 text-red-800'=>$appointment->testResult->result==='positive','bg-green-200 text-green-800'=>$appointment->testResult->result==='negative','bg-yellow-200 text-yellow-800'=>$appointment->testResult->result==='pending']); ?>">
                        <?php echo e(__( strtoupper($appointment->testResult->result) )); ?>

                    </span>
                </div>
                <div>
                    <p class="text-gray-500 text-xs uppercase mb-1"><?php echo e(__('Test Date')); ?></p>
                    <p class="font-semibold text-gray-800"><?php echo e($appointment->testResult->test_date); ?></p>
                </div>
            </div>
            <?php if($appointment->testResult->notes): ?>
                <div>
                    <p class="text-gray-500 text-xs uppercase mb-1"><?php echo e(__("Doctor's Notes")); ?></p>
                    <p class="text-gray-700 bg-white rounded-xl p-3 border border-gray-100" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);"><?php echo e($appointment->testResult->notes); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="bg-white rounded-2xl p-6 mb-4" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.12), 0 2px 10px 0 rgba(0,0,0,0.08);">
            <h2 class="text-lg font-bold text-gray-800 mb-3">💉 <?php echo e(__('Vaccination Suggestion')); ?></h2>
            <?php if($appointment->testResult->result === 'negative'): ?>
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 text-green-800" style="box-shadow: 0 4px 16px 0 rgba(22,163,74,0.15);">
                    <p class="font-semibold mb-2"><?php echo e(__('Your COVID-19 test is Negative.')); ?></p>
                    <p class="text-sm"><?php echo e(__('You are eligible to receive the vaccine.')); ?> <strong><?php echo e($appointment->vaccine->name); ?></strong></p>
                    <p class="text-sm mt-1"><strong><?php echo e($appointment->hospital->hospitalProfile->hospital_name ?? ''); ?></strong></p>
                </div>
            <?php elseif($appointment->testResult->result === 'positive'): ?>
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-red-800" style="box-shadow: 0 4px 16px 0 rgba(239,68,68,0.15);">
                    <p class="font-semibold mb-2"><?php echo e(__('Your COVID-19 test is Positive.')); ?></p>
                    <p class="text-sm"><?php echo e(__('Vaccination is not recommended at this time.')); ?></p>
                </div>
            <?php else: ?>
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 text-yellow-800" style="box-shadow: 0 4px 16px 0 rgba(234,179,8,0.15);">
                    <p class="font-semibold"><?php echo e(__('Your result is still pending.')); ?></p>
                    <p class="text-sm mt-1"><?php echo e(__('Please wait for the hospital to update your test result.')); ?></p>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-2xl p-6 text-center text-gray-500" style="box-shadow: 0 8px 28px 0 rgba(0,0,0,0.08);">
            <p><?php echo e(__('No test result available yet.')); ?></p>
        </div>
    <?php endif; ?>

    <?php if($appointment->vaccination): ?>
        <div class="bg-emerald-50 rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.18), 0 2px 10px 0 rgba(0,0,0,0.08);">
            <h2 class="text-lg font-bold text-emerald-800 mb-3">✅ <?php echo e(__('Vaccination Record')); ?></h2>
            <div class="grid md:grid-cols-3 gap-4 text-sm">
                <div class="bg-white rounded-xl p-3" style="box-shadow: 0 2px 10px 0 rgba(6,95,70,0.10);">
                    <p class="text-gray-400 text-xs uppercase mb-1"><?php echo e(__('Dose Number')); ?></p>
                    <p class="font-semibold text-gray-800"><?php echo e(convertToUrduNumerals($appointment->vaccination->dose_number)); ?></p>
                </div>
                <div class="bg-white rounded-xl p-3" style="box-shadow: 0 2px 10px 0 rgba(6,95,70,0.10);">
                    <p class="text-gray-400 text-xs uppercase mb-1"><?php echo e(__('Vaccination Date')); ?></p>
                    <p class="font-semibold text-gray-800"><?php echo e($appointment->vaccination->vaccination_date); ?></p>
                </div>
                <div class="bg-white rounded-xl p-3" style="box-shadow: 0 2px 10px 0 rgba(6,95,70,0.10);">
                    <p class="text-gray-400 text-xs uppercase mb-1"><?php echo e(__('Batch No')); ?></p>
                    <p class="font-semibold text-gray-800"><?php echo e($appointment->vaccination->batch_no); ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.patient', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/patient/result.blade.php ENDPATH**/ ?>