<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataDiri;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('identitas_diri')->where('nama_lengkap', auth()->user()->name)->get();
        // dd($data);

        return view('user.data', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_karyawan = DB::table('users')->where('name', $request->nama)->value('id');
        $motor = ($request->motor == 'true') ? 1 : 0;
        $mobil = ($request->mobil == 'true') ? 1 : 0;
        $simA = ($request->simA == 'true') ? 1 : 0;
        $simB1 = ($request->simB1 == 'true') ? 1 : 0;
        $simB2 = ($request->simB2 == 'true') ? 1 : 0;
        $simC = ($request->simC == 'true') ? 1 : 0;

        $datainsert1 = [
            'id_karyawan' => $id_karyawan,
            'nama_lengkap' => $request->nama,
            'nickname' => $request->nickname,
            'gender' => $request->gender,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat,
            'tanggal_lahir' => $request->birthday,
            'no_ktp' => $request->no_ktp,
            'ktp_sampaidgn' => $request->sampaiktp,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_domisili' => $request->alamat_domisili,
            'no_telp' => $request->notelp,
            'no_handphone' => $request->nohp,
            'email' => $request->email,
            'gol_darah' => $request->goldarah,
            'motor'=> $motor,
            'mobil'=> $mobil,
            'simA'=> $simA,
            'simB1'=> $simB1,
            'simB2'=> $simB2,
            'simC'=> $simC,
        ];

        $check = DB::table('identitas_diri')->where('nama_lengkap', $request->nama)->get();
        if (count($check) == 0) {
            $insert1 = DB::table('identitas_diri')->insert($datainsert1);
        } else {
            $insert1 = DB::table('identitas_diri')->where('nama_lengkap', $request->nama)->update($datainsert1);
        }

        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
