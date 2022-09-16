@extends('layouts.app')

@section('content')
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
                            <form action="{{ route('user.save.pasfoto') }}" method="post" class="mt-2" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="image" class="form-control">
                                <center><button type="submit" class="btn btn-primary mt-2">Simpan</button></center>
                            </form>
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
                            <form action="{{ route('user.save.fotoserbadan') }}" method="post" class="mt-2" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="image" class="form-control">
                                <center><button type="submit" class="btn btn-primary mt-2">Simpan</button></center>
                            </form>
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
                            <form action="{{ route('user.save.fotoktp') }}" method="post" class="mt-2" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="image" class="form-control">
                                <center><button type="submit" class="btn btn-primary mt-2">Simpan</button></center>
                            </form>
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
                            <form action="{{ route('user.save.fotokk') }}" method="post" class="mt-2" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="image" class="form-control">
                                <center><button type="submit" class="btn btn-primary mt-2">Simpan</button></center>
                            </form>
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
                        <form action="{{ route('user.savedata') }}" method="POST">
                            @csrf
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Nama Lengkap</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="nama" class="form-control" id="nama" @if (isset($data[0]->nama_lengkap))
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
                                            <input type="text" name="tempat" class="form-control" id="tempat" @if (isset($data[0]->tempat_lahir))
                                            value="{{ $data[0]->tempat_lahir }}"
                                            @else
                                            value=""
                                            @endif>
                                        </div>
                                        <div class="col col-sm-1">
                                            <h2>/</h2>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control" name="birthday" id="birthday" @if (isset($data[0]->tanggal_lahir))
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
                                            <input type="text" name="no.ktp" class="form-control" id="no.ktp" @if (isset($data[0]->no_ktp))
                                            value="{{ $data[0]->no_ktp }}"
                                            @else
                                            value=""
                                            @endif>
                                        </div>
                                        <div class="col col-sm-3">
                                            <h5 style="padding-top: 8px">Sampai dengan</h5>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="sampaiktp" id="sampaiktp" @if (isset($data[0]->ktp_sampaidgn))
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
                                    <input type="text" name="notelp" class="form-control" id="notelp" @if (isset($data[0]->no_telp))
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
                                    <input type="text" name="nohp" class="form-control" id="nohp" @if (isset($data[0]->no_handphone))
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
                                    <input type="email" name="email" class="form-control" id="email" @if (isset($data[0]->email))
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
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Keluarga & Lingkungan</div>
                <div class="card-body">
                    <div class="col">
                        <form action="{{ route('user.savedatakeluarga') }}" method="POST">
                            @csrf
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Status Pernikahan</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <select name="status" id="status2" class="form-control">
                                                <option value="#" @if (!isset($keluarga[0]->status))selected @endif>Pilih salah satu</option>
                                                <option value="lajang" @if (isset($keluarga[0]->status) && $keluarga[0]->status == 'lajang')selected @endif>Lajang</option>
                                                <option value="menikah" @if (isset($keluarga[0]->status) && $keluarga[0]->status == 'menikah')selected @endif>Menikah</option>
                                                <option value="duda" @if (isset($keluarga[0]->status) && $keluarga[0]->status == 'duda')selected @endif>Duda</option>
                                                <option value="janda" @if (isset($keluarga[0]->status) && $keluarga[0]->status == 'janda')selected @endif>Janda</option>
                                            </select>
                                        </div>
                                        <div class="col" id="tglnikah" style="display: none;">
                                            <div class="row">
                                                <div class="col col-sm-3 pt-2">
                                                    <label for="tanggalNikah">Tanggal :</label>
                                                </div>
                                                <div class="col">
                                                    <input type="date" id="tanggalNikah" name="tanggalNikah" class="form-control" @if (isset($keluarga[0]->tgl_nikah))
                                                    value="{{ $keluarga[0]->tgl_nikah }}"
                                                    @else
                                                    value=""
                                                    @endif>
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
                                    <input type="text" name="nama_pasangan" id="nama_pasangan" class="form-control" @if (isset($keluarga[0]->nama_pasangan))
                                    value="{{ $keluarga[0]->nama_pasangan }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-3">Tempat, Tanggal lahir</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <div class="row" style="margin-bottom:10px">
                                        <div class="col">
                                            <input type="text" name="tempat" class="form-control" id="tempat" @if (isset($keluarga[0]->tempat_lahir))
                                            value="{{ $keluarga[0]->tempat_lahir }}"
                                            @else
                                            value=""
                                            @endif>
                                        </div>
                                        <div class="col col-sm-1">
                                            <h2>/</h2>
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control" name="birthday" id="birthday" @if (isset($keluarga[0]->tanggal_lahir))
                                            value="{{ $keluarga[0]->tanggal_lahir }}"
                                            @else
                                            value=""
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Agama</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <select name="agama" id="agama" class="form-control">
                                        <option value="#" @if (!isset($keluarga[0]->agama))selected @endif>Pilih salah satu</option>
                                        <option value="kristen" @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'kristen')selected @endif>Kristen</option>
                                        <option value="katolik" @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'katolik')selected @endif>Katolik</option>
                                        <option value="hindu" @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'hindu')selected @endif>Hindu</option>
                                        <option value="budha" @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'budha')selected @endif>Budha</option>
                                        <option value="islam" @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'islam')selected @endif>Islam</option>
                                        <option value="konghucu" @if (isset($keluarga[0]->agama) && $keluarga[0]->agama == 'konghucu')selected @endif>Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Kewarganegaraan</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" @if (isset($keluarga[0]->kewarganegaraan))
                                    value="{{ $keluarga[0]->kewarganegaraan }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">
                                    <select name="ketpasangan" style="width: 145px; float:left;" id="ketpasangan" class="form-control">
                                        <option value="bercerai" @if (isset($keluarga[0]->ketnikah) && $keluarga[0]->ketnikah == 'berecerai')selected @endif>Bercerai</option>
                                        <option value="meninggal" @if (isset($keluarga[0]->ketnikah) && $keluarga[0]->ketnikah == 'meninggal')selected @endif>Meninggal</option>
                                    </select>
                                    <div style="float: left;padding-top: 6px;padding-left: 10px;font-size: 16px;"> tanggal</div>
                                </div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="date" class="form-control" name="pisahtanggal" id="pisahtanggal" @if (isset($keluarga[0]->tanggalket))
                                    value="{{ $keluarga[0]->tanggalket }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Pendidikan Terakhir</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="pendidikan" id="pendidikan" class="form-control" @if (isset($keluarga[0]->pendterakhir))
                                    value="{{ $keluarga[0]->pendterakhir }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Pekerjaan</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" @if (isset($keluarga[0]->pekerjaan))
                                    value="{{ $keluarga[0]->pekerjaan }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Jabatan</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" @if (isset($keluarga[0]->jabatan))
                                    value="{{ $keluarga[0]->jabatan }}"
                                    @else
                                    value=""
                                    @endif>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col col-sm-3">Alamat Tempat Bekerja</div>
                                <div class="col col-sm-1">:</div>
                                <div class="col">
                                    <input type="text" name="alamatkerja" id="alamatkerja" class="form-control" @if (isset($keluarga[0]->alamatkerja))
                                    value="{{ $keluarga[0]->alamatkerja }}"
                                    @else
                                    value=""
                                    @endif>
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
                            <th>Aksi</th>
                        </tr>
                        @foreach ($anak as $key => $anakk)
                        <tr>
                            <form action="{{ route('user.savedataanak') }}" method="post">
                                @csrf
                                <input type="hidden" name="keterangan" value="ubah">
                                <input type="hidden" name="namaawal" value="{{ $anakk->nama_anak }}">
                                <td>{{ $key+1 }}</td>
                                <td><input type="text" name="nama_anak" id="nama_anak" value="{{ $anakk->nama_anak }}" class="form-control"></td>
                                <td>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="#" @if ($anakk->gender == '#')selected @endif>- Pilih -</option>
                                        <option value="P" @if ($anakk->gender == 'P')selected @endif>Perempuan</option>
                                        <option value="L" @if ($anakk->gender == 'L')selected @endif>Laki-laki</option>
                                    </select>
                                    {{-- <input type="text" name="gender" id="gender" value="{{ $anakk->gender }}" class="form-control"></td> --}}
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="tempatlahir" id="tempatlahir" value="{{ $anakk->tempatlahir }}" class="form-control">
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tanggallahir" id="tanggallahir" value="{{ $anakk->tanggallahir }}" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <td><input type="text" name="pendterakhir" id="pendterakhir" value="{{ $anakk->pendterakhir }}" class="form-control"></td>
                                <td>
                                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ $anakk->pekerjaan }}" class="form-control">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-block btn-warning">Ubah</button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                        <tr>
                            <form action="{{ route('user.savedataanak') }}" method="post">
                                @csrf
                                <input type="hidden" name="keterangan" value="tambah">
                                <td></td>
                                <td><input type="text" name="nama_anak" id="nama_anak" class="form-control"></td>
                                <td>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="#" selected>-Pilih-</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-laki</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="tempatlahir" id="tempatlahir" class="form-control">
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tanggallahir" id="tanggallahir" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <td><input type="text" name="pendterakhir" id="pendterakhir" class="form-control"></td>
                                <td>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </td>
                            </form>
                        </tr>
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
                            <th>Aksi</th>
                        </tr>
                        @foreach ($suskel as $key => $suskell)
                        <tr>
                            <form action="{{ route('user.savedatasusunankel') }}" method="post">
                                @csrf
                                <input type="hidden" name="keterangan" value="ubah">
                                <input type="hidden" name="namaawal" value="{{ $suskell->nama }}">
                                <td>{{ $key+1 }}</td>
                                <td><input type="text" name="nama" id="nama" value="{{ $suskell->nama }}" class="form-control"></td>
                                <td>
                                    <input type="text" name="hubungan" id="hubungan" value="{{ $suskell->hubungan }}" class="form-control"></td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="tempatlahir" id="tempatlahir" value="{{ $suskell->tempatlahir }}" class="form-control">
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tanggallahir" id="tanggallahir" value="{{ $suskell->tanggallahir }}" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <td><input type="text" name="pendterakhir" id="pendterakhir" value="{{ $suskell->pendterakhir }}" class="form-control"></td>
                                <td>
                                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ $suskell->pekerjaan }}" class="form-control">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-block btn-warning">Ubah</button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                        <tr>
                            <form action="{{ route('user.savedatasusunankel') }}" method="post">
                                @csrf
                                <input type="hidden" name="keterangan" value="tambah">
                                <td></td>
                                <td><input type="text" name="nama" id="nama" class="form-control"></td>
                                <td><input type="text" name="hubungan" id="hubungan" class="form-control"></td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="tempatlahir" id="tempatlahir" class="form-control">
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tanggallahir" id="tanggallahir" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <td><input type="text" name="pendterakhir" id="pendterakhir" class="form-control"></td>
                                <td>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </td>
                            </form>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Riwayat Pendidikan Formal</div>

                <div class="card-body">
                    <table class="table table-bordered table-light table-striped">
                        <tr>
                            <th>Jenis Sekolah</th>
                            <th>Nama Sekolah</th>
                            <th>Jurusan/Fakultas</th>
                            <th>Tempat Sekolah</th>
                            <th>Dari Tahun s/d Tahun</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <td>SD</td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>SMP</td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>SMA</td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Akademi</td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Universitas</td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Pasca Sarjana</td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Doktoral</td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                            <td><input type="text" name="riwayat" id="riwayat" class="form-control"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Riwayat Pendidikan Non-Formal</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped table-light">
                        <tr>
                            <th colspan="6">KURSUS</th>
                        </tr>
                        <tr>
                            <th>Jenis Kursus</th>
                            <th>Nama Lembaga</th>
                            <th colspan="2">Kota</th>
                            <th>Tahun</th>
                            <th>Sertifikat</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td colspan="2">1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th colspan="6">Pelatihan - Lokakarya - Seminar - Penataran</th>
                        </tr>
                        <tr>
                            <th>Pelatihan\Seminar</th>
                            <th>Penyelenggara</th>
                            <th>Tahun</th>
                            <th>Pembiayaan</th>
                            <th>Lamanya</th>
                            <th>Sertifikat</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Pengalaman Berorganisasi</div>

                <div class="card-body">
                    <table class="table table-bordered table-light table-striped">
                        <tr>
                            <th>Nama Organisasi</th>
                            <th>Posisi/Jabatan</th>
                            <th>Tahun</th>
                            <th>Kegiatan</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="" id="" class="form-control"></td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Bahasa yang dikuasai</div>

                <div class="card-body">
                    <table class="table table-bordered table-light table-striped">
                        <tr>
                            <th rowspan="2">Bahasa</th>
                            <th colspan="3">Berbicara</th>
                            <th colspan="3">Menulis</th>
                            <th colspan="3">Mengerti</th>
                        </tr>
                        <tr>
                            <th>Kurang</th>
                            <th>Cukup</th>
                            <th>Baik</th>
                            <th>Kurang</th>
                            <th>Cukup</th>
                            <th>Baik</th>
                            <th>Kurang</th>
                            <th>Cukup</th>
                            <th>Baik</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Pengalaman Kerja</div>

                <div class="card-body">
                    <table class="table table-bordered tabled-striped">
                        <tr>
                            <th>Nama Perusahaan</th>
                            <td colspan="3"><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td colspan="3"><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>No. Telp Perusahaan</th>
                            <td><input type="text" name="" id="" class="form-control"></td>
                            <th>Jabatan Terakhir</th>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Masa Kerja (Th-Th)</th>
                            <td><input type="text" name="" id="" class="form-control"></td>
                            <th>Gaji Terakhir</th>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Alasan Berhenti</th>
                            <td colspan="3"><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Minat dan Konsep Pribadi</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Aktivasi Sosial dan Kegiatan-kegiatan lain</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Lain-lain</div>

                <div class="card-body">

                </div>
            </div>
            <br>
            <div class="card"  style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Person yang dapat dihubungi ketika keadaan darurat</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nama</th>
                            <th>Alamat Rumah / Kantor</th>
                            <th>Nomor Telp. / HP</th>
                            <th>Hubungan</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
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

</script>
@endsection
