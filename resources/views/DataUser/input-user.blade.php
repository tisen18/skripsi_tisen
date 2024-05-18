@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Input User</h5>
                            <form action="{{ route('user-simpan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 ">
                                    <label for="name" class="col-sm-2 col-form-label">Nama User</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 ">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" id="email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 ">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="password" id="password"
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
