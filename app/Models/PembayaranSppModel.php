<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranSppModel extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_spp';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id ',
        'spp_id',
        'siswa_id',
        'bulan_bayar',
        'tanggal_bayar',
        'tagihan_id',
        'bukti_transfer',
        'lunas',
        'created_at',
        'updated_at',
    ];
}
