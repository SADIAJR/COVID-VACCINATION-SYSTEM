@extends('layouts.admin')
@section('title', __('All Hospitals'))
@section('page_title', __('Hospitals'))
@section('content')
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('All Hospitals') }}</h1>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4">{{ session('success') }}</div>
    @endif
    <div class="flex gap-3 mb-6 flex-wrap">
        <a href="{{ request()->fullUrlWithQuery(['status' => '']) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 border hover:bg-gray-50' }}">
            {{ __('All') }} ({{ convertToUrduNumerals($hospitals->count()) }})
        </a>
        <a href="{{ request()->fullUrlWithQuery(['status' => 'pending']) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium {{ request('status') === 'pending' ? 'bg-yellow-500 text-white' : 'bg-white text-gray-700 border hover:bg-gray-50' }}">
            {{ __('Pending') }} ({{ convertToUrduNumerals($hospitals->where('status', 'pending')->count()) }})
        </a>
        <a href="{{ request()->fullUrlWithQuery(['status' => 'approved']) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium {{ request('status') === 'approved' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border hover:bg-gray-50' }}">
            {{ __('Approved') }} ({{ convertToUrduNumerals($hospitals->where('status', 'approved')->count()) }})
        </a>
        <a href="{{ request()->fullUrlWithQuery(['status' => 'rejected']) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium {{ request('status') === 'rejected' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border hover:bg-gray-50' }}">
            {{ __('Rejected') }} ({{ convertToUrduNumerals($hospitals->where('status', 'rejected')->count()) }})
        </a>
    </div>
    <div class="space-y-4">
        @php $filtered = request('status') ? $hospitals->where('status', request('status')) : $hospitals; @endphp
        @forelse ($filtered as $hospital)
            <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14), 0 2px 8px 0 rgba(0,0,0,0.08);">
                <div class="flex justify-between items-start">
                    <div class="space-y-1">
                        <h2 class="text-lg font-bold text-gray-800">{{ $hospital->hospital_name }}</h2>
                        <p class="text-gray-600 text-sm">
                            <span class="font-medium">{{ __('City') }}:</span> {{ $hospital->city }}
                            &nbsp;|&nbsp;
                            <span class="font-medium">{{ __('Phone') }}:</span> {{ $hospital->phone }}
                        </p>
                        <p class="text-gray-600 text-sm"><span class="font-medium">{{ __('Address') }}:</span> {{ $hospital->address }}</p>
                        <p class="text-gray-600 text-sm"><span class="font-medium">{{ __('License No') }}:</span> {{ $hospital->license_no }}</p>
                        @if ($hospital->user)
                            <p class="text-gray-600 text-sm"><span class="font-medium">{{ __('Email') }}:</span> {{ $hospital->user->email }}</p>
                        @endif
                        @if (isset($hospital->cnic))
                            <p class="text-gray-600 text-sm"><span class="font-medium">{{ __('CNIC') }}:</span> {{ $hospital->cnic }}</p>
                        @endif
                    </div>
                    <div class="flex flex-col items-end gap-2">
                        <span @class(['px-3 py-1 rounded-full text-xs font-semibold','bg-yellow-100 text-yellow-800'=>$hospital->status==='pending','bg-green-100 text-green-800'=>$hospital->status==='approved','bg-red-100 text-red-800'=>$hospital->status==='rejected'])>
                            {{ __( ucfirst($hospital->status) ) }}
                        </span>
                        <div class="flex gap-2 mt-2">
                            @if ($hospital->status !== 'approved')
                                <form method="POST" action="{{ route('admin.approve-hospital', $hospital) }}">
                                    @csrf
                                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-green-700 transition">{{ __('Approve') }}</button>
                                </form>
                            @endif
                            @if ($hospital->status !== 'rejected')
                                <form method="POST" action="{{ route('admin.reject-hospital', $hospital) }}" onsubmit="return confirm('{{ __('Reject this hospital?') }}')">
                                    @csrf
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-700 transition">{{ __('Reject') }}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl p-8 text-center text-gray-500" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.10);">
                {{ __('No hospitals found.') }}
            </div>
        @endforelse
    </div>
</div>
@endsection
