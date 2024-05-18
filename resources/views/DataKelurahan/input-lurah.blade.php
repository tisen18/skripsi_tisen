@extends('template')
@section('content')
<div class="content-wrapper mt-n5">
    <div class="content"><!-- For Components documentaion -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tabel Input Kelurahan</h5>
                        <form action="{{ route('lurah-simpan') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label for="nama_kelurahan" class="col-sm-2 col-form-label">Nama Kelurahan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_kelurahan" id="nama_kelurahan" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pilih Kecamatan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" aria-label="Default select example" name="id_kecamatan" id="id_kecamatan">
                                        <option selected>Pilih Kecamatan</option>
                                        @if ($camat->count())
                                        @foreach ($camat as $camat)
                                        <option value="{{ $camat->id }}">{{ $camat->nama_kecamatan }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
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