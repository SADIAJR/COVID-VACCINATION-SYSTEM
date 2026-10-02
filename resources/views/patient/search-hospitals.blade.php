@extends('layouts.patient')
@section('title', __('Search Hospitals'))
@section('page_title', __('Search Hospitals'))
@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-1">{{ __('Search Hospitals') }}</h1>
    <p class="text-gray-500 mb-6 text-sm">{{ __('Search for COVID-19 test and vaccination hospitals near you.') }}</p>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);">
            <ul class="list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form method="GET" action="{{ route('patient.search-hospitals') }}" class="mb-6">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="{{ __('Search by hospital name or city...') }}"
                class="flex-1 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-400 text-sm bg-white"
                style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.12);">
            <button type="submit" class="bg-emerald-600 text-white px-6 py-3 rounded-xl hover:bg-emerald-700 transition font-medium text-sm" style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.22);">{{ __('Search') }}</button>
            @if(request('search'))
                <a href="{{ route('patient.search-hospitals') }}" class="bg-gray-100 text-gray-700 px-4 py-3 rounded-xl hover:bg-gray-200 transition text-sm flex items-center" style="box-shadow: 0 3px 10px 0 rgba(0,0,0,0.12);">{{ __('Clear') }}</a>
            @endif
        </div>
    </form>
    @if (request('search'))
        <p class="text-sm text-gray-500 mb-4">{{ convertToUrduNumerals($hospitals->count()) }} {{ __('hospital(s) found') }}</p>
    @endif
    <div class="space-y-4">
        @forelse ($hospitals as $hospital)
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18), 0 2px 10px 0 rgba(0,0,0,0.10);">
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-800">{{ $hospital->hospital_name }}</h2>
                    <p class="text-gray-500 text-sm mt-1">📍 {{ $hospital->address }}, {{ $hospital->city }}</p>
                    <p class="text-gray-500 text-sm">📞 {{ $hospital->phone }}</p>
                    <span class="inline-block mt-2 bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full font-semibold">✓ {{ __('Approved') }}</span>
                </div>
                <form method="POST" action="{{ route('patient.book-appointment') }}" class="border-t pt-4 flex flex-wrap gap-3 items-end">
                    @csrf
                    <input type="hidden" name="hospital_id" value="{{ $hospital->user_id }}">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">{{ __('Select Vaccine') }}</label>
                        <select name="vaccine_id" class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.10);">
                            @foreach ($vaccines as $vaccine)
                                <option value="{{ $vaccine->id }}">{{ $vaccine->name }} ({{ __('Stock') }}: {{ convertToUrduNumerals($vaccine->stock) }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">{{ __('Appointment Date') }}</label>
                        <input type="date" name="appointment_date" min="{{ date('Y-m-d') }}" class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" style="box-shadow: 0 2px 8px 0 rgba(0,0,0,0.10);">
                    </div>
                    <button type="submit" class="bg-emerald-600 text-white px-5 py-2 rounded-xl hover:bg-emerald-700 transition text-sm font-medium" style="box-shadow: 0 6px 18px 0 rgba(0,0,0,0.22);">{{ __('Book Appointment') }}</button>
                </form>
            </div>
        @empty
            <div class="bg-white rounded-2xl p-10 text-center text-gray-500" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18);">
                <p class="text-lg">{{ __('No approved hospitals available.') }}</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
