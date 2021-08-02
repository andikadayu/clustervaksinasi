<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Vaksin;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct(){
        $this->Vaksin = new Vaksin();
    }

    public function data(){
        $user = Auth::user();
        $data = [
            'kecamatan' => DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec','=','data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab','=','data_target.id_kab')
            ->get(),

        ];
        return view('welcome', $data, compact('user'));
    }

    public function hijau(){
        $user = Auth::user();
        $data = [

            'kecamatan1' => DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec','=','data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab','=','data_target.id_kab')
            ->where('zona','hijau')
            ->get(),

        ];
        return view('viewzona.hijau', $data, compact('user'));
    }

    public function kuning(){
        $user = Auth::user();
        $data = [

            'kecamatan2' => DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec','=','data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab','=','data_target.id_kab')
            ->where('zona','kuning')
            ->get(),

        ];
        return view('viewzona.kuning', $data, compact('user'));
    }

    public function orange(){
        $user = Auth::user();
        $data = [

            'kecamatan3' => DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec','=','data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab','=','data_target.id_kab')
            ->where('zona','orange')
            ->get(),

        ];
        return view('viewzona.orange', $data, compact('user'));
    }

    public function merah(){
        $user = Auth::user();
        $data = [

            'kecamatan4' => DB::table('data_target')
            ->leftJoin('kecamatan', 'kecamatan.id_kec','=','data_target.id_kec')
            ->leftJoin('kabupaten', 'kabupaten.id_kab','=','data_target.id_kab')
            ->where('zona','merah')
            ->get(),

        ];
        return view('viewzona.merah', $data, compact('user'));
    }

    public function API(){
        $getKabupaten=DB::table('kabupaten')
        ->get();
            foreach($getKabupaten as $row){
                $data=null;
                $data['id_kab']=$row->id_kab;
                $data['nama']=$row->nama;
                $data['geojson_kabupaten']=$row->geojson_kabupaten;
                $data['warna_kabupaten']=$row->warna_kabupaten;
                $response[]=$data;
            }
            echo json_encode($response,JSON_PRETTY_PRINT); 
    }

}
