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
        $existingMedicalHistory = MedicalHistory::where('user_id', $user->id)->first();

        // Check if the user already has medical history records
        $hasMedicalHistory = $existingMedicalHistory ? true : false;

        return view('student.medicalhistory', compact('user', 'hasMedicalHistory', 'existingMedicalHistory'));
    }

    public function medical_historyadd(Request $request)
    {
        $user = Auth::user();
        $existingMedicalHistory = MedicalHistory::where('user_id', $user->id)->first();

        if ($existingMedicalHistory) {
            // Update the existing medical history record
            $data = $request->validate([
                // Define your validation rules for updating the record
            ]);

            $existingMedicalHistory->update([
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'gender' => $request->input('gender'),
                'birthdate' => $request->input('birthdate'),
                'ards' => $request->input('ards'),
                'anxpan' => $request->input('anxpan'),
                'arthritis' => $request->input('arthritis'),
                'asthma' => $request->input('asthma'),
                'depress' => $request->input('depress'),
                'diabetes' => $request->input('diabetes'),
                'heartatk' => $request->input('heartatk'),
                'stroke' => $request->input('stroke'),
                'visualimp' => $request->input('visualimp'),
                'allergies' => $request->input('allergies'),
                'epilepsy' => $request->input('epilepsy'),
                'hepatitis' => $request->input('hepatitis'),
                'metalimp' => $request->input('metalimp'),
                'tuberculosis' => $request->input('tuberculosis'),
                'sexdys' => $request->input('sexdys'),
                'pregnancy' => $request->input('pregnancy'),
                'others' => $request->input('others'),
                'remarks' => $request->input('remarks'),

                // Add other fields here as per your schema
            ]);
        } else {
            // Create a new medical history record
            $data = $request->validate([
                // Define your validation rules for creating a new record
            ]);

            $data['user_id'] = $user->id;
            $data['first_name'] = $user->first_name;
            $data['last_name'] = $user->last_name;
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
            $newMedicalHistory = MedicalHistory::create($data);
        }

        return redirect()->back()->with('success', 'Medical history updated successfully');
    }

    public function available_appointments(Request $request)
    {
        $filter = $request->input('filter');

        // Get all appointments based on the filter
        $appointmentsQuery = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')
            ->select('appointments.*', 'users.*');

        if ($filter === 'available') {
            // Filter available appointments (where the date of the appointment is less than the start date)
            $appointmentsQuery->whereDate('appointments.appointment_start_date', '>', now());
        } elseif ($filter === 'past') {
            // Filter past appointments (where the date of the appointment is greater than the end date)
            $appointmentsQuery->whereDate('appointments.appointment_end_date', '<', now());
        } elseif ($filter === 'ongoing') {
            // Filter ongoing appointments (where the current date is between start and end date)
            $currentDate = now();
            $appointmentsQuery->whereDate('appointments.appointment_start_date', '<=', $currentDate)
                ->whereDate('appointments.appointment_end_date', '>=', $currentDate);
        } else {
            // Default behavior: Display available appointments if no filter is specified
            $appointmentsQuery->whereDate('appointments.appointment_start_date', '>', now());
        }

        $appointments = $appointmentsQuery->get();

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
        return redirect()->route('appointmentspage')->with('warning', 'Already requested for this appointment');
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
