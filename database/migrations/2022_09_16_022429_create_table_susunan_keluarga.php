<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSusunanKeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_susunan_keluarga', function (Blueprint $table) {
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('nama');
            $table->string('hubungan');
            $table->string('tempatlahir');
            $table->string('tanggallahir');
            $table->string('pendterakhir')->nullable();
            $table->string('pekerjaan')->nullable();
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
        Schema::dropIfExists('table_susunan_keluarga');
    }
}
