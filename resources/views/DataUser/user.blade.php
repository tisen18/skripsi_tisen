@extends('template')
@section('content')
    <div class="content-wrapper mt-n5">
        <div class="content"><!-- For Components documentaion -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Data User</h5>
                            <a href="input-user"><button type="button" class="btn btn-primary">Tambah
                                    Data User</button></a>
                            <div class="cardbody p-2"></div>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td width="35%">{{ $user->name }}</td>
                                            <td width="45%">{{ $user->email }}</td>
                                            <td>
                                                <a href="{{ url('home/user/edit/' . $user->id) }}"><span
                                                    class="badge bg-success text-white"> Edit</span></a>
                                                <a href="{{ url('home/user/delete/' . $user->id) }}"><span
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
