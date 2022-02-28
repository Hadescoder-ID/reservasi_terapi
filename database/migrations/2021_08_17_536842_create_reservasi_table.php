<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->bigIncrements('id_reservasi');
            $table->date('tanggal');
            // $table->unsignedBigInteger('kode_jadwal');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_dokter');
            $table->timestamps();
        });

        Schema::table('reservasi', function (Blueprint $table) {
            // $table->foreign('kode_jadwal')->references('id_jadwal')->on('jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasi');
    }
}
