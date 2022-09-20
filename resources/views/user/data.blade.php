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
                                <td><input type="text" name="namasekolah[]" id="namasekolah[]" class="form-control"></td>
                                <td><input type="text" name="jurusan[]" id="jurusan[]" class="form-control"></td>
                                <td><input type="text" name="alamat[]" id="alamat[]" class="form-control"></td>
                                <td><input type="text" name="darithn[]" id="darithn[]" class="form-control"></td>
                                <td><input type="text" name="keterangan[]" id="keterangan[]" class="form-control"></td>
                            </tr>
                            @endforeach
                            @else
                            @foreach ($pendidikan_formal as $key => $pendikira)
                            <tr>
                                <td>{{ $pendikira->jenis_sekolah }}
                                    <input type="hidden" name="jenis[]" id="jenis[]" class="form-control" value="{{ $pendikira->jenis_sekolah }}"></td>
                                <td><input type="text" name="namasekolah[]" id="namasekolah[]" @if(isset($pendikira->nama_sekolah))
                                    value="{{ $pendikira->nama_sekolah }}"
                                    @else
                                    value=""
                                    @endif class="form-control"></td>
                                <td><input type="text" name="jurusan[]" id="jurusan[]" @if(isset($pendikira->jurusan))
                                    value="{{ $pendikira->jurusan }}"
                                    @else
                                    value=""
                                    @endif class="form-control"></td>
                                <td><input type="text" name="alamat[]" id="alamat[]" class="form-control" @if(isset($pendikira->alamat_sekolah))
                                    value="{{ $pendikira->alamat_sekolah }}"
                                    @else
                                    value=""
                                    @endif ></td>
                                <td><input type="text" name="darithn[]" id="darithn[]" class="form-control" @if(isset($pendikira->dari_tahun))
                                    value="{{ $pendikira->dari_tahun }}"
                                    @else
                                    value=""
                                    @endif ></td>
                                <td><input type="text" name="keterangan[]" id="keterangan[]" @if(isset($pendikira->keterangan))
                                    value="{{ $pendikira->keterangan }}"
                                    @else
                                    value=""
                                    @endif class="form-control"></td>
                            </tr>
                            @endforeach
                            @endif
                    </table>
                    <div class="row d-flex justify-content-end" style="margin-right: 10px;">
                        <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                    </div>
                    </form>
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
                            <th>Aksi</th>
                        </tr>
                        @foreach ($pendidikan_nonformal1 as $pendidikan_nonformal)
                        <form action="{{ route('user.savedatanonformal') }}" method="post">
                            @csrf
                            <input type="hidden" name="keterangan1" value="kursus">
                            <input type="hidden" name="keterangan" value="ubah">
                            <input type="hidden" name="id_kursus" value="{{ $pendidikan_nonformal->id_kursus }}">
                            <tr>
                                <td><input type="text" name="jenis_kursus" id="jenis_kursus" class="form-control" value="{{ $pendidikan_nonformal->jenis_kursus }}"></td>
                                <td><input type="text" name="nama_lembaga" id="nama_lembaga" class="form-control" value="{{ $pendidikan_nonformal->nama_lembaga }}"></td>
                                <td colspan="2"><input type="text" name="kota" id="kota" class="form-control" value="{{ $pendidikan_nonformal->kota }}"></td>
                                <td><input type="text" name="tahun" id="tahun" class="form-control" value="{{ $pendidikan_nonformal->tahun }}"></td>
                                <td>
                                    <select name="sertifikat" id="sertifikat" class="form-control">
                                        <option value="ya" @if($pendidikan_nonformal->sertifikat == 'ya') selected @endif>Ya</option>
                                        <option value="tidak" @if($pendidikan_nonformal->sertifikat == 'tidak') selected @endif>Tidak</option>
                                    </select>
                                </td>
                                <td><button type="submit" class="btn btn-warning">Ubah</button></td>
                            </tr>
                        </form>
                        @endforeach
                        <form action="{{ route('user.savedatanonformal') }}" method="post">
                            @csrf
                            <input type="hidden" name="keterangan1" value="kursus">
                            <input type="hidden" name="keterangan" value="tambah">
                            <tr>
                                <td><input type="text" name="jenis_kursus" id="jenis_kursus" class="form-control"></td>
                                <td><input type="text" name="nama_lembaga" id="nama_lembaga" class="form-control"></td>
                                <td colspan="2"><input type="text" name="kota" id="kota" class="form-control"></td>
                                <td><input type="text" name="tahun" id="tahun" class="form-control"></td>
                                <td>
                                    <select name="sertifikat" id="sertifikat" class="form-control">
                                        <option value="ya">Ya</option>
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </td>
                                <td><button type="submit" class="btn btn-success">Tambah</button></td>
                            </tr>
                        </form>
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
                            <th>Aksi</th>
                        </tr>
                        @foreach ($pendidikan_nonformal2 as $pendidikan_nonformal)
                        <form action="{{ route('user.savedatanonformal') }}" method="post">
                            @csrf
                            <input type="hidden" name="keterangan1" value="seminar">
                            <input type="hidden" name="keterangan" value="ubah">
                            <input type="hidden" name="id_seminar" value="{{ $pendidikan_nonformal->id_seminar }}">
                            <tr>
                                <td><input type="text" name="jenislatihan" id="jenislatihan" class="form-control" value="{{ $pendidikan_nonformal->jenislatihan }}"></td>
                                <td><input type="text" name="penyelenggara" id="penyelenggara" class="form-control" value="{{ $pendidikan_nonformal->penyelenggara }}"></td>
                                <td><input type="text" name="tahun" id="tahun" class="form-control" value="{{ $pendidikan_nonformal->tahun }}"></td>
                                <td><input type="text" name="pembiayaan" id="pembiayaan" class="form-control" value="{{ $pendidikan_nonformal->pembiayaan }}"></td>
                                <td><input type="text" name="lamanya" id="lamanya" class="form-control" value="{{ $pendidikan_nonformal->lamanya }}"></td>
                                <td>
                                    <select name="sertifikat" id="sertifikat" class="form-control">
                                        <option value="ya" @if($pendidikan_nonformal->sertifikat == 'ya') selected @endif>Ya</option>
                                        <option value="tidak" @if($pendidikan_nonformal->sertifikat == 'tidak') selected @endif>Tidak</option>
                                    </select>
                                </td>
                                <td><button type="submit" class="btn btn-warning">Ubah</button></td>
                            </tr>
                        </form>
                        @endforeach
                        <form action="{{ route('user.savedatanonformal') }}" method="post">
                            @csrf
                            <input type="hidden" name="keterangan1" value="seminar">
                            <input type="hidden" name="keterangan" value="tambah">
                            <tr>
                                <td><input type="text" name="jenislatihan" id="jenislatihan" class="form-control"></td>
                                <td><input type="text" name="penyelenggara" id="penyelenggara" class="form-control"></td>
                                <td><input type="text" name="tahun" id="tahun" class="form-control"></td>
                                <td><input type="text" name="pembiayaan" id="pembiayaan" class="form-control"></td>
                                <td><input type="text" name="lamanya" id="lamanya" class="form-control"></td>
                                <td><select name="sertifikat" id="sertifikat" class="form-control">
                                        <option value="ya">Ya</option>
                                        <option value="tidak">Tidak</option>
                                    </select></td>
                                <td><button type="submit" class="btn btn-success">Tambah</button></td>
                            </tr>
                        </form>
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
                            <th>Aksi</th>
                        </tr>
                        @foreach ($pengalaman_organisasi as $peng_orga)
                        <form action="{{ route('user.savedataorganisasi') }}" method="post">
                            <input type="hidden" name="keterangan" value="ubah">
                            <input type="hidden" name="id_organisasi" value="{{ $peng_orga->id_organisasi }}">
                            @csrf
                            <tr>
                                <td><input type="text" name="nama_organisasi" id="nama_organisasi" class="form-control" value="{{ $peng_orga->nama_organisasi }}"></td>
                                <td><input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $peng_orga->jabatan }}"></td>
                                <td><input type="text" name="tahun" id="tahun" class="form-control" value="{{ $peng_orga->tahun }}"></td>
                                <td><input type="text" name="kegiatan" id="kegiatan" class="form-control" value="{{ $peng_orga->kegiatan }}"></td>
                                <td><button type="submit" class="btn btn-warning">Ubah</button></td>
                            </tr>
                        </form>
                        @endforeach
                        <form action="{{ route('user.savedataorganisasi') }}" method="post">
                            <input type="hidden" name="keterangan" value="tambah">
                            @csrf
                            <tr>
                                <td><input type="text" name="nama_organisasi" id="nama_organisasi" class="form-control"></td>
                                <td><input type="text" name="jabatan" id="jabatan" class="form-control"></td>
                                <td><input type="text" name="tahun" id="tahun" class="form-control"></td>
                                <td><input type="text" name="kegiatan" id="kegiatan" class="form-control"></td>
                                <td><button type="submit" class="btn btn-success">Tambah</button></td>
                            </tr>
                        </form>
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
                        <form action="{{ route('user.savedatabahasa') }}" method="post">
                            @csrf
                            <input type="hidden" name="keterangan" value="ubah">
                            <input type="hidden" name="id_bahasa" value="{{ $bahasaa->id_bahasa }}">
                            <tr>
                                <td><input type="text" name="bahasa" id="bahasa" class="form-control" value="{{ $bahasaa->bahasa }}"></td>
                                <td>
                                    <select name="bicara" id="bicara" class="form-control">
                                        <option value="kurang" @if($bahasaa->bicara == 'kurang') selected @endif>Kurang</option>
                                        <option value="cukup" @if($bahasaa->bicara == 'cukup') selected @endif>Cukup</option>
                                        <option value="baik" @if($bahasaa->bicara == 'baik') selected @endif>Baik</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="menulis" id="menulis" class="form-control">
                                        <option value="kurang" @if($bahasaa->menulis == 'kurang') selected @endif>Kurang</option>
                                        <option value="cukup" @if($bahasaa->menulis == 'cukup') selected @endif>Cukup</option>
                                        <option value="baik" @if($bahasaa->menulis == 'baik') selected @endif>Baik</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="mengerti" id="mengerti" class="form-control">
                                        <option value="kurang" @if($bahasaa->mengerti == 'kurang') selected @endif>Kurang</option>
                                        <option value="cukup" @if($bahasaa->mengerti == 'cukup') selected @endif>Cukup</option>
                                        <option value="baik" @if($bahasaa->mengerti == 'baik') selected @endif>Baik</option>
                                    </select>
                                </td>
                                <td><button type="submit" class="btn btn-warning">Ubah</button></td>
                            </tr>
                        </form>
                        @endforeach
                        <form action="{{ route('user.savedatabahasa') }}" method="post">
                            @csrf
                            <input type="hidden" name="keterangan" value="tambah">
                            <tr>
                                <td><input type="text" name="bahasa" id="bahasa" class="form-control"></td>
                                <td>
                                    <select name="bicara" id="bicara" class="form-control">
                                        <option value="kurang">Kurang</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="baik">Baik</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="menulis" id="menulis" class="form-control">
                                        <option value="kurang">Kurang</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="baik">Baik</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="mengerti" id="mengerti" class="form-control">
                                        <option value="kurang">Kurang</option>
                                        <option value="cukup">Cukup</option>
                                        <option value="baik">Baik</option>
                                    </select>
                                </td>
                                <td><button type="submit" class="btn btn-success">Tambah</button></td>
                            </tr>
                        </form>
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
                        <form action="{{ route('user.savedatakerja') }}" method="post">
                            @csrf
                            <input type="hidden" name="keterangan" value="ubah">
                            <input type="hidden" name="id_pengalaman" value="{{ $peng_kerja->id_pengalaman }}">
                            <tr>
                                <td><input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="{{ $peng_kerja->nama_perusahaan }}"></td>
                                <td><input type="text" name="alamat" id="alamat" class="form-control" value="{{ $peng_kerja->alamat }}"></td>
                                <td><input type="text" name="notelp_kantor" id="notelp_kantor" class="form-control" value="{{ $peng_kerja->notelp_kantor }}"></td>
                                <td><input type="text" name="jabatan_terakhir" id="jabatan_terakhir" class="form-control" value="{{ $peng_kerja->jabatan_terakhir }}"></td>
                                <td><input type="text" name="gaji_terakhir" id="gaji_terakhir" class="form-control" value="{{ $peng_kerja->gaji_terakhir }}"></td>
                                <td><input type="text" name="masa_kerja" id="masa_kerja" class="form-control" value="{{ $peng_kerja->masa_kerja }}"></td>
                                <td><input type="text" name="alasan" id="alasan" class="form-control" value="{{ $peng_kerja->alasan }}"></td>
                                <td><button type="submit" class="btn btn-warning">Ubah</button></td>
                            </tr>
                        </form>
                        @endforeach
                        <form action="{{ route('user.savedatakerja') }}" method="post">
                            @csrf
                            <input type="hidden" name="keterangan" value="tambah">
                            <tr>
                                <td><input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"></td>
                                <td><input type="text" name="alamat" id="alamat" class="form-control"></td>
                                <td><input type="text" name="notelp_kantor" id="notelp_kantor" class="form-control"></td>
                                <td><input type="text" name="jabatan_terakhir" id="jabatan_terakhir" class="form-control"></td>
                                <td><input type="text" name="gaji_terakhir" id="gaji_terakhir" class="form-control"></td>
                                <td><input type="text" name="masa_kerja" id="masa_kerja" class="form-control"></td>
                                <td><input type="text" name="alasan" id="alasan" class="form-control"></td>
                                <td><button type="submit" class="btn btn-success">Tambah</button></td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
            <br>
            <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
                <div class="card-header">Minat dan Konsep Pribadi</div>
                <div class="card-body">
                    <form action="{{ route('user.savedataminat') }}" method="post">
                        @csrf
                        <div class="col">
                            <div class="row mb-2">
                                <label class="form-label" for="alasan">1. Mengapa Saudara ingin bekerja di Yayasan/SMK Bagimu Negeriku Semarang?</label>
                                <textarea name="alasan" id="alasan" cols="30" rows="10" style="height: 100px" class="form-control">@if(isset($minat[0]->alasan)) {{ $minat[0]->alasan }} @endif</textarea>
                            </div>
                            <div class="row mb-2">
                                <label class="form-label" for="pengetahuan">2. Apa yang Saudara ketahui mengenai Perusahaan kami?</label>
                                <textarea name="pengetahuan" id="pengetahuan" cols="30" rows="10" style="height: 100px" class="form-control">@if(isset($minat[0]->alasan)) {{ $minat[0]->pengetahuan }} @endif</textarea>
                            </div>
                            <div class="row mb-2">
                                <div class="row" style="width: 100vmax">
                                    <div class="col"><label class="form-label" for="gaji">3. Berapa gaji minimal yang Saudara inginkan?</label></div>
                                    <div class="col col-md-8">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control" name="gaji" id="gaji" placeholder="Gaji" aria-label="Gaji" @if(isset($minat[0]->gaji)) value="{{ $minat[0]->gaji }}" @endif aria-describedby="basic-addon1">
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
                                    <input type="text" class="form-control" name="fasilitas1" id="fasilitas1" @if(isset($minat[0]->fasilitas1)) value="{{ $minat[0]->fasilitas1 }}" @endif aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">b</span>
                                    </div>
                                    <input type="text" class="form-control" name="fasilitas2" id="fasilitas2" @if(isset($minat[0]->fasilitas2)) value="{{ $minat[0]->fasilitas2 }}" @endif aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">c</span>
                                    </div>
                                    <input type="text" class="form-control" name="fasilitas3" id="fasilitas3" @if(isset($minat[0]->fasilitas3)) value="{{ $minat[0]->fasilitas3 }}" @endif aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">d</span>
                                    </div>
                                    <input type="text" class="form-control" name="fasilitas4" id="fasilitas4" @if(isset($minat[0]->fasilitas4)) value="{{ $minat[0]->fasilitas4 }}" @endif aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="row" style="width: 100vmax">
                                    <div class="col"><label class="form-label" for="mulaikerja">5. Kapan saudara dapat mulai kerja?</label></div>
                                    <div class="col col-md-8">
                                        <input type="text" name="mulaikerja" id="mulaikerja" class="form-control" @if(isset($minat[0]->mulaikerja)) value="{{ $minat[0]->mulaikerja }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end" style="margin-right: 10px;">
                                <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                            </div>
                    </form>
                </div>

            </div>
        </div>
        <br>
        <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
            <div class="card-header">Aktivasi Sosial dan Kegiatan-kegiatan lain</div>

            <div class="card-body">
                <form action="{{ route('user.savedatasosial') }}" method="post">
                    @csrf
                    <div class="col">
                        <div class="row mb-2">
                            <label class="form-label" for="hobi">1. Apakah hobby / kegemaran Saudara?</label>
                            <textarea name="hobi" id="hobi" cols="30" rows="10" style="height: 100px" class="form-control">@if(isset($aktivitas_sosial[0]->hobi)) {{ $aktivitas_sosial[0]->hobi }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="waktuluang">2. Bagaimana cara Saudara mengisi waktu luang?</label>
                            <textarea name="waktuluang" id="waktuluang" cols="30" rows="10" style="height: 100px" class="form-control">@if(isset($aktivitas_sosial[0]->waktuluang)) {{ $aktivitas_sosial[0]->waktuluang }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="membaca">3. a. Surat kabar, majalah atau buku-buku apakah yang Saudara baca? Jelaskan.</label>
                            <textarea name="membaca" id="membaca" cols="30" rows="10" style="height: 100px" class="form-control">@if(isset($aktivitas_sosial[0]->membaca)) {{ $aktivitas_sosial[0]->membaca }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="topik">3. b. Pokok-pokok / topik-topik apakah yang paling Saudara senangi? Jelaskan</label>
                            <textarea name="topik" id="topik" cols="30" rows="10" style="height: 100px" class="form-control">@if(isset($aktivitas_sosial[0]->topik)) {{ $aktivitas_sosial[0]->topik }} @endif</textarea>
                        </div>
                        <div class="row d-flex justify-content-end" style="margin-right: 10px;">
                            <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="card" style="width: 70rem; margin-left: 1px; margin-bottom: 10px;">
            <div class="card-header">Lain-lain</div>

            <div class="card-body">
                <form action="{{ route('user.savedatalainnya') }}" method="post">
                    @csrf
                    <div class="col">
                        <div class="row mb-2">
                            <label class="form-label" for="hobi">1. a. Faktor-faktor apakah yang merupakan kekuatan bagi diri Saudara?</label>
                            <textarea name="kekuatan" id="kekuatan" cols="30" rows="10" style="height: 100px" class="form-control">@if(isset($lainnya[0]->kekuatan)) {{ $lainnya[0]->kekuatan }} @endif</textarea>
                        </div>
                        <div class="row mb-2">
                            <label class="form-label" for="waktuluang">b. Faktor-faktor apakah yang Saudara rasakan merupakan kelemahan bagi diri Saudara?</label>
                            <textarea name="kelemahan" id="kelemahan" cols="30" rows="10" style="height: 100px" class="form-control">@if(isset($lainnya[0]->kelemahan)) {{ $lainnya[0]->kelemahan }} @endif</textarea>
                        </div>
                        <div class="row d-flex justify-content-end" style="margin-right: 10px;">
                            <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                        </div>
                    </div>
                </form>
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
                        <th>Aksi</th>
                    </tr>
                    @foreach($nomor_darurat as $key => $darurat)
                    <form action="{{ route('user.savedatadarurat') }}" method="post">
                        @csrf
                        <input type="hidden" name="keterangan" value="ubah">
                        <input type="hidden" name="id_darurat" value="{{ $darurat->id_darurat }}">
                        <tr>
                            <td><input type="text" name="nama" id="nama" class="form-control" value="{{ $darurat->nama }}"></td>
                            <td><input type="text" name="alamat" id="alamat" class="form-control" value="{{ $darurat->alamat }}"></td>
                            <td><input type="text" name="notelp" id="notelp" class="form-control" value="{{ $darurat->notelp }}"></td>
                            <td><input type="text" name="hubungan" id="hubungan" class="form-control" value="{{ $darurat->hubungan }}"></td>
                            <td><button type="submit" class="btn btn-warning">Ubah</button></td>
                        </tr>
                    </form>
                    @endforeach
                    <form action="{{ route('user.savedatadarurat') }}" method="post">
                        @csrf
                        <input type="hidden" name="keterangan" value="tambah">
                        <tr>
                            <td><input type="text" name="nama" id="nama" class="form-control"></td>
                            <td><input type="text" name="alamat" id="alamat" class="form-control"></td>
                            <td><input type="text" name="notelp" id="notelp" class="form-control"></td>
                            <td><input type="text" name="hubungan" id="hubungan" class="form-control"></td>
                            <td><button type="submit" class="btn btn-success">Tambah</button></td>
                        </tr>
                    </form>
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
