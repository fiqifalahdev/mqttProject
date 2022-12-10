<div class="{{ $className }}">
    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-4">
        <div class="bg-white border-b border-gray-200">
            <div id="{{ $gaugeName }}" class="w-[200] h-[100] sm:w-[400px] sm:h-[200px]"></div>
        </div>
    </div>
    @push('scripts')
        <script>
            // The speed gauge
            function createChart(data, name, eventName) {
                let gauge = Highcharts.chart(name, Highcharts.merge({
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
                }, {
                    yAxis: {
                        min: 0,
                        max: 50,
                        title: {
                            text: name
                        }
                    },

                    credits: {
                        enabled: false
                    },

                    series: [{
                        name: name,
                        data: [data],
                        dataLabels: {
                            format: '<div style="text-align:center">' +
                                '<span style="font-size:14px">{y}</span><br/>' +
                                '</div>'
                        },
                        tooltip: {
                            valueSuffix: ' km/h'
                        }
                    }]

                }));

                let newData = [];
                setInterval(function() {
                    Livewire.emit('change');
                    let point,
                        newVal;

                    if (gauge) {
                        point = gauge.series[0].points[0];
                        newVal = newData;
                        point.y = newVal;

                        point.update(newVal);
                    }
                }, 2000);

                Livewire.on(eventName, event => {
                    newData = parseFloat(event.message);
                    console.log(newData);
                });
                // Bring life to the dials


            }

            createChart(parseFloat(@js($data)), @js($gaugeName), @js($fetchData));
        </script>
    @endpush
</div>
