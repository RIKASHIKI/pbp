@extends('layout.menu')

@section('konten')
    <h1 class="text-center mb-4">Weather Information for Banjarbaru</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Current Weather</h3>
            <p><strong>Temperature:</strong> {{ $api['temperature'] ?? 'N/A' }}</p>
            <p><strong>Wind:</strong> {{ $api['wind'] ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $api['description'] ?? 'N/A' }}</p>
        </div>
    </div>

    <h3>Weather Forecast</h3>
    <table id="forecast-table" class="table-bordered table-hover table-striped table">
        <thead>
            <tr>
                <th style="text-align: center;">Day</th>
                <th style="text-align: center;">Temperature</th>
                <th style="text-align: center;">Wind</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($api['forecast']))
                @foreach ($api['forecast'] as $forecast)
                    <tr>
                        <td style="text-align: center;">{{ $forecast['day'] ?? 'N/A' }}</td>
                        <td style="text-align: center;">{{ $forecast['temperature'] ?? 'N/A' }}</td>
                        <td style="text-align: center;">{{ $forecast['wind'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align: center;">No forecast data available.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
