<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HospitalProfile;
use App\Models\Appointment;
use App\Models\TestResult;
use App\Models\Vaccination;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // Admin profile / dashboard
    public function index()
    {
        $pendingHospitals  = HospitalProfile::where('status', 'pending')->count();
        $approvedHospitals = HospitalProfile::where('status', 'approved')->count();
        $totalPatients     = User::where('role', 'patient')->count();
        $totalBookings     = Appointment::count();

        // Graph data — last 7 months
        $months = [];
        $newCases = [];
        $positiveCases = [];
        $recovered = [];

        $dummyNewCases  = [120, 95, 140, 180, 160, 210, 175];
        $dummyPositive  = [40,  30, 55,  70,  60,  80,  65];
        $dummyRecovered = [60,  50, 75,  90,  85, 110,  95];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $months[] = $date->format('M Y');

            $idx = 6 - $i;

            $dbNew = Appointment::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $newCases[] = $dbNew > 0 ? $dbNew : $dummyNewCases[$idx];

            $dbPos = TestResult::where('result', 'positive')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $positiveCases[] = $dbPos > 0 ? $dbPos : $dummyPositive[$idx];

            $dbRec = Appointment::where('status', 'completed')
                ->whereYear('updated_at', $date->year)
                ->whereMonth('updated_at', $date->month)
                ->count();
            $recovered[] = $dbRec > 0 ? $dbRec : $dummyRecovered[$idx];
        }

        $reviews = Review::with('user')->latest()->get();

        return view('dashboards.admin', compact(
            'pendingHospitals',
            'approvedHospitals',
            'totalPatients',
            'totalBookings',
            'months',
            'newCases',
            'positiveCases',
            'recovered',
            'reviews'
        ));
    }

    // View all hospitals (pending + approved + rejected)
    public function hospitals()
    {
        $hospitals = HospitalProfile::with('user')->orderBy('status')->get();
        return view('admin.hospitals.index', compact('hospitals'));
    }

    // Approve a hospital
    public function approveHospital(Request $request, HospitalProfile $hospitalProfile)
    {
        $hospitalProfile->update(['status' => 'approved']);
        return back()->with('success', 'Hospital approved successfully.');
    }

    // Reject a hospital
    public function rejectHospital(Request $request, HospitalProfile $hospitalProfile)
    {
        $hospitalProfile->update(['status' => 'rejected']);
        return back()->with('success', 'Hospital rejected.');
    }
}
