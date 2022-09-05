@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <div class="card" style="width: 70rem;">
                <div class="card-header">Identitas Diri</div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body">
                    <div class="col">
                        <form action="{{ route('user.savedata') }}" method="POST">
                            @csrf
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nama Lengkap</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="nama" class="form-control" id="nama" 
                                    @if (isset($data[0]->nama_lengkap))
                                    value="{{ $data[0]->nama_lengkap }}"
                                    @else
                                    value="{{ Auth::user()->name }}"
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nama Panggilan</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="nickname" class="form-control" id="nickname" @if (isset($data[0]->nickname))
                                    value="{{ $data[0]->nickname }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Jenis Kelamin</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="#" @if (!isset($data[0]->gender))selected @endif>Pilih salah satu</option>
                                        <option value="pria" @if (isset($data[0]->gender) && $data[0]->gender == 'pria')selected @endif>Pria</option>
                                        <option value="wanita" @if (isset($data[0]->gender) && $data[0]->gender == 'wanita')selected @endif>Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Kewarganegaraan</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" @if (isset($data[0]->kewarganegaraan))
                                    value="{{ $data[0]->kewarganegaraan }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Agama</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <select name="agama" id="agama" class="form-control">
                                        <option value="#" @if (!isset($data[0]->agama))selected @endif>Pilih salah satu</option>
                                        <option value="kristen" @if (isset($data[0]->agama) && $data[0]->agama == 'kristen')selected @endif>Kristen</option>
                                        <option value="katolik" @if (isset($data[0]->agama) && $data[0]->agama == 'katolik')selected @endif>Katolik</option>
                                        <option value="hindu" @if (isset($data[0]->agama) && $data[0]->agama == 'hindu')selected @endif>Hindu</option>
                                        <option value="budha" @if (isset($data[0]->agama) && $data[0]->agama == 'budha')selected @endif>Budha</option>
                                        <option value="islam" @if (isset($data[0]->agama) && $data[0]->agama == 'islam')selected @endif>Islam</option>
                                        <option value="konghucu" @if (isset($data[0]->agama) && $data[0]->agama == 'konghucu')selected @endif>Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Tempat, Tanggal lahir</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <div class="row" style="margin-bottom:10px">
                                        <div class="col">
                                            <input type="text" name="tempat" class="form-control" id="tempat" 
                                            @if (isset($data[0]->tempat_lahir))
                                                value="{{ $data[0]->tempat_lahir }}"
                                            @else
                                                value=""
                                            @endif>
                                        </div>
                                        <div class="col col-sm-1">
                                            <h2>/</h2>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control" name="birthday" id="birthday" 
                                            @if (isset($data[0]->tanggal_lahir))
                                                value="{{ $data[0]->tanggal_lahir }}"
                                            @else
                                                value=""
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">No. KTP</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <div class="row" style="margin-bottom:10px">
                                        <div class="col">
                                            <input type="text" name="no.ktp" class="form-control" id="no.ktp"
                                            @if (isset($data[0]->no_ktp))
                                                value="{{ $data[0]->no_ktp }}"
                                            @else
                                                value=""
                                            @endif>
                                        </div>
                                        <div class="col col-sm-3">
                                            <h5 style="padding-top: 8px">Sampai dengan</h5>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="sampaiktp" id="sampaiktp"
                                            @if (isset($data[0]->ktp_sampaidgn))
                                                value="{{ $data[0]->ktp_sampaidgn }}"
                                            @else
                                                value=""
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Alamat sesuai ktp</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="alamat_ktp" class="form-control" id="alamat_ktp" @if (isset($data[0]->alamat_ktp))
                                    value="{{ $data[0]->alamat_ktp }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Alamat sekarang/ Domisili/ Surat-Menyurat</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="alamat_domisili" class="form-control" id="alamat_domisili" @if (isset($data[0]->alamat_domisili))
                                    value="{{ $data[0]->alamat_domisili }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nomor Telepon</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="notelp" class="form-control" id="notelp"
                                    @if (isset($data[0]->no_telp))
                                                value="{{ $data[0]->no_telp }}"
                                            @else
                                                value=""
                                            @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nomor Handphone</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="nohp" class="form-control" id="nohp"
                                    @if (isset($data[0]->no_handphone))
                                                value="{{ $data[0]->no_handphone }}"
                                            @else
                                                value=""
                                            @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">E-Mail</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control" id="email"
                                    @if (isset($data[0]->email))
                                    value="{{ $data[0]->email }}"
                                    @else
                                    value="{{ Auth::user()->email }}"
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Golongan Darah</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <select name="goldarah" class="form-control" id="goldarah">
                                        <option value="#" @if (!isset($data[0]->gol_darah))selected @endif>Pilih salah satu</option>
                                        <option value="A" @if (isset($data[0]->gol_darah) && $data[0]->gol_darah == 'A')selected @endif>A</option>
                                        <option value="B" @if (isset($data[0]->gol_darah) && $data[0]->gol_darah == 'B')selected @endif>B</option>
                                        <option value="AB" @if (isset($data[0]->gol_darah) && $data[0]->gol_darah == 'AB')selected @endif>AB</option>
                                        <option value="O" @if (isset($data[0]->gol_darah) && $data[0]->gol_darah == 'O')selected @endif>O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Kemampuan Mengemudi</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col" style="font-size: 20px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="motor" type="checkbox" id="inlineCheckbox1" value="true" @if (isset($data[0]->motor) && $data[0]->motor == 1) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">Motor</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="mobil" type="checkbox" id="inlineCheckbox2" value="true" @if (isset($data[0]->mobil) && $data[0]->mobil == 1) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox2">Mobil</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">SIM yang dimiliki</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col" style="font-size: 20px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="simA" type="checkbox" id="inlineCheckbox1" value="true" @if (isset($data[0]->simA) && $data[0]->simA == 1) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">A</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="simB1" type="checkbox" id="inlineCheckbox2" value="true" @if (isset($data[0]->simB1) && $data[0]->simB1 == 1) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox2">B1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="simB2" type="checkbox" id="inlineCheckbox3" value="true" @if (isset($data[0]->simB2) && $data[0]->simB2 == 1) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox3">B2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="simC" type="checkbox" id="inlineCheckbox4" value="true" @if (isset($data[0]->simC) && $data[0]->simC == 1) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox4">C</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end" style="margin-bottom: 10px;">
                                <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Keluarga & Lingkungan</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Anak</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Susunan Keluarga</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Riwayat Pendidikan Formal</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Riwayat Pendidikan Non-Formal</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Pengalaman Berorganisasi</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Bahasa yang dikuasai</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Pengalaman Kerja</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Minat dan Konsep Pribadi</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Aktivasi Sosial dan Kegiatan-kegiatan lain</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Lain-lain</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Person yang dapat dihubungi ketika keadaan darurat</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection