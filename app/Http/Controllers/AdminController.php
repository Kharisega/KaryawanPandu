<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->leftJoin('table_pasfoto', 'users.id', '=', 'table_pasfoto.id_karyawan')
        ->where('roles.id', 2)
        ->select('users.name', 'users.email', 'users.id', 'table_pasfoto.namagambar')
        ->get();
        // dd($data[1]->namagambar);

        return view('admin.index', compact('data'));
    }

    public function lihatData(Request $request)
    {
        $nama_karyawan = DB::table('users')->where('id', $request->id_karyawan)->value('name');
        $data = DB::table('identitas_diri')->where('nama_lengkap', $nama_karyawan)->get();
        $keluarga = DB::table('table_keluarga_lingkungan')->where('nama_karyawan', $nama_karyawan)->get();
        $anak = DB::table('table_anak')->where('nama_karyawan', $nama_karyawan)->get();
        $susunan_keluarga = DB::table('table_susunan_keluarga')->where('nama_karyawan', $nama_karyawan)->get();
        $pendidikan_formal = DB::table('table_pendidikan_formal')->where('nama_karyawan', $nama_karyawan)->get();
        $pendidikan_nonformal1 = DB::table('table_nonformal_kursus')->where('nama_karyawan', $nama_karyawan)->get();
        $pendidikan_nonformal2 = DB::table('table_nonformal_seminar')->where('nama_karyawan', $nama_karyawan)->get();
        $pengalaman_organisasi = DB::table('table_pengalaman_organisasi')->where('nama_karyawan', $nama_karyawan)->get();
        $pengalaman_kerja = DB::table('table_pengalaman_kerja')->where('nama_karyawan', $nama_karyawan)->get();
        $bahasa = DB::table('table_bahasa')->where('nama_karyawan', $nama_karyawan)->get();
        $minat = DB::table('table_minat')->where('nama_karyawan', $nama_karyawan)->get();
        $lainnya = DB::table('table_lainnya')->where('nama_karyawan', $nama_karyawan)->get();
        $nomor_darurat = DB::table('table_nomor_darurat')->where('nama_karyawan', $nama_karyawan)->get();
        $aktivitas_sosial = DB::table('table_aktivitas_sosial')->where('nama_karyawan', $nama_karyawan)->get();
        $pasfoto = DB::table('table_pasfoto')->where('nama_karyawan', $nama_karyawan)->value('namagambar');
        $fotoserbadan = DB::table('table_foto_set_badan')->where('nama_karyawan', $nama_karyawan)->value('namagambar');
        $fotoktp = DB::table('table_fotoktp')->where('nama_karyawan', $nama_karyawan)->value('namagambar');
        $fotokk = DB::table('table_fotokk')->where('nama_karyawan', $nama_karyawan)->value('namagambar');
        // dd($data, $keluarga, $pasfoto, $fotoserbadan, $fotoktp, $fotokk, $anak, $bahasa, $minat, $lainnya, $aktivitas_sosial, $nomor_darurat, $susunan_keluarga, $pendidikan_formal, $pendidikan_nonformal1, $pendidikan_nonformal2, $pengalaman_organisasi, $pengalaman_kerja,);

        return view('admin.data', [
            'data' => $data,
            'keluarga' => $keluarga,
            'pasfoto' => $pasfoto,
            'fotoserbadan' => $fotoserbadan,
            'fotoktp' => $fotoktp,
            'fotokk' => $fotokk,
            'anak' => $anak,
            'bahasa' => $bahasa,
            'minat' => $minat,
            'lainnya' => $lainnya,
            'aktivitas_sosial' => $aktivitas_sosial,
            'nomor_darurat' => $nomor_darurat,
            'suskel' => $susunan_keluarga,
            'pendidikan_formal' => $pendidikan_formal,
            'pendidikan_nonformal1' => $pendidikan_nonformal1,
            'pendidikan_nonformal2' => $pendidikan_nonformal2,
            'pengalaman_organisasi' => $pengalaman_organisasi,
            'pengalaman_kerja' => $pengalaman_kerja,
        ]);
    }
}
