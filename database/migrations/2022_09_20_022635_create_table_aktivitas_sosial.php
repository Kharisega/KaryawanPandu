<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAktivitasSosial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_aktivitas_sosial', function (Blueprint $table) {
            $table->id('id_aktivitas');
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->text('hobi')->nullable();
            $table->text('waktuluang')->nullable();
            $table->text('membaca')->nullable();
            $table->text('topik')->nullable();
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
        Schema::dropIfExists('table_aktivitas_sosial');
    }
}
