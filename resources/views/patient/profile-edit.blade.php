@extends('layouts.patient')
@section('title', __('Edit Profile'))
@section('page_title', __('Edit Profile'))
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('patient.dashboard') }}" class="text-emerald-600 hover:underline text-sm font-medium">← {{ __('Back to Profile') }}</a>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Edit Profile') }}</h1>
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(239,68,68,0.15);">
            <ul class="list-disc list-inside text-sm">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.13), 0 2px 10px 0 rgba(0,0,0,0.08);">
        <form method="POST" action="{{ route('patient.profile.update') }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Full Name') }}</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Phone') }}</label>
                    <input type="number" name="phone" value="{{ old('phone', $user->patientProfile->phone ?? '') }}"
                        maxlength="11" minlength="11" pattern="\d{11}"
                        oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > 11) this.value = this.value.slice(0,11);"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        placeholder="03XXXXXXXXX"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                    <p class="text-xs text-gray-400 mt-1">11 digits only (e.g. 03001234567)</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Date of Birth') }}</label>
                    <input type="date" name="dob" value="{{ old('dob', $user->patientProfile->dob ?? '') }}" min="1940-01-01" max="{{ date('Y-m-d', strtotime('-5 years')) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Gender') }}</label>
                <select name="gender" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                    @foreach (['male' => 'Male', 'female' => 'Female', 'other' => 'Other'] as $val => $label)
                        <option value="{{ $val }}" {{ old('gender', $user->patientProfile->gender ?? '') === $val ? 'selected' : '' }}>{{ __($label) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('City') }}</label>
                <input type="text" name="city" value="{{ old('city', $user->patientProfile->city ?? '') }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Address') }}</label>
                <textarea name="address" rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">{{ old('address', $user->patientProfile->address ?? '') }}</textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-emerald-600 text-white px-6 py-2.5 rounded-xl hover:bg-emerald-700 transition text-sm font-medium" style="box-shadow: 0 6px 20px 0 rgba(6,95,70,0.35);">{{ __('Save Changes') }}</button>
                <a href="{{ route('patient.dashboard') }}" class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-xl hover:bg-gray-200 transition text-sm font-medium" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.08);">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
