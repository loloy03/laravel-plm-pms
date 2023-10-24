<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create_appointment_page()
    {
        $doctors = User::where('user_type', 'doctor')->get();

        return view('admin.create-appointment-page', compact('doctors'));
    }

    public function accept_appointment($id)
    {
        $appointment_request = AppointmentRequest::find($id);

        if (!$id) {
            // Handle the case where the appointment request is not found, e.g., show an error page or a message.
            return redirect()->route('error'); // Example: Redirect to an error route
        }

        $appointment_request->update(['status' => 'accepted']);

        return redirect()->back();
    }

    public function decline_appointment($id)
    {
        $appointment_request = AppointmentRequest::find($id);

        if (!$id) {
            // Handle the case where the appointment request is not found, e.g., show an error page or a message.
            return redirect()->route('error'); // Example: Redirect to an error route
        }

        $appointment_request->update(['status' => 'declined']);

        return redirect()->back();
    }

    public function view_list_appointment()
    {
        //join the appointment table with users table
        $appointments = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')
            ->select('appointments.*', 'users.*')
            ->get();

        // Retrieve the count of appointment requests for each appointment
        $appointment_requests_count = [];
        foreach ($appointments as $appointment) {
            $id = $appointment->appointment_id;
            $appointment_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')
                ->where('appointment_requests.appointment_id', $id)
                ->whereNull('appointment_requests.status')
                ->get();
            $appointment_requests_count[$id] = $appointment_requests->count();
        }

        return view('admin.view-list-appointment-page', compact('appointments', 'appointment_requests_count'));
    }

    public function show_appointment($id)
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

        $accepted_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')->where('appointment_requests.appointment_id', $id)->where('appointment_requests.status', '=', 'accepted')->get();

        //quantity of the accepted request of a appointment
        $accepted_requests_count = $accepted_requests->count();

        $appointment_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')->where('appointment_requests.appointment_id', $id)->whereNull('appointment_requests.status')->get();

        $appointment_requests_count = $appointment_requests->count();

        return view('admin.show-appointment', compact('appointment', 'appointment_requests', 'accepted_requests_count', 'appointment_requests_count','accepted_requests'));
    }



    public function store_appointment(Request $request)
    {
        //validate data input in the forms
        $request->validate([
            'appointment_title' => ['required', 'string', 'max:255'],
            'appointment_description' => ['required', 'string', 'max:255'],
            'appointment_start_date' => ['required', 'date',],
            'appointment_end_date' => ['required', 'date'],
            "appointment_assigned_doctor_id" => ['required'],
        ]);

        //store info in the db
        Appointment::create([
            'appointment_title' => $request->appointment_title,
            'appointment_description' => $request->appointment_description,
            'appointment_start_date' => $request->appointment_start_date,
            'appointment_end_date' => $request->appointment_end_date,
            "appointment_assigned_doctor_id" => $request->appointment_assigned_doctor_id,
        ]);

        return redirect()->back()->with('success', 'Appointed Created Successfully');
    }
}
