@extends('layouts.hospital')
@section('title', __('Update'))
@section('page_title', __('Vaccines'))
@section('content')
<div class="max-w-md mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Update Stock') }}</h1>
    <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.14);">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-xl mb-4">
                <ul class="list-disc list-inside">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif
        <form method="POST" action="{{ route('hospital.vaccines.update', $vaccine) }}" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Vaccine Name') }}</label>
                <input type="text" name="name" value="{{ old('name', $vaccine->name) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Manufacturer') }}</label>
                <input type="text" name="manufacturer" value="{{ old('manufacturer', $vaccine->manufacturer) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Dose Number') }}</label>
                <input type="number" name="doses_required" value="{{ old('doses_required', $vaccine->doses_required) }}" min="1" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Stock') }}</label>
                <input type="number" name="stock" value="{{ old('stock', $vaccine->stock) }}" min="0" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-50">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-xl hover:bg-blue-700 transition font-medium">{{ __('Update Stock') }}</button>
        </form>
        <a href="{{ route('hospital.vaccines.index') }}" class="block text-center text-blue-600 hover:underline mt-4 text-sm">← {{ __('Back') }}</a>
    </div>
</div>
<script>
document.querySelectorAll('input[type="number"]').forEach(function(input) {
    input.addEventListener('keypress', function(e) {
        if (!/[0-9]/.test(e.key)) e.preventDefault();
    });
    input.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});
</script>
@endsection
