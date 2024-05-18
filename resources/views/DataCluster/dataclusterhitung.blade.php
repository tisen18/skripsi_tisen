@extends('template')
@section('content')
<h4 class="fw-bold">
    <span class="text-muted fw-light">Perhitungan cluster /</span> List Data ({{$iterasi}}x iterasi)
</h4>

<div class="content-wrapper mt-n5">
    <div class="content"><!-- For Components documentaion -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tabel Data Yang Ada</h5>
                        <div class="cardbody p-2"></div>
                        <table class="table datatable">
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
                                            : ($datacluster['cluster'] == 3 ? 'Tidak beresiko' 
                                            : ($datacluster['cluster'] == 2 ? 'Sedang' 
                                            : ($datacluster['cluster'] == 1 ? 'Tinggi' : 'Tinggi'))) }}</strong></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Tabel Data Cluster</h5>
                        <div class="cardbody p-2"></div>
                        <table class="table datatable">
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
                                            : ($datacluster['cluster'] == 1 ? 'Tinggi' 
                                            : ($datacluster['cluster'] == 2 ? 'Sedang' 
                                            : ($datacluster['cluster'] == 3 ? 'Rendah' : 'Aman'))) }}</strong></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection