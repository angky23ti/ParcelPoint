@extends('SideBar.navbar', ['title' => 'Data Guru'])

@section('content')
    <div class="card">
        <center>
            <h3 class="card-header">Data Guru</h3>
        </center>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm">Tambah Guru</a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guru as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>
                                @if($item->foto)
                                    <a href="{{ \Storage::url($item->foto) }}" target="_blank">
                                        <img src="{{ \Storage::url($item->foto) }}" style="max-width: 50px; height: auto;" />
                                    </a>
                                @endif
                                {{ $item->nama }}
                            </td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->username }}</td>
                            <td>
                                <a href="/guru/{{ $item->id }}/edit" class="btn btn-warning btn-sm m1-2">Edit</a>
                                <form action="/guru/{{ $item->id }}" method="POST" class="d-inline" id="deleteForm-{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="confirmDelete({{ $item->id }})">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $guru->links() !!}
            </div>
        </div>
    </div>

    @if(session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        function confirmDelete(id) {
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + id).submit();
                    swalWithBootstrapButtons.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                } else {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });
        }
    </script>
@endsection
