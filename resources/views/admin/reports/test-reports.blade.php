@extends('layouts.admin')
@section('title', __('Test Reports'))
@section('page_title', __('Test Reports'))
@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Test Reports') }}</h1>
    <div class="bg-white rounded-2xl p-5 mb-6" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.12);">
        <form method="GET" action="{{ route('admin.reports.test-reports') }}" class="flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Filter') }}</label>
                <select name="filter" class="border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()">
                    <option value="all"   {{ $filter==='all'   ? 'selected':'' }}>{{ __('All') }}</option>
                    <option value="date"  {{ $filter==='date'  ? 'selected':'' }}>{{ __('By Date') }}</option>
                    <option value="week"  {{ $filter==='week'  ? 'selected':'' }}>{{ __('By Week') }}</option>
                    <option value="month" {{ $filter==='month' ? 'selected':'' }}>{{ __('By Month') }}</option>
                </select>
            </div>
            @if ($filter !== 'all')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Appointment Date') }}</label>
                    <input type="date" name="date" value="{{ $date }}" class="border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition">{{ __('Search') }}</button>
            @endif
            <a href="{{ route('admin.reports.test-reports.export', ['filter'=>$filter,'date'=>$date]) }}" class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition flex items-center gap-1">{{ __('Export') }} CSV</a>
        </form>
    </div>
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.12);">
            <p class="text-2xl font-bold text-gray-700">{{ convertToUrduNumerals($results->count()) }}</p>
            <p class="text-sm text-gray-500">{{ __('Total Bookings') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.12);">
            <p class="text-2xl font-bold text-red-600">{{ convertToUrduNumerals($results->where('result','positive')->count()) }}</p>
            <p class="text-sm text-gray-500">{{ __('Positive') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.12);">
            <p class="text-2xl font-bold text-green-600">{{ convertToUrduNumerals($results->where('result','negative')->count()) }}</p>
            <p class="text-sm text-gray-500">{{ __('Negative') }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl overflow-x-auto" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">{{ __('Test Date') }}</th>
                    <th class="px-4 py-3">{{ __('Patient Name') }}</th>
                    <th class="px-4 py-3">{{ __('Phone') }} / {{ __('City') }}</th>
                    <th class="px-4 py-3">{{ __('Hospital') }}</th>
                    <th class="px-4 py-3">{{ __('Vaccine') }}</th>
                    <th class="px-4 py-3">{{ __('Result') }}</th>
                    <th class="px-4 py-3">{{ __('Doctor\'s Notes') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($results as $r)
                    @php $apt = $r->appointment; @endphp
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $r->test_date }}</td>
                        <td class="px-4 py-3">
                            <p class="font-medium">{{ $apt->patient->name ?? 'N/A' }}</p>
                            <p class="text-xs text-gray-500">{{ $apt->patient->email ?? '' }}</p>
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ $apt->patient->patientProfile->phone ?? 'N/A' }}<br>
                            <span class="text-xs">{{ $apt->patient->patientProfile->city ?? '' }}</span>
                        </td>
                        <td class="px-4 py-3">{{ $apt->hospital->hospitalProfile->hospital_name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $apt->vaccine->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">
                            <span @class(['px-2 py-1 rounded-full text-xs font-semibold','bg-red-100 text-red-700'=>$r->result==='positive','bg-green-100 text-green-700'=>$r->result==='negative','bg-yellow-100 text-yellow-700'=>$r->result==='pending'])>
                                {{ __( ucfirst($r->result) ) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600 text-xs">{{ $r->notes ?? '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="px-4 py-8 text-center text-gray-500">{{ __('No data found.') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
