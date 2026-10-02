<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Covid Vaccination Portal'); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <?php echo $__env->yieldContent('favicon'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { box-sizing: border-box; }
        body { overflow-x: hidden; }
        .overflow-x-scroll-mobile { overflow-x: auto; -webkit-overflow-scrolling: touch; }
        /* Dark theme */
        body.dark-theme { background-color: #0f0f1a !important; color: #e2e8f0 !important; }
        body.dark-theme .bg-white { background-color: #1e1e2e !important; }
        body.dark-theme .bg-gray-50 { background-color: #16162a !important; }
        body.dark-theme .bg-slate-50 { background-color: #16162a !important; }
        body.dark-theme .bg-gray-100 { background-color: #1e1e2e !important; }
        body.dark-theme .text-gray-800 { color: #e2e8f0 !important; }
        body.dark-theme .text-gray-700 { color: #cbd5e1 !important; }
        body.dark-theme .text-gray-600 { color: #94a3b8 !important; }
        body.dark-theme .text-gray-500 { color: #64748b !important; }
        body.dark-theme .text-gray-400 { color: #4b5563 !important; }
        body.dark-theme .border-gray-200 { border-color: #2d2d44 !important; }
        body.dark-theme .border-gray-100 { border-color: #2d2d44 !important; }
        body.dark-theme .border-gray-300 { border-color: #2d2d44 !important; }
        /* Home page left info cards */
        body.dark-theme .bg-blue-100 { background-color: #1e3a5f !important; }
        body.dark-theme .text-blue-600 { color: #60a5fa !important; }
        body.dark-theme .text-blue-700 { color: #93c5fd !important; }
        body.dark-theme .text-gray-700.group-hover\:text-blue-700 { color: #cbd5e1 !important; }
        /* Safety guidelines colored boxes */
        body.dark-theme .bg-blue-50   { background-color: #1e2d4a !important; }
        body.dark-theme .bg-green-50  { background-color: #1a2e1e !important; }
        body.dark-theme .bg-yellow-50 { background-color: #2a2410 !important; }
        body.dark-theme .bg-purple-50 { background-color: #271a3a !important; }
        body.dark-theme .bg-red-50    { background-color: #2a1515 !important; }
        body.dark-theme .bg-indigo-50 { background-color: #1a1d3a !important; }
        body.dark-theme .text-blue-800   { color: #93c5fd !important; }
        body.dark-theme .text-green-800  { color: #86efac !important; }
        body.dark-theme .text-yellow-800 { color: #fde68a !important; }
        body.dark-theme .text-purple-800 { color: #d8b4fe !important; }
        body.dark-theme .text-red-800    { color: #fca5a5 !important; }
        body.dark-theme .text-indigo-800 { color: #a5b4fc !important; }
        /* Input fields */
        body.dark-theme input { background-color: #1e1e2e !important; color: #e2e8f0 !important; border-color: #2d2d44 !important; }
        body.dark-theme input::placeholder { color: #4b5563 !important; }        /* Settings popup */
        #app-settings-popup { display: none; }
        #app-settings-popup.open { display: block; }
    </style>
</head>
<body class="text-gray-800 <?php echo $__env->yieldContent('body_class', 'bg-gray-50'); ?> overflow-x-hidden" data-locale="<?php echo e(app()->getLocale()); ?>">

    <?php if(trim($__env->yieldContent('hide_navbar')) !== '1'): ?>

    
    <nav class="hidden md:flex bg-gradient-to-r from-[#0f2461] via-[#1a56db] to-[#1e40af] text-white px-6 h-16 items-center mx-4 mt-3 rounded-2xl" style="box-shadow: 0 4px 24px 0 rgba(15,36,97,0.28);">

        
        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 mr-8">
            <div class="bg-white rounded-xl p-1.5 shadow">
                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div class="leading-tight">
                <p class="font-bold text-sm leading-none tracking-wide"><?php echo e(__('Covid Vaccination Portal')); ?></p>
                <p class="text-blue-300 text-xs"><?php echo e(__('Pakistan COVID-19 System')); ?></p>
            </div>
        </a>

        
        <div class="flex items-center gap-1 flex-1">

        <?php $current = request()->path(); ?>

        <?php if(auth()->guard()->guest()): ?>
            <?php $__currentLoopData = [
                ['route' => 'home',      'label' => __('Home')],
                ['route' => 'hospitals', 'label' => __('Hospitals')],
                ['route' => 'vaccines',  'label' => __('Vaccines')],
                ['route' => 'contact',   'label' => __('Contact')],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route($item['route'])); ?>"
               class="relative px-4 h-10 flex items-center text-sm font-semibold rounded-lg transition-all duration-150
                      <?php echo e(request()->routeIs($item['route']) ? 'bg-white text-blue-700 shadow' : 'text-blue-100 hover:bg-white/15 hover:text-white'); ?>">
                <?php echo e($item['label']); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <div class="ml-auto flex items-center gap-3">
                
                <div class="relative">
                    <button onclick="toggleAppSettings()" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center transition">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>
                    </button>
                    <div id="app-settings-popup" class="absolute right-0 top-full mt-2 w-52 bg-[#1e3a5f] border border-white/10 rounded-xl p-3 z-[999]" style="box-shadow:0 8px 24px rgba(0,0,0,0.50);">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                                <span class="text-xs text-blue-200 font-medium"><?php echo e(__('Dark Theme')); ?></span>
                            </div>
                            <button onclick="toggleAppDark()" id="app-dark-toggle" class="relative w-10 h-5 rounded-full transition-colors duration-200 focus:outline-none" style="background:#374151;">
                                <span id="app-dark-knob" class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-white transition-transform duration-200"></span>
                            </button>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1.5">
                                <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
                                <span class="text-xs text-blue-200 font-medium"><?php echo e(__('Language')); ?></span>
                            </div>
                            <div class="flex gap-1">
                                <a href="<?php echo e(route('lang.switch', 'en')); ?>" class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition <?php echo e(app()->getLocale()==='en' ? 'bg-white text-blue-800' : 'bg-white/10 text-blue-200 hover:bg-white/20'); ?>">🇬🇧 EN</a>
                                <a href="<?php echo e(route('lang.switch', 'ur')); ?>" class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition <?php echo e(app()->getLocale()==='ur' ? 'bg-white text-blue-800' : 'bg-white/10 text-blue-200 hover:bg-white/20'); ?>">🇵🇰 اردو</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('login')); ?>"
                   class="px-4 py-1.5 text-sm font-semibold border border-white/40 rounded-lg hover:bg-white/10 transition">
                   <?php echo e(__('Sign In')); ?>

                </a>
                <a href="<?php echo e(route('patient.register')); ?>"
                   class="px-4 py-1.5 text-sm font-semibold bg-white text-blue-700 rounded-lg hover:bg-blue-50 transition shadow">
                   <?php echo e(__('Register Patient')); ?>

                </a>
            </div>
        <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->role === 'patient'): ?>
                <?php $__currentLoopData = [
                    ['route' => 'home',                      'label' => __('Home')],
                    ['route' => 'patient.dashboard',         'label' => __('My Profile')],
                    ['route' => 'patient.search-hospitals',  'label' => __('Search Hospitals')],
                    ['route' => 'patient.appointments.index','label' => __('My Appointments')],
                    ['route' => 'patient.tracking',          'label' => __('Track Vaccination')],
                    ['route' => 'contact',                   'label' => __('Contact')],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route($item['route'])); ?>"
                   class="relative px-4 h-10 flex items-center text-sm font-semibold rounded-lg transition-all duration-150
                          <?php echo e(request()->routeIs($item['route']) ? 'bg-white text-blue-700 shadow' : 'text-blue-100 hover:bg-white/15 hover:text-white'); ?>">
                    <?php echo e($item['label']); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(auth()->user()->role === 'hospital'): ?>
                <?php $__currentLoopData = [
                    ['route' => 'home',                        'label' => __('Home')],
                    ['route' => 'hospital.dashboard',          'label' => __('My Profile')],
                    ['route' => 'hospital.patients',           'label' => __('Patients')],
                    ['route' => 'hospital.appointments.index', 'label' => __('Appointments')],
                    ['route' => 'hospital.vaccines.index',     'label' => __('Vaccines')],
                    ['route' => 'contact',                     'label' => __('Contact')],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route($item['route'])); ?>"
                   class="relative px-4 h-10 flex items-center text-sm font-semibold rounded-lg transition-all duration-150
                          <?php echo e(request()->routeIs($item['route']) ? 'bg-white text-blue-700 shadow' : 'text-blue-100 hover:bg-white/15 hover:text-white'); ?>">
                    <?php echo e($item['label']); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(auth()->user()->role === 'admin'): ?>
                <?php $__currentLoopData = [
                    ['route' => 'admin.dashboard',           'label' => __('Dashboard')],
                    ['route' => 'admin.hospitals',           'label' => __('Hospitals')],
                    ['route' => 'admin.patients.index',      'label' => __('Patients')],
                    ['route' => 'admin.vaccines.index',      'label' => __('Vaccines')],
                    ['route' => 'admin.reports.bookings',    'label' => __('Bookings')],
                    ['route' => 'admin.reports.test-reports','label' => __('Test Reports')],
                    ['route' => 'contact',                   'label' => __('Contact')],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route($item['route'])); ?>"
                   class="relative px-4 h-10 flex items-center text-sm font-semibold rounded-lg transition-all duration-150
                          <?php echo e(request()->routeIs($item['route']) ? 'bg-white text-blue-700 shadow' : 'text-blue-100 hover:bg-white/15 hover:text-white'); ?>">
                    <?php echo e($item['label']); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            
            <div class="ml-auto flex items-center gap-3">
                <span class="text-blue-200 text-xs"><?php echo e(auth()->user()->name); ?></span>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="px-4 py-1.5 text-sm font-semibold border border-white/40 rounded-lg hover:bg-white/10 transition text-white cursor-pointer bg-transparent">
                        <?php echo e(__('Logout')); ?>

                    </button>
                </form>
            </div>
        <?php endif; ?>

        </div>
    </nav>

    
    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-blue-600 text-white flex justify-around items-center py-2 shadow-lg">

        <?php if(auth()->guard()->guest()): ?>
            
            <a href="<?php echo e(route('home')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75V21a1 1 0 01-1 1H5a1 1 0 01-1-1V9.75z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"/></svg>
                <?php if(request()->routeIs('home')): ?>
                <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>
            
            <a href="<?php echo e(route('hospitals')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-4a1 1 0 011-1h4a1 1 0 011 1v4"/></svg>
                <?php if(request()->routeIs('hospitals')): ?>
                <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>
            
            <a href="<?php echo e(route('vaccines')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <?php if(request()->routeIs('vaccines')): ?>
                <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>
            
            <a href="<?php echo e(route('contact')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <?php if(request()->routeIs('contact')): ?>
                <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>
            
            <a href="<?php echo e(route('login')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                <?php if(request()->routeIs('login')): ?>
                <span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>
        <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->role === 'patient'): ?>
                <a href="<?php echo e(route('home')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75V21a1 1 0 01-1 1H5a1 1 0 01-1-1V9.75z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"/></svg>
                    <?php if(request()->routeIs('home')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('patient.dashboard')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <?php if(request()->routeIs('patient.dashboard')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('patient.search-hospitals')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/></svg>
                    <?php if(request()->routeIs('patient.search-hospitals')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('patient.appointments.index')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    <?php if(request()->routeIs('patient.appointments.index')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('patient.tracking')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <?php if(request()->routeIs('patient.tracking')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="relative flex flex-col items-center hover:text-blue-200 bg-transparent border-0 text-white cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            <?php endif; ?>

            <?php if(auth()->user()->role === 'hospital'): ?>
                <a href="<?php echo e(route('home')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75V21a1 1 0 01-1 1H5a1 1 0 01-1-1V9.75z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"/></svg>
                    <?php if(request()->routeIs('home')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('hospital.dashboard')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <?php if(request()->routeIs('hospital.dashboard')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('hospital.patients')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-1a4 4 0 00-5-3.87M9 20H4v-1a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/></svg>
                    <?php if(request()->routeIs('hospital.patients')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('hospital.appointments.index')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <?php if(request()->routeIs('hospital.appointments.index')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('hospital.vaccines.index')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <?php if(request()->routeIs('hospital.vaccines.*')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="relative flex flex-col items-center hover:text-blue-200 bg-transparent border-0 text-white cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            <?php endif; ?>

            <?php if(auth()->user()->role === 'admin'): ?>
                <a href="<?php echo e(route('home')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75V21a1 1 0 01-1 1H5a1 1 0 01-1-1V9.75z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"/></svg>
                    <?php if(request()->routeIs('home')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    <?php if(request()->routeIs('admin.dashboard')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.hospitals')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-4a1 1 0 011-1h4a1 1 0 011 1v4"/></svg>
                    <?php if(request()->routeIs('admin.hospitals')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.patients.index')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-1a4 4 0 00-5-3.87M9 20H4v-1a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/></svg>
                    <?php if(request()->routeIs('admin.patients.index')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.vaccines.index')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <?php if(request()->routeIs('admin.vaccines.*')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.reports.bookings')); ?>" class="relative flex flex-col items-center hover:text-blue-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <?php if(request()->routeIs('admin.reports.*')): ?><span class="absolute -bottom-1 w-1 h-1 rounded-full bg-white"></span><?php endif; ?>
                </a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="relative flex flex-col items-center hover:text-blue-200 bg-transparent border-0 text-white cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </nav>

    
    <div class="md:hidden h-16"></div>

    <?php endif; ?>

    <main class="<?php echo $__env->yieldContent('main_class', 'w-full max-w-4xl mx-auto px-4 py-6 overflow-x-hidden'); ?>">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

<script src="<?php echo e(asset('js/translations.js')); ?>"></script>
<script>
    // toggleAppSettings — guest navbar settings button
    function toggleAppSettings() {
        var popup = document.getElementById('app-settings-popup');
        if (popup) popup.classList.toggle('open');
    }
    document.addEventListener('click', function(e) {
        var popup = document.getElementById('app-settings-popup');
        if (popup && popup.classList.contains('open')) {
            if (!popup.contains(e.target) && !e.target.closest('[onclick*="toggleAppSettings"]'))
                popup.classList.remove('open');
        }
    });

    // ── Dark Mode (Navbar Settings) ────────────────────────
    (function initAppDark() {
        if (localStorage.getItem('darkMode') === 'on') {
            document.body.classList.add('dark-theme');
            _applyAppDarkUI(true);
        }
    })();

    function toggleAppDark() {
        var isDark = document.body.classList.toggle('dark-theme');
        localStorage.setItem('darkMode', isDark ? 'on' : 'off');
        _applyAppDarkUI(isDark);
    }

    function _applyAppDarkUI(isDark) {
        var btn   = document.getElementById('app-dark-toggle');
        var knob  = document.getElementById('app-dark-knob');
        if (!btn) return;
        if (isDark) {
            btn.style.background = '#2563eb';
            knob.style.transform = 'translateX(20px)';
        } else {
            btn.style.background = '#374151';
            knob.style.transform = 'translateX(0)';
        }
    }
</script>
</body>
</html>
<?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/layouts/app.blade.php ENDPATH**/ ?>