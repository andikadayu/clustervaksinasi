<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKec;

class DataKecamatan extends Controller
{


    public function __construct(){
        $this->DataKec = new DataKec();
    }

    public function index(){
        $data = [
            'kecamatan' => $this->DataKec->allData(),
        ];
        return view('datakabprov', $data);
    }
}
