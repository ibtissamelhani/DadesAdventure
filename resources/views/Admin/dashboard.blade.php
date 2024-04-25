<x-admin.dashboard :totalActivities="$totalActivities" :totalUsers="$totalUsers" :totalReservation="$totalReservation">
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-56 dark:bg-gray-800">
            <div>
                <canvas id="myChart" class="h-56"></canvas>
            </div>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-56 dark:bg-gray-800">
            <canvas id="users" class="h-56"></canvas>
        </div>
        
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
    <script>
        const ctx = document.getElementById('myChart');
        var automaticCount = {{ $publishedActivities }};
        var manualCount = {{ $pendingActivities }};

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['published', 'pending'],
                datasets: [{
                    label: 'Activities',
                    data: [{{ $publishedActivities }}, {{ $pendingActivities }}],
                    backgroundColor: [
                        'rgba(238, 130, 238, 0.2)',
                        'rgba(0, 0, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(238, 130, 238, 1)',
                        'rgba(0, 0, 255, 1)'
                    ],
                    
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const cst = document.getElementById('users');
        var provider = {{ $provider }};
        var guide = {{ $guide }};
        var user = {{ $user }};

        new Chart(cst, {
            type: 'bar',
            data: {
                labels: ['providers', 'guide','users'],
                datasets: [{
                    label: 'Activities',
                    data: [{{ $provider }}, {{ $guide }},{{ $user }}],
                    
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
</x-admin.dashboard>
