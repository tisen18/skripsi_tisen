@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Input Kategori</h5>
                            <form action="{{ route('kategori-simpan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_kategori" id="nama_kategori"
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
