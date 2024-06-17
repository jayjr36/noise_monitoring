<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to the Noise Monitor Dashboard') }}</div>

                <div class="card-body">
                    <p>Welcome to the Noise Monitor Dashboard. Here you can monitor real-time noise levels from multiple sensors.</p>
                    <p>Use the buttons below to navigate to the graph or table view of the data.</p>

                    <a href="{{ url('/graph') }}" class="btn btn-primary">View Graph</a>
                    <a href="{{ url('/table') }}" class="btn btn-secondary">View Table</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
