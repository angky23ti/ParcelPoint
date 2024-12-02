@extends('SideBar.navbar', ['title' => 'Tambah Data Kelas'])
@section('content')
    <div class="card">
        <div class="card-body">
            <center>
                <h5 class="card-header">Tambah Data Kelas</h5>
            </center>
            <form action="/kelas" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input Nama Kelas -->
                <div class="form-group mt-1 mb-3">
                    <label for="nama"><b>Nama Kelas</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-person"></i>
                            </span>
                        </div>
                        <input type="text"
                               class="form-control @error('nama') is-invalid @enderror"
                               id="nisn" name="nama" placeholder="Masukkan Nama Kelas" value="{{ old('nama') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>

                <!-- Input Lantai Kelas -->
                <div class="form-group mt-1 mb-3">
                    <label for="lantai"><b>Lantai Kelas</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-person"></i>
                            </span>
                        </div>
                        <input type="text"
                               class="form-control @error('lantai') is-invalid @enderror"
                               id="lantai" name="lantai" placeholder="Masukkan Lantai Kelas" value="{{ old('lantai') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('lantai') }}</span>
                </div>

                <!-- Input Wali Kelas -->
                <div class="form-group mt-1 mb-3">
                    <label for="wali_kelas"><b>Wali kelas</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-building"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                               id="wali_kelas" name="wali_kelas" placeholder="Masukkan Nama Wali Kelas" value="{{ old('wali_kelas') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('wali_kelas') }}</span>
                </div>

                <!-- Input Foto Kelas -->
                <div class="form-group mt-1 mb-3">
                    <label for="foto"><b>Foto Kelas</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-camera"></i>
                            </span>
                        </div>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                    </div>
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                </div>
                <button type="submit" class="btn btn-primary w-100">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
