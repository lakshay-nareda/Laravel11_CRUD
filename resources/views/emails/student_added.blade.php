<!DOCTYPE html>
<html>
<head>
    <title>New Student Added</title>
</head>
<body>
    <h1>Student Added Successfully!</h1>
    <p>Hi,</p>
    <p>A new student has been added to the system:</p>
    <ul>
        <li><strong>Name:</strong> {{ $student->stu_name }}</li>
        <li><strong>Email:</strong> {{ $student->stu_email }}</li>
        <li><strong>Contact:</strong> {{ $student->stu_contact }}</li>
    </ul>
    <p>Thank you!</p>
</body>
</html>
