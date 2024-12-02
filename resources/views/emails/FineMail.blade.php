<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 8px;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            font-size: 16px;
            line-height: 1.5;
        }
        .email-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .fine-amount {
            font-weight: bold;
            color: #d9534f;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="email-header">
            Fine Notification
        </div>

        <div class="email-body">
            <p>Dear {{ $name }},</p>

            <p>We hope this email finds you well. We would like to inform you about your fine for the current month, based on your attendance record. Please find the details below:</p>

            <ul>
                <li><strong>Total Fine for the Month:</strong> <span class="fine-amount">{{ (int) $totalFine }}</span></li>
            </ul>

            <p>Please ensure to follow the attendance policies moving forward to avoid further fines. If you have any questions regarding this fine, feel free to reach out.</p>

            <p>Thank you for your attention to this matter.</p>
        </div>

        <div class="email-footer">
            <p>Regards,<br>{{ config('app.name') }}</p>
        </div>
    </div>

</body>
</html>
