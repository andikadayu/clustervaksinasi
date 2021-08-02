<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vaksin;

class FilterController extends Controller
{

    public function __construct()
    {
        $this->Vaksin = new Vaksin();
    }

    public function index()
    {

        $filter = DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec', '=', 'data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab', '=', 'data_target.id_kab')
            ->paginate(10);

        $jumlah = DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec', '=', 'data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab', '=', 'data_target.id_kab')
            ->count();

        $n=50;
        $k=0;
        $zona= DB::table('data_target')
            ->get();
            foreach($zona as $l){
                if($l->bvaksin > $n){
                    $k++;
                }
            }

        $n=50;
        $kz=0;
        $zona1= DB::table('data_target')
        ->where('zona','kuning')
            ->get();
                foreach($zona1 as $ln){
                    if($ln->bvaksin < $n){
                        $kz++;
                    }
                }

        $n=50;
        $kz1=0;
        $zona2= DB::table('data_target')
        ->where('zona','merah')
            ->get();
                foreach($zona2 as $ln){
                    if($ln->bvaksin < $n){
                        $kz++;
                    }
                }

        $n=50;
        $kz2=0;
        $zona3= DB::table('data_target')
        ->where('zona','orange')
            ->get();
                foreach($zona3 as $ln){
                    if($ln->bvaksin < $n){
                        $kz++;
                    }
                }

            $n=50;
            $j=0;
            
        $ijo = DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec', '=', 'data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab', '=', 'data_target.id_kab')
            ->where('zona','hijau')
            ->get();
            foreach($ijo as $i){
                if($i->bvaksin < $n){
                    $j++;
                }
            }

        return view('filter', ['filter' => $filter, 'jumlah' => $jumlah, 'zona' => $zona, "j"=> $j, "k" => $k, "kz" => $kz, "kz1" => $kz1, "kz2" => $kz2]);
    }

    public function proses(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $filter = DB::table('data_target')
            ->where('tanggal', '>=', $tanggal_awal)
            ->where('tanggal', '<=', $tanggal_akhir)
            ->leftJoin('kecamatan', 'kecamatan.id_kec', '=', 'data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab', '=', 'data_target.id_kab')
            ->paginate(10);

        $jumlah = DB::table('data_target')
            ->where('tanggal', '>=', $tanggal_awal)
            ->where('tanggal', '<=', $tanggal_akhir)
            ->leftJoin('kecamatan', 'kecamatan.id_kec', '=', 'data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab', '=', 'data_target.id_kab')
            ->count();

            $n=50;
        $k=0;
            $zona= DB::table('data_target')
            ->get();
            foreach($zona as $l){
                if($l->bvaksin > $n){
                    $k++;
                }
            }

        $n=50;
        $kz=0;
        $zona1= DB::table('data_target')
        ->where('zona','kuning')
            ->get();
                foreach($zona1 as $ln){
                    if($ln->bvaksin < $n){
                        $kz++;
                    }
                }

        $n=50;
        $kz1=0;
        $zona2= DB::table('data_target')
        ->where('zona','merah')
            ->get();
                foreach($zona2 as $ln){
                    if($ln->bvaksin < $n){
                        $kz++;
                    }
                }

        $n=50;
        $kz2=0;
        $zona3= DB::table('data_target')
        ->where('zona','orange')
            ->get();
                foreach($zona3 as $ln){
                    if($ln->bvaksin < $n){
                        $kz++;
                    }
                }

            $n=50;
            $j=0;
            
        $ijo = DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec', '=', 'data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab', '=', 'data_target.id_kab')
            ->where('zona','hijau')
            ->get();
            foreach($ijo as $i){
                if($i->bvaksin < $n){
                    $j++;
                }
            }

        return view('filter', ['filter' => $filter, 'jumlah' => $jumlah, 'zona' => $zona, "j"=> $j, "k" => $k, "kz" => $kz, "kz1" => $kz1, "kz2" => $kz2]);
    }
}
