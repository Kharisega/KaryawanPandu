<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBahasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_bahasa', function (Blueprint $table) {
            $table->id('id_bahasa');
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('bahasa');
            $table->string('bicara');
            $table->string('menulis');
            $table->string('mengerti');
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
        Schema::dropIfExists('table_bahasa');
    }
}
