<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'nama_cust', 'email_cust', 'tgl_pesan', 'tgl_bayar', 'total_bayar', 'kode_tiket'
    ];
}
