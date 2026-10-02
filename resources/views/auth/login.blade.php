@extends('layouts.app')

@section('title', 'Login - Covid Vaccination Portal')

@section('favicon')
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='7' fill='%23000000'/><path d='M16 4 L27 8.5 L27 16 C27 21.5 22.2 26.2 16 28 C9.8 26.2 5 21.5 5 16 L5 8.5 Z' fill='white' fill-opacity='0.95'/><path d='M16 7 L24.5 10.8 L24.5 16 C24.5 20.2 20.7 24 16 25.5 C11.3 24 7.5 20.2 7.5 16 L7.5 10.8 Z' fill='%23000000'/><path d='M12 16.5 L14.8 19.3 L20.5 13' stroke='white' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round' fill='none'/></svg>">
@endsection

@section('hide_navbar', '1')
@section('main_class', 'p-0 m-0 max-w-none w-full')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center py-10"
    style="background: linear-gradient(135deg, #0f2461 0%, #1a56db 45%, #3b82f6 75%, #93c5fd 100%);">
    <div class="w-full max-w-md px-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8"
            style="box-shadow: 0 20px 60px 0 rgba(0,0,0,0.30);">

            {{-- Icon + Title --}}
            <div class="flex justify-center mb-4">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white rounded-2xl p-4"
                    style="box-shadow: 0 8px 24px 0 rgba(0,0,0,0.22);">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>
            <h2 class="text-center text-xl font-bold text-gray-800 mb-1">Welcome Back</h2>
            <p class="text-center text-gray-400 text-sm mb-5">Sign in to your account</p>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded-xl mb-4 text-sm"
                    style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded-xl mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-3">
                @csrf

                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </span>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="Email Address"
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
                    <input type="password" name="password" id="login_password"
                        placeholder="Password"
                        class="w-full border border-gray-200 rounded-xl pl-10 pr-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50"
                        style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                    <button type="button" onclick="togglePassword('login_password', this)"
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
                    <a href="{{ route('password.forgot.form') }}"
                        class="text-xs text-blue-500 hover:text-blue-700 hover:underline">
                        Forgot Password?
                    </a>
                </div>
            </form>

            <div class="mt-5 text-center">
                <a href="{{ route('home') }}" class="text-sm text-blue-600 hover:underline">← Back to Home</a>
            </div>
        </div>
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
</script>
@endsection
