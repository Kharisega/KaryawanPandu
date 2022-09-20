<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLainnya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_lainnya', function (Blueprint $table) {
            $table->id('id_lain');
            $table->integer('id_karyawan');
            $table->string('nama_karyawan');
            $table->text('kekuatan')->nullable();
            $table->text('kelemahan')->nullable();
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
        Schema::dropIfExists('table_lainnya');
    }
}
