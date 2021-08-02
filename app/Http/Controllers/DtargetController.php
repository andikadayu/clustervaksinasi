<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vaksinasi;
use App\Models\DataVaksin;
use Illuminate\Support\Facades\DB;

class DtargetController extends Controller
{

    public function __construct(){
        $this->DataVaksin = new DataVaksin();
    }

    public function index(){
        $kabupaten=Vaksinasi::pluck('nama', 'id_kab');

        return view('target', [
            'kabupaten' => $kabupaten,
        ]);
    }

    public function carikec(Request $request)
    {
        $data = DB::table('kecamatan')
                ->where('id_kab',$request->get('id'))
                ->get();
        foreach ($data as $key => $v) {
            echo "<option value='" . $v->id_kec . "'>" . $v->nama_kec . "</option>";
        }
    }

    public function simpan(Request $request){
       $jquin = [

        'id_kec'=> $request->input('nama_kec'),
        'id_kab'=> $request->input('nama'),
        'zona'=> $request->input('zona'),
        'lansia'=> $request->input('lansia'),
        'vaksin_lansia'=> $request->input('vaksin_lansia'),
        'odgj'=> $request->input('odgj'),
        'vaksin_odgj'=> $request->input('vaksin_odgj'),
        'disabilitas'=> $request->input('disabilitas'),
        'vaksin_disabilitas'=> $request->input('vaksin_disabilitas'),
        'tanggal'=> $request->input('tanggal'),
        'tlansia'=> $request->input('tlansia'),
        'tdisabilitas'=> $request->input('tdisabilitas'),
        'todgj'=> $request->input('todgj'),
        'svaksin'=> $request->input('svaksin'),
        'bvaksin'=> $request->input('bvaksin')

       ];

       DB::table('data_target')
       ->leftJoin('kabupaten', 'kabupaten.id_kab','=','data_target.id_kab')
       ->leftJoin('kecamatan', 'kecamatan.id_kec','=','data_target.id_kec')
       ->insert($jquin);

       return view('datatarget',['data' => $request]);
    }

}
