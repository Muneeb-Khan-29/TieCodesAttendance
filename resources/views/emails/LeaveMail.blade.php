<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Notification</title>
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
            color: #d9534f;
        }
        .content p {
            margin: 10px 0;
        }
        .fine {
            margin: 20px 0;
            padding: 15px;
            background-color: #fbeae9;
            border: 1px solid #d9534f;
            border-radius: 5px;
            color: #d9534f;
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
            <h1>Leave Notification</h1>
        </div>
        <div class="content">
            <p>Dear {{ $name }},</p>
            <p>This is to notify you that you were on leave on the following date:</p>
            <p><strong>Leave Date:</strong> {{ $leaveDate }}</p>
            <div class="fine">
                <p>As per company policy, a fine of <strong>Rs. 1000</strong> has been imposed for this absence.</p>
            </div>
            <p>If you have any concerns, please contact HR for further assistance.</p>
        </div>
        <div class="footer">
            Regards,<br>
            {{ config('app.name') }}
        </div>
    </div>
</body>
</html>
