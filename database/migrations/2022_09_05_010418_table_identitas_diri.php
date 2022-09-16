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
            $table->string('nickname')->nullable();
            $table->enum('gender',['pria','wanita'])->default('pria')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->enum('agama',['kristen','katolik', 'islam','budha', 'hindu','konghucu'])->default('kristen')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('ktp_sampaidgn')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_handphone')->nullable();
            $table->string('email');
            $table->string('gol_darah')->nullable();
            $table->boolean('motor')->nullable();
            $table->boolean('mobil')->nullable();
            $table->boolean('simA')->nullable();
            $table->boolean('simB1')->nullable();
            $table->boolean('simB2')->nullable();
            $table->boolean('simC')->nullable();
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
