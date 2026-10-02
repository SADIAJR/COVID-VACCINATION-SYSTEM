<?php $__env->startSection('title', __('Manage Vaccines')); ?>
<?php $__env->startSection('page_title', __('Manage Vaccines')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800"><?php echo e(__('Manage Vaccines')); ?></h1>
        <a href="<?php echo e(route('hospital.vaccines.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition" style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.20);">+ <?php echo e(__('Add Vaccine')); ?></a>
    </div>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="bg-white rounded-2xl overflow-hidden" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="px-4 py-3"><?php echo e(__('Vaccine Name')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Manufacturer')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Dose Number')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Stock')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Actions')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $vaccines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaccine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium"><?php echo e($vaccine->name); ?></td>
                        <td class="px-4 py-3"><?php echo e($vaccine->manufacturer); ?></td>
                        <td class="px-4 py-3"><?php echo e(convertToUrduNumerals($vaccine->doses_required)); ?></td>
                        <td class="px-4 py-3 font-semibold <?php echo e($vaccine->stock > 10 ? 'text-green-600' : ($vaccine->stock > 0 ? 'text-yellow-600' : 'text-red-600')); ?>">
                            <?php echo e(convertToUrduNumerals($vaccine->stock)); ?>

                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="<?php echo e(route('hospital.vaccines.edit', $vaccine)); ?>" class="text-blue-600 hover:underline text-sm"><?php echo e(__('Edit')); ?></a>
                            <form method="POST" action="<?php echo e(route('hospital.vaccines.destroy', $vaccine)); ?>" class="inline" onsubmit="return confirm('<?php echo e(__('Delete')); ?>?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:underline text-sm"><?php echo e(__('Delete')); ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500"><?php echo e(__('No vaccines found.')); ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospital', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/hospital/vaccines/index.blade.php ENDPATH**/ ?>