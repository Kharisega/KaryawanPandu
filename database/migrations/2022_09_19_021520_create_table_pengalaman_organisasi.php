<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePengalamanOrganisasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pengalaman_organisasi', function (Blueprint $table) {
            $table->id('id_organisasi');
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('nama_organisasi');
            $table->string('jabatan');
            $table->string('tahun');
            $table->string('kegiatan');
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
        Schema::dropIfExists('table_pengalaman_organisasi');
    }
}
