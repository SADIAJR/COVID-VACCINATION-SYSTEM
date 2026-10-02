

<?php $__env->startSection('title', 'Home - Covid Vaccination Portal'); ?>

<?php $__env->startSection('favicon'); ?>
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='7' fill='%23000000'/><path d='M16 4 L27 8.5 L27 16 C27 21.5 22.2 26.2 16 28 C9.8 26.2 5 21.5 5 16 L5 8.5 Z' fill='white' fill-opacity='0.95'/><path d='M16 7 L24.5 10.8 L24.5 16 C24.5 20.2 20.7 24 16 25.5 C11.3 24 7.5 20.2 7.5 16 L7.5 10.8 Z' fill='%23000000'/><path d='M12 16.5 L14.8 19.3 L20.5 13' stroke='white' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round' fill='none'/></svg>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('hide_navbar', '1'); ?>
<?php $__env->startSection('main_class', 'p-0 m-0 max-w-none w-full'); ?>

<?php $__env->startSection('content'); ?>

<div class="min-h-screen w-full flex flex-col"
    style="background: linear-gradient(135deg, #0f2461 0%, #1a56db 45%, #3b82f6 75%, #93c5fd 100%);">

    
    <div class="flex items-center justify-between px-6 md:px-10 py-4">
        <div class="flex items-center gap-3">
            <div class="bg-white rounded-xl p-2" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.18);">
                <svg class="w-7 h-7 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div>
                <p class="text-white font-bold text-lg leading-none">Covid Vaccination Portal</p>
                <p class="text-blue-200 text-xs mt-0.5">Pakistan National COVID-19 System</p>
            </div>
        </div>

        
        <div class="flex items-center gap-3 text-white text-sm">
            <span class="hidden md:inline">Helpline:</span>
            <span class="hidden md:inline bg-white text-blue-700 font-bold px-3 py-1 rounded-full text-sm"
                style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.18);">1166</span>

            
            <div class="relative" id="settingsWrapper">
                <button onclick="homeToggleSettings(event)"
                    class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center transition focus:outline-none"
                    title="Settings">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </button>

                
                <div id="settingsDropdown"
                    class="hidden absolute right-0 top-full mt-2 w-52 rounded-xl p-3 z-[999]"
                    style="background:#1e3a5f; border:1px solid rgba(255,255,255,0.10); box-shadow:0 8px 24px rgba(0,0,0,0.50);">

                    
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                            <span class="text-xs text-blue-200 font-medium">Dark Theme</span>
                        </div>
                        <button onclick="toggleDarkMode()"
                            id="darkToggleBtn"
                            class="relative w-10 h-5 rounded-full transition-colors duration-200 focus:outline-none"
                            style="background:#374151;">
                            <span id="darkToggleCircle"
                                class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-white transition-transform duration-200">
                            </span>
                        </button>
                    </div>

                    
                    <div>
                        <div class="flex items-center gap-2 mb-1.5">
                            <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                            </svg>
                            <span class="text-xs text-blue-200 font-medium">Language</span>
                        </div>
                        <div class="flex gap-1">
                            <a href="<?php echo e(route('lang.switch', 'en')); ?>"
                                class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition
                                    <?php echo e(app()->getLocale()==='en' ? 'bg-white text-blue-800' : 'bg-white/10 text-blue-200 hover:bg-white/20'); ?>">
                                🇬🇧 EN
                            </a>
                            <a href="<?php echo e(route('lang.switch', 'ur')); ?>"
                                class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition
                                    <?php echo e(app()->getLocale()==='ur' ? 'bg-white text-blue-800' : 'bg-white/10 text-blue-200 hover:bg-white/20'); ?>">
                                🇵🇰 اردو
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>

    
    <div class="flex-1 flex items-center justify-center px-4 py-6">
        <div class="w-full max-w-5xl">

            
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow mb-3">
                    COVID-19 Vaccination Portal
                </h1>
                <p class="text-blue-100 text-base md:text-lg max-w-xl mx-auto">
                    Register, book your test & vaccine appointment with trusted hospitals across Pakistan.
                </p>
            </div>

            
            <div class="bg-white rounded-3xl overflow-hidden flex flex-col md:flex-row"
                style="box-shadow: 0 20px 60px 0 rgba(0,0,0,0.30), 0 6px 20px 0 rgba(0,0,0,0.18);">

                
                <div class="md:w-[45%] p-6 bg-slate-50 border-r border-gray-200">

                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 text-center">Support & Information</p>

                    <div class="grid grid-cols-2 gap-4 mb-6">

                        <a href="<?php echo e(route('support', 'user-guide')); ?>"
                            class="group flex flex-col items-center justify-center p-5 bg-white border-2 border-gray-100 rounded-2xl hover:border-blue-500 hover:bg-blue-50 transition"
                            style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.12);">
                            <div class="bg-blue-100 group-hover:bg-blue-600 text-blue-600 group-hover:text-white rounded-2xl p-3 mb-2 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-700 text-center">User Guide</span>
                        </a>

                        <a href="<?php echo e(route('support', 'security-awareness')); ?>"
                            class="group flex flex-col items-center justify-center p-5 bg-white border-2 border-gray-100 rounded-2xl hover:border-blue-500 hover:bg-blue-50 transition"
                            style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.12);">
                            <div class="bg-blue-100 group-hover:bg-blue-600 text-blue-600 group-hover:text-white rounded-2xl p-3 mb-2 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-700 text-center">Security Awareness</span>
                        </a>

                        <a href="<?php echo e(route('support', 'contact-us')); ?>"
                            class="group flex flex-col items-center justify-center p-5 bg-white border-2 border-gray-100 rounded-2xl hover:border-blue-500 hover:bg-blue-50 transition"
                            style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.12);">
                            <div class="bg-blue-100 group-hover:bg-blue-600 text-blue-600 group-hover:text-white rounded-2xl p-3 mb-2 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-700 text-center">Contact Us</span>
                        </a>

                        <a href="<?php echo e(route('support', 'locate-us')); ?>"
                            class="group flex flex-col items-center justify-center p-5 bg-white border-2 border-gray-100 rounded-2xl hover:border-blue-500 hover:bg-blue-50 transition"
                            style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.12);">
                            <div class="bg-blue-100 group-hover:bg-blue-600 text-blue-600 group-hover:text-white rounded-2xl p-3 mb-2 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 group-hover:text-blue-700 text-center">Locate Us / FAQ</span>
                        </a>

                    </div>

                    
                    <div class="text-center border-t pt-4">
                        <p class="text-xs text-gray-500">COVID-19 Helpline</p>
                        <p class="text-2xl font-extrabold text-blue-600">1166</p>
                        <p class="text-xs text-gray-400 mt-1">Toll Free — 24/7</p>
                    </div>
                </div>

                
                <div class="md:w-[55%] p-8 flex flex-col justify-center">

                    
                    <div class="flex justify-center mb-4">
                        <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white rounded-2xl p-4"
                            style="box-shadow: 0 8px 24px 0 rgba(0,0,0,0.22);">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-center text-xl font-bold text-gray-800 mb-1">Welcome Back</h2>
                    <p class="text-center text-gray-400 text-sm mb-5">Sign in to your account</p>

                    <?php if($errors->any()): ?>
                        <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded-xl mb-4 text-sm"
                            style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                            <ul class="list-disc list-inside">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if(session('success')): ?>
                        <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded-xl mb-4 text-sm"
                            style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-3">
                        <?php echo csrf_field(); ?>

                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                placeholder="Email Address"
                                autofocus
                                class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                                style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        </div>

                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input type="password" name="password" id="home_password"
                                placeholder="Password"
                                class="w-full border border-gray-200 rounded-xl pl-10 pr-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                                style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                            <button type="button" onclick="togglePassword('home_password', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.082-3.667M6.343 6.343A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.357 2.524M6.343 6.343L3 3m3.343 3.343l11.314 11.314M17.657 17.657L21 21"/>
                                </svg>
                            </button>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white py-3 rounded-xl hover:from-blue-700 hover:to-blue-900 transition font-bold text-sm flex items-center justify-center gap-2"
                            style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Sign In
                        </button>

                        <div class="text-right">
                            <a href="<?php echo e(route('password.forgot.form')); ?>"
                                class="text-xs text-blue-500 hover:text-blue-700 hover:underline">
                                Forgot Password?
                            </a>
                        </div>
                    </form>

                    
                    <div class="flex items-center gap-3 my-4">
                        <div class="flex-1 h-px bg-gray-200"></div>
                        <span class="text-xs text-gray-400">New to portal?</span>
                        <div class="flex-1 h-px bg-gray-200"></div>
                    </div>

                    
                    <div class="grid grid-cols-2 gap-3">
                        <a href="<?php echo e(route('patient.register')); ?>"
                            class="flex items-center justify-center gap-2 border-2 border-blue-500 text-blue-600 rounded-xl py-2.5 hover:bg-blue-600 hover:text-white hover:border-blue-600 transition text-sm font-semibold"
                            style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Register Patient
                        </a>
                        <a href="<?php echo e(route('hospital.register')); ?>"
                            class="flex items-center justify-center gap-2 border-2 border-green-500 text-green-600 rounded-xl py-2.5 hover:bg-green-600 hover:text-white hover:border-green-600 transition text-sm font-semibold"
                            style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            Register Hospital
                        </a>
                    </div>

                </div>
            </div>

            
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div class="bg-white bg-opacity-20 backdrop-blur rounded-2xl p-4 text-center"
                    style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.22), 0 2px 8px 0 rgba(0,0,0,0.14);">
                    <p class="text-2xl font-extrabold text-white">💉</p>
                    <p class="text-white font-semibold text-sm mt-1">COVID Vaccination</p>
                    <p class="text-blue-200 text-xs">Book your dose today</p>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur rounded-2xl p-4 text-center"
                    style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.22), 0 2px 8px 0 rgba(0,0,0,0.14);">
                    <p class="text-2xl font-extrabold text-white">🏥</p>
                    <p class="text-white font-semibold text-sm mt-1">Trusted Hospitals</p>
                    <p class="text-blue-200 text-xs">Verified & approved</p>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur rounded-2xl p-4 text-center"
                    style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.22), 0 2px 8px 0 rgba(0,0,0,0.14);">
                    <p class="text-2xl font-extrabold text-white">📋</p>
                    <p class="text-white font-semibold text-sm mt-1">Test Reports</p>
                    <p class="text-blue-200 text-xs">View results online</p>
                </div>
            </div>

        </div>
    </div>

    
    <div class="text-center py-3 text-blue-200 text-xs">
        © <?php echo e(date('Y')); ?> Covid Vaccination Portal — Pakistan &nbsp;|&nbsp;
        <a href="<?php echo e(route('support', 'contact-us')); ?>" class="hover:text-white underline">Contact</a>
        &nbsp;|&nbsp;
        <a href="<?php echo e(route('support', 'locate-us')); ?>" class="hover:text-white underline">FAQ</a>
    </div>

</div>

<script>
function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const eyeOpen = button.querySelector('.eye-open');
    const eyeClosed = button.querySelector('.eye-closed');
    
    if (input.type === 'password') {
        input.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
    } else {
        input.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClosed.classList.add('hidden');
    }
}

// ── Settings Dropdown ──────────────────────────────────────
function homeToggleSettings(e) {
    e.stopPropagation();
    const dd = document.getElementById('settingsDropdown');
    dd.classList.toggle('hidden');
}

// Close when clicking outside
document.addEventListener('click', function(e) {
    const wrapper = document.getElementById('settingsWrapper');
    const dd = document.getElementById('settingsDropdown');
    if (dd && wrapper && !wrapper.contains(e.target)) {
        dd.classList.add('hidden');
    }
});

// ── Dark Mode ──────────────────────────────────────────────
(function initDark() {
    if (localStorage.getItem('darkMode') === 'on') {
        document.documentElement.classList.add('dark');
        document.body.classList.add('dark-theme');
        applyDarkUI(true);
    }
})();

function toggleDarkMode() {
    const isDark = document.documentElement.classList.toggle('dark');
    document.body.classList.toggle('dark-theme', isDark);
    localStorage.setItem('darkMode', isDark ? 'on' : 'off');
    applyDarkUI(isDark);
}

function applyDarkUI(isDark) {
    const btn    = document.getElementById('darkToggleBtn');
    const circle = document.getElementById('darkToggleCircle');
    if (btn) {
        btn.style.background = isDark ? '#2563eb' : '#374151';
    }
    if (circle) {
        circle.style.transform = isDark ? 'translateX(20px)' : 'translateX(0)';
    }

    // gradient background
    const grad = document.querySelector('[style*="linear-gradient"]');
    if (grad) {
        grad.style.background = isDark
            ? 'linear-gradient(135deg, #06122e 0%, #0d2a6b 45%, #1e3a8a 75%, #1d4ed8 100%)'
            : 'linear-gradient(135deg, #0f2461 0%, #1a56db 45%, #3b82f6 75%, #93c5fd 100%)';
    }

    // left info cards panel (bg-slate-50)
    const leftPanel = document.querySelector('.bg-slate-50');
    if (leftPanel) {
        leftPanel.style.backgroundColor = isDark ? '#16162a' : '';
    }

    // all individual info cards (bg-white inside left panel)
    document.querySelectorAll('.bg-white.border-2.border-gray-100').forEach(function(el) {
        el.style.backgroundColor = isDark ? '#1e1e2e' : '';
        el.style.borderColor     = isDark ? '#2d2d44'  : '';
    });

    // helpline border section
    const helpline = document.querySelector('.border-t.pt-4');
    if (helpline) {
        helpline.style.borderColor = isDark ? '#2d2d44' : '';
    }
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/pages/home.blade.php ENDPATH**/ ?>