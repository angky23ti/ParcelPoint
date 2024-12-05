@extends('SideBar.navbar', ['title' => 'Tambah Data Ujian'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5>HIIIII {{ Auth::user()->name }}</h5>
        </div>
    </div>
@endsection
