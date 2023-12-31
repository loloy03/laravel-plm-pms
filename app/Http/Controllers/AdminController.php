<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AcceptedScheduleInfo;
use App\Mail\DeclinedScheduleInfo;
use App\Models\Appointment;
use App\Models\AppointmentRequest;
use App\Models\MedicalHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use DateTime;

class AdminController extends Controller
{

    public function downloadPDF($id)
    {
        $appointment = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')->find($id);

        if (!$appointment) {
            return redirect()->route('error');
        }

        $confirmed_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')
            ->join('users', 'appointment_requests.user_id', '=', 'users.id')
            ->where('appointment_requests.appointment_id', $id)
            ->where('appointment_requests.status', '=', 'confirmed')
            ->get();

        $startDateTime = new DateTime($appointment->appointment_start_date);
        $endDateTime = new DateTime($appointment->appointment_end_date);

        $formattedStartDate = $startDateTime->format('F d, Y, h:i A');
        $formattedEndDate = $endDateTime->format('F d, Y, h:i A');

        $pdfFileName = $appointment->appointment_title . '_' . $formattedStartDate . '_' . $formattedEndDate . '_patients.pdf';
        $pdf = \PDF::loadView('admin.pdf', compact('confirmed_requests', 'appointment'));

        return response()->streamDownload(
            function () use ($pdf) {
                echo $pdf->output();
            },
            $pdfFileName
        );
    }

    public function appointment_delete($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->delete();
        }
        return redirect()->route('view-list-appointment-page')->with('success', 'Appointment Deleted Successfully');
    }

    public function appointment_show_edit($id)
    {
        $appointment = Appointment::find($id);

        $assigned_doctor = Appointment::join('users', 'appointments.appointment_assigned_doctor_id', '=', 'users.id')
            ->where('appointment_id', $id)
            ->first(); // Retrieve a single instance

        $doctors = User::where('user_type', 'doctor')
            ->whereNotIn('id', [$assigned_doctor->id]) // Exclude the assigned doctor
            ->get();

        return view('admin.appointment-show-edit', compact('appointment', 'doctors', 'assigned_doctor'));
    }


    public function create_appointment_page()
    {
        $doctors = User::where('user_type', 'doctor')->get();

        return view('admin.create-appointment-page', compact('doctors'));
    }

    public function show_patient_info($id)
    {
        $patient_info = MedicalHistory::join('users', 'med_history.user_id', '=', 'users.id')
            ->where('med_history.user_id', $id)
            ->first();


        return view('admin.show-patient-info', compact('patient_info'));
    }


    public function view_list_appointment(Request $request)
    {
        $filter = $request->input('filter', 'available');

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

        return view('admin.view-list-appointment-page', compact('appointments', 'patients_confirmed_count', 'filter'));
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

        $confirmed_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')->join('users', 'appointment_requests.user_id', '=', 'users.id')->where('appointment_requests.appointment_id', $id)->where('appointment_requests.status', '=', 'confirmed')->get();

        //quantity of the accepted request of a appointment
        $confirmed_requests_count = $confirmed_requests->count();

        $appointment_requests = AppointmentRequest::join('appointments', 'appointment_requests.appointment_id', '=', 'appointments.appointment_id')->where('appointment_requests.appointment_id', $id)->whereNull('appointment_requests.status')->get();

        $appointment_requests_count = $appointment_requests->count();

        return view('admin.show-appointment', compact('appointment', 'appointment_requests', 'confirmed_requests_count', 'appointment_requests_count', 'confirmed_requests'));
    }

    public function edit_appointment(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'appointment_title' => ['sometimes', 'string', 'max:255'],
            'appointment_description' => ['sometimes', 'string', 'max:255'],
            'appointment_start_date' => ['sometimes', 'date'],
            'appointment_end_date' => ['sometimes', 'date'],
            'appointment_allowed_patients' => ['sometimes'],
            'appointment_assigned_doctor_id' => ['sometimes'],
        ]);

        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);

        // Update appointment attributes with filled values
        $appointment->update($request->all());

        return redirect()->back()->with('success', 'Appointment Edited Successfully');
    }





    public function store_appointment(Request $request)
    {
        //validate data input in the forms
        $request->validate([
            'appointment_title' => ['required', 'string', 'max:255'],
            'appointment_description' => ['required', 'string', 'max:255'],
            'appointment_start_date' => ['required', 'date',],
            'appointment_end_date' => ['required', 'date'],
            'appointment_allowed_patients' => ['required'],
            "appointment_assigned_doctor_id" => ['required'],
        ]);

        //store info in the db
        Appointment::create([
            'appointment_title' => $request->appointment_title,
            'appointment_description' => $request->appointment_description,
            'appointment_start_date' => $request->appointment_start_date,
            'appointment_end_date' => $request->appointment_end_date,
            'appointment_allowed_patients' => $request->appointment_allowed_patients,
            "appointment_assigned_doctor_id" => $request->appointment_assigned_doctor_id,
        ]);

        return redirect()->back()->with('success', 'Appointment Created Successfully');
    }
}
