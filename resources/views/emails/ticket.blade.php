<!DOCTYPE html>
<html>
<head>
    <title>Your Ticket for the Event</title>
</head>
<body>
    <h1>Your Ticket for the Event</h1>

    <p><strong>Event Name:</strong> {{ $eventPurchase->event->nom }}</p>
    <p><strong>Event Date:</strong> {{ $eventPurchase->event->date }}</p>
    <p><strong>Transaction ID:</strong> {{ $eventPurchase->transactionId }}</p>
    <p><strong>Ticket Number:</strong> {{ $eventPurchase->id }}</p>
    <p><strong>Artist:</strong> {{ $eventPurchase->event->artist->Firstname }} {{$eventPurchase->event->artist->LastName}}</p>
    

</body>
</html>
