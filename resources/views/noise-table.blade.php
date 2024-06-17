<!-- resources/views/noise-table.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Noise Level Data</h1>
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
@endsection
