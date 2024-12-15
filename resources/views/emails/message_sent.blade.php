<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Company Hr Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 20px;
            font-size: 16px;
            color: #333333;
        }

        .footer {
            padding: 10px 20px;
            font-size: 12px;
            color: #777777;
            text-align: center;
            border-top: 1px solid #ddd;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Email Header -->
        <div class="header">
            <h1>For Important Notice</h1>
        </div>

        <!-- Email Content -->
        <div class="content">

            <p><strong>Subject:</strong> {{ $data['subject'] }}</p>

            <p>Dear Employee</p>
            <p>{!! $data['message'] !!}</p> <!-- Replace with actual message content -->
            <p>Please visit our <a href="https://companywebsite.com">Company</a>.</p>


            <p>Best Regards</p>
            <p>Hr Company</p>

        </div>

        <!-- Email Footer -->
        <div class="footer">
            <p>If you have any questions, feel free to contact us at <a
                    href="mailto:support@company.com">support@company.com</a></p>
            <p>&copy; 2024 Company Name. All rights reserved.</p>
        </div>

    </div>
</body>

</html>
