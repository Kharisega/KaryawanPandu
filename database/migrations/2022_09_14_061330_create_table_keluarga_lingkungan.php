<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKeluargaLingkungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_keluarga_lingkungan', function (Blueprint $table) {
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('status')->nullable();
            $table->string('tgl_nikah')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('ketnikah')->nullable();
            $table->string('tanggalket')->nullable();
            $table->string('pendterakhir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('alamatkerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_keluarga_lingkungan');
    }
}
