<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Good Day Mr/Ms. {{ ucfirst($mail_data['last_name']) }}</h3>
    <p>Your Appointment has been confirmed with the Appointment Request ID: {{$mail_data['appointment_request_id']}}</p>
    <p>Please go to this date:</p>
    <p>Start Time/Date: {{ \Carbon\Carbon::parse($mail_data['appointment_start_date'])->format('F d, Y, h:i A')}}
    <p>Until: {{ \Carbon\Carbon::parse($mail_data['appointment_end_date'])->format('F d, Y, h:i A')}}</p>
    <p>Thankyou.</p>
</body>

</html>