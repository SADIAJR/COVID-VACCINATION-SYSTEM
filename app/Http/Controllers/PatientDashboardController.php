<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientDashboardController extends Controller
{
    // Profile page
    public function index()
    {
        $user = Auth::user()->load('patientProfile');
        return view('dashboards.patient', compact('user'));
    }

    // Edit profile form
    public function edit()
    {
        $user = Auth::user()->load('patientProfile');
        return view('patient.profile-edit', compact('user'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'dob'     => 'required|date',
            'gender'  => 'required|in:male,female,other',
            'address' => 'required|string',
            'city'    => 'required|string|max:100',
        ]);

        $user->update(['name' => $request->name]);

        $user->patientProfile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'phone'   => $request->phone,
                'dob'     => $request->dob,
                'gender'  => $request->gender,
                'address' => $request->address,
                'city'    => $request->city,
            ]
        );

        return redirect()->route('patient.dashboard')->with('success', 'Profile updated successfully.');
    }

    // Delete account
    public function destroy(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Your account has been deleted.');
    }
}
