<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSiswaModel extends Model
{
    use HasFactory;

    protected $table = 'profil_siswa';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id ',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'foto',
        'email_user',
        'created_at',
        'updated_at',
    ];
}
