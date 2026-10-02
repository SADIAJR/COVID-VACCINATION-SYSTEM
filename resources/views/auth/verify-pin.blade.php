@extends('layouts.app')

@section('title', 'Verify PIN - Covid Vaccination Portal')

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
            <div class="text-center mb-6">
                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3"
                    style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Enter Your PIN</h1>
                <p class="text-gray-500 text-sm mt-1">
                    We sent a 5-digit PIN to<br>
                    <span class="font-semibold text-gray-700">{{ session('reset_email') }}</span>
                </p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded-xl mb-4 text-sm">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.verify-pin') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 text-center">5-Digit PIN</label>
                    <input type="text" name="pin" maxlength="5" inputmode="numeric" pattern="\d{5}"
                        placeholder="_ _ _ _ _" autofocus
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-center text-3xl font-bold tracking-widest focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 @error('pin') border-red-400 @enderror"
                        style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                    <p class="text-xs text-gray-400 mt-1 text-center">PIN is valid for 10 minutes</p>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white py-3 rounded-xl hover:from-blue-700 hover:to-blue-900 transition font-bold text-sm"
                    style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);">
                    Verify PIN
                </button>
            </form>

            <div class="mt-5 text-center space-y-2">
                <p class="text-sm text-gray-500">Didn't receive the PIN?</p>
                <a href="{{ route('password.forgot.form') }}" class="text-sm text-blue-600 hover:underline">Resend PIN</a>
            </div>
        </div>
    </div>
</div>
@endsection
