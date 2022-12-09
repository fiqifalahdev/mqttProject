<div class="{{ $className }}">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 {{ $gaugeSize }}">
            <div id="{{ $gaugeName }}" style="width:100%; height:400px;"></div>
        </div>
    </div>
    @push('scripts')
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script>
            // const gaugeData = @js($data);
            // const label = gaugeData.type;
            // const data = parseFloat(gaugeData.message);


            // gauge options
            const gaugeOptions = {
                chart: {
                    type: 'solidgauge'
                },

                title: null,

                pane: {
                    center: ['50%', '85%'],
                    size: '140%',
                    startAngle: -90,
                    endAngle: 90,
                    background: {
                        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                        innerRadius: '60%',
                        outerRadius: '100%',
                        shape: 'arc'
                    }
                },

                exporting: {
                    enabled: false
                },

                tooltip: {
                    enabled: false
                },

                // the value axis
                yAxis: {
                    stops: [
                        [0.1, '#55BF3B'], // green
                        [0.5, '#DDDF0D'], // yellow
                        [0.9, '#DF5353'] // red
                    ],
                    lineWidth: 0,
                    tickWidth: 0,
                    minorTickInterval: null,
                    tickAmount: 2,
                    title: {
                        y: -70
                    },
                    labels: {
                        y: 16
                    }
                },

                plotOptions: {
                    solidgauge: {
                        dataLabels: {
                            y: 5,
                            borderWidth: 0,
                            useHTML: true
                        }
                    }
                }
            };

            // The speed gauge
            const gauge = Highcharts.chart(@js($gaugeName), Highcharts.merge(gaugeOptions, {
                yAxis: {
                    min: 0,
                    max: 50,
                    title: {
                        text: @js($gaugeName)
                    }
                },

                credits: {
                    enabled: false
                },

                series: [{
                    name: @js($gaugeName),
                    data: [parseFloat(@js($data))],
                    dataLabels: {
                        format: '<div style="text-align:center">' +
                            '<span style="font-size:25px">{y}</span><br/>' +
                            '<span style="font-size:12px;opacity:0.4">km/h</span>' +
                            '</div>'
                    },
                    tooltip: {
                        valueSuffix: ' km/h'
                    }
                }]

            }));

            let newData = [];

            Livewire.on('changedGauge', event => {
                newData = parseFloat(event.message);
                console.log(newData);
            });
            // Bring life to the dials
            setInterval(function() {
                Livewire.emit('change');
                // Speed
                let point,
                    newVal;

                if (gauge) {
                    point = gauge.series[0].points[0];
                    newVal = newData;
                    point.y = newVal;

                    point.update(newVal);
                }
            }, 2000);
        </script>
    @endpush
</div>
