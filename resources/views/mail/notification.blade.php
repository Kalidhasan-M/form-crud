<!DOCTYPE html>
<html>
<head>
    <title>Admission Confirmation</title>
</head>
<body>
    <h2>Hello {{ $data['name'] }},</h2>
    <p>Your admission has been successfully submitted.</p>

    <h3>Details:</h3>
    <ul>
        <li><strong>Email:</strong> {{ $data['email'] }}</li>
        <li><strong>Contact No:</strong> {{ $data['contactno'] }}</li>
        <li><strong>State:</strong> {{ $data['state'] }}</li>
        <li><strong>Language:</strong> {{ $data['language'] }}</li>
        <li><strong>Address:</strong> {{ $data['address'] }}</li>
        <li><strong>Gender:</strong> {{ $data['gender'] }}</li>
        <li><strong>Date of Birth:</strong> {{ $data['data_of_brth'] }}</li>
    </ul>

    <p>Thank you for your submission!</p>
</body>
</html>
