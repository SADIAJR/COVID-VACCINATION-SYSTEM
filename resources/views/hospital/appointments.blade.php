@extends('layouts.hospital')
@section('title', __('Appointments'))
@section('page_title', __('Appointments'))
@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Appointments') }}</h1>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4">{{ session('success') }}</div>
    @endif
    <div class="flex flex-wrap gap-2 mb-6">
        @foreach (['all'=>'All','pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected','completed'=>'Completed'] as $val=>$label)
            <a href="{{ request()->fullUrlWithQuery(['status'=>$val==='all'?'':$val]) }}"
                @class(['px-4 py-2 rounded-xl text-sm font-medium','bg-blue-600 text-white'=>(request('status','')=== ($val==='all'?'':$val)),'bg-white border text-gray-700 hover:bg-gray-50'=>(request('status','')!==($val==='all'?'':$val))])>
                {{ __($label) }} ({{ convertToUrduNumerals($val==='all'?$appointments->count():$appointments->where('status',$val)->count()) }})
            </a>
        @endforeach
    </div>
    @php $filtered = request('status') ? $appointments->where('status', request('status')) : $appointments; @endphp
    <div class="space-y-6">
        @forelse ($filtered as $apt)
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">{{ $apt->patient->name }}</h2>
                        <p class="text-sm text-gray-500">
                            📞 {{ $apt->patient->patientProfile->phone ?? 'N/A' }} &nbsp;|&nbsp;
                            📍 {{ $apt->patient->patientProfile->city ?? 'N/A' }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ __('Date of Birth') }}: {{ $apt->patient->patientProfile->dob ?? 'N/A' }} &nbsp;|&nbsp;
                            {{ __('Gender') }}: {{ $apt->patient->patientProfile->gender ? __( ucfirst($apt->patient->patientProfile->gender) ) : 'N/A' }}
                        </p>
                    </div>
                    <span @class(['px-3 py-1 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$apt->status==='pending','bg-green-100 text-green-800'=>$apt->status==='approved','bg-red-100 text-red-800'=>$apt->status==='rejected','bg-blue-100 text-blue-800'=>$apt->status==='completed'])>
                        {{ __( ucfirst($apt->status) ) }}
                    </span>
                </div>
                <div class="grid md:grid-cols-2 gap-3 text-sm bg-gray-50 rounded-xl p-3 mb-4">
                    <div>
                        <span class="text-gray-500 text-xs uppercase">{{ __('Vaccine') }}</span>
                        <p class="font-medium">{{ $apt->vaccine->name ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500 text-xs uppercase">{{ __('Appointment Date') }}</span>
                        <p class="font-medium">{{ $apt->appointment_date }}</p>
                    </div>
                </div>
                @if ($apt->status === 'pending')
                    <div class="flex gap-3 mb-4 pb-4 border-b">
                        <form method="POST" action="{{ route('hospital.appointments.accept', $apt) }}">
                            @csrf
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition text-sm" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.18);">✓ {{ __('Approve') }}</button>
                        </form>
                        <form method="POST" action="{{ route('hospital.appointments.reject', $apt) }}">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700 transition text-sm" onclick="return confirm('{{ __('Reject') }}?')" style="box-shadow: 0 4px 12px 0 rgba(0,0,0,0.18);">✗ {{ __('Reject') }}</button>
                        </form>
                    </div>
                @endif
                @if (in_array($apt->status, ['approved','completed']))
                    <div class="mb-4 pb-4 border-b">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">
                            🧪 {{ __('Test Result') }}
                            @if ($apt->testResult)
                                <span class="ml-2 px-2 py-0.5 rounded text-xs {{ $apt->testResult->result==='positive'?'bg-red-100 text-red-700':($apt->testResult->result==='negative'?'bg-green-100 text-green-700':'bg-yellow-100 text-yellow-700') }}">
                                    {{ __( ucfirst($apt->testResult->result) ) }}
                                </span>
                            @endif
                        </h3>
                        <form method="POST" action="{{ route('hospital.appointments.test-result', $apt) }}" class="flex flex-wrap gap-3 items-end">
                            @csrf
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">{{ __('Result') }}</label>
                                <select name="result" class="border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @foreach (['pending'=>'Pending','negative'=>'Negative','positive'=>'Positive'] as $val=>$lbl)
                                        <option value="{{ $val }}" {{ ($apt->testResult->result??'pending')===$val?'selected':'' }}>{{ __($lbl) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">{{ __('Test Date') }}</label>
                                <input type="date" name="test_date" value="{{ $apt->testResult->test_date ?? now()->toDateString() }}" class="border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="flex-1 min-w-[180px]">
                                <label class="block text-xs text-gray-600 mb-1">{{ __("Doctor's Notes") }}</label>
                                <input type="text" name="notes" value="{{ $apt->testResult->notes ?? '' }}" placeholder="..." class="w-full border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition text-sm">{{ __('Update') }}</button>
                        </form>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">
                            💉 {{ __('Vaccination Record') }}
                            @if ($apt->vaccination)
                                <span class="ml-2 px-2 py-0.5 rounded text-xs bg-green-100 text-green-700">
                                    {{ __('Dose Number') }} {{ convertToUrduNumerals($apt->vaccination->dose_number) }} — {{ $apt->vaccination->vaccination_date }}
                                </span>
                            @endif
                        </h3>
                        <form method="POST" action="{{ route('hospital.appointments.vaccination-status', $apt) }}" class="flex flex-wrap gap-3 items-end">
                            @csrf
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">{{ __('Dose Number') }}</label>
                                <input type="number" name="dose_number" min="1" max="5" value="{{ $apt->vaccination->dose_number ?? 1 }}" class="w-24 border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-600 mb-1">{{ __('Vaccination Date') }}</label>
                                <input type="date" name="vaccination_date" value="{{ $apt->vaccination->vaccination_date ?? now()->toDateString() }}" class="border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-xl hover:bg-purple-700 transition text-sm">{{ __('Update') }}</button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <div class="bg-white rounded-2xl p-10 text-center text-gray-500" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.10);">{{ __('No appointments found.') }}</div>
        @endforelse
    </div>
</div>
@endsection
