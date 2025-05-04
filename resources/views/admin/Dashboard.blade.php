<x-AdminDashboardNav>
    <div class="p-4 md:p-6">
        <h3 class="font-bold text-xl mb-4">Dashboard</h3>
        
        <!-- Responsive grid for stat cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            <div class="rounded-lg shadow-md p-4 bg-white">
                <p class="text-sm font-semibold text-gray-400">User</p>
                <p class="font-bold text-xl">{{$users}}</p>
            </div>
            
            <div class="rounded-lg shadow-md p-4 bg-white">
                <p class="text-sm font-semibold text-gray-400">Created Event</p>
                <p class="font-bold text-xl">{{$events}}</p>
            </div>
            
            <div class="rounded-lg shadow-md p-4 bg-white">
                <p class="text-sm font-semibold text-gray-400">Ticket</p>
                <p class="font-bold text-xl">{{$purchaseCount}}</p>
            </div>
        </div>
        
        <h4 class="font-bold text-lg mb-4">Events by category</h4>
        
        <!-- Responsive chart container -->
        <div class="w-full bg-white rounded-lg shadow-md p-4">
            <div class="w-full h-[300px] md:h-[400px]">
                <canvas id="eventsChart"></canvas>
            </div>
        </div>
    </div>

    <script>
    fetch('/api/events/chart-data')
    .then(response => response.json())
    .then(result => {
        if(result.success) {
            const ctx = document.getElementById('eventsChart');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: result.data.labels,
                    datasets: result.data.datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            })
        }
    })
    .catch(error => console.error('Error fetching chart data', error))
    </script>
</x-AdminDashboardNav>
