<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalDashboardController extends Controller
{
    // Profile / dashboard page
    public function index()
    {
        $user    = Auth::user()->load('hospitalProfile');
        $profile = $user->hospitalProfile;

        if (!$profile || $profile->status !== 'approved') {
            return view('dashboards.hospital-pending', ['profile' => $profile]);
        }

        $totalAppointments = Appointment::where('hospital_id', $user->id)->count();
        $pending           = Appointment::where('hospital_id', $user->id)->where('status', 'pending')->count();
        $approved          = Appointment::where('hospital_id', $user->id)->where('status', 'approved')->count();
        $completed         = Appointment::where('hospital_id', $user->id)->where('status', 'completed')->count();
        $reviews           = Review::with('user')->latest()->get();

        return view('dashboards.hospital', compact('user', 'profile', 'totalAppointments', 'pending', 'approved', 'completed', 'reviews'));
    }

    // Edit profile form
    public function edit()
    {
        $user    = Auth::user()->load('hospitalProfile');
        $profile = $user->hospitalProfile;
        return view('hospital.profile-edit', compact('user', 'profile'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user    = Auth::user();
        $profile = $user->hospitalProfile;

        $request->validate([
            'hospital_name' => 'required|string|max:255',
            'address'       => 'required|string',
            'city'          => 'required|string|max:100',
            'phone'         => 'required|string|max:20',
            'license_no'    => 'required|string|max:100',
        ]);

        $profile->update([
            'hospital_name' => $request->hospital_name,
            'address'       => $request->address,
            'city'          => $request->city,
            'phone'         => $request->phone,
            'license_no'    => $request->license_no,
        ]);

        return redirect()->route('hospital.dashboard')->with('success', 'Profile updated successfully.');
    }
}
