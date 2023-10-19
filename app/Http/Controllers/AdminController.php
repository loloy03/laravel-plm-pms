<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create_appointment_page()
    {
        $doctors = User::where('user_type', 'doctor')->get();

        return view('admin.create-appointment-page', compact('doctors'));
    }
    public function store_appointment(Request $request)
    {
        $request->validate([
            'appointment_title' => ['required', 'string', 'max:255'],
            'appointment_description' => ['required', 'string', 'max:255'],
            'appointment_start_date' => ['required', 'date',],
            'appointment_end_date' => ['required', 'date'],
            "appointment_assigned_doctor" => ['required'],
        ]);

        Appointment::create([
            'appointment_title' => $request->appointment_title,
            'appointment_description' => $request->appointment_description,
            'appointment_start_date' => $request->appointment_start_date,
            'appointment_end_date' => $request->appointment_end_date,
            "appointment_assigned_doctor" => $request->appointment_assigned_doctor,
        ]);

        return redirect()->back()->with('success', 'Appointed Created Successfully');
    }
}
