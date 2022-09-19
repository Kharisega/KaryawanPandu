<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePengalamanKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pengalaman_kerja', function (Blueprint $table) {
            $table->id('id_pengalaman');
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('nama_perusahaan');
            $table->string('alamat')->nullable();
            $table->string('notelp_kantor')->nullable();
            $table->string('jabatan_terakhir')->nullable();
            $table->string('gaji_terakhir')->nullable();
            $table->string('masa_kerja')->nullable();
            $table->string('alasan')->nullable();
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
        Schema::dropIfExists('table_pengalaman_kerja');
    }
}
