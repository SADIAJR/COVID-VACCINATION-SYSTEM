@extends('layouts.hospital')

@section('title', 'Pending Approval - Covid Vaccination Portal')
@section('page_title', 'Pending Approval')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-6">
            <h1 class="text-2xl font-bold mb-2">Your hospital registration is pending approval</h1>
            <p>An admin needs to approve your hospital before you can access the dashboard.</p>
        </div>

        <div class="space-y-2 text-gray-700 mb-6">
            <p><span class="font-semibold">Hospital Name:</span> {{ $profile->hospital_name }}</p>
            <p><span class="font-semibold">Status:</span>
                <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-sm">{{ $profile->status }}</span>
            </p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>
@endsection