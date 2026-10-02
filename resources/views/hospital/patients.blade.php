@extends('layouts.hospital')
@section('title', __('Patient List'))
@section('page_title', __('Patient List'))
@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ __('Patient List') }}</h1>
    <p class="text-gray-500 mb-6 text-sm">{{ __('Approved patients') }}</p>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4">{{ session('success') }}</div>
    @endif
    <div class="bg-white rounded-2xl overflow-x-auto" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">{{ __('Patient Name') }}</th>
                    <th class="px-4 py-3">{{ __('Phone') }} / {{ __('City') }}</th>
                    <th class="px-4 py-3">{{ __('Date of Birth') }} / {{ __('Gender') }}</th>
                    <th class="px-4 py-3">{{ __('Vaccine') }}</th>
                    <th class="px-4 py-3">{{ __('Appointment Date') }}</th>
                    <th class="px-4 py-3">{{ __('Test Result') }}</th>
                    <th class="px-4 py-3">{{ __('Vaccination Date') }}</th>
                    <th class="px-4 py-3">{{ __('Status') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $apt)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <p class="font-semibold text-gray-800">{{ $apt->patient->name }}</p>
                            <p class="text-xs text-gray-500">{{ $apt->patient->email }}</p>
                        </td>
                        <td class="px-4 py-3 text-gray-700">
                            {{ $apt->patient->patientProfile->phone ?? 'N/A' }}<br>
                            <span class="text-xs text-gray-500">{{ $apt->patient->patientProfile->city ?? '' }}</span>
                        </td>
                        <td class="px-4 py-3 text-gray-700 text-xs">
                            {{ $apt->patient->patientProfile->dob ?? 'N/A' }}<br>
                            {{ $apt->patient->patientProfile->gender ? __( ucfirst($apt->patient->patientProfile->gender) ) : '' }}
                        </td>
                        <td class="px-4 py-3 text-gray-700">{{ $apt->vaccine->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-gray-700">{{ $apt->appointment_date }}</td>
                        <td class="px-4 py-3">
                            @if ($apt->testResult)
                                <span @class(['px-2 py-1 rounded-full text-xs font-semibold','bg-red-100 text-red-700'=>$apt->testResult->result==='positive','bg-green-100 text-green-700'=>$apt->testResult->result==='negative','bg-yellow-100 text-yellow-700'=>$apt->testResult->result==='pending'])>
                                    {{ __( ucfirst($apt->testResult->result) ) }}
                                </span>
                                @if ($apt->testResult->notes)
                                    <p class="text-xs text-gray-500 mt-1">{{ Str::limit($apt->testResult->notes, 40) }}</p>
                                @endif
                            @else
                                <span class="text-gray-400 text-xs">{{ __('Not available') }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if ($apt->vaccination)
                                <span class="text-green-700 text-xs font-semibold">
                                    {{ __('Dose Number') }} {{ convertToUrduNumerals($apt->vaccination->dose_number) }}<br>
                                    {{ $apt->vaccination->vaccination_date }}
                                </span>
                            @else
                                <span class="text-gray-400 text-xs">{{ __('Not available') }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <span @class(['px-2 py-1 rounded-full text-xs font-semibold','bg-green-100 text-green-800'=>$apt->status==='approved','bg-blue-100 text-blue-800'=>$apt->status==='completed'])>
                                {{ __( ucfirst($apt->status) ) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="px-4 py-8 text-center text-gray-500">{{ __('No patients found.') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
