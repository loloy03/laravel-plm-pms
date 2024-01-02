<!DOCTYPE html>
<html>
<head>
    <title>Confirmed Patients - {{ $appointment->appointment_title }}</title>
    <style>
        /* Define your styles for the PDF content here */
    </style>
</head>
<body>
    <h2>Appointment Title - {{ $appointment->appointment_title }}</h2>
    <h3>Doctor Assigned: Dr. {{ $appointment->first_name }} {{ $appointment->last_name }}</h3>
    <h3>Appointment Period:</h3>
    <p>Start Date: {{ \Carbon\Carbon::parse($appointment->appointment_start_date)->format('F d, Y, h:i A') }}</p>
    <p>End Date: {{ \Carbon\Carbon::parse($appointment->appointment_end_date)->format('F d, Y, h:i A') }}</p>

    <h3>Confirmed Patients:</h3>
    <ul>
        @foreach($confirmed_requests as $request)
            <li>{{ $request->first_name }} {{ $request->last_name }}</li>
        @endforeach
    </ul>
</body>
</html>
