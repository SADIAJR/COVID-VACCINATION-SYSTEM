<?php $__env->startSection('title', __('Edit Hospital Profile')); ?>
<?php $__env->startSection('page_title', __('Edit Hospital Profile')); ?>
<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="<?php echo e(route('hospital.dashboard')); ?>" class="text-blue-600 hover:underline text-sm font-medium">← <?php echo e(__('Back to Profile')); ?></a>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><?php echo e(__('Edit Hospital Profile')); ?></h1>
    <?php if($errors->any()): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.10);">
            <ul class="list-disc list-inside text-sm"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
        </div>
    <?php endif; ?>
    <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 2px 10px 0 rgba(0,0,0,0.08);">
        <form method="POST" action="<?php echo e(route('hospital.profile.update')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Hospital Name')); ?></label>
                <input type="text" name="hospital_name" value="<?php echo e(old('hospital_name', $profile->hospital_name)); ?>" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Phone')); ?></label>
                    <input type="number" name="phone" value="<?php echo e(old('phone', $profile->phone)); ?>"
                        maxlength="11" minlength="11" pattern="\d{11}"
                        oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > 11) this.value = this.value.slice(0,11);"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        placeholder="03XXXXXXXXX"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                    <p class="text-xs text-gray-400 mt-1">11 digits only (e.g. 03001234567)</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('City')); ?></label>
                    <input type="text" name="city" value="<?php echo e(old('city', $profile->city)); ?>" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('License No')); ?></label>
                <input type="number" name="license_no" value="<?php echo e(old('license_no', $profile->license_no)); ?>"
                    maxlength="4" minlength="4" pattern="\d{4}"
                    oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > 4) this.value = this.value.slice(0,4);"
                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                    placeholder="XXXX"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-xs text-gray-400 mt-1">4 digits only (e.g. 1234)</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Address')); ?></label>
                <textarea name="address" rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);"><?php echo e(old('address', $profile->address)); ?></textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl hover:bg-blue-700 transition text-sm font-medium" style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);"><?php echo e(__('Save Changes')); ?></button>
                <a href="<?php echo e(route('hospital.dashboard')); ?>" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-xl hover:bg-gray-200 transition text-sm font-medium" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);"><?php echo e(__('Cancel')); ?></a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospital', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\covid19\resources\views/hospital/profile-edit.blade.php ENDPATH**/ ?>