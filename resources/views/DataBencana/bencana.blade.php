@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Data Bencana</h5>
                            <a href="input-bencana"><button type="button" class="btn btn-primary">Tambah
                                    Data Bencana</button></a>
                            <a href="cetak-bahan" target="_blank"><button type="button" class="btn btn-secondary">Cetak
                                    Data Bencana</button></a>
                            <div class="cardbody p-2"></div>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kelurahan</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Kategori Bencana</th>
                                        <th scope="col">Total Kejadian</th>
                                        <th scope="col">Korban Meninggal</th>
                                        <th scope="col">Korban Luka</th>
                                        <th scope="col">Korban Mengungsi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bencana as $bencana)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td width="15%">{{ $bencana->nama_kelurahan }}</td>
                                            <td width="10%">{{ $bencana->tahun }}</td>
                                            <td width="19%">{{ $bencana->nama_kategori }}</td>
                                            <td width="13%">{{ $bencana->nilai_1 }}</td>
                                            <td width="16%">{{ $bencana->nilai_2 }}</td>
                                            <td width="11%">{{ $bencana->nilai_3 }}</td>
                                            <td width="20%">{{ $bencana->nilai_4 }}</td>
                                            <td>
                                                <a href="{{ url('home/bencana/edit/' . $bencana->id) }}"><span
                                                    class="badge bg-success text-white"> Edit</span></a>
                                                <a href="{{ url('home/bencana/delete/' . $bencana->id) }}"><span
                                                    class="badge bg-danger text-white"> Hapus</span></a>
                                            </td>
                                            
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
