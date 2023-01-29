<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::select('id','nama','tanggal_lahir','gaji','status_karyawan')
        ->orderBy('id','desc')
        ->get();

        return response()->json(['success' => true, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'gaji' => 'required',
            'status_karyawan' => 'required|boolean',
        ]);
 
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }
        
        $data = new Karyawan;
        $data->nama = $request->input('nama');
        $data->tanggal_lahir = Carbon::parse($request->input('tanggal_lahir'))->toDateString();
        $data->gaji = str_replace(',','',$request->input('gaji'));
        $data->status_karyawan = $request->input('status_karyawan');
        $data->save();

        return response()->json(['success' => true, 'message' => 'Berhasil Simpan Data Karyawan']);
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
        $data = Karyawan::select('id','nama','tanggal_lahir','gaji','status_karyawan')->where('id',$id)->first();

        return response()->json(['success' => true, 'data' => $data]);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'gaji' => 'required',
            'status_karyawan' => 'required|boolean',
        ]);
 
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }
        
        $data = Karyawan::find($id);
        $data->nama = $request->input('nama');
        $data->tanggal_lahir = Carbon::parse($request->input('tanggal_lahir'))->toDateString();
        $data->gaji = str_replace(',','',$request->input('gaji'));
        $data->status_karyawan = $request->input('status_karyawan');
        $data->save();

        return response()->json(['success' => true, 'message' => 'Berhasil Update Data Karyawan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Karyawan::find($id);
        if ($data->delete()) {
            return response()->json(['success' => true, 'message' => 'Berhasil Hapus Data Karyawan']);
        }
    }
}
