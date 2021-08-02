<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TanggalController extends Controller
{
    public function index(){

        $tanggal = DB::table('data_target')
        ->leftJoin('kabupaten', 'kabupaten.id_kab','=','data_target.id_kab')
        ->leftJoin('kecamatan', 'kecamatan.id_kec','=','data_target.id_kec')
        ->paginate(10);

        return view('tanggal',['tanggal' => $tanggal]);
    }
}
