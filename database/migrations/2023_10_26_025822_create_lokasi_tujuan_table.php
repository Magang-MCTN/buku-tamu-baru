<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiTujuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_tujuan', function (Blueprint $table) {
            $table->id('id_lokasi');
            $table->string('nama_lokasi', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lokasi_tujuan');
    }
}
