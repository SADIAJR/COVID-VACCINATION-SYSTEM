<?php $__env->startSection('title', __('All Hospitals')); ?>
<?php $__env->startSection('page_title', __('Hospitals')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><?php echo e(__('All Hospitals')); ?></h1>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="flex gap-3 mb-6 flex-wrap">
        <a href="<?php echo e(request()->fullUrlWithQuery(['status' => ''])); ?>"
            class="px-4 py-2 rounded-xl text-sm font-medium <?php echo e(!request('status') ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 border hover:bg-gray-50'); ?>">
            <?php echo e(__('All')); ?> (<?php echo e(convertToUrduNumerals($hospitals->count())); ?>)
        </a>
        <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'pending'])); ?>"
            class="px-4 py-2 rounded-xl text-sm font-medium <?php echo e(request('status') === 'pending' ? 'bg-yellow-500 text-white' : 'bg-white text-gray-700 border hover:bg-gray-50'); ?>">
            <?php echo e(__('Pending')); ?> (<?php echo e(convertToUrduNumerals($hospitals->where('status', 'pending')->count())); ?>)
        </a>
        <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'approved'])); ?>"
            class="px-4 py-2 rounded-xl text-sm font-medium <?php echo e(request('status') === 'approved' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border hover:bg-gray-50'); ?>">
            <?php echo e(__('Approved')); ?> (<?php echo e(convertToUrduNumerals($hospitals->where('status', 'approved')->count())); ?>)
        </a>
        <a href="<?php echo e(request()->fullUrlWithQuery(['status' => 'rejected'])); ?>"
            class="px-4 py-2 rounded-xl text-sm font-medium <?php echo e(request('status') === 'rejected' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border hover:bg-gray-50'); ?>">
            <?php echo e(__('Rejected')); ?> (<?php echo e(convertToUrduNumerals($hospitals->where('status', 'rejected')->count())); ?>)
        </a>
    </div>
    <div class="space-y-4">
        <?php $filtered = request('status') ? $hospitals->where('status', request('status')) : $hospitals; ?>
        <?php $__empty_1 = true; $__currentLoopData = $filtered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.08);">
                <div class="flex justify-between items-start">
                    <div class="space-y-1">
                        <h2 class="text-lg font-bold text-gray-800"><?php echo e($hospital->hospital_name); ?></h2>
                        <p class="text-gray-600 text-sm">
                            <span class="font-medium"><?php echo e(__('City')); ?>:</span> <?php echo e($hospital->city); ?>

                            &nbsp;|&nbsp;
                            <span class="font-medium"><?php echo e(__('Phone')); ?>:</span> <?php echo e($hospital->phone); ?>

                        </p>
                        <p class="text-gray-600 text-sm"><span class="font-medium"><?php echo e(__('Address')); ?>:</span> <?php echo e($hospital->address); ?></p>
                        <p class="text-gray-600 text-sm"><span class="font-medium"><?php echo e(__('License No')); ?>:</span> <?php echo e($hospital->license_no); ?></p>
                        <?php if($hospital->user): ?>
                            <p class="text-gray-600 text-sm"><span class="font-medium"><?php echo e(__('Email')); ?>:</span> <?php echo e($hospital->user->email); ?></p>
                        <?php endif; ?>
                        <?php if(isset($hospital->cnic)): ?>
                            <p class="text-gray-600 text-sm"><span class="font-medium"><?php echo e(__('CNIC')); ?>:</span> <?php echo e($hospital->cnic); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['px-3 py-1 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$hospital->status==='pending','bg-green-100 text-green-800'=>$hospital->status==='approved','bg-red-100 text-red-800'=>$hospital->status==='rejected']); ?>">
                            <?php echo e(__( ucfirst($hospital->status) )); ?>

                        </span>
                        <div class="flex gap-2 mt-2">
                            <?php if($hospital->status !== 'approved'): ?>
                                <form method="POST" action="<?php echo e(route('admin.approve-hospital', $hospital)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-green-700 transition"><?php echo e(__('Approve')); ?></button>
                                </form>
                            <?php endif; ?>
                            <?php if($hospital->status !== 'rejected'): ?>
                                <form method="POST" action="<?php echo e(route('admin.reject-hospital', $hospital)); ?>" onsubmit="return confirm('<?php echo e(__('Reject this hospital?')); ?>')">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-700 transition"><?php echo e(__('Reject')); ?></button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white rounded-2xl p-8 text-center text-gray-500" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.10);">
                <?php echo e(__('No hospitals found.')); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/admin/hospitals/index.blade.php ENDPATH**/ ?>