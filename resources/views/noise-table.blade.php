@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Club A Noise Level</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Noise Level (dB)</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noiseData as $data)
                <tr @if ((($data->created_at >= '06:00:00' && $data->created_at <= '22:00:00') && $data->noise_level > 60) || (($data->created_at < '06:00:00' || $data->created_at > '22:00:00') && $data->noise_level > 40)) style="background-color: red;" @endif>
                    <td>{{ $data->noise_level }}</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
