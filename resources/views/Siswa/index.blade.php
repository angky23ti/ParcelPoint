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

            <!-- Tabel data siswa -->
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
                    <!-- Cek jika ada data -->
                    @forelse ($siswa as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->password }}</td> 
                            <td>
                                <a href="/siswa/{{ $item->id }}/edit" class="btn btn-warning btn-sm m1-2">Edit</a>
                                <form action="/siswa/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ml-2"
                                    onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Link pagination, tetap tampil meskipun tidak ada data -->
            <div class="pagination-wrapper">
                {!! $siswa->links() !!}
            </div>
        </div>
    </div>
@endsection