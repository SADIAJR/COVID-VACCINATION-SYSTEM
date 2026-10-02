@extends('layouts.hospital')
@section('title', __('Manage Vaccines'))
@section('page_title', __('Manage Vaccines'))
@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ __('Manage Vaccines') }}</h1>
        <a href="{{ route('hospital.vaccines.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition" style="box-shadow: 0 6px 20px 0 rgba(0,0,0,0.20);">+ {{ __('Add Vaccine') }}</a>
    </div>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4">{{ session('success') }}</div>
    @endif
    <div class="bg-white rounded-2xl overflow-hidden" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.14);">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="px-4 py-3">{{ __('Vaccine Name') }}</th>
                    <th class="px-4 py-3">{{ __('Manufacturer') }}</th>
                    <th class="px-4 py-3">{{ __('Dose Number') }}</th>
                    <th class="px-4 py-3">{{ __('Stock') }}</th>
                    <th class="px-4 py-3">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vaccines as $vaccine)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">{{ $vaccine->name }}</td>
                        <td class="px-4 py-3">{{ $vaccine->manufacturer }}</td>
                        <td class="px-4 py-3">{{ convertToUrduNumerals($vaccine->doses_required) }}</td>
                        <td class="px-4 py-3 font-semibold {{ $vaccine->stock > 10 ? 'text-green-600' : ($vaccine->stock > 0 ? 'text-yellow-600' : 'text-red-600') }}">
                            {{ convertToUrduNumerals($vaccine->stock) }}
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('hospital.vaccines.edit', $vaccine) }}" class="text-blue-600 hover:underline text-sm">{{ __('Edit') }}</a>
                            <form method="POST" action="{{ route('hospital.vaccines.destroy', $vaccine) }}" class="inline" onsubmit="return confirm('{{ __('Delete') }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">{{ __('No vaccines found.') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
