<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswaModel;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = siswaModel::get();

        $data = [];
        foreach($getData as $getDatas){
            $data[] = [
                'id' => $getDatas->id,
                'nama' => $getDatas->nama,
                'kelas' => $getDatas->kelas,
            ];
        };

        $result['data'] = $data;

        // return $result;
        if(count($data) == 0 ){
            // dd('data kosong');
            return response()->json('Data kosong',404);
        }else{
            // dd('ada');
            return response()->json($result,200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $siswa = siswaModel::all();
        $data = [];
        foreach ($siswa as $key) {
            $data[] = [
                'id' => $key->id,
                'nama' => $key->nama,
            ];
        };
        $return['data'] = $data;
        return $return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Untuk banyak data
        // $store = siswaModel::insert($request->data);

        //Untuk satu data
        $store = siswaModel::create($request->all());
        return $store;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = siswaModel::find($id);
        return $edit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = siswaModel::find($id);
        // return $request->all();
        $siswa->update($request->all());
        return response()->json('berhasil update', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = siswaModel::find($id);
        $hapus->delete();
        return response()->json('Data berhasil dihapus');
    }

    public function deleteall()
    {
        // $del = siswaModel::get();

        // $wadah = [];
        // foreach ($del as $delete) {
        //     $wadah[] = [
        //         'id'  => $delete->id,
        //         'nama' => $delete->nama,
        //         'kelas' => $delete->kelas,
        //     ];
        // }
        siswaModel::truncate();
        $hitung = siswaModel::all();
        return response()->json('berhasil dihapus!');
    }
}
