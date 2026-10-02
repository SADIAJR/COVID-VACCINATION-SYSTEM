<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\HospitalProfile;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAppointmentController extends Controller
{
    // Search hospitals (by name or city)
    public function searchHospitals(Request $request)
    {
        $query = HospitalProfile::where('status', 'approved');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('city', 'like', '%' . $search . '%')
                  ->orWhere('hospital_name', 'like', '%' . $search . '%');
            });
        }

        $hospitals = $query->get();
        $vaccines  = Vaccine::where('stock', '>', 0)->get();

        return view('patient.search-hospitals', compact('hospitals', 'vaccines'));
    }

    // Book appointment
    public function bookAppointment(Request $request)
    {
        $validated = $request->validate([
            'hospital_id'      => 'required|exists:users,id',
            'vaccine_id'       => 'required|exists:vaccines,id',
            'appointment_date' => 'required|date|after_or_equal:today',
        ]);

        Appointment::create([
            'patient_id'       => Auth::id(),
            'hospital_id'      => $validated['hospital_id'],
            'vaccine_id'       => $validated['vaccine_id'],
            'appointment_date' => $validated['appointment_date'],
            'status'           => 'pending',
        ]);

        return redirect()->route('patient.appointments.index')
            ->with('success', 'Appointment booked successfully. Please wait for hospital approval.');
    }

    // My appointments list
    public function myAppointments()
    {
        $appointments = Appointment::where('patient_id', Auth::id())
            ->with(['hospital.hospitalProfile', 'vaccine', 'testResult', 'vaccination'])
            ->orderBy('appointment_date', 'desc')
            ->get();

        return view('patient.appointments', compact('appointments'));
    }

    // Vaccination Card — only accessible if appointment is approved or completed
    public function vaccineCard($appointmentId)
    {
        $appointment = Appointment::where('patient_id', Auth::id())
            ->with(['hospital.hospitalProfile', 'vaccine', 'vaccination', 'patient.patientProfile'])
            ->whereIn('status', ['approved', 'completed'])
            ->findOrFail($appointmentId);

        return view('patient.vaccine-card', compact('appointment'));
    }

    // View test result + vaccination suggestion
    public function viewResult($appointmentId)
    {
        $appointment = Appointment::where('patient_id', Auth::id())
            ->with(['hospital.hospitalProfile', 'vaccine', 'testResult', 'vaccination'])
            ->findOrFail($appointmentId);

        return view('patient.result', compact('appointment'));
    }

    // Vaccination tracking + history + guidelines
    public function tracking()
    {
        $appointments = Appointment::where('patient_id', Auth::id())
            ->with(['hospital.hospitalProfile', 'vaccine', 'testResult', 'vaccination'])
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('patient.tracking', compact('appointments'));
    }
}
