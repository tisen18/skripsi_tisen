@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Edit Kecamatan</h5>
                            <form action="{{ url('/home/camat/update/' . $camat->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Nama Kecamatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control"
                                            value="{{ $camat->nama_kecamatan }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Edit Produk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
