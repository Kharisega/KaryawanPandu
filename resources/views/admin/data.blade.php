@extends('layouts.app')

@section('content')
<style>
    .button {
        position: fixed;
        left: 95%;
        top: 90%;
        z-index: 1;
        border-radius: 50px;
        width: 50px;
        height: 50px;
        border: none;
    }

    .skyblue {
        background-color: skyblue;
    }

    .green {
        background-color: lightgreen;
    }

    .print {
        top: 70% !important;
        padding-top: 12.5px;
    }

    a, a:hover, a:focus, a:active {
        text-decoration: none;
        color: inherit;
    }

    .up {
        top: 80% !important;
    }

</style>
<div><center>@method('POST')<a class="button skyblue print" href="{{ route('admin.cetak', $data[0]->nama_lengkap) }}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
        </svg></a></center></div>
<div><button class="button green up" onclick="scrollUpWin()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
        </svg></button></div>
<div><button class="button green" onclick="scrollDownWin()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
        </svg></button></div>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row justify-content-start">
        <div class="col-md-8">
            <div class="row" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="col col-md-3">
                    <div class="card">
                        <div class="card-header">PAS Foto</div>
                        <div class="card-body">
                            <img src="
                            @if(isset($pasfoto))
                                {{ asset('img/pasFoto/kecil/'. $pasfoto) }}
                            @else
                                {{ asset('img/pp person.jpg') }}
                            @endif
                            " alt="PAS Foto" class="img-thumbnail rounded mx-auto d-block">

                        </div>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="card">
                        <div class="card-header">Foto Seluruh Badan</div>
                        <div class="card-body">
                            <img src="@if(isset($fotoserbadan))
                            {{ asset('img/fotoserbadan/kecil/'. $fotoserbadan) }}
                        @else
                            {{ asset('img/pp person.jpg') }}
                        @endif" alt="PAS Foto" class="rounded mx-auto d-block img-thumbnail">

                        </div>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="card">
                        <div class="card-header">Kartu Tanda Penduduk ( KTP )</div>
                        <div class="card-body">
                            <img src="@if(isset($fotoktp))
                            {{ asset('img/fotoktp/kecil/'. $fotoktp) }}
                        @else
                            {{ asset('img/pp person.jpg') }}
                        @endif" alt="PAS Foto" class="rounded mx-auto d-block img-thumbnail">

                        </div>
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="card">
                        <div class="card-header">Kartu Keluarga ( KK )</div>
                        <div class="card-body">
                            <img src="@if(isset($fotokk))
                            {{ asset('img/fotokk/kecil/'. $fotokk) }}
                        @else
                            {{ asset('img/pp person.jpg') }}
                        @endif" alt="PAS Foto" class="rounded mx-auto d-block img-thumbnail">

                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 70rem;">
                <div class="card-header">Identitas Diri</div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body">
                    <div class="col">

                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Nama Lengkap</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">
                                @if (isset($data[0]->nama_lengkap))
                                {{ $data[0]->nama_lengkap }}
                                @else
                                {{ Auth::user()->name }}
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Nama Panggilan</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">
                                @if (isset($data[0]->nickname))
                                {{ $data[0]->nickname }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Jenis Kelamin</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">


                                @if (isset($data[0]->gender) && $data[0]->gender == 'pria') Pria @endif
                                @if (isset($data[0]->gender) && $data[0]->gender == 'wanita') Wanita @endif

                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Kewarganegaraan</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">
                                @if (isset($data[0]->kewarganegaraan))
                                {{ $data[0]->kewarganegaraan }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Agama</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">

                                @if (isset($data[0]->agama) && $data[0]->agama == 'kristen') Kristen @endif
                                @if (isset($data[0]->agama) && $data[0]->agama == 'katolik') Katolik @endif
                                @if (isset($data[0]->agama) && $data[0]->agama == 'islam') Islam @endif
                                @if (isset($data[0]->agama) && $data[0]->agama == 'hindu') Hindu @endif
                                @if (isset($data[0]->agama) && $data[0]->agama == 'budha') Budha @endif
                                @if (isset($data[0]->agama) && $data[0]->agama == 'konghucu') Konghucu @endif

                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Tempat, Tanggal lahir</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col text">
                                        @if (isset($data[0]->tempat_lahir))
                                        {{ $data[0]->tempat_lahir }}

                                        @endif
                                    </div>
                                    <div class="col col-sm-1 text">
                                        <h2>/</h2>
                                    </div>
                                    <div class="col text">
                                        @if (isset($data[0]->tanggal_lahir))
                                        {{ $data[0]->tanggal_lahir }}

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">No. KTP</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col text">
                                        @if (isset($data[0]->no_ktp))
                                        {{ $data[0]->no_ktp }}

                                        @endif
                                    </div>
                                    <div class="col col-sm-3 text">
                                        <h5 style="padding-top: 8px">Sampai dengan</h5>
                                    </div>
                                    <div class="col text">
                                        @if (isset($data[0]->ktp_sampaidgn))
                                        {{ $data[0]->ktp_sampaidgn }}

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Alamat sesuai ktp</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">
                                @if (isset($data[0]->alamat_ktp))
                                {{ $data[0]->alamat_ktp }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Alamat sekarang/ Domisili/ Surat-Menyurat</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">
                                @if (isset($data[0]->alamat_domisili))
                                {{ $data[0]->alamat_domisili }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Nomor Telepon</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">
                                @if (isset($data[0]->no_telp))
                                {{ $data[0]->no_telp }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Nomor Handphone</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col text">
                                @if (isset($data[0]->no_handphone))
                                {{ $data[0]->no_handphone }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">E-Mail</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($data[0]->email))
                                {{ $data[0]->email }}
                                @else
                                {{ Auth::user()->email }}
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Golongan Darah</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($data[0]->gol_darah) && $data[0]->gol_darah == 'A') A @endif
                                @if (isset($data[0]->gol_darah) && $data[0]->gol_darah == 'B') B @endif
                                @if (isset($data[0]->gol_darah) && $data[0]->gol_darah == 'AB') AB @endif
                                @if (isset($data[0]->gol_darah) && $data[0]->gol_darah == 'O') O @endif

                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Kemampuan Mengemudi</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col" style="font-size: 20px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="motor" type="checkbox" id="inlineCheckbox1" value="true" @if (isset($data[0]->motor) && $data[0]->motor == 1) checked @endif disabled>
                                    <label class="form-check-label" for="inlineCheckbox1">Motor</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="mobil" type="checkbox" id="inlineCheckbox2" value="true" @if (isset($data[0]->mobil) && $data[0]->mobil == 1) checked @endif disabled>
                                    <label class="form-check-label" for="inlineCheckbox2">Mobil</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">SIM yang dimiliki</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col" style="font-size: 20px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="simA" type="checkbox" id="inlineCheckbox1" value="true" @if (isset($data[0]->simA) && $data[0]->simA == 1) checked @endif disabled>
                                    <label class="form-check-label" for="inlineCheckbox1">A</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="simB1" type="checkbox" id="inlineCheckbox2" value="true" @if (isset($data[0]->simB1) && $data[0]->simB1 == 1) checked @endif disabled>
                                    <label class="form-check-label" for="inlineCheckbox2">B1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="simB2" type="checkbox" id="inlineCheckbox3" value="true" @if (isset($data[0]->simB2) && $data[0]->simB2 == 1) checked @endif disabled>
                                    <label class="form-check-label" for="inlineCheckbox3">B2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="simC" type="checkbox" id="inlineCheckbox4" value="true" @if (isset($data[0]->simC) && $data[0]->simC == 1) checked @endif disabled>
                                    <label class="form-check-label" for="inlineCheckbox4">C</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Keluarga & Lingkungan</div>
                <div class="card-body">
                    <div class="col">

                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Status Pernikahan</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        @if (isset($keluarga[0]->status) && $keluarga[0]->status == 'lajang') Lajang @endif
                                        @if (isset($keluarga[0]->status) && $keluarga[0]->status == 'menikah') Menikah @endif
                                        @if (isset($keluarga[0]->status) && $keluarga[0]->status == 'duda') Duda @endif
                                        @if (isset($keluarga[0]->status) && $keluarga[0]->status == 'janda') Janda @endif

                                    </div>
                                    <div class="col" id="tglnikah" style="display: none;">
                                        <div class="row">
                                            <div class="col col-sm-3 pt-2">
                                                <label for="tanggalNikah">Tanggal :</label>
                                            </div>
                                            <div class="col">
                                                @if (isset($keluarga[0]->tgl_nikah))
                                                {{ $keluarga[0]->tgl_nikah }}

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Nama Suami/Istri</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($keluarga[0]->nama_pasangan))
                                {{ $keluarga[0]->nama_pasangan }}

                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-3">Tempat, Tanggal lahir</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col">
                                        @if (isset($keluarga[0]->tempat_lahir))
                                        {{ $keluarga[0]->tempat_lahir }}

                                        @endif
                                    </div>
                                    <div class="col col-sm-1">
                                        <h2>/</h2>
                                    </div>
                                    <div class="col">
                                        @if (isset($keluarga[0]->tanggal_lahir))
                                        {{ $keluarga[0]->tanggal_lahir }}

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Agama</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'kristen') Kristen @endif
                                @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'katolik') Katolik @endif
                                @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'islam') Islam @endif
                                @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'hindu') Hindu @endif
                                @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'budha') Budha @endif
                                @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'konghucu') Konghucu @endif

                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Kewarganegaraan</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($keluarga[0]->kewarganegaraan))
                                {{ $keluarga[0]->kewarganegaraan }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">

                                @if (isset($keluarga[0]->ketnikah) && $keluarga[0]->ketnikah == 'berecerai') Bercerai @endif
                                @if (isset($keluarga[0]->ketnikah) && $keluarga[0]->ketnikah == 'meninggal') Meninggal @endif

                                <div style="float: left;padding-top: 6px;padding-left: 10px;font-size: 16px;"> tanggal</div>
                            </div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($keluarga[0]->tanggalket))
                                {{ $keluarga[0]->tanggalket }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Pendidikan Terakhir</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($keluarga[0]->pendterakhir))
                                {{ $keluarga[0]->pendterakhir }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Pekerjaan</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($keluarga[0]->pekerjaan))
                                {{ $keluarga[0]->pekerjaan }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Jabatan</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($keluarga[0]->jabatan))
                                {{ $keluarga[0]->jabatan }}

                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-bottom:10px">
                            <div class="col col-sm-3">Alamat Tempat Bekerja</div>
                            <div class="col col-sm-1">:</div>
                            <div class="col">
                                @if (isset($keluarga[0]->alamatkerja))
                                {{ $keluarga[0]->alamatkerja }}

                                @endif
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Anak</div>

                <div class="card-body">
                    <table class="table table-light table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Nama Anak</th>
                            <th>L/P</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Pekerjaan</th>

                        </tr>
                        @foreach ($anak as $key => $anakk)
                        <tr>

                            <input type="hidden" name="keterangan" value="ubah">
                            <input type="hidden" name="namaawal" value="{{ $anakk->nama_anak }}">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $anakk->nama_anak }}</td>
                            <td>
                                @if ($anakk->gender == 'P') Perempuan @endif
                                @if ($anakk->gender == 'L') Laki-laki @endif
                            <td>
                                <div class="row">
                                    <div class="col">
                                        {{ $anakk->tempatlahir }}
                                    </div>
                                    <div class="col">
                                        {{ $anakk->tanggallahir }}
                                    </div>
                                </div>
                            </td>
                            <td>{{ $anakk->pendterakhir }}</td>
                            <td>
                                {{ $anakk->pekerjaan }}
                            </td>


                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Susunan Keluarga</div>

                <div class="card-body">
                    <table class="table table-light table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Hubungan</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Pekerjaan</th>

                        </tr>
                        @foreach ($suskel as $key => $suskell)
                        <tr>


                            <td>{{ $key+1 }}</td>
                            <td>{{ $suskell->nama }}</td>
                            <td>
                                {{ $suskell->hubungan }}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        {{ $suskell->tempatlahir }}
                                    </div>
                                    <div class="col">
                                        {{ $suskell->tanggallahir }}
                                    </div>
                                </div>
                            </td>
                            <td>{{ $suskell->pendterakhir }}</td>
                            <td>
                                {{ $suskell->pekerjaan }}
                            </td>


                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Riwayat Pendidikan Formal</div>

                <div class="card-body">
                    <table class="table table-bordered table-light table-striped">
                        <tr>
                            <th>Jenis Sekolah</th>
                            <th>Nama Sekolah</th>
                            <th>Jurusan/Fakultas</th>
                            <th>Tempat Sekolah</th>
                            <th>Dari Tahun s/d Tahun</th>
                            <th>Keterangan <br><i style="font-size: 11px;">Lulus/ Tidak Lulus/ Gelar yang diperoleh</i></th>
                        </tr>
                        <form action="{{ route('user.savedatapendfor') }}" method="post">
                            @csrf
                            @if(isset($pendidikan_formal) && count($pendidikan_formal) == 0)
                            @php
                            $kategori = [
                            'SD', 'SMP', 'SMA', 'Akademi', 'Universitas', 'Pasca Sarjana', 'Doktoral'
                            ]
                            @endphp

                            @foreach ($kategori as $kategorii)
                            <tr>
                                <td>{{ $kategorii }}
                                    <input type="hidden" name="jenis[]" id="jenis[]" class="form-control" value="{{ $kategorii }}"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                            @else
                            @foreach ($pendidikan_formal as $key => $pendikira)
                            <tr>
                                <td>{{ $pendikira->jenis_sekolah }}
                                </td>
                                <td>@if(isset($pendikira->nama_sekolah))
                                    {{ $pendikira->nama_sekolah }}

                                    @endif</td>
                                <td>@if(isset($pendikira->jurusan))
                                    {{ $pendikira->jurusan }}

                                    @endif</td>
                                <td>@if(isset($pendikira->alamat_sekolah))
                                    {{ $pendikira->alamat_sekolah }}

                                    @endif</td>
                                <td> @if(isset($pendikira->dari_tahun))
                                    {{ $pendikira->dari_tahun }}

                                    @endif</td>
                                <td>@if(isset($pendikira->keterangan))
                                    {{ $pendikira->keterangan }}

                                    @endif</td>
                            </tr>
                            @endforeach
                            @endif
                    </table>

                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Riwayat Pendidikan Non-Formal</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th colspan="7">
                                <center>KURSUS</center>
                            </th>
                        </tr>
                        <tr>
                            <th>Jenis Kursus</th>
                            <th>Nama Lembaga</th>
                            <th colspan="2">Kota</th>
                            <th>Tahun</th>
                            <th>Sertifikat</th>

                        </tr>
                        @foreach ($pendidikan_nonformal1 as $pendidikan_nonformal)

                        <tr>
                            <td>{{ $pendidikan_nonformal->jenis_kursus }}</td>
                            <td>{{ $pendidikan_nonformal->nama_lembaga }}</td>
                            <td colspan="2">{{ $pendidikan_nonformal->kota }}</td>
                            <td>{{ $pendidikan_nonformal->tahun }}</td>
                            <td>

                                @if($pendidikan_nonformal->sertifikat == 'ya') Ya @endif
                                @if($pendidikan_nonformal->sertifikat == 'tidak') Tidak @endif

                            </td>

                        </tr>
                        </form>
                        @endforeach

                    </table>
                    <br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th colspan="7">
                                <center>Pelatihan - Lokakarya - Seminar - Penataran</center>
                            </th>
                        </tr>
                        <tr>
                            <th>Pelatihan\Seminar</th>
                            <th>Penyelenggara</th>
                            <th>Tahun</th>
                            <th>Pembiayaan</th>
                            <th>Lamanya</th>
                            <th>Sertifikat</th>

                        </tr>
                        @foreach ($pendidikan_nonformal2 as $pendidikan_nonformal)

                        <tr>
                            <td>{{ $pendidikan_nonformal->jenislatihan }}</td>
                            <td>{{ $pendidikan_nonformal->penyelenggara }}</td>
                            <td>{{ $pendidikan_nonformal->tahun }}</td>
                            <td>{{ $pendidikan_nonformal->pembiayaan }}</td>
                            <td>{{ $pendidikan_nonformal->lamanya }}</td>
                            <td>
                                @if($pendidikan_nonformal->sertifikat == 'ya') Ya @endif
                                @if($pendidikan_nonformal->sertifikat == 'tidak') Tidak @endif

                            </td>

                        </tr>

                        @endforeach

                    </table>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Pengalaman Berorganisasi</div>

                <div class="card-body">
                    <table class="table table-bordered table-light table-striped">
                        <tr>
                            <th>Nama Organisasi</th>
                            <th>Posisi/Jabatan</th>
                            <th>Tahun</th>
                            <th>Kegiatan</th>

                        </tr>
                        @foreach ($pengalaman_organisasi as $peng_orga)

                        <tr>
                            <td>{{ $peng_orga->nama_organisasi }}</td>
                            <td>{{ $peng_orga->jabatan }}</td>
                            <td>{{ $peng_orga->tahun }}</td>
                            <td>{{ $peng_orga->kegiatan }}</td>

                        </tr>

                        @endforeach

                    </table>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Bahasa yang dikuasai</div>

                <div class="card-body">
                    <table class="table table-bordered table-light table-striped">
                        <tr>
                            <th>Bahasa</th>
                            <th>Berbicara</th>
                            <th>Menulis</th>
                            <th>Mengerti</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($bahasa as $key => $bahasaa)

                        <tr>
                            <td>{{ $bahasaa->bahasa }}</td>
                            <td>
                                @if($bahasaa->bicara == 'kurang') Kurang @endif
                                @if($bahasaa->bicara == 'cukup') Cukup @endif
                                @if($bahasaa->bicara == 'baik') Baik @endif
                                </select>
                            </td>
                            <td>

                                @if($bahasaa->menulis == 'kurang') Kurang @endif
                                @if($bahasaa->menulis == 'cukup') Cukup @endif
                                @if($bahasaa->menulis == 'baik') Baik @endif

                            </td>
                            <td>

                                @if($bahasaa->mengerti == 'kurang') Kurang @endif
                                @if($bahasaa->mengerti == 'cukup') Cukup @endif
                                @if($bahasaa->mengerti == 'baik') Baik @endif

                            </td>

                        </tr>

                        @endforeach

                    </table>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Pengalaman Kerja</div>

                <div class="card-body">
                    <table class="table table-bordered tabled-striped">
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>No. Telp Perusahaan</th>
                            <th>Jabatan Terakhir</th>
                            <th>Gaji Terakhir</th>
                            <th>Masa Kerja (Tahun-tahun)</th>
                            <th>Alasan Berhenti</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($pengalaman_kerja as $key => $peng_kerja)

                        <tr>
                            <td>{{ $peng_kerja->nama_perusahaan }}</td>
                            <td>{{ $peng_kerja->alamat }}</td>
                            <td>{{ $peng_kerja->notelp_kantor }}</td>
                            <td>{{ $peng_kerja->jabatan_terakhir }}</td>
                            <td>{{ $peng_kerja->gaji_terakhir }}</td>
                            <td>{{ $peng_kerja->masa_kerja }}</td>
                            <td>{{ $peng_kerja->alasan }}</td>

                        </tr>

                        @endforeach

                    </table>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Minat dan Konsep Pribadi</div>
                <div class="card-body">

                    <div class="col">
                        <div class="row mb-2">
                            <label class="form-label" for="alasan">1. Mengapa Saudara ingin bekerja di Yayasan/SMK Bagimu Negeriku Semarang?</label>
                            <textarea name="alasan" id="alasan" cols="30" rows="10" style="height: 100px" class="form-control" disabled>@if(isset($minat[0]->alasan)) {{ $minat[0]->alasan }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="pengetahuan">2. Apa yang Saudara ketahui mengenai Perusahaan kami?</label>
                            <textarea name="pengetahuan" id="pengetahuan" cols="30" rows="10" style="height: 100px" class="form-control" disabled>@if(isset($minat[0]->alasan)) {{ $minat[0]->pengetahuan }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <div class="row" style="width: 100vmax">
                                <div class="col"><label class="form-label" for="gaji">3. Berapa gaji minimal yang Saudara inginkan?</label></div>
                                <div class="col col-md-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        </div>
                                        <input type="text" class="form-control" disabled name="gaji" id="gaji" placeholder="Gaji" aria-label="Gaji" @if(isset($minat[0]->gaji)) value="{{ $minat[0]->gaji }}" @endif aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="no4">4. Fasilitas-fasilitas yang diinginkan disamping gaji</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">a</span>
                                </div>
                                @if(isset($minat[0]->fasilitas1)) {{ $minat[0]->fasilitas1 }} @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">b</span>
                                </div>
                                @if(isset($minat[0]->fasilitas2)) {{ $minat[0]->fasilitas2 }} @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">c</span>
                                </div>
                                @if(isset($minat[0]->fasilitas3)) {{ $minat[0]->fasilitas3 }} @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">d</span>
                                </div>
                                @if(isset($minat[0]->fasilitas4)) {{ $minat[0]->fasilitas4 }} @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="row" style="width: 100vmax">
                                <div class="col"><label class="form-label" for="mulaikerja">5. Kapan saudara dapat mulai kerja?</label></div>
                                <div class="col col-md-8">
                                    @if(isset($minat[0]->mulaikerja)) {{ $minat[0]->mulaikerja }} @endif
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Aktivasi Sosial dan Kegiatan-kegiatan lain</div>

                <div class="card-body">

                    <div class="col">
                        <div class="row mb-2">
                            <label class="form-label" for="hobi">1. Apakah hobby / kegemaran Saudara?</label>
                            <textarea name="hobi" id="hobi" cols="30" rows="10" style="height: 100px" class="form-control" disabled>@if(isset($aktivitas_sosial[0]->hobi)) {{ $aktivitas_sosial[0]->hobi }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="waktuluang">2. Bagaimana cara Saudara mengisi waktu luang?</label>
                            <textarea name="waktuluang" id="waktuluang" cols="30" rows="10" style="height: 100px" class="form-control" disabled>@if(isset($aktivitas_sosial[0]->waktuluang)) {{ $aktivitas_sosial[0]->waktuluang }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="membaca">3. a. Surat kabar, majalah atau buku-buku apakah yang Saudara baca? Jelaskan.</label>
                            <textarea name="membaca" id="membaca" cols="30" rows="10" style="height: 100px" class="form-control" disabled>@if(isset($aktivitas_sosial[0]->membaca)) {{ $aktivitas_sosial[0]->membaca }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="topik">3. b. Pokok-pokok / topik-topik apakah yang paling Saudara senangi? Jelaskan</label>
                            <textarea name="topik" id="topik" cols="30" rows="10" style="height: 100px" class="form-control" disabled>@if(isset($aktivitas_sosial[0]->topik)) {{ $aktivitas_sosial[0]->topik }} @endif</textarea>
                        </div>

                    </div>

                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Lain-lain</div>

                <div class="card-body">

                    <div class="col">
                        <div class="row mb-2">
                            <label class="form-label" for="hobi">1. a. Faktor-faktor apakah yang merupakan kekuatan bagi diri Saudara?</label>
                            <textarea name="kekuatan" id="kekuatan" cols="30" rows="10" style="height: 100px" class="form-control" disabled>@if(isset($lainnya[0]->kekuatan)) {{ $lainnya[0]->kekuatan }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="waktuluang">b. Faktor-faktor apakah yang Saudara rasakan merupakan kelemahan bagi diri Saudara?</label>
                            <textarea name="kelemahan" id="kelemahan" cols="30" rows="10" style="height: 100px" class="form-control" disabled>@if(isset($lainnya[0]->kelemahan)) {{ $lainnya[0]->kelemahan }} @endif</textarea>
                        </div>

                    </div>

                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Person yang dapat dihubungi ketika keadaan darurat</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nama</th>
                            <th>Alamat Rumah / Kantor</th>
                            <th>Nomor Telp. / HP</th>
                            <th>Hubungan</th>

                        </tr>
                        @foreach($nomor_darurat as $key => $darurat)
                        <tr>
                            <td>{{ $darurat->nama }}</td>
                            <td>{{ $darurat->alamat }}</td>
                            <td>{{ $darurat->notelp }}</td>
                            <td>{{ $darurat->hubungan }}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('status2').onchange = function() {
        if (this.value == 'menikah') {
            document.getElementById('tglnikah').style.display = 'block';
        } else {
            document.getElementById('tglnikah').style.display = 'none';
        }
    };

    function scrollDownWin() {
        window.scrollBy(0, 100);
    }

    function scrollUpWin() {
        window.scrollBy(0, -100);
    }

</script>
@endsection
