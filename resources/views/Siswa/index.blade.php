@extends('SideBar.navbar', ['title' => 'Data Siswa'])
@section('content')
    <div class="card">
        <center>
            <h3 class="card-header">Data Siswa</h3>
        </center>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <!-- Tombol tambah siswa -->
                <div class="col-md-6">
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">Tambah Siswa</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->password }}</td> 
                            <td>
                                <!-- Tombol edit dan hapus bisa disertakan di sini -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $siswa->links() }}
        </div>
    </div>
@endsection