<!DOCTYPE html>
<html>
<head>
    <title>Role Change Approved</title>
</head>
<body>
    <h1>Dear {{ $user->Firstname }},</h1>
    <p>Your role change request has been approved. You are now assigned as <strong>{{ $user->role }}</strong>.</p>
    <p>Thank you for being a part of our community!</p>
</body>
</html>
