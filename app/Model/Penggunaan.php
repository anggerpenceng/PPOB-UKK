<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{

    protected $table = 'tagihan';

    protected $fillable = [
        "id_pelanggan" , "bulan" , "tahun" , "meter_awal" , "meter_akhir" , "jumlah_meter" , "status"
    ];

}