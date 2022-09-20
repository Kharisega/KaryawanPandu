<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMinat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_minat', function (Blueprint $table) {
            $table->id('id_minat');
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->text('alasan');
            $table->text('pengetahuan');
            $table->string('gaji');
            $table->string('fasilitas1');
            $table->string('fasilitas2');
            $table->string('fasilitas3');
            $table->string('fasilitas4');
            $table->string('mulaikerja');
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
        Schema::dropIfExists('table_minat');
    }
}
