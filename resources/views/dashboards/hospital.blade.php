@extends('layouts.hospital')

@section('title', __('Hospital Dashboard'))
@section('page_title', __('Hospital Dashboard'))

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ $profile->hospital_name }}</h1>
        <a href="{{ route('hospital.profile.edit') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition text-sm font-medium"
            style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);">
            {{ __('Edit Profile') }}
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4"
            style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);">
            {{ session('success') }}
        </div>
    @endif

    {{-- Hospital Info Card --}}
    <div class="bg-white rounded-2xl p-6 mb-6"
        style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 2px 10px 0 rgba(0,0,0,0.10);">
        <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0"
                style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.14);">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-4a1 1 0 011-1h4a1 1 0 011 1v4"/>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-800">{{ $profile->hospital_name }}</h2>
                <span class="inline-block mt-0.5 px-2 py-0.5 bg-green-100 text-green-700 text-xs rounded-full font-medium">{{ __('Approved') }}</span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1">{{ __('Contact Person') }}</p>
                <p class="font-medium text-gray-800">{{ $user->name }}</p>
                <p class="text-gray-500 text-xs">{{ $user->email }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1">{{ __('Phone') }}</p>
                <p class="font-medium text-gray-800">{{ $profile->phone }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1">{{ __('City') }}</p>
                <p class="font-medium text-gray-800">{{ $profile->city }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1">{{ __('License No') }}</p>
                <p class="font-medium text-gray-800">{{ $profile->license_no }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3 md:col-span-2" style="box-shadow: 0 4px 14px 0 rgba(0,0,0,0.12);">
                <p class="text-gray-500 text-xs uppercase tracking-wide mb-1">{{ __('Address') }}</p>
                <p class="font-medium text-gray-800">{{ $profile->address }}</p>
            </div>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-5 text-center"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-blue-600">{{ convertToUrduNumerals($totalAppointments) }}</p>
            <p class="text-xs text-gray-500 mt-1">{{ __('Total Appointments') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-yellow-500">{{ convertToUrduNumerals($pending) }}</p>
            <p class="text-xs text-gray-500 mt-1">{{ __('Pending') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-green-600">{{ convertToUrduNumerals($approved) }}</p>
            <p class="text-xs text-gray-500 mt-1">{{ __('Approved') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-purple-600">{{ convertToUrduNumerals($completed) }}</p>
            <p class="text-xs text-gray-500 mt-1">{{ __('Completed') }}</p>
        </div>
    </div>

    {{-- Quick Links --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <a href="{{ route('hospital.appointments.index') }}"
            class="bg-blue-600 text-white rounded-2xl p-5 text-center hover:bg-blue-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="font-semibold text-white">{{ __('Appointments') }}</p>
            <p class="text-xs text-white/70 mt-1">{{ __('Approve / Reject') }}</p>
        </a>
        <a href="{{ route('hospital.patients') }}"
            class="bg-green-600 text-white rounded-2xl p-5 text-center hover:bg-green-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-1a4 4 0 00-5-3.87M9 20H4v-1a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/>
                </svg>
            </div>
            <p class="font-semibold text-white">{{ __('Patient List') }}</p>
            <p class="text-xs text-white/70 mt-1">{{ __('Approved patients') }}</p>
        </a>
        <a href="{{ route('hospital.vaccines.index') }}"
            class="bg-purple-600 text-white rounded-2xl p-5 text-center hover:bg-purple-700 transition"
            style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <p class="font-semibold text-white">{{ __('Manage Vaccines') }}</p>
            <p class="text-xs text-white/70 mt-1">{{ __('Stock & availability') }}</p>
        </a>
    </div>

    {{-- Reviews Section --}}
    <div class="bg-white rounded-2xl p-6 mt-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.10);">
        <h2 class="text-lg font-bold text-gray-800 mb-4">⭐ {{ __('Patient Reviews') }}</h2>

        @if($reviews->isEmpty())
            <div class="text-center py-10 text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <p class="text-sm">{{ __('No reviews yet') }}</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($reviews as $review)
                <div class="border border-gray-100 rounded-xl p-4" style="box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                    <div class="flex items-start justify-between gap-3">
                        {{-- Avatar + Name + Date --}}
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-sm flex-shrink-0">
                                {{ strtoupper(substr($review->user->name ?? 'P', 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm">{{ $review->user->name ?? __('Unknown') }}</p>
                                <p class="text-xs text-gray-400">{{ $review->created_at->translatedFormat(app()->getLocale() === 'ur' ? 'd M Y، h:i A' : 'd M Y, h:i A') }}</p>
                            </div>
                        </div>
                        {{-- Stars --}}
                        <div class="flex gap-0.5 flex-shrink-0">
                            @for($s = 1; $s <= 5; $s++)
                                <span style="font-size:18px; color:{{ $s <= $review->stars ? '#f59e0b' : '#d1d5db' }};">&#9733;</span>
                            @endfor
                        </div>
                    </div>
                    @if($review->message)
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">{{ $review->message }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
