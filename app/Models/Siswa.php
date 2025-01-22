<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nik',
        'nisn',
        'nama',
        'jenis_kelamin',
        'pekerjaan',
        'foto'
    ];
}
