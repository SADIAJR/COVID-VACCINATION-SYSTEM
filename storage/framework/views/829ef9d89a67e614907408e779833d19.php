
<?php $__env->startSection('title', __('Update')); ?>
<?php $__env->startSection('page_title', __('Vaccines')); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-md mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><?php echo e(__('Update')); ?> <?php echo e(__('Vaccine')); ?></h1>
    <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.14);">
        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded-xl mb-4">
                <ul class="list-disc list-inside"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('admin.vaccines.update', $vaccine)); ?>" class="space-y-4">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Vaccine Name')); ?></label>
                <input type="text" name="name" value="<?php echo e(old('name', $vaccine->name)); ?>" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Manufacturer')); ?></label>
                <input type="text" name="manufacturer" value="<?php echo e(old('manufacturer', $vaccine->manufacturer)); ?>" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Dose Number')); ?></label>
                <input type="number" name="doses_required" value="<?php echo e(old('doses_required', $vaccine->doses_required)); ?>" inputmode="numeric" min="1" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Stock')); ?></label>
                <input type="number" name="stock" value="<?php echo e(old('stock', $vaccine->stock)); ?>" inputmode="numeric" min="0" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-xl hover:bg-blue-700 transition font-medium"><?php echo e(__('Update Stock')); ?></button>
        </form>
        <a href="<?php echo e(route('admin.vaccines.index')); ?>" class="block text-center text-blue-600 hover:underline mt-4 text-sm">← <?php echo e(__('Back')); ?></a>
    </div>
</div>
<script>
document.querySelectorAll('input[type="number"]').forEach(function(input) {
    input.addEventListener('keypress', function(e) {
        if (!/[0-9]/.test(e.key)) e.preventDefault();
    });
    input.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\covid19\resources\views/admin/vaccines/edit.blade.php ENDPATH**/ ?>