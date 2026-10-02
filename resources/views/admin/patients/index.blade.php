@extends('layouts.admin')
@section('title', __('All Patients'))
@section('page_title', __('Patients'))
@section('content')
<div>
    <div class="flex items-center gap-3 mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ __('All Patients') }}</h1>
        <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1 rounded-full">
            {{ convertToUrduNumerals($patients->count()) }}
        </span>
    </div>
    <div class="space-y-4">
        @forelse ($patients as $patient)
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.08);">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">{{ $patient->name }}</h2>
                        <p class="text-gray-600 text-sm">{{ $patient->email }}</p>
                        @if ($patient->patientProfile)
                            <p class="text-gray-600 text-sm">
                                {{ __('Phone') }}: {{ $patient->patientProfile->phone }} |
                                {{ __('City') }}: {{ $patient->patientProfile->city }}
                            </p>
                        @endif
                    </div>
                </div>
                @if ($patient->appointments->isEmpty())
                    <p class="text-gray-500 text-sm">{{ __('No appointments yet.') }}</p>
                @else
                    <div class="border-t pt-3 mt-3 space-y-2">
                        @foreach ($patient->appointments as $appointment)
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-700">
                                    {{ $appointment->hospital->hospitalProfile->hospital_name ?? 'N/A' }}
                                    — {{ $appointment->vaccine->name ?? 'N/A' }}
                                    ({{ $appointment->appointment_date }})
                                    @if ($appointment->vaccination)
                                        — {{ __('Dose Number') }} {{ convertToUrduNumerals($appointment->vaccination->dose_number) }}
                                    @endif
                                </span>
                                <span @class(['px-2 py-1 rounded-lg text-xs font-medium','bg-yellow-200 text-yellow-800'=>$appointment->status==='pending','bg-green-200 text-green-800'=>$appointment->status==='approved','bg-red-200 text-red-800'=>$appointment->status==='rejected','bg-blue-200 text-blue-800'=>$appointment->status==='completed'])>
                                    {{ __( ucfirst($appointment->status) ) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <div class="bg-white rounded-2xl p-8 text-center text-gray-500" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.10);">
                {{ __('No patients found.') }}
            </div>
        @endforelse
    </div>
</div>
@endsection
