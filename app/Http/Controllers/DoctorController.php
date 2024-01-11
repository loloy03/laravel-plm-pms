<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\Appointment;
use App\Models\AppointmentRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class DoctorController extends Controller
{

    public function show_user_info($id)
    {
        $user_info = User::find($id);

        // dd($user_info);

        return view('doctor.show-user-info', compact('user_info'));
    }




    public function view_appointments(Request $request)
    {

        //join the appointment table with users table
        $appointments = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')
            ->select('appointments.*', 'users.*')
            ->get();

        // Retrieve the count of appointment requests for ephp artisanach appointment
        $appointment_requests_count = [];
        foreach ($appointments as $appointment) {
            $id = $appointment->appointment_id;
            $appointment_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')
                ->where('appointment_requests.appointment_id', $id)
                ->whereNull('appointment_requests.status')
                ->get();
            $appointment_requests_count[$id] = $appointment_requests->count();
        }

        return view('doctor.view-appointments-page', compact('appointments', 'appointment_requests_count'));
    }

    public function view_medical_history()
    {
        // Join the medical_history table with the users table
        // $medicalhistory = MedicalHistory::join('users', 'med_history.medhistory_id', '=', 'users.id')
        //     ->select('med_history.*', 'users.first_name', 'users.last_name')
        //     ->where('users.user_type', 'student')
        //     ->get();

        $result['medical_history'] = DB::table('med_history')
            ->get();

        return view('doctor.view-medical-history-page', compact('result'));
    }

    public function show_appointments($id)
    {
        $appointment = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')
            ->select('appointments.*', 'users.*') // Specify the columns you want to select from the users table
            ->where('appointments.appointment_id', $id) // Filter by the appointment's ID
            ->first();

        // Check if the appointment was found
        if (!$appointment) {
            // Handle the case where the appointment is not found, e.g., show an error page or a message.
            return redirect()->route('error'); // Example: Redirect to an error route
        }

        $confirmed_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')->join('users', 'appointment_requests.user_id', '=', 'users.id')->where('appointment_requests.appointment_id', $id)->where('appointment_requests.status', '=', 'confirmed')->get();

        //quantity of the accepted request of a appointment
        $confirmed_requests_count = $confirmed_requests->count();

        $appointment_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')->where('appointment_requests.appointment_id', $id)->whereNull('appointment_requests.status')->get();

        $appointment_requests_count = $appointment_requests->count();

        return view('doctor.show-appointments-page', compact('appointment', 'appointment_requests', 'confirmed_requests_count', 'appointment_requests_count', 'confirmed_requests'));
    }

    public function show_patient_info($id, $appointment_id)
    {
        $patient_info = MedicalHistory::join('users', 'med_history.user_id', '=', 'users.id')
            ->where('med_history.user_id', $id)
            ->first();
    
        $patient_remarks = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')
            ->where('appointment_requests.user_id', $id)->where('appointments.appointment_id', $appointment_id)
            ->first();

        $attachment = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')
            ->where('appointment_requests.user_id', $id)->where('appointments.appointment_id', $appointment_id)
            ->first();
        
    
        $appstatus = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')
            ->where('appointment_requests.user_id', $id)->where('appointments.appointment_id', $appointment_id)
            ->first();
        
        
    
        return view('doctor.show-patient-info', compact('patient_info', 'patient_remarks', 'attachment','appstatus'));
    }
    

    public function edit_remarks(Request $request, $id)
    {

        // Validate the input
        $request->validate([
            'remarks' => ['sometimes', 'string', 'max:255'],
            'attachment' => ['sometimes', 'string', 'max:255'],
            'appstatus' => ['sometimes', 'string', 'max:255'],
        ]);

        $remarks = AppointmentRequest::findOrFail($id);

        $remarks->update($request->all());

        return redirect()->back()->with('success', 'Appointment Edited Successfully');
    }
}
