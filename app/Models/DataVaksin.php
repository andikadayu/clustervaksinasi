<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataVaksin extends Model
{

    public $timestamps = null;
    protected $table="data_target";
    protected $primaryKey="id_target";
    protected $fillable= [
        'id_target','id_kec','id_kab','zona','lansia','vaksin_lansia','odgj','vaksin_odgj','disabilitas','vaksin_disabilitas','tanggal','svaksin','bvaksin'];
}
