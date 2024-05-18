@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Input Bencana Alam</h5>
                            <form action="{{ url('/home/bencana/update/' . $dataubah->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Pilih Kelurahan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" aria-label="Default select example" name="id_kelurahan"
                                            id="id_kelurahan">
                                            <option selected>Pilih Kelurahan</option>
                                            @if ($lurah->count())
                                                @foreach ($lurah as $lurah)
                                                    <option value="{{ $lurah->id }}"
                                                        {{ $dataubah->id_kelurahan == $lurah->id ? 'selected' : '' }}>
                                                        {{ $lurah->nama_kelurahan }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tahung</label>
                                    <div class="col-sm-10">
                                        <select name="tahun" class="form-control" aria-label="Default select example"
                                            id="tahun">
                                            <option value="2020" {{ $dataubah->tahun == '2020' ? 'selected' : '' }}>2020
                                            </option>
                                            <option value="2021" {{ $dataubah->tahun == '2021' ? 'selected' : '' }}>2021
                                            </option>
                                            <option value="2022" {{ $dataubah->tahun == '2022' ? 'selected' : '' }}>2022
                                            </option>
                                            <option value="2023" {{ $dataubah->tahun == '2023' ? 'selected' : '' }}>2023
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select name="id_kategori" id="defaultSelect" class="form-control">
                                            @foreach ($kategori as $dk)
                                                <option value="{{ $dk->id }}">{{ $dk->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nilai_1" class="col-sm-2 col-form-label">Kejadian Bencana</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nilai_1" id="nilai_1" class="form-control"
                                            value="{{ $dataubah->nilai_1 }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilai_2" class="col-sm-2 col-form-label">Korban Meninggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nilai_2" id="nilai_2" class="form-control"
                                            value="{{ $dataubah->nilai_2 }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilai_3" class="col-sm-2 col-form-label">Korban Luka</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nilai_3" id="nilai_3" class="form-control"
                                            value="{{ $dataubah->nilai_3 }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilai_4" class="col-sm-2 col-form-label">Korban Mengungsi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nilai_4" id="nilai_4" class="form-control"
                                            value="{{ $dataubah->nilai_4 }}">
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
