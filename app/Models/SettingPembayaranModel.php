<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingPembayaranModel extends Model
{
    use HasFactory;

    protected $table = 'setting_pembayaran';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id ',
        'nama',
        'nominal',
        'tahun_id',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
