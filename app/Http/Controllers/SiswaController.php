<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function pendaftaran()
    {
        return view('siswa.pendaftaran');
    }

    function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|min:16',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:10240'
        ], [
            'nik.required' => 'NIK wajib diisi!',
            'nik.min' => 'NIK minimal :min karakter!',
            'nama.required' => 'Nama wajib diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi!',
            'pekerjaan.required' => 'Pekerjaan wajib diisi!',
            'foto.required' => 'Foto wajib diisi!',
            'foto.image' => 'Foto harus berupa gambar!',
            'foto.mimes' => 'Foto harus berformat .png, .jpg, .jpeg!',
            'foto.max' => 'Foto tidak boleh lebih dari :max MB!',
        ]);

        if ($request->hasFile('foto')) {
            $gambar = $request->file('foto');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $lokasi = public_path('foto');
            $gambar->move($lokasi, $namaGambar);
        }

        $data = [
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'foto' => $namaGambar,
        ];

        Siswa::create($data);
        sweetalert()->success('Anda, ' . $request->nama . ' telah berhasil mendaftar!');
        return redirect('/pendaftaran');
    }

    function index(Request $request)
    {
        $cari = $request->cari;

        $data = Siswa::where(function ($query) use ($cari) {
            if ($cari) {
                $query->where('nik', 'like', '%' . $cari . '%')
                    ->orWhere('nisn', 'like', '%' . $cari . '%')
                    ->orWhere('nama', 'like', '%' . $cari . '%')
                    ->orWhere('pekerjaan', 'like', '%' . $cari . '%');
            }
        })->orderBy('id', 'desc')
            ->paginate(2)
            ->withQueryString();

        return view('siswa.index', ['data' => $data]);
    }
}
