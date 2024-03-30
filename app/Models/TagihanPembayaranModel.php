<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanPembayaranModel extends Model
{
    use HasFactory;

    protected $table = 'tagihan_pembayaran';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id ',
        'siswa_id',
        'setting_pembayaran_id',
        'bulan_tagihan',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
