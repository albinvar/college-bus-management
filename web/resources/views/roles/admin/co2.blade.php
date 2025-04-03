<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CO2 Data') }}
        </h2>
    </x-slot>

  <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Bus Info Header -->
    <div class="bg-white shadow rounded-2xl p-6">
        <h3 class="text-2xl font-bold text-gray-700">Bus #102 - Route: Kuttikanam to Pambady</h3>
        <p class="text-sm text-gray-500 mt-1">Last Synced: Mar 31, 2025 at 10:21 AM</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Avg CO₂ (Today)</p>
            <h2 class="text-2xl font-semibold text-green-700 mt-1">612 ppm</h2>
        </div>
        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Peak CO₂</p>
            <h2 class="text-2xl font-semibold text-red-700 mt-1">810 ppm</h2>
        </div>
        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Min CO₂</p>
            <h2 class="text-2xl font-semibold text-blue-700 mt-1">415 ppm</h2>
        </div>
        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Time in High CO₂ Zones</p>
            <h2 class="text-2xl font-semibold text-yellow-700 mt-1">3h 12m</h2>
        </div>
    </div>

    <!-- CO₂ Over Time Graph -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">CO₂ Levels Over Time</h3>
        <canvas id="co2Graph" class="w-full h-64"></canvas>
    </div>

    <!-- Alerts Section -->
    <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-xl">
        <div class="flex items-center">
            <svg class="h-6 w-6 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 1010 10A10 10 0 0012 2z" />
            </svg>
            <p class="text-sm text-red-700">High CO₂ levels detected on this route. Consider analyzing traffic zones.</p>
        </div>
    </div>

    <!-- Daily Summary Table -->
    <div class="bg-white rounded-2xl shadow p-6 overflow-auto">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Daily CO₂ Summary</h3>
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Date</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Avg CO₂</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Peak CO₂</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Time in Red Zone</th>
                    <th class="px-4 py-2 text-left text-gray-600 font-medium">Notes</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="px-4 py-3">Mar 30</td>
                    <td class="px-4 py-3">621 ppm</td>
                    <td class="px-4 py-3">900 ppm</td>
                    <td class="px-4 py-3">2h 45m</td>
                    <td class="px-4 py-3">Heavy traffic on Kankirapally Junction</td>
                </tr>
                <tr>
                    <td class="px-4 py-3">Mar 29</td>
                    <td class="px-4 py-3">588 ppm</td>
                    <td class="px-4 py-3">780 ppm</td>
                    <td class="px-4 py-3">1h 10m</td>
                    <td class="px-4 py-3">Light congestion</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('co2Graph').getContext('2d');
    const co2Graph = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['8 AM', '10 AM', '12 PM', '2 PM', '4 PM'],
            datasets: [{
                label: 'CO₂ (ppm)',
                data: [450, 500, 680, 810, 620],
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 400,
                    suggestedMax: 1000
                }
            }
        }
    });
</script>

</x-app-layout>