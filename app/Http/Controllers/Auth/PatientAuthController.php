<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAuthController extends Controller
{
    public function showForm()
    {
        return view('auth.patient-register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:10|confirmed',
            'phone'    => ['required', 'digits_between:7,15'],
            'cnic'     => ['required', 'string', 'unique:patient_profiles,cnic', 'regex:/^\d{5}-\d{7}-\d{1}$/'],
            'dob'      => 'required|date|before:today',
            'gender'   => 'required|in:male,female,other',
            'address'  => 'required|string',
            'city'     => 'required|string|max:100',
        ], [
            'password.max'        => 'Password must not exceed 10 characters.',
            'phone.digits_between' => 'Phone must contain numbers only.',
            'cnic.regex'          => 'CNIC must be in Pakistani format: 00000-0000000-0',
            'cnic.unique'         => 'This CNIC is already registered.',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role'     => 'patient',
        ]);

        $user->patientProfile()->create([
            'phone'   => $validated['phone'],
            'cnic'    => $validated['cnic'],
            'dob'     => $validated['dob'],
            'gender'  => $validated['gender'],
            'address' => $validated['address'],
            'city'    => $validated['city'],
        ]);

        Auth::login($user);

        return redirect('/patient/dashboard');
    }
}