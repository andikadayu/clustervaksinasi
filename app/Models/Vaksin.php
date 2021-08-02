<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vaksin extends Model
{
    public function allData(){
        return DB::table('data_target')
        ->leftJoin('kecamatan', 'kecamatan.id_kec','=','data_target.id_kec')
        ->leftJoin('kabupaten', 'kabupaten.id_kab','=','data_target.id_kab')
        ->where('zona','hijau')
        ->get();

    }

}
