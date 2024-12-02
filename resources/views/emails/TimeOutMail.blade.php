<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Update Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            color: #0056b3;
        }

        .content p {
            margin: 10px 0;
        }

        .details {
            margin: 20px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .details p {
            margin: 5px 0;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Attendance Update Notification</h1>
        </div>
        <div class="content">
            <p>Dear {{ $name }},</p>
            <p>Your attendance record has been updated as follows:</p>
            <div class="details">
                <p><strong>In Time:</strong> {{ $innTime }}</p>
                <p><strong>Out Time:</strong> {{ $outTime }}</p>
                <p><strong>Total Working Hours:</strong> {{ $hoursWorked }}</p>
            </div>
            <p>Thank you for your dedication and hard work!</p>
        </div>
        <div class="footer">
            Regards,<br>
            {{ config('app.name') }}
        </div>
    </div>
</body>

</html>