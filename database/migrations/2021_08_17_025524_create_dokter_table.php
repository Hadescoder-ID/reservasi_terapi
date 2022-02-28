<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->bigIncrements('id_dokter');
            $table->string('nama');
            $table->string('nit');
            $table->string('jenis_kelamin');
            $table->date('tgl_lahir');
            $table->string('no_telp');
            $table->string('alamat');
            $table->unsignedBigInteger('id_spesialis');
            $table->timestamps();
        });

        Schema::table('dokter', function (Blueprint $table) {
            $table->foreign('id_spesialis')->references('id_spesialis')->on('spesialis')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
}
