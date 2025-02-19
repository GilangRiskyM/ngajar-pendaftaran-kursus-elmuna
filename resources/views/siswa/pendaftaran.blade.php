@extends('layout')
@section('title', 'Daftar Kursus')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Form Pendaftaran Kursus</h2>

            <form action="{{ url('/daftar-kursus') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik"
                        class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" name="nisn" id="nisn"
                        class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}">
                    @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                        name="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>L</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>P</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan"
                        class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto"
                        class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 text-center">
                    <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
