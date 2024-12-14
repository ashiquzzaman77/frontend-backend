<!-- resources/views/emails/message_sent.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectMessage }}</title>
</head>

<body>
    <h1>{{ $subjectMessage }}</h1>
    <p>{{ $message }}</p>
</body>

</html>
