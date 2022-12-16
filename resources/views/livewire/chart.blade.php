<div class="{{ $className }}">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 {{ $chartSize }}">
            <div id="{{ $chartName }}"></div>
        </div>
    </div>
    @push('scripts')
        <script>
            const chartData = @js($data);
            console.log(chartData);

            // trigger Events from global events
            setInterval(() => {
                Livewire.emit('change')
            }, 1000);

            Highcharts.chart(@js($chartName), {

                chart: {
                    type: 'spline'
                },

                title: {
                    text: @js($chartName)
                },

                // subtitle: {
                //     text: 'Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>'
                // },

                yAxis: {
                    title: {
                        text: 'Values'
                    }
                },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    accessibility: {
                        description: 'Months of the year'
                    }
                },

                // Data Live berupa Object dengan atribut name dan data.
                // Jika data tahunan berarti data harus berisi 12 
                // Jika Chart berisi data tahunan berarti diambil data max tiap bulan 
                // Jika Chart berisi data bulanan berarti diambil data max tiap hari 
                // Jika Chart berisi data harian berarti diambil data max tiap berapa jam 
                series: @js($data),

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });

            // take emit events from global events
            // Livewire.on('changedChart', event => {
            //     const data = JSON.parse(event);
            //     // Update chart depends data from the server 
            //     chart.data.labels = data.label;
            //     chart.data.datasets.forEach((dataset) => {
            //         dataset.data = data.data;
            //     });
            //     chart.update();
            // });
        </script>
    @endpush
</div>
