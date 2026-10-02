@extends('layouts.app')

@section('title', 'Hospital Registration - Covid Vaccination Portal')
@section('favicon')
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='8' fill='%231e3a5f'/><rect x='14' y='8' width='4' height='16' rx='2' fill='white'/><rect x='8' y='14' width='16' height='4' rx='2' fill='white'/></svg>">
@endsection

@section('hide_navbar', '1')
@section('main_class', '')

@section('content')

<div class="fixed inset-0 -z-10"
    style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 55%, #60a5fa 100%);"></div>

<div class="min-h-screen flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-lg">

        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-white">Hospital Registration</h1>
            <p class="text-blue-100 mt-1 text-sm">Covid Vaccination Portal</p>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl p-8">

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('hospital.register') }}" class="space-y-4">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contact Person Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" id="hosp_password" maxlength="10"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                        <p id="hosp_pass_error" class="hidden text-red-500 text-xs mt-1">Password cannot exceed 10 characters.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="hospital_confirm_password" maxlength="10"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            <button type="button" onclick="togglePassword('hospital_confirm_password', this)"
                                class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg class="w-4 h-4 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg class="w-4 h-4 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.082-3.667M6.343 6.343A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.357 2.524M6.343 6.343L3 3m3.343 3.343l11.314 11.314M17.657 17.657L21 21"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hospital Name</label>
                    <input type="text" name="hospital_name" value="{{ old('hospital_name') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="text" name="phone" id="hosp_phone" value="{{ old('phone') }}"
                            inputmode="numeric" maxlength="15"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <input type="text" name="city" value="{{ old('city') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">License Number <span class="text-gray-400 font-normal text-xs">(4 digits)</span></label>
                    <input type="text" name="license_no" id="hosp_license" value="{{ old('license_no') }}"
                        inputmode="numeric" maxlength="4"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold text-sm">
                    Register Hospital
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                Already registered?
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline font-medium">Sign In</a>
            </p>
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

// Phone — numbers only
document.getElementById('hosp_phone').addEventListener('input', function() {
    this.value = this.value.replace(/\D/g, '').slice(0, 15);
});
document.getElementById('hosp_phone').addEventListener('keypress', function(e) {
    if (!/[0-9]/.test(e.key)) e.preventDefault();
});

// License — numbers only, max 4
document.getElementById('hosp_license').addEventListener('input', function() {
    this.value = this.value.replace(/\D/g, '').slice(0, 4);
});
document.getElementById('hosp_license').addEventListener('keypress', function(e) {
    if (!/[0-9]/.test(e.key)) e.preventDefault();
});

// Password — max 10, show error
document.getElementById('hosp_password').addEventListener('input', function() {
    var err = document.getElementById('hosp_pass_error');
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
        err.classList.remove('hidden');
    } else {
        err.classList.add('hidden');
    }
});
</script>

@endsection
