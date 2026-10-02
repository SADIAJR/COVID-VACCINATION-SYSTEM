<?php
    $role = auth()->check() ? auth()->user()->role : 'guest';
    $layout = match($role) {
        'patient'  => 'layouts.patient',
        'hospital' => 'layouts.hospital',
        'admin'    => 'layouts.admin',
        default    => 'layouts.app',
    };
?>



<?php $__env->startSection('title', 'Contact Us - Covid Vaccination Portal'); ?>
<?php $__env->startSection('page_title', 'Contact Us'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-2"><?php echo e(__('Contact Us')); ?></h1>
        <p class="text-gray-500 mb-8"><?php echo e(__('For any queries or support, reach out to the Covid Vaccination Portal admin team.')); ?></p>

        <div class="grid md:grid-cols-2 gap-6 mb-8">

            
            <div class="bg-white rounded-xl shadow p-6 flex items-start gap-4">
                <div class="bg-blue-100 text-blue-600 rounded-full p-3 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium uppercase tracking-wide mb-1"><?php echo e(__('Email')); ?></p>
                    <a href="mailto:admin@covidportal.com"
                        class="text-blue-600 hover:underline font-medium">admin@covidportal.com</a>
                </div>
            </div>

            
            <div class="bg-white rounded-xl shadow p-6 flex items-start gap-4">
                <div class="bg-green-100 text-green-600 rounded-full p-3 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium uppercase tracking-wide mb-1"><?php echo e(__('Phone')); ?></p>
                    <a href="tel:+923001234567"
                        class="text-green-600 hover:underline font-medium">+92 300 123 4567</a>
                </div>
            </div>

            
            <div class="bg-white rounded-xl shadow p-6 flex items-start gap-4">
                <div class="bg-purple-100 text-purple-600 rounded-full p-3 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium uppercase tracking-wide mb-1"><?php echo e(__('Address')); ?></p>
                    <p class="text-gray-700 font-medium"><?php echo e(__('Ministry of Health, Islamabad, Pakistan')); ?></p>
                </div>
            </div>

            
            <div class="bg-white rounded-xl shadow p-6 flex items-start gap-4">
                <div class="bg-yellow-100 text-yellow-600 rounded-full p-3 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium uppercase tracking-wide mb-1"><?php echo e(__('Office Hours')); ?></p>
                    <p class="text-gray-700 font-medium"><?php echo e(__('Mon – Fri: 9:00 AM – 5:00 PM')); ?></p>
                    <p class="text-gray-500 text-sm"><?php echo e(__('Saturday & Sunday: Closed')); ?></p>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-xl shadow p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-5"><?php echo e(__('Send us a Message')); ?></h2>

            <?php if(session('contact_sent')): ?>
                <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                    <?php echo e(__('Your message has been sent successfully. We will get back to you soon.')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
                    <ul class="list-disc list-inside text-sm">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('contact.send')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Your Name')); ?></label>
                        <input type="text" name="name" value="<?php echo e(old('name', auth()->user()->name ?? '')); ?>"
                            placeholder="<?php echo e(__('Your Name')); ?>"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Email')); ?></label>
                        <input type="email" name="email" value="<?php echo e(old('email', auth()->user()->email ?? '')); ?>"
                            placeholder="<?php echo e(__('Email')); ?>"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Subject')); ?></label>
                    <input type="text" name="subject" value="<?php echo e(old('subject')); ?>"
                        placeholder="<?php echo e(__('Subject')); ?>"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('Message')); ?></label>
                    <textarea name="message" rows="5"
                        placeholder="<?php echo e(__('Write your message here...')); ?>"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('message')); ?></textarea>
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                    <?php echo e(__('Send Message')); ?>

                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\covid19\resources\views/pages/contact.blade.php ENDPATH**/ ?>