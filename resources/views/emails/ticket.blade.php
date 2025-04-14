<!DOCTYPE html>
<html>
<head>
    <title>Your Ticket for the Event</title>
</head>
<body>
    <h1>Your Ticket for the Event</h1>

    <p><strong>Event Name:</strong> {{ $eventPurchase->nom }}</p>
    <p><strong>Event Date:</strong> {{ $eventPurchase->date }}</p>
    <p><strong>Transaction ID:</strong> {{ $eventPurchase->transactionId }}</p>
    <p><strong>Ticket Number:</strong> {{ $eventPurchase->id }}</p>
    <p><strong>Artist:</strong> {{ $eventPurchase->Firstname}} {{$eventPurchase->LastName}}</p>
    

</body>
</html>
