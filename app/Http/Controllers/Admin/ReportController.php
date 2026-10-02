<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestResult;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function testReports(Request $request)
    {
        $filter = $request->get('filter', 'all'); // all | date | week | month
        $date   = $request->get('date', now()->toDateString());

        $query = TestResult::with([
            'appointment.patient.patientProfile',
            'appointment.hospital.hospitalProfile',
            'appointment.vaccine',
        ]);

        if ($filter === 'date') {
            $query->whereDate('test_date', $date);
        } elseif ($filter === 'week') {
            $start = Carbon::parse($date)->startOfWeek();
            $end   = Carbon::parse($date)->endOfWeek();
            $query->whereBetween('test_date', [$start, $end]);
        } elseif ($filter === 'month') {
            $query->whereYear('test_date', Carbon::parse($date)->year)
                  ->whereMonth('test_date', Carbon::parse($date)->month);
        }

        $results = $query->orderBy('test_date', 'desc')->get();

        return view('admin.reports.test-reports', compact('results', 'filter', 'date'));
    }

    public function exportTestReports(Request $request)
    {
        $filter = $request->get('filter', 'all');
        $date   = $request->get('date', now()->toDateString());

        $query = TestResult::with([
            'appointment.patient.patientProfile',
            'appointment.hospital.hospitalProfile',
            'appointment.vaccine',
        ]);

        if ($filter === 'date') {
            $query->whereDate('test_date', $date);
        } elseif ($filter === 'week') {
            $start = Carbon::parse($date)->startOfWeek();
            $end   = Carbon::parse($date)->endOfWeek();
            $query->whereBetween('test_date', [$start, $end]);
        } elseif ($filter === 'month') {
            $query->whereYear('test_date', Carbon::parse($date)->year)
                  ->whereMonth('test_date', Carbon::parse($date)->month);
        }

        $results = $query->orderBy('test_date', 'desc')->get();

        $filename = 'test_reports_' . $filter . '_' . $date . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () use ($results) {
            $handle = fopen('php://output', 'w');

            // CSV header row
            fputcsv($handle, [
                'Test Date',
                'Patient Name',
                'Patient Phone',
                'Patient City',
                'Hospital',
                'Vaccine',
                'Result',
                'Notes',
            ]);

            foreach ($results as $r) {
                $apt = $r->appointment;
                fputcsv($handle, [
                    $r->test_date,
                    $apt->patient->name                             ?? 'N/A',
                    $apt->patient->patientProfile->phone            ?? 'N/A',
                    $apt->patient->patientProfile->city             ?? 'N/A',
                    $apt->hospital->hospitalProfile->hospital_name  ?? 'N/A',
                    $apt->vaccine->name                             ?? 'N/A',
                    ucfirst($r->result),
                    $r->notes ?? '',
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function bookings(Request $request)
    {
        $status = $request->get('status', '');

        $query = Appointment::with([
            'patient.patientProfile',
            'hospital.hospitalProfile',
            'vaccine',
            'testResult',
        ])->orderBy('appointment_date', 'desc');

        if ($status) {
            $query->where('status', $status);
        }

        $bookings = $query->get();

        return view('admin.reports.bookings', compact('bookings', 'status'));
    }
}
