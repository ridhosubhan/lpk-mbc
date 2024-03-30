<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPegawaiModel extends Model
{
    use HasFactory;

    protected $table = 'profil_pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id ',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'foto',
        'kat_pegawai',
        'email_user',
        'created_at',
        'updated_at',
    ];
}
