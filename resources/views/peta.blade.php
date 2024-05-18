@extends('template')
@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Peta</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script src="" {{ asset('js/leaflet.ajax.js') }}"></script>

        <style>
            #map {
                width: 50%;
                position: absolute;
                top: 54%;
                bottom: 50px;
                left: 58%;
                transform: translate(-50%, -50%);
                padding: 20px;
            }
        </style>

    </head>

    <body>
        <div id="map" style="height: 700px;">
            <div id="legend" class="card"
                style="width: 200px; position: absolute; top: 10px; right: 10px; z-index: 1000;">
                <div class="card-body">
                    <h5 class="card-title">Legend</h5>
                    <div class="d-flex flex-row mb-2">
                        <div class="w-px-20 h-px-20 rounded-2" style="background-color: green; margin-right: 10px;"></div>
                        Tidak beresiko
                    </div>
                    <div class="d-flex flex-row mb-2">
                        <div class="w-px-20 h-px-20 rounded-2" style="background-color: yellow; margin-right: 8px;"></div>
                        Sedang
                    </div>
                    <div class="d-flex flex-row mb-2">
                        <div class="w-px-20 h-px-20 rounded-2" style="background-color: red; margin-right: 8px;"></div>
                        Tinggi
                    </div>
                    <!-- Add more categories as needed -->
                </div>
            </div>
        </div>
    </body>

    <script>
        var map = L.map('map').setView([-7.9779804, 112.6316949, 12.18], 12);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const marker = L.marker([-7.9167168, 112.6341595, 21.44]).addTo(map)
            .bindPopup('<b>Hello world!</b><br />In Here Is ITN Malang.').openPopup();
    </script>

    </html>
@endsection
