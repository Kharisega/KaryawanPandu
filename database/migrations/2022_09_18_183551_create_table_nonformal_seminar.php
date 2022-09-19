<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNonformalSeminar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_nonformal_seminar', function (Blueprint $table) {
            $table->id('id_seminar');
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('jenislatihan');
            $table->string('penyelenggara');
            $table->string('tahun');
            $table->string('pembiayaan');
            $table->string('lamanya');
            $table->string('sertifikat');
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
        Schema::dropIfExists('table_nonformal_seminar');
    }
}
