<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Good Day Mr/Ms. {{ ucfirst($mail_data['last_name']) }}</h3>
    <p>We regret to inform you that your appointment request (ID: {{$mail_data['appointment_request_id']}}) has been declined.</p>
    <p>Unfortunately, we are unable to accommodate your requested appointment at this time, but you can reschedule your appointment if there is an availability.</p>
    <p>Thank you for understanding.</p>
</body>

</html>