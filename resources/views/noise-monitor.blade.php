<!-- resources/views/noise-monitor.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Noise Level Monitor</h1>
    <div class="row">
        <div class="col-md-12">
            <h3>Sensor Data Graph</h3>
            <canvas id="noiseChart"></canvas>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h3>Sensor Data Table</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sensor ID</th>
                        <th>Noise Level</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noiseData as $data)
                        <tr>
                            <td>{{ $data->sensor_id }}</td>
                            <td>{{ $data->noise_level }}</td>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('noiseChart').getContext('2d');
    const noiseChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [
                {
                    label: 'Sensor 1 Noise Level',
                    data: [],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                },
                {
                    label: 'Sensor 2 Noise Level',
                    data: [],
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'minute',
                        tooltipFormat: 'll HH:mm'
                    },
                    title: {
                        display: true,
                        text: 'Time'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Noise Level'
                    }
                }
            }
        }
    });

    function fetchData() {
        fetch('/api/noise-data')
            .then(response => response.json())
            .then(data => {
                let sensor1Data = data.filter(d => d.sensor_id === 'sensor1');
                let sensor2Data = data.filter(d => d.sensor_id === 'sensor2');

                noiseChart.data.labels = sensor1Data.map(d => new Date(d.created_at));
                noiseChart.data.datasets[0].data = sensor1Data.map(d => ({ x: new Date(d.created_at), y: d.noise_level }));
                noiseChart.data.datasets[1].data = sensor2Data.map(d => ({ x: new Date(d.created_at), y: d.noise_level }));
                noiseChart.update();
            });
    }

    setInterval(fetchData, 1000); // Fetch data every second
</script>
@endsection
