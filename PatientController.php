<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\Appointment;
use App\Models\AppointmentRequest;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function medical_history()
    {
        $user = Auth::user();
        return view('student.medicalhistory', compact('user'));
    }

    public function medical_historyadd(Request $request)
    {
        $data = $request->validate([
            // ... (your validation rules)
        ]);
        $data['user_id'] = Auth::id();
        $data['first_name'] = Auth::user()->first_name;
        $data['last_name'] = Auth::user()->last_name;
        $data['gender'] = $request->input('gender');
        $data['birthdate'] = $request->input('birthdate');
        $data['ards'] = $request->input('ards');
        $data['anxpan'] = $request->input('anxpan');
        $data['arthritis'] = $request->input('arthritis');
        $data['asthma'] = $request->input('asthma');
        $data['depress'] = $request->input('depress');
        $data['diabetes'] = $request->input('diabetes');
        $data['heartatk'] = $request->input('heartatk');
        $data['stroke'] = $request->input('stroke');
        $data['visualimp'] = $request->input('visualimp');
        $data['allergies'] = $request->input('allergies');
        $data['epilepsy'] = $request->input('epilepsy');
        $data['hepatitis'] = $request->input('hepatitis');
        $data['metalimp'] = $request->input('metalimp');
        $data['tuberculosis'] = $request->input('tuberculosis');
        $data['sexdys'] = $request->input('sexdys');
        $data['pregnancy'] = $request->input('pregnancy');
        $data['others'] = $request->input('others');
        $data['remarks'] = $request->input('remarks');
        $newMedicalhistory = MedicalHistory::create($data);

        return redirect()->back()->with('success', 'Successfully Added');
    }

    public function available_appointments()
    {
        $appointments = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')
            ->select('appointments.*', 'users.*')
            ->get();

        // Retrieve the count of appointment requests for each appointment
        $patients_confirmed_count = [];
        foreach ($appointments as $appointment) {
            $id = $appointment->appointment_id;
            $appointment_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')
                ->where('appointment_requests.appointment_id', $id)
                ->where('appointment_requests.status', 'confirmed')
                ->get();
            $patients_confirmed_count[$id] = $appointment_requests->count();
        }

        return view('student.appointmentspage', compact('appointments', 'patients_confirmed_count'));
    }

    public function avail_appointment($id)
    {
        $appointment = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')
            ->select('appointments.*', 'users.*')
            ->where('appointments.appointment_id', $id)
            ->first();

        if (!$appointment) {
            return redirect()->route('error');
        }

        return view('student.appointmentsreqs', compact('appointment'));
    }

    public function user_appointment($id)
    {
        $appointment = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')
            ->select('appointments.*', 'users.*')
            ->where('appointments.appointment_id', $id)
            ->first();

        if (!$appointment) {
            return redirect()->route('error');
        }

        return view('student.userappointments', compact('appointment'));
    }

    public function confirmAppointment(Request $request, $appointment_request_id)
    {

        // Retrieve the authenticated user
        $user = Auth::user();

        $appointmentId = $request->input('appointment_id');

        // Check if the user has already requested this appointment
        $existingRequest = AppointmentRequest::where('user_id', $user->id)
            ->where('appointment_id', $appointmentId)
            ->first();

        // If the user has not requested this appointment, create a new request
        if (!$existingRequest) {
            // Create appointment request record
            $appointmentRequest = new AppointmentRequest();
            $appointmentRequest->user_id = $user->id;
            $appointmentRequest->appointment_id = $appointmentId;
            $appointmentRequest->status='confirmed';
            $appointmentRequest->first_name = $user->first_name;
            $appointmentRequest->last_name = $user->last_name ?? '';
            $appointmentRequest->save();

            // Log a success message
            Log::info('Appointment requested successfully');

            // Redirect back with success message
            return redirect()->route('appointmentspage')->with('success', 'Appointment requested successfully');
        }

        // Redirect back with  message
        return redirect()->route('appointmentspage')->with('warning', 'Appointment request already exists');
    }


    public function userRequestedAppointments()
    {
        $user = Auth::user();
            
        // Retrieve all appointments requested by the user
        $userRequestedAppointments = AppointmentRequest::where('user_id', $user->id)
            ->with(['appointment', 'appointment.assignedDoctor']) // Load appointment and doctor details
            ->get();

        return view('student.user_requested_appointments', compact('userRequestedAppointments'));
    }
}
