<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Message</title>
    <style>
        /* General email body styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ddd;
            color: #333;
        }

        /* Email container */
        .email-container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #f4f4f4;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Header section */
        .email-header {
            text-align: center;
            padding: 25px 20px;
            border-bottom: 1px solid #777;
            /* Border color changed to #777 */
        }

        .email-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        /* Email body section */
        .email-body {
            padding: 30px;
            text-align: left;
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .email-body p {
            margin: 15px 0;
        }

        /* Styled "To" text */
        .email-body .greeting {
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }

        /* Button styling */
        .email-button {
            display: inline-block;
            background-color: #e1e1e1;
            color: #333;
            padding: 12px 20px;
            font-weight: bold;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 25px;
            border: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .email-button:hover {
            background-color: #d1d1d1;
        }

        /* Footer section */
        .email-footer {

            color: #777;
            text-align: center;

            font-size: 12px;
            /* Border color changed to #777 */
        }
    </style>
</head>

<body>

    <div class="email-container">

        <!-- Body -->
        <div class="email-body">
            <p class="greeting">Dear {{ $name }},</p>

            <p><strong>Subject:</strong> {{ $subject }}</p>

            <p>{{ $messageContent }}</p>

            <br>

            <h4><strong>If you have any questions or need further assistance, feel free to reach out to us.</strong></h4>
            
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; 2024 Your Company. All Rights Reserved.</p>
            <p><a href="#">Unsubscribe</a> | <a href="#">Privacy Policy</a></p>
        </div>
    </div>

</body>

</html>
