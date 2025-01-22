@extends('layout')
@section('title', 'Daftar Kursus')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Form Pendaftaran Kursus</h2>
            @if ($errors->any())
                <div class="alert alert-danger mx-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/daftar-kursus') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik') }}">
                </div>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn') }}">
                </div>
                <div class="nb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>L</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>P</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                        value="{{ old('pekerjaan') }}">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control" value="{{ old('foto') }}">
                </div>
                <div class="mb-3">
                    <center>
                        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endsection
