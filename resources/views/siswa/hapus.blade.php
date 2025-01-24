@extends('dashboard.dashboard');
@section('title', 'Hapus Data Siswa')
@section('content')
    <h1 class="text-center my-3">Hapus Data Siswa</h1>
    <div class="alert alert-danger  mb-3" role="alert">
        <h2 class="text-center">
            <i class='bx bx-error' style='color:#ff0000'></i> Apakah anda yakin ingin menghapus data siswa ini?
            <br>
            Data yang dihapus tidak dapat dikembalikan!
        </h2>
    </div>
    <table class="table">
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data->nik }}</td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td>{{ $data->nisn }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $data->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $data->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td>
                <img src="{{ asset('foto/' . $data->foto) }}" alt="" class="img-thumbnail" width="15%">
            </td>
        </tr>
    </table>
    <div class="my-3">
        <center>
            <form action="{{ url('/hapus-siswa/' . $data->id) }}" method="post">
                @csrf
                @method('delete')
                <a href="{{ url('/siswa') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </center>
    </div>
@endsection
