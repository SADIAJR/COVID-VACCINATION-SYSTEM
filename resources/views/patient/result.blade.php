@extends('layouts.patient')
@section('title', __('COVID-19 Test Result'))
@section('page_title', __('Test Result'))
@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('patient.appointments.index') }}" class="text-emerald-600 hover:underline text-sm font-medium">← {{ __('Back to My Appointments') }}</a>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('COVID-19 Test Result') }}</h1>

    <div class="bg-white rounded-2xl p-6 mb-4" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.12), 0 2px 10px 0 rgba(0,0,0,0.08);">
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-gray-400 text-xs uppercase tracking-wide mb-1">{{ __('Patient Name') }}</p>
                <p class="font-semibold text-gray-800">{{ $appointment->patient->name }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-gray-400 text-xs uppercase tracking-wide mb-1">{{ __('Hospital') }}</p>
                <p class="font-semibold text-gray-800">{{ $appointment->hospital->hospitalProfile->hospital_name ?? 'N/A' }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-gray-400 text-xs uppercase tracking-wide mb-1">{{ __('Appointment Date') }}</p>
                <p class="font-semibold text-gray-800">{{ $appointment->appointment_date }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">
                <p class="text-gray-400 text-xs uppercase tracking-wide mb-1">{{ __('Vaccine') }}</p>
                <p class="font-semibold text-gray-800">{{ $appointment->vaccine->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    @if ($appointment->testResult)
        <div @class(['rounded-2xl p-6 mb-4 border-l-4','bg-red-50 border-red-500'=>$appointment->testResult->result==='positive','bg-green-50 border-green-500'=>$appointment->testResult->result==='negative','bg-yellow-50 border-yellow-500'=>$appointment->testResult->result==='pending']) style="box-shadow: 0 8px 28px 0 rgba(0,0,0,0.10);">
            <h2 class="text-lg font-bold text-gray-800 mb-3">{{ __('Test Result') }}</h2>
            <div class="grid md:grid-cols-2 gap-4 text-sm mb-3">
                <div>
                    <p class="text-gray-500 text-xs uppercase mb-1">{{ __('Result') }}</p>
                    <span @class(['px-3 py-1 rounded-full text-sm font-bold','bg-red-200 text-red-800'=>$appointment->testResult->result==='positive','bg-green-200 text-green-800'=>$appointment->testResult->result==='negative','bg-yellow-200 text-yellow-800'=>$appointment->testResult->result==='pending'])>
                        {{ __( strtoupper($appointment->testResult->result) ) }}
                    </span>
                </div>
                <div>
                    <p class="text-gray-500 text-xs uppercase mb-1">{{ __('Test Date') }}</p>
                    <p class="font-semibold text-gray-800">{{ $appointment->testResult->test_date }}</p>
                </div>
            </div>
            @if ($appointment->testResult->notes)
                <div>
                    <p class="text-gray-500 text-xs uppercase mb-1">{{ __("Doctor's Notes") }}</p>
                    <p class="text-gray-700 bg-white rounded-xl p-3 border border-gray-100" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);">{{ $appointment->testResult->notes }}</p>
                </div>
            @endif
        </div>

        <div class="bg-white rounded-2xl p-6 mb-4" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.12), 0 2px 10px 0 rgba(0,0,0,0.08);">
            <h2 class="text-lg font-bold text-gray-800 mb-3">💉 {{ __('Vaccination Suggestion') }}</h2>
            @if ($appointment->testResult->result === 'negative')
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 text-green-800" style="box-shadow: 0 4px 16px 0 rgba(22,163,74,0.15);">
                    <p class="font-semibold mb-2">{{ __('Your COVID-19 test is Negative.') }}</p>
                    <p class="text-sm">{{ __('You are eligible to receive the vaccine.') }} <strong>{{ $appointment->vaccine->name }}</strong></p>
                    <p class="text-sm mt-1"><strong>{{ $appointment->hospital->hospitalProfile->hospital_name ?? '' }}</strong></p>
                </div>
            @elseif ($appointment->testResult->result === 'positive')
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-red-800" style="box-shadow: 0 4px 16px 0 rgba(239,68,68,0.15);">
                    <p class="font-semibold mb-2">{{ __('Your COVID-19 test is Positive.') }}</p>
                    <p class="text-sm">{{ __('Vaccination is not recommended at this time.') }}</p>
                </div>
            @else
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 text-yellow-800" style="box-shadow: 0 4px 16px 0 rgba(234,179,8,0.15);">
                    <p class="font-semibold">{{ __('Your result is still pending.') }}</p>
                    <p class="text-sm mt-1">{{ __('Please wait for the hospital to update your test result.') }}</p>
                </div>
            @endif
        </div>
    @else
        <div class="bg-white rounded-2xl p-6 text-center text-gray-500" style="box-shadow: 0 8px 28px 0 rgba(0,0,0,0.08);">
            <p>{{ __('No test result available yet.') }}</p>
        </div>
    @endif

    @if ($appointment->vaccination)
        <div class="bg-emerald-50 rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.18), 0 2px 10px 0 rgba(0,0,0,0.08);">
            <h2 class="text-lg font-bold text-emerald-800 mb-3">✅ {{ __('Vaccination Record') }}</h2>
            <div class="grid md:grid-cols-3 gap-4 text-sm">
                <div class="bg-white rounded-xl p-3" style="box-shadow: 0 2px 10px 0 rgba(6,95,70,0.10);">
                    <p class="text-gray-400 text-xs uppercase mb-1">{{ __('Dose Number') }}</p>
                    <p class="font-semibold text-gray-800">{{ convertToUrduNumerals($appointment->vaccination->dose_number) }}</p>
                </div>
                <div class="bg-white rounded-xl p-3" style="box-shadow: 0 2px 10px 0 rgba(6,95,70,0.10);">
                    <p class="text-gray-400 text-xs uppercase mb-1">{{ __('Vaccination Date') }}</p>
                    <p class="font-semibold text-gray-800">{{ $appointment->vaccination->vaccination_date }}</p>
                </div>
                <div class="bg-white rounded-xl p-3" style="box-shadow: 0 2px 10px 0 rgba(6,95,70,0.10);">
                    <p class="text-gray-400 text-xs uppercase mb-1">{{ __('Batch No') }}</p>
                    <p class="font-semibold text-gray-800">{{ $appointment->vaccination->batch_no }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
