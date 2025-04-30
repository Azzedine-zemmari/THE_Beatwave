<p>Hello {{ $artist->name }},</p>

<p>You are invited to perform at the event <strong>{{ $event->nom }}</strong>.</p>

<p>Details:</p>
<ul>
    <li>Date: {{ $event->date }}</li>
    <li>Location: {{ $event->place }}</li>
</ul>
<p>Check your Dashboard for more details.</p>
