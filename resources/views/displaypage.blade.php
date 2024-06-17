<!DOCTYPE html>
<html>
<head>
    <title>Noise Monitor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Noise Level Monitor</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Sensor 1</h3>
                <canvas id="sensor1Chart"></canvas>
            </div>
            <div class="col-md-6">
                <h3>Sensor 2</h3>
                <canvas id="sensor2Chart"></canvas>
            </div>
        </div>
    </div>
    <script>
        const sensor1Ctx = document.getElementById('sensor1Chart').getContext('2d');
        const sensor2Ctx = document.getElementById('sensor2Chart').getContext('2d');
        let sensor1Chart = new Chart(sensor1Ctx, { type: 'line', data: { labels: [], datasets: [{ label: 'Noise Level', data: [], borderColor: 'rgba(75, 192, 192, 1)', borderWidth: 1 }] } });
        let sensor2Chart = new Chart(sensor2Ctx, { type: 'line', data: { labels: [], datasets: [{ label: 'Noise Level', data: [], borderColor: 'rgba(153, 102, 255, 1)', borderWidth: 1 }] } });

        function fetchData() {
            fetch('/api/noise-data')
                .then(response => response.json())
                .then(data => {
                    let sensor1Data = data.filter(d => d.sensor_id === 'sensor1');
                    let sensor2Data = data.filter(d => d.sensor_id === 'sensor2');

                    sensor1Chart.data.labels = sensor1Data.map(d => new Date(d.created_at).toLocaleTimeString());
                    sensor1Chart.data.datasets[0].data = sensor1Data.map(d => d.noise_level);
                    sensor1Chart.update();

                    sensor2Chart.data.labels = sensor2Data.map(d => new Date(d.created_at).toLocaleTimeString());
                    sensor2Chart.data.datasets[0].data = sensor2Data.map(d => d.noise_level);
                    sensor2Chart.update();
                });
        }

        setInterval(fetchData, 1000); // Fetch data every second
    </script>
</body>
</html>
