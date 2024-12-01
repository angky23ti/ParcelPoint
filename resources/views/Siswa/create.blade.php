@extends('SideBar.navbar', ['title' => 'Tambah Data Siswa'])
@section('content')
    <div class="card">
        <div class="card-body">
            <center>
                <h5 class="card-header">Tambah Data Siswa</h5>
            </center>
            <form action="/siswa" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                    id="nama" name="nama"
                        value="{{ old('nama') }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                    id="kelas" name="kelas"
                        value="{{ old('kelas') }}">
                    <span class="text-danger">{{ $errors->first('kelas') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                    id="username" name="username">
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="password">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror"
                    id="password" name="password">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
