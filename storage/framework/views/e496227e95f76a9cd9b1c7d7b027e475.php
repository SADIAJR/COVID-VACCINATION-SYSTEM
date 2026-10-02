

<?php $__env->startSection('title', 'Pending Approval - Covid Vaccination Portal'); ?>
<?php $__env->startSection('page_title', 'Pending Approval'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-2xl">
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-6">
            <h1 class="text-2xl font-bold mb-2">Your hospital registration is pending approval</h1>
            <p>An admin needs to approve your hospital before you can access the dashboard.</p>
        </div>

        <div class="space-y-2 text-gray-700 mb-6">
            <p><span class="font-semibold">Hospital Name:</span> <?php echo e($profile->hospital_name); ?></p>
            <p><span class="font-semibold">Status:</span>
                <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-sm"><?php echo e($profile->status); ?></span>
            </p>
        </div>

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.hospital', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/dashboards/hospital-pending.blade.php ENDPATH**/ ?>