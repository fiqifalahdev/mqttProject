<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 w-[80vw] h-[50vh]">
            <canvas id="testChart"></canvas>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script>
            setInterval(() => Livewire.emit('updateData'), 3000);
            var chartData = JSON.parse(@js($brokerData));
            const testChart = document.getElementById("testChart").getContext("2d");
            const newChart = new Chart(testChart, {
                type: "line",
                data: {
                    labels: chartData.label,
                    datasets: [{
                        label: "Daya Wind Turbine",
                        // Insert Data dummy
                        data: chartData.data,
                        // Cara mengganti border sesuai data yang masuk!
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
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

            Livewire.on('changed', event => {
                JSON.parse(event.data);
            });
        </script>
    @endpush
</div>
