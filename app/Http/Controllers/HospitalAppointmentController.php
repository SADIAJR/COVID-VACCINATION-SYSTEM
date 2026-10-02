<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\TestResult;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalAppointmentController extends Controller
{
    // All appointments for this hospital
    public function index()
    {
        $appointments = Appointment::where('hospital_id', Auth::id())
            ->with(['patient.patientProfile', 'vaccine', 'testResult', 'vaccination'])
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('hospital.appointments', compact('appointments'));
    }

    // List of approved patients (appointment status = approved or completed)
    public function patients()
    {
        $appointments = Appointment::where('hospital_id', Auth::id())
            ->whereIn('status', ['approved', 'completed'])
            ->with(['patient.patientProfile', 'vaccine', 'testResult', 'vaccination'])
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('hospital.patients', compact('appointments'));
    }

    // Accept appointment
    public function accept(Appointment $appointment)
    {
        $this->authorizeHospital($appointment);
        $appointment->update(['status' => 'approved']);
        return back()->with('success', 'Appointment accepted.');
    }

    // Reject appointment
    public function reject(Appointment $appointment)
    {
        $this->authorizeHospital($appointment);
        $appointment->update(['status' => 'rejected']);
        return back()->with('success', 'Appointment rejected.');
    }

    // Update COVID-19 test result
    public function updateTestResult(Request $request, Appointment $appointment)
    {
        $this->authorizeHospital($appointment);

        $request->validate([
            'result'    => 'required|in:positive,negative,pending',
            'test_date' => 'required|date',
            'notes'     => 'nullable|string|max:1000',
        ]);

        TestResult::updateOrCreate(
            ['appointment_id' => $appointment->id],
            [
                'result'    => $request->result,
                'test_date' => $request->test_date,
                'notes'     => $request->notes,
            ]
        );

        // Mark appointment as completed
        $appointment->update(['status' => 'completed']);

        return back()->with('success', 'Test result updated successfully.');
    }

    // Update vaccination status
    public function updateVaccinationStatus(Request $request, Appointment $appointment)
    {
        $this->authorizeHospital($appointment);

        $request->validate([
            'dose_number'      => 'required|integer|min:1',
            'vaccination_date' => 'required|date',
            'batch_no'         => 'required|string|max:100',
        ]);

        Vaccination::updateOrCreate(
            ['appointment_id' => $appointment->id],
            [
                'dose_number'      => $request->dose_number,
                'vaccination_date' => $request->vaccination_date,
                'batch_no'         => $request->batch_no,
            ]
        );

        return back()->with('success', 'Vaccination status updated successfully.');
    }

    private function authorizeHospital(Appointment $appointment)
    {
        if ($appointment->hospital_id !== Auth::id()) {
            abort(403, 'Unauthorized.');
        }
    }
}
