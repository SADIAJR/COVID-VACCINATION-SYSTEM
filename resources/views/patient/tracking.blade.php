@extends('layouts.patient')
@section('title', __('Vaccination Tracking'))
@section('page_title', __('Vaccination Tracking'))
@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Vaccination Tracking') }}</h1>

    {{-- Vaccination History --}}
    <div class="bg-white rounded-2xl p-6 mb-6" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.12), 0 2px 10px 0 rgba(0,0,0,0.08);">
        <h2 class="text-xl font-bold text-gray-800 mb-4">💉 {{ __('Vaccination History') }}</h2>
        @php $vaccinated = $appointments->filter(fn($a) => $a->vaccination !== null); @endphp
        @if ($vaccinated->isEmpty())
            <p class="text-gray-500 text-sm">{{ __('No vaccinations recorded yet.') }}</p>
        @else
            <div class="relative border-l-2 border-emerald-200 ml-3 space-y-6">
                @foreach ($vaccinated as $apt)
                    <div class="relative pl-6">
                        <span class="absolute -left-2 top-1 w-4 h-4 rounded-full bg-emerald-600 border-2 border-white" style="box-shadow: 0 2px 6px 0 rgba(6,95,70,0.30);"></span>
                        <div class="bg-emerald-50 rounded-xl p-4" style="box-shadow: 0 4px 16px 0 rgba(6,95,70,0.14);">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ __('Dose Number') }} {{ convertToUrduNumerals($apt->vaccination->dose_number) }} — {{ $apt->vaccine->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $apt->hospital->hospitalProfile->hospital_name ?? 'N/A' }}</p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ __('Vaccination Date') }}: {{ $apt->vaccination->vaccination_date }} |
                                        {{ __('Batch No') }}: {{ $apt->vaccination->batch_no }}
                                    </p>
                                </div>
                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full font-semibold">{{ __('Done') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Appointment History --}}
    <div class="bg-white rounded-2xl p-6 mb-6" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.12), 0 2px 10px 0 rgba(0,0,0,0.08);">
        <h2 class="text-xl font-bold text-gray-800 mb-4">📅 {{ __('Appointment History') }}</h2>
        @forelse ($appointments as $apt)
            <div class="flex justify-between items-center border-b last:border-0 py-3 text-sm">
                <div>
                    <p class="font-medium text-gray-800">{{ $apt->hospital->hospitalProfile->hospital_name ?? 'N/A' }}</p>
                    <p class="text-gray-500 text-xs">{{ $apt->vaccine->name }} — {{ $apt->appointment_date }}</p>
                </div>
                <div class="flex items-center gap-2">
                    @if ($apt->testResult)
                        <span @class(['px-2 py-0.5 rounded-lg text-xs font-semibold','bg-red-100 text-red-700'=>$apt->testResult->result==='positive','bg-green-100 text-green-700'=>$apt->testResult->result==='negative','bg-yellow-100 text-yellow-700'=>$apt->testResult->result==='pending'])>
                            {{ __( ucfirst($apt->testResult->result) ) }}
                        </span>
                    @endif
                    <span @class(['px-2 py-0.5 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$apt->status==='pending','bg-green-100 text-green-800'=>$apt->status==='approved','bg-red-100 text-red-800'=>$apt->status==='rejected','bg-blue-100 text-blue-800'=>$apt->status==='completed'])>
                        {{ __( ucfirst($apt->status) ) }}
                    </span>
                    @if ($apt->testResult)
                        <a href="{{ route('patient.result', $apt->id) }}" class="text-emerald-600 hover:underline text-xs font-medium">{{ __('View') }}</a>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-sm">{{ __('No appointment history yet.') }}</p>
        @endforelse
    </div>

    {{-- Safety Guidelines --}}
    <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.12), 0 2px 10px 0 rgba(0,0,0,0.08);">
        <h2 class="text-xl font-bold text-gray-800 mb-4">🛡️ {{ __('COVID-19 Safety Guidelines') }}</h2>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="bg-blue-50 rounded-xl p-4 dark-box" style="box-shadow: 0 4px 18px 0 rgba(59,130,246,0.18);">
                <h3 class="font-semibold text-blue-800 mb-2">😷 {{ __('Wear a Mask') }}</h3>
                <p class="text-sm text-gray-700">{{ __('Always wear a well-fitted mask in public spaces, especially in crowded or poorly ventilated areas.') }}</p>
            </div>
            <div class="bg-green-50 rounded-xl p-4 dark-box" style="box-shadow: 0 4px 18px 0 rgba(22,163,74,0.18);">
                <h3 class="font-semibold text-green-800 mb-2">🤲 {{ __('Hand Hygiene') }}</h3>
                <p class="text-sm text-gray-700">{{ __('Wash hands frequently with soap for at least 20 seconds or use an alcohol-based hand sanitizer.') }}</p>
            </div>
            <div class="bg-yellow-50 rounded-xl p-4 dark-box" style="box-shadow: 0 4px 18px 0 rgba(234,179,8,0.18);">
                <h3 class="font-semibold text-yellow-800 mb-2">📏 {{ __('Social Distancing') }}</h3>
                <p class="text-sm text-gray-700">{{ __('Maintain at least 6 feet distance from others who are not from your household.') }}</p>
            </div>
            <div class="bg-purple-50 rounded-xl p-4 dark-box" style="box-shadow: 0 4px 18px 0 rgba(147,51,234,0.18);">
                <h3 class="font-semibold text-purple-800 mb-2">💉 {{ __('Get Vaccinated') }}</h3>
                <p class="text-sm text-gray-700">{{ __('COVID-19 vaccines are safe and effective. Getting vaccinated protects you and those around you.') }}</p>
            </div>
            <div class="bg-red-50 rounded-xl p-4 dark-box" style="box-shadow: 0 4px 18px 0 rgba(239,68,68,0.18);">
                <h3 class="font-semibold text-red-800 mb-2">🏠 {{ __('Isolate if Positive') }}</h3>
                <p class="text-sm text-gray-700">{{ __('If you test positive, isolate immediately for at least 5-7 days and inform close contacts.') }}</p>
            </div>
            <div class="bg-indigo-50 rounded-xl p-4 dark-box" style="box-shadow: 0 4px 18px 0 rgba(99,102,241,0.18);">
                <h3 class="font-semibold text-indigo-800 mb-2">🌬️ {{ __('Ventilation') }}</h3>
                <p class="text-sm text-gray-700">{{ __('Ensure good air circulation in indoor spaces by opening windows and using air filtration systems.') }}</p>
            </div>
        </div>
        <div class="mt-4 bg-gray-50 rounded-xl p-3 text-xs text-gray-600 border border-gray-200 dark-box" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.06);">
            ℹ️ Source: WHO — <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public" target="_blank" class="text-blue-600 hover:underline">who.int</a>
        </div>

<style>
body.dark-theme .dark-box {
    background-color: #1e1e2e !important;
    box-shadow: none !important;
}
body.dark-theme .dark-box h3 {
    color: #e2e8f0 !important;
}
body.dark-theme .dark-box p {
    color: #94a3b8 !important;
}
body.dark-theme .dark-box.border {
    border-color: #2d2d44 !important;
}
</style>
    </div>
</div>
@endsection
