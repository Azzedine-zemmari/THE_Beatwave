<x-artistDashboardNav>
    <div id="calendar"></div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
<script>
    fetch('/api/artist/Availlability', {
        method: 'GET',
        credentials: 'include',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(data => {
        console.log('Calendar data:', data);
        const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            events: data,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialView: 'dayGridMonth',
            eventColor: '#378006',
            eventClick: function(info) {
                alert('Event:' + info.event.title);
            }
        })
        calendar.render();
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    })
</script>
</x-artistDashboardNav>