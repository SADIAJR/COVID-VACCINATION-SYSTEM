
<?php $__env->startSection('title', __('Manage Vaccines')); ?>
<?php $__env->startSection('page_title', __('Vaccines')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800"><?php echo e(__('Vaccines')); ?></h1>
        <a href="<?php echo e(route('admin.vaccines.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition">+ <?php echo e(__('Add Vaccine')); ?></a>
    </div>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
            <p class="text-2xl font-bold text-blue-600"><?php echo e(convertToUrduNumerals($vaccines->count())); ?></p>
            <p class="text-sm text-gray-500"><?php echo e(__('Vaccines')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
            <p class="text-2xl font-bold text-green-600"><?php echo e(convertToUrduNumerals($vaccines->where('stock', '>', 0)->count())); ?></p>
            <p class="text-sm text-gray-500"><?php echo e(__('Approved')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
            <p class="text-2xl font-bold text-red-600"><?php echo e(convertToUrduNumerals($vaccines->where('stock', 0)->count())); ?></p>
            <p class="text-sm text-gray-500"><?php echo e(__('Out of Stock')); ?></p>
        </div>
    </div>
    <div class="flex gap-3 mb-4 flex-wrap">
        <a href="<?php echo e(request()->fullUrlWithQuery(['availability' => ''])); ?>"
            class="px-4 py-2 rounded-xl text-sm font-medium <?php echo e(!request('availability') ? 'bg-blue-600 text-white' : 'bg-white border text-gray-700 hover:bg-gray-50'); ?>"><?php echo e(__('All')); ?></a>
        <a href="<?php echo e(request()->fullUrlWithQuery(['availability' => 'available'])); ?>"
            class="px-4 py-2 rounded-xl text-sm font-medium <?php echo e(request('availability') === 'available' ? 'bg-green-600 text-white' : 'bg-white border text-gray-700 hover:bg-gray-50'); ?>"><?php echo e(__('Approved')); ?></a>
        <a href="<?php echo e(request()->fullUrlWithQuery(['availability' => 'unavailable'])); ?>"
            class="px-4 py-2 rounded-xl text-sm font-medium <?php echo e(request('availability') === 'unavailable' ? 'bg-red-600 text-white' : 'bg-white border text-gray-700 hover:bg-gray-50'); ?>"><?php echo e(__('Out of Stock')); ?></a>
    </div>
    <div class="bg-white rounded-2xl overflow-hidden" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="px-4 py-3"><?php echo e(__('Vaccine Name')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Manufacturer')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Doses')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Stock')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Status')); ?></th>
                    <th class="px-4 py-3"><?php echo e(__('Actions')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $filter = request('availability');
                    $list = $filter === 'available' ? $vaccines->where('stock', '>', 0) : ($filter === 'unavailable' ? $vaccines->where('stock', 0) : $vaccines);
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaccine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium"><?php echo e($vaccine->name); ?></td>
                        <td class="px-4 py-3"><?php echo e($vaccine->manufacturer); ?></td>
                        <td class="px-4 py-3 text-center"><?php echo e(convertToUrduNumerals($vaccine->doses_required)); ?></td>
                        <td class="px-4 py-3 text-center font-semibold <?php echo e($vaccine->stock > 10 ? 'text-green-600' : ($vaccine->stock > 0 ? 'text-yellow-600' : 'text-red-600')); ?>">
                            <?php echo e(convertToUrduNumerals($vaccine->stock)); ?>

                        </td>
                        <td class="px-4 py-3">
                            <?php if($vaccine->stock > 0): ?>
                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700"><?php echo e(__('Approved')); ?></span>
                            <?php else: ?>
                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700"><?php echo e(__('Out of Stock')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="<?php echo e(route('admin.vaccines.edit', $vaccine)); ?>" class="text-blue-600 hover:underline text-sm"><?php echo e(__('Edit')); ?></a>
                            <form method="POST" action="<?php echo e(route('admin.vaccines.destroy', $vaccine)); ?>" class="inline" onsubmit="return confirm('<?php echo e(__('Delete')); ?>?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:underline text-sm"><?php echo e(__('Delete')); ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-500"><?php echo e(__('No vaccines found.')); ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\covid19\resources\views/admin/vaccines/index.blade.php ENDPATH**/ ?>