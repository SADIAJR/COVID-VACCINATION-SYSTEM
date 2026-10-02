@extends('layouts.admin')
@section('title', __('Manage Vaccines'))
@section('page_title', __('Vaccines'))
@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ __('Vaccines') }}</h1>
        <a href="{{ route('admin.vaccines.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition">+ {{ __('Add Vaccine') }}</a>
    </div>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4">{{ session('success') }}</div>
    @endif
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
            <p class="text-2xl font-bold text-blue-600">{{ convertToUrduNumerals($vaccines->count()) }}</p>
            <p class="text-sm text-gray-500">{{ __('Vaccines') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
            <p class="text-2xl font-bold text-green-600">{{ convertToUrduNumerals($vaccines->where('stock', '>', 0)->count()) }}</p>
            <p class="text-sm text-gray-500">{{ __('Approved') }}</p>
        </div>
        <div class="bg-white rounded-2xl p-4 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
            <p class="text-2xl font-bold text-red-600">{{ convertToUrduNumerals($vaccines->where('stock', 0)->count()) }}</p>
            <p class="text-sm text-gray-500">{{ __('Out of Stock') }}</p>
        </div>
    </div>
    <div class="flex gap-3 mb-4 flex-wrap">
        <a href="{{ request()->fullUrlWithQuery(['availability' => '']) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium {{ !request('availability') ? 'bg-blue-600 text-white' : 'bg-white border text-gray-700 hover:bg-gray-50' }}">{{ __('All') }}</a>
        <a href="{{ request()->fullUrlWithQuery(['availability' => 'available']) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium {{ request('availability') === 'available' ? 'bg-green-600 text-white' : 'bg-white border text-gray-700 hover:bg-gray-50' }}">{{ __('Approved') }}</a>
        <a href="{{ request()->fullUrlWithQuery(['availability' => 'unavailable']) }}"
            class="px-4 py-2 rounded-xl text-sm font-medium {{ request('availability') === 'unavailable' ? 'bg-red-600 text-white' : 'bg-white border text-gray-700 hover:bg-gray-50' }}">{{ __('Out of Stock') }}</a>
    </div>
    <div class="bg-white rounded-2xl overflow-hidden" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="px-4 py-3">{{ __('Vaccine Name') }}</th>
                    <th class="px-4 py-3">{{ __('Manufacturer') }}</th>
                    <th class="px-4 py-3">{{ __('Doses') }}</th>
                    <th class="px-4 py-3">{{ __('Stock') }}</th>
                    <th class="px-4 py-3">{{ __('Status') }}</th>
                    <th class="px-4 py-3">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $filter = request('availability');
                    $list = $filter === 'available' ? $vaccines->where('stock', '>', 0) : ($filter === 'unavailable' ? $vaccines->where('stock', 0) : $vaccines);
                @endphp
                @forelse ($list as $vaccine)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">{{ $vaccine->name }}</td>
                        <td class="px-4 py-3">{{ $vaccine->manufacturer }}</td>
                        <td class="px-4 py-3 text-center">{{ convertToUrduNumerals($vaccine->doses_required) }}</td>
                        <td class="px-4 py-3 text-center font-semibold {{ $vaccine->stock > 10 ? 'text-green-600' : ($vaccine->stock > 0 ? 'text-yellow-600' : 'text-red-600') }}">
                            {{ convertToUrduNumerals($vaccine->stock) }}
                        </td>
                        <td class="px-4 py-3">
                            @if ($vaccine->stock > 0)
                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">{{ __('Approved') }}</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">{{ __('Out of Stock') }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('admin.vaccines.edit', $vaccine) }}" class="text-blue-600 hover:underline text-sm">{{ __('Edit') }}</a>
                            <form method="POST" action="{{ route('admin.vaccines.destroy', $vaccine) }}" class="inline" onsubmit="return confirm('{{ __('Delete') }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-500">{{ __('No vaccines found.') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
