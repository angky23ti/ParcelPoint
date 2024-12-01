@extends('SideBar.navbar', ['title' => 'Tambah Data Guru'])
@section('content')
    <div class="card">
        <div class="card-body">
            <center>
                <h5 class="card-header">Tambah Data Guru</h5>
            </center>
            <form action="/Guru" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input nip -->
                <div class="form-group mt-1 mb-3">
                <label for="nip"><b>NIP</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                            <i class="bi bi-person"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip"
                        value="{{ old('nip') ?? $Guru->nip }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('nip') }}</span>
                </div>

            <!-- Input Nama -->
                <div class="form-group mt-1 mb-3">
                    <label for="nama"><b>Nama</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-person"></i>
                            </span>
                        </div>
                        <input type="text"
                               class="form-control @error('nama') is-invalid @enderror"
                               id="nama" name="nama" placeholder="Masukkan nama lengkap" value="{{ old('nama') ?? $Guru->nama}}">
                    </div>
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>

                <!-- Input Kelas -->
                <div class="form-group mt-1 mb-3">
                    <label for="kelas"><b>Kelas</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-building"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                               id="kelas" name="kelas" placeholder="Masukkan kelas" value="{{ old('kelas') ?? $Guru->kelas }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('kelas') }}</span>
                </div>

                <!-- Input Username -->
                <div class="form-group mt-1 mb-3">
                    <label for="username"><b>Username</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-person-circle"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                               placeholder="Masukkan username" value="{{ old('username') ?? $Guru->username }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                </div>

                <!-- Input Password -->
                <div class="form-group mt-1 mb-3">
                    <label for="password"><b>Password</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Masukkan password">
                    </div>
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <!-- Input Foto -->
                <div class="form-group mt-1 mb-3">
                    <label for="foto"><b>Foto Pasien</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-camera"></i>
                            </span>
                        </div>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                    </div>
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                    <img src="{{  Storage::url($Guru->foto) }}" alt="Foto Guru" class="img-thumbnail mt-2"
                        style="width: 100px">
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
