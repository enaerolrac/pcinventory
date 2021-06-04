var temp = [];
var flowrate =[];

$(document).ready(function () {
    var realtimeChartConfig = {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                {
                    type: "line",
                    fill: false,
                    label: 'Temperature',
                    data: new Array(),
                    backgroundColor: '#00b050',
                    borderColor: '#00b050',
                    yAxisID: 'A',
                    borderDash: [0, 0],
                },
                {
                    type: "line",
                    fill: false,
                    label: 'Flowrate',
                    data: new Array(),
                    backgroundColor: 'blue',
                    borderColor: 'blue',
                    yAxisID: 'B',
                    borderDash: [5, 5],
                },
            ]
        },
        options: {
            tooltips: {
                mode: 'nearest',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: false
            },
            pan: {
                enabled: true,
                mode: 'x',
                rangeMax: {
                    x: 10000
                },
                rangeMin: {
                    x: 0
                }
            },
            zoom: {
                enabled: true,
                mode: 'x',
                rangeMax: {
                    x: 20000
                },
                rangeMin: {
                    x: 1000
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: false,
                streaming: {
                    frameRate: 30
                }
            },
            annotation: {
                annotations: [{
                    type: 'line',
                    mode: 'vertical',
                    scaleID: 'x-axis-0',
                    value: 'None',
                    borderColor: '#072e3c',
                    borderWidth: 2,
                    borderDash: [4, 4],
                }],
            },
            legend: {
                display: true,
                labels: { fontColor: '#333', usePointStyle: false, boxWidth: 10, fontSize: 11, padding: 20 },
                position: 'bottom'
            },
            elements: {
                point: {
                    radius: 1
                }
            },
            scales: {
                xAxes: [
                    {
                        type: 'realtime',
                        realtime: {
                            duration: 20000,
                            ttl: 60000,
                            refresh: 1000,
                            delay: 2000,
                            pause: false,
                            onRefresh: function (chart) {
                                chart.config.data.datasets[0].data.push({
                                    x: Date.now(),
                                    y:temperature
                                });
                                chart.config.data.datasets[1].data.push({
                                    x: Date.now(),
                                    y:flowrate
                                });
                            }
                        }
                    }
                ],
                yAxes: [
                    { id: 'A', position: 'left', scaleLabel: { position: 'left', display: true, labelString: 'Temperature' }, gridLines: { display: true, color: 'rgb(243, 242, 247)' }, ticks: { min: 0 } },
                    { id: 'B', position: 'right', scaleLabel: { position: 'right', display: true, labelString: 'Pressure' }, gridLines: { display: true, color: 'rgb(243, 242, 247)' }, ticks: { min: 0 } }
                ]
            },
        }
    };

    var ctx = document.getElementById("realtimeChart").getContext("2d");
    var realtimeChart = new Chart(ctx, realtimeChartConfig);


    var ws = new WebSocket("ws:/192.168.1.80:3001");
    ws.onopen = (e) => {
        console.log("Connection Established.", e);
    }

    ws.onerror = (e) => {
        console.log(e);
    }

    ws.onmessage = (e) => {
        var data = JSON.parse(e.data); // object
        setTemperature(data.temp);
        setFlowrate(data.flowrate)
    }

        
}); 


////
function setTemperature(value) {
    temperature = value;
}

function setFlowrate(value) {
    flowrate = value;
}
