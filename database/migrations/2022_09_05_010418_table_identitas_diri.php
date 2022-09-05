<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableIdentitasDiri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas_diri', function (Blueprint $table) {
            $table->integer('id_karyawan');
            $table->string('nama_lengkap');
            $table->string('nickname');
            $table->enum('gender',['pria','wanita'])->default('pria');
            $table->string('kewarganegaraan');
            $table->enum('agama',['kristen','katolik', 'islam','budha', 'hindu','konghucu'])->default('kristen');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('no_ktp');
            $table->string('ktp_sampaidgn');
            $table->string('alamat_ktp');
            $table->string('alamat_domisili');
            $table->string('no_telp');
            $table->string('no_handphone');
            $table->string('email');
            $table->string('gol_darah');
            $table->boolean('motor');
            $table->boolean('mobil');
            $table->boolean('simA');
            $table->boolean('simB1');
            $table->boolean('simB2');
            $table->boolean('simC');
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
        //
    }
}
