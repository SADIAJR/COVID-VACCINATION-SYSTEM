<?php $__env->startSection('title', __('Test Reports')); ?>
<?php $__env->startSection('page_title', __('Test Reports')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><?php echo e(__('Test Reports')); ?></h1>
    <div class="bg-white rounded-2xl p-5 mb-6" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.12);">
        <form method="GET" action="<?php echo e(route('admin.reports.test-reports')); ?>" class="flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Filter')); ?></label>
                <select name="filter" class="border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()">
                    <option value="all"   <?php echo e($filter==='all'   ? 'selected':''); ?>><?php echo e(__('All')); ?></option>
                    <option value="date"  <?php echo e($filter==='date'  ? 'selected':''); ?>><?php echo e(__('By Date')); ?></option>
                    <option value="week"  <?php echo e($filter==='week'  ? 'selected':''); ?>><?php echo e(__('By Week')); ?></option>
                    <option value="month" <?php echo e($filter==='month' ? 'selected':''); ?>><?php echo e(__('By Month')); ?></option>
                </select>
            </div>
            <?php if($filter !== 'all'): ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Appointment Date')); ?></label>
                    <input type="date" name="date" value="<?php echo e($date); ?>" class="border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition"><?php echo e(__('Search')); ?></button>
            <?php endif; ?>
            <a href="<?php echo e(route('admin.reports.test-reports.export', ['filter'=>$filter,'date'=>$date])); ?>" class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition flex items-center gap-1"><?php echo e(__('Export')); ?> CSV</a>
        </form>
    </div>
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.12);">
            <p class="text-2xl font-bold text-gray-700"><?php echo e(convertToUrduNumerals($results->count())); ?></p>
            <p class="text-sm text-gray-500"><?php echo e(__('Total Bookings')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.12);">
            <p class="text-2xl font-bold text-red-600"><?php echo e(convertToUrduNumerals($results->where('result','positive')->count())); ?></p>
            <p class="text-sm text-gray-500"><?php echo e(__('Positive')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.12);">
            <p class="text-2xl font-bold text-green-600"><?php echo e(convertToUrduNumerals($results->where('result','negative')->count())); ?></p>
            <p class="text-sm text-gray-500"><?php echo e(__('Negative')); ?></p>
        </div>
    </div>
    <div class="bg-white rounded-2xl overflow-x-auto" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3"><?php echo e(__('Test Date')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Patient Name')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Phone')); ?> / <?php echo e(__('City')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Hospital')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Vaccine')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Result')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Doctor\'s Notes')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php $apt = $r->appointment; ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3"><?php echo e($r->test_date); ?></td>
                        <td class="px-4 py-3">
                            <p class="font-medium"><?php echo e($apt->patient->name ?? 'N/A'); ?></p>
                            <p class="text-xs text-gray-500"><?php echo e($apt->patient->email ?? ''); ?></p>
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            <?php echo e($apt->patient->patientProfile->phone ?? 'N/A'); ?><br>
                            <span class="text-xs"><?php echo e($apt->patient->patientProfile->city ?? ''); ?></span>
                        </td>
                        <td class="px-4 py-3"><?php echo e($apt->hospital->hospitalProfile->hospital_name ?? 'N/A'); ?></td>
                        <td class="px-4 py-3"><?php echo e($apt->vaccine->name ?? 'N/A'); ?></td>
                        <td class="px-4 py-3">
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-2 py-1 rounded-full text-xs font-semibold','bg-red-100 text-red-700'=>$r->result==='positive','bg-green-100 text-green-700'=>$r->result==='negative','bg-yellow-100 text-yellow-700'=>$r->result==='pending']); ?>">
                                <?php echo e(__( ucfirst($r->result) )); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600 text-xs"><?php echo e($r->notes ?? '-'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="7" class="px-4 py-8 text-center text-gray-500"><?php echo e(__('No data found.')); ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/admin/reports/test-reports.blade.php ENDPATH**/ ?>