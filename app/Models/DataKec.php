<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataKec extends Model
{
    public function allData(){
        return DB::table('kecamatan')
        ->leftJoin('kabupaten', 'kabupaten.id_kab','=','kecamatan.id_kab')
        ->paginate(10);
    }
}
