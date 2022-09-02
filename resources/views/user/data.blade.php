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
                        <form action="" method="post">
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nama Lengkap</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="nama" class="form-control" id="nama" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nama Panggilan</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="nickname" class="form-control" id="nickname">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Jenis Kelamin</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="#" selected>Pilih salah satu</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Kewarganegaraan</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Agama</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="#" selected>Pilih salah satu</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="islam">Islam</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Tempat, Tanggal lahir</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <div class="row" style="margin-bottom:10px">
                                        <div class="col">
                                            <input type="text" name="tempat" class="form-control" id="tempat">
                                        </div>
                                        <div class="col col-sm-1"><h2>/</h2></div>
                                        <div class="col"><input type="date" class="form-control" name="birthday" id="birthday"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">No. KTP</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <div class="row" style="margin-bottom:10px">
                                        <div class="col">
                                            <input type="text" name="no.ktp" class="form-control" id="no.ktp">
                                        </div>
                                        <div class="col col-sm-3"><h5 style="padding-top: 8px">Sampai dengan</h5></div>
                                        <div class="col"><input type="text" class="form-control" name="sampaiktp" id="sampaiktp"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Alamat sesuai ktp</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <textarea name="alamatktp" class="form-control" id="alamatktp"></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Alamat sekarang/ Domisili/ Surat-Menyurat</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <textarea name="domisili" class="form-control" id="domisili"></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nomor Telepon</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="notelp" class="form-control" id="notelp">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nomor Handphone</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="nohp" class="form-control" id="nohp">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">E-Mail</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Golongan Darah</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <select name="goldarah" class="form-control" id="goldarah">
                                        <option value="#" selected>Pilih salah satu</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Kemampuan Mengemudi</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col" style="font-size: 20px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="motor" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Motor</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="mobil" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Mobil</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">SIM yang dimiliki</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col" style="font-size: 20px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="A" type="checkbox" id="inlineCheckbox1" value="true">
                                        <label class="form-check-label" for="inlineCheckbox1">A</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="B1" type="checkbox" id="inlineCheckbox2" value="true">
                                        <label class="form-check-label" for="inlineCheckbox2">B1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="B2" type="checkbox" id="inlineCheckbox3" value="true">
                                        <label class="form-check-label" for="inlineCheckbox3">B2</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="C" type="checkbox" id="inlineCheckbox4" value="true">
                                        <label class="form-check-label" for="inlineCheckbox4">C</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end" style="margin-bottom: 10px;">
                                <button type="submit" class="btn btn-success btn-lg">Submit</button>
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
