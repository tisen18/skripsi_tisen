@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">

        @php
            $namakategori = '';
            $judul = '';
            foreach ($datakategoris as $dk) {
                if (request()->get('id_kategori') && request()->get('id_kategori') == $dk->id) {
                    $namakategori = $dk->namakategori;
                }
            }
            if ($namakategori != '') {
                $judul = '(Kategori ' . $namakategori . ' Tahun ' . request()->get('tahun') . ')';
            }
        @endphp

        <div class="content"><!-- For Components documentaion -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Cluster {{ $judul }}</h5>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tahun</label>
                        <div class="col-sm-3">
                            <div class="col-sm-10">
                                <select class="form-control" aria-label="Default select example" name="tahun"
                                    id="tahun">
                                    @php
                                        $startYear = 2018;
                                        $currentYear = now()->year;
                                    @endphp

                                    @for ($year = $currentYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}"
                                            {{ request()->get('tahun') == $year ? 'selected' : '' }}>{{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Kategori</label>
                        <div class="col-sm-3">
                            <div class="col-sm-10">
                                <select class="form-control" aria-label="Default select example" name="id_kategori"
                                    id="id_kategori">
                                    @foreach ($datakategoris as $dk)
                                        <option value="{{ $dk->id }}"
                                            {{ request()->get('id_kategori') == $dk->id ? 'selected' : '' }}>
                                            {{ $dk->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Tampilkan" class="btn btn-primary mb-4 col-2" onclick="onFilterData()" />

                    <div class="d-flex flex-row mb-3">
                        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tentukan data centroid
                        </button> -->
                        @php
                            $params = request()->get('tahun')
                                ? '?tahun=' . request()->get('tahun') . '&id_kategori=' . request()->get('id_kategori')
                                : '';
                        @endphp

                    </div>
                </div>
            </div>
        </div>
        <div class="content"><!-- For Components documentaion -->

            <div class="card">
                <div class="card-body">

                    <div id="map" style="height: 700px;"></div>
                    <div id="legend">
                        <div class="legend-title">Keterangan Warna</div>
                        <div class="legend-item"><span class="legend-color color-yellow"></span>Cluster 1: Tinggi : Merah</div>
                        <div class="legend-item"><span class="legend-color color-blue"></span>Cluster 2: Sedang : Kuning</div>
                        <div class="legend-item"><span class="legend-color color-green"></span>Cluster 3: Rendah (Aman) : Hijau</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    function onFilterData() {
        var tahun = document.getElementById('tahun').value
        var id_kategori = document.getElementById('id_kategori').value
        window.location = '/mapcluster?tahun=' + tahun + '&id_kategori=' + id_kategori
    }

    // Your Leaflet map initialization code goes here
    document.addEventListener('DOMContentLoaded', function() {

        var datacluster = JSON.parse(@json($dataclusters));
        

        var remappedData = {
            "type": "FeatureCollection",
            "features": [],
        }
        lurah.features.map((item, idx) => {
            // const itemCluster = datacluster ? datacluster[idx] : {
            //     id: 0
            // }
            const filter = datacluster.filter((newItem, idx) => newItem.data.id_kelurahan == item.properties
                .KODE)
            if (filter.length > 0) {
                item.properties.dataCluster = filter[0]
                remappedData.features.push(item)
            }
        });

        const map = L.map('map');
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        var positronLabels = L.tileLayer(
        'https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
            attribution: '©OpenStreetMap, ©CartoDB',
        }).addTo(map);

        const geojson = L.geoJson(remappedData, {
            style: function(feature) {
                var fillColor = feature.properties.dataCluster.cluster == 1 ? 'green' : feature
                    .properties.dataCluster.cluster == 2 ? 'yellow' :
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
                let namakategori = "{{ $namakategori }}";
                let parameter = namakategori != '' ? '<br>Parameter : ' + namakategori : '';
                layer.bindPopup('Kelurahan  : ' + feature.properties.NAMOBJ + parameter +
                    '<br>Cluster : ' + feature.properties.dataCluster.cluster + parameter +
                    '<br>Total Kejadian : ' + feature.properties.dataCluster.data.nilai_1);
            },
        }).addTo(map);
        /* global euCountries */

        map.setView([-7.978798521600528, 112.66254627738317], 12);


    });
</script>
