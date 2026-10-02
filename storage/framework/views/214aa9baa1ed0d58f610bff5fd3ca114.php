
<?php $__env->startSection('title', __('Appointments')); ?>
<?php $__env->startSection('page_title', __('Appointments')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><?php echo e(__('Appointments')); ?></h1>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="flex flex-wrap gap-2 mb-6">
        <?php $__currentLoopData = ['all'=>'All','pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected','completed'=>'Completed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(request()->fullUrlWithQuery(['status'=>$val==='all'?'':$val])); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-4 py-2 rounded-xl text-sm font-medium','bg-blue-600 text-white'=>(request('status','')=== ($val==='all'?'':$val)),'bg-white border text-gray-700 hover:bg-gray-50'=>(request('status','')!==($val==='all'?'':$val))]); ?>">
                <?php echo e(__($label)); ?> (<?php echo e(convertToUrduNumerals($val==='all'?$appointments->count():$appointments->where('status',$val)->count())); ?>)
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php $filtered = request('status') ? $appointments->where('status', request('status')) : $appointments; ?>
    <div class="space-y-6">
        <?php $__empty_1 = true; $__currentLoopData = $filtered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800"><?php echo e($apt->patient->name); ?></h2>
                        <p class="text-sm text-gray-500">
                            📞 <?php echo e($apt->patient->patientProfile->phone ?? 'N/A'); ?> &nbsp;|&nbsp;
                            📍 <?php echo e($apt->patient->patientProfile->city ?? 'N/A'); ?>

                        </p>
                        <p class="text-sm text-gray-500">
                            <?php echo e(__('Date of Birth')); ?>: <?php echo e($apt->patient->patientProfile->dob ?? 'N/A'); ?> &nbsp;|&nbsp;
                            <?php echo e(__('Gender')); ?>: <?php echo e($apt->patient->patientProfile->gender ? __( ucfirst($apt->patient->patientProfile->gender) ) : 'N/A'); ?>

                        </p>
                    </div>
                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-3 py-1 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$apt->status==='pending','bg-green-100 text-green-800'=>$apt->status==='approved','bg-red-100 text-red-800'=>$apt->status==='rejected','bg-blue-100 text-blue-800'=>$apt->status==='completed']); ?>">
                        <?php echo e(__( ucfirst($apt->status) )); ?>

                    </span>
                </div>
                <div class="grid md:grid-cols-2 gap-3 text-sm bg-gray-50 rounded-xl p-3 mb-4">
                    <div>
                        <span class="text-gray-500 text-xs uppercase"><?php echo e(__('Vaccine')); ?></span>
                        <p class="font-medium"><?php echo e($apt->vaccine->name ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-xs uppercase"><?php echo e(__('Appointment Date')); ?></span>
                        <p class="font-medium"><?php echo e($apt->appointment_date); ?></p>
                    </div>
                </div>
                <?php if($apt->status === 'pending'): ?>
                    <div class="flex gap-3 mb-4 pb-4 border-b">
                        <form method="POST" action="<?php echo e(route('hospital.appointments.accept', $apt)); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition text-sm" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.18);">✓ <?php echo e(__('Approve')); ?></button>
                        </form>
                        <form method="POST" action="<?php echo e(route('hospital.appointments.reject', $apt)); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700 transition text-sm" onclick="return confirm('<?php echo e(__('Reject')); ?>?')" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.18);">✗ <?php echo e(__('Reject')); ?></button>
                        </form>
                    </div>
                <?php endif; ?>
                <?php if(in_array($apt->status, ['approved','completed'])): ?>
                    <div class="mb-4 pb-4 border-b">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">
                            🧪 <?php echo e(__('Test Result')); ?>

                            <?php if($apt->testResult): ?>
                                <span class="ml-2 px-2 py-0.5 rounded text-xs <?php echo e($apt->testResult->result==='positive'?'bg-red-100 text-red-700':($apt->testResult->result==='negative'?'bg-green-100 text-green-700':'bg-yellow-100 text-yellow-700')); ?>">
                                    <?php echo e(__( ucfirst($apt->testResult->result) )); ?>

                                </span>
                            <?php endif; ?>
                        </h3>
                        <form method="POST" action="<?php echo e(route('hospital.appointments.test-result', $apt)); ?>" class="flex flex-wrap gap-3 items-end">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1"><?php echo e(__('Result')); ?></label>
                                <select name="result" class="border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <?php $__currentLoopData = ['pending'=>'Pending','negative'=>'Negative','positive'=>'Positive']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val=>$lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($val); ?>" <?php echo e(($apt->testResult->result??'pending')===$val?'selected':''); ?>><?php echo e(__($lbl)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1"><?php echo e(__('Test Date')); ?></label>
                                <input type="date" name="test_date" value="<?php echo e($apt->testResult->test_date ?? now()->toDateString()); ?>" class="border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="flex-1 min-w-[180px]">
                                <label class="block text-xs text-gray-600 mb-1"><?php echo e(__("Doctor's Notes")); ?></label>
                                <input type="text" name="notes" value="<?php echo e($apt->testResult->notes ?? ''); ?>" placeholder="..." class="w-full border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition text-sm"><?php echo e(__('Update')); ?></button>
                        </form>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">
                            💉 <?php echo e(__('Vaccination Record')); ?>

                            <?php if($apt->vaccination): ?>
                                <span class="ml-2 px-2 py-0.5 rounded text-xs bg-green-100 text-green-700">
                                    <?php echo e(__('Dose Number')); ?> <?php echo e(convertToUrduNumerals($apt->vaccination->dose_number)); ?> — <?php echo e($apt->vaccination->vaccination_date); ?>

                                </span>
                            <?php endif; ?>
                        </h3>
                        <form method="POST" action="<?php echo e(route('hospital.appointments.vaccination-status', $apt)); ?>" class="flex flex-wrap gap-3 items-end">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1"><?php echo e(__('Dose Number')); ?></label>
                                <input type="number" name="dose_number" min="1" max="5" value="<?php echo e($apt->vaccination->dose_number ?? 1); ?>" class="w-24 border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1"><?php echo e(__('Vaccination Date')); ?></label>
                                <input type="date" name="vaccination_date" value="<?php echo e($apt->vaccination->vaccination_date ?? now()->toDateString()); ?>" class="border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-xl hover:bg-purple-700 transition text-sm"><?php echo e(__('Update')); ?></button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white rounded-2xl p-10 text-center text-gray-500" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.10);"><?php echo e(__('No appointments found.')); ?></div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospital', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\covid19\resources\views/hospital/appointments.blade.php ENDPATH**/ ?>