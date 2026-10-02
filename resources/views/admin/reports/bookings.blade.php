@extends('layouts.admin')
@section('title', __('Bookings'))
@section('page_title', __('Bookings'))
@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Bookings') }}</h1>
    <div class="flex flex-wrap gap-3 mb-6">
        @foreach ([''=>'All','pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected','completed'=>'Completed'] as $s=>$lbl)
            <a href="{{ route('admin.reports.bookings', $s ? ['status'=>$s] : []) }}"
                @class(['px-4 py-2 rounded-xl text-sm font-medium','bg-blue-600 text-white'=>$status===$s,'bg-white border text-gray-700 hover:bg-gray-50'=>$status!==$s])>
                {{ __($lbl) }} ({{ convertToUrduNumerals($s ? $bookings->where('status',$s)->count() : $bookings->count()) }})
            </a>
        @endforeach
    </div>
    <div class="bg-white rounded-2xl overflow-x-auto" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left text-sm min-w-[700px]">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">{{ __('Patient Name') }}</th>
                    <th class="px-4 py-3">{{ __('Hospital') }}</th>
                    <th class="px-4 py-3">{{ __('Vaccine') }}</th>
                    <th class="px-4 py-3">{{ __('Appointment Date') }}</th>
                    <th class="px-4 py-3">{{ __('Test Result') }}</th>
                    <th class="px-4 py-3">{{ __('Status') }}</th>
                </tr>
            </thead>
            <tbody>
                @php $list = $status ? $bookings->where('status',$status) : $bookings; @endphp
                @forelse ($list as $booking)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-500">{{ convertToUrduNumerals($booking->id) }}</td>
                        <td class="px-4 py-3">
                            <p class="font-medium">{{ $booking->patient->name ?? 'N/A' }}</p>
                            <p class="text-xs text-gray-500">{{ $booking->patient->patientProfile->phone ?? '' }}</p>
                        </td>
                        <td class="px-4 py-3">{{ $booking->hospital->hospitalProfile->hospital_name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $booking->vaccine->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $booking->appointment_date }}</td>
                        <td class="px-4 py-3">
                            @if ($booking->testResult)
                                <span @class(['px-2 py-1 rounded-full text-xs font-semibold','bg-red-100 text-red-700'=>$booking->testResult->result==='positive','bg-green-100 text-green-700'=>$booking->testResult->result==='negative','bg-yellow-100 text-yellow-700'=>$booking->testResult->result==='pending'])>
                                    {{ __( ucfirst($booking->testResult->result) ) }}
                                </span>
                            @else
                                <span class="text-gray-400 text-xs">{{ __('Not available') }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <span @class(['px-2 py-1 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$booking->status==='pending','bg-green-100 text-green-800'=>$booking->status==='approved','bg-red-100 text-red-800'=>$booking->status==='rejected','bg-blue-100 text-blue-800'=>$booking->status==='completed'])>
                                {{ __( ucfirst($booking->status) ) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="px-4 py-8 text-center text-gray-500">{{ __('No data found.') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
