<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kelasModel;
class kelasController extends Controller
{
    public function index()
    {
        $getData = kelasModel::all();
        $data = [];
        foreach ($getData as $key) {
            $data[] = [
                'id' => $key->id,
                'kelas' => $key->kelas
            ];
        };
        $result['data'] = $data;

        if(count($getData) == 0 ){
            return response()->json('data kosong');
        }else{
            return $result;
        }
    }

    public function store(Request $request)
    {
        $store = kelasModel::create($request->all());
        $kelas = $request->kelas;
        return response()->json('success menambah kelas ' . $kelas);
    }

    public function deleteall()
    {
        $del = kelasModel::truncate();
        return response()->json('success mengahapus semua data!');
    }
}
