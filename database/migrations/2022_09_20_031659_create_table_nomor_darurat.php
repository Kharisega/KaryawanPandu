<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNomorDarurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_nomor_darurat', function (Blueprint $table) {
            $table->id('id_darurat');
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('nama');
            $table->string('alamat');
            $table->string('notelp');
            $table->string('hubungan');
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
        Schema::dropIfExists('table_nomor_darurat');
    }
}
