@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Edit Parameter</h5>
                            <form action="{{ url('/home/parameter/update/' . $parameter->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Nama Parameter</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_parameter" id="nama_parameter" class="form-control"
                                            value="{{ $parameter->nama_parameter }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Edit Parameter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
