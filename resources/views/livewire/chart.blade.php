<div>
    <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-row flex-wrap">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-{{ $tWidth }}">
            <div class="p-6 bg-white border-b border-gray-200">
                <canvas id="{{ $chartName }}" width="{{ $cWidth }}" height="{{ $cHeight }}"></canvas>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        const ctx = document.getElementById("<?= $chartName ?>").getContext("2d");
        const chart = new Chart(ctx, {
            type: "<?= $type ?>",
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: "Daya Wind Turbine",
                    // Insert Data dummy
                    data: [12, 19, 20, 50, 32, 30, 10],
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
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
</div>
