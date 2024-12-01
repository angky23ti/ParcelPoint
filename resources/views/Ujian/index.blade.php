@extends('SideBar.navbar', ['title' => 'Data Ujian'])

@section('content')
    <div class="card">
        <center>
            <h3 class="card-header">Data Ujian</h3>
        </center>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <!-- Tombol tambah Ujian -->
                <div class="col-md-6">
                    <a href="{{ route('ujian.create') }}" class="btn btn-primary btn-sm">Tambah Ujian</a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kode Ujian</th>
                        <th>Mata Pelajaran</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Kelas</th>
                        <th>Kode Token</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cek jika ada data -->
                    @forelse ($ujian as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_ujian}}</td>
                            <td>{{ $item->mata_pelajaran }}</td>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_akhir }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="/ujian/{{ $item->id }}/edit" class="btn btn-warning btn-sm m1-2">Edit</a>
                                <form action="/ujian/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ml-2"
                                    onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {!! $ujian->links() !!}
            </div>
        </div>
    </div>
@endsection
