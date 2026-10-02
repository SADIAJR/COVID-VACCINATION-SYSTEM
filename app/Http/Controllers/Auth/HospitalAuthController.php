<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalAuthController extends Controller
{
    public function showForm()
    {
        return view('auth.hospital-register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:10|confirmed',
            'hospital_name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'phone' => ['required', 'digits_between:7,15'],
            'license_no' => ['required', 'digits:4'],
        ], [
            'password.max' => 'Password must not exceed 10 characters.',
            'phone.digits_between' => 'Phone must contain numbers only.',
            'license_no.digits' => 'License number must be exactly 4 digits (numbers only).',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'hospital',
        ]);

        $user->hospitalProfile()->create([
            'hospital_name' => $validated['hospital_name'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'phone' => $validated['phone'],
            'license_no' => $validated['license_no'],
            'status' => 'pending',
        ]);

        Auth::login($user);

        return redirect('/hospital/dashboard');
    }
}
