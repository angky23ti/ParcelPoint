@extends('SideBar.navbar', ['title' => 'Data Siswa'])
@section('content')
    <div class="card">
        <center>
            <h3 class="card-header">Data Siswa</h3>
        </center>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <!-- <div class="col-md-6">
                    <a href="{{ route('siswa.tambah') }}" class="btn btn-primary btn-sm">Tambah Siswa</a>
                </div> -->
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
                <!-- <tbody>
                    @foreach ($siswa as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->password }}</td> -->
                            <!-- <td>
                                <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td> -->
                        <!-- </tr> -->
                    <!-- @endforeach -->
                <!-- </tbody> -->
            </table>
            <!-- {{-- Pagination --}}
            {{ $siswa->links() }} -->
        </div>
    </div>
@endsection
