<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::where('role', 'patient')
            ->with(['patientProfile', 'appointments' => function ($query) {
                $query->with(['vaccine', 'hospital.hospitalProfile', 'vaccination'])
                    ->orderBy('appointment_date', 'desc');
            }])
            ->get();

        return view('admin.patients.index', ['patients' => $patients]);
    }
}