@extends('SideBar.navbar', ['title' => 'Tambah Data Ujian'])
@section('content')
    <div class="card">
        <div class="card-body">
            <center>
                <h5 class="card-header">Tambah Data Ujian</h5>
            </center>
            <form action="/ujian" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input Kode Ujian -->
                <div class="form-group mt-1 mb-3">
                    <label for="kode_ujian"><b>Kode Ujian</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-key"></i>
                            </span>
                        </div>
                        <input type="text"
                               class="form-control @error('kode_ujian') is-invalid @enderror"
                               id="kode_ujian" name="kode_ujian" placeholder="Masukkan Kode Ujian" value="{{ old('kode_ujian') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('kode_ujian') }}</span>
                </div>

                <!-- Input Mata Pelajaran -->
                <div class="form-group mt-1 mb-3">
                    <label for="mata_pelajaran"><b>Mata Pelajaran</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-book"></i>
                            </span>
                        </div>
                        <input type="text"
                               class="form-control @error('mata_pelajaran') is-invalid @enderror"
                               id="mata_pelajaran" name="mata_pelajaran" placeholder="Masukkan Mata Pelajaran" value="{{ old('mata_pelajaran') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('mata_pelajaran') }}</span>
                </div>

                <!-- Input Tanggal Mulai -->
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_mulai"><b>Tanggal Mulai</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-calendar"></i>
                            </span>
                        </div>
                        <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                               id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('tanggal_mulai') }}</span>
                </div>

                <!-- Input Tanggal Akhir -->
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_akhir"><b>Tanggal Akhir</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-calendar"></i>
                            </span>
                        </div>
                        <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror"
                               id="tanggal_akhir" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('tanggal_akhir') }}</span>
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
                               id="kelas" name="kelas" placeholder="Masukkan Kelas" value="{{ old('kelas') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('kelas') }}</span>
                </div>

                <!-- Input Kode Token -->
                <div class="form-group mt-1 mb-3">
                    <label for="kode_token"><b>Kode Token</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-shield-lock"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control @error('kode_token') is-invalid @enderror"
                               id="kode_token" name="kode_token" placeholder="Masukkan Kode Token" value="{{ old('kode_token') }}">
                    </div>
                    <span class="text-danger">{{ $errors->first('kode_token') }}</span>
                </div>

                <button type="submit" class="btn btn-primary w-100">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
