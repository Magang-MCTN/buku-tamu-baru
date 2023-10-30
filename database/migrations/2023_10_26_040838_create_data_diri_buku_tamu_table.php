<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDiriBukuTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_diri_buku_tamu', function (Blueprint $table) {
            $table->id('id_tamu');
            $table->string('nama_tamu', 255);
            $table->string('nik_tamu', 20)->nullable();
            $table->string('masa_berlaku_ktp', 255)->nullable();
            $table->string('jabatan', 100);
            $table->string('foto_ktp', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_diri_buku_tamu');
    }
}
