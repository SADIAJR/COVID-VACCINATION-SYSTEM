@extends('layouts.app')

@section('title', 'Patient Registration - Covid Vaccination Portal')
@section('favicon')
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='8' fill='%23065f46'/><circle cx='16' cy='12' r='5' stroke='white' stroke-width='2' fill='none'/><path d='M7 26 C7 21 11 18 16 18 C21 18 25 21 25 26' stroke='white' stroke-width='2' fill='none' stroke-linecap='round'/></svg>">
@endsection

@section('hide_navbar', '1')
@section('main_class', '')

@section('content')

<div class="fixed inset-0 -z-10"
    style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 55%, #60a5fa 100%);"></div>

<div class="min-h-screen flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-lg">

        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-white">Patient Registration</h1>
            <p class="text-blue-100 mt-1 text-sm">Covid Vaccination Portal — Pakistani Nationals Only</p>
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

            <form method="POST" action="{{ route('patient.register') }}" class="space-y-4">
                @csrf

                {{-- Name + Email --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                </div>

                {{-- Password --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" id="pat_password" maxlength="10"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                        <p id="pat_pass_error" class="hidden text-red-500 text-xs mt-1">Password cannot exceed 10 characters.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="patient_confirm_password" maxlength="10"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            <button type="button" onclick="togglePassword('patient_confirm_password', this)"
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

                {{-- Phone + CNIC --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Phone <span class="text-gray-400 font-normal text-xs">(03XXXXXXXXX)</span>
                        </label>
                        <input type="tel" name="phone" id="phone_input" value="{{ old('phone') }}"
                            placeholder="03001234567"
                            maxlength="11"
                            inputmode="numeric"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            CNIC <span class="text-gray-400 font-normal text-xs">(XXXXX-XXXXXXX-X)</span>
                        </label>
                        <input type="text" name="cnic" id="cnic_input" value="{{ old('cnic') }}"
                            placeholder="00000-0000000-0"
                            maxlength="15"
                            inputmode="numeric"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                </div>

                {{-- DOB + Gender --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                        <input type="date" name="dob" value="{{ old('dob') }}"
                            min="1940-01-01"
                            max="{{ date('Y-m-d', strtotime('-5 years')) }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select name="gender"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            <option value="male"   {{ old('gender') === 'male'   ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other"  {{ old('gender') === 'other'  ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                {{-- City --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <input type="text" name="city" value="{{ old('city') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                {{-- Address --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold text-sm">
                    Register as Patient
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                Already have an account?
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

// ===== DOB dropdowns → hidden input =====
function updateDOB() {
    var day   = document.getElementById('dob_day').value;
    var month = document.getElementById('dob_month').value;
    var year  = document.getElementById('dob_year').value;
    if (day && month && year) {
        document.getElementById('dob_hidden').value = year + '-' + month + '-' + day;
    } else {
        document.getElementById('dob_hidden').value = '';
    }
}

// ===== Phone — only numbers, max 11 =====
document.getElementById('phone_input').addEventListener('input', function() {
    // remove anything that is not a digit
    var digits = this.value.replace(/\D/g, '');
    // limit to 11
    if (digits.length > 11) digits = digits.slice(0, 11);
    this.value = digits;
});
document.getElementById('phone_input').addEventListener('keypress', function(e) {
    if (!/[0-9]/.test(e.key)) e.preventDefault();
});

// ===== Password — max 10 =====
document.getElementById('pat_password').addEventListener('input', function() {
    var err = document.getElementById('pat_pass_error');
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
        err.classList.remove('hidden');
    } else {
        err.classList.add('hidden');
    }
});

// ===== CNIC — auto format XXXXX-XXXXXXX-X =====
document.getElementById('cnic_input').addEventListener('input', function(e) {
    // get only digits
    var digits = this.value.replace(/\D/g, '');
    // max 13 digits total
    if (digits.length > 13) digits = digits.slice(0, 13);

    // format: 5 + dash + 7 + dash + 1
    var formatted = '';
    if (digits.length <= 5) {
        formatted = digits;
    } else if (digits.length <= 12) {
        formatted = digits.slice(0, 5) + '-' + digits.slice(5);
    } else {
        formatted = digits.slice(0, 5) + '-' + digits.slice(5, 12) + '-' + digits.slice(12);
    }
    this.value = formatted;
});
document.getElementById('cnic_input').addEventListener('keypress', function(e) {
    if (!/[0-9]/.test(e.key)) e.preventDefault();
});
</script>

@endsection
