@extends('dashboard.dashboard')
@section('title', 'Data Siswa')
@section('content')
    <h1 class="text-center my-3">Data Siswa</h1>
    <div class="col-4 col-md-4 mb-3">
        <form action="{{ url('/siswa') }}" method="get">
            <div class="input-group">
                <input type="text" name="cari" id="cari" class="form-control" value="{{ request('cari') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
                <a href="{{ url('/siswa') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>NIK</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Foto</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $value)
                        <tr class="text-center">
                            <td>{{ $data->firstItem() + $key }}</td>
                            <td>{{ $value->nik }}</td>
                            <td>{{ $value->nisn }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->jenis_kelamin }}</td>
                            <td>{{ $value->pekerjaan }}</td>
                            <td>
                                <img src="{{ asset('foto/' . $value->foto) }}" alt="" width="15%">
                            </td>
                            <td>
                                <a href="" class="btn btn-warning my-3">Edit</a>
                                <a href="" class="btn btn-danger my-3">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center">
                            <h3>Data tidak ditemukan</h3>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="p-5">
        {{ $data->links() }}
    </div>
@endsection
