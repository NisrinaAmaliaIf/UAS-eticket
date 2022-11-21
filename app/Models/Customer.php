<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'nama_cust', 'email_cust', 'jenis_kelamin', 'alamat', 'pekerjaan'
    ];
}
