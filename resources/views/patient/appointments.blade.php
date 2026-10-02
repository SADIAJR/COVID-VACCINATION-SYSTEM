@extends('layouts.patient')
@section('title', __('My Appointments'))
@section('page_title', __('My Appointments'))
@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ __('My Appointments') }}</h1>
        <a href="{{ route('patient.search-hospitals') }}"
            class="bg-emerald-600 text-white px-4 py-2 rounded-xl hover:bg-emerald-700 transition text-sm font-medium"
            style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);">
            {{ __('Book New Appointment') }}
        </a>
    </div>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);">
            {{ session('success') }}
        </div>
    @endif
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-yellow-50 rounded-xl p-4 text-center border border-yellow-100" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-2xl font-bold text-yellow-600">{{ convertToUrduNumerals($appointments->where('status','pending')->count()) }}</p>
            <p class="text-sm text-yellow-600 font-medium mt-0.5">{{ __('Pending') }}</p>
        </div>
        <div class="bg-green-50 rounded-xl p-4 text-center border border-green-100" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-2xl font-bold text-green-600">{{ convertToUrduNumerals($appointments->where('status','approved')->count()) }}</p>
            <p class="text-sm text-green-600 font-medium mt-0.5">{{ __('Approved') }}</p>
        </div>
        <div class="bg-red-50 rounded-xl p-4 text-center border border-red-100" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-2xl font-bold text-red-600">{{ convertToUrduNumerals($appointments->where('status','rejected')->count()) }}</p>
            <p class="text-sm text-red-600 font-medium mt-0.5">{{ __('Rejected') }}</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 text-center border border-blue-100" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-2xl font-bold text-blue-600">{{ convertToUrduNumerals($appointments->where('status','completed')->count()) }}</p>
            <p class="text-sm text-blue-600 font-medium mt-0.5">{{ __('Completed') }}</p>
        </div>
    </div>
    <div class="space-y-4">
        @forelse ($appointments as $apt)
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 2px 10px 0 rgba(0,0,0,0.10);">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">{{ $apt->hospital->hospitalProfile->hospital_name ?? 'N/A' }}</h2>
                        <p class="text-gray-500 text-sm">{{ $apt->hospital->hospitalProfile->address ?? '' }}, {{ $apt->hospital->hospitalProfile->city ?? '' }}</p>
                        <p class="text-gray-500 text-sm">{{ __('Phone') }}: {{ $apt->hospital->hospitalProfile->phone ?? 'N/A' }}</p>
                    </div>
                    <span @class(['px-3 py-1 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$apt->status==='pending','bg-green-100 text-green-800'=>$apt->status==='approved','bg-red-100 text-red-800'=>$apt->status==='rejected','bg-blue-100 text-blue-800'=>$apt->status==='completed'])>
                        {{ __( ucfirst($apt->status) ) }}
                    </span>
                </div>
                <div class="grid md:grid-cols-3 gap-3 text-sm border-t pt-3">
                    <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        <p class="text-gray-400 text-xs uppercase mb-1">{{ __('Vaccine') }}</p>
                        <p class="font-medium text-gray-800">{{ $apt->vaccine->name ?? 'N/A' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        <p class="text-gray-400 text-xs uppercase mb-1">{{ __('Appointment Date') }}</p>
                        <p class="font-medium text-gray-800">{{ $apt->appointment_date }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        <p class="text-gray-400 text-xs uppercase mb-1">{{ __('Test Result') }}</p>
                        @if ($apt->testResult)
                            <span @class(['px-2 py-0.5 rounded-lg text-xs font-semibold','bg-red-100 text-red-700'=>$apt->testResult->result==='positive','bg-green-100 text-green-700'=>$apt->testResult->result==='negative','bg-yellow-100 text-yellow-700'=>$apt->testResult->result==='pending'])>{{ __( ucfirst($apt->testResult->result) ) }}</span>
                        @else
                            <p class="text-gray-400 text-xs">{{ __('Not available') }}</p>
                        @endif
                    </div>
                </div>
                @if ($apt->vaccination)
                    <div class="mt-3 text-sm border-t pt-3 text-green-700 bg-green-50 rounded-xl p-3" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.10);">
                        💉 {{ __('Vaccination given') }} — {{ __('Dose Number') }} {{ convertToUrduNumerals($apt->vaccination->dose_number) }} — {{ $apt->vaccination->vaccination_date }} (Batch: {{ $apt->vaccination->batch_no }})
                    </div>
                @endif
                @if ($apt->testResult)
                    <div class="mt-3 flex gap-2">
                        <a href="{{ route('patient.result', $apt->id) }}" class="bg-blue-600 text-white px-4 py-1.5 rounded-xl text-sm hover:bg-blue-700 transition" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.20);">{{ __('View Full Result') }}</a>
                        @if (in_array($apt->status, ['approved','completed']))
                            <a href="{{ route('patient.vaccine-card', $apt->id) }}" class="bg-emerald-600 text-white px-4 py-1.5 rounded-xl text-sm hover:bg-emerald-700 transition" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.20);">💉 {{ __('Vaccination Card') }}</a>
                        @endif
                    </div>
                @elseif (in_array($apt->status, ['approved','completed']))
                    <div class="mt-3">
                        <a href="{{ route('patient.vaccine-card', $apt->id) }}" class="bg-emerald-600 text-white px-4 py-1.5 rounded-xl text-sm hover:bg-emerald-700 transition inline-flex items-center gap-1" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.20);">💉 {{ __('Vaccination Card') }}</a>
                    </div>
                @endif
            </div>
        @empty
            <div class="bg-white rounded-2xl p-10 text-center text-gray-500" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18);">
                <p class="text-lg mb-2">{{ __('No appointments yet.') }}</p>
                <a href="{{ route('patient.search-hospitals') }}" class="text-emerald-600 hover:underline font-medium">{{ __('Search hospitals and book your first appointment') }} →</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
