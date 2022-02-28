w<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal');
            $table->time('waktu');
            $table->string('hari');
            $table->unsignedBigInteger('id_dokter');
            $table->timestamps();
        });

        Schema::table('jadwal', function (Blueprint $table) {
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
        Schema::dropIfExists('jadwal');
    }
}
