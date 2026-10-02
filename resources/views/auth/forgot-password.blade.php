@extends('layouts.app')

@section('title', 'Forgot Password - Covid Vaccination Portal')

@section('favicon')
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='7' fill='%23000000'/><path d='M16 4 L27 8.5 L27 16 C27 21.5 22.2 26.2 16 28 C9.8 26.2 5 21.5 5 16 L5 8.5 Z' fill='white' fill-opacity='0.95'/><path d='M16 7 L24.5 10.8 L24.5 16 C24.5 20.2 20.7 24 16 25.5 C11.3 24 7.5 20.2 7.5 16 L7.5 10.8 Z' fill='%23000000'/><path d='M12 16.5 L14.8 19.3 L20.5 13' stroke='white' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round' fill='none'/></svg>">
@endsection

@section('body_class', 'overflow-x-hidden')
@section('hide_navbar', '1')
@section('main_class', 'p-0 m-0 max-w-none w-full')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center py-10"
    style="background: linear-gradient(135deg, #0f2461 0%, #1a56db 45%, #3b82f6 75%, #93c5fd 100%);">
    <div class="w-full max-w-md px-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8"
            style="box-shadow: 0 20px 60px 0 rgba(0,0,0,0.30);">

            {{-- Icon + Title --}}
            <div class="text-center mb-6">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-7 h-7 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Forgot Password</h1>
                <p class="text-gray-500 text-sm mt-1">Enter your email and we'll send a 5-digit PIN</p>
            </div>

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded-xl mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded-xl mb-4 text-sm">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.send-pin') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="Enter your registered email"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 @error('email') border-red-400 @enderror">
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white py-2.5 rounded-xl hover:from-blue-700 hover:to-blue-900 transition font-semibold"
                    style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.18);">
                    Send PIN to Email
                </button>
            </form>

            <div class="mt-5 text-center">
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">← Back to Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
