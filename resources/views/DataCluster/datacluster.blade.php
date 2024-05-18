@extends('template')
@section('content')
<div class="content-wrapper mt-n5">
    <div class="content"><!-- For Components documentaion -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tabel Data Cluster</h5>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tahun</label>
                    <div class="col-sm-3">
                        <div class="col-sm-10">
                            <select class="form-control" aria-label="Default select example" name="tahun" id="tahun">
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
                        <div class="col-sm-10">
                            <select class="form-control" aria-label="Default select example" name="id_kategori" id="id_kategori">
                                @foreach($datakategoris as $dk)
                                <option value="{{$dk->id}}" {{request()->get('id_kategori') == $dk->id ? 'selected' : ''}}>{{$dk->nama_kategori}}</option>
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
                    $params = request()->get('tahun') ? ('?tahun='.request()->get('tahun').'&id_kategori='.request()->get('id_kategori')) : '';
                    @endphp
                    <a href="/datacluster/perhitungan{{$params}}" class="btn btn-danger">Perhitungan</a>
                    <a class="btn btn-success" style="margin-left: 16px;" href="/mapcluster">Map</a>
                    <button type="button" class="btn btn-warning" style="margin-left: 16px;" onclick="printToPDF('Laporan_cluster')">Print</button>

                </div>

                <table class="table table-responsive p-2">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Jumlah Kejadian</th>
                            <th>Korban Meninggal Dunia</th>
                            <th>Korban Mengungsi</th>
                            <th>Korban Luka - Luka</th>
                            <th>Cluster</th>
                            <th>Hasil CLuster</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-center" id="itemList">
                        @foreach ($dataclusters as $datacluster)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['data']->nama_kecamatan}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['data']->nama_kelurahan}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['data']->tahun}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['data']->nama_kategori}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['data']->nilai_1}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['data']->nilai_2}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['data']->nilai_3}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['data']->nilai_4}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$datacluster['cluster']}}</strong></td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ !$datacluster['cluster'] ? 'Tidak ditemukan' 
                                            : ($datacluster['cluster'] == 3 ? 'Tinggi' 
                                            : ($datacluster['cluster'] == 2 ? 'Sedang' 
                                            : ($datacluster['cluster'] == 1 ? 'Aman' : 'Aman'))) }}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function onFilterData() {
        var tahun = document.getElementById('tahun').value
        var id_kategori = document.getElementById('id_kategori').value
        window.location = '/datacluster?tahun=' + tahun + '&id_kategori=' + id_kategori
    }
</script>