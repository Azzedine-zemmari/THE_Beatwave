<x-AdminDashboardNav>
    <div class="p-6">
        <h3 class="font-bold text-xl">Dashboard</h3>
        <div class="flex justify-center items-center w-full space-x-3">
            <div class="w-[150px] h-[75px] rounded-lg shadow-md p-3">
                <p class="text-sm font-semibold text-gray-400">User</p>
                <p class="font-bold text-xl">{{$users}}</p>
            </div>
            <div class="w-[150px] h-[75px] rounded-lg shadow-md p-3">
                <p class="text-sm font-semibold text-gray-400">Created Event</p>
                <p class="font-bold text-xl">{{$events}}</p>
            </div>
            <div class="w-[150px] h-[75px] rounded-lg shadow-md p-3">
                <p class="text-sm font-semibold text-gray-400">Ticket</p>
                <p class="font-bold text-xl">{{$purchaseCount}}</p>
            </div>
                <!-- <div class="w-[150px] h-[75px] rounded-lg shadow-md p-3">
                    <p class="text-sm font-semibold text-gray-400">Enrollement</p>
                    <p class="font-bold text-xl">2,845</p>
                </div> -->
        </div>
        <h4 class="font-bold text-lg mb-3">Events by category</h4>
        <div class="flex justify-center items-center w-full">
            <div class="w-full max-w-2xl h-full">
                <canvas id="eventsChart"></canvas>
            </div>
        </div>
    </div>

    <script>
    fetch('/api/events/chart-data')
    .then(response=>response.json())
    .then(result=>{
        if(result.success){
            const ctx = document.getElementById('eventsChart');
            new Chart(ctx,{
                type:'doughnut',
                data:{
                    labels:result.data.labels,
                    datasets:result.data.datasets
                },
                options:{
                    responsive:true,
                    maintainAspectRatio: false
                }
            })
        }
    })
    .catch(error => console.error('Error fetching chart data',error))
    </script>
</x-AdminDashboardNav>x