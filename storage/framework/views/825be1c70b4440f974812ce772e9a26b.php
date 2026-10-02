<?php $__env->startSection('title', 'Support - Covid Vaccination Portal'); ?>

<?php $__env->startSection('favicon'); ?>
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='7' fill='%23000000'/><path d='M16 4 L27 8.5 L27 16 C27 21.5 22.2 26.2 16 28 C9.8 26.2 5 21.5 5 16 L5 8.5 Z' fill='white' fill-opacity='0.95'/><path d='M16 7 L24.5 10.8 L24.5 16 C24.5 20.2 20.7 24 16 25.5 C11.3 24 7.5 20.2 7.5 16 L7.5 10.8 Z' fill='%23000000'/><path d='M12 16.5 L14.8 19.3 L20.5 13' stroke='white' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round' fill='none'/></svg>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('hide_navbar', '1'); ?>
<?php $__env->startSection('main_class', 'p-0 m-0 max-w-none w-full'); ?>
<?php $__env->startSection('body_class', 'bg-gray-50 overflow-x-hidden'); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full">

    
    <div class="bg-blue-600 text-white px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <span class="font-bold text-lg">Covid Vaccination Portal — Support</span>
        </div>
        <a href="<?php echo e(route('home')); ?>"
            class="bg-white text-blue-700 px-4 py-1.5 rounded-lg font-semibold text-sm hover:bg-blue-50 transition flex items-center gap-1"
            style="box-shadow: 0 2px 8px rgba(0,0,0,0.18);">
            ← Back to Home
        </a>
    </div>

    <div class="flex w-full" style="min-height: calc(100vh - 60px);">

        
        <div class="w-56 bg-blue-600 text-white flex-shrink-0">

            
            <div class="flex justify-center py-6 border-b border-blue-500">
                <div class="bg-white rounded-lg p-3 w-16 h-16 flex items-center justify-center">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
            </div>

            
            <nav class="py-4">
                <?php
                    $links = [
                        'user-guide'         => ['icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'label' => 'User Guide'],
                        'security-awareness' => ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'label' => 'Security Awareness'],
                        'contact-us'         => ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'label' => 'Contact Us'],
                        'locate-us'          => ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Locate Us / FAQ'],
                    ];
                ?>

                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('support', $key)); ?>"
                        class="flex items-center gap-3 px-5 py-3 text-sm transition
                            <?php echo e($section === $key ? 'bg-white text-blue-600 font-semibold' : 'text-blue-100 hover:bg-blue-500'); ?>">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($item['icon']); ?>"/>
                        </svg>
                        <?php echo e($item['label']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>
        </div>

        
        <div class="flex-1 p-8 overflow-y-auto bg-white">

            
            <?php if($section === 'user-guide'): ?>
                <h2 class="text-2xl font-bold mb-2" style="color:#1e293b;">User Guide</h2>
                <p class="text-sm mb-6" style="color:#64748b;">Step-by-step guide for patients on how to use the Covid Vaccination Portal.</p>

                <div class="space-y-4">
                    <?php
                        $steps = [
                            ['step'=>'1','title'=>'Register as a Patient','desc'=>'Click "Register as Patient" on the home page. Fill in your name, email, password, phone, date of birth, gender, address and city.'],
                            ['step'=>'2','title'=>'Login to Your Account','desc'=>'Go to the home page, enter your registered email and password, then click "Sign In" to access your dashboard.'],
                            ['step'=>'3','title'=>'Search for a Hospital','desc'=>'After login, click "Search Hospitals" in the navbar. Use the search bar to find a COVID-19 testing or vaccination hospital by name or city.'],
                            ['step'=>'4','title'=>'Book an Appointment','desc'=>'Select a hospital, choose your preferred vaccine and appointment date, then click "Book Appointment". Your request will be sent to the hospital for approval.'],
                            ['step'=>'5','title'=>'Wait for Hospital Approval','desc'=>'The hospital will review your appointment request and either approve or reject it. You can check the status in "My Appointments".'],
                            ['step'=>'6','title'=>'Attend Your Appointment','desc'=>'Once approved, visit the hospital on the scheduled date for your COVID-19 test or vaccination.'],
                            ['step'=>'7','title'=>'View Your Test Result','desc'=>'After the hospital updates your result, go to "My Appointments" and click "View Full Result" to see your COVID-19 test result.'],
                            ['step'=>'8','title'=>'Track Your Vaccination','desc'=>'Click "Track Vaccination" in the navbar to view your complete vaccination history and appointment timeline.'],
                        ];
                    ?>
                    <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex gap-4 bg-gray-50 rounded-lg p-4 border border-gray-100">
                            <div class="flex-shrink-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold text-sm"><?php echo e($s['step']); ?></div>
                            <div>
                                <p class="font-semibold mb-1" style="color:#1e293b;"><?php echo e($s['title']); ?></p>
                                <p class="text-sm" style="color:#475569;"><?php echo e($s['desc']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            
            <?php elseif($section === 'security-awareness'): ?>
                <h2 class="text-2xl font-bold mb-2" style="color:#1e293b;">Security Awareness</h2>
                <p class="text-sm mb-6" style="color:#64748b;">Important security tips to keep your account and data safe.</p>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-red-50 border border-red-200 rounded-lg p-5">
                        <h3 class="font-semibold mb-2" style="color:#b91c1c;">🔒 Protect Your Password</h3>
                        <ul class="text-sm space-y-1 list-disc list-inside" style="color:#374151;">
                            <li>Never share your password with anyone</li>
                            <li>Use a strong password with letters, numbers and symbols</li>
                            <li>Change your password regularly</li>
                            <li>Do not use the same password on multiple sites</li>
                        </ul>
                    </div>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-5">
                        <h3 class="font-semibold mb-2" style="color:#b45309;">⚠️ Beware of Phishing</h3>
                        <ul class="text-sm space-y-1 list-disc list-inside" style="color:#374151;">
                            <li>The portal will never ask for your password via email or SMS</li>
                            <li>Always check the URL before logging in</li>
                            <li>Do not click suspicious links claiming to be from this portal</li>
                            <li>Report suspicious activity to our helpline</li>
                        </ul>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-5">
                        <h3 class="font-semibold mb-2" style="color:#1d4ed8;">💻 Safe Browsing</h3>
                        <ul class="text-sm space-y-1 list-disc list-inside" style="color:#374151;">
                            <li>Always logout after using the portal on shared devices</li>
                            <li>Use updated browsers (Chrome, Firefox, Edge)</li>
                            <li>Avoid using public Wi-Fi to access your account</li>
                            <li>Ensure your device has antivirus software installed</li>
                        </ul>
                    </div>
                    <div class="bg-green-50 border border-green-200 rounded-lg p-5">
                        <h3 class="font-semibold mb-2" style="color:#15803d;">🛡️ Data Privacy</h3>
                        <ul class="text-sm space-y-1 list-disc list-inside" style="color:#374151;">
                            <li>Your data is encrypted and stored securely</li>
                            <li>Personal information is only shared with your approved hospital</li>
                            <li>You can delete your account and all data at any time</li>
                            <li>We do not sell or share your data with third parties</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-6 bg-gray-800 text-white rounded-lg p-4 text-sm">
                    <p class="font-semibold mb-1">🚨 Report a Security Issue</p>
                    <p>If you suspect unauthorized access, contact us at
                        <a href="mailto:admin@covidportal.com" class="text-blue-300 hover:underline">admin@covidportal.com</a>
                        or call <strong>1166</strong>.
                    </p>
                </div>

            
            <?php elseif($section === 'contact-us'): ?>
                <h2 class="text-2xl font-bold mb-2" style="color:#1e293b;">Contact Us</h2>
                <p class="text-sm mb-6" style="color:#64748b;">Reach out to the Covid Vaccination Portal admin team for any support.</p>

                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="flex items-start gap-4 bg-blue-50 rounded-lg p-4">
                        <div class="bg-blue-600 text-white rounded-full p-2.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase font-medium mb-0.5" style="color:#64748b;">Email</p>
                            <a href="mailto:admin@covidportal.com" class="text-blue-600 hover:underline font-medium text-sm">admin@covidportal.com</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 bg-green-50 rounded-lg p-4">
                        <div class="bg-green-600 text-white rounded-full p-2.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase font-medium mb-0.5" style="color:#64748b;">Helpline</p>
                            <a href="tel:1166" class="text-green-600 hover:underline font-medium text-sm">1166 (Toll Free)</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 bg-purple-50 rounded-lg p-4">
                        <div class="bg-purple-600 text-white rounded-full p-2.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase font-medium mb-0.5" style="color:#64748b;">Address</p>
                            <p class="font-medium text-sm" style="color:#374151;">Ministry of Health, Islamabad, Pakistan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 bg-yellow-50 rounded-lg p-4">
                        <div class="bg-yellow-500 text-white rounded-full p-2.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs uppercase font-medium mb-0.5" style="color:#64748b;">Office Hours</p>
                            <p class="font-medium text-sm" style="color:#374151;">Mon – Fri: 9:00 AM – 5:00 PM</p>
                            <p class="text-xs" style="color:#64748b;">Weekends: Closed</p>
                        </div>
                    </div>
                </div>

            
            <?php elseif($section === 'locate-us'): ?>
                <h2 class="text-2xl font-bold mb-2" style="color:#1e293b;">Locate Us / FAQ</h2>
                <p class="text-sm mb-6" style="color:#64748b;">Find our office location and answers to frequently asked questions.</p>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-5 mb-6">
                    <h3 class="font-semibold mb-3 flex items-center gap-2" style="color:#1e40af;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Our Location
                    </h3>
                    <p class="text-sm mb-3" style="color:#374151;">
                        <strong>Ministry of National Health Services</strong><br>
                        Regulations & Coordination, Islamabad, Pakistan<br>
                        Postal Code: 44000
                    </p>
                    <div class="rounded-lg overflow-hidden border border-blue-200">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3318.8!2d73.0479!3d33.6844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbef9b1b1b1b1%3A0x1!2sIslamabad%2C+Pakistan!5e0!3m2!1sen!2s!4v1234567890"
                            width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

                <h3 class="font-semibold mb-4" style="color:#1e293b;">Frequently Asked Questions</h3>
                <div class="space-y-3">
                    <?php
                        $faqs = [
                            ['q'=>'How do I register as a patient?','a'=>'Click "Register as Patient" on the home page and fill in your personal details including name, email, phone, date of birth, gender, address and city.'],
                            ['q'=>'How do I book a vaccine appointment?','a'=>'After login, go to "Search Hospitals", find a hospital near you, select a vaccine and date, then click "Book Appointment".'],
                            ['q'=>'How long does hospital approval take?','a'=>'Hospital approval typically takes 1–2 business days. You can check the status in "My Appointments".'],
                            ['q'=>'Can I cancel my appointment?','a'=>'Currently appointments cannot be cancelled online. Please contact the hospital directly via phone to cancel.'],
                            ['q'=>'How do I view my COVID-19 test result?','a'=>'Go to "My Appointments" and click "View Full Result" on any completed appointment.'],
                            ['q'=>'What vaccines are available?','a'=>'The available vaccines depend on the hospital stock. You can see available vaccines when searching hospitals.'],
                            ['q'=>'Is my personal data secure?','a'=>'Yes. All data is encrypted and stored securely. Your information is only shared with your approved hospital.'],
                            ['q'=>'Who do I contact for technical support?','a'=>'Call our helpline 1166 (toll free) or email admin@covidportal.com during office hours (Mon–Fri, 9AM–5PM).'],
                        ];
                    ?>
                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <details class="bg-gray-50 border border-gray-200 rounded-lg">
                            <summary class="px-4 py-3 cursor-pointer font-medium text-sm hover:bg-gray-100 rounded-lg" style="color:#1e293b;">
                                <?php echo e($faq['q']); ?>

                            </summary>
                            <div class="px-4 pb-3 text-sm border-t border-gray-200 pt-3" style="color:#475569;">
                                <?php echo e($faq['a']); ?>

                            </div>
                        </details>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\covid19\resources\views/pages/support.blade.php ENDPATH**/ ?>