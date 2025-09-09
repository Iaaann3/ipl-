<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $fillable = [
        'nama_bank',
        'no_rekening',
        'atas_nama',
    ];
}
