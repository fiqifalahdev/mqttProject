<div class="{{ $className }}">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 {{ $chartSize }}">
            <canvas id="{{ $chartName }}"></canvas>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script>
            const chartData = @js($data);

            // trigger Events from global events
            setInterval(() => {
                Livewire.emit('change')
            }, 1000);
            const domElem = document.getElementById("<?php echo $chartName; ?>").getContext("2d");
            const chart = new Chart(domElem, {
                type: '<?php echo $type; ?>',
                data: {
                    labels: chartData.label,
                    datasets: [{
                        label: @js($chartName),
                        // Insert Data dummy
                        data: chartData.data,
                        // Cara mengganti border sesuai data yang masuk!
                        backgroundColor: [
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 1,
                    }, ],
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            // take emit events from global events
            Livewire.on('changedChart', event => {
                const data = JSON.parse(event);
                // Update chart depends data from the server
                chart.data.labels = data.label;
                chart.data.datasets.forEach((dataset) => {
                    dataset.data = data.data;
                });
                chart.update();
            });
        </script>
    @endpush
</div>
