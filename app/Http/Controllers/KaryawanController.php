<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataDiri;
use App\PasFoto;
use App\FotoKK;
use App\FotoKTP;
use App\FotoSetBadan;
use Image;
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
        $keluarga = DB::table('table_keluarga_lingkungan')->where('nama_karyawan', auth()->user()->name)->get();
        $anak = DB::table('table_anak')->where('nama_karyawan', auth()->user()->name)->get();
        $susunan_keluarga = DB::table('table_susunan_keluarga')->where('nama_karyawan', auth()->user()->name)->get();
        $pasfoto = DB::table('table_pasfoto')->where('nama_karyawan', auth()->user()->name)->value('namagambar');
        $fotoserbadan = DB::table('table_foto_set_badan')->where('nama_karyawan', auth()->user()->name)->value('namagambar');
        $fotoktp = DB::table('table_fotoktp')->where('nama_karyawan', auth()->user()->name)->value('namagambar');
        $fotokk = DB::table('table_fotokk')->where('nama_karyawan', auth()->user()->name)->value('namagambar');
        // dd($susunan_keluarga);

        return view('user.data', [
            'data' => $data,
            'keluarga' => $keluarga,
            'pasfoto' => $pasfoto,
            'fotoserbadan' => $fotoserbadan,
            'fotoktp' => $fotoktp,
            'fotokk' => $fotokk,
            'anak' => $anak,
            'suskel' => $susunan_keluarga,
        ]);
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
    public function pasFoto(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
          ]);

          $image = $request->file('image');
          $nameImage = $request->file('image')->getClientOriginalName();

          $id_karyawan = auth()->user()->id;
          $nama_karyawan = auth()->user()->name;
          $namagambar = $nama_karyawan . $id_karyawan . '_' . $nameImage;

          $thumbImage = Image::make($image->getRealPath())->resize(200, 200);
          $thumbPath = public_path() . '/img/pasFoto/kecil/' . $namagambar;
          $thumbImage = Image::make($thumbImage)->save($thumbPath);

          $oriPath = public_path() . '/img/pasFoto/normal/' . $namagambar;
          $oriImage = Image::make($image)->save($oriPath);

          $datainsert1 = [
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'namagambar' => $namagambar,
          ];

          $check = DB::table('table_pasfoto')->where('nama_karyawan', $nama_karyawan)->get();
        if (count($check) == 0) {
            $insert1 = DB::table('table_pasfoto')->insert($datainsert1);
        } else {
            $insert1 = DB::table('table_pasfoto')->where('nama_karyawan', $nama_karyawan)->update($datainsert1);
        }

        return redirect()->back();
    }
    public function fotoKTP(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
          ]);

          $image = $request->file('image');
          $nameImage = $request->file('image')->getClientOriginalName();

          $id_karyawan = auth()->user()->id;
          $nama_karyawan = auth()->user()->name;
          $namagambar = $nama_karyawan . $id_karyawan . '_' . $nameImage;

          $thumbImage = Image::make($image->getRealPath())->resize(200, 200);
          $thumbPath = public_path() . '/img/fotoktp/kecil/' . $namagambar;
          $thumbImage = Image::make($thumbImage)->save($thumbPath);

          $oriPath = public_path() . '/img/fotoktp/normal/' . $namagambar;
          $oriImage = Image::make($image)->save($oriPath);

          $datainsert1 = [
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'namagambar' => $namagambar,
          ];

          $check = DB::table('table_fotoktp')->where('nama_karyawan', $nama_karyawan)->get();
        if (count($check) == 0) {
            $insert1 = DB::table('table_fotoktp')->insert($datainsert1);
        } else {
            $insert1 = DB::table('table_fotoktp')->where('nama_karyawan', $nama_karyawan)->update($datainsert1);
        }

        return redirect()->back();
    }
    public function fotoKK(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
          ]);

          $image = $request->file('image');
          $nameImage = $request->file('image')->getClientOriginalName();

          $id_karyawan = auth()->user()->id;
          $nama_karyawan = auth()->user()->name;
          $namagambar = $nama_karyawan . $id_karyawan . '_' . $nameImage;

          $thumbImage = Image::make($image->getRealPath())->resize(200, 200);
          $thumbPath = public_path() . '/img/fotokk/kecil/' . $namagambar;
          $thumbImage = Image::make($thumbImage)->save($thumbPath);

          $oriPath = public_path() . '/img/fotokk/normal/' . $namagambar;
          $oriImage = Image::make($image)->save($oriPath);

          $datainsert1 = [
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'namagambar' => $namagambar,
          ];

          $check = DB::table('table_fotokk')->where('nama_karyawan', $nama_karyawan)->get();
        if (count($check) == 0) {
            $insert1 = DB::table('table_fotokk')->insert($datainsert1);
        } else {
            $insert1 = DB::table('table_fotokk')->where('nama_karyawan', $nama_karyawan)->update($datainsert1);
        }

        return redirect()->back();
    }
    public function fotoSerBadan(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
          ]);

          $image = $request->file('image');
          $nameImage = $request->file('image')->getClientOriginalName();

          $id_karyawan = auth()->user()->id;
          $nama_karyawan = auth()->user()->name;
          $namagambar = $nama_karyawan . $id_karyawan . '_' . $nameImage;

          $thumbImage = Image::make($image->getRealPath())->resize(200, 200);
          $thumbPath = public_path() . '/img/fotoserbadan/kecil/' . $namagambar;
          $thumbImage = Image::make($thumbImage)->save($thumbPath);

          $oriPath = public_path() . '/img/fotoserbadan/normal/' . $namagambar;
          $oriImage = Image::make($image)->save($oriPath);

          $datainsert1 = [
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'namagambar' => $namagambar,
          ];

          $check = DB::table('table_foto_set_badan')->where('nama_karyawan', $nama_karyawan)->get();
        if (count($check) == 0) {
            $insert1 = DB::table('table_foto_set_badan')->insert($datainsert1);
        } else {
            $insert1 = DB::table('table_foto_set_badan')->where('nama_karyawan', $nama_karyawan)->update($datainsert1);
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inputKeluargaLingkungan(Request $request)
    {
        $id_karyawan = DB::table('users')->where('name', auth()->user()->name)->value('id');
        $nama_karyawan = auth()->user()->name;

        $datainsert1 = [
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'status' => $request->status,
            'tgl_nikah' => $request->tanggalNikah,
            'nama_pasangan' => $request->nama_pasangan,
            'tempat_lahir' => $request->tempat,
            'tanggal_lahir' => $request->birthday,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'ketnikah' => $request->ketpasangan,
            'tanggalket' => $request->pisahtanggal,
            'pendterakhir' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'jabatan' => $request->jabatan,
            'alamatkerja' => $request->alamatkerja,
        ];

        $check = DB::table('table_keluarga_lingkungan')->where('nama_karyawan', $nama_karyawan)->get();
        if (count($check) == 0) {
            $insert1 = DB::table('table_keluarga_lingkungan')->insert($datainsert1);
        } else {
            $insert1 = DB::table('table_keluarga_lingkungan')->where('nama_karyawan', $nama_karyawan)->update($datainsert1);
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function anak(Request $request)
    {
        $id_karyawan = DB::table('users')->where('name', auth()->user()->name)->value('id');
        $nama_karyawan = auth()->user()->name;
        // dd($request->namaawal);
        $data = [
        'id_karyawan' => $id_karyawan,
        'nama_karyawan' => $nama_karyawan,
        'nama_anak' => $request->nama_anak,
        'gender' => $request->gender,
        'tempatlahir' => $request->tempatlahir,
        'tanggallahir' => $request->tanggallahir,
        'pendterakhir' => $request->pendterakhir,
        'pekerjaan' => $request->pekerjaan,
        ];

        if ($request->keterangan == 'tambah') {
            $insert1 = DB::table('table_anak')->insert($data);
        } else {
            $insert1 = DB::table('table_anak')->where('nama_karyawan', $nama_karyawan)->where('nama_anak', $request->namaawal)->update($data);
        }

        return redirect()->back();
    }

    public function susunanKeluarga(Request $request)
    {
        $id_karyawan = DB::table('users')->where('name', auth()->user()->name)->value('id');
        $nama_karyawan = auth()->user()->name;
        // dd($request->namaawal);
        $data = [
        'id_karyawan' => $id_karyawan,
        'nama_karyawan' => $nama_karyawan,
        'nama' => $request->nama,
        'hubungan' => $request->hubungan,
        'tempatlahir' => $request->tempatlahir,
        'tanggallahir' => $request->tanggallahir,
        'pendterakhir' => $request->pendterakhir,
        'pekerjaan' => $request->pekerjaan,
        ];

        if ($request->keterangan == 'tambah') {
            $insert1 = DB::table('table_susunan_keluarga')->insert($data);
        } else {
            $insert1 = DB::table('table_susunan_keluarga')->where('nama_karyawan', $nama_karyawan)->where('nama', $request->namaawal)->update($data);
        }

        return redirect()->back();
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
