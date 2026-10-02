<?php $__env->startSection('title', __('Bookings')); ?>
<?php $__env->startSection('page_title', __('Bookings')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><?php echo e(__('Bookings')); ?></h1>
    <div class="flex flex-wrap gap-3 mb-6">
        <?php $__currentLoopData = [''=>'All','pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected','completed'=>'Completed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s=>$lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('admin.reports.bookings', $s ? ['status'=>$s] : [])); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-4 py-2 rounded-xl text-sm font-medium','bg-blue-600 text-white'=>$status===$s,'bg-white border text-gray-700 hover:bg-gray-50'=>$status!==$s]); ?>">
                <?php echo e(__($lbl)); ?> (<?php echo e(convertToUrduNumerals($s ? $bookings->where('status',$s)->count() : $bookings->count())); ?>)
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="bg-white rounded-2xl overflow-x-auto" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left text-sm min-w-[700px]">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3"><?php echo e(__('Patient Name')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Hospital')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Vaccine')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Appointment Date')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Test Result')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Status')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $list = $status ? $bookings->where('status',$status) : $bookings; ?>
                <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-500"><?php echo e(convertToUrduNumerals($booking->id)); ?></td>
                        <td class="px-4 py-3">
                            <p class="font-medium"><?php echo e($booking->patient->name ?? 'N/A'); ?></p>
                            <p class="text-xs text-gray-500"><?php echo e($booking->patient->patientProfile->phone ?? ''); ?></p>
                        </td>
                        <td class="px-4 py-3"><?php echo e($booking->hospital->hospitalProfile->hospital_name ?? 'N/A'); ?></td>
                        <td class="px-4 py-3"><?php echo e($booking->vaccine->name ?? 'N/A'); ?></td>
                        <td class="px-4 py-3"><?php echo e($booking->appointment_date); ?></td>
                        <td class="px-4 py-3">
                            <?php if($booking->testResult): ?>
                                <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-2 py-1 rounded-full text-xs font-semibold','bg-red-100 text-red-700'=>$booking->testResult->result==='positive','bg-green-100 text-green-700'=>$booking->testResult->result==='negative','bg-yellow-100 text-yellow-700'=>$booking->testResult->result==='pending']); ?>">
                                    <?php echo e(__( ucfirst($booking->testResult->result) )); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-gray-400 text-xs"><?php echo e(__('Not available')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-2 py-1 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$booking->status==='pending','bg-green-100 text-green-800'=>$booking->status==='approved','bg-red-100 text-red-800'=>$booking->status==='rejected','bg-blue-100 text-blue-800'=>$booking->status==='completed']); ?>">
                                <?php echo e(__( ucfirst($booking->status) )); ?>

                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="7" class="px-4 py-8 text-center text-gray-500"><?php echo e(__('No data found.')); ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/admin/reports/bookings.blade.php ENDPATH**/ ?>