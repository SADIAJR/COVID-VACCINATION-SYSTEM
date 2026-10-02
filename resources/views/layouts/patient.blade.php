<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Patient Panel - Covid Vaccination Portal')</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='8' fill='%23065f46'/><circle cx='16' cy='12' r='5' stroke='white' stroke-width='2' fill='none'/><path d='M7 26 C7 21 11 18 16 18 C21 18 25 21 25 26' stroke='white' stroke-width='2' fill='none' stroke-linecap='round'/></svg>">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { box-sizing: border-box; }
        body { overflow-x: hidden; }
        /* Dark theme — only affects content area, sidebar stays same */
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
        /* Patient sidebar stays green in both light and dark mode */
        body.dark-theme aside { background: linear-gradient(to bottom, #065f46, #047857) !important; }
        /* Settings popup */
        #settings-popup { display: none; }
        #settings-popup.open { display: block; }
    </style>
</head>
<body class="bg-[#e8edf2] text-gray-800 overflow-x-hidden" data-locale="{{ app()->getLocale() }}">

<div class="flex min-h-screen">

    {{-- ===== LEFT SIDEBAR ===== --}}
    <aside class="hidden md:flex flex-col w-64 bg-gradient-to-b from-[#065f46] to-[#047857] text-white z-40 self-start sticky top-0 rounded-2xl mx-3 my-3" style="box-shadow: 0 10px 40px 0 rgba(6,95,70,0.55), 0 4px 16px 0 rgba(0,0,0,0.30);">

        {{-- Logo / Brand --}}
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/10">
            <div class="bg-white rounded-xl p-1.5 shadow flex-shrink-0">
                <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div class="leading-tight">
                <p class="font-bold text-sm tracking-wide leading-none">{{ __('Patient Panel') }}</p>
                <p class="text-emerald-300 text-xs mt-0.5">{{ __('Covid Vaccination Portal') }}</p>
            </div>
        </div>

        {{-- Patient user info --}}
        <div class="px-4 py-4 border-b border-white/10 relative">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-emerald-400/30 flex items-center justify-center flex-shrink-0 text-base font-bold">
                    {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                </div>
                <div class="overflow-hidden flex-1">
                    <p class="text-sm font-semibold truncate">{{ auth()->user()->name ?? 'Patient' }}</p>
                    <p class="text-emerald-300 text-xs truncate">{{ auth()->user()->email ?? '' }}</p>
                </div>
                <button onclick="toggleSettings()" class="w-7 h-7 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center flex-shrink-0 transition" title="Settings">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                </button>
            </div>
            <div id="settings-popup" class="absolute left-3 right-3 top-full mt-1 bg-[#065f46] border border-white/10 rounded-xl p-3 z-50" style="box-shadow: 0 8px 24px rgba(0,0,0,0.40);">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                        <span class="text-xs text-emerald-200 font-medium">{{ __('Dark Theme') }}</span>
                    </div>
                    <button onclick="toggleDark()" id="dark-toggle" class="relative w-10 h-5 rounded-full transition-colors duration-200 focus:outline-none" style="background: #374151;">
                        <span id="dark-knob" class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-white transition-transform duration-200"></span>
                    </button>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1.5">
                        <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                        <span class="text-xs text-emerald-200 font-medium">{{ __('Language') }}</span>
                    </div>
                    <div class="flex gap-1">
                        <a href="{{ route('lang.switch', 'en') }}"
                            class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition {{ app()->getLocale() === 'en' ? 'bg-white text-emerald-800' : 'bg-white/10 text-emerald-200 hover:bg-white/20' }}">
                            🇬🇧 EN
                        </a>
                        <a href="{{ route('lang.switch', 'ur') }}"
                            class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition {{ app()->getLocale() === 'ur' ? 'bg-white text-emerald-800' : 'bg-white/10 text-emerald-200 hover:bg-white/20' }}">
                            🇵🇰 اردو
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Navigation Links --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">

            {{-- Dashboard / Profile --}}
            <a href="{{ route('patient.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('patient.dashboard') ? 'bg-white/20 text-white' : 'text-emerald-200 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                {{ __('Dashboard') }}
                @if(request()->routeIs('patient.dashboard'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                @endif
            </a>

            {{-- Search Hospitals --}}
            <a href="{{ route('patient.search-hospitals') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('patient.search-hospitals') ? 'bg-white/20 text-white' : 'text-emerald-200 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
                </svg>
                {{ __('Search Hospitals') }}
                @if(request()->routeIs('patient.search-hospitals'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                @endif
            </a>

            {{-- My Appointments --}}
            <a href="{{ route('patient.appointments.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('patient.appointments.*') ? 'bg-white/20 text-white' : 'text-emerald-200 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
                {{ __('My Appointments') }}
                @if(request()->routeIs('patient.appointments.*'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                @endif
            </a>

            {{-- Track Vaccination --}}
            <a href="{{ route('patient.tracking') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('patient.tracking') ? 'bg-white/20 text-white' : 'text-emerald-200 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                {{ __('Track Vaccination') }}
                @if(request()->routeIs('patient.tracking'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                @endif
            </a>

            {{-- Contact --}}
            <a href="{{ route('contact') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('contact') ? 'bg-white/20 text-white' : 'text-emerald-200 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                {{ __('Contact') }}
                @if(request()->routeIs('contact'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                @endif
            </a>

        </nav>

        {{-- Home + Logout at bottom --}}
        <div class="px-3 py-4 border-t border-white/10">
            <a href="{{ route('home') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-emerald-200 hover:bg-white/10 hover:text-white transition mb-1">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 9.75L12 3l9 6.75V21a1 1 0 01-1 1H5a1 1 0 01-1-1V9.75z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"/>
                </svg>
                {{ __('Home') }}
            </a>
            {{-- Logout triggers review popup --}}
            <button type="button" onclick="openReviewPopup()"
                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-emerald-200 hover:bg-red-500/20 hover:text-red-300 transition bg-transparent border-0 cursor-pointer text-left">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                {{ __('Logout') }}
            </button>
            {{-- Hidden real logout form --}}
            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
        </div>
    </aside>

    {{-- ===== MOBILE TOP BAR ===== --}}
    <div class="md:hidden fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-[#065f46] to-[#059669] text-white px-4 h-14 flex items-center justify-between shadow-lg">
        <div class="flex items-center gap-2">
            <div class="bg-white rounded-lg p-1">
                <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <span class="font-bold text-sm">{{ __('Patient Panel') }}</span>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-emerald-200 text-xs">{{ auth()->user()->name ?? '' }}</span>
            {{-- Mobile Settings Button --}}
            <div class="relative">
                <button onclick="toggleMobileSettings()" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                </button>
                {{-- Mobile Settings Popup --}}
                <div id="mobile-settings-popup" class="hidden absolute right-0 top-full mt-1 w-52 bg-[#065f46] border border-white/10 rounded-xl p-3 z-[999]" style="box-shadow: 0 8px 24px rgba(0,0,0,0.50);">
                    {{-- Dark Theme --}}
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                            <span class="text-xs text-emerald-200 font-medium">{{ __('Dark Theme') }}</span>
                        </div>
                        <button onclick="toggleDark()" id="mob-dark-toggle"
                            class="relative w-10 h-5 rounded-full transition-colors duration-200 focus:outline-none"
                            style="background: #374151;">
                            <span id="mob-dark-knob" class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-white transition-transform duration-200"></span>
                        </button>
                    </div>
                    {{-- Language --}}
                    <div>
                        <div class="flex items-center gap-2 mb-1.5">
                            <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                            </svg>
                            <span class="text-xs text-emerald-200 font-medium">{{ __('Language') }}</span>
                        </div>
                        <div class="flex gap-1">
                            <a href="{{ route('lang.switch', 'en') }}"
                                class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition {{ app()->getLocale() === 'en' ? 'bg-white text-emerald-800' : 'bg-white/10 text-emerald-200 hover:bg-white/20' }}">
                                🇬🇧 EN
                            </a>
                            <a href="{{ route('lang.switch', 'ur') }}"
                                class="flex-1 text-center text-xs px-2 py-1.5 rounded-lg font-medium transition {{ app()->getLocale() === 'ur' ? 'bg-white text-emerald-800' : 'bg-white/10 text-emerald-200 hover:bg-white/20' }}">
                                🇵🇰 اردو
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== MOBILE BOTTOM NAVBAR ===== --}}
    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-gray-200 text-gray-600 flex justify-around items-center py-2" style="box-shadow: 0 -4px 20px 0 rgba(0,0,0,0.12);">
        {{-- Home --}}
        <a href="{{ route('patient.dashboard') }}" class="relative flex flex-col items-center gap-0.5 px-1">
            @if(request()->routeIs('patient.dashboard'))
                <span class="absolute -top-0.5 right-1 w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            @endif
            <svg class="w-4 h-4 {{ request()->routeIs('patient.dashboard') ? 'text-emerald-600' : 'text-gray-400' }}" style="{{ request()->routeIs('patient.dashboard') ? 'filter: drop-shadow(0 2px 4px rgba(6,95,70,0.5))' : 'filter: drop-shadow(0 1px 3px rgba(0,0,0,0.20))' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="text-[9px] {{ request()->routeIs('patient.dashboard') ? 'text-emerald-600' : 'text-gray-400' }}">{{ __('Home') }}</span>
        </a>
        {{-- Search --}}
        <a href="{{ route('patient.search-hospitals') }}" class="relative flex flex-col items-center gap-0.5 px-1">
            @if(request()->routeIs('patient.search-hospitals'))
                <span class="absolute -top-0.5 right-1 w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            @endif
            <svg class="w-4 h-4 {{ request()->routeIs('patient.search-hospitals') ? 'text-emerald-600' : 'text-gray-400' }}" style="{{ request()->routeIs('patient.search-hospitals') ? 'filter: drop-shadow(0 2px 4px rgba(6,95,70,0.5))' : 'filter: drop-shadow(0 1px 3px rgba(0,0,0,0.20))' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
            </svg>
            <span class="text-[9px] {{ request()->routeIs('patient.search-hospitals') ? 'text-emerald-600' : 'text-gray-400' }}">{{ __('Search') }}</span>
        </a>
        {{-- Appointments --}}
        <a href="{{ route('patient.appointments.index') }}" class="relative flex flex-col items-center gap-0.5 px-1">
            @if(request()->routeIs('patient.appointments.*'))
                <span class="absolute -top-0.5 right-1 w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            @endif
            <svg class="w-4 h-4 {{ request()->routeIs('patient.appointments.*') ? 'text-emerald-600' : 'text-gray-400' }}" style="{{ request()->routeIs('patient.appointments.*') ? 'filter: drop-shadow(0 2px 4px rgba(6,95,70,0.5))' : 'filter: drop-shadow(0 1px 3px rgba(0,0,0,0.20))' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
            </svg>
            <span class="text-[9px] {{ request()->routeIs('patient.appointments.*') ? 'text-emerald-600' : 'text-gray-400' }}">{{ __('Appointments') }}</span>
        </a>
        {{-- Tracking --}}
        <a href="{{ route('patient.tracking') }}" class="relative flex flex-col items-center gap-0.5 px-1">
            @if(request()->routeIs('patient.tracking'))
                <span class="absolute -top-0.5 right-1 w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            @endif
            <svg class="w-4 h-4 {{ request()->routeIs('patient.tracking') ? 'text-emerald-600' : 'text-gray-400' }}" style="{{ request()->routeIs('patient.tracking') ? 'filter: drop-shadow(0 2px 4px rgba(6,95,70,0.5))' : 'filter: drop-shadow(0 1px 3px rgba(0,0,0,0.20))' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            <span class="text-[9px] {{ request()->routeIs('patient.tracking') ? 'text-emerald-600' : 'text-gray-400' }}">{{ __('Vaccination Tracking') }}</span>
        </a>
        {{-- Contact --}}
        <a href="{{ route('contact') }}" class="relative flex flex-col items-center gap-0.5 px-1">
            @if(request()->routeIs('contact'))
                <span class="absolute -top-0.5 right-1 w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            @endif
            <svg class="w-4 h-4 {{ request()->routeIs('contact') ? 'text-emerald-600' : 'text-gray-400' }}" style="{{ request()->routeIs('contact') ? 'filter: drop-shadow(0 2px 4px rgba(6,95,70,0.5))' : 'filter: drop-shadow(0 1px 3px rgba(0,0,0,0.20))' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span class="text-[9px] {{ request()->routeIs('contact') ? 'text-emerald-600' : 'text-gray-400' }}">{{ __('Contact') }}</span>
        </a>
        {{-- Logout --}}
        <button type="button" onclick="openReviewPopup()" class="flex flex-col items-center gap-0.5 px-1 bg-transparent border-0 text-gray-400 hover:text-red-500 cursor-pointer">
            <svg class="w-4 h-4" style="filter: drop-shadow(0 1px 3px rgba(0,0,0,0.20));" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="text-[9px]">{{ __('Logout') }}</span>
        </button>
    </nav>

    {{-- ===== MAIN CONTENT AREA ===== --}}
    <div class="flex-1 flex flex-col min-h-screen min-w-0 overflow-hidden">

        {{-- Top Header Bar (desktop) --}}
        <header class="hidden md:flex bg-white px-8 py-4 items-center justify-between sticky top-0 z-30 mx-4 mt-3 rounded-2xl" style="box-shadow: 0 8px 30px 0 rgba(6,95,70,0.18), 0 3px 10px 0 rgba(0,0,0,0.13);">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">@yield('page_title', 'Patient Dashboard')</h2>
                <p class="text-xs text-gray-500">{{ __('Covid Vaccination Portal - Patient') }}</p>
            </div>
            <div class="flex items-center gap-3 text-sm text-gray-600">
                <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-sm">
                    {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                </div>
                <span>{{ auth()->user()->name ?? 'Patient' }}</span>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 p-4 md:p-8 mt-14 md:mt-0 mb-16 md:mb-0 min-w-0">
            @yield('content')
        </main>
    </div>

</div>

{{-- ===== REVIEW POPUP ===== --}}
<div id="review-popup" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.55); backdrop-filter:blur(4px);" class="flex items-center justify-center">
    <div style="background:#fff; border-radius:20px; padding:32px 28px; width:100%; max-width:420px; box-shadow:0 24px 60px rgba(0,0,0,0.25); position:relative; margin:16px;">

        {{-- Close Button --}}
        <button onclick="closeReviewPopup()" style="position:absolute; top:14px; right:16px; background:none; border:none; cursor:pointer; color:#94a3b8;" title="Close">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Header --}}
        <div style="text-align:center; margin-bottom:20px;">
            <div style="width:56px; height:56px; background:#f0fdf4; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 12px;">
                <svg width="28" height="28" fill="none" stroke="#16a34a" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
            <h3 style="font-size:18px; font-weight:700; color:#1e293b; margin:0 0 4px;">{{ __('Rate Your Experience') }}</h3>
            <p style="font-size:13px; color:#64748b; margin:0;">{{ __('Your feedback helps us improve!') }}</p>
        </div>

        {{-- Stars --}}
        <div style="text-align:center; margin-bottom:20px;">
            <div id="stars" style="display:flex; justify-content:center; gap:8px;">
                @for($i = 1; $i <= 5; $i++)
                <button type="button" onclick="setRating({{ $i }})" data-star="{{ $i }}"
                    style="background:none; border:none; cursor:pointer; font-size:36px; color:#d1d5db; transition:color 0.15s, transform 0.15s;"
                    onmouseover="hoverRating({{ $i }})" onmouseout="resetHover()">&#9733;</button>
                @endfor
            </div>
            <p id="star-label" style="font-size:12px; color:#94a3b8; margin-top:6px;">{{ __('Tap a star to rate') }}</p>
        </div>

        {{-- Message Field --}}
        <textarea id="review-message" rows="3" placeholder="Write your review... (optional)"
            style="width:100%; border:1.5px solid #e2e8f0; border-radius:12px; padding:12px 14px; font-size:14px; color:#334155; outline:none; resize:none; font-family:inherit; transition:border 0.2s;"
            onfocus="this.style.borderColor='#16a34a'" onblur="this.style.borderColor='#e2e8f0'"></textarea>

        {{-- Buttons --}}
        <div style="display:flex; gap:10px; margin-top:16px;">
            <button onclick="skipAndLogout()"
                style="flex:1; padding:11px; border-radius:12px; border:1.5px solid #e2e8f0; background:#fff; color:#64748b; font-size:14px; font-weight:500; cursor:pointer;">
                Skip & Logout
            </button>
            <button onclick="submitReview()"
                style="flex:1; padding:11px; border-radius:12px; border:none; background:linear-gradient(135deg,#16a34a,#059669); color:#fff; font-size:14px; font-weight:600; cursor:pointer;">
                Submit & Logout
            </button>
        </div>
    </div>
</div>

<script>
    var selectedRating = 0;
    var labels = ['','😞 Poor','😐 Fair','🙂 Good','😊 Great','🤩 Excellent'];

    function openReviewPopup() {
        document.getElementById('review-popup').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeReviewPopup() {
        document.getElementById('review-popup').style.display = 'none';
        document.body.style.overflow = '';
    }

    function setRating(val) {
        selectedRating = val;
        updateStars(val);
        document.getElementById('star-label').textContent = labels[val];
        document.getElementById('star-label').style.color = '#16a34a';
    }

    function hoverRating(val) {
        updateStars(val);
    }

    function resetHover() {
        updateStars(selectedRating);
    }

    function updateStars(val) {
        document.querySelectorAll('#stars button').forEach(function(btn) {
            var s = parseInt(btn.getAttribute('data-star'));
            btn.style.color = s <= val ? '#f59e0b' : '#d1d5db';
            btn.style.transform = s <= val ? 'scale(1.15)' : 'scale(1)';
        });
    }

    function skipAndLogout() {
        document.getElementById('logout-form').submit();
    }

    function submitReview() {
        var stars   = selectedRating;
        var message = document.getElementById('review-message').value.trim();

        if (stars === 0) {
            document.getElementById('star-label').textContent = 'Please select a star rating!';
            document.getElementById('star-label').style.color = '#ef4444';
            return;
        }

        var btn = document.querySelector('#review-popup button[onclick="submitReview()"]');
        btn.disabled = true;
        btn.textContent = 'Submitting...';

        fetch('{{ route("review.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('#logout-form [name="_token"]').value
            },
            body: JSON.stringify({ stars: stars, message: message })
        })
        .then(function(res) {
            // Whether success or error, just logout — review may or may not have saved
            document.getElementById('logout-form').submit();
        })
        .catch(function() {
            document.getElementById('logout-form').submit();
        });
    }
</script>

</body>
</html>

<script src="{{ asset('js/translations.js') }}"></script>
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

// ===== Dark Theme Toggle (sync desktop + mobile knobs) =====
function applyDark(on) {
    document.body.classList.toggle('dark-theme', on);
    var dt = document.getElementById('dark-toggle');
    var dk = document.getElementById('dark-knob');
    if (dt) dt.style.background = on ? '#10b981' : '#374151';
    if (dk) dk.style.transform = on ? 'translateX(20px)' : '';
    var mdt = document.getElementById('mob-dark-toggle');
    var mdk = document.getElementById('mob-dark-knob');
    if (mdt) mdt.style.background = on ? '#10b981' : '#374151';
    if (mdk) mdk.style.transform = on ? 'translateX(20px)' : '';
    localStorage.setItem('darkTheme', on ? '1' : '0');
}
function toggleDark() {
    applyDark(!document.body.classList.contains('dark-theme'));
}
(function() {
    if (localStorage.getItem('darkTheme') === '1') applyDark(true);
})();
</script>
