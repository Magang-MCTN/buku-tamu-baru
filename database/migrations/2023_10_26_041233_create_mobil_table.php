<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->id('id_mobil');
            $table->string('tipe_mobil', 255)->nullable();
            $table->string('warna', 50)->nullable();
            $table->string('nomor_polisi', 20)->nullable();
            $table->date('masa_berlaku_stnk')->nullable();
            $table->string('foto_stnk', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mobil');
    }
}
