@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Data Kecamatan</h5>
                            <a href="input-camat"><button type="button" class="btn btn-primary">Tambah
                                    Data Kecamatan</button></a>
                            <a href="cetak-bahan" target="_blank"><button type="button" class="btn btn-secondary">Cetak
                                    Data Kecamatan</button></a>
                            <div class="cardbody p-2"></div>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kecamatan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($camat as $camat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td width="80%">{{ $camat->nama_kecamatan }}</td>

                                            <td>
                                                <a href="{{ url('home/camat/edit/' . $camat->id) }}"><span
                                                    class="badge bg-success text-white"> Edit</span></a>
                                                <a href="{{ url('home/camat/delete/' . $camat->id) }}"><span
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
