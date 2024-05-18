@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Input Kecamatan</h5>
                            <form action="{{ route('camat-simpan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="nama_kecamatan" class="col-sm-2 col-form-label">Nama Kecamatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_kecamatan" id="nama_kecamatan"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
