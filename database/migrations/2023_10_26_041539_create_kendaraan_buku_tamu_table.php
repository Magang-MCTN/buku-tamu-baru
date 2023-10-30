<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanBukuTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan_buku_tamu', function (Blueprint $table) {
            $table->id('id_kendaraan');

            $table->unsignedBigInteger('id_mobil');
            $table->boolean('pengawalan');
            $table->string('nama_supir', 255)->nullable();
            $table->date('masa_berlaku_kir')->nullable();
            $table->date('masa_berlaku_sim')->nullable();
            $table->string('foto_sim', 255)->nullable();
            $table->string('foto_kendaraan', 255)->nullable();
            $table->timestamps();


            $table->foreign('id_mobil')->references('id_mobil')->on('mobil');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kendaraan_buku_tamu');
    }
}
