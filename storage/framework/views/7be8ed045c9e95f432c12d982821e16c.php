<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel - Covid Vaccination Portal'); ?></title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='8' fill='%231c1c2e'/><path d='M16 6 C11 6 7 10 7 14 C7 19 11 22 16 26 C21 22 25 19 25 14 C25 10 21 6 16 6 Z' stroke='white' stroke-width='1.5' fill='none' stroke-linejoin='round'/><path d='M12 14 L15 17 L20 11' stroke='white' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round'/></svg>">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { box-sizing: border-box; }
        body { overflow-x: hidden; }

        /* ===== DARK THEME — page dark, sidebar stays black ===== */
        body.dark-theme { background-color: #0f0f1a !important; color: #e2e8f0 !important; }
        body.dark-theme .bg-white { background-color: #1e1e2e !important; }
        body.dark-theme .bg-gray-50 { background-color: #16162a !important; }
        body.dark-theme .bg-\[#e8edf2\] { background-color: #0f0f1a !important; }
        body.dark-theme .text-gray-800 { color: #e2e8f0 !important; }
        body.dark-theme .text-gray-700 { color: #cbd5e1 !important; }
        body.dark-theme .text-gray-600 { color: #94a3b8 !important; }
        body.dark-theme .text-gray-500 { color: #64748b !important; }
        body.dark-theme .border-gray-200 { border-color: #2d2d44 !important; }
        body.dark-theme .border-gray-100 { border-color: #2d2d44 !important; }
        body.dark-theme header { background-color: #1e1e2e !important; }
        /* Sidebar stays black in both modes */
        body.dark-theme aside { background: linear-gradient(to bottom, #1c1c2e, #2d2d44) !important; }
        body.dark-theme aside .text-white { color: #ffffff !important; }
        body.dark-theme aside .text-gray-300 { color: #cbd5e1 !important; }
        body.dark-theme aside .text-gray-400 { color: #94a3b8 !important; }
        body.dark-theme aside .text-gray-500 { color: #64748b !important; }
        body.dark-theme aside svg { color: inherit !important; }
        /* Mobile bottom nav — dark theme */
        body.dark-theme nav.md\:hidden { background-color: #1e1e2e !important; border-color: #2d2d44 !important; }
        body.dark-theme nav.md\:hidden .text-gray-900 { color: #ffffff !important; }
        body.dark-theme nav.md\:hidden .text-gray-500 { color: #64748b !important; }
        body.dark-theme nav.md\:hidden .bg-gray-900 { background-color: #ffffff !important; }
        body.dark-theme nav.md\:hidden svg { color: inherit !important; }

        /* Settings popup */
        #settings-popup { display: none; }
        #settings-popup.open { display: block; }
    </style>
</head>
<body class="bg-[#e8edf2] text-gray-800 overflow-x-hidden">

<div class="flex min-h-screen">

    
    <aside class="hidden md:flex flex-col w-64 bg-gradient-to-b from-[#1c1c2e] to-[#2d2d44] text-white z-40 self-start sticky top-0 rounded-2xl mx-3 my-3" style="box-shadow: 0 10px 40px 0 rgba(28,28,46,0.60), 0 4px 16px 0 rgba(0,0,0,0.30);">

        
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/10">
            <div class="bg-white rounded-xl p-1.5 shadow flex-shrink-0">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div class="leading-tight">
                <p class="font-bold text-sm tracking-wide leading-none"><?php echo e(__('Admin Panel')); ?></p>
                <p class="text-gray-400 text-xs mt-0.5"><?php echo e(__('Covid Vaccination Portal')); ?></p>
            </div>
        </div>

        
        <div class="px-4 py-4 border-b border-white/10 relative">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div class="overflow-hidden flex-1">
                    <p class="text-sm font-semibold truncate"><?php echo e(auth()->user()->name ?? 'Admin'); ?></p>
                    <p class="text-gray-400 text-xs truncate"><?php echo e(auth()->user()->email ?? ''); ?></p>
                </div>
                
                <button onclick="toggleSettings()" class="w-7 h-7 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center flex-shrink-0 transition" title="Settings">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                </button>
            </div>

            
            <div id="settings-popup" class="absolute left-3 right-3 top-full mt-1 bg-[#1e1e2e] border border-white/10 rounded-xl p-3 z-50" style="box-shadow: 0 8px 24px rgba(0,0,0,0.40);">
                
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                        <span class="text-xs text-gray-300 font-medium">Dark Theme</span>
                    </div>
                    <button onclick="toggleDark()" id="dark-toggle"
                        class="relative w-10 h-5 rounded-full transition-colors duration-200 focus:outline-none"
                        style="background: #374151;">
                        <span id="dark-knob" class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-white transition-transform duration-200"></span>
                    </button>
                </div>
                
                <div>
                    <div class="flex items-center gap-2 mb-1.5">
                        <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                        <span class="text-xs text-gray-300 font-medium">Language</span>
                    </div>
                    <div class="flex gap-1">
                        <a href="<?php echo e(route('lang.switch', 'en')); ?>"
                            class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition <?php echo e(app()->getLocale() === 'en' ? 'bg-white text-gray-800' : 'bg-white/10 text-gray-300 hover:bg-white/20'); ?>">
                            🇬🇧 EN
                        </a>
                        <a href="<?php echo e(route('lang.switch', 'ur')); ?>"
                            class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition <?php echo e(app()->getLocale() === 'ur' ? 'bg-white text-gray-800' : 'bg-white/10 text-gray-300 hover:bg-white/20'); ?>">
                            🇵🇰 اردو
                        </a>
                    </div>
                </div>
            </div>
        </div>

        
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">

            
            <a href="<?php echo e(route('admin.dashboard')); ?>"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.dashboard') ? 'active-nav-link text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white'); ?>">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span data-i18n="Dashboard"><?php echo e(__('Dashboard')); ?></span>
                <?php if(request()->routeIs('admin.dashboard')): ?>
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>

            
            <a href="<?php echo e(route('admin.hospitals')); ?>"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.hospitals') ? 'active-nav-link text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white'); ?>">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-4a1 1 0 011-1h4a1 1 0 011 1v4"/>
                </svg>
                <span data-i18n="Hospitals"><?php echo e(__('Hospitals')); ?></span>
                <?php if(request()->routeIs('admin.hospitals')): ?>
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>

            
            <a href="<?php echo e(route('admin.patients.index')); ?>"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.patients.*') ? 'active-nav-link text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white'); ?>">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-1a4 4 0 00-5-3.87M9 20H4v-1a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/>
                </svg>
                <span data-i18n="Patients"><?php echo e(__('Patients')); ?></span>
                <?php if(request()->routeIs('admin.patients.*')): ?>
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>

            
            <a href="<?php echo e(route('admin.vaccines.index')); ?>"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.vaccines.*') ? 'active-nav-link text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white'); ?>">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span data-i18n="Vaccines"><?php echo e(__('Vaccines')); ?></span>
                <?php if(request()->routeIs('admin.vaccines.*')): ?>
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>

            
            <div class="pt-3 pb-1">
                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" data-i18n="Reports"><?php echo e(__('Reports')); ?></p>
            </div>

            <a href="<?php echo e(route('admin.reports.bookings')); ?>"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.reports.bookings') ? 'active-nav-link text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white'); ?>">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span data-i18n="Bookings"><?php echo e(__('Bookings')); ?></span>
                <?php if(request()->routeIs('admin.reports.bookings')): ?>
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>

            <a href="<?php echo e(route('admin.reports.test-reports')); ?>"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      <?php echo e(request()->routeIs('admin.reports.test-reports') ? 'active-nav-link text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white'); ?>">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span data-i18n="Test Reports"><?php echo e(__('Test Reports')); ?></span>
                <?php if(request()->routeIs('admin.reports.test-reports')): ?>
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                <?php endif; ?>
            </a>

        </nav>

        
        <div class="px-3 py-4 border-t border-white/10">
            <a href="<?php echo e(route('home')); ?>"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-white/10 hover:text-white transition mb-1">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 9.75L12 3l9 6.75V21a1 1 0 01-1 1H5a1 1 0 01-1-1V9.75z"/>
                </svg>
                <span data-i18n="Home"><?php echo e(__('Home')); ?></span>
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-red-500/20 hover:text-red-400 transition bg-transparent border-0 cursor-pointer text-left">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span data-i18n="Logout"><?php echo e(__('Logout')); ?></span>
                </button>
            </form>
        </div>
    </aside>

    
    <div class="md:hidden fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-[#1c1c2e] to-[#2d2d44] text-white px-4 h-14 flex items-center justify-between shadow-lg">
        <div class="flex items-center gap-2">
            <div class="bg-white rounded-lg p-1">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <span class="font-bold text-sm"><?php echo e(__('Admin Panel')); ?></span>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-gray-400 text-xs"><?php echo e(auth()->user()->name ?? ''); ?></span>
            
            <div class="relative">
                <button onclick="toggleMobileSettings()" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                </button>
                
                <div id="mobile-settings-popup" class="hidden absolute right-0 top-full mt-1 w-52 bg-[#1e1e2e] border border-white/10 rounded-xl p-3 z-[999]" style="box-shadow: 0 8px 24px rgba(0,0,0,0.50);">
                    
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                            <span class="text-xs text-gray-300 font-medium">Dark Theme</span>
                        </div>
                        <button onclick="toggleDark()" id="mob-dark-toggle"
                            class="relative w-10 h-5 rounded-full transition-colors duration-200 focus:outline-none"
                            style="background: #374151;">
                            <span id="mob-dark-knob" class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-white transition-transform duration-200"></span>
                        </button>
                    </div>
                    
                    <div>
                        <div class="flex items-center gap-2 mb-1.5">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                            </svg>
                            <span class="text-xs text-gray-300 font-medium">Language</span>
                        </div>
                        <div class="flex gap-1">
                            <a href="<?php echo e(route('lang.switch', 'en')); ?>"
                                class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition <?php echo e(app()->getLocale() === 'en' ? 'bg-white text-gray-800' : 'bg-white/10 text-gray-300 hover:bg-white/20'); ?>">
                                🇬🇧 EN
                            </a>
                            <a href="<?php echo e(route('lang.switch', 'ur')); ?>"
                                class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition <?php echo e(app()->getLocale() === 'ur' ? 'bg-white text-gray-800' : 'bg-white/10 text-gray-300 hover:bg-white/20'); ?>">
                                🇵🇰 اردو
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-gray-200 flex justify-around items-center py-2" style="box-shadow: 0 -4px 20px 0 rgba(0,0,0,0.12);">

        
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex flex-col items-center gap-0.5 px-2 relative">
            <svg class="w-5 h-5 <?php echo e(request()->routeIs('admin.dashboard') ? 'text-gray-900' : 'text-gray-500'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="text-[10px] <?php echo e(request()->routeIs('admin.dashboard') ? 'text-gray-900 font-semibold' : 'text-gray-500'); ?>"><?php echo e(__('Home')); ?></span>
            <?php if(request()->routeIs('admin.dashboard')): ?>
                <span class="absolute -top-0.5 right-1.5 w-1.5 h-1.5 rounded-full bg-gray-900"></span>
            <?php endif; ?>
        </a>

        
        <a href="<?php echo e(route('admin.hospitals')); ?>" class="flex flex-col items-center gap-0.5 px-2 relative">
            <svg class="w-5 h-5 <?php echo e(request()->routeIs('admin.hospitals') ? 'text-gray-900' : 'text-gray-500'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-4a1 1 0 011-1h4a1 1 0 011 1v4"/>
            </svg>
            <span class="text-[10px] <?php echo e(request()->routeIs('admin.hospitals') ? 'text-gray-900 font-semibold' : 'text-gray-500'); ?>"><?php echo e(__('Hospitals')); ?></span>
            <?php if(request()->routeIs('admin.hospitals')): ?>
                <span class="absolute -top-0.5 right-1.5 w-1.5 h-1.5 rounded-full bg-gray-900"></span>
            <?php endif; ?>
        </a>

        
        <a href="<?php echo e(route('admin.patients.index')); ?>" class="flex flex-col items-center gap-0.5 px-2 relative">
            <svg class="w-5 h-5 <?php echo e(request()->routeIs('admin.patients.*') ? 'text-gray-900' : 'text-gray-500'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-1a4 4 0 00-5-3.87M9 20H4v-1a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/>
            </svg>
            <span class="text-[10px] <?php echo e(request()->routeIs('admin.patients.*') ? 'text-gray-900 font-semibold' : 'text-gray-500'); ?>"><?php echo e(__('Patients')); ?></span>
            <?php if(request()->routeIs('admin.patients.*')): ?>
                <span class="absolute -top-0.5 right-1.5 w-1.5 h-1.5 rounded-full bg-gray-900"></span>
            <?php endif; ?>
        </a>

        
        <a href="<?php echo e(route('admin.vaccines.index')); ?>" class="flex flex-col items-center gap-0.5 px-2 relative">
            <svg class="w-5 h-5 <?php echo e(request()->routeIs('admin.vaccines.*') ? 'text-gray-900' : 'text-gray-500'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            <span class="text-[10px] <?php echo e(request()->routeIs('admin.vaccines.*') ? 'text-gray-900 font-semibold' : 'text-gray-500'); ?>"><?php echo e(__('Vaccines')); ?></span>
            <?php if(request()->routeIs('admin.vaccines.*')): ?>
                <span class="absolute -top-0.5 right-1.5 w-1.5 h-1.5 rounded-full bg-gray-900"></span>
            <?php endif; ?>
        </a>

        
        <a href="<?php echo e(route('admin.reports.bookings')); ?>" class="flex flex-col items-center gap-0.5 px-2 relative">
            <svg class="w-5 h-5 <?php echo e(request()->routeIs('admin.reports.*') ? 'text-gray-900' : 'text-gray-500'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span class="text-[10px] <?php echo e(request()->routeIs('admin.reports.*') ? 'text-gray-900 font-semibold' : 'text-gray-500'); ?>"><?php echo e(__('Reports')); ?></span>
            <?php if(request()->routeIs('admin.reports.*')): ?>
                <span class="absolute -top-0.5 right-1.5 w-1.5 h-1.5 rounded-full bg-gray-900"></span>
            <?php endif; ?>
        </a>

        
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="flex flex-col items-center gap-0.5 px-2 bg-transparent border-0 cursor-pointer">
                <svg class="w-5 h-5 text-gray-500 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span class="text-[10px] text-gray-500"><?php echo e(__('Logout')); ?></span>
            </button>
        </form>

    </nav>

    
    <div class="flex-1 flex flex-col min-h-screen min-w-0 overflow-hidden">

        
        <header class="hidden md:flex bg-white px-8 py-4 items-center justify-between sticky top-0 z-30 mx-4 mt-3 rounded-2xl" style="box-shadow: 0 8px 30px 0 rgba(28,28,46,0.16), 0 3px 10px 0 rgba(0,0,0,0.13);">
            <div>
                <h2 class="text-lg font-semibold text-gray-800"><?php echo $__env->yieldContent('page_title', 'Admin Dashboard'); ?></h2>
                <p class="text-xs text-gray-500">Covid Vaccination Portal — Admin</p>
            </div>
            <div class="flex items-center gap-3 text-sm text-gray-600">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span><?php echo e(auth()->user()->name ?? 'Admin'); ?></span>
            </div>
        </header>

        
        <main class="flex-1 p-4 md:p-8 mt-14 md:mt-0 mb-16 md:mb-0 min-w-0">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

</div>

</body>
</html>

<script src="<?php echo e(asset('js/translations.js')); ?>"></script>
<script>
// ===== Settings Popup (desktop sidebar) =====
function toggleSettings() {
    var popup = document.getElementById('settings-popup');
    popup.classList.toggle('open');
}
document.addEventListener('click', function(e) {
    var popup = document.getElementById('settings-popup');
    if (popup && popup.classList.contains('open')) {
        if (!popup.contains(e.target) && !e.target.closest('button[onclick="toggleSettings()"]')) {
            popup.classList.remove('open');
        }
    }
});

// ===== Mobile Settings Popup =====
function toggleMobileSettings() {
    var popup = document.getElementById('mobile-settings-popup');
    popup.classList.toggle('hidden');
}
document.addEventListener('click', function(e) {
    var popup = document.getElementById('mobile-settings-popup');
    if (popup && !popup.classList.contains('hidden')) {
        if (!popup.contains(e.target) && !e.target.closest('button[onclick="toggleMobileSettings()"]')) {
            popup.classList.add('hidden');
        }
    }
});

// ===== Dark Theme Toggle =====
function applyDark(on) {
    document.body.classList.toggle('dark-theme', on);
    // desktop toggle
    var dt = document.getElementById('dark-toggle');
    var dk = document.getElementById('dark-knob');
    if (dt) dt.style.background = on ? '#3b82f6' : '#374151';
    if (dk) dk.style.transform = on ? 'translateX(20px)' : '';
    // mobile toggle
    var mdt = document.getElementById('mob-dark-toggle');
    var mdk = document.getElementById('mob-dark-knob');
    if (mdt) mdt.style.background = on ? '#3b82f6' : '#374151';
    if (mdk) mdk.style.transform = on ? 'translateX(20px)' : '';
    localStorage.setItem('darkTheme', on ? '1' : '0');
}
function toggleDark() {
    applyDark(!document.body.classList.contains('dark-theme'));
}
// Restore on load
(function() {
    if (localStorage.getItem('darkTheme') === '1') applyDark(true);
})();
</script>
<?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/layouts/admin.blade.php ENDPATH**/ ?>