@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold">
    @php
    $nama_kategori = '';
    $judul = '';
    foreach($datakategoris as $dk) {
    if(request()->get('id_kategori') && (request()->get('id_kategori') == $dk->id)) {
    $nama_kategori = $dk->nama_kategori;
    }
    }
    if($nama_kategori != '') {
    $judul = '(Kategori '.$nama_kategori.' Tahun '.request()->get('tahun').')';
    }
    @endphp
    <span class="text-muted fw-light">Data Cluster {{$judul}}</span>
</h4>
<hr class="my-4">
<!-- Search -->

<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tahun</label>
    <div class="col-sm-3">
        <div class="input-group input-group-merge">
            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
            <select name="tahun" class="form-select" id="tahunSelect">
                @php
                $startYear = 2018;
                $currentYear = now()->year;
                @endphp

                @for ($year = $currentYear; $year >= $startYear; $year--)
                <option value="{{ $year }}" {{request()->get('tahun') == $year ? 'selected' : ''}}>{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Kategori</label>
    <div class="col-sm-3">
        <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
            <select name="id_kategori" id="kategoriSelect" class="form-select">
                {{-- @foreach($datakategoris as $dk)
                <option value="{{$dk->id}}" {{request()->get('id_kategori') == $dk->id ? 'selected' : ''}}>{{$dk->namakategori}}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="form-text"> Pilih tahun dan kategori bencana yang ingin ditampilkan</div>
    </div>
</div>
<a class="btn btn-primary mb-4 col-1" href="/datacluster">Kembali</a>
<input type="submit" value="Tampilkan" class="btn btn-success mb-4 mx-3 col-1" onclick="onFilterData()" />

<div id="map" style="height: 700px;">
    <div id="legend" class="card" style="width: 200px; position: absolute; top: 10px; right: 10px; z-index: 1000;">
        <div class="card-body">
            <h5 class="card-title">Legend</h5>
            <div class="d-flex flex-row mb-2">
                <div class="w-px-20 h-px-20 rounded-2" style="background-color: green;margin-right: 8px;"></div> Tidak beresiko
            </div>
            <div class="d-flex flex-row mb-2">
                <div class="w-px-20 h-px-20 rounded-2" style="background-color: yellow;margin-right: 8px;"></div> Rendah
            </div>
            <div class="d-flex flex-row mb-2">
                <div class="w-px-20 h-px-20 rounded-2" style="background-color: red;margin-right: 8px;"></div> Sedang
            </div>
            <div class="d-flex flex-row mb-2">
                <div class="w-px-20 h-px-20 rounded-2" style="background-color: black;margin-right: 8px;"></div> Tinggi
            </div>
            <!-- Add more categories as needed -->
        </div>
    </div>
</div>

<!--/ Striped Rows -->

<!--/ Responsive Table -->
@endsection

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    function onFilterData() {
        var tahun = document.getElementById('tahunSelect').value
        var id_kategori = document.getElementById('kategoriSelect').value
        window.location = '/mapcluster?tahun=' + tahun + '&id_kategori=' + id_kategori
    }

    // Your Leaflet map initialization code goes here
    // document.addEventListener('DOMContentLoaded', function() {

    //     
    //     var remappedData = {
    //         "type": "FeatureCollection",
    //         "features": [],
    //     }
    //     desas.features.map((item, idx) => {
    //         // const itemCluster = datacluster ? datacluster[idx] : {
    //         //     id: 0
    //         // }
    //         const filter = datacluster.filter((newItem, idx) => newItem.data.id_desa == item.properties.KODE)
    //         console.log(filter);
    //         if (filter.length > 0) {
    //             item.properties.dataCluster = filter[0]
    //             remappedData.features.push(item)
    //         }
    //     });

        const map = L.map('map');
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        var positronLabels = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
            attribution: '©OpenStreetMap, ©CartoDB',
        }).addTo(map);
        const geojson = L.geoJson(remappedData, {
            style: function(feature) {
                var fillColor = feature.properties.dataCluster.cluster == 1 ? 'green' : feature.properties.dataCluster.cluster == 2 ? 'yellow' :
                    feature.properties.dataCluster.cluster == 3 ? 'red' : 'black'
                return {
                    color: 'blue',
                    fillColor,
                    weight: 2,
                    fillOpacity: 0.5
                };
            },
            onEachFeature: function(feature, layer) {
                var center = layer.getBounds().getCenter(); // Get the center of the feature
                L.marker(center, {
                    // icon: L.divIcon({
                    //     className: 'label',
                    //     html: '<b style="font-size: 10px;">' + feature.properties.DESA + '</b>',
                    // })
                    icon: L.divIcon({
                        className: 'label',
                        html: '',
                    })
                }).addTo(map);
                let nama_kategori = "{{$nama_kategori}}";
                let parameter = namakategori != '' ? '<br>Parameter : ' + namakategori : '';
                layer.bindPopup('Desa  : ' + feature.properties.DESA + parameter + '<br>Cluster : ' + feature.properties.dataCluster.cluster);
            },
        }).addTo(map);
        /* global euCountries */

        map.setView([-1.0019421471006753, 135.98395234458667], 10);




    });
</script>